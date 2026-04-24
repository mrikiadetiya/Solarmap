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
                <form action="#" method="GET">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Desa / Lokasi</label>
                        <input type="text" value="Desa Wairasa, NTT" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                            <input type="text" value="-9.6234" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                            <input type="text" value="119.8765" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-800">
                        </div>
                    </div>
                    <div class="space-y-2 mb-6">
                        <button type="button" class="w-full text-left px-4 py-2 border border-gray-100 rounded-lg text-sm text-gray-600 flex items-center gap-2">
                            <i class="fa-regular fa-circle text-brand-orange/50 text-xs"></i> Desa Wairasa, NTT
                        </button>
                        <button type="button" class="w-full text-left px-4 py-2 border border-gray-100 rounded-lg text-sm text-gray-600 flex items-center gap-2">
                            <i class="fa-regular fa-circle text-brand-orange/50 text-xs"></i> Desa Rote, NTT
                        </button>
                        <button type="button" class="w-full text-left px-4 py-2 border border-gray-100 rounded-lg text-sm text-gray-600 flex items-center gap-2">
                            <i class="fa-regular fa-circle text-brand-orange/50 text-xs"></i> Desa Wamena, Papua
                        </button>
                    </div>
                    <div class="space-y-3">
                        <button type="button" class="w-full py-2.5 border border-brand-orange text-brand-orange font-medium rounded-lg text-sm flex justify-center items-center gap-2">
                            <i class="fa-solid fa-crosshairs"></i> Gunakan GPS Saya
                        </button>
                        <button type="button" class="w-full py-2.5 bg-brand-orange text-white font-bold rounded-lg text-sm flex justify-center items-center gap-2 shadow-md">
                            <i class="fa-solid fa-magnifying-glass"></i> Analisis Lokasi
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
                        <p class="text-sm font-bold text-brand-orange">Mock Data</p>
                    </div>
                </div>
                <span class="border border-yellow-400 text-yellow-600 text-xs px-3 py-1 rounded-full font-medium">Simulasi</span>
            </div>
            <p class="text-xs text-gray-400 px-2">Diperbarui: 24/4/2026, 21.26.18</p>

            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-start gap-3">
                <i class="fa-solid fa-triangle-exclamation text-yellow-600 mt-0.5"></i>
                <p class="text-sm text-yellow-800">NASA API tidak tersedia. Menampilkan data simulasi.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-5">
                    <i class="fa-regular fa-sun text-brand-orange"></i> Hasil Analisis
                </h3>
                
                <div class="space-y-3 mb-6">
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-sun text-orange-400 text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Radiasi Rata-rata</p>
                            <p class="font-bold text-gray-900">5.8 kWh/m²/hari</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-regular fa-clock text-yellow-500 text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Peak Sun Hours</p>
                            <p class="font-bold text-gray-900">5.8 jam/hari</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-bolt text-brand-green text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Potensi Harian (3kWp)</p>
                            <p class="font-bold text-gray-900">17.4 kWh</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <i class="fa-solid fa-medal text-brand-green text-xl w-6 text-center"></i>
                        <div>
                            <p class="text-xs text-gray-500">Status Potensi</p>
                            <p class="font-bold text-brand-green">Tinggi</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50/50 border border-green-100 rounded-xl p-4 flex gap-3">
                    <i class="fa-solid fa-circle-info text-brand-green mt-0.5"></i>
                    <p class="text-xs text-green-800 leading-relaxed">
                        Lokasi ini memiliki potensi energi surya yang sangat baik untuk instalasi panel surya skala rumah tangga maupun komunitas.
                    </p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Grafik Radiasi Matahari</h3>
                        <p class="text-sm text-gray-400">Desa Wairasa, NTT — Mock Data</p>
                    </div>
                    <div class="flex bg-gray-100 p-1 rounded-lg">
                        <button class="px-4 py-1.5 text-xs font-medium text-gray-500 rounded-md">Harian</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-brand-orange bg-white shadow-sm rounded-md">Bulanan</button>
                        <button class="px-4 py-1.5 text-xs font-medium text-gray-500 rounded-md">Tahunan</button>
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
                        <p class="text-2xl font-bold text-gray-900 my-1">17.4 kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 100%</p>
                    </div>
                    <div class="border border-yellow-200 bg-yellow-50/30 rounded-xl p-5">
                        <i class="fa-solid fa-cloud-sun text-2xl text-gray-500 mb-3"></i>
                        <p class="text-sm font-medium text-gray-600">Cuaca Berawan</p>
                        <p class="text-2xl font-bold text-gray-900 my-1">11.7 kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 67%</p>
                    </div>
                    <div class="border border-gray-200 bg-gray-50 rounded-xl p-5">
                        <i class="fa-solid fa-cloud text-2xl text-gray-400 mb-3"></i>
                        <p class="text-sm font-medium text-gray-600">Cuaca Mendung</p>
                        <p class="text-2xl font-bold text-gray-900 my-1">5.2 kWh</p>
                        <p class="text-xs text-gray-400">Efisiensi: 30%</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5">Ringkasan Bulanan</h3>
                <div class="overflow-x-auto">
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
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Jan</td>
                                <td class="py-3 text-right text-gray-600">5.2</td>
                                <td class="py-3 text-right text-gray-600">156</td>
                                <td class="py-3 text-right pr-2"><span class="text-orange-500 text-xs font-medium">Sedang</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Feb</td>
                                <td class="py-3 text-right text-gray-600">5.5</td>
                                <td class="py-3 text-right text-gray-600">154</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Mar</td>
                                <td class="py-3 text-right text-gray-600">5.8</td>
                                <td class="py-3 text-right text-gray-600">174</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Apr</td>
                                <td class="py-3 text-right text-gray-600">6.1</td>
                                <td class="py-3 text-right text-gray-600">183</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Mei</td>
                                <td class="py-3 text-right text-gray-600">6.4</td>
                                <td class="py-3 text-right text-gray-600">192</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Jun</td>
                                <td class="py-3 text-right text-gray-600">6.2</td>
                                <td class="py-3 text-right text-gray-600">186</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Jul</td>
                                <td class="py-3 text-right text-gray-600">6.5</td>
                                <td class="py-3 text-right text-gray-600">195</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Agu</td>
                                <td class="py-3 text-right text-gray-600">6.7</td>
                                <td class="py-3 text-right text-gray-600">201</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Sep</td>
                                <td class="py-3 text-right text-gray-600">6.3</td>
                                <td class="py-3 text-right text-gray-600">189</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Okt</td>
                                <td class="py-3 text-right text-gray-600">5.9</td>
                                <td class="py-3 text-right text-gray-600">177</td>
                                <td class="py-3 text-right pr-2"><span class="text-brand-green text-xs font-medium">Tinggi</span></td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="py-3 font-medium text-gray-700">Nov</td>
                                <td class="py-3 text-right text-gray-600">5.4</td>
                                <td class="py-3 text-right text-gray-600">162</td>
                                <td class="py-3 text-right pr-2"><span class="text-orange-500 text-xs font-medium">Sedang</span></td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium text-gray-700">Des</td>
                                <td class="py-3 text-right text-gray-600">5.1</td>
                                <td class="py-3 text-right text-gray-600">153</td>
                                <td class="py-3 text-right pr-2"><span class="text-orange-500 text-xs font-medium">Sedang</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('radiationChart').getContext('2d');
        
        // Data diambil dari tabel
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        // Data Utama (Warna Hijau) - Nilai diperkirakan dari gambar
        const dataProduksi = [156, 154, 174, 183, 192, 186, 195, 201, 189, 177, 162, 153];
        // Data Kecil (Warna Oranye) - Mewakili metrik lain (misal radiasi kecil)
        const dataRadiasi = [5.2, 5.5, 5.8, 6.1, 6.4, 6.2, 6.5, 6.7, 6.3, 5.9, 5.4, 5.1];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Radiasi',
                        data: dataRadiasi,
                        backgroundColor: '#F97316', // brand-orange
                        barPercentage: 0.8,
                        categoryPercentage: 0.4
                    },
                    {
                        label: 'Produksi',
                        data: dataProduksi,
                        backgroundColor: '#10B981', // brand-green
                        barPercentage: 0.8,
                        categoryPercentage: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Menyembunyikan legend bawaan agar mirip gambar
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: { size: 13, family: 'Inter' },
                        bodyFont: { size: 13, family: 'Inter' },
                        padding: 10,
                        cornerRadius: 8
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false, // Menghilangkan garis vertikal
                            drawBorder: false
                        },
                        ticks: {
                            font: { family: 'Inter', size: 11 },
                            color: '#6B7280'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 220,
                        ticks: {
                            stepSize: 55,
                            font: { family: 'Inter', size: 11 },
                            color: '#6B7280'
                        },
                        grid: {
                            color: '#F3F4F6', // Warna garis horizontal samar
                            borderDash: [5, 5], // Garis putus-putus
                            drawBorder: false
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>

@endsection