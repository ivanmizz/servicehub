<x-app-layout>

    @include('admin.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">

            <div class="mb-4">
                <form method="GET" action="{{ route('admin.bookings') }}">
                    <label for="status" class="mr-2  dark:text-slate-100">Filter by Status:</label>
                    <select name="status" class="bg-slate-500 rounded-lg" id="status" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                        </option>


                        <!-- Add other statuses as required -->
                    </select>
                </form>
            </div>


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
                        {{-- <th class="px-6 py-3">Action</th> --}}
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
                            {{-- <td class="px-6 py-4">
                                <button type="button"
                                    class="text-white bg-green-500 hover:bg-green-600 px-2 py-1 rounded">Update</button>
                                <button type="button"
                                    class="text-white bg-rose-500 hover:bg-rose-600 px-2 py-1 rounded">Cancel</button>
                            </td> --}}

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
