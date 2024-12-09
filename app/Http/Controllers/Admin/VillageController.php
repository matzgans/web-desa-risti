<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $villages = Village::where('village_name', 'like', '%' . $search . '%')->orderBy('id', 'ASC')->paginate(4)->appends(['search' => $search]);
        } else {

            $villages = Village::orderBy('id', 'ASC')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }

        return view('pages.admin.village.index', compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'village_name' => 'required|string|max:255|min:3|unique:villages',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Village::create([
            'village_name' => $request->village_name,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $village = Village::findOrFail($id);

        // Validasi data
        $validator = Validator::make($request->all(), [
            'village_name' => 'required|string|max:255|min:3|unique:villages,village_name,' . $village->id,
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengupdate data village dengan data request
        $village->update([
            'village_name' => $request->input('village_name'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $village =  Village::where('id', $id)->first();
        if (!$village) {
            return redirect()->back()->with('error', 'Data Tidak ditemukan');
        }

        $village->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
