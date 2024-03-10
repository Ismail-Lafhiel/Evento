<x-app-layout>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <h2 class="text-4xl font-extrabold dark:text-white mb-10">Your reservations</h2>
            <div id="eventGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($reservations as $reservation)
                    <div {{-- onclick="window.location.href = '{{ route('event', $event->id) }}'" --}}
                        class="bg-gradient-to-b cursor-pointer from-primary-800 to-primary-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('storage/' . $reservation->event->event_img) }}" alt="Blog Post 1"
                            class="w-full h-64 object-cover" />
                        <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 capitalize">{{ $reservation->event->title }}</h3>
                        <p class="text-sm opacity-75 capitalize truncate">{{ $reservation->event->description }}</p>
                        <div class="flex justify-between align-baseline">
                            <a href="{{ route('event', $reservation->event->id) }}"
                                class="mt-4 inline-block text-blue-200 text-sm hover:underline">Generate ticket</a>
                            <span
                                class="mt-4 inline-block text-blue-200 text-md capitalize">{{ $reservation->event->category->category_name }}</span>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
