<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.content.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="sambutan_pertama" class="block">Sambutan Pertama</label>
                            <textarea name="sambutan_pertama" class="form-input w-full">{{ old('sambutan_pertama', $content->sambutan_pertama ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="sambutan_kedua" class="block">Sambutan Kedua</label>
                            <textarea name="sambutan_kedua" class="form-input w-full">{{ old('sambutan_kedua', $content->sambutan_kedua ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="deskripsi_data_desa" class="block">Deskripsi Data Desa</label>
                            <textarea name="deskripsi_data_desa" class="form-input w-full">{{ old('deskripsi_data_desa', $content->deskripsi_data_desa ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="deskripsi_lokasi" class="block">Deskripsi Lokasi</label>
                            <textarea name="deskripsi_lokasi" class="form-input w-full">{{ old('deskripsi_lokasi', $content->deskripsi_lokasi ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="sejarah" class="block">Sejarah</label>
                            <textarea name="sejarah" class="form-input w-full">{{ old('sejarah', $content->sejarah ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="aparat" class="block">Aparat</label>
                            <textarea name="aparat" class="form-input w-full">{{ old('aparat', $content->aparat ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="artikel" class="block">Artikel</label>
                            <textarea name="artikel" class="form-input w-full">{{ old('artikel', $content->artikel ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="penyuratan" class="block">Penyuratan</label>
                            <textarea name="penyuratan" class="form-input w-full">{{ old('penyuratan', $content->penyuratan ?? '') }}</textarea>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
