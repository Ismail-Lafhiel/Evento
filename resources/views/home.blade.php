<x-guest-layout>
    <div class="bg-dots-darker bg-center bg-gray-50 dark:bg-gray-900">
        <x-header />
        <section>
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        Elevate Every Occasion!</h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                        Where Moments Become Memories, and Every Gathering Tells a Unique Story.</p>
                    @auth
                        <a href="{{route("discover-events")}}"
                            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Discover events
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        @else
                        <a href="{{route("register")}}"
                            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Get Started
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endauth
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('storage/img/undraw_festivities_tvvj.svg') }}" alt="mockup">
                </div>
            </div>
        </section>
        {{-- events section --}}
        <section>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">

                <div class="md:px-10 px-4 py-12">
                    <div class="max-md:max-w-lg mx-auto">
                        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Latest
                                Events
                            </h2>
                            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Browse through a
                                curated
                                list of upcoming events hosted through Evento. From weddings to corporate conferences,
                                find
                                inspiration for your next gathering.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div
                                class="bg-gradient-to-b from-indigo-800 to-indigo-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
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

                <div class="flex justify-center">
                    <button type="button"
                        class="text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-primary-100 focus:ring-4 focus:ring-primary-100 font-medium text-sm px-6 py-3 rounded-full me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-primary-700 dark:hover:border-primary-600 dark:focus:ring-primary-700">Discover
                        more</button>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
</x-guest-layout>
