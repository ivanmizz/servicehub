<x-app-layout>

    @include('admin.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">

            <div class="mb-4">
                <form method="GET" action="{{ route('admin.bookings') }}">
                    <label for="status" class="mr-2  dark:text-slate-100">Filter by Status:</label>
                    <select name="status" class="bg-slate-500 rounded-lg" id="status" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>
                            Approved
                        </option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>


                    </select>
                </form>
            </div>


            <!-- update modal -->
            @foreach ($bookings as $booking)
                <div id="update-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="update-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update booking
                                    details
                                </h3>
                                <form action="{{ route('booking.update', $booking->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class=" mb-4">
                                        <p class="text-gray-900 dark:text-white text-lg text-center">
                                        </p>

                                        <div class="mb-6 ">
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">message
                                            </label>
                                            <input type="text" id="message" name="message"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                        </div>

                                        <div>
                                            <label for="status"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                                status</label>
                                            <select id="status" name="status"
                                                class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="pending">Pending</option>
                                                <option value="approved">Approved</option>
                                                <option value="cancelled">Cancelled</option>
                                                <option value="completed">Completed</option>
                                            </select>

                                        </div>

                                        {{-- staff selection --}}
                                        <div>
                                            <label for="staff_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign
                                                staff</label>
                                            <<select id="staff_id" name="staff_id"
                                                class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($staffList as $staff)
                                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                                @endforeach
                                                </select>

                                        </div>




                                    </div>
                                    <div>

                                        <button type="submit"
                                            class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Update booking details
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Booked By</th>
                        <th class="px-6 py-3">Service</th>
                        <th class="px-6 py-3">Time Booked</th>
                        <th class="px-6 py-3">Message</th>
                        <th class="px-6 py-3">Assigned Staff</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $booking->id }}</td>
                            <td class="px-6 py-4">{{ $booking->user->name }}</td>
                            <td class="px-6 py-4">{{ $booking->service->name }}</td>
                            <td class="px-6 py-4">{{ $booking->created_at }}</td>
                            <td class="px-6 py-4">{{ $booking->message }}</td>
                            <td class="px-6 py-4">{{ $booking->staff ? $booking->staff->name : 'Not Assigned' }}</td>
                            <td class="px-6 py-4">{{ ucfirst($booking->status) }}</td>
                            <td class="px-6 py-4">
                                <button data-modal-target="update-modal"
                                    data-modal-toggle="update-modal-{{ $booking->id }}"
                                    href="{{ route('booking.edit', $booking->id) }}"
                                    class=" text-white bg-green-700 hover:bg-green-800  font-medium rounded text-sm px-2 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 "
                                    type="button">
                                    Update
                                </button>
                                <button type="button"
                                    class="text-white bg-rose-500 hover:bg-rose-600 px-2 py-2 rounded">Cancel</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $bookings->links('vendor.pagination.tailwind') }}
            </div>

        </div>
    </div>


</x-app-layout>
