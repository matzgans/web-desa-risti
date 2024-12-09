<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        if ($search) {
            $education_levels = EducationLevel::join('villages', 'education_levels.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('education_levels.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $education_levels = EducationLevel::join('villages', 'education_levels.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('education_levels.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.education_level.index', compact('education_levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.education_level.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:education_levels',
            'belum_l' => 'required|numeric|digits_between:1,7',
            'belum_p' => 'required|numeric|digits_between:1,7',
            'sd_l' => 'required|numeric|digits_between:1,7',
            'sd_p' => 'required|numeric|digits_between:1,7',
            'smp_l' => 'required|numeric|digits_between:1,7',
            'smp_p' => 'required|numeric|digits_between:1,7',
            'sma_l' => 'required|numeric|digits_between:1,7',
            'sma_p' => 'required|numeric|digits_between:1,7',
            'pt_l' => 'required|numeric|digits_between:1,7',
            'pt_p' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        EducationLevel::create($request->all());
        return redirect()->back()->with('success', 'Data Level Pendidikan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education_levels = EducationLevel::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.education_level.edit', compact('education_levels', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $education_levels = EducationLevel::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:education_levels,village_id,' .  $education_levels->id,
            'belum_l' => 'required|numeric|digits_between:1,7',
            'belum_p' => 'required|numeric|digits_between:1,7',
            'sd_l' => 'required|numeric|digits_between:1,7',
            'sd_p' => 'required|numeric|digits_between:1,7',
            'smp_l' => 'required|numeric|digits_between:1,7',
            'smp_p' => 'required|numeric|digits_between:1,7',
            'sma_l' => 'required|numeric|digits_between:1,7',
            'sma_p' => 'required|numeric|digits_between:1,7',
            'pt_l' => 'required|numeric|digits_between:1,7',
            'pt_p' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $education_levels->update($request->all());
        return redirect()->back()->with('success', 'Data Level Pendidikan berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education_levels = EducationLevel::findOrFail($id);
        $education_levels->delete();
        return redirect()->back()->with('success', 'Data Level Pendidikan berhasil dihapus!');
    }
}
