<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JDIH Kabupaten Bogor') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sidebar.js'])
</head>

<body class="bg-gray-100">

    <header class="bg-[rgba(17,51,85,0.9)] text-white py-3 fixed w-full z-50">
        <div class="container mx-auto flex justify-between items-center px-6 md:px-20">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('landing.index') }}">
                    <img src="{{ asset('assets/jdihn.png') }}" alt="Logo JDIHN" class="h-12 w-12">
                </a>
                <a href="{{ route('landing.index') }}">
                    <img src="{{ asset('assets/Logo_DPRD.webp') }}" alt="Logo DPRD" class="h-12 w-12">
                </a>
            </div>
            <!-- Hamburger Button -->
            <button id="hamburger" class="md:hidden focus:outline-none">
                <span class="block w-6 h-1 bg-white mb-1"></span>
                <span class="block w-6 h-1 bg-white mb-1"></span>
                <span class="block w-6 h-1 bg-white"></span>
            </button>
            <!-- Navigation Menu -->
            <nav id="menu" class="hidden md:flex md:space-x-6">
                <ul class="flex flex-col md:flex-row md:space-x-4">
                    <li>
                        <a href="#" class="hover:underline" id="menu-tentang">TENTANG
                            <span class="dropdown-icon">▼</span>
                        </a>
                        <ul>
                            @php
                                $khususArticles = App\Models\Articles::where('kategori_konten', 'Khusus')->get();
                            @endphp

                            @foreach ($khususArticles as $article)
                                <li>
                                    <a href="{{ route('landing.tentang', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('landing.berita') }}" class="hover:underline" id="menu-berita">BERITA</a></li>
                    <li><a href="#" class="hover:underline" id="menu-infografis">INFOGRAFIS</a></li>
                    <li>
                        <a href="#" class="hover:underline" id="menu-galeri">GALERI
                            <span class="dropdown-icon">▼</span>
                        </a>
                        <ul>
                            <li><a href="#">Foto</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline" id="menu-agenda">AGENDA AKD</a></li>
                    <li><a href="#" class="hover:underline" id="menu-dokumen">DOKUMEN
                            <span class="dropdown-icon">▼</span>
                        </a>
                        <ul>
                            <li><a href="#">Peraturan</a></li>
                            <li><a href="#">Monografi Hukum</a></li>
                            <li><a href="#">Artikel</a></li>
                            <li><a href="#">Yurisprudensi</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline" id="menu-kategori">KATEGORI
                            <span class="dropdown-icon">▼</span>
                        </a>
                        <ul>
                            <li><a href="#">Peraturan Pusat</a></li>
                            <li><a href="#">Peraturan Provinsi</a></li>
                            <li><a href="#">Undang-Undang</a></li>
                            <li><a href="#">Peraturan Pemerintah</a></li>
                            <li><a href="#">Peraturan Presiden</a></li>
                            <li><a href="#">Peraturan Daerah</a></li>
                            <li><a href="#">Rancangan Peraturan Daerah</a></li>
                            <li><a href="#">Peraturan Dewan Perwakilan Rakyat Daerah</a></li>
                            <li><a href="#">Keputusan Dewan Perwakilan Rakyat Daerah</a></li>
                            <li><a href="#">Keputusan Pimpinan Dewan Perwakilan Rakyat Daerah</a></li>
                            <li><a href="#">Naskah Akademik</a></li>
                            <li><a href="#">Risalah Rapat</a></li>
                            <li><a href="#">Peraturan Wali Kota</a></li>
                            <li><a href="#">Keputusan Wali Kota</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline" id="menu-survey">SURVEY</a></li>
                    <li><a href="#" class="hover:underline" id="menu-opini">OPINI</a></li>
                    <li><a href="#" class="hover:underline" id="menu-joke">JOKE RECEH</a></li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar (Mobile Menu) -->
        <div id="sidebar"
            class="fixed left-0 top-0 w-64 h-full bg-[rgba(17,51,85,0.9)] text-white transform -translate-x-full transition-transform">
            <div class="p-6">
                <button id="closeSidebar" class="text-white mb-4 focus:outline-none">
                    ✕
                </button>
                <ul class="space-y-4">
                    <li>
                        <button
                            class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none"
                            id="sidebar-tentang">
                            TENTANG
                            <span class="submenu-icon">▼</span>
                        </button>
                        <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                            <li><a href="#" class="hover:underline">Sekapur Sirih</a></li>
                            <li><a href="#" class="hover:underline">Dasar Hukum</a></li>
                            <li><a href="#" class="hover:underline">Visi dan Misi</a></li>
                            <li><a href="#" class="hover:underline">Struktur Organisasi</a></li>
                            <li><a href="#" class="hover:underline">Sejarah</a></li>
                            <li><a href="#" class="hover:underline">Tugas Pokok dan Fungsi</a></li>
                            <li><a href="#" class="hover:underline">Kontak</a></li>
                            <li><a href="#" class="hover:underline">Standard Operating Procedure</a></li>
                        </ul>
                    </li>
                    <li><a href="berita/index.html" class="hover:underline" id="sidebar-berita">BERITA</a></li>
                    <li><a href="#" class="hover:underline" id="sidebar-infografis">INFOGRAFIS</a></li>
                    <li>
                        <button
                            class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none"
                            id="sidebar-galeri">
                            GALERI
                            <span class="submenu-icon">▼</span>
                        </button>
                        <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                            <li><a href="#" class="hover:underline">Foto</a></li>
                            <li><a href="#" class="hover:underline">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline" id="sidebar-agenda">AGENDA AKD</a></li>
                    <li>
                        <button
                            class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none"
                            id="sidebar-dokumen">
                            DOKUMEN
                            <span class="submenu-icon">▼</span>
                        </button>
                        <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                            <li><a href="#" class="hover:underline">Peraturan</a></li>
                            <li><a href="#" class="hover:underline">Monografi Hukum</a></li>
                            <li><a href="#" class="hover:underline">Artikel</a></li>
                            <li><a href="#" class="hover:underline">Yurisprudensi</a></li>
                        </ul>
                    </li>
                    <li>
                        <button
                            class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none"
                            id="sidebar-kategori">
                            KATEGORI
                            <span class="submenu-icon">▼</span>
                        </button>
                        <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                            <li><a href="#" class="hover:underline">Peraturan Pusat</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Provinsi</a></li>
                            <li><a href="#" class="hover:underline">Undang-Undang</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Pemerintah</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Presiden</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Daerah</a></li>
                            <li><a href="#" class="hover:underline">Rancangan Peraturan Daerah</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Dewan Perwakilan Rakyat Daerah</a>
                            </li>
                            <li><a href="#" class="hover:underline">Keputusan Dewan Perwakilan Rakyat Daerah</a>
                            </li>
                            <li><a href="#" class="hover:underline">Keputusan Pimpinan Dewan Perwakilan Rakyat
                                    Daerah</a></li>
                            <li><a href="#" class="hover:underline">Naskah Akademik</a></li>
                            <li><a href="#" class="hover:underline">Risalah Rapat</a></li>
                            <li><a href="#" class="hover:underline">Peraturan Wali Kota</a></li>
                            <li><a href="#" class="hover:underline">Keputusan Wali Kota</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline" id="sidebar-survey">SURVEY</a></li>
                    <li><a href="#" class="hover:underline" id="sidebar-opini">OPINI</a></li>
                    <li><a href="#" class="hover:underline" id="sidebar-joke">JOKE RECEH</a></li>
                </ul>
            </div>
        </div>
    </header>

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    <section class="section-situs-terkait py-8 mt-6">
        <div class="container mx-auto px-20">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Situs Terkait</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 gap-4">
                <!-- JDIHN -->
                <a href="https://jdihn.go.id/" target="_blank" class="site-card block text-center">
                    <img src="{{ asset('assets/jdihn.png') }}" alt="JDIHN" class="mx-auto h-16 mb-4" />
                    <p class="text-gray-700 font-semibold hover:text-blue-700">JDIHN</p>
                </a>
                <!-- JDIH Jawa Barat -->
                <a href="https://jdih.jabarprov.go.id/" target="_blank" class="site-card block text-center">
                    <img src="{{ asset('assets/jawa-barat.png') }}" alt="JDIH Jawa Barat"
                        class="mx-auto h-16 mb-4" />
                    <p class="text-gray-700 font-semibold hover:text-blue-700">JDIH Jawa Barat</p>
                </a>
                <!-- JDIH DPRD Jawa Barat -->
                <a href="https://jdihdprd.jabarprov.go.id/" target="_blank" class="site-card block text-center">
                    <img src="{{ asset('assets/dprd-jawa-barat.png') }}" alt="JDIH DPRD Jawa Barat"
                        class="mx-auto h-16 mb-4" />
                    <p class="text-gray-700 font-semibold hover:text-blue-700">JDIH DPRD Jawa Barat</p>
                </a>
                <!-- JDIH Kabupaten Bogor -->
                <a href="https://jdih.bogorkab.go.id/" target="_blank" class="site-card block text-center">
                    <img src="{{ asset('assets/Lambang_Kabupaten_Bogor.png') }}" alt="JDIH Kabupaten Bogor"
                        class="mx-auto h-16 mb-4" />
                    <p class="text-gray-700 font-semibold hover:text-blue-700">JDIH Kabupaten Bogor</p>
                </a>
                <!-- DPRD Kabupaten Bogor -->
                <a href="https://setwan.bogorkab.go.id/" target="_blank" class="site-card block text-center">
                    <img src="{{ asset('assets/Logo_DPRD.webp') }}" alt="DPRD Kabupaten Bogor"
                        class="mx-auto h-16 mb-4" />
                    <p class="text-gray-700 font-semibold hover:text-blue-700">DPRD Kabupaten Bogor</p>
                </a>
            </div>
        </div>
    </section>

    <section class="section-before-footer bg-[rgba(17,51,85,0.9)] text-white">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6 md:px-20 py-6">
            <div
                class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 space-x-0 md:space-x-4 text-center md:text-left">
                <div class="flex space-x-4 md:space-x-4">
                    <img src="{{ asset('assets/jdihn.png') }}" alt="Logo 1" class="h-16 w-16" />
                    <img src="{{ asset('assets/Logo_DPRD.webp') }}" alt="Logo 2" class="h-16 w-16" />
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-yellow-400">JARINGAN DOKUMENTASI DAN INFORMASI HUKUM</h3>
                    <p class="text-sm">DEWAN PERWAKILAN RAKYAT DAERAH Kabupaten Bogor</p>
                </div>
            </div>

            <div class="social-media mt-6 md:mt-0 text-center">
                <h4 class="font-semibold text-left">Ikuti Kami</h4>
                <div class="social-icons flex justify-center items-center gap-4 mt-2">
                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram text-2xl hover:text-pink-500"></i>
                    </a>
                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook text-2xl hover:text-blue-600"></i>
                    </a>
                    <a href="#" aria-label="Twitter">
                        <i class="fa-brands fa-twitter text-2xl hover:text-blue-400"></i>
                    </a>
                    <a href="#" aria-label="YouTube">
                        <i class="fa-brands fa-youtube text-2xl hover:text-red-500"></i>
                    </a>
                    <a href="#" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok text-2xl hover:text-white"></i>
                    </a>
                </div>
            </div>

            <div class="mt-6 md:mt-0 text-sm text-right">
                <h4 class="font-semibold">Statistik Pengunjung</h4>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Online:</p>
                    <span class="font-medium">40</span>
                </div>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Hari ini:</p>
                    <span class="font-medium">364</span>
                </div>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Kemarin:</p>
                    <span class="font-medium">377</span>
                </div>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Minggu ini:</p>
                    <span class="font-medium">3.190</span>
                </div>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Bulan ini:</p>
                    <span class="font-medium">4.981</span>
                </div>
                <div class="flex justify-between">
                    <p class="text-left mr-4">Total:</p>
                    <span class="font-medium">57.151</span>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[rgba(25,40,55,0.9)] text-white py-6">
        <div class="container mx-auto text-center">
            <p>Copyright © 2021/2025 JDIH DPRD Kabupaten Bogor Hak Cipta Dilindungi Undang-Undang</p>
        </div>
    </footer>

</body>

</html>
