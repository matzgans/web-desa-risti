<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil satu data pertama, jika ada
        $content = Content::first(); 

        // Kirim data content ke view
        return view('pages.admin.content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sambutan_pertama' => 'nullable|string',
            'sambutan_kedua' => 'nullable|string',
            'deskripsi_data_desa' => 'nullable|string',
            'deskripsi_lokasi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'aparat' => 'nullable|string',
            'artikel' => 'nullable|string',
            'penyuratan' => 'nullable|string',
        ]);
        
        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Ambil data valid dari validator
        $data = $validator->validated();
        
        // Perbarui atau buat data baru
        Content::updateOrCreate(
            ['id' => 1], // Identifikasi baris yang akan diperbarui atau dibuat
            $data // Data yang telah divalidasi
        );
        
        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diperbarui!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('pages.admin.content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('pages.admin.content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content->update($request->all());

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Content deleted successfully.');
    }
}
