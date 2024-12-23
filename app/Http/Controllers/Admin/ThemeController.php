<?php

namespace App\Http\Controllers\Admin;

use App\Models\Theme; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theme = Theme::getTheme(); // Mengambil atau membuat tema jika belum ada
        return view('pages.admin.theme.index', compact('theme')); // Mengirim tema ke view
    }

    /**
     * Store or update the theme data.
     */
    public function store(Request $request)
    {
        // Ambil tema pertama atau buat yang baru jika belum ada
        $theme = Theme::getTheme();

        // Validasi inputan warna
        $request->validate([
            'primary' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/', // Validasi format hex warna
            'secondary' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

            // Cek data yang dikirim ke server
        Log::debug('Current Theme:', ['primary' => $theme->primary, 'secondary' => $theme->secondary]);
        Log::debug('Updated Data:', ['primary' => $request->input('primary'), 'secondary' => $request->input('secondary')]);
        

        // Update atau simpan tema
        $theme->update([
            'primary' => $request->input('primary'),
            'secondary' => $request->input('secondary'),
        ]);

        return redirect()->route('admin.theme.index')->with('success', 'Theme updated successfully!');
    }

    public function exportThemeToJson()
    {
        $theme = Theme::getTheme(); // Ambil tema pertama atau buat yang baru jika belum ada
        $themeData = [
            'primary' => $theme->primary,
            'secondary' => $theme->secondary,
        ];

        file_put_contents(resource_path('js/theme.json'), json_encode($themeData));

        return response()->json(['message' => 'Theme exported to JSON']);
    }


}
