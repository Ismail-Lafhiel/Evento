<x-guest-layout>
    <x-header />
    <div class="bg-dots-darker bg-center bg-gray-50 dark:bg-gray-900">
        <section>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                <div class="max-md:max-w-lg mx-auto">
                    <div class="w-full flex align-baseline justify-between sm:mb-4 md:mb-6 lg:mb-10">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Avaible
                            Events
                        </h2>
                        <form id="searchForm" class="max-w-lg w-full justify-self-end"
                            data-url="{{ route('search.events') }}">
                            @csrf
                            <div class="flex">
                                <select id="category-dropdown" name="category" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown" name="name"
                                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="Type event title..." required />
                                    <button type="submit"
                                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="eventGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($events as $event)
                            <div onclick="window.location.href = '{{ route('event', $event->id) }}'"
                                class="bg-gradient-to-b cursor-pointer from-primary-800 to-primary-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                                <img src="{{ asset('storage/' . $event->event_img) }}" alt="Blog Post 1"
                                    class="w-full h-64 object-cover" />
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold mb-2 capitalize">{{ $event->title }}</h3>
                                    <p class="text-sm opacity-75 capitalize truncate">{{ $event->description }}</p>
                                    <div class="flex justify-between align-baseline">
                                        <a href="{{ route('event', $event->id) }}"
                                            class="mt-4 inline-block text-blue-200 text-sm hover:underline">Discover</a>
                                        <span
                                            class="mt-4 inline-block text-blue-200 text-md capitalize">{{ $event->category->category_name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="searchResults" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
    <script>
        const eventRoute = '{{ route('event', 0) }}';
    </script>
</x-guest-layout>
