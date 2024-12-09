<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\EducationLevel;
use App\Models\Resident;
use App\Models\Village;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $residents = Resident::with('village')->get();
        $villages = Village::all();
        $resident = Resident::count();
        $education_levels = EducationLevel::all();
        $article = Article::count();
        $dusun = Village::count();

        $totals = [
            'Belum Sekolah' => 0,
            'SD / Sederajat' => 0,
            'SMP / Sederajat' => 0,
            'SMA / Sederajat' => 0,
            'PT' => 0,
        ]; // Inisialisasi array totals dengan nilai 0

        foreach ($education_levels as $education_level) {
            // Tambahkan nilai dari setiap record ke dalam array totals
            $totals['Belum Sekolah'] += ($education_level->belum_l + $education_level->belum_p);
            $totals['SD / Sederajat'] += ($education_level->sd_l + $education_level->sd_p);
            $totals['SMP / Sederajat'] += ($education_level->smp_l + $education_level->smp_p);
            $totals['SMA / Sederajat'] += ($education_level->sma_l + $education_level->sma_p);
            $totals['PT'] += ($education_level->pt_l + $education_level->pt_p);
        }


        // for data statistik count penduduk based on village name
        $residentCountsByVillage = $residents->groupBy('village.village_name')->map(function ($group) {
            return $group->count();
        });

        $residentToArray = $residentCountsByVillage->toArray();

        return view('pages.admin.dashboard', compact('resident', 'totals', 'dusun', 'article', 'residentToArray'));
    }
}
