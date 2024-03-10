<x-guest-layout>
    <x-header />
    <div class="bg-dots-darker bg-center bg-gray-50 dark:bg-gray-900">
        @if (session()->has('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('warning'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('warning') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 lg:max-w-7xl max-lg:mx-auto mt-10">
            <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="w-full lg:sticky top-0 text-center">
                    <div class="lg:h-[600px]">
                        <img src="{{ asset('storage/' . $event->event_img) }}" alt="Product"
                            class="lg:w-11/12 w-full h-full rounded-xl object-cover object-top" />
                    </div>
                </div>
                <div>
                    <div class="flex flex-wrap items-start gap-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-gray-800 capitalize">{{ $event->title }}</h2>
                            <p class="text-sm text-gray-400 mt-2">{{ $event->category->category_name }}</p>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4 items-start">
                        <div>
                            <p class="text-gray-800 text-3xl font-bold">{{ $event->seats_number }} available seat</p>
                        </div>
                    </div>
                    <hr class="my-8" />
                    <div>
                        <p class="text-lg text-gray-600 capitalize">{{ $event->location }}</p>
                        <p class="text-sm text-gray-400 mt-2">{{ $event->event_date }}</p>
                    </div>
                    <hr class="my-8" />
                    <div class="flex flex-wrap gap-4">
                        <form action="{{ route('book.now', ['eventId' => $event->id]) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="min-w-[200px] px-4 py-3 bg-primary-800 hover:bg-primary-900 text-white text-sm font-bold rounded">Book
                                Now</button>
                        </form>
                        <a href="{{ route('discover-events') }}"
                            class="min-w-[200px] text-center px-4 py-2.5 border border-gray-800 bg-transparent hover:bg-gray-50 text-gray-800 text-sm font-bold rounded">Go
                            back</a>
                    </div>
                    <hr class="my-8" />
                    <div>
                        <p class="text-lg text-gray-600 capitalize">Owner</p>
                        <p class="text-sm text-gray-400 mt-2">{{ $event->user->name }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-24 max-w-4xl">
                <ul class="flex border-b">
                    <li
                        class="text-gray-800 font-bold text-sm bg-gray-100 py-3 px-8 border-b-2 border-gray-800 cursor-pointer transition-all">
                        Description</li>
                </ul>
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800">Event Description</h3>
                    <p class="text-sm text-gray-400 mt-4 capitalize">{{ $event->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-guest-layout>
