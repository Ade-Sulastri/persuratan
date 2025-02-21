<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>DJPb</title>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <div class="fixed top-0 left-0 right-0 bg-[#2A3335] shadow-md z-50">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            <div class="text-xl font-semibold text-white">Super Admin</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-white text-[#2A3335] font-semibold hover:bg-gray-200 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="container w-full mx-auto px-5 mt-24">
        <!-- Cards for Surat Masuk, Surat Keluar, and Total User -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
            <div
                class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-blue-50 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path fill="currentColor"
                                    d="M4 4a2 2 0 0 1 2-2h8a1 1 0 0 1 .707.293l5 5A1 1 0 0 1 20 8v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm13.586 4L14 4.414V8zM12 4H6v16h12V10h-5a1 1 0 0 1-1-1zm0 7.5a1 1 0 0 1 1 1v2.586l.293-.293a1 1 0 0 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 1 1 1.414-1.414l.293.293V12.5a1 1 0 0 1 1-1" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-3xl font-bold text-gray-800">0</p>
                        <p class="mt-2 text-gray-600">Dokumen Masuk</p>
                    </div>
                </div>
            </div>
            <div
                class="transform hover:scale-105 transition duration-300 shadow-lg rounded-lg bg-white border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="p-3 bg-green-50 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" viewBox="0 0 512 512"
                                fill="currentColor">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path fill="currentColor"
                                    d="M14 19.5c0-2 1.1-3.8 2.7-4.7c-1.3-.5-2.9-.8-4.7-.8c-4.4 0-8 1.8-8 4v2h10zm5.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5s3.5-1.6 3.5-3.5s-1.6-3.5-3.5-3.5M16 8c0 2.2-1.8 4-4 4s-4-1.8-4-4s1.8-4 4-4s4 1.8 4 4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-gray-800">0</h3>
                        <p class="mt-2 text-gray-600">Pengguna Terdaftar</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Tambah Admin -->
        <div class="flex justify-end mt-6">
            <button id="tambahAdminBtn"
                class="px-6 py-2 bg-[#2A3335] text-white rounded-lg shadow-lg hover:bg-gray-700 transition">
                + Tambah Admin
            </button>
        </div>

        <!-- Daftar Admin -->
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-5 rounded shadow bg-white">
            <h2 class="text-2xl font-bold mt-2 ml-2 mr-2 mb-7">Daftar Admin</h2>
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100 border-b border-gray-300">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Nip User</th>
                        <th class="border border-gray-300 px-4 py-2">Username</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Aktif</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Non-aktif</th>
                        <th class="border border-gray-300 px-4 py-2">Kode Satker</th>
                        <th class="border border-gray-300 px-4 py-2">Role</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">1.</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2">tes</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center gap-x-2">
                            <!-- Hapus Button -->
                            <button
                                class="p-2 rounded-lg bg-red-500 hover:bg-red-600 text-white transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5">
                                        <path
                                            d="M5.47 6.015v12.514a2.72 2.72 0 0 0 2.721 2.721h7.618a2.72 2.72 0 0 0 2.72-2.72V6.014m-15.235.001h17.412" />
                                        <path
                                            d="M8.735 6.015V4.382a1.63 1.63 0 0 1 1.633-1.632h3.264a1.63 1.63 0 0 1 1.633 1.632v1.633M9.824 16.992v-5.439m4.353 5.439v-5.439" />
                                    </g>
                                </svg>
                            </button>

                            <!-- Edit Button -->
                            <button
                                class="p-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path
                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>


    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });

            $("#tambahAdminBtn").on("click", function() {
                alert("Form tambah admin akan muncul di sini!");
            });
        });
    </script>
</body>

</html>
