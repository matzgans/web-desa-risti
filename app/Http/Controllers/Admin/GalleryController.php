<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;
use Str;


class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $galleries = Gallery::where('title', 'like', '%' . $search . '%')->orderBy('title', 'DESC')->paginate(4)->appends(['search' => $search]);
        } else {

            $galleries = Gallery::orderBy('title', 'DESC')->paginate(10); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }
        return view('pages.admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:articles',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Periksa apakah file thumbnail ada
        if ($request->hasFile('image')) {
            // Mendapatkan nama asli dari file
            $imageName = $request->file('image')->getClientOriginalName();

            // Lanjutkan proses penyimpanan file jika valid
            $imagePath = public_path('gallery/thumb/' . $imageName);

            // Hapus gambar yang ada jika sudah ada
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Pindahkan file image ke direktori yang diinginkan
            $request->file('image')->move(public_path('gallery/thumb'), $imageName);
        }


        // Simpan artikel ke dalam database
        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        // Redirect atau respons sesuai kebutuhan
        return redirect()->route('admin.gallery.index')->with('success', 'Article created successfully!');
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
        $gallery =  Gallery::where('id', $id)->first();
        return view('pages.admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::where('id', $id)->firstOrFail();
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png|max:2048',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Perhatikan Inputan anda")->withErrors($validator)->withInput();
        }
        // Periksa apakah file image ada
        if ($request->hasFile('image')) {
            // Mendapatkan nama asli dari file
            $imageName = $request->file('image')->getClientOriginalName();

            // Lanjutkan proses penyimpanan file jika valid
            $imagePath = public_path('gallery/thumb/' . $imageName);

            // Hapus gambar yang ada jika sudah ada
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Pindahkan file image ke direktori yang diinginkan
            $request->file('image')->move(public_path('gallery/thumb'), $imageName);
            $gallery->image = $imageName;
        }
        // dd($request->hasFile('image'));
        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName ?? $gallery->image
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.gallery.index')->with('success', 'Article created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan resident berdasarkan id
        $gallery = Gallery::where('id', $id)->first();

        // Tentukan path gambar
        $photoPath = public_path('gallery/thumb/' . $gallery->image);

        // Cek apakah file gambar ada
        if (file_exists($photoPath)) {
            // Hapus gambar
            unlink($photoPath);
        }

        // Hapus data gallery dari database
        $gallery->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

}
