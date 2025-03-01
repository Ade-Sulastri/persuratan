<x-supervisor.layout>
    {{-- @props(['dataSurat']) --}}

    <!--Container-->
    {{-- <div class="container w-full   mx-auto px-5 mt-5"> --}}
    <div id="main-content" class="md:ml-64 w-full md:w-[calc(100%-16rem)] px-5 mt-20 transition-all duration-300">
        <div class="container w-full mx-auto px-5 mt-24">
            <div class="mb-5">
                <h1 class="text-xl font-semibold">Surat Keluar</h1>
            </div>
            <!--Card-->
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Nip User</th>
                            <th data-priority="3">No Surat</th>
                            <th data-priority="4">Tanggal Surat</th>
                            <th data-priority="5">Perihal</th>
                            <th data-priority="6">File</th>
                            <th data-priority="7">Tanggal Input Data</th>
                            <th data-priority="8">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSuratKeluar as $data)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $data->nip_user }}</td>
                                <td>{{ $data->no_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_surat)->format('m/d/Y') }}</td>
                                <td>{{ $data->perihal }}</td>
                                <td>{{ $data->original_file_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('m/d/Y') }}</td>
                                <td class="flex justify-center">
                                    <div class="flex space-x-2">
                                        <!-- Hapus Button -->
                                        <button onclick="openModalConfirm('{{ $data->id }}')"
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
                                            onclick="openModalEditSurat('{{ $data->id }}', '{{ $data->no_surat }}', '{{ $data->tanggal_surat ? date('Y-m-d', strtotime($data->tanggal_surat)) : '' }}', '{{ $data->perihal }}', '{{ $data->original_file_name }}')"
                                            class="p-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path
                                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                            </svg>
                                        </button>
    
                                        <!-- Download Button -->
                                        <a href="{{ route('downloadSurat', $data->generated_file_name) }}">
                                            <button
                                                class="p-2 rounded-lg bg-green-500 hover:bg-green-600 text-white transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 15v-9" />
                                                    <path d="M9 12l3 3l3-3" />
                                                    <path d="M5 20h14" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--/Card-->
        </div>
    </div>
    <!--/container-->

    {{-- MODAL CONFIRM DELETE --}}
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
                        <form id="deleteSurat" action="" method="POST">
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

    {{-- MODAL UPDATE SURAT --}}
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="form" aria-modal="true"
        id="editSuratModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <h1 class="text-lg font-semibold mb-3">Edit User</h1>
                        <form id="editSuratForm" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 gap-y-2 text-sm col">
                                <div class="col">
                                    <label for="no_surat">No Surat</label>
                                    <input type="text" name="no_surat" id="modal_no_surat"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="col">
                                    <label for="tanggal_surat">Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" id="modal_tanggal_surat"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="col">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" id="modal_perihal"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="col mt-3">
                                    <p class="text-sm text-gray-600 mb-2" id="current_file_display"></p>
                                    <input type="file" name="file" id="modal_file" />
                                </div>
                                <div class="col text-right flex items-center justify-end mt-3">
                                    <div class="bg-gray-50 sm:flex sm:flex-row-reverse sm:px-2">
                                        <button type="button" onclick="closeModalEditSurat()"
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

    <script>
        function openModalEditSurat(id, no_surat, tanggal_surat, perihal, original_file_name) {
            document.getElementById('editSuratModal').classList.remove('hidden');
            document.getElementById('modal_no_surat').value = no_surat;
            document.getElementById('modal_tanggal_surat').value = tanggal_surat;
            document.getElementById('modal_perihal').value = perihal;
            document.getElementById('current_file_display').textContent = `Current file: ${original_file_name}`;
            document.getElementById('editSuratForm').action = `/update-surat/${id}`;
        }

        function closeModalEditSurat() {
            document.getElementById('editSuratModal').classList.add('hidden')
        }

        function openModalConfirm(id) {
            document.getElementById('confirmModal').classList.remove('hidden');
            document.getElementById('deleteSurat').action = `/delete-surat/${id}`;
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
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>

</x-supervisor.layout>
