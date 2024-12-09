<x-app-layout>
    <div class="pt-4">
        <div class="max-w-7xl px-0 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-between rounded-lg bg-secondary p-4 text-white shadow-lg">

                <h2>Tambah Data Usaha Ekonomi Masyarakat</h2>
                <a class="flex items-center hover:underline" href="{{ route('admin.comunity.economy.index') }}">
                    <svg class="h-6 w-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    <span class="ml-3">Kembali</span>
                </a>
            </div>
            <div class="rounded-lg bg-white p-4 text-white shadow-lg">
                @if (Session::has('success'))
                    <div class="mb-4 flex w-full max-w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                        id="toast-success" role="alert">
                        <div
                            class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}</div>
                        <button
                            class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                            data-dismiss-target="#toast-success" type="button" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @elseif(Session::has('error'))
                    <div class="mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                        id="toast-danger" role="alert">
                        <div
                            class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ Session::get('error') }}</div>
                        <button
                            class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                            data-dismiss-target="#toast-danger" type="button" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                <form class="mx-auto max-w-full" action="{{ route('admin.comunity.economy.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 grid w-full grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                for="gender">Nama Dusun</label>
                            <select
                                class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                id="village_name" name="village_id" required>
                                <option value="">Pilih Dusun</option>
                                @foreach ($villages as $village)
                                    <option value="{{ $village->id }}" {{ old('village_id') }}>
                                        {{ $village->village_name }}
                                    </option>
                                @endforeach

                            </select>
                            @error('village_id')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="grid w-full grid-cols-3 gap-4">
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Pertokoan</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="pertokoan_count">Jumlah Pertokoan</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="pertokoan_count" name="pertokoan_count" type="number"
                                    value="{{ old('pertokoan_count') }}" placeholder="0" required />
                                @error('pertokoan_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="pertokoan_owner">Pemilik Pertokoan</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="pertokoan_owner" name="pertokoan_owner" type="number"
                                    value="{{ old('pertokoan_owner') }}" placeholder="0" required />
                                @error('pertokoan_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Perkiosan</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="perkiosan_count">Jumlah Perkiosan</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="perkiosan_count" name="perkiosan_count" type="number"
                                    value="{{ old('perkiosan_count') }}" placeholder="0" required />
                                @error('perkiosan_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="perkiosan_owner">Pemilik Perkiosan</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="perkiosan_owner" name="perkiosan_owner" type="number"
                                    value="{{ old('perkiosan_owner') }}" placeholder="0" required />
                                @error('perkiosan_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Rumah
                                Makan</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="rm_count">Jumlah Rumah Makan</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="rm_count" name="rm_count" type="number" value="{{ old('rm_count') }}"
                                    placeholder="0" required />
                                @error('rm_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="rm_owner">Pemilik Rumah Makan</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="rm_owner" name="rm_owner" type="number" value="{{ old('rm_owner') }}"
                                    placeholder="0" required />
                                @error('rm_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Perbengkelan</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="perbengkelan_count">Jumlah Bengkel</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="perbengkelan_count" name="perbengkelan_count" type="number"
                                    value="{{ old('perbengkelan_count') }}" placeholder="0" required />
                                @error('perbengkelan_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="perbengkelan_owner">Pemilik Bengkel</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="perbengkelan_owner" name="perbengkelan_owner" type="number"
                                    value="{{ old('perbengkelan_owner') }}" placeholder="0" required />
                                @error('perbengkelan_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Mebel</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="mebel_count">Jumlah Mebel</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="mebel_count" name="mebel_count" type="number"
                                    value="{{ old('mebel_count') }}" placeholder="0" required />
                                @error('mebel_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="mebel_owner">Pemilik Mebel</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="mebel_owner" name="mebel_owner" type="number"
                                    value="{{ old('mebel_owner') }}" placeholder="0" required />
                                @error('mebel_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Pangkalan
                                LPG</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="pangkalan_lpg_count">Jumlah Pangkalan LPG</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="pangkalan_lpg_count" name="pangkalan_lpg_count" type="number"
                                    value="{{ old('pangkalan_lpg_count') }}" placeholder="0" required />
                                @error('pangkalan_lpg_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="pangkalan_lpg_owner">Pemilik Pangkalan LPG</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="pangkalan_lpg_owner" name="pangkalan_lpg_owner" type="number"
                                    value="{{ old('pangkalan_lpg_owner') }}" placeholder="0" required />
                                @error('pangkalan_lpg_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Taylor</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="taylor_count">Jumlah Taylor</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="taylor_count" name="taylor_count" type="number"
                                    value="{{ old('taylor_count') }}" placeholder="0" required />
                                @error('taylor_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="taylor_owner">Pemilik Taylor</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="taylor_owner" name="taylor_owner" type="number"
                                    value="{{ old('taylor_owner') }}" placeholder="0" required />
                                @error('taylor_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-2">
                            <label
                                class="col-span-2 block text-sm font-medium text-gray-900 dark:text-white">Lainnya</label>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="lainnya_count">Jumlah Lainnya</label>
                                <input
                                    class="block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="lainnya_count" name="lainnya_count" type="number"
                                    value="{{ old('lainnya_count') }}" placeholder="0" required />
                                @error('lainnya_count')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-primary dark:text-white"
                                    for="lainnya_owner">Pemilik Lainnya</label>
                                <input
                                    class="col-span-2 block w-full rounded-lg border border-secondary bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary focus:ring-secondary dark:border-secondary dark:bg-gray-700 dark:text-white"
                                    id="lainnya_owner" name="lainnya_owner" type="number"
                                    value="{{ old('lainnya_owner') }}" placeholder="0" required />
                                @error('lainnya_owner')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <button class="mt-4 w-full rounded-lg bg-primary px-3 py-2 text-white hover:bg-secondary"
                        type="submit">
                        Simpan
                    </button>
                </form>

            </div>
        </div>



    </div>
    @push('after-scripts')
        <script>
            function previewImage(event) {
                const preview = document.getElementById('preview');
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.style.display = 'none';
                }
            }
        </script>
    @endpush
</x-app-layout>
