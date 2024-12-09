<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $farms = Farm::join('villages', 'farms.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('farms.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $farms = Farm::join('villages', 'farms.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('farms.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.farm.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.farm.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:farms',
            'cow_count' => 'required|numeric|digits_between:1,7',
            'cow_owner' => 'required|numeric|digits_between:1,7',
            'goat_count' => 'required|numeric|digits_between:1,7',
            'goat_owner' => 'required|numeric|digits_between:1,7',
            'dog_count' => 'required|numeric|digits_between:1,7',
            'dog_owner' => 'required|numeric|digits_between:1,7',
            'cat_count' => 'required|numeric|digits_between:1,7',
            'cat_owner' => 'required|numeric|digits_between:1,7',
            'chicken_count' => 'required|numeric|digits_between:1,7',
            'chicken_owner' => 'required|numeric|digits_between:1,7',
            'duck_count' => 'required|numeric|digits_between:1,7',
            'duck_owner' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Farm::create($request->all());
        return redirect()->back()->with('success', 'Data Peternakan berhasil ditambahkan!');
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
        $farm = Farm::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.farm.edit', compact('farm', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $farm = Farm::findOrFail($id);
        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:farms,village_id,' .  $farm->id,
            'cow_count' => 'required|numeric|digits_between:1,7',
            'cow_owner' => 'required|numeric|digits_between:1,7',
            'goat_count' => 'required|numeric|digits_between:1,7',
            'goat_owner' => 'required|numeric|digits_between:1,7',
            'dog_count' => 'required|numeric|digits_between:1,7',
            'dog_owner' => 'required|numeric|digits_between:1,7',
            'cat_count' => 'required|numeric|digits_between:1,7',
            'cat_owner' => 'required|numeric|digits_between:1,7',
            'chicken_count' => 'required|numeric|digits_between:1,7',
            'chicken_owner' => 'required|numeric|digits_between:1,7',
            'duck_count' => 'required|numeric|digits_between:1,7',
            'duck_owner' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $farm->update($request->all());
        return redirect()->back()->with('success', 'Data Peternakan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farm = Farm::findOrFail($id);
        $farm->delete();
        return redirect()->back()->with('success', 'Data Peternakan berhasil dihapus!');
    }
}
