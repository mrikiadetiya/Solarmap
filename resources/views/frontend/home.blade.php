@extends('layouts.frontend')

@section('content')

<section class="relative pt-24 pb-32 flex items-center justify-center min-h-[90vh]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=2000" alt="Village Landscape" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gray-900/75"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-white/20 bg-white/10 backdrop-blur-md mb-8">
            <span class="text-xs text-white/70 border border-white/40 rounded px-1.5 py-0.5">ID</span>
            <span class="text-sm font-medium text-white/90">Untuk Indonesia Terang</span>
        </div>

        <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight mb-6 tracking-tight">
            Petakan Potensi <span class="text-brand-orange">Energi Surya</span> di<br> Desamu
        </h1>

        <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Platform pemetaan energi terbarukan berbasis data satelit untuk akses listrik terjangkau di seluruh Indonesia. Dari data menjadi aksi nyata.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-20">
            <a href="/map" class="bg-brand-orange hover:bg-orange-600 text-white px-8 py-3.5 rounded-lg font-semibold flex items-center justify-center gap-2 transition">
                <i class="fa-solid fa-map-location-dot"></i> Mulai Pemetaan
            </a>
            <a href="/calculator" class="border border-white/50 text-white hover:bg-white/10 px-8 py-3.5 rounded-lg font-semibold flex items-center justify-center gap-2 backdrop-blur-sm transition">
                <i class="fa-solid fa-calculator"></i> Hitung Kebutuhan Panel
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
            <div class="bg-black/30 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                <h2 class="text-3xl font-bold text-brand-orange mb-1">1.247+</h2>
                <p class="text-sm text-gray-300">Lokasi Dipetakan</p>
            </div>
            <div class="bg-black/30 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                <h2 class="text-3xl font-bold text-brand-orange mb-1">34</h2>
                <p class="text-sm text-gray-300">Provinsi Tercakup</p>
            </div>
            <div class="bg-black/30 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                <h2 class="text-3xl font-bold text-brand-orange mb-1">8.456</h2>
                <p class="text-sm text-gray-300">Kalkulasi Bulan Ini</p>
            </div>
            <div class="bg-black/30 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                <h2 class="text-3xl font-bold text-brand-orange mb-1">42.800 GWh</h2>
                <p class="text-sm text-gray-300">Potensi Energi</p>
            </div>
        </div>

        <div class="mt-12 text-white/50 flex justify-center animate-bounce">
            <i class="fa-solid fa-computer-mouse text-2xl"></i>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h4 class="text-brand-orange font-bold text-sm tracking-widest uppercase mb-3">Fitur Utama</h4>
        <h2 class="text-4xl font-bold text-gray-900 mb-4">
            Solusi Lengkap untuk <span class="text-brand-orange">Energi</span> <span class="text-brand-green">Terbarukan</span>
        </h2>
        <p class="text-gray-500 mb-16 max-w-2xl mx-auto text-lg">
            Dari pemetaan satelit hingga rekomendasi instalasi — semua dalam satu platform terintegrasi.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">Real-time</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-brand-orange text-xl mb-6">
                    <i class="fa-solid fa-map-location"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Pemetaan GIS Interaktif</h3>
                <p class="text-gray-500 leading-relaxed">Visualisasi heatmap radiasi matahari hingga tingkat desa dengan zoom detail dan klik lokasi untuk analisis.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">NASA Data</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center text-yellow-500 text-xl mb-6">
                    <i class="fa-regular fa-sun"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Analisis Radiasi Matahari</h3>
                <p class="text-gray-500 leading-relaxed">Data intensitas radiasi harian, bulanan, dan tahunan dari sumber NASA POWER dan dataset internal.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">Otomatis</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-brand-green text-xl mb-6">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Kalkulator Panel Cerdas</h3>
                <p class="text-gray-500 leading-relaxed">Hitung otomatis jumlah panel, luas area, dan kapasitas sistem berdasarkan kebutuhan listrik Anda.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">Harga Lokal</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-brand-green text-xl mb-6">
                    <i class="fa-solid fa-rupiah-sign"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Estimasi Biaya & ROI</h3>
                <p class="text-gray-500 leading-relaxed">Kalkulasi total biaya instalasi, estimasi balik modal, dan perbandingan dengan harga listrik PLN.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">Simulasi</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center text-yellow-500 text-xl mb-6">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Estimasi Produksi Listrik</h3>
                <p class="text-gray-500 leading-relaxed">Simulasi produksi kWh per hari dan bulan dengan skenario cuaca normal vs mendung.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-lg transition group relative">
                <div class="absolute top-6 right-6">
                    <span class="bg-orange-50 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full">AI-Powered</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal-50 flex items-center justify-center text-teal-500 text-xl mb-6">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Rekomendasi Sistem Otomatis</h3>
                <p class="text-gray-500 leading-relaxed">Sistem AI merekomendasikan tipe instalasi (on-grid/off-grid/hybrid) sesuai kebutuhan spesifik.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <div>
                <div class="bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden">
                    <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span class="ml-4 text-xs text-gray-400 font-mono">solarmap.id/dashboard</span>
                    </div>
                    <div class="relative bg-[#0d1627] p-2">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80&w=800" alt="Map Dashboard" class="w-full h-auto rounded-lg opacity-80" style="filter: hue-rotate(180deg) contrast(1.5);">
                        <div class="absolute bottom-6 left-6 right-6 bg-white rounded-xl p-4 shadow-lg flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-xs">Radiasi Rata-rata</p>
                                <p class="font-bold text-gray-900">6.2 kWh/m²</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs">Potensi Harian</p>
                                <p class="font-bold text-gray-900">18.6 kWh</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs">Status</p>
                                <p class="font-bold text-green-600">Tinggi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/map" class="mt-6 w-full block text-center bg-brand-orange hover:bg-orange-600 text-white font-semibold py-4 rounded-xl shadow-lg transition">
                    <i class="fa-regular fa-map mr-2"></i> Buka Dashboard Peta
                </a>
            </div>

            <div>
                <h4 class="text-brand-orange font-bold text-sm tracking-widest uppercase mb-3">Platform Terintegrasi</h4>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Semua Data dalam <span class="text-brand-orange">Satu Tampilan</span>
                </h2>
                <p class="text-gray-600 text-lg mb-10 leading-relaxed">
                    Dashboard interaktif SolarMap Indonesia menggabungkan data satelit, analisis GIS, dan kalkulasi otomatis dalam antarmuka yang mudah digunakan oleh siapa saja.
                </p>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="border border-gray-200 bg-white p-5 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-brand-orange shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Input Lokasi Fleksibel</h4>
                            <p class="text-sm text-gray-500 mt-1">Nama desa, koordinat, atau GPS otomatis</p>
                        </div>
                    </div>

                    <div class="border border-gray-200 bg-white p-5 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-8 h-8 rounded-lg bg-yellow-50 flex items-center justify-center text-yellow-500 shrink-0">
                            <i class="fa-regular fa-sun"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Data Radiasi Real-time</h4>
                            <p class="text-sm text-gray-500 mt-1">Sumber NASA POWER & dataset internal</p>
                        </div>
                    </div>

                    <div class="border border-gray-200 bg-white p-5 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center text-brand-green shrink-0">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Estimasi Produksi</h4>
                            <p class="text-sm text-gray-500 mt-1">kWh harian, bulanan, dan tahunan</p>
                        </div>
                    </div>

                    <div class="border border-gray-200 bg-white p-5 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center text-brand-green shrink-0">
                            <i class="fa-solid fa-rupiah-sign"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Kalkulasi Biaya</h4>
                            <p class="text-sm text-gray-500 mt-1">Harga lokal Indonesia yang akurat</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-24 bg-white text-center border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h4 class="text-brand-orange font-bold text-sm tracking-widest uppercase mb-3">Kisah Sukses</h4>
        <h2 class="text-4xl font-bold text-gray-900 mb-16">
            Dipercaya oleh <span class="text-brand-orange">Ribuan Pengguna</span>
        </h2>

        <div class="grid md:grid-cols-3 gap-8 text-left">
            <div class="bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex text-yellow-400 text-sm mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"SolarMap membantu desa kami mendapatkan akses listrik untuk pertama kalinya dalam 50 tahun. Sekarang anak-anak bisa belajar di malam hari."</p>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 flex items-center gap-1">Yohanis Bulu <i class="fa-solid fa-circle-check text-brand-green text-sm"></i></h4>
                        <p class="text-sm text-gray-500">Kepala Desa Wairasa, NTT</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex text-yellow-400 text-sm mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Sebagai dinas energi, kami menggunakan SolarMap untuk merencanakan elektrifikasi 47 desa terpencil di Kalimantan. Prosesnya jadi jauh lebih efisien."</p>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 flex items-center gap-1">Ir. Ahmad Fauzi, M.T. <i class="fa-solid fa-circle-check text-brand-green text-sm"></i></h4>
                        <p class="text-sm text-gray-500">Kepala Dinas ESDM Kalimantan Barat</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex text-yellow-400 text-sm mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Kalkulator panel suryanya sangat mudah digunakan. Saya bisa tahu berapa panel yang dibutuhkan dan berapa biayanya hanya dalam 5 menit."</p>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 flex items-center gap-1">Siti Rahayu</h4>
                        <p class="text-sm text-gray-500">Warga Desa Maumere, NTT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-brand-dark text-gray-300 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-12 gap-8">
        
        <div class="md:col-span-5 pr-8">
            <a href="/" class="flex items-center gap-2 mb-6">
                <i class="fa-solid fa-sun text-brand-orange text-3xl"></i>
                <span class="font-bold text-xl text-white">SolarMap <span class="text-brand-orange">Indonesia</span></span>
            </a>
            <p class="text-sm leading-relaxed mb-6 text-gray-400">
                Platform pemetaan energi surya berbasis data satelit untuk akses listrik terjangkau di seluruh Indonesia.
            </p>
            <p class="font-medium text-brand-green">Menerangi Indonesia<br>dengan Energi Bersih</p>
        </div>

        <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8">
            <div>
                <h4 class="text-white font-semibold mb-4">Produk</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-green transition">Pemetaan GIS</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Kalkulator Panel</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Analisis Energi</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Estimasi Biaya</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-white font-semibold mb-4">Sumber Daya</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-green transition">Panduan Pengguna</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Dokumentasi API</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Blog & Artikel</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Data Wilayah</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Dukungan</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-brand-green transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-brand-green transition">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>

@endsection