<x-app-layout>



    @include('user.sidebar')

    <div class="p-4 sm:ml-64">

        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            </div>
        @endif


        <form action="{{ route('user.bookservice') }}" method="GET" class="mb-4">
            <select name="department" id="department" onchange="this.form.submit()"
                class="p-2 border rounded-lg dark:text-gray-100 dark:bg-slate-900">
                <option value="">All Departments</option>
                @foreach ($departmentList as $department)
                    <option value="{{ $department->id }}"
                        {{ request()->department == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="grid grid-cols-4 mt-4 gap-6">
            @foreach ($serviceList as $service)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- Display service image, fallback to default image if not available -->
                    <a href="#">
                        <img class="rounded-t-lg w-full h-48 object-cover"
                            src="{{ $service->image ? asset('storage/' . $service->image) : asset('service_images/default_service_image.jpg') }}"
                            alt="{{ $service->name }}" />
                    </a>
                    <div class="p-5">
                        <!-- Display service name -->
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $service->name }}</h5>


                        <!-- Display department name in italic -->
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 italic">
                            {{ $service->department->name }}</p>

                        <!-- Display service description -->
                        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $service->description }}</p>


                        <!-- Book Now Button -->
                        <button data-modal-target="bookingModal{{ $service->id }}"
                            data-modal-toggle="bookingModal{{ $service->id }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Book Now
                        </button>

                        @foreach ($serviceList as $service)
                            ...
                            <!-- Booking Modal for {{ $service->name }} -->
                            <div id="bookingModal{{ $service->id }}" data-modal-backdrop="static" tabindex="-1"
                                aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Booking: {{ $service->name }}
                                            </h3>
                                            <button type="button" data-modal-hide="bookingModal{{ $service->id }}"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('bookservice.store', $service) }}" method="POST">
                                            @csrf
                                            <div class="p-6 space-y-6">
                                                <textarea name="message" placeholder="You can tell us more about your requirements here" rows="4"
                                                    class="w-full border rounded-md"></textarea>
                                            </div>
                                            <div
                                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Confirm Booking
                                                </button>
                                                <button type="button"
                                                    data-modal-hide="bookingModal{{ $service->id }}"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            @endforeach
        </div>





    </div>

    </div>



</x-app-layout>
