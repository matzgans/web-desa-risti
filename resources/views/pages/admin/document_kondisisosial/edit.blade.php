<x-app-layout>
    <div class="pt-4">
        <div class="max-w-full px-3 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-between rounded-lg bg-secondary p-4 text-white shadow-lg">
                <h2>Edit Data Surat Kondisi Ekonomi Orang Tua</h2>
                <a class="flex items-center hover:underline" href="{{ route('admin.document.kondisi_sosial.index') }}">
                    <svg class="h-6 w-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    <span class="ml-3">Kembali</span>
                </a>
            </div>
            <div class="rounded-lg bg-white p-4 text-white shadow-lg">
                <form method="POST"
                    action="{{ route('admin.document.kondisi_sosial.update', ['kondisi_sosial' => $id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="hidden">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="type">Tipe
                            Surat
                            :</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="type" name="type" type="text" value="ket_kondisiorangtua" placeholder=""
                            required />
                    </div>
                    <h2 class="mb-4 text-lg font-semibold">Menerangkan Bahwa:</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-black focus:ring focus:ring-blue-500"
                            name="name" type="text" value="{{ $data['name'] }}" required
                            placeholder="Masukkan Nama" />
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat/Tanggal Lahir:</label>
                            <input class="mt-1 w-full rounded-md border p-2 text-black focus:ring focus:ring-blue-500"
                                name="birth" type="text" value="{{ $data['birth'] }}" required
                                placeholder="Gorontalo, 27-02-1973" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="gender">Jenis Kelamin
                                :</label>
                            <select
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                id="gender" name="gender">

                                <option value="Laki Laki" {{ $data['gender'] == 'Laki Laki' ? 'selected' : '' }}>Laki
                                    Laki
                                </option>
                                <option value="Perempuan" {{ $data['gender'] == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Agama:</label>
                            <input
                                class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                                name="religion" type="text" value="{{ $data['religion'] }}" required
                                placeholder="Islam" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan:</label>
                            <input
                                class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                                name="job" type="text" value="{{ $data['job'] }}" required placeholder="IRT" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="address" type="text" value="{{ $data['address'] }}" required
                            placeholder="Desa Katialada, Kecamatan Kwandang, Kabupaten Gorontalo Utara" />
                    </div>

                    <h2 class="mb-4 text-lg font-semibold">Orang Tua/Wali dari Calon Mahasiswa Baru:</h2>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="kids_name" type="text" value="{{ $data['kids_name'] }}" required
                            placeholder="Masukkan Nama" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Prodi:</label>
                        <textarea class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500" name="prodi"
                            value="{{ $data['prodi'] }}" placeholder="Prodi dan Fakultas">{{ $data['prodi'] }}</textarea>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No HP/Email:</label>
                            <input
                                class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                                name="contact" type="text" value="{{ $data['contact'] }}" required
                                placeholder="085394441603 / email@example.com" />
                        </div>
                    </div>

                    <h2 class="mb-4 text-lg font-semibold">Mengalami Penurunan Kondisi Sosial Ekonomi Karena:</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Sebutkan Alasan:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="reason" type="text" value="{{ $data['reason'] }}" required
                            placeholder="Terdampak Covid " />
                    </div>

                    <h2 class="mb-4 text-lg font-semibold">Detail Pendapatan:</h2>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Pendapatan Sebelum Kejadian:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="pendapatan_sebelum" type="text" value="{{ $data['pendapatan_sebelum'] }}"
                            required placeholder="Rp. 500.000/Bulan" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Pendapatan Setelah Kejadian:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="pendapatan_setelah" type="text" value="{{ $data['pendapatan_setelah'] }}"
                            required placeholder="Rp. 200.000/Bulan" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Rerata Penurunan Pendapatan:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="penurunan_pendapatan" type="text" value="{{ $data['penurunan_pendapatan'] }}"
                            required placeholder="Rp. 250.000" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jumlah Tanggungan Keluarga:</label>
                        <input class="mt-1 w-full rounded-md border p-2 text-gray-900 focus:ring focus:ring-blue-500"
                            name="tanggungan" type="text" value="{{ $data['tanggungan'] }}" required
                            placeholder="2 Orang (1 Kuliah 1 Sekolah)" />
                    </div>

                    <div class="mb-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="no_surat">NO
                            Surat:</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="no_surat" name="no_surat" type="text" value="{{ $no_surat }}"
                            placeholder="Contoh : 145 / DU-BP / 2023 / 2023 /2024" />
                    </div>

                    <button
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                        type="submit">Submit</button>
                </form>
            </div>
        </div>
        @push('after-scripts')
        @endpush
</x-app-layout>
