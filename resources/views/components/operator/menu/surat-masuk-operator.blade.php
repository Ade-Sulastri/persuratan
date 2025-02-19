<x-operator.layout-operator>
    {{-- @props(['dataSurat']) --}}
    <!--Container-->
    <div class="container w-full   mx-auto px-5 mt-5">
        <div class="mb-5">
            <h1 class="text-xl font-semibold">Surat Masuk Operator</h1>
        </div>

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white border">

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
                    @foreach ($dataSurat as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $surat->nip_user }}</td>
                            <td>{{ $surat->no_surat }}</td>
                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('m/d/Y') }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->original_file_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($surat->created_at)->format('m/d/Y') }}</td>
                            <td class="flex justify-center">
                                <div class="flex space-x-2">
                                    <!-- Hapus Button -->
                                    <form action="{{ route('deleteSuratOperator', $surat->id) }}" method="POST">
                                        @csrf
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
                                    </form>

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
                                    <a href="{{ route('downloadSuratOperator', $surat->generated_file_name) }}">
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
    <!--/container-->

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

</x-operator.layout-operator>
