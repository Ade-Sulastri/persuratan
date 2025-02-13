@props(['dataSurat'])

<!--Container-->
<div class="container w-full   mx-auto px-5 mt-5">

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
                    <th data-priority="6">Tanggal Input Data</th>
                    <th data-priority="7">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSurat as $surat)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $surat->nip_user }}</td>
                        <td>{{ $surat->no_surat }}</td>
                        <td>{{ $surat->tanggal_surat }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>{{ $surat->created_at }}</td>
                        <td>{{ $surat->status }}</td>
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
