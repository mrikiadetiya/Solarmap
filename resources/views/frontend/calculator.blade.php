@extends('layouts.frontend')

@section('content')

<style>
    /* Styling dasar slider agar berwarna oranye */
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #F97316;
        cursor: pointer;
        margin-top: -6px;
        box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.2);
    }
    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 6px;
        cursor: pointer;
        background: #4B5563; /* Warna abu-abu gelap track */
        border-radius: 4px;
    }
</style>

<div class="max-w-4xl mx-auto px-4 py-10">
    
    <div class="text-center mb-10">
        <h4 class="text-brand-orange font-bold text-sm mb-1">Kalkulator Cerdas</h4>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Kalkulator Kebutuhan Panel Surya</h1>
        <p class="text-gray-500 text-sm">Hitung jumlah panel, luas area, dan kapasitas sistem secara otomatis.</p>
    </div>

    <div class="flex items-center justify-center mb-10 max-w-2xl mx-auto relative">
        <div class="absolute top-1/2 left-0 w-full h-0.5 bg-gray-200 -z-10 -translate-y-1/2"></div>
        <div id="progress-line" class="absolute top-1/2 left-0 h-0.5 bg-brand-green -z-10 -translate-y-1/2 transition-all duration-300" style="width: 0%;"></div>

        <div class="flex flex-col items-center relative z-0 flex-1">
            <div id="step-circle-1" class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white bg-brand-orange shadow-md transition-colors duration-300">
                <span id="step-text-1">1</span>
                <i id="step-check-1" class="fa-solid fa-check hidden"></i>
            </div>
            <p id="step-label-1" class="text-xs font-bold text-brand-orange mt-2">Lokasi</p>
        </div>

        <div class="flex flex-col items-center relative z-0 flex-1">
            <div id="step-circle-2" class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-500 bg-gray-200 transition-colors duration-300">
                <span id="step-text-2">2</span>
                <i id="step-check-2" class="fa-solid fa-check hidden"></i>
            </div>
            <p id="step-label-2" class="text-xs font-medium text-gray-400 mt-2">Kebutuhan</p>
        </div>

        <div class="flex flex-col items-center relative z-0 flex-1">
            <div id="step-circle-3" class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-500 bg-gray-200 transition-colors duration-300">
                <span id="step-text-3">3</span>
                <i id="step-check-3" class="fa-solid fa-check hidden"></i>
            </div>
            <p id="step-label-3" class="text-xs font-medium text-gray-400 mt-2">Sistem</p>
        </div>

        <div class="flex flex-col items-center relative z-0 flex-1">
            <div id="step-circle-4" class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-500 bg-gray-200 transition-colors duration-300">
                <span id="step-text-4">4</span>
                <i id="step-check-4" class="fa-solid fa-check hidden"></i>
            </div>
            <p id="step-label-4" class="text-xs font-medium text-gray-400 mt-2">Hasil</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] min-h-[400px]">
        
        <div id="form-step-1" class="block animate-fade-in">
            <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                <i class="fa-solid fa-location-dot text-brand-orange"></i> Pilih Lokasi
            </h2>
            
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Desa / Lokasi</label>
                <input type="text" value="Desa Wairasa, NTT" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange">
            </div>

            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <button type="button" class="text-left px-4 py-3 border border-brand-orange bg-orange-50 rounded-xl text-sm text-brand-orange flex items-center gap-2 transition">
                    <i class="fa-solid fa-location-dot"></i> Desa Wairasa, NTT
                </button>
                <button type="button" class="text-left px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-600 hover:border-brand-orange transition flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-gray-400"></i> Desa Rote, NTT
                </button>
                <button type="button" class="text-left px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-600 hover:border-brand-orange transition flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-gray-400"></i> Desa Maumere, NTT
                </button>
                <button type="button" class="text-left px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-600 hover:border-brand-orange transition flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-gray-400"></i> Desa Wamena, Papua
                </button>
            </div>

            <button type="button" class="w-full py-3 border border-brand-orange text-brand-orange font-medium rounded-xl hover:bg-orange-50 transition flex items-center justify-center gap-2 text-sm mb-10">
                <i class="fa-solid fa-crosshairs"></i> Gunakan Lokasi GPS Saya
            </button>

            <div class="flex justify-between items-center pt-6 border-t border-gray-100 mt-auto">
                <button type="button" class="px-6 py-2.5 text-gray-400 flex items-center gap-2 cursor-not-allowed" disabled>
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </button>
                <button type="button" onclick="goToStep(2)" class="px-8 py-2.5 bg-brand-orange hover:bg-orange-600 text-white font-semibold rounded-lg shadow-md transition flex items-center gap-2">
                    Lanjut <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div id="form-step-2" class="hidden animate-fade-in">
            <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                <i class="fa-solid fa-bolt text-brand-orange"></i> Kebutuhan Listrik
            </h2>

            <label class="block text-sm font-medium text-gray-700 mb-3">Tipe Penggunaan</label>
            <div class="grid md:grid-cols-2 gap-4 mb-8">
                <div class="border border-brand-orange bg-orange-50 rounded-xl p-4 cursor-pointer flex gap-4 items-center">
                    <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center text-brand-orange shrink-0">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Rumah Tangga</h4>
                        <p class="text-xs text-gray-500">300–1500W</p>
                    </div>
                </div>
                <div class="border border-gray-200 hover:border-brand-orange rounded-xl p-4 cursor-pointer flex gap-4 items-center transition">
                    <div class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 shrink-0">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Sekolah</h4>
                        <p class="text-xs text-gray-500">1500–5000W</p>
                    </div>
                </div>
                <div class="border border-gray-200 hover:border-brand-orange rounded-xl p-4 cursor-pointer flex gap-4 items-center transition">
                    <div class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 shrink-0">
                        <i class="fa-regular fa-hospital"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Puskesmas</h4>
                        <p class="text-xs text-gray-500">2000–8000W</p>
                    </div>
                </div>
                <div class="border border-gray-200 hover:border-brand-orange rounded-xl p-4 cursor-pointer flex gap-4 items-center transition">
                    <div class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 shrink-0">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Desa</h4>
                        <p class="text-xs text-gray-500">10000W+</p>
                    </div>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-sm font-bold text-gray-900 mb-4">Kebutuhan Listrik: <span class="text-brand-orange">900 W</span></label>
                <input type="range" min="100" max="50000" value="900" class="w-full appearance-none bg-transparent">
                <div class="flex justify-between text-xs text-gray-400 mt-2 mb-4">
                    <span>100W</span>
                    <span>50.000W</span>
                </div>
                <input type="number" value="900" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange">
            </div>

            <div class="flex justify-between items-center pt-6 border-t border-gray-100 mt-auto">
                <button type="button" onclick="goToStep(1)" class="px-6 py-2.5 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center gap-2 transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </button>
                <button type="button" onclick="goToStep(3)" class="px-8 py-2.5 bg-brand-orange hover:bg-orange-600 text-white font-semibold rounded-lg shadow-md transition flex items-center gap-2">
                    Lanjut <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div id="form-step-3" class="hidden animate-fade-in">
            <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                <i class="fa-solid fa-gear text-brand-orange"></i> Pilih Tipe Sistem
            </h2>

            <div class="space-y-4 mb-10">
                <div class="border border-brand-orange bg-orange-50 rounded-xl p-5 flex items-start gap-4 cursor-pointer relative">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-brand-orange shrink-0 mt-1">
                        <i class="fa-solid fa-plug"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">On-Grid</h4>
                        <p class="text-sm text-gray-500">Terhubung ke jaringan PLN. Cocok untuk area yang sudah ada listrik PLN.</p>
                    </div>
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 w-6 h-6 bg-brand-orange rounded-full flex items-center justify-center text-white text-xs">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>

                <div class="border border-gray-200 hover:border-brand-orange rounded-xl p-5 flex items-start gap-4 cursor-pointer transition">
                    <div class="w-10 h-10 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 shrink-0 mt-1">
                        <i class="fa-solid fa-car-battery"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Off-Grid</h4>
                        <p class="text-sm text-gray-500">Mandiri tanpa PLN. Ideal untuk daerah terpencil tanpa jaringan listrik.</p>
                    </div>
                </div>

                <div class="border border-gray-200 hover:border-brand-orange rounded-xl p-5 flex items-start gap-4 cursor-pointer transition">
                    <div class="w-10 h-10 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 shrink-0 mt-1">
                        <i class="fa-solid fa-arrows-spin"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Hybrid</h4>
                        <p class="text-sm text-gray-500">Kombinasi on-grid dan baterai. Fleksibel dan andal untuk berbagai kondisi.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center pt-6 border-t border-gray-100 mt-auto">
                <button type="button" onclick="goToStep(2)" class="px-6 py-2.5 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center gap-2 transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </button>
                <button type="button" onclick="goToStep(4)" class="px-8 py-2.5 bg-brand-orange hover:bg-orange-600 text-white font-semibold rounded-lg shadow-md transition flex items-center gap-2">
                    Lanjut <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div id="form-step-4" class="hidden animate-fade-in">
            <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-2">
                <i class="fa-solid fa-award text-brand-orange"></i> Hasil Kalkulasi
            </h2>
            <p class="text-sm text-gray-600 mb-6">Berdasarkan kebutuhan <span class="font-bold text-gray-900">900W</span> di <span class="font-bold text-gray-900">Desa Wairasa, NTT</span> dengan sistem <span class="font-bold text-gray-900">on-grid</span>:</p>

            <div class="bg-brand-orange text-white rounded-2xl p-6 mb-6 shadow-md bg-gradient-to-r from-[#F97316] to-[#F59E0B]">
                <p class="text-sm font-medium mb-1 opacity-90">Rekomendasi Utama</p>
                <h3 class="text-4xl font-bold mb-2">9 Panel Surya</h3>
                <p class="text-sm opacity-90">untuk memenuhi kebutuhan 900W</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <i class="fa-solid fa-table-cells text-orange-400 mb-3"></i>
                    <p class="text-xs text-gray-500 mb-1">Jumlah Panel</p>
                    <p class="text-xl font-bold text-gray-900">9 panel</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <i class="fa-solid fa-bolt text-yellow-500 mb-3"></i>
                    <p class="text-xs text-gray-500 mb-1">Kapasitas Sistem</p>
                    <p class="text-xl font-bold text-gray-900">4.05 kWp</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <i class="fa-solid fa-ruler-combined text-brand-green mb-3"></i>
                    <p class="text-xs text-gray-500 mb-1">Luas Area</p>
                    <p class="text-xl font-bold text-gray-900">18.0 m²</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <i class="fa-regular fa-sun text-teal-400 mb-3"></i>
                    <p class="text-xs text-gray-500 mb-1">Produksi/Hari</p>
                    <p class="text-xl font-bold text-gray-900">23.5 kWh</p>
                </div>
            </div>

            <div class="bg-green-50 border border-green-100 rounded-xl p-5 mb-8">
                <h4 class="text-sm font-bold text-brand-green flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-location-dot"></i> Estimasi Produksi Bulanan
                </h4>
                <p class="text-3xl font-bold text-brand-green mb-1">705 kWh</p>
                <p class="text-xs text-green-700">per bulan (5.8 jam puncak — NASA POWER)</p>
            </div>

            <div class="flex gap-4 mb-8">
                <button class="flex-1 bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 rounded-lg shadow-md transition flex justify-center items-center gap-2">
                    <i class="fa-solid fa-rupiah-sign"></i> Estimasi Biaya
                </button>
                <button class="px-6 py-3 border border-gray-200 text-gray-600 font-medium rounded-lg hover:bg-gray-50 transition flex justify-center items-center gap-2">
                    <i class="fa-regular fa-file-pdf"></i> PDF
                </button>
            </div>

            <div class="flex justify-between items-center pt-6 border-t border-gray-100 mt-auto">
                <button type="button" onclick="goToStep(3)" class="px-6 py-2.5 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center gap-2 transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </button>
                <button type="button" onclick="goToStep(1)" class="px-8 py-2.5 border-2 border-brand-orange text-brand-orange font-bold rounded-lg hover:bg-orange-50 transition flex items-center gap-2">
                    <i class="fa-solid fa-rotate-right"></i> Hitung Ulang
                </button>
            </div>
        </div>

    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    function goToStep(stepNumber) {
        // 1. Sembunyikan semua step form
        for (let i = 1; i <= 4; i++) {
            document.getElementById('form-step-' + i).classList.add('hidden');
            document.getElementById('form-step-' + i).classList.remove('block');
        }
        
        // 2. Tampilkan step yang diminta
        document.getElementById('form-step-' + stepNumber).classList.remove('hidden');
        document.getElementById('form-step-' + stepNumber).classList.add('block');

        // 3. Update Stepper UI (Lingkaran, Teks, Garis)
        for (let i = 1; i <= 4; i++) {
            let circle = document.getElementById('step-circle-' + i);
            let textNum = document.getElementById('step-text-' + i);
            let checkIcon = document.getElementById('step-check-' + i);
            let label = document.getElementById('step-label-' + i);

            if (i < stepNumber) {
                // Step yang sudah lewat (Completed) -> Hijau & Checkmark
                circle.className = "w-10 h-10 rounded-full flex items-center justify-center font-bold text-white bg-brand-green shadow-md transition-colors duration-300";
                textNum.classList.add('hidden');
                checkIcon.classList.remove('hidden');
                label.className = "text-xs font-bold text-gray-400 mt-2"; // Label abu-abu
            } else if (i === stepNumber) {
                // Step saat ini (Active) -> Oranye
                circle.className = "w-10 h-10 rounded-full flex items-center justify-center font-bold text-white bg-brand-orange shadow-md transition-colors duration-300";
                textNum.classList.remove('hidden');
                checkIcon.classList.add('hidden');
                
                // Pengecualian warna teks label untuk menyesuaikan gambar:
                if(i === 1) label.className = "text-xs font-bold text-brand-orange mt-2";
                if(i === 2) label.className = "text-xs font-bold text-brand-orange mt-2";
                if(i === 3) label.className = "text-xs font-bold text-brand-orange mt-2";
                if(i === 4) label.className = "text-xs font-bold text-brand-orange mt-2";

            } else {
                // Step yang belum dilalui (Upcoming) -> Abu-abu
                circle.className = "w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-500 bg-gray-200 transition-colors duration-300";
                textNum.classList.remove('hidden');
                checkIcon.classList.add('hidden');
                label.className = "text-xs font-medium text-gray-400 mt-2";
            }
        }

        // 4. Update Garis Progress Hijau di Belakang
        let progressLine = document.getElementById('progress-line');
        // Rumus sederhana lebar garis berdasarkan step
        let widthPercentage = ((stepNumber - 1) / 3) * 100;
        progressLine.style.width = widthPercentage + '%';
    }
</script>

@endsection