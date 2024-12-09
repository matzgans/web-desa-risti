<x-landing-layout>
    <div data-aos="zoom-in" class="mt-16 text-center text-pretty">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-gray-900  px-10 lg:px-20">
            {{ $article->title }}</h1>
        <div class="flex justify-center md:px-56">
            <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="10" y1="16" x2="14" y2="16" />
            </svg>
            <p class="text-gray-500 px-10 my-2">Tanggal Upload : {{ $article->created_at }}</p>
            <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <circle cx="12" cy="5" r="2" />
                <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
            </svg>
            <p class="text-gray-500 px-10 my-2">Diupload Oleh Admin</p>
        </div>
        <div class=" flex  justify-center">
            <img src="{{ asset('article/thumb/' . $article->thumbnail) }}" alt="" loading="lazy" class="px-20"
                width="1000">
        </div>
        <p class="text-2xl mx-10 lg:mx-52 text-justify font-normal text-gray-600 lg:text-2xl">
            {{ $article->content }}
    </div>

    @if ($recomendationArticles->count() > 0)
        <div data-aos="zoom-in" class="mt-16 text-center">
            <h1 class="text-darken text-2xl font-semibold">Baca Artikel Lainnya</h1>
        </div>
    @endif
    <div data-aos="zoom-in-up" class="my-14 flex flex-col lg:flex-row lg:space-x-20  px-10 lg:px-56">
        @foreach ($recomendationArticles as $article)
            <div class="lg:w-6/12">
                <img class="w-full mb-6 rounded-xl" src="{{ asset('article/thumb/' . $article->thumbnail) }}"
                    alt="{{ $article->title }}" loading="lazy">
                <span
                    class="bg-yellow-500 text-darken font-semibold px-4 py-px text-sm rounded-full">{{ $article->created_at }}</span>
                <h1 class="text-gray-800 font-semibold my-3 text-xl">{{ $article->title }}</h1>
                <p class="text-gray-500 mb-3">{{ Str::limit($article->content, 30) }}</p>
                <a href="{{ route('article.detail', ['slug' => $article->slug]) }}" class="underline">Baca
                    Selengkapnya</a>
            </div>
        @endforeach
    </div>
</x-landing-layout>
