<x-operator.layout-operator>
    {{-- @props(['dataSurat']) --}}

    <!--Container-->
    <div id="main-content" class="md:ml-64 w-full md:w-[calc(100%-16rem)] px-5 mt-20 transition-all duration-300">
        <div class="mb-5">
            <h1 class="text-xl font-semibold">Surat Keluar</h1>
        </div>
        <div class="flex justify-end items-center mb-5">
            <!-- Tombol Tambah Surat -->
            <button onclick="openModal('modalTambahSurat')"
                class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                + Tambah Surat
            </button>
        </div>
        <!--Card-->
        <div class="bg-white p-4 shadow-lg rounded-lg border-gray-200 border">
            {{-- <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white"> --}}

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
                    @foreach ($dataSurat as $data)
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

                                    <!-- Download Button -->
                                    <a href="{{ route('downloadSuratOperator', $data->generated_file_name) }}">
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
            {{-- </div> --}}
        </div>
        <!--/Card-->
    </div>
    <!--/container-->


    <!-- Modal Tambah Surat -->
    <div id="modalTambahSurat" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-1/2 p-6">
            <div class="flex justify-between items-center border-b pb-2">
                <h2 class="text-xl font-semibold">Tambah Surat</h2>
                <button onclick="closeModal('modalTambahSurat')" class="text-gray-500 hover:text-gray-700">✖</button>
            </div>
            <div class="mt-4">
                <form action="{{ route('submitSurat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4">
                        <div>
                            <label class="block">No Surat</label>
                            <input type="text" name="no_surat"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required />
                        </div>

                        <div>
                            <label class="block">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required />
                        </div>

                        <div>
                            <label class="block">Perihal</label>
                            <input type="text" name="perihal" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                required />
                        </div>

                        <div>
                            <label class="block">Upload File</label>
                            <input type="file" name="file" class="mt-1" required />
                        </div>

                        <div class="text-right">
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


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

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('flex');
            document.getElementById(id).classList.add('hidden');
        }
    </script>

</x-operator.layout-operator>
