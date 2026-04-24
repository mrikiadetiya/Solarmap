@extends('layouts.frontend')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="flex flex-col h-[calc(100vh-80px)] bg-white border-t border-gray-200">
    
    <div class="h-14 flex items-center justify-between px-4 border-b border-gray-200 bg-white shadow-sm z-10 relative">
        <div class="flex items-center gap-4 text-sm text-gray-600">
            <button class="flex items-center gap-2 hover:text-gray-900 transition">
                <i class="fa-regular fa-square"></i> Sembunyikan Panel
            </button>
            <span class="text-gray-300">|</span>
            <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gray-400"></i> 10 lokasi terpetakan</span>
        </div>

        <div class="flex bg-gray-100 rounded-md p-1 border border-gray-200">
            <button class="px-3 py-1 text-xs font-medium bg-white text-brand-orange shadow rounded">Heatmap</button>
            <button class="px-3 py-1 text-xs font-medium text-gray-600 hover:text-gray-900">Satelit</button>
            <button class="px-3 py-1 text-xs font-medium text-gray-600 hover:text-gray-900">Terrain</button>
        </div>

        <div>
            <button class="flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition">
                <i class="fa-solid fa-download"></i> Unduh Data
            </button>
        </div>
    </div>

    <div class="flex flex-1 overflow-hidden relative z-0">
        
        <div class="w-80 bg-white border-r border-gray-200 flex flex-col z-10 shadow-[4px_0_15px_-3px_rgba(0,0,0,0.05)] relative">
            
            <div class="p-4 border-b border-gray-100">
                <h3 class="font-bold text-gray-900 mb-3 text-sm">Pencarian Lokasi</h3>
                <div class="relative mb-3">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Cari desa, kabupaten, provinsi..." 
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-brand-orange focus:border-brand-orange placeholder-gray-400">
                </div>
                <button class="w-full py-2 border border-brand-orange text-brand-orange text-sm font-medium rounded-lg hover:bg-orange-50 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-crosshairs"></i> Deteksi Lokasi Saya (GPS)
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 custom-scrollbar">
                
                <div class="mb-6">
                    <p class="text-xs font-bold text-gray-500 mb-3 tracking-wider">BOOKMARK</p>
                    <div class="space-y-1">
                        <div class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex gap-3">
                                <i class="fa-solid fa-star text-yellow-400 mt-1"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Desa Wairasa</h4>
                                    <p class="text-xs text-gray-500">Sumba Tengah</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Tinggi</span>
                        </div>
                        <div class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex gap-3">
                                <i class="fa-solid fa-star text-yellow-400 mt-1"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Desa Rote</h4>
                                    <p class="text-xs text-gray-500">Rote Ndao</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Tinggi</span>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-bold text-gray-500 mb-3 tracking-wider uppercase">Semua Lokasi (10)</p>
                    <div class="space-y-1">
                        <div class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition border border-transparent hover:border-gray-100">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-location-dot text-brand-orange text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Desa Wairasa</h4>
                                    <p class="text-xs text-gray-500">Umbu Ratu Nggay, NTT</p>
                                    <p class="text-xs font-bold text-brand-orange mt-0.5">6.2 kWh/m²</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-between h-full py-1">
                                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Tinggi</span>
                                <i class="fa-solid fa-star text-yellow-400 text-xs mt-2"></i>
                            </div>
                        </div>

                        <div class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition border border-transparent hover:border-gray-100">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-location-dot text-brand-orange text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Desa Larantuka</h4>
                                    <p class="text-xs text-gray-500">Larantuka, NTT</p>
                                    <p class="text-xs font-bold text-brand-orange mt-0.5">5.8 kWh/m²</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-between h-full py-1">
                                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Tinggi</span>
                                <i class="fa-regular fa-star text-gray-300 hover:text-yellow-400 text-xs mt-2 transition"></i>
                            </div>
                        </div>

                        <div class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition border border-transparent hover:border-gray-100">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-location-dot text-yellow-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Desa Soa</h4>
                                    <p class="text-xs text-gray-500">Soa, NTT</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-between h-full py-1">
                                <span class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Sedang</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="map" class="flex-1 bg-gray-100 z-0"></div>

    </div>
</div>

<style>
    /* Styling custom scrollbar untuk sidebar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #d1d5db; 
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af; 
    }
    
    /* Penyesuaian kontrol Leaflet agar letaknya pas */
    .leaflet-control-zoom {
        border: none !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
    }
    .leaflet-control-zoom a {
        color: #374151 !important;
        background-color: #fff !important;
    }
    .leaflet-control-zoom a:hover {
        background-color: #f9fafb !important;
    }
</style>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi Peta
    // Menggunakan koordinat tengah Indonesia sesuai gambar
    var map = L.map('map', {
        zoomControl: false // Kita matikan default zoom control untuk memindahkannya
    }).setView([-2.5489, 118.0149], 5);

    // 2. Tambahkan Tile Layer (Peta Dasar)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);

    // 3. Pindahkan Zoom Control ke Kanan Atas (seperti di gambar)
    L.control.zoom({
        position: 'topright'
    }).addTo(map);

    // 4. Custom Marker Icons
    // Kita buat tiga warna icon marker (Tinggi/Sedang/Rendah) berdasarkan warna di desain
    var createCustomIcon = function(colorClass) {
        return L.divIcon({
            className: 'custom-div-icon',
            html: `<div style="background-color: ${colorClass}; width: 24px; height: 24px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3);"></div>`,
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });
    };

    var iconGreen = createCustomIcon('#10B981'); // Hijau (Tinggi)
    var iconOrange = createCustomIcon('#F97316'); // Oranye/Kuning (Sedang)
    var iconRed = createCustomIcon('#EF4444');    // Merah (Rendah)

    // 5. Tambahkan Data Marker Contoh Sesuai Gambar
    // Area NTT & sekitarnya (Hijau/Tinggi)
    L.marker([-9.6, 119.5], {icon: iconGreen}).addTo(map).bindPopup("<b>Desa Wairasa</b><br>Potensi: Tinggi (6.2 kWh/m²)");
    L.marker([-10.7, 123.1], {icon: iconGreen}).addTo(map);
    L.marker([-8.3, 122.9], {icon: iconGreen}).addTo(map);
    L.marker([-8.6, 120.5], {icon: iconGreen}).addTo(map);

    // Area Kalimantan (Oranye/Sedang)
    L.marker([0.5, 115.5], {icon: iconOrange}).addTo(map);
    L.marker([1.2, 116.0], {icon: iconOrange}).addTo(map);

    // Area Nusa Tenggara Barat (Oranye/Sedang)
    L.marker([-8.5, 117.5], {icon: iconOrange}).addTo(map);
    L.marker([-8.8, 118.5], {icon: iconOrange}).addTo(map);

    // Area Papua (Merah/Rendah)
    L.marker([-4.0, 138.0], {icon: iconRed}).addTo(map);
});
</script>

@endsection