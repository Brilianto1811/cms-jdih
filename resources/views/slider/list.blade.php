<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Slider') }}
            </h2>
            @can('create slider')
                <a href="{{ route('slider.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table id="sliderTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub
                            Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                            Tombol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tombol Url</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Data akan diambil melalui AJAX -->
                </tbody>
            </table>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteSlider = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('slider.destroy') }}',
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
                    ajax: "{{ route('slider.list') }}",
                    columns: [{
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'sub_judul',
                            name: 'sub_judul'
                        },
                        {
                            data: 'judul_tombol',
                            name: 'judul_tombol'
                        },
                        {
                            data: 'tombol_url',
                            name: 'tombol_url'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    responsive: true, // Aktifkan responsive
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
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
