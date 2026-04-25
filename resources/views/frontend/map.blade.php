@extends('layouts.frontend')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="flex flex-col h-[calc(100vh-80px)] bg-white border-t border-gray-200">
    
    <div class="h-14 flex items-center justify-between px-4 border-b border-gray-200 bg-white shadow-sm z-10 relative">
        <div class="flex items-center gap-4 text-sm text-gray-600">
            <button id="toggle-sidebar" class="flex items-center gap-2 hover:text-gray-900 transition">
                <i class="fa-regular fa-square"></i> <span id="toggle-text">Sembunyikan Panel</span>
            </button>
            <span class="text-gray-300">|</span>
            <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gray-400"></i> <span id="location-count">{{ $regions->count() }}</span> lokasi terpetakan</span>
        </div>

        <div class="flex bg-gray-100 rounded-md p-1 border border-gray-200">
            <button onclick="changeLayer('streets')" id="btn-layer-streets" class="layer-btn px-3 py-1 text-xs font-medium bg-white text-brand-orange shadow rounded">Peta</button>
            <button onclick="changeLayer('satellite')" id="btn-layer-satellite" class="layer-btn px-3 py-1 text-xs font-medium text-gray-600 hover:text-gray-900">Satelit</button>
            <button onclick="changeLayer('terrain')" id="btn-layer-terrain" class="layer-btn px-3 py-1 text-xs font-medium text-gray-600 hover:text-gray-900">Terrain</button>
        </div>

        <div>
            <button onclick="downloadCSV()" class="flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition">
                <i class="fa-solid fa-download"></i> Unduh Data
            </button>
        </div>
    </div>

    <div class="flex flex-1 overflow-hidden relative z-0">
        
        <div id="sidebar" class="w-80 bg-white border-r border-gray-200 flex flex-col z-10 shadow-[4px_0_15px_-3px_rgba(0,0,0,0.05)] relative transition-all duration-300">
            
            <div class="p-4 border-b border-gray-100">
                <h3 class="font-bold text-gray-900 mb-3 text-sm">Pencarian Lokasi</h3>
                <div class="relative mb-3">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" id="search-location" placeholder="Cari desa, kabupaten, provinsi..." 
                           class="w-full pl-9 pr-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-brand-orange focus:border-brand-orange placeholder-gray-400">
                </div>
                <button id="btn-detect-location" class="w-full py-2 border border-brand-orange text-brand-orange text-sm font-medium rounded-lg hover:bg-orange-50 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-crosshairs"></i> Deteksi Lokasi Saya (GPS)
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 custom-scrollbar">
                
                <div class="mb-6">
                    <p class="text-xs font-bold text-gray-500 mb-3 tracking-wider">BOOKMARK</p>
                    <div id="bookmark-list" class="space-y-1">
                        @foreach($regions->take(2) as $region)
                        <div onclick="focusLocation({{ $region->id }}, {{ $region->latitude }}, {{ $region->longitude }})" class="flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                            <div class="flex gap-3">
                                <i class="fa-solid fa-star text-yellow-400 mt-1"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $region->name }}</h4>
                                    <p class="text-xs text-gray-500">Provinsi NTT</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Tinggi</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <p class="text-xs font-bold text-gray-500 mb-3 tracking-wider uppercase">Semua Lokasi (<span id="visible-count">{{ $regions->count() }}</span>)</p>
                    <div id="location-list" class="space-y-1">
                        @foreach($regions as $region)
                        <div data-name="{{ strtolower($region->name) }}" onclick="focusLocation({{ $region->id }}, {{ $region->latitude }}, {{ $region->longitude }})" class="location-item flex items-start justify-between p-2 hover:bg-gray-50 rounded-lg cursor-pointer transition border border-transparent hover:border-gray-100">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full {{ $region->avg_ghi > 6 ? 'bg-orange-100' : ($region->avg_ghi > 5.5 ? 'bg-yellow-100' : 'bg-blue-100') }} flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-location-dot {{ $region->avg_ghi > 6 ? 'text-brand-orange' : ($region->avg_ghi > 5.5 ? 'text-yellow-600' : 'text-blue-600') }} text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $region->name }}</h4>
                                    <p class="text-xs text-gray-500">Indonesia</p>
                                    <p class="text-xs font-bold text-brand-orange mt-0.5">{{ number_format($region->avg_ghi, 1) }} kWh/m²</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-between h-full py-1">
                                <span class="{{ $region->avg_ghi > 6 ? 'bg-green-100 text-green-700' : ($region->avg_ghi > 5.5 ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700') }} text-[10px] font-bold px-2 py-0.5 rounded-full">
                                    {{ $region->avg_ghi > 6 ? 'Tinggi' : ($region->avg_ghi > 5.5 ? 'Sedang' : 'Rendah') }}
                                </span>
                                <i class="fa-regular fa-star text-gray-300 hover:text-yellow-400 text-xs mt-2 transition"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <div id="map" class="flex-1 bg-gray-100 z-0"></div>

    </div>
