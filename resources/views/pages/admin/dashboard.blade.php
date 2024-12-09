<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a class="mb-3 flex items-center justify-between rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                    type="button" href="refresh-view?token=fzrsahi"><svg class="h-6 w-6 text-gray-800 dark:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                    </svg>
                    Refresh Data Statistik
                </a>
            </div>
            <!-- Grid Section -->
            <div class="grid w-full grid-cols-3 gap-6">
                <!-- Card Penduduk -->
                <div class="bg-primary-100 overflow-hidden rounded-lg shadow-lg shadow-primary">
                    <div class="text-primary-900 flex items-center justify-around p-6">
                        <svg class="h-12 w-12 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <div class="text-3xl font-bold">{{ $resident }}</div>
                        <div class="text-xl font-bold">Penduduk</div>
                    </div>
                </div>
                <div class="bg-primary-100 overflow-hidden rounded-lg shadow-lg shadow-orange-600">
                    <div class="text-primary-900 flex items-center justify-around p-6">
                        <svg class="h-12 w-12 text-orange-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                        </svg>

                        <div class="text-3xl font-bold">{{ $dusun }}</div>
                        <div class="text-xl font-bold">Dusun</div>
                    </div>
                </div>
                <div class="bg-primary-100 overflow-hidden rounded-lg shadow-lg shadow-pink-500">
                    <div class="text-primary-900 flex items-center justify-around p-6">
                        <svg class="h-12 w-12 text-pink-600 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                clip-rule="evenodd" />
                        </svg>



                        <div class="text-3xl font-bold">{{ $article }}</div>
                        <div class="text-xl font-bold">Article</div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="mt-12 grid grid-cols-2 gap-6">
                <!-- Bar Chart -->
                <div class="rounded-lg bg-white p-6 shadow-lg">
                    <h2 class="mb-4 text-xl font-semibold">Statistik Tingkat Pendidikan Penduduk Menurut Tingkatan
                        Pendidikan
                    </h2>
                    <canvas id="barChart"></canvas>
                </div>

                <div class="rounded-lg bg-white p-6 shadow-lg">
                    <h2 class="mb-4 text-xl font-semibold">Statistik Penduduk Menurut Dusun
                    </h2>
                    <canvas id="barChartResident"></canvas>
                </div>

            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Bar Chart
        var labels = {!! json_encode(array_keys($totals)) !!}; // Mengambil key dari array sebagai label
        var dataValues = {!! json_encode(array_values($totals)) !!}; // Mengambil value dari array sebagai data
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Penduduk',
                    data: dataValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // statistik count resident based On village
        var labelsResident = {!! json_encode(array_keys($residentToArray)) !!}; // Mengambil key dari array sebagai label
        var dataValuesResident = {!! json_encode(array_values($residentToArray)) !!}; // Mengambil value dari array sebagai data
        const barNameResident = document.getElementById('barChartResident').getContext('2d');
        const barChartResident = new Chart(barNameResident, {
            type: 'bar',
            data: {
                labels: labelsResident,
                datasets: [{
                    label: 'Penduduk',
                    data: dataValuesResident,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
