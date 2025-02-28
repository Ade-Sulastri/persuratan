<x-supervisor.layout>
    <div class="container w-full mx-auto px-5 mt-5">
        <div class="mb-5">
            <h1 class="text-xl font-semibold">Management User</h1>
        </div>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Nip User</th>
                        <th data-priority="3">Username</th>
                        <th data-priority="4">Email</th>
                        <th data-priority="5">Tanggal Aktif</th>
                        <th data-priority="6">Tanggal Non-aktif</th>
                        <th data-priority="7">Kode Satker</th>
                        <th data-priority="8">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUser as $user)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $user->nip }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('m/d/Y') }}</td>
                            <td>{{ $user->tanggal_nonaktif ? date('m/d/Y', strtotime($user->tanggal_nonaktif)) : '--/--/----' }}
                            </td>
                            <td>{{ $user->kode_satker }}</td>
                            <td class="flex justify-center gap-x-2">
                                <!-- Hapus Button -->
                                <button onclick="openModalConfirm('{{ $user->nip }}')" type="button"
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
                                    onclick="openModal('{{ $user->nip }}', '{{ addslashes($user->username) }}', '{{ addslashes($user->email) }}', '{{ $user->tanggal_nonaktif ? date('Y-m-d', strtotime($user->tanggal_nonaktif)) : '' }}', '{{ $user->kode_satker }}')"
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
    </div>


    {{-- MODAL EDIT USER --}}
    <div class="relative z-10" style="display: none" aria-labelledby="modal-title" role="form" aria-modal="true"
        id="editUserModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <h1 class="text-lg font-semibold mb-3">Edit User</h1>
                        <form id="editUserForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 gap-y-2 text-sm col">
                                <div class="col">
                                    <label for="nip">Nip User</label>
                                    <input type="number" name="nip" id="modal_nip"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        oninput="this.value = this.value.slice(0, 18);" readonly required/>
                                    @error('nip')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="modal_username"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" readonly required/>
                                </div>
                                <div class="col">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="modal_email"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" readonly required/>
                                    @error('email')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col mt-3">
                                    <label for="tanggal_nonaktif">Tanggal Non-Aktif</label>
                                    <input type="date" name="tanggal_nonaktif" id="modal_tanggal_nonaktif"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="col mt-3">
                                    <label for="kode_satker">Kode Satker</label>
                                    <input type="number" name="kode_satker" id="modal_kode_satker"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        oninput="this.value = this.value.slice(0, 6);" required />
                                </div>
                                <div class="col text-right flex items-center justify-end mt-3">
                                    <div class="bg-gray-50 sm:flex sm:flex-row-reverse sm:px-2">
                                        <button type="button" onclick="closeModalEditUser()"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white ring-gray-300 hover:bg-red-700 sm:mt-0 sm:w-auto">Cancel</button>
                                    </div>
                                    <div class="inline-flex items-end">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DELETE USER --}}
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        id="confirmModal">
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
                                    <p class="text-sm text-gray-500">Apakah Anda Yakin Delete file ini?</p>
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

                        <form id="deleteUser" action="" method="POST">
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

    <script>
        function openModal(nip, username, email, tanggal_nonaktif, kode_satker) {
            const formattedDate = tanggal_nonaktif ? new Date(tanggal_nonaktif).toISOString().split('T')[0] : '';

            document.getElementById('modal_nip').value = nip;
            document.getElementById('modal_username').value = username;
            document.getElementById('modal_email').value = email;
            document.getElementById('modal_tanggal_nonaktif').value = formattedDate;
            document.getElementById('modal_kode_satker').value = kode_satker;
            document.getElementById('editUserForm').action = `/update-user/${nip}`;
            document.getElementById('editUserModal').style.display = 'block';
        }

        function closeModalEditUser() {
            document.getElementById('editUserModal').style.display = 'none';
        }


        function openModalConfirm(nip) {
            document.getElementById('confirmModal').classList.remove('hidden');
            document.getElementById('deleteUser').action = `/delete-user/${nip}`;
        }

        function closeModalConfirm() {
            document.getElementById('confirmModal').classList.add('hidden');
        }
    </script>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            }).columns.adjust().responsive.recalc();
        });
    </script>
</x-supervisor.layout>
