<x-guest-layout>
    <div id="sticky-banner" tabindex="-1"
        class="fixed top-0 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
                <span
                    class="inline-flex p-1 me-3 bg-gray-200 rounded-full dark:bg-gray-600 w-6 h-6 items-center justify-center flex-shrink-0">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                        <path
                            d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z" />
                    </svg>
                    <span class="sr-only">Light bulb</span>
                </span>
                <span>Comapny page is still under develop. Discover events <a href="{{route('discover-events')}}"
                        class="inline font-medium text-blue-600 underline dark:text-blue-500 underline-offset-2 decoration-600 dark:decoration-500 decoration-solid hover:no-underline">here</a></span>
            </p>
        </div>
        <div class="flex items-center">
            <button data-dismiss-target="#sticky-banner" type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
    <x-header />
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">About Us</h2>
                <p class="mb-4">Welcome to Evento! Discover the passion behind our platform, designed to simplify and
                    elevate event planning. Learn about our mission to connect event organizers with the perfect venues,
                    vendors, and services.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="office content 2">
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Services</h2>
                <p class="mb-4 font-bold">Seamless Event Booking</p>
                <p class="mb-4 font-light">Explore our user-friendly platform for effortless event planning. From venues
                    to catering and everything in between, Evento is your one-stop solution for creating unforgettable
                    experiences.</p>
                <a href="{{ route('discover-events') }}"
                    class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700">
                    Learn more
                    <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <h2 class="text-4xl font-bold text-left dark:text-white mb-10">FAQ</h2>
            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">How does Evento work?
                    </h3>
                    <p class="mb-4 text-left text-base font-normal text-gray-500 dark:text-gray-400">Evento simplifies
                        event
                        planning by providing a centralized platform to discover and book venues and services. Explore
                        options, customize your event details, and secure bookings – all in one place.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">What types of events can I
                        book
                        through Evento?</h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Evento caters to a wide
                        range of
                        events, from intimate gatherings to large-scale celebrations. Whether it's weddings, corporate
                        events, or social parties, our platform offers diverse options to suit your needs.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">Is it free to use Evento?
                    </h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Yes, Evento is free for
                        event organizers. Simply sign up, browse, and book your desired venues and services without any
                        additional fees.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">How do I create an account
                        on Evento?</h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Creating an account is
                        easy! Click on the "Sign Up" button, fill in your details, and you're ready to start planning
                        your events with Evento.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">Can I modify or cancel a
                        booking?</h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Yes, you can modify or
                        cancel a booking through your Evento account. Check the "My Bookings" section for options to
                        manage your upcoming events.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">What payment options are
                        accepted on Evento?</h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Evento accepts various
                        payment methods, including credit/debit cards. The accepted payment methods will be displayed
                        during the booking process.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <h3 class="text-lg text-left font-semibold text-gray-900 dark:text-white">How can I get in touch
                        with Evento support?</h3>
                    <p class="text-base text-left font-normal text-gray-500 dark:text-gray-400">Evento caters to a wide
                        For assistance, visit the "Contact Us" page, where you can find our support contact details.
                        We're here to help with any questions or concerns.</p>
                </li>
            </ol>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Testimonials</h2>
                <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole
                    collection of open-source web components and elements built with the utility classes from Tailwind
                </p>
            </div>
            <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Speechless with how easy this
                            was to integrate</h3>
                        <p class="my-4">"I recently got my hands on Flowbite Pro, and holy crap, I'm speechless with
                            how easy this was to integrate within my application. Most templates are a pain, code is
                            scattered, and near impossible to theme.</p>
                        <p class="my-4">Flowbite has code in one place and I'm not joking when I say it took me a
                            matter of minutes to copy the code, customise it and integrate within a Laravel + Vue
                            application.</p>
                        <p class="my-4">If you care for your time, I hands down would go with this."</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>Bonnie Green</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">Developer at Open AI</div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solid foundation for any
                            project
                        </h3>
                        <p class="my-4">"FlowBite provides a robust set of design tokens and components based on the
                            popular Tailwind CSS framework. From the most used UI components like forms and navigation
                            bars to the whole app screens designed both for desktop and mobile, this UI kit provides a
                            solid foundation for any project.</p>
                        <p class="my-4">Designing with Figma components that can be easily translated to the utility
                            classes of Tailwind CSS is a huge timesaver!"</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>Roberta Casas</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">Lead designer at Dropbox
                            </div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 lg:border-b-0 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mindblowing workflow and
                            variants</h3>
                        <p class="my-4">"As someone who mainly designs in the browser, I've been a casual user of
                            Figma, but as soon as I saw and started playing with FlowBite my mind was 🤯.</p>
                        <p class="my-4">Everything is so well structured and simple to use (I've learnt so much about
                            Figma by just using the toolkit).</p>
                        <p class="my-4">Aesthetically, the well designed components are beautiful and will
                            undoubtedly level up your next application."</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>Jese Leos</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">Software Engineer at
                                Facebook</div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-gray-200 md:p-12 dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Efficient Collaborating</h3>
                        <p class="my-4">"This is a very complex and beautiful set of elements. Under the hood it
                            comes with the best things from 2 different worlds: Figma and Tailwind.</p>
                        <p class="my-4">You have many examples that can be used to create a fast prototype for your
                            team."</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>Joseph McFall</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">CTO at Google</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="text-center">
                <a href="#"
                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Show
                    more...</a>
            </div>
    </section>
</x-guest-layout>
