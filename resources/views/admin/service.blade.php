<x-app-layout>




    @include('admin.sidebar')

    <div class="p-4 sm:ml-64">


        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add new service
            </button>

            <!-- Main modal -->
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
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add a new service
                            </h3>
                            {{-- FORM FOR SERVICE INFORMATION --}}
                            <form action="{{ url('service') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" mb-4">
                                    <p class="text-gray-900 dark:text-white text-lg text-center">
                                    </p>
                                    {{-- Service name --}}
                                    <div class="mb-6 ">
                                        <label for="service"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                                            name</label>
                                        <input type="text" id="name" name="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="Tech support" required>
                                    </div>
                                    {{-- description --}}
                                    <div class="mb-6 ">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                                            description</label>
                                        <input type="text" id="description" name="description"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                            placeholder="Describe the service in one paragraph" required>
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



                                    {{-- photo upload --}}
                                    <div>

                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="user_avatar">Service picture</label>
                                        <input name="image"
                                            class="block w-full text-sm mb-6 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="image" type="file">

                                    </div>
                                </div>
                                <div>

                                    <button type="submit"
                                        class="mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                        new service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


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

            <div x-data="{ editModal: false, deleteModal: false, serviceIdToDelete: null }">
                <!-- Edit Department Modal -->
                <div x-show="editModal" class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal">
                        <!-- Modal Content for Editing -->
                        <div class="p-4 bg-white shadow-md rounded-md">
                            <!-- Add your edit form here -->
                            
                            <p>Edit Department Form</p>
                            <!-- Close Button -->
                            <button @click="editModal = false"
                                class="mt-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Cancel</button>
                        </div>
                    </div>
                </div>

                <!-- Delete service Modal -->
                <div x-show="deleteModal" class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal">
                        <!-- Modal Content for Deleting -->
                        <div class="p-4 dark:bg-slate-900 border border-solid border-rose-500 bg-white shadow-md rounded-lg">
                            <p class="text-xl text-center text-red-600">Confirm Deletion</p>
                            <p class="text-center my-4 dark:text-white">Are you sure you want to delete this service?</p>
                            <div class="flex justify-center space-x-4">
                                <!-- Cancel Button -->
                                <button @click="deleteModal = false"
                                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Cancel</button>
                                <!-- Delete Button -->
                                <form method="POST" x-bind:action="'{{ route('service.destroy', '') }}/' + serviceIdToDelete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Department
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Creation Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceList as $service)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 ">
                                        {{ $service->id }}
                                    </th>
                                    <td class="px-6 py-4 ">
                                        @if ($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="Staff Image"
                                                class="w-16 h-16 object-cover rounded-lg">
                                        @else
                                            <img src="{{ asset('service_images/default_service_image.jpg') }}"
                                                alt="Default Image" class="w-16 h-16 object-cover rounded-lg">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $service->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $service->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $service->department->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $service->created_at }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <!-- Edit Button -->
                                        <button @click="editModal = true"
                                            class="text-white bg-green-500 hover:bg-green-600 px-2 py-2 rounded">Edit</button>
                                        <!-- Delete Button -->
                                        <button
                                            @click="deleteModal = true; serviceIdToDelete = {{ $service->id }}"
                                            class="text-white bg-rose-500 hover:bg-rose-600 px-2 py-2 rounded">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $serviceList->links('vendor.pagination.tailwind') }}
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