</div>

<style>
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

    .sidebar-hidden {
        margin-left: -320px;
    }
</style>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map;
    var markers = {};
    var layers = {};
    var regionsData = @json($regions);

    document.addEventListener('DOMContentLoaded', function() {
        // 1. Inisialisasi Peta
        map = L.map('map', {
            zoomControl: false
        }).setView([-2.5489, 118.0149], 5);

        // 2. Tile Layers
        layers.streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        });

        layers.satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri'
        });

        layers.terrain = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data: &copy; OpenStreetMap contributors, SRTM | Map style: &copy; OpenTopoMap (CC-BY-SA)'
        });

        layers.streets.addTo(map);

        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        // 3. Markers
        const createCustomIcon = function(color) {
            return L.divIcon({
                className: 'custom-div-icon',
                html: `<div style="background-color: ${color}; width: 24px; height: 24px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3);"></div>`,
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });
        };

        regionsData.forEach(region => {
            let color = '#3B82F6'; // Blue (Rendah)
            if (region.avg_ghi > 6) color = '#10B981'; // Green (Tinggi)
            else if (region.avg_ghi > 5.5) color = '#F97316'; // Orange (Sedang)

            let marker = L.marker([region.latitude, region.longitude], {
                icon: createCustomIcon(color)
            }).addTo(map);

            marker.bindPopup(`
                <div class="p-1">
                    <h3 class="font-bold text-sm">${region.name}</h3>
                    <p class="text-xs text-gray-600">Potensi Solar: <b>${parseFloat(region.avg_ghi).toFixed(1)} kWh/m²</b></p>
                    <a href="/analysis?region=${region.id}" class="text-[10px] text-brand-orange font-bold mt-2 block hover:underline">LIHAT DETAIL</a>
                </div>
            `);

            markers[region.id] = marker;
        });

        // 4. Sidebar Toggle
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleText = document.getElementById('toggle-text');
            sidebar.classList.toggle('sidebar-hidden');
            
            if (sidebar.classList.contains('sidebar-hidden')) {
                toggleText.innerText = 'Tampilkan Panel';
            } else {
                toggleText.innerText = 'Sembunyikan Panel';
            }
            
            // Invalidate map size after transition
            setTimeout(() => map.invalidateSize(), 300);
        });

        // 5. Search Function
        document.getElementById('search-location').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.location-item');
            let visibleCount = 0;

            items.forEach(item => {
                const name = item.getAttribute('data-name');
                if (name.includes(query)) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            document.getElementById('visible-count').innerText = visibleCount;
        });

        // 6. GPS Detect (Already implemented, keep it)
        document.getElementById('btn-detect-location').addEventListener('click', function() {
            if (!navigator.geolocation) {
                alert("Geolocation tidak didukung oleh browser Anda");
                return;
            }

            const btn = this;
            const originalContent = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mendeteksi...';
            btn.disabled = true;

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    map.setView([lat, lng], 13);
                    if (window.userMarker) map.removeLayer(window.userMarker);
                    window.userMarker = L.marker([lat, lng]).addTo(map).bindPopup("Lokasi Anda").openPopup();
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                },
                function(error) {
                    alert("Gagal mendapatkan lokasi: " + error.message);
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                }
            );
        });
    });

    function focusLocation(id, lat, lng) {
        map.flyTo([lat, lng], 12);
        markers[id].openPopup();
        
        // Mobile view: hide sidebar when location selected
        if (window.innerWidth < 768) {
            document.getElementById('sidebar').classList.add('sidebar-hidden');
            document.getElementById('toggle-text').innerText = 'Tampilkan Panel';
            setTimeout(() => map.invalidateSize(), 300);
        }
    }

    function changeLayer(layerKey) {
        // Remove all layers
        for (let key in layers) {
            map.removeLayer(layers[key]);
        }
        // Add selected layer
        layers[layerKey].addTo(map);

        // Update buttons
        document.querySelectorAll('.layer-btn').forEach(btn => {
            btn.classList.remove('bg-white', 'text-brand-orange', 'shadow');
            btn.classList.add('text-gray-600', 'hover:text-gray-900');
        });

        const activeBtn = document.getElementById('btn-layer-' + layerKey);
        activeBtn.classList.remove('text-gray-600', 'hover:text-gray-900');
        activeBtn.classList.add('bg-white', 'text-brand-orange', 'shadow');
    }

    function downloadCSV() {
        let csvContent = "data:text/csv;charset=utf-8,ID,Name,Latitude,Longitude,Avg GHI\n";
        regionsData.forEach(region => {
            csvContent += `${region.id},${region.name},${region.latitude},${region.longitude},${region.avg_ghi}\n`;
        });
        
        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "solar_data_regions.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

@endsection
