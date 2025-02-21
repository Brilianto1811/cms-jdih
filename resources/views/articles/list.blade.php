<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Berita') }}
            </h2>
            @can('create articles')
                <a href="{{ route('articles.create') }}"
                    class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="overflow-x-auto">
                <table id="articlesTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm text-sm">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-xs font-semibold text-gray-600 uppercase">
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b w-32 min-w-[150px]">Status Publish</th>
                            <th class="px-4 py-2 border-b">Judul</th>
                            <th class="px-4 py-2 border-b">Isi Konten</th>
                            <th class="px-4 py-2 border-b">Tanggal Publish</th>
                            <th class="px-4 py-2 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        <!-- DataTables akan mengisi data di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteArticle = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('articles.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}' // Tambahkan token CSRF di sini
                        },
                        dataType: "json",
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            alert("Error: " + xhr.responseText);
                        }
                    });
                }
            }

            $(document).ready(function() {
                $('#articlesTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('articles.list') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'status_publish',
                            name: 'status_publish'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'text',
                            name: 'text'
                        },
                        {
                            data: 'tgl_publish',
                            name: 'tgl_publish'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    columnDefs: [{
                        width: "150px",
                        targets: 1
                    }],
                    responsive: true,
                    pagingType: 'full_numbers',
                    language: {
                        paginate: {
                            first: '«',
                            previous: '‹',
                            next: '›',
                            last: '»'
                        },
                        search: 'Cari:',
                        lengthMenu: 'Tampilkan _MENU_ data per halaman',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                        infoEmpty: 'Tidak ada data yang ditampilkan',
                        infoFiltered: '(disaring dari _MAX_ total data)',
                        zeroRecords: 'Tidak ada data yang cocok'
                    },
                    dom: '<"flex flex-row justify-between items-center gap-4 mb-4"lf>rt<"flex flex-row justify-between items-center mt-4 gap-4"ip>',
                    drawCallback: function() {
                        $('select').addClass('border-gray-300 rounded-md p-2');
                        $('table').addClass('w-full border-collapse border border-gray-300');
                        $('th, td').addClass('px-4 py-2 border');
                        $('input[type="search"]').addClass('border-gray-300 rounded-md p-2 ml-2');
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
