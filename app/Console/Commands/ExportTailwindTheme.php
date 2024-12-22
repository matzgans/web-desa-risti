<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Theme;

class ExportTailwindTheme extends Command
{
    protected $signature = 'export:tailwind-theme';
    protected $description = 'Export theme colors to Tailwind config file';

    public function handle()
    {
        // Ambil data tema pertama dari tabel Theme
        $theme = Theme::first();

        // Tentukan warna tema dengan fallback default jika data kosong
        $themeColors = [
            'primary' => $theme->primary ?? '#000000',
            'secondary' => $theme->secondary ?? '#FFFFFF',
        ];

        // Encode array tema ke format JSON dengan indentasi yang rapi
        $json = json_encode($themeColors, JSON_PRETTY_PRINT);

        // Tentukan lokasi penyimpanan file JSON (di dalam resources/js/)
        $path = base_path('resources/js/theme.json');

        // Simpan data JSON ke dalam file
        file_put_contents($path, $json);

        // Tampilkan pesan sukses di terminal
        $this->info('Theme colors exported successfully.');
    }
}
