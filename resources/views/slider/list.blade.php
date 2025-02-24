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
            <div class="overflow-x-auto">
                <table id="sliderTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm text-base">
                    <thead class="bg-gray-500">
                        <tr class="text-left text-base font-semibold text-white">
                            <th class="px-4 py-2 border-b">Judul</th>
                            <th class="px-4 py-2 border-b">Sub Judul</th>
                            <th class="px-4 py-2 border-b">Penempatan</th>
                            <th class="px-4 py-2 border-b">Tombol Url</th>
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
            window.deleteSlider = function(id) {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('slider.destroy') }}',
                            type: 'DELETE',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire({
                                        title: "Terhapus!",
                                        text: "Slider berhasil dihapus.",
                                        icon: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus.", "error");
                                }
                            },
                            error: function(xhr) {
                                Swal.fire("Error!", "Terjadi kesalahan saat menghapus.", "error");
                            }
                        });
                    }
                });
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
                            data: 'penempatan',
                            name: 'penempatan'
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
                        $('select').addClass('border-gray-300 rounded-md p-2');

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
