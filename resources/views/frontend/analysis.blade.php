@extends('layouts.frontend')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-gray-50/50">
    
    <div class="mb-8">
        <h4 class="text-brand-orange font-bold text-sm mb-1">Analisis Energi Surya</h4>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Input Lokasi & Analisis</h1>
        <p class="text-gray-500 text-sm">
            Data radiasi matahari real-time dari <span class="text-brand-orange font-semibold">NASA POWER API</span> — akurat hingga tingkat desa.
        </p>
    </div>

    <div class="grid lg:grid-cols-12 gap-6">
        
        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                    <i class="fa-solid fa-location-dot text-brand-orange"></i> Input Lokasi
                </h2>
                <form action="{{ route('analysis') }}" method="GET" id="analysis-form">
                    <div class="mb-4 relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lokasi</label>
                        <div class="relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="search-input" name="location" value="{{ $locationName }}" autocomplete="off"
                                   class="w-full pl-9 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 focus:ring-1 focus:ring-brand-orange focus:border-brand-orange outline-none"
                                   placeholder="Cari desa atau wilayah...">
                        </div>
                        
                        <!-- Autocomplete Dropdown -->
                        <div id="autocomplete-results" class="absolute z-20 w-full mt-1 bg-white border border-gray-100 rounded-lg shadow-xl hidden max-h-60 overflow-y-auto custom-scrollbar">
                            @foreach($regions as $region)
                                <div class="search-item p-3 hover:bg-orange-50 cursor-pointer border-b border-gray-50 last:border-none transition flex items-center gap-3" 
                                     data-name="{{ $region->name }}" data-lat="{{ $region->latitude }}" data-lon="{{ $region->longitude }}">
                                    <div class="w-7 h-7 rounded-full bg-orange-100 flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-location-dot text-brand-orange text-xs"></i>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $region->name }}</p>
                                        <p class="text-[10px] text-gray-400">Indonesia</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                            <input type="text" id="input-lat" name="lat" value="{{ $lat }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 bg-gray-50 font-mono">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                            <input type="text" id="input-lon" name="lon" value="{{ $lon }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800 bg-gray-50 font-mono">
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <button type="button" id="btn-gps" class="w-full py-2.5 border border-brand-orange text-brand-orange font-medium rounded-lg text-sm flex justify-center items-center gap-2 hover:bg-orange-50 transition">
                            <i class="fa-solid fa-crosshairs"></i> Gunakan Lokasi Saya (GPS)
                        </button>
                        <button type="submit" class="w-full py-2.5 bg-brand-orange text-white font-bold rounded-lg text-sm flex justify-center items-center gap-2 shadow-md hover:bg-orange-600 transition">
                            <i class="fa-solid fa-chart-line"></i> Mulai Analisis
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center text-brand-orange">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Sumber Data</p>
                        <p class="text-sm font-bold text-brand-orange">{{ $isMock ? 'Mock Data' : 'NASA POWER API' }}</p>
                    </div>
                </div>
                <span class="{{ $isMock ? 'border-yellow-400 text-yellow-600' : 'border-green-400 text-green-600' }} border text-xs px-3 py-1 rounded-full font-medium">
                    {{ $isMock ? 'Simulasi' : 'Live API' }}
                </span>
            </div>
            <p class="text-xs text-gray-400 px-2">Diperbarui: {{ now()->format('d/m/Y, H.i.s') }}</p>

            @if($isMock)
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-start gap-3">
                <i class="fa-solid fa-triangle-exclamation text-yellow-600 mt-0.5"></i>
                <p class="text-sm text-yellow-800 text-xs">NASA API tidak tersedia atau koordinat tidak valid. Menampilkan data simulasi.</p>
            </div>
            @endif

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-5">
                    <i class="fa-regular fa-sun text-brand-orange"></i> Hasil Analisis
                </h3>
                
                @php
                    $avg = $isMock ? 5.8 : $solarData['average'];
                    $potentialStatus = $avg >= 5.5 ? 'Tinggi' : ($avg >= 4.5 ? 'Sedang' : 'Rendah');
                    $statusColor = $avg >= 5.5 ? 'text-brand-green' : ($avg >= 4.5 ? 'text-yellow-600' : 'text-red-600');
                    $potentialProd = round($avg * 3, 1); // Mock calculation: 3kWp system
                @endphp

                <div class="space-y-3 mb-6">
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-sun text-orange-400 text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Radiasi Rata-rata</p>
                            <p class="font-bold text-gray-900">{{ $avg }} kWh/m²/hari</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-regular fa-clock text-yellow-500 text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Peak Sun Hours</p>
                            <p class="font-bold text-gray-900">{{ $avg }} jam/hari</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-bolt text-brand-green text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Potensi Harian (3kWp)</p>
                            <p class="font-bold text-gray-900">{{ $potentialProd }} kWh</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-medal text-brand-green text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Status Potensi</p>
                            <p class="font-bold {{ $statusColor }}">{{ $potentialStatus }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50/50 border border-green-100 rounded-xl p-4 flex gap-3">
                    <i class="fa-solid fa-circle-info text-brand-green mt-0.5"></i>
                    <p class="text-xs text-green-800 leading-relaxed">
                        @if($avg >= 5.5)
                            Lokasi ini memiliki potensi energi surya yang sangat baik untuk instalasi panel surya skala rumah tangga maupun komunitas.
                        @elseif($avg >= 4.5)
                            Lokasi ini memiliki potensi yang cukup baik. Pertimbangkan efisiensi peralatan untuk hasil maksimal.
                        @else
                            Potensi rendah. Analisis lebih mendalam diperlukan untuk menentukan kelayakan investasi.
                        @endif
                    </p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Grafik Radiasi Matahari</h3>
                        <p class="text-sm text-gray-400">{{ $locationName }} — {{ $isMock ? 'Mock Data' : 'NASA POWER API' }}</p>
                    </div>
                    <div class="flex bg-gray-100 p-1 rounded-lg">
                        <button class="px-4 py-1.5 text-xs font-medium text-brand-orange bg-white shadow-sm rounded-md">Bulanan</button>
                    </div>
                </div>
                
                <div class="w-full h-72">
                    <canvas id="radiationChart"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5">Perbandingan Skenario Cuaca</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="border border-orange-200 bg-orange-50/30 rounded-xl p-5">
                        <i class="fa-regular fa-sun text-2xl text-gray-700 mb-3"></i>
                        <p class="text-sm font-medium text-gray-600">Cuaca Cerah</p>
                        <p class="text-2xl font-bold text-gray-900 my-1">{{ $potentialProd }} kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 100%</p>
                    </div>
                    <div class="border border-yellow-200 bg-yellow-50/30 rounded-xl p-5">
                        <i class="fa-solid fa-cloud-sun text-2xl text-gray-500 mb-3"></i>
                        <p class="text-sm font-medium text-gray-600">Cuaca Berawan</p>
                        <p class="text-2xl font-bold text-gray-900 my-1">{{ round($potentialProd * 0.67, 1) }} kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 67%</p>
                    </div>
                    <div class="border border-gray-200 bg-gray-50 rounded-xl p-5">
                        <i class="fa-solid fa-cloud text-2xl text-gray-400 mb-3"></i>
                        <p class="text-sm font-medium text-gray-600">Cuaca Mendung</p>
                        <p class="text-2xl font-bold text-gray-900 my-1">{{ round($potentialProd * 0.3, 1) }} kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 30%</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5">Ringkasan Bulanan</h3>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs text-gray-500 border-b border-gray-200">
                                <th class="pb-3 font-medium">Bulan</th>
                                <th class="pb-3 font-medium text-right">Radiasi (kWh/m²)</th>
                                <th class="pb-3 font-medium text-right">Produksi (kWh)</th>
                                <th class="pb-3 font-medium text-right pr-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @php
                                $monthsArr = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                                $monthFull = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                $monthlyValues = $isMock ? 
                                    ['JAN'=>5.2, 'FEB'=>5.5, 'MAR'=>5.8, 'APR'=>6.1, 'MAY'=>6.4, 'JUN'=>6.2, 'JUL'=>6.5, 'AUG'=>6.7, 'SEP'=>6.3, 'OCT'=>5.9, 'NOV'=>5.4, 'DEC'=>5.1] : 
                                    $solarData['monthly'];
                            @endphp
                            
                            @foreach($monthsArr as $index => $mKey)
                            @php
                                $val = $monthlyValues[$mKey];
                                $prod = round($val * 30, 0); // Estimation for 1kWp for a month
                                $mStatus = $val >= 5.5 ? 'Tinggi' : ($val >= 4.5 ? 'Sedang' : 'Rendah');
                                $mColor = $val >= 5.5 ? 'text-brand-green' : ($val >= 4.5 ? 'text-orange-500' : 'text-red-500');
                            @endphp
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">{{ $monthFull[$index] }}</td>
                                <td class="py-3 text-right text-gray-600">{{ number_format($val, 2) }}</td>
                                <td class="py-3 text-right text-gray-600">{{ $prod }}</td>
                                <td class="py-3 text-right pr-2"><span class="{{ $mColor }} text-xs font-medium">{{ $mStatus }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f9fafb; 
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e5e7eb; 
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #d1d5db; 
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('radiationChart').getContext('2d');
        
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const monthlyDataArr = @json(array_values($monthlyValues));
        const productionDataArr = monthlyDataArr.map(v => v * 25);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Radiasi (kWh/m²)',
                        data: monthlyDataArr,
                        backgroundColor: '#F97316',
                        barPercentage: 0.8,
                        categoryPercentage: 0.4,
                        yAxisID: 'y',
                    },
                    {
                        label: 'Produksi (kWh)',
                        data: productionDataArr,
                        backgroundColor: '#10B981',
                        barPercentage: 0.8,
                        categoryPercentage: 0.4,
                        yAxisID: 'y1',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        padding: 10,
                        cornerRadius: 8
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Inter', size: 11 }, color: '#6B7280' }
                    },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        title: { display: true, text: 'Radiasi', font: { size: 10 } },
                        grid: { color: '#F3F4F6', borderDash: [5, 5] }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        title: { display: true, text: 'Produksi', font: { size: 10 } },
                        grid: { drawOnChartArea: false }
                    }
                }
            }
        });

        // Search & Autocomplete
        const searchInput = document.getElementById('search-input');
        const resultsContainer = document.getElementById('autocomplete-results');
        const searchItems = document.querySelectorAll('.search-item');

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            let hasResults = false;

            if (query.length > 0) {
                searchItems.forEach(item => {
                    const name = item.dataset.name.toLowerCase();
                    if (name.includes(query)) {
                        item.style.display = 'flex';
                        hasResults = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                if (hasResults) {
                    resultsContainer.classList.remove('hidden');
                } else {
                    resultsContainer.classList.add('hidden');
                }
            } else {
                resultsContainer.classList.add('hidden');
            }
        });

        // Click on search item
        searchItems.forEach(item => {
            item.addEventListener('click', function() {
                const name = this.dataset.name;
                const lat = this.dataset.lat;
                const lon = this.dataset.lon;

                searchInput.value = name;
                document.getElementById('input-lat').value = lat;
                document.getElementById('input-lon').value = lon;
                resultsContainer.classList.add('hidden');
            });
        });

        // Hide dropdown on click outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.classList.add('hidden');
            }
        });

        // GPS Functionality
        document.getElementById('btn-gps').addEventListener('click', function() {
            if (navigator.geolocation) {
                const btn = this;
                const originalContent = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mencari Lokasi...';
                btn.disabled = true;

                navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude.toFixed(6);
                    const lon = position.coords.longitude.toFixed(6);
                    
                    document.getElementById('input-lat').value = lat;
                    document.getElementById('input-lon').value = lon;
                    searchInput.value = "Lokasi Saya (" + lat + ", " + lon + ")";
                    
                    btn.innerHTML = '<i class="fa-solid fa-check"></i> Berhasil!';
                    btn.disabled = false;
                    
                    setTimeout(() => {
                        btn.innerHTML = originalContent;
                    }, 3000);
                }, error => {
                    alert("Gagal mendapatkan lokasi: " + error.message);
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                });
            } else {
                alert("Geolocation tidak didukung browser ini.");
            }
        });
    });
</script>

@endsection
