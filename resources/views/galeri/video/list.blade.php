<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Video') }}
            </h2>
            @can('create video')
                <a href="{{ route('video.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="overflow-x-auto">
                <table id="sliderTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm text-base">
                    <thead class="bg-gray-500">
                        <tr class="text-left text-base font-semibold text-white">
                            <th class="px-4 py-2 border-b">Nama Galeri</th>
                            <th class="px-4 py-2 border-b">Tanggal</th>
                            <th class="px-4 py-2 border-b">URL Video Youtube</th>
                            <th class="px-4 py-2 border-b">Deskripsi</th>
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
            window.deleteVideo = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('video.destroy') }}',
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
                $('#sliderTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('video.list') }}",
                    pageLength: 2,
                    lengthMenu: [2, 5, 10, 25, 50, 100],
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'tgl_galeri',
                            name: 'tgl_galeri'
                        },
                        {
                            data: 'url_video',
                            name: 'url_video'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
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
                        zeroRecords: 'Tidak ada data yang cocok',
                    },
                    dom: '<"flex flex-col md:flex-row justify-between items-center gap-4 mb-4"lf>rt<"flex flex-col md:flex-row justify-between items-center mt-4 gap-4"ip>',
                    drawCallback: function() {
                        // Styling untuk dropdown "Tampilkan"
                        $('select').addClass('border-gray-300 rounded-md p-2 ml-2');

                        $('table').addClass('w-full border-collapse border border-gray-300');
                        $('th, td').addClass('px-4 py-2 border');

                        // Styling untuk input pencarian
                        $('input[type="search"]').addClass('border-gray-300 rounded-md p-2 ml-2');

                        // Styling untuk pagination
                        $('.dataTables_paginate').addClass('flex gap-2 justify-center md:justify-end mt-4');
                        $('.dataTables_paginate .paginate_button').addClass(
                            'px-3 py-1 border border-gray-300 rounded-md bg-white hover:bg-gray-200 transition'
                        );
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
