<x-app-layout>

    @include('user.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Service Booked</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Assigned Staff</th>
                            <th scope="col" class="px-6 py-3">Date Booked</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $booking->id }}</td>
                                <td class="px-6 py-4">{{ $booking->service->name }}</td>
                                <td class="px-6 py-4">{{ ucfirst($booking->status) }}</td>
                                <td class="px-6 py-4">
                                    {{ $booking->staff ? $booking->staff->name : 'Not Assigned Yet' }}
                                </td>
                                <td class="px-6 py-4">{{ $booking->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    @if ($booking->status !== 'completed')
                                        <form action="{{ route('booking.cancel', $booking->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-white bg-red-500 hover:bg-red-600 p-2 rounded">
                                                Cancel
                                            </button>
                                        </form>
                                    @else
                                        Completed
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="6" class="px-6 py-4 text-center">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex justify-center mt-4">
                {{ $bookings->links('pagination::tailwind') }}
                </div>

            </div>
            
        </div>
    </div>

</x-app-layout>
