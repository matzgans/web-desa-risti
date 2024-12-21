<x-landing-layout>
    <!-- Profile. -->
    <div data-aos="zoom-in" class="mt-28 text-center">
        <h1 class="text-darken text-2xl font-semibold">Sejarah Desa <span class="text-gray-500">Katialada</span></h1>
        <p class="text-gray-500 my-5 lg:px-96 text-justify">Menurut perkiraan para Panggoba Desa Katialada dibuka tahun
            1918. Saat itu
            masih hutan belukar yang belum bernama, saat itu pula ada sekelmpok masyarakat yang menjelajahi hutan
            tersebut, mereka berencana untuk membuka hutan belukar tersebut. Setelah melakukan diskusi dalam hal ini
            untuk membuka hutan belukar kelompok masyarakat tersebut mengangkat salah seorang diantara mereka sebagai
            pimpinan rombongan yaitu Teme Yedji.
            <br>
            <br>
            Kelompok Teme Yedji tersebut mulai melakukan penjelajahan hutan dimulai menjelang malam sampai menjelang
            siang (dini hari) atau dengan bahasa Gorontalo ILOBANGA. Saat dini hari mereka sudah sampai pada suatu
            lokasi yang terdapat dua jenis pohon kayu dengan jumlahnya tidak sedikit. Dua jenis kayu itu disebut dalam
            bahasa Gorontalo OMBULO TANGO-TANGO dan HUTIYA WABANGA. Kemudian rombongan Tem Yedji melanjutkan perjalanan
            dan kembali menemukan sbuah batu berukuran besar permukaannya berbentuk datar atau dalam bahasa Gorontalo
            BOTU PAYATA. Selanjutnya tempat itu dijadikan sebagai tempat peristrahatan sekaligus sebagai tempat
            pelaksanaan Musyawarah dan diskusi.
            <br>
            <br>
            Dalam diskusi tersebut mereka membahas bahwa hutan belukar itu akan dibuka menjadi suatu perkumpulan
            masyarakat atau sekarang dikanela dengan perkampungan.
            Setelah mendapat persetujuan dari seluruh anggotan rombongan tentang rencana pembukaan hutan menjadi satu
            perkampungan atau Desa kemudian dilanjutkan dengan proses pemberian Nama perkampungan atau Nama Desa.
            Dalam
            diskusi tersebut berbagai macam usulan pendapat yang muncul, namun dari semua usulan tersebut terdapat satu
            usulan nama Desa yang berhubungan dengan nama-nama kayu yang ditemui selama penjelajahan yaitu WABANGA. Nama
            WABANGA tersebut kemudian masih diproses melalui pertemuan-pertemuan, sehingga menjadi Katialada, dan tepatnya
            pada tanggal 27 JULI 1918 dilaksanakan pertemuan secara umum tentang Pengesahan nama Desa yaitu DESA Katialada
            sekaligus Penobatan Kepala Desa pertama yaitu yang bernama ISHAK
        </p>
    </div>

    <!-- Visi Misi. -->
    <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-24" id="visi-misi">
        <h1 class="font-bold text-darken my-3 text-2xl text-yellow-500">Visi Misi Desa <span
                class="text-gray-500">Katialada</span>
        </h1>
        <p class="leading-relaxed text-gray-500">Melalui platform ini, kami juga menyampaikan visi dan misi Desa
            Katialada, yang menjadi landasan utama dalam setiap langkah pembangunan dan pemberdayaan masyarakat. Mari
            bersama-sama mewujudkan desa yang mandiri, maju, dan sejahtera.
        </p>
    </div>
    <!-- card -->
    <div class="grid md:grid-cols-3 gap-14 md:gap-5 mt-20 lg:px-52 bg-gray-100 lg:py-10">
        @foreach ($visionsMissions as $data)
            <div data-aos="fade-up" class="bg-white shadow-xl p-6 text-center rounded-xl">
                <div
                    class="rounded-full w-16 h-16 flex p-10 items-center bg-gray-600 justify-center mx-auto shadow-lg transform -translate-y-12">
                    <p class="text-white font-semibold">Visi <br>& <br>Misi</p>
                </div>
                <div class="text-justify">
                    <h1 class="text-darken mb-3 text-xl text-gray-500 font-medium lg:px-14"><span
                            class="text-black">Visi : </span>
                        {{ $data->visi }}</h1>
                    <h1 class="text-darken mb-3 text-xl text-gray-500 font-medium lg:px-14"><span
                            class="text-black">Misi : </span>
                        {{ $data->misi }}</h1>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Program Unggulan. -->
    <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-24 " id="program-unggulan">
        <h1 class="font-bold text-darken my-3 text-2xl text-yellow-500">Program Unggulan Desa <span
                class="text-gray-500">Katialada</span>
        </h1>
        <p class="leading-relaxed text-gray-500">Melalui platform ini, kami juga menyampaikan program unggulan Desa
            Katialada, yang menjadi fokus utama dalam meningkatkan kesejahteraan dan kualitas hidup masyarakat.
            Program-program ini dirancang untuk mengoptimalkan potensi desa dan mendorong pembangunan yang
            berkelanjutan. Bersama-sama, mari kita wujudkan desa yang tangguh, inovatif, dan berdaya saing.</p>
    </div>

    @foreach ($priorityPrograms as $index => $data)
        @if ($index % 2 !== 0)
            <!-- Cek jika indeks sekarang ganjil -->
            <div class="mt-10 items-center px-10 sm:flex sm:space-x-8 lg:ml-56">
                <div class="relative sm:w-1/2" data-aos="fade-right">
                    <div class="absolute -left-4 -top-3 z-0 h-12 w-12 animate-pulse rounded-full bg-gray-600"></div>
                    <h1 class="text-darken relative z-50 text-2xl font-semibold lg:pr-10">{{ $data->program_name }}
                    </h1>
                    <p class="py-5 lg:pr-32">{{ $data->description }}</p>
                </div>
                <div class="relative mt-10 sm:mt-0 sm:w-1/2" data-aos="fade-right">
                    <img class="lg:size-6/12 relative z-40 rounded-xl"
                        src="{{ asset('landing/images/logo-gorut.png') }}" alt="">
                </div>
            </div>
        @else
            <!-- Jika indeks sekarang genap -->
            <div class="sm:flex items-center sm:space-x-8 mt-10 px-10 lg:px-56 flex-row-reverse bg-gray-100 lg:py-10">
                <div class="relative sm:w-1/2" data-aos="fade-right">
                    <div class="absolute -left-4 -top-3 z-0 h-12 w-12 animate-pulse rounded-full bg-gray-600"></div>
                    <h1 class="text-darken relative z-50 text-2xl font-semibold lg:pr-10">{{ $data->program_name }}
                    </h1>
                    <p class="py-5 lg:pr-32">{{ $data->description }}</p>
                </div>
                <div class="relative mt-10 sm:mt-0 sm:w-1/2" data-aos="fade-right">
                    <img class="lg:size-6/12 relative z-40 rounded-xl"
                        src="{{ asset('landing/images/logo-gorut.png') }}" alt="">
                </div>
            </div>
        @endif
    @endforeach

    {{-- <div data-aos="zoom-in" class="mt-16 text-center">
        <h1 class="text-darken text-2xl font-semibold mb-5">Struktur Desa <span class="text-gray-500">Katialada</span></h1>
        <div class=" flex  justify-center">
            <img src="{{ asset('landing/images/struktur-desa.webp') }}" alt="struktur-desa" loading="lazy"
                class="px-20" width="1000">
        </div>
    </div> --}}

    <div data-aos="zoom-in" class="mt-16 text-center">
        <h1 class="text-darken text-2xl font-semibold">Aparat Pemerintah Desa <span class="text-gray-500">Katialada</span>
        </h1>
        <p class="text-gray-500 my-5 lg:px-96">Aparat Pemerintah Desa Katialada terdiri dari individu-individu yang
            berdedikasi dan berkomitmen untuk meningkatkan kesejahteraan masyarakat. Dengan berlandaskan pada prinsip
            transparansi dan akuntabilitas, mereka bekerja sama dalam merencanakan, melaksanakan, dan mengevaluasi
            berbagai program pembangunan yang berfokus pada pemberdayaan masyarakat. Tim ini berkomitmen untuk menjalin
            komunikasi yang baik dengan warga, mendengarkan aspirasi, serta memberikan solusi yang tepat guna. Mari kita
            dukung setiap langkah dan upaya mereka untuk menjadikan Desa Katialada lebih maju dan sejahtera.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            @foreach ($currentVillageHead as $currentVillageHead)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div href="#">
                        <img class="w-full h-96 object-cover rounded-t-lg"
                            src="{{ asset('structure/staff_profile/' . $currentVillageHead->staff_photo) }}"
                            alt="" />
                    </div>
                    <div class="p-5">
                        <div href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $currentVillageHead->staff_name }}
                            </h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Kepala Desa</p>
            @endforeach
        </div>
    </div>

    @foreach ($employees as $employee)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div href="#">
                <img class="w-full h-96 object-cover rounded-t-lg"
                    src="{{ asset('structure/staff_profile/' . $employee->staff_photo) }}" alt="" />
            </div>
            <div class="p-5">
                <div href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $employee->staff_name }}
                    </h5>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $employee->position }}
                </p>

            </div>
        </div>
    @endforeach

    </div>

    </div>


    <div data-aos="zoom-in" class="mt-16 text-center">
        <h1 class="text-darken text-2xl font-semibold">Daftar Kepala Desa <span class="text-gray-500">Katialada</span></h1>
        <p class="text-gray-500 my-5 lg:px-96">Di bawah kepemimpinan yang visioner, Desa Katialada dipimpin oleh kepala
            desa yang berkomitmen untuk membawa perubahan dan kemajuan. Berikut adalah daftar kepala desa yang telah
            memimpin desa kami:</p>

        <div class="flex flex-wrap justify-center gap-4">

            @foreach ($formerVillageHeads as $formerVillageHead)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div href="#">
                        <img class="w-full h-96 object-cover rounded-t-lg"
                            src="{{ asset('structure/staff_profile/' . $formerVillageHead->staff_photo) }}"
                            alt="" />
                    </div>
                    <div class="p-5">
                        <div href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $formerVillageHead->staff_name }}
                            </h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $formerVillageHead->staff_description }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>

    </div>


</x-landing-layout>
