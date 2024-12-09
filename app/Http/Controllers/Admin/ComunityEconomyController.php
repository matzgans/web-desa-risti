<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComunityEconomy;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComunityEconomyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $comunity_economies = ComunityEconomy::join('villages', 'comunity_economies.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('comunity_economies.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $comunity_economies = ComunityEconomy::join('villages', 'comunity_economies.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('comunity_economies.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.comunity_economy.index', compact('comunity_economies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.comunity_economy.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        // dd($request);
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:comunity_economies',
            'pertokoan_count' => 'required|numeric|digits_between:1,7',
            'pertokoan_owner' => 'required|numeric|digits_between:1,7',
            'perkiosan_count' => 'required|numeric|digits_between:1,7',
            'perkiosan_owner' => 'required|numeric|digits_between:1,7',
            'rm_count' => 'required|numeric|digits_between:1,7',
            'rm_owner' => 'required|numeric|digits_between:1,7',
            'perbengkelan_count' => 'required|numeric|digits_between:1,7',
            'perbengkelan_owner' => 'required|numeric|digits_between:1,7',
            'mebel_count' => 'required|numeric|digits_between:1,7',
            'mebel_owner' => 'required|numeric|digits_between:1,7',
            'pangkalan_lpg_count' => 'required|numeric|digits_between:1,7',
            'pangkalan_lpg_owner' => 'required|numeric|digits_between:1,7',
            'taylor_count' => 'required|numeric|digits_between:1,7',
            'taylor_owner' => 'required|numeric|digits_between:1,7',
            'lainnya_count' => 'required|numeric|digits_between:1,7',
            'lainnya_owner' => 'required|numeric|digits_between:1,7',

        ]);

        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ComunityEconomy::create($request->all());
        return redirect()->back()->with('success', 'Data Usaha Ekonomi Masyarakat berhasil ditambahkan!');
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
        $comunity_economy = ComunityEconomy::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.comunity_economy.edit', compact('comunity_economy', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comunity_economy = ComunityEconomy::findOrFail($id);
        // Validasi input
        // dd($request);
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:comunity_economies,village_id,' .  $comunity_economy->id,
            'pertokoan_count' => 'required|numeric|digits_between:1,7',
            'pertokoan_owner' => 'required|numeric|digits_between:1,7',
            'perkiosan_count' => 'required|numeric|digits_between:1,7',
            'perkiosan_owner' => 'required|numeric|digits_between:1,7',
            'rm_count' => 'required|numeric|digits_between:1,7',
            'rm_owner' => 'required|numeric|digits_between:1,7',
            'perbengkelan_count' => 'required|numeric|digits_between:1,7',
            'perbengkelan_owner' => 'required|numeric|digits_between:1,7',
            'mebel_count' => 'required|numeric|digits_between:1,7',
            'mebel_owner' => 'required|numeric|digits_between:1,7',
            'pangkalan_lpg_count' => 'required|numeric|digits_between:1,7',
            'pangkalan_lpg_owner' => 'required|numeric|digits_between:1,7',
            'taylor_count' => 'required|numeric|digits_between:1,7',
            'taylor_owner' => 'required|numeric|digits_between:1,7',
            'lainnya_count' => 'required|numeric|digits_between:1,7',
            'lainnya_owner' => 'required|numeric|digits_between:1,7',

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comunity_economy->update($request->all());
        return redirect()->back()->with('success', 'Data Usaha Ekonomi Masyarakat berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comunity_economy = ComunityEconomy::findOrFail($id);
        $comunity_economy->delete();
        return redirect()->back()->with('success', 'Data Usaha Ekonomi Masyarakat berhasil dihapus!');
    }
}
