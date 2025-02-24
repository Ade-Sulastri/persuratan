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
    <link rel="shortcut icon" href="{{ asset('images/Logo_kementerian_keuangan_republik_indonesia.png') }}"
        type="image/x-icon">
    <title>Dashboard - Kanwil Sultra</title>
</head>

<body class="bg-gray-100">
    @if (session('success'))
        <x-alert.success :message="session('success')" />
    @endif

    <!-- Navbar -->
    <div class="fixed top-0 left-0 right-0 bg-[#2A3335] shadow-md z-10">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            <div class="flex items-center gap-x-5">
                <div class="w-12">
                    <img src="{{ asset('images/Logo_kementerian_keuangan_republik_indonesia.png') }}"
                        alt="Logo_Kemenkeu">
                </div>
                <div class="text-xl font-semibold text-white">Kanwil Sultra</div>
            </div>
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5 z-0">
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
                        <p class="text-3xl font-bold text-gray-800">{{ $dataSuratMasuk->count() ?? 0 }}</p>
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
                        <h3 class="text-3xl font-bold text-gray-800">{{ $dataSuratKeluar->count() ?? 0 }}</h3>
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
                        <h3 class="text-3xl font-bold text-gray-800">{{ $dataUsers->count() ?? 0 }}</h3>
                        <p class="mt-2 text-gray-600">Pengguna Terdaftar</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tambah Admin -->
        <div class="flex justify-end mt-6">
            <button onclick="tambahAdmin()"
                class="px-6 py-2 bg-[#2A3335] text-white rounded-lg shadow-lg hover:bg-gray-700 transition">
                + Tambah Admin
            </button>

        </div>

        <!-- Daftar Admin -->
        <!--Card table-->
        <div id='recipients' class="p-8 mt-6 lg:mt-5 rounded shadow bg-white">
            <h2 class="text-2xl font-bold mt-2 ml-2 mr-2 mb-7">Daftar Admin</h2>
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100 border-b border-gray-300">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Nip User</th>
                        <th class="border border-gray-300 px-4 py-2">Username</th>
                        {{-- <th class="border border-gray-300 px-4 py-2">Password</th> --}}
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Kode Satker</th>
                        <th class="border border-gray-300 px-4 py-2">Role</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAdmin as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}.</td>
                            <td class="border px-4 py-2">{{ $user->nip }}</td>
                            <td class="border px-4 py-2">{{ $user->username }}</td>
                            {{-- <td class="border px-4 py-2">{{ $user->password }}</td> --}}
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->kode_satker }}</td>
                            <td class="border px-4 py-2">{{ $user->role }}</td>
                            <td class="border px-4 py-2 flex justify-center gap-x-2">
                                <!-- Hapus Button -->
                                <button onclick="confirmDeleteAdmin('{{ $user->nip }}')"
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
                                    onclick="updateAdmin('{{ $user->nip }}', '{{ $user->username }}', '{{ $user->email }}', '{{ $user->kode_satker }}', '{{ $user->role }}')"
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
                    @endforeach

                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>

    {{-- MODAL TAMBAH ADMIN --}}
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="form" aria-modal="true"
        id="tambahAdminModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-semibold">Tambah Admin</h1>
                            <button onclick="closeModalAddAdmin()"
                                class="text-gray-500 hover:text-gray-700">✖</button>
                        </div>
                        <hr class="my-2">
                        {{-- FORM TAMBAH ADMIN --}}
                        <form action="{{ route('tambahAdmin') }}" method="POST">
                            @csrf
                            <div class="col">
                                <label for="nip">Nip User</label>
                                <input name="nip" maxlength="18" minlength="18" type="text"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Masukkan nip" />
                            </div>
                            <div class="col mt-3">
                                <label for="username">Username</label>
                                <input type="text" name="username"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Masukkan username" />
                            </div>
                            <div class="col mt-3">
                                <label for="password">Password</label>
                                <input type="password" minlength="8"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" name="password" placeholder="Masukkan password" />
                            </div>
                            <div class="col mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Masukkan email" />
                            </div>
                            <div class="col mt-3">
                                <label for="kode_satker">Kode Satker</label>
                                <input type="number" name="kode_satker" 
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>
                            <div class="col mt-3">
                                <label for="kode_satker">Role</label>
                                <div class="flex gap-x-2">
                                    <p class="text-gray-400">s: supervisor/admin</p>
                                    <p class="text-gray-400">o: operator/user</p>
                                </div>
                                <input type="text" minlength="1" maxlength="1" name="role"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>

                            {{-- button action --}}
                            <div class="col text-right flex items-center justify-end mt-3">
                                <div class="inline-flex items-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT ADMIN --}}
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="form" aria-modal="true"
        id="updateAdminModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-semibold">Edit Admin</h1>
                            <button onclick="closeModalUpdateAdmin()"
                                class="text-gray-500 hover:text-gray-700">✖</button>
                        </div>
                        <hr class="my-2">
                        {{-- FORM EDIT ADMIN --}}
                        <form id="editAdmin" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col">
                                <label for="nip">Nip User</label>
                                <input maxlength="18" minlength="18" type="text" name="nip" id="modal_nip"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>
                            <div class="col mt-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="modal_username"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>
                            <div class="col mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="modal_email"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>
                            <div class="col mt-3">
                                <label for="kode_satker">Kode Satker</label>
                                <input type="number" name="kode_satker" id="modal_kode_satker"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>
                            <div class="col mt-3">
                                <label for="kode_satker">Role</label>
                                <div class="flex gap-x-2">
                                    <p class="text-gray-400">s: supervisor/admin</p>
                                    <p class="text-gray-400">o: operator/user</p>
                                </div>
                                <input type="text" minlength="1" maxlength="1" name="role" id="modal_role"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                            </div>

                            {{-- button action --}}
                            <div class="col text-right flex items-center justify-end mt-3">
                                <div class="inline-flex items-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL CONFIRM DELETE ADMIN --}}
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="confirmModal">
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal panel -->
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- Icon -->
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-200 sm:mx-0 sm:h-10 sm:w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 1024 1024">
                                    <path fill="black"
                                        d="M512 64a448 448 0 1 1 0 896a448 448 0 0 1 0-896m0 832a384 384 0 0 0 0-768a384 384 0 0 0 0 768m48-176a48 48 0 1 1-96 0a48 48 0 0 1 96 0m-48-464a32 32 0 0 1 32 32v288a32 32 0 0 1-64 0V288a32 32 0 0 1 32-32" />
                                </svg>
                            </div>

                            <!-- Modal content -->
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Confirm
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Apakah Anda Yakin Hapus User ini?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal actions -->
                    <div class="flex justify-end items-center">
                        <div class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse">
                            <button type="submit" onclick="closeModalConfirm()"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-yellow-500 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                        <form id="deleteAdmin" action="" method="POST">
                            @csrf
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:pr-6">
                                <button type="submit"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
        });

        function tambahAdmin() {
            document.getElementById('tambahAdminModal').classList.remove('hidden');
        }

        function closeModalAddAdmin() {
            document.getElementById('tambahAdminModal').classList.add('hidden');
        }

        // UPDATE ADMIN
        function updateAdmin(nip, username, email, kode_satker, role) {
            document.getElementById('modal_nip').value = nip;
            document.getElementById('modal_username').value = username;
            document.getElementById('modal_email').value = email;
            document.getElementById('modal_kode_satker').value = kode_satker;
            document.getElementById('modal_role').value = role;
            document.getElementById('editAdmin').action = `/edit-admin/${nip}`;
            document.getElementById('updateAdminModal').classList.remove('hidden');
        }
        
        function closeModalUpdateAdmin() {
            document.getElementById('updateAdminModal').classList.add('hidden');
        }

        // DELETE ADMIN
        function confirmDeleteAdmin(nip) {
            document.getElementById('confirmModal').classList.remove('hidden');
            document.getElementById('deleteAdmin').action = `/delete-admin/${nip}`;
        }

        function closeModalConfirm() {
            document.getElementById('confirmModal').classList.add('hidden');
        }
    </script>
</body>

</html>
