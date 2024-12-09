<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LivingCondition;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivingConditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $living_conditions = LivingCondition::join('villages', 'living_conditions.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('living_conditions.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $living_conditions = LivingCondition::join('villages', 'living_conditions.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('living_conditions.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.living_condition.index', compact('living_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.living_condition.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:living_conditions',
            'atap_genteng' => 'required|numeric|digits_between:1,7',
            'atap_seng' => 'required|numeric|digits_between:1,7',
            'atap_rumbia' => 'required|numeric|digits_between:1,7',
            'dinding_semen' => 'required|numeric|digits_between:1,7',
            'dinding_kayu' => 'required|numeric|digits_between:1,7',
            'dinding_lainnya' => 'required|numeric|digits_between:1,7',
            'lantai_semen' => 'required|numeric|digits_between:1,7',
            'lantai_keramik' => 'required|numeric|digits_between:1,7',
            'lantai_lainnya' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        LivingCondition::create($request->all());
        return redirect()->back()->with('success', 'Data Kondisi Tempat Tinggal berhasil ditambahkan!');
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
        $living_conditional = LivingCondition::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.living_condition.edit', compact('living_conditional', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $living_condition = LivingCondition::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:living_conditions,village_id,' . $living_condition->id,
            'atap_genteng' => 'required|numeric|digits_between:1,7',
            'atap_seng' => 'required|numeric|digits_between:1,7',
            'atap_rumbia' => 'required|numeric|digits_between:1,7',
            'dinding_semen' => 'required|numeric|digits_between:1,7',
            'dinding_kayu' => 'required|numeric|digits_between:1,7',
            'dinding_lainnya' => 'required|numeric|digits_between:1,7',
            'lantai_semen' => 'required|numeric|digits_between:1,7',
            'lantai_keramik' => 'required|numeric|digits_between:1,7',
            'lantai_lainnya' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $living_condition->update($request->all());
        return redirect()->back()->with('success', 'Data Kondisi Tempat Tinggal Masyarakat berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $living_condition = LivingCondition::findOrFail($id);
        $living_condition->delete();
        return redirect()->back()->with('success', 'Data Kondisi Tempat Tinggal berhasil dihapus!');
    }
}
