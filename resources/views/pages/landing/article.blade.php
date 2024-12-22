<x-landing-layout>
    <div data-aos="zoom-in" class="mt-28 text-center">
        <h1 class="text-darken text-2xl font-semibold">Artikel Desa <span class="text-black">Katialada</span>
        </h1>
        <p class="text-gray-500 my-5 lg:px-96">
            {{ $content->artikel }}
        </p>
        <div class="flex flex-wrap justify-center lg:mx-52 gap-4" id="article-list">
            @foreach ($articles as $article)
                <div
                    class="flex flex-col max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('article.detail', ['slug' => $article->slug]) }}">
                        <img class="w-full h-96 object-cover rounded-t-lg"
                            src="{{ asset('article/thumb/' . $article->thumbnail) }}" alt="{{ $article->title }}" />
                    </a>
                    <div class="flex flex-col text-start flex-grow p-5 text-wrap">
                        <a href="{{ route('article.detail', ['slug' => $article->slug]) }}">
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white min-h-[3rem]">
                                {{ $article->title }}
                            </h5>
                            <p class="mb-2 font-light tracking-tight text-gray-900 dark:text-white">
                                {{ $article->created_at }}
                            </p>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                            {{ Str::limit($article->content, 100) }}
                        </p>
                        <a href="{{ route('article.detail', ['slug' => $article->slug]) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-blue-800 mt-auto">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $articles->links('vendor.pagination.tailwind') }}

</x-landing-layout>
