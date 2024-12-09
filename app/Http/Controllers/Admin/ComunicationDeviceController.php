<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComunicationDevice;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComunicationDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $comunication_devices = ComunicationDevice::join('villages', 'comunication_devices.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('comunication_devices.*', 'villages.village_name as village_name')
                ->paginate(4);
        } else {
            $comunication_devices = ComunicationDevice::join('villages', 'comunication_devices.village_id', '=', 'villages.id')
                ->where('villages.village_name', 'like', '%' . $search . '%') // Filter berdasarkan nama desa
                ->select('comunication_devices.*', 'villages.village_name as village_name')
                ->paginate(4);
        }
        return view('pages.admin.comunication_device.index', compact('comunication_devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.comunication_device.create', compact('villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:comunication_devices',
            'tv_count' => 'required|numeric|digits_between:1,7',
            'tv_owner' => 'required|numeric|digits_between:1,7',
            'parabola_count' => 'required|numeric|digits_between:1,7',
            'parabola_owner' => 'required|numeric|digits_between:1,7',
            'hp_count' => 'required|numeric|digits_between:1,7',
            'hp_count' => 'required|numeric|digits_between:1,7',
            'radio_owner' => 'required|numeric|digits_between:1,7',
            'radio_owner' => 'required|numeric|digits_between:1,7',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ComunicationDevice::create($request->all());
        return redirect()->back()->with('success', 'Data Perangkat Komunikasi berhasil ditambahkan!');
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
        $comunication_device = ComunicationDevice::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.comunication_device.edit', compact('comunication_device', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comunication_device = ComunicationDevice::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|unique:comunication_devices,village_id,' .  $comunication_device->id,
            'tv_count' => 'required|numeric|digits_between:1,7',
            'tv_owner' => 'required|numeric|digits_between:1,7',
            'parabola_count' => 'required|numeric|digits_between:1,7',
            'parabola_owner' => 'required|numeric|digits_between:1,7',
            'hp_count' => 'required|numeric|digits_between:1,7',
            'hp_count' => 'required|numeric|digits_between:1,7',
            'radio_owner' => 'required|numeric|digits_between:1,7',
            'radio_owner' => 'required|numeric|digits_between:1,7',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comunication_device->update($request->all());
        return redirect()->back()->with('success', 'Data Perangkat Komunikasi berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comunication_devices = ComunicationDevice::findOrFail($id);
        $comunication_devices->delete();
        return redirect()->back()->with('success', 'Data Perangkat Komunikasi berhasil dihapus!');
    }
}
