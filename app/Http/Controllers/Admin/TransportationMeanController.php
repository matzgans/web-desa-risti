<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransportationMean;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransportationMeanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $transportations = TransportationMean::join('villages', 'transportation_means.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('transportation_means.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $transportations = TransportationMean::join('villages', 'transportation_means.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('transportation_means.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.transportation.index', compact('transportations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.transportation.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:transportation_means',
            'car_count' => 'required|numeric|digits_between:1,7',
            'car_owner' => 'required|numeric|digits_between:1,7',
            'motorcycle_count' => 'required|numeric|digits_between:1,7',
            'motorcycle_owner' => 'required|numeric|digits_between:1,7',
            'bentor_count' => 'required|numeric|digits_between:1,7',
            'bentor_owner' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TransportationMean::create($request->all());
        return redirect()->back()->with('success', 'Data Transportasi berhasil ditambahkan!');
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
        $transportation = TransportationMean::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.transportation.edit', compact('transportation', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transportation = TransportationMean::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:transportation_means,village_id,' .  $transportation->id,
            'car_count' => 'required|numeric|digits_between:1,7',
            'car_owner' => 'required|numeric|digits_between:1,7',
            'motorcycle_count' => 'required|numeric|digits_between:1,7',
            'motorcycle_owner' => 'required|numeric|digits_between:1,7',
            'bentor_count' => 'required|numeric|digits_between:1,7',
            'bentor_owner' => 'required|numeric|digits_between:1,7',

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transportation->update($request->all());
        return redirect()->back()->with('success', 'Data Transportasi berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transportation = TransportationMean::findOrFail($id);
        $transportation->delete();
        return redirect()->back()->with('success', 'Data Transportasi berhasil dihapus!');
    }
}
