<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Structure;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentKematianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Document::where('type', 'ket_kematian');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("LOWER(JSON_EXTRACT(data, '$.name')) LIKE ?", ['%' . strtolower($search) . '%']);
            });
        }

        $documents = $query->latest()->paginate(10);

        $documents->through(function ($document, $index) {
            $data = json_decode($document->data, true);
            return [
                'no' => $index + 1,
                'name' => $data['name'] ?? '-',
                'day_death' => $data['day_death'] ?? '-',
                'date_death' => $data['date_death'] ?? '-',
                'time_death' => $data['time_death'] ?? '-',
                'cause_death' => $data['cause_death'] ?? '-',
                'place_death' => $data['place_death'] ?? '-',
                'birth' => $data['birth'] ?? '-',
                'job' => $data['job'] ?? '-',
                'religion' => $data['religion'] ?? '-',
                'address' => $data['address'] ?? '-',
                'married_status' => $data['married_status'] ?? '-',
                'name_ibu' => $data['name_ibu'] ?? '-',
                'job_ibu' => $data['job_ibu'] ?? '-',
                'address_ibu' => $data['address_ibu'] ?? '-',
                'name_ayah' => $data['name_ayah'] ?? '-',
                'job_ayah' => $data['job_ayah'] ?? '-',
                'address_ayah' => $data['address_ayah'] ?? '-',
                'name_saksi1' => $data['name_saksi1'] ?? '-',
                'birth_saksi1' => $data['birth_saksi1'] ?? '-',
                'job_saksi1' => $data['job_saksi1'] ?? '-',
                'address_saksi1' => $data['address_saksi1'] ?? '-',
                'name_saksi2' => $data['name_saksi2'] ?? '-',
                'birth_saksi2' => $data['birth_saksi2'] ?? '-',
                'job_saksi2' => $data['job_saksi2'] ?? '-',
                'address_saksi2' => $data['address_saksi2'] ?? '-',
                'id' => $document->id,
                'no_surat' => $document->no_surat ?? '-',
                'is_status' => $document['is_status'],
            ];
        });

        if ($search) {
            $documents->appends(['search' => $search]);
        }

        return view("pages.admin.document_kematian.index", compact('documents'));
    }

    public function edit($id)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $no_surat = $document->no_surat;

        $data = json_decode($document->data, true);

        return view("pages.admin.document_kematian.edit", compact("data", "id", "no_surat"));
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
                ->route("admin.document.kematian.index")
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

    public function print($id, Request $request)
    {
        $document = Document::where('id', $id)->firstOrFail();
        $kepala_desa = Structure::where('position', "Kepala Desa")->first();
        $sekretaris_desa = Structure::where('position', "Sekretaris")->first();
        $tandatangan = $request->query('tandatangan');

        if ($document->no_surat) {
            $data = json_decode($document->data, true);
            $data['kepala_desa'] = $kepala_desa->staff_name;
            $data['nip'] = $kepala_desa->nip;
            $data['sekretaris_desa'] = $sekretaris_desa->staff_name;
            $data['tandatangan'] = $tandatangan;
            // Mengatur ukuran kertas F4
            $pdf = Pdf::loadView('pdf.surat-keterangan-kematian', $data)
                ->setPaper([0, 0, 595.44, 936], 'portrait'); // Ukuran F4 dalam poin

            $fileName = 'surat_keterangan_kematian_' . htmlspecialchars($data['name']) . '.pdf';
            $document->update(['is_status' => 1]);

            return $pdf->stream($fileName);
        } else {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: Perhatikan Nomor Surat');
        }
    }
}
