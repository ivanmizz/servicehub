<x-app-layout>




    @include('admin.sidebar')

    <div class="p-4 sm:ml-64">


        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">


            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add new employee
            </button>

            <!-- Main register staff modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add a new staff member
                            </h3>
                            <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" mb-4">
                                    <p class="text-gray-900 dark:text-white text-lg text-center">Add a new staff member
                                    </p>
                                    {{-- name --}}
                                    <div class="mb-6 ">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            name</label>
                                        <input type="text" id="name" name="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="Ivan Missana" required>
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-6 ">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee
                                            email</label>
                                        <input type="email" id="email" name="email"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="ivan@mycompany.com" required>
                                    </div>
                                    {{-- phone number --}}
                                    <div class="mb-6 ">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            Phone number</label>
                                        <input type="text" id="phone" name="phone" pattern="[0-9]{10}"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="0764051080" required>
                                    </div>
                                    {{-- department selection --}}
                                    <div>
                                        <label for="department"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                            department</label>
                                        <select id="department" name="department"
                                            class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($departmentList as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- name --}}
                                    <div class="mb-6 ">
                                        <label for="profession"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            Profession</label>
                                        <input type="text" id="profession" name="profession"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="Engineer" required>
                                    </div>

                                    {{-- profile photo upload --}}
                                    <div>

                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="user_avatar">Upload profile photo</label>
                                        <input name="image"
                                            class="block w-full text-sm mb-6 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="image" type="file">

                                    </div>
                                </div>
                                <div>

                                    <button type="submit"
                                        class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                                        new employee</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- update modal -->
            @foreach ($staffList as $staff)
            <div id="update-modal-{{ $staff->id }}" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="update-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update staff member
                                details
                            </h3>
                            <form action="{{ route('staff.update', $staff->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" mb-4">
                                    <p class="text-gray-900 dark:text-white text-lg text-center">Add a new staff member
                                    </p>
                                    {{-- name --}}
                                    <div class="mb-6 ">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            name</label>
                                        <input type="text" id="name" name="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            value="{{ old('name', $staff->name) }}">
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-6 ">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee
                                            email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', $staff->email) }}"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            >
                                    </div>
                                    {{-- phone number --}}
                                    <div class="mb-6 ">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            Phone number</label>
                                        <input type="text" id="phone" value="{{ old('phone', $staff->phone) }}" name="phone" pattern="[0-9]{10}"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            >
                                    </div>
                                    {{-- department selection --}}
                                    <div>
                                        <label for="department"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                            department</label>
                                        <select id="department" name="department" value="{{ old('phone', $staff->department) }}"
                                            class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($departmentList as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- name --}}
                                    <div class="mb-6 ">
                                        <label for="profession"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff
                                            Profession</label>
                                        <input type="text" id="profession" name="profession" value="{{ old('phone', $staff->profession) }}"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            >
                                    </div>

                                    {{-- profile photo upload --}}
                                    <div>

                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="user_avatar">Upload profile photo</label>
                                        <input name="image"
                                            class="block w-full text-sm mb-6 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="image" type="file">

                                    </div>
                                </div>
                                <div>

                                    <button type="submit"
                                        class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Update employee details
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach



            @if (session('success'))
                <div id="success-message"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif


            <div x-data="{ editModal: false, deleteModal: false, departmentIdToDelete: null }">



                <!-- Delete Staff Modal -->
                <div x-show="deleteModal" class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal">
                        @foreach ($staffList as $staff)
                            <tr>
                                <!-- other staff information columns -->
                                <td class="px-6 py-4">
                                    <!-- Edit Button -->
                                    <button @click="editModal = true"
                                        class="text-blue-600 hover:underline cursor-pointer">Edit</button>
                                    <!-- Delete Button -->
                                    <button @click="deleteModal = true; staffIdToDelete = {{ $staff->id }}"
                                        class="text-red-600 hover:underline cursor-pointer">Delete
                                    </button>
                                </td>
                            </tr>

                            <!-- Delete Staff Modal for this staff member -->
                            <div x-show="deleteModal && staffIdToDelete === {{ $staff->id }}"
                                class="fixed inset-0 flex items-center justify-center z-50">
                                <div class="modal">
                                    <!-- Modal Content for Deleting -->
                                    <div
                                        class="p-4 dark:bg-slate-900 border border-solid border-rose-500 bg-white shadow-md rounded-lg">
                                        <p class="text-xl text-center text-red-600">Confirm Deletion</p>
                                        <p class="text-center my-4 dark:text-white">Are you sure you want to remove
                                            this
                                            employee?</p>
                                        <div class="flex justify-center space-x-4">
                                            <!-- Cancel Button -->
                                            <button @click="deleteModal = false"
                                                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Cancel</button>
                                            <!-- Delete Button -->
                                            <form method="POST"
                                                action="{{ route('staff.destroy', $staff->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="relative overflow-x-auto shadow-md mt-4 sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Profession
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Department
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffList as $staff)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 ">
                                        {{ $staff->id }}
                                    </th>
                                    <td class="px-6 py-4 ">
                                        @if ($staff->image)
                                            <img src="{{ asset('storage/' . $staff->image) }}" alt="Staff Image"
                                                class="w-12 h-12 object-cover rounded-full">
                                        @else
                                            <img src="{{ asset('staff_images/profile.jpg') }}" alt="Default Image"
                                                class="w-12 h-12 object-cover rounded-full">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $staff->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->profession }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $staff->department->name }}
                                    </td>
                                    <td class="px-6 py-4">

                                        <!-- Edit Button -->
                                        <button data-modal-target="update-modal" data-modal-toggle="update-modal-{{ $staff->id }}"
                                            href="{{ route('staff.edit', $staff->id) }}"
                                            class=" text-white bg-green-700 hover:bg-green-800  font-medium rounded text-sm px-2 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 "
                                            type="button">
                                            Update
                                        </button>
                                        
                                        
                                        <!-- Delete Button -->
                                        <button @click="deleteModal = true; staffIdToDelete = {{ $staff->id }}"
                                            class="text-white bg-rose-700 hover:bg-rose-800  font-medium rounded text-sm px-2 py-2 text-center dark:bg-rose-600 dark:hover:bg-rose-700 ">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $staffList->links('vendor.pagination.tailwind') }}
                    </div>

                </div>

            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById("success-message");

            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 5000); // Hide the message after 5 seconds (5000 milliseconds)
            }
        });
    </script>




</x-app-layout>
