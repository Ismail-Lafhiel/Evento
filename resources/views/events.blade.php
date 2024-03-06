<x-guest-layout>
    <x-header />
    <div class="bg-dots-darker bg-center bg-gray-50 dark:bg-gray-900">
        <section>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                <div class="max-md:max-w-lg mx-auto">
                    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Avaible Events
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div onclick="window.location.href = '{{ route('event') }}'"
                            class="cursor-pointer bg-gradient-to-b from-indigo-800 to-indigo-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <img src="https://readymadeui.com/cardImg.webp" alt="Blog Post 1"
                                class="w-full h-64 object-cover" />
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2">Lorem Ipsum Dolor</h3>
                                <p class="text-sm opacity-75">Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore...</p>
                                <a href="javascript:void(0);"
                                    class="mt-4 inline-block text-blue-200 text-sm hover:underline">Read
                                    More</a>
                            </div>
                        </div>
                        <div
                            class="bg-gradient-to-b from-purple-800 to-purple-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <img src="https://readymadeui.com/hotel-img.webp" alt="Blog Post 2"
                                class="w-full h-64 object-cover" />
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2">Consectetur Adipiscing</h3>
                                <p class="text-sm opacity-75">Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore...</p>
                                <a href="javascript:void(0);"
                                    class="mt-4 inline-block text-pink-200 text-sm hover:underline">Read
                                    More</a>
                            </div>
                        </div>
                        <div
                            class="bg-gradient-to-b from-teal-800 to-teal-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <img src="https://readymadeui.com/team-image.webp" alt="Blog Post 3"
                                class="w-full h-64 object-cover" />
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2">Lorem Ipsum Sit Amet</h3>
                                <p class="text-sm opacity-75">Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore...</p>
                                <a href="javascript:void(0);"
                                    class="mt-4 inline-block text-green-200 text-sm hover:underline">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</x-guest-layout>
