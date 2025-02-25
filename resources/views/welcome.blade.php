@extends('layouts.app-jdih')

@section('title', 'Halaman Index')

@section('content')
    @php
        $backgroundImage =
            isset($slider) && $slider->hasMedia('images')
                ? $slider->getFirstMediaUrl('images')
                : asset('assets/petakab.jpg');
    @endphp

    <div class="hero-section min-h-screen md:h-screen bg-center md:bg-cover bg-no-repeat flex items-center"
        style="background-image: url('{{ $backgroundImage }}');">
    </div>

    <!-- Section Informasi -->
    <section class="py-10 px-6 info-section">
        <div class="container mx-auto text-center">
            <h2 class="info-title">
                <span>Jaringan Dokumentasi dan Informasi Hukum</span>
                <span>Dewan Perwakilan Rakyat Daerah Kabupaten Bogor</span>
            </h2>
            <p class="mt-4 text-gray-600 text-lg">Pencarian Produk Hukum</p>
            <form class="mt-8 flex justify-center items-center search-form">
                <input type="text" placeholder="Cari produk hukum..." />
                <button type="submit">CARI</button>
            </form>
        </div>
    </section>

    <!-- Section Ikon -->
    <section class="py-10 icon-section">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 justify-center items-center">
                <!-- Item 1 -->
                <div class="icon-item">
                    <img src="assets/peraturan.webp" alt="Ikon" class="h-32 md:h-40 mx-auto">
                </div>
                <!-- Item 2 -->
                <div class="icon-item">
                    <img src="assets/monografi.webp" alt="Ikon" class="h-32 md:h-40 mx-auto">
                </div>
                <!-- Item 3 -->
                <div class="icon-item">
                    <img src="assets/artikel.webp" alt="Ikon" class="h-32 md:h-40 mx-auto">
                </div>
                <!-- Item 4 -->
                <div class="icon-item">
                    <img src="assets/yurisprudensi.webp" alt="Ikon" class="h-32 md:h-40 mx-auto">
                </div>
            </div>
        </div>
    </section>

    <section class="produk-hukum py-10">
        <div class="container mx-auto px-6 md:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div>
                    <h2 class="produk-title text-xl font-bold mb-4">PRODUK HUKUM TERBARU</h2>
                    <div class="produk-list space-y-4">
                        <!-- Card 1 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Peraturan Menteri dalam Negeri Republik Indonesia Nomor
                                19 Tahun 2024
                                tentang Peraturan Pelaksanaan Peraturan Pemerintah Nomor 13 Tahun 2013 tentang Laporan
                                dan Evaluasi Penyelenggaraan Pemerintah Daerah</h3>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 241 | Diunduh: 49</p>
                        </div>
                        <!-- Card 2 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Hal-Hal tentang Anggaran Daerah Otonom Jang Perlu
                                Dikumakakan pada
                                Sidang Tanggal 13 Djuli 1950</h3>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 135 | Diunduh: 4</p>
                        </div>
                        <!-- Card 3 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Keputusan Dewan Perwakilan Rakyat Daerah Nomor 160 Tahun
                                1950</h3>
                            <p class="card-desc line-clamp-2">Keputusan Residen Priangan Selaku Dewan Perwakilan Rakjat
                                Daerah
                                Kotapradja Bandung Nomor 160 Tahun 1950 tentang Anggaran Umum Kotapradja Bandung untuk
                                Tahun Dinas 1950</p>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 15 | Diunduh: 10</p>
                        </div>
                        <!-- Card 4 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Keputusan Dewan Perwakilan Rakyat Daerah Nomor 21 Tahun
                                2024</h3>
                            <p class="card-desc line-clamp-2">Keputusan Dewan Perwakilan Rakyat Daerah Kabupaten Bogor
                                Nomor
                                Kd/21-Dprd/Xi/2024 tentang Pembentukan Panitia Khusus 2, 3, 4, dan 5 yang Membahas 5
                                (lima) Rancangan Peraturan Daerah Kabupaten Bogor dan 1 (satu) Rancangan Peraturan Dewan
                                Perwakilan Rakyat Daerah Kabupaten Bogor</p>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 135 | Diunduh: 4</p>
                        </div>
                    </div>
                </div>
                <!-- Kolom Kanan -->
                <div>
                    <h2 class="produk-title text-xl font-bold text-blue-800 mb-4">PRODUK HUKUM TERPOPULER</h2>
                    <div class="produk-list space-y-4">
                        <!-- Card 1 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Peraturan Daerah Nomor 5 Tahun 2022</h3>
                            <p class="card-desc line-clamp-2">Peraturan Daerah Kabupaten Bogor Nomor 5 Tahun 2022
                                tentang Rencana
                                Tata Ruang Wilayah Kabupaten Bogor Tahun 2022-2042</p>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 17210 | Diunduh: 7189</p>
                        </div>
                        <!-- Card 2 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Peraturan Menteri Dalam Negeri Republik Indonesia Nomor
                                15 Tahun 2023
                                tentang Pedoman Penyusunan Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2024
                            </h3>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 7612 | Diunduh: 1980</p>
                        </div>
                        <!-- Card 3 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Keputusan Wali Kota Nomor 206 Tahun 2022</h3>
                            <p class="card-desc line-clamp-2">Keputusan Wali Kabupaten Bogor Nomor
                                973/Kep.206-Bapenda/2022 tentang
                                Penyesuaian Nilai Jual Objek Pajak sebagai Dasar Pengenaan Pajak Bumi dan Bangunan di
                                Kabupaten Bogor</p>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 5073 | Diunduh: 1080</p>
                        </div>
                        <!-- Card 4 -->
                        <div class="card">
                            <h3 class="card-title line-clamp-2">Peraturan Menteri Dalam Negeri Republik Indonesia Nomor
                                11 Tahun 2020
                                tentang Pakaian Dinas Aparatur Sipil Negara di Lingkungan Kementerian dalam Negeri dan
                                Pemerintah Daerah</h3>
                            <p class="card-status">Status: Berlaku</p>
                            <p class="card-info">Dilihat: 5014 | Diunduh: 475</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2" id="gambar-promosi">
        <div class="container mx-auto flex flex-wrap lg:flex-nowrap gap-4 px-10 md:px-16">
            <!-- Kolom Kiri -->
            <div class="p-4 w-full lg:w-1/2 text-center">
                <a href="https://play.google.com/store/apps/details?id=com.jdihreader&amp;pcampaignid=web_share"
                    target="_blank"><img src="assets/google_play.png" alt="Gambar 1"
                        class="w-full h-max object-contain"></a>
            </div>
            <!-- Kolom Kanan -->
            <div class="flex flex-col gap-4 w-full lg:w-1/2">
                <!-- Gambar Atas -->
                <div class="p-4 text-center">
                    <img src="assets/prohukda.jpeg" alt="Gambar 2" class="w-full h-auto object-contain">
                </div>
                <!-- Gambar Bawah -->
                <div class="p-4 text-center">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSczE117baMT1CbaVis3SnvSE9bSaBQt4Lw0bRLyKObQPaQFIA/viewform?pli=1&amp;pli=1"
                        target="_blank">
                        <img src="assets/survey-kepuasan-jdih.svg" alt="Gambar 3" class="w-full h-auto object-contain">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8" id="kunjungan-tamu">
        <div class="container mx-auto text-center px-5 md:px-16 lg:px-20">
            <h2 class="text-sm md:text-2xl font-bold mb-4">PETA KUNJUNGAN TAMU KE DPRD DAN SEKRETARIAT DPRD KABUPATEN
                BOGOR</h2>
            <div class="border rounded-lg overflow-hidden shadow-lg">
                <div class="iframe-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658969.626560632!2d95.95568416301879!3d-2.2688273134548553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1737100265861!5m2!1sid!2sid"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6 px-4 md:px-20">
            <!-- Kolom Kiri -->
            <div class="lg:col-span-2">
                <h2 class="text-sm md:text-2xl font-bold mb-4">BERITA</h2>
                <div class="relative">
                    <!-- Slider container -->
                    <div id="slider" class="overflow-hidden rounded-lg shadow-lg relative">
                        <!-- Slide items -->
                        <div class="slider-items flex transition-transform duration-300">
                            @foreach ($articlesSlider as $article)
                                <div class="relative w-full flex-shrink-0">
                                    <a href="{{ route('landing.detail-berita', $article->slug) }}" class="block">
                                        <img src="{{ $article->foto }}" alt="{{ $article->title }}" class="w-full">
                                        <div
                                            class="absolute bottom-8 left-0 right-0 text-center text-white text-xl bg-black bg-opacity-50 py-2">
                                            {{ $article->title }}
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                        @foreach ($articlesSlider as $index => $article)
                            <span class="h-2 w-2 bg-gray-300 rounded-full cursor-pointer"
                                data-slide="{{ $index }}"></span>
                        @endforeach
                    </div>

                    <!-- Navigation buttons -->
                    <button id="prev"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white text-white p-2 rounded-full">
                        &#9664;
                    </button>
                    <button id="next"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white text-white p-2 rounded-full">
                        &#9654;
                    </button>
                </div>


                <!-- Berita & Agenda -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
                    <!-- Kolom Kiri: Agenda AKD -->
                    <div>
                        <h2 class="text-sm md:text-2xl font-bold mb-4">AGENDA AKD</h2>
                        <div class="space-y-4">
                            <div class="agenda-akd">
                                <p class="hover:text-blue-700">Agenda Kegiatan DPRD Kabupaten Bogor Selasa 14 Januari
                                    2025
                                </p>
                            </div>
                            <div class="agenda-akd">
                                <p class="hover:text-blue-700">Agenda Kegiatan DPRD Kabupaten Bogor Jumat 10 Januari
                                    2025
                                </p>
                            </div>
                            <div class="agenda-akd">
                                <p class="hover:text-blue-700">Agenda Kegiatan DPRD Kabupaten Bogor Kamis 9 Januari 2025
                                </p>
                            </div>
                            <div class="agenda-akd">
                                <p class="hover:text-blue-700">Agenda Kegiatan DPRD Kabupaten Bogor Rabu 8 Januari 2025
                                </p>
                            </div>
                            <div class="agenda-akd">
                                <p class="hover:text-blue-700">Agenda Kegiatan DPRD Kabupaten Bogor Selasa 10 Desember
                                    2024
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Terkini -->
                    <div>
                        <h2 class="text-sm md:text-2xl font-bold mb-4">TERKINI</h2>
                        <div class="space-y-4">
                            @foreach ($articlesTerkini as $news)
                                <a href="{{ route('landing.detail-berita', $news->slug) }}" class="terkini flex gap-4">
                                    <img src="{{ $news->foto }}" alt="{{ $news->title }}"
                                        class="h-20 w-28 rounded-md object-cover">
                                    <p class="hover:text-blue-700 line-clamp-3">
                                        {{ $news->title }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div>
                <div class="space-y-6 mt-6 lg:mt-11">
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <a href="https://play.google.com/store/apps/details?id=com.jdihreader&amp;pcampaignid=web_share"
                            target="_blank"><img src="assets/google_play.png" alt="Banner 1" class="w-full"></a>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="assets/prohukda.jpeg" alt="Banner 2" class="w-full">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="assets/partisipasi_masyarakat.png" alt="Banner 2" class="w-full">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="assets/konsultasi.jpeg" alt="Banner 1" class="w-full">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <a href="https://play.google.com/store/apps/details?id=com.jdihreader&amp;pcampaignid=web_share"
                            target="_blank"><img src="assets/google_play.png" alt="Banner 1" class="w-full"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
