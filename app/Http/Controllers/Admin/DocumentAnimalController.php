<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentAnimalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Document::where('type', 'ket_hewan');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(JSON_EXTRACT(data, '$.name')) LIKE ?", ['%' . strtolower($search) . '%'])
                    ->orWhereRaw("LOWER(JSON_EXTRACT(data, '$.animal')) LIKE ?", ['%' . strtolower($search) . '%'])
                    ->orWhereRaw("LOWER(JSON_EXTRACT(data, '$.address')) LIKE ?", ['%' . strtolower($search) . '%']);
            });
        }

        $documents = $query->latest()->paginate(10);

        $documents->through(function ($document, $index) {
            $data = json_decode($document->data, true);
            return [
                'no' => $index + 1,
                'age' => $data['age'] ?? '-',
                'name' => $data['name'] ?? '-',
                'job' => $data['job'] ?? '-',
                'address' => $data['address'] ?? '-',
                'animal' => $data['animal'] ?? '-',
                'total_animals' => $data['total_animals'] ?? '-',
                'place' => $data['place'] ?? '-',
                'characteristics' => $this->getAnimalCharacteristics($data),
                'id' => $document->id
            ];
        });

        if ($search) {
            $documents->appends(['search' => $search]);
        }

        return view("pages.admin.document_animal.index", compact('documents'));
    }

    private function getAnimalCharacteristics($data)
    {
        $characteristics = [];
        $totalAnimals = intval($data['total_animals'] ?? 0);

        for ($i = 1; $i <= $totalAnimals; $i++) {
            $animalCharacteristics = [];

            if (!empty($data["gender_{$i}"])) {
                $animalCharacteristics[] = $data["gender_{$i}"];
            }

            if (!empty($data["skin_color_{$i}"])) {
                $animalCharacteristics[] = "Warna " . $data["skin_color_{$i}"];
            }

            if (!empty($data["brand_{$i}"])) {
                $animalCharacteristics[] = "Merk " . $data["brand_{$i}"];
            }

            if (!empty($animalCharacteristics)) {
                $characteristics[] = "Hewan {$i}: " . implode(', ', $animalCharacteristics);
            }
        }

        return empty($characteristics) ? '-' : implode('; ', $characteristics);
    }


    private function prepareAnimalData($data)
    {
        $animals = [];
        $total = (int)$data['total_animals'];

        for ($i = 1; $i <= $total; $i++) {
            if (isset($data["gender_{$i}"])) {
                $animals[] = [
                    'gender' => $data["gender_{$i}"],
                    'skin_color' => $data["skin_color_{$i}"],
                    'brand' => $data["brand_{$i}"],
                    'total' => $data["total_{$i}"]
                ];
            }
        }

        return $animals;
    }

    public function print($id)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $data = json_decode($document->data, true);

        $data['no_surat'] = $document->no_surat;
        $data['animals'] = $this->prepareAnimalData($data);

        $pdf = Pdf::loadView('pdf.surat-keterangan-hewan', $data);
        $fileName = 'surat_keterangan_hewan_keluar_' . htmlspecialchars($data['name']) . '.pdf';
        return $pdf->stream($fileName);
    }

    public function edit($id)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $no_surat = $document->no_surat;

        $data = json_decode($document->data, true);

        return view("pages.admin.document_animal.edit", compact("data", "id", "no_surat"));
    }

    public function update(Request $request, $id)
    {
        try {

            // Mengambil semua data kecuali yang tidak diperlukan
            $data = $request->except([
                '_token',
                '_method',
                'type'
            ]);

            // Update document
            Document::where('id', $id)->update([
                'type' => $request->type,
                'no_surat' => $request->no_surat,
                'data' => json_encode($data),
                'updated_at' => now()
            ]);

            return redirect()
                ->route("admin.document.animal.index")
                ->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Mencari item berdasarkan ID
            $item = Document::findOrFail($id); // Menggunakan findOrFail untuk langsung memunculkan exception jika tidak ditemukan

            // Menghapus item
            $item->delete();

            return redirect()
                ->route('admin.document.animal.index') // Sesuaikan rute ini sesuai kebutuhan
                ->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
