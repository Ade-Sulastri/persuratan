<x-supervisor.layout>
    <!-- component -->
    <div>
        <div class="container w-2/3 mx-auto px-5 mt-5">
            <div class="mt-5">
                <h2 class="font-semibold text-xl text-gray-600">Tambah Surat</h2>
                <p class="text-gray-500 mb-6"></p>

                <div class="bg-white rounded shadow-lg md:p-8 mb-4 border">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-2 lg:grid-cols-2">
                        <div class="lg:col-span-3">
                            <form action="{{ route('submitSurat') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm col">
                                    <div class="col">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" name="no_surat" id="no_surat"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Masukkan No Surat" />
                                    </div>

                                    <div class="col">
                                        <label for="tanggal_surat">Tanggal Surat</label>
                                        <input type="date" name="tanggal_surat" id="tanggal_surat"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="tanggal_surat" />
                                    </div>

                                    <div class="col">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" name="perihal" id="perihal"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Masukkan Perihal" />
                                    </div>

                                    <div class="col mt-3">
                                        <input type="file" name="file" id="file" value="file" />
                                    </div>


                                    <div class="col text-right">
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
    </div>
</x-supervisor.layout>
