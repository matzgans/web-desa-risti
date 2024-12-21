<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

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
        // Validasi data
        $validated = $request->validate([
            'sambutan_pertama' => 'nullable|string',
            'sambutan_kedua' => 'nullable|string',
            'deskripsi_data_desa' => 'nullable|string',
            'deskripsi_lokasi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'aparat' => 'nullable|string',
            'artikel' => 'nullable|string',
            'penyuratan' => 'nullable|string',
        ]);

        // Jika tidak ada data sebelumnya, buat baru
        Content::updateOrCreate(
            ['id' => 1], // Data hanya satu baris, bisa gunakan id yang tetap
            $validated
        );

        return redirect()->route('admin.content.index')->with('success', 'Content created successfully.');
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
