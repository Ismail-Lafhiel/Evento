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
                        @foreach ($events as $event)
                                <div onclick="window.location.href = '{{ route('event', $event->id) }}'"
                                    class="bg-gradient-to-b cursor-pointer from-primary-800 to-primary-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                                    <img src="{{ asset('storage/' . $event->event_img) }}" alt="Blog Post 1"
                                        class="w-full h-64 object-cover" />
                                    <div class="p-6">
                                        <h3 class="text-2xl font-semibold mb-2 capitalize">{{ $event->title }}</h3>
                                        <p class="text-sm opacity-75 capitalize truncate">{{ $event->description }}</p>
                                        <a href="{{route("event", $event->id)}}"
                                            class="mt-4 inline-block text-blue-200 text-sm hover:underline">Discover</a>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</x-guest-layout>
