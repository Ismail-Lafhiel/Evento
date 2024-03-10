<x-app-layout>
    <main class="profile-page">
        <section class="relative block h-500-px">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @endif
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <a href="{{ route('profile.show') }}"
                                        class="bg-primary-500 active:bg-primary-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                        type="button">
                                        Edit Account
                                    </a>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    @role('organizer')
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfEvents }}</span><span
                                                class="text-sm text-blueGray-400">Events</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $approvedEvents }}</span><span
                                                class="text-sm text-blueGray-400">Approved Events</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $deniedEvents }}</span><span
                                                class="text-sm text-blueGray-400">Denied Events</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfApplications }}</span><span
                                                class="text-sm text-blueGray-400">Bookings Received</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfApplications }}</span><span
                                                class="text-sm text-blueGray-400">Bookings Received</span>
                                        </div>
                                    @endrole
                                    @role('spectator')
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfBookedEvents  }}</span><span
                                                class="text-sm text-blueGray-400">Booked Events</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfApprovedBookings }}</span><span
                                                class="text-sm text-blueGray-400">Approved Reservations</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span
                                                class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $numberOfDeniedBookings }}</span><span
                                                class="text-sm text-blueGray-400">Denied Reservations</span>
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12 mb-6">
                            <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                                {{ $user->name }}
                            </h3>
                            <div class="mb-2 text-blueGray-600 mt-10">
                                <i
                                    class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{ $user->getRoleNames()->implode(', ') }}
                            </div>
                        </div>
                        @role('spectator')
                            <div class="py-6">
                                <div class="w-full">
                                    @if (isset($reservations) && $reservations->isEmpty())
                                        <p>You have no reservations.</p>
                                    @elseif(isset($reservations))
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
                                            @foreach ($reservations as $reservation)
                                                <article
                                                    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 max-w-sm mx-auto mt-24">
                                                    <img src="{{ asset('storage/' . $reservation->event->event_img) }}"
                                                        alt="University of Southern California"
                                                        class="absolute inset-0 h-full w-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40">
                                                    </div>
                                                    <h3 class="z-10 mt-3 text-3xl font-bold text-white">
                                                        {{ $reservation->event->title }}</h3>
                                                    <div
                                                        class="z-10 gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                                                        {{ $reservation->status }}</div>
                                                </article>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endrole
                        @role('organizer')
                            <div class="py-6">
                                <div class="w-full">
                                    @if ($numberOfEvents > 0)
                                        <h3>Your Events</h3>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
                                            @foreach ($user->events as $event)
                                                <article
                                                    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 max-w-sm mx-auto mt-24">
                                                    <img src="{{ asset('storage/' . $event->event_img) }}"
                                                        alt="University of Southern California"
                                                        class="absolute inset-0 h-full w-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40">
                                                    </div>
                                                    <h3 class="z-10 mt-3 text-3xl font-bold text-white">
                                                        {{ $event->title }}</h3>
                                                    <div
                                                        class="z-10 gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                                                        {{ $event->reservation_status }}
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    @else
                                        <h3>No events</h3>
                                    @endif
                                </div>
                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </section>
        <x-footer/>
    </main>
</x-app-layout>
