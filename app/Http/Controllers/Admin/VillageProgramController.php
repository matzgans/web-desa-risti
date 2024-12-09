<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VillageProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        if ($search) {
            # code...

            $program_villages = VillageProgram::where('program_name', 'like', '%' . $search . '%')->orderBy('program_name', 'DESC')->paginate(4)->appends(['search' => $search]);
        } else {

            $program_villages = VillageProgram::orderBy('program_name', 'DESC')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }
        return view('pages.admin.program_village.index', compact('program_villages'));
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
            'program_name' => 'required|string|max:255|min:5|unique:village_programs',
            'description' => 'required|string|max:255|min:10',
            'program_category' => 'required|string|max:255',
        ]);


        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->program_name);



        VillageProgram::create([
            'program_name' => $request->program_name,
            'description' => $request->description,
            'program_category' => $request->program_category,
            'slug' => $slug,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
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
    public function update(Request $request, string $slug)
    {
        // Mencari data berdasarkan ID yang diberikan
        $village_program = VillageProgram::where('slug', $slug)->first();
        // Validasi data
        $validator = Validator::make($request->all(), [
            'program_name' => [
                'required',
                'string',
                'max:255',
                'min:5',
                'unique:village_programs,program_name,' . $village_program->id
                // Mengabaikan data yang sedang di-update
            ],
            'description' => 'required|string|max:255|min:10',
            'program_category' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengupdate data village dengan data request
        $village_program->update($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $village_program = VillageProgram::where('slug', $slug)->first();
        $village_program->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
