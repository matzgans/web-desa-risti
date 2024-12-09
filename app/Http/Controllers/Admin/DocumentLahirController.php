<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Structure;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentLahirController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Document::where('type', 'ket_lahir');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(JSON_EXTRACT(data, '$.kid_name')) LIKE ?", ['%' . strtolower($search) . '%'])
                    ->orWhereRaw("LOWER(JSON_EXTRACT(data, '$.mothers_name')) LIKE ?", ['%' . strtolower($search) . '%']);
            });
        }

        $documents = $query->latest()->paginate(10);

        $documents->through(function ($document, $index) {
            $data = json_decode($document->data, true);
            return [
                'no' => $index + 1,
                'kid_name' => $data['kid_name'] ?? '-',
                'day' => $data['day'] ?? '-',
                'date' => $data['date'] ?? '-',
                'place' => $data['place'] ?? '-',
                'kid_no' => $data['kid_no'] ?? '-',
                'mothers_name' => $data['mothers_name'] ?? '-',
                'fathers_name' => $data['fathers_name'] ?? '-',
                "address" => $data['address'] ?? "-",
                'id' => $document->id,
                'no_surat' => $document->no_surat ?? '-',
                'is_status' => $document['is_status'],
            ];
        });

        if ($search) {
            $documents->appends(['search' => $search]);
        }

        return view("pages.admin.document_lahir.index", compact('documents'));
    }

    public function edit($id)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $no_surat = $document->no_surat;

        $data = json_decode($document->data, true);

        return view("pages.admin.document_lahir.edit", compact("data", "id", "no_surat"));
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
                ->route("admin.document.lahir.index")
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
                ->back()
                ->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function print($id)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $kepala_desa = Structure::where('position', "Kepala Desa Menjabat")->first();


        if ($document->no_surat) {
            # code...
            $data = json_decode($document->data, true);
            $data['kepala_desa'] = $kepala_desa->staff_name;
            $pdf = Pdf::loadView('pdf.surat-keterangan-lahir', $data);
            $fileName = 'surat_keterangan_lahir_' . htmlspecialchars($data['kid_name']) . '.pdf';
            $document->update(['is_status' => 1]);
            return $pdf->stream($fileName);
        } else {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: Perhatikan Nomor Surat');
        }
    }
}
