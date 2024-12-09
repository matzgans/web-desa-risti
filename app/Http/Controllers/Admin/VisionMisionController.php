<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VisionMisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $vision_misions = VisionMision::where('visi', 'like', '%' . $search . '%')->orderBy('visi', 'DESC')->paginate(4)->appends(['search' => $search]);
        } else {

            $vision_misions = VisionMision::orderBy('visi', 'DESC')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }
        return view('pages.admin.vision_mision.index', compact('vision_misions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.vision_mision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visi' => 'required|string|max:500|min:3|unique:vision_misions',
            'misi' => 'required|string|max:500|min:10',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->visi);

        VisionMision::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'slug' => $slug,
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
    public function edit(string $slug)
    {
        $vision_mision = VisionMision::where('slug', $slug)->first();

        return view('pages.admin.vision_mision.edit', compact('vision_mision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $vision_mision = VisionMision::where('slug', $slug)->first();
        $validator = Validator::make($request->all(), [
            'visi' => 'required|string|max:500|min:3|unique:vision_misions,slug,' . $vision_mision->slug,
            'misi' => 'required|string|max:500|min:10',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vision_mision->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'slug' => $vision_mision->slug,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $vision_mision = VisionMision::where('slug', $slug)->first();
        if (!$vision_mision) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
        $vision_mision->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
