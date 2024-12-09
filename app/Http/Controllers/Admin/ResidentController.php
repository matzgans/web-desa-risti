<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ResidentExport;
use App\Exports\ResidentTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\ResidentImport;
use App\Models\Resident;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ResidentController extends Controller
{

    public function export()
    {
        return Excel::download(new ResidentExport, 'resident.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $search = $request->input('search');

        if ($search) {
            $residents = Resident::join('villages', 'residents.village_id', '=', 'villages.id')
                ->where('residents.name', 'like', '%' . $search . '%') // Filter berdasarkan nama penduduk
                ->orWhere('villages.village_name', 'like', '%' . $search . '%') // Filter juga berdasarkan nama desa
                ->select('residents.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $residents = Resident::join('villages', 'residents.village_id', '=', 'villages.id')
                ->select('residents.*', 'villages.village_name as village_name')
                ->paginate(4);
        }

        return view('pages.admin.resident.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.resident.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:6',
            'village_id' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16|unique:residents',
            'gender' => 'required|in:Perempuan,Laki - Laki',
            'birth_date' => 'required|date',
            'occupation' => 'required|string|max:255|min:6',
            'education_level' => 'required|string|max:255',
            'status_resident' => 'required|string|max:255',
            'photo_profile' => 'required|image|mimes:jpeg,jpg,png|max:2048', // Mendukung 3 tipe file
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek jika ada gambar dengan nama yang sama dan hapus jika ada
        if ($request->hasFile('photo_profile')) {
            $imageName = $request->file('photo_profile')->getClientOriginalName();
            $imagePath = public_path('residents/images/' . $imageName);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus gambar yang ada
            }
        }

        // Generate UUID untuk penduduk baru
        $uuid = Str::uuid()->toString();

        // Simpan gambar di folder publik dengan nama file yang sesuai
        $fileExtension = $request->file('photo_profile')->getClientOriginalExtension();
        $fileName = $uuid . '.' . $fileExtension; // Path tanpa prefix folder
        $request->file('photo_profile')->move(public_path('residents/images'), $fileName); // Simpan gambar ke folder

        // Membuat instance model dan menyimpan data
        $resident = new Resident();
        $resident->uuid = $uuid; // Menyimpan UUID
        $resident->name = $request->name;
        $resident->village_id = $request->village_id;
        $resident->nik = $request->nik;
        $resident->gender = $request->gender;
        $resident->birth_date = $request->birth_date;
        $resident->occupation = $request->occupation;
        $resident->education_level = $request->education_level;
        $resident->status_resident = $request->status_resident;
        $resident->photo_profile = $fileName;

        // Simpan data ke database
        $resident->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data penduduk berhasil ditambahkan!');
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
    public function edit(string $uuid)
    {
        $resident = Resident::where('uuid', $uuid)->first();
        $villages = Village::all();
        return view('pages.admin.resident.edit', compact('resident', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        // Ambil data penduduk yang akan diperbarui berdasarkan UUID
        $resident = Resident::where('uuid', $uuid)->firstOrFail();

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:6',
            'nik' => 'required|numeric|digits:16|unique:residents,nik,' . $resident->id, // Perbaiki untuk keunikan pada update
            'village_id' => 'required|string|max:255',
            'gender' => 'required|in:Perempuan,Laki - Laki',
            'birth_date' => 'required|date',
            'occupation' => 'required|string|max:255',
            'education_level' => 'required|string|max:255',
            'status_resident' => 'required|string|max:255',
            'photo_profile' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // Ganti 'required' menjadi 'nullable'
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->with('error', 'Perhatikan Inputan Anda')->withErrors($validator)->withInput();
        }

        // Cek jika ada gambar baru yang diunggah
        if ($request->hasFile('photo_profile')) {
            // Hapus gambar yang ada jika ada
            $existingImagePath = public_path('residents/images/' . $resident->photo_profile);
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath); // Hapus gambar yang ada
            }

            // Generate nama file baru untuk gambar
            $fileExtension = $request->file('photo_profile')->getClientOriginalExtension();
            $fileName = Str::uuid()->toString() . '.' . $fileExtension; // Gunakan UUID untuk nama file baru
            $request->file('photo_profile')->move(public_path('residents/images'), $fileName); // Simpan gambar ke folder

            // Perbarui foto profil di model
            $resident->photo_profile = $fileName; // Simpan nama file gambar baru
        }

        // Perbarui data penduduk lainnya
        $resident->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'occupation' => $request->occupation,
            'education_level' => $request->education_level,
            'status_resident' => $request->status_resident,
        ]);

        // Simpan data ke database (opsional, karena update sudah otomatis menyimpan)
        // $resident->save(); // Tidak perlu dipanggil karena update() sudah menyimpannya

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data penduduk berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        // Temukan resident berdasarkan UUID
        $resident = Resident::where('uuid', $uuid)->first();

        // Tentukan path gambar
        $photoPath = public_path('residents/images/' . $resident->photo_profile);

        // Cek apakah file gambar ada
        if (file_exists($photoPath)) {
            // Hapus gambar
            unlink($photoPath);
        }

        // Hapus data resident dari database
        $resident->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function export_template()
    {
        return Excel::download(new ResidentTemplateExport, 'penduduk-template.xlsx');
    }
    public function import_template(Request $request)
    {
        // Validasi jika file yang diupload adalah Excel
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Proses import dan tangani validasi error
        try {
            Excel::import(new ResidentImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Ambil error validasi
            $failures = $e->failures();

            // Kembalikan ke halaman sebelumnya dengan error
            return redirect()->back()->with([
                'import_errors' => $failures,
            ]);
        }
        // Excel::import(new ResidentImport, $request->file('file'));

        // return back()->with('success', 'Data penduduk berhasil diunggah!');
    }
}
