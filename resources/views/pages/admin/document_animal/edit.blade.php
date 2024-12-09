<x-app-layout>
    <div class="pt-4">
        <div class="max-w-full px-3 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-between rounded-lg bg-secondary p-4 text-white shadow-lg">
                <h2>Edit Data Surat Keterangan Hewan Keluar</h2>
                <a class="flex items-center hover:underline" href="{{ route('dashboard') }}">
                    <svg class="h-6 w-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    <span class="ml-3">Kembali</span>
                </a>
            </div>
            <div class="my-10">
                <form method="POST" action="{{ route('admin.document.animal.update', ['animal' => $id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                                :</label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" required name="name" value="{{ $data['name'] }}" />
                        </div>
                        <div>
                            <label for="age"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur : </label>
                            <input type="number" id="age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="21" required name="age" value="{{ $data['age'] }}" />
                        </div>
                        <div>
                            <label for="pekerjaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan :
                            </label>
                            <input type="text" id="pekerjaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pengusaha" required name="job" value="{{ $data['job'] }}" />
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                :</label>
                            <input type="tel" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jl. Manado" required name="address" value="{{ $data['address'] }}" />
                        </div>
                        <div>
                            <label for="nama-hewan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Hewan :
                            </label>
                            <input type="text" id="nama-hewan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Sapi" required name="animal" value="{{ $data['animal'] }}" />
                        </div>
                        <div>
                            <label for="jumlah-hewan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Hewan :
                            </label>
                            <input type="number" id="jumlah-hewan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="3" required name="total_animals" value="{{ $data['total_animals'] }}" />
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="place"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dibawah Ke : </label>
                        <input type="place" id="place"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" name="place" value="{{ $data['name'] }}" />
                        <div class="hidden">
                            <label for="type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Surat
                                :</label>
                            <input type="text" id="type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                placeholder="" required name="type" value="ket_hewan" />
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NO
                            Surat:</label>
                        <input type="text" id="no_surat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Contoh : 145 / DU-BP / 2023 / 2023 /2024" name="no_surat"
                            value="{{ $no_surat }}" />
                        <div class="hidden">
                            <label for="type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Surat:</label>
                            <input type="text" id="type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required name="type" value="ket_hewan" />
                        </div>
                    </div>

                    <div id="dynamic-inputs"></div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
        @push('after-scripts')
            <script>
                function confirmDelete(itemId, itemName) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Kamu akan mengapus " + itemName,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + itemId).submit();
                        }
                    });
                }

                function confirmPrint(itemId, itemName) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Kamu akan Print data  " + itemName,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('print-form-' + itemId).submit();
                        }
                    });
                }
            </script>
            <script>
                // Fungsi untuk mendapatkan nilai dari database
                function getValueFromDatabase(fieldName, index) {
                    const data = @json($data); // Convert PHP array ke JSON
                    const fieldKey = `${fieldName}_${index}`;
                    return data[fieldKey] || '';
                }

                // Fungsi untuk membuat form hewan secara dinamis
                function generateAnimalForms(jumlahHewan) {
                    const dynamicInputsContainer = document.getElementById('dynamic-inputs');
                    dynamicInputsContainer.innerHTML = ''; // Bersihkan form sebelumnya

                    for (let i = 1; i <= jumlahHewan; i++) {
                        // Ambil nilai dari database untuk setiap field
                        const genderValue = getValueFromDatabase('gender', i);
                        const skinColorValue = getValueFromDatabase('skin_color', i);
                        const brandValue = getValueFromDatabase('brand', i);
                        const totalValue = getValueFromDatabase('total', i);

                        const animalForm = `
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hewan ${i}</h3>
                            <div class="mb-6">
                                <label for="gender-${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Jenis Kelamin (Jantan/Betina) :
                                </label>
                                <input 
                                    type="text" 
                                    id="gender-${i}" 
                                    name="gender_${i}" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Jantan/Betina" 
                                    required 
                                    value="${genderValue}"
                                />
                            </div>
                            <div class="mb-6">
                                <label for="warna-bulu-${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Warna Bulu :
                                </label>
                                <input 
                                    type="text" 
                                    id="warna-bulu-${i}" 
                                    name="skin_color_${i}" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Warna Bulu" 
                                    required
                                    value="${skinColorValue}"
                                />
                            </div>
                            <div class="mb-6">
                                <label for="cap-merek-${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Cap/Merek :
                                </label>
                                <input 
                                    type="text" 
                                    id="cap-merek-${i}" 
                                    name="brand_${i}" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Cap/Merek" 
                                    required
                                    value="${brandValue}"
                                />
                            </div>
                            <div class="mb-6">
                                <label for="jumlah-${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Jumlah :
                                </label>
                                <input 
                                    type="number" 
                                    id="jumlah-${i}" 
                                    name="total_${i}" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Jumlah" 
                                    required
                                    value="${totalValue}"
                                />
                            </div>
                        </div>
                    `;
                        dynamicInputsContainer.insertAdjacentHTML('beforeend', animalForm);
                    }
                }

                // Saat halaman pertama kali dimuat
                document.addEventListener('DOMContentLoaded', function() {
                    // Ambil jumlah hewan dari backend
                    const jumlahHewan = parseInt({{ $data['total_animals'] ?? 0 }});

                    // Set nilai input jumlah hewan
                    const jumlahHewanInput = document.getElementById('jumlah-hewan');
                    if (jumlahHewanInput) {
                        jumlahHewanInput.value = jumlahHewan;
                    }

                    generateAnimalForms(jumlahHewan); // Buat form langsung saat halaman dimuat
                });

                // Tambahkan event listener untuk memperbarui form ketika input jumlah hewan berubah
                const jumlahHewanInput = document.getElementById('jumlah-hewan');
                if (jumlahHewanInput) {
                    jumlahHewanInput.addEventListener('input', function() {
                        const jumlahHewan = parseInt(this.value) || 0;
                        generateAnimalForms(jumlahHewan); // Perbarui form saat input berubah
                    });
                }
            </script>
        @endpush
</x-app-layout>
