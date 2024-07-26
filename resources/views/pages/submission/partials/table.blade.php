<table class="table" id="table-list">
    <thead>
        <tr>
            <th>#</th>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


@push('js')
    <script>
        var data_columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
            },
            {
                data: 'created_at',
                name: 'created_at',
                "visible": false,
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'user.name',
                name: 'userName'
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'action',
                name: 'action',
            },
        ];
        var table = new DataTable('#table-list', {
            processing: true,
            serverSide: true,
            "order": [
                [1, "desc"]
            ],
            ajax: {
                url: '{{ route('submission.data') }}',
                type: 'GET',
            },
            columns: data_columns,
            "columnDefs": [{
                "searchable": true, // Kolom dapat dicari
            }],
            "pageLength": 10,
            // "lengthMenu": [ 10, 25, 50,   75, 100 ]
        });
    </script>
@endpush()
