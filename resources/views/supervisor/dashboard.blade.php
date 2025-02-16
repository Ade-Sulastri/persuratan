<x-supervisor.layout>
    <main class="">
        <div class="grid mb-4 pb-10 px-8 mx-4">
            <div class="grid grid-cols-12 gap-6">
                <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                    <div class="col-span-12 mt-8">
                        <div class="flex items-center h-10 intro-y">
                            <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
                            <div
                                class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                                <div class="p-6">
                                    <div class="flex items-center justify-between">
                                        <div class="p-3 bg-blue-50 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path fill="currentColor"
                                                    d="M4 4a2 2 0 0 1 2-2h8a1 1 0 0 1 .707.293l5 5A1 1 0 0 1 20 8v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm13.586 4L14 4.414V8zM12 4H6v16h12V10h-5a1 1 0 0 1-1-1zm0 7.5a1 1 0 0 1 1 1v2.586l.293-.293a1 1 0 0 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 1 1 1.414-1.414l.293.293V12.5a1 1 0 0 1 1-1" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-3xl font-bold text-gray-800">4.510</h3>
                                        <p class="mt-2 text-gray-600">Dokumen Masuk</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                                <div class="p-6">
                                    <div class="flex items-center justify-between">
                                        <div class="p-3 bg-green-50 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600"
                                                viewBox="0 0 512 512" fill="currentColor">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="m213.334 85.333l85.333 85.334v256h-256V85.333zM195.66 128H85.334v256H256V188.34zM384 33.83l89.75 89.752l-30.169 30.17l-38.249-38.239V256c0 45.7-35.924 83.01-81.074 85.229l-4.259.104v-42.666c22.493 0 40.921-17.406 42.55-39.483l.117-3.184l-.001-140.486l-38.247 38.238l-30.17-30.17z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-3xl font-bold text-gray-800">4.510</h3>
                                        <p class="mt-2 text-gray-600">Dokumen Keluar</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                                <div class="p-6">
                                    <div class="flex items-center justify-between">
                                        <div class="p-3 bg-purple-50 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path fill="currentColor"
                                                    d="M14 19.5c0-2 1.1-3.8 2.7-4.7c-1.3-.5-2.9-.8-4.7-.8c-4.4 0-8 1.8-8 4v2h10zm5.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5s3.5-1.6 3.5-3.5s-1.6-3.5-3.5-3.5M16 8c0 2.2-1.8 4-4 4s-4-1.8-4-4s1.8-4 4-4s4 1.8 4 4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-3xl font-bold text-gray-800">4.510</h3>
                                        <p class="mt-2 text-gray-600">Pengguna Online</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 mt-5">
                        <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                            <div class="bg-white p-4 shadow-lg rounded-lg border-gray-200">
                                <h1 class="font-bold text-base">Table</h1>
                                <div class="mt-4">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto">
                                            <div class="py-2 align-middle inline-block min-w-full">
                                                <div
                                                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">PRODUCT NAME</span>
                                                                    </div>
                                                                </th>
                                                                <th
                                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">Stock</span>
                                                                    </div>
                                                                </th>
                                                                <th
                                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">STATUS</span>
                                                                    </div>
                                                                </th>
                                                                <th
                                                                    class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">ACTION</span>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            <tr>
                                                                <td
                                                                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    <p>Apple MacBook Pro 13</p>
                                                                    <p class="text-xs text-gray-400">PC & Laptop
                                                                    </p>
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    <p>77</p>
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    <div class="flex text-green-500">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-5 h-5 mr-1" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                        <p>Active</p>
                                                                    </div>
                                                                </td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    <div class="flex space-x-4">
                                                                        <a href="#"
                                                                            class="text-blue-500 hover:text-blue-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-5 h-5 mr-1" fill="none"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                            </svg>
                                                                            <p>Edit</p>
                                                                        </a>
                                                                        <a href="#"
                                                                            class="text-red-500 hover:text-red-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-5 h-5 mr-1 ml-3" fill="none"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                            </svg>
                                                                            <p>Delete</p>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
                <!-- Card 1: Hasil Analisis 1 -->
                <div
                    class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <!-- Ikon -->
                            <div class="p-3 bg-blue-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2L2 22h20L12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-3xl font-bold text-gray-800" id="hasilAnalisis1">0</h3>
                            <p class="mt-2 text-gray-600">Hasil Analisis 1</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Hasil Analisis 2 -->
                <div
                    class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <!-- Ikon -->
                            <div class="p-3 bg-green-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2L2 22h20L12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-3xl font-bold text-gray-800" id="hasilAnalisis2">0</h3>
                            <p class="mt-2 text-gray-600">Hasil Analisis 2</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Hasil Analisis 3 -->
                <div
                    class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <!-- Ikon -->
                            <div class="p-3 bg-purple-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2L2 22h20L12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-3xl font-bold text-gray-800" id="hasilAnalisis3">0</h3>
                            <p class="mt-2 text-gray-600">Hasil Analisis 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-supervisor.layout>
