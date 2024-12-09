<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryStaff;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $staff_categories = CategoryStaff::where('category', 'like', '%' . $search . '%')->orderBy('category', 'DESC')->paginate(4)->appends(['search' => $search]);
        } else {

            $staff_categories = CategoryStaff::orderBy('category', 'DESC')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }
        return view('pages.admin.category.index', compact('staff_categories'));
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
            'category' => 'required|string|max:255|min:3|unique:category_staff',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        CategoryStaff::create([
            'category' => $request->category,
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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $category = CategoryStaff::findOrFail($id);

        // Validasi data
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255|min:3|unique:category_staff,category,' . $category->id,
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengupdate data category dengan data request
        $category->update([
            'category' => $request->input('category'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category_staff =  CategoryStaff::where('id', $id)->first();
        if (!$category_staff) {
            return redirect()->back()->with('error', 'Data Tidak ditemukan');
        }

        $category_staff->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
