<header class="sticky sm:fixed h-16 inset-0 z-50 border-b border-slate-100 bg-black/50 backdrop-blur-lg my-0 ">
    <nav class="mx-auto flex max-w-6xl gap-8 px-6 transition-all duration-200 ease-in-out lg:px-12 py-4">
        <div class="relative flex items-center">
            <a href="/">
                <img src="{{ asset('landing/images/logo-kabgor.png') }}" loading="lazy" style="color:transparent"
                    width="32" height="32">
            </a>
        </div>
        <!-- Menu untuk Desktop -->
        <ul class="hidden items-center justify-center gap-6 md:flex">
            <li class="pt-1.5 font-dm text-sm font-medium text-white">
                <a href="{{ route('landing.profile') }}">Profil Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium text-white">
                <a href="{{ route('landing.article') }}">Artikel Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium text-white">
                <a href="{{ route('landing.data') }}">Data Statistik Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium text-white">
                <a href="{{ route('documents.index') }}">Penyuratan</a>
            </li>
        </ul>
        <div class="flex-grow"></div>
        <!-- Tombol Login untuk Desktop -->
        <div class="hidden items-center justify-center gap-6 md:flex">
            <a href="{{ route('login') }}"
                class="rounded-md bg-gradient-to-br bg-black px-3 py-1.5 font-dm text-sm font-medium text-white shadow-md shadow-gray-400/50 transition-transform duration-200 ease-in-out hover:scale-[1.03]">
                Login
            </a>
        </div>
        <!-- Tombol Menu untuk Mobile -->
        <div class="relative flex items-center justify-center md:hidden">
            <button type="button" id="mobile-menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true" class="h-6 w-auto text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </button>
        </div>
    </nav>
    <!-- Menu Dropdown untuk Mobile -->
    <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-gray-800 text-white md:hidden">
        <ul class="flex flex-col gap-4 p-4">
            <li class="pt-1.5 font-dm text-sm font-medium">
                <a href="{{ route('landing.profile') }}">Profil Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium">
                <a href="{{ route('landing.article') }}">Artikel Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium">
                <a href="{{ route('landing.data') }}">Data Statistik Desa</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium">
                <a href="{{ route('documents.index') }}">Penyuratan</a>
            </li>
            <li class="pt-1.5 font-dm text-sm font-medium">
                <a href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    </div>

</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("mobile-menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        toggleButton.addEventListener("click", function() {
            mobileMenu.classList.toggle("hidden");
        });
    });
</script>
