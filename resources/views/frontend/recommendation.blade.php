@extends('layouts.frontend')

@section('content')

<style>
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
        background: #4B5563;
        border-radius: 4px;
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-gray-50/30">
    
    <div class="mb-8">
        <h4 class="text-brand-orange font-bold text-sm mb-1">Rekomendasi Cerdas</h4>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Rekomendasi Sistem Otomatis</h1>
        <p class="text-gray-500 text-sm">
            Sistem AI merekomendasikan solusi terbaik berdasarkan kebutuhan dan lokasi Anda.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="border border-orange-200 bg-orange-50/20 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer shadow-sm relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
            <div class="w-12 h-12 rounded-xl bg-orange-400 flex items-center justify-center text-white mb-3 shadow-md shadow-orange-200">
                <i class="fa-solid fa-house"></i>
            </div>
            <p class="font-bold text-sm text-gray-900">Rumah Tangga</p>
        </div>

        <div class="border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-500 mb-3">
                <i class="fa-solid fa-school"></i>
            </div>
            <p class="font-medium text-sm text-gray-600">Sekolah</p>
        </div>

        <div class="border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 mb-3">
                <i class="fa-solid fa-hospital"></i>
            </div>
            <p class="font-medium text-sm text-gray-600">Puskesmas</p>
        </div>

        <div class="border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition">
            <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-500 mb-3">
                <i class="fa-solid fa-city"></i>
            </div>
            <p class="font-medium text-sm text-gray-600">Desa Terpencil</p>
        </div>
    </div>

    <div class="grid lg:grid-cols-12 gap-6">
        
        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-gradient-to-r from-[#F97316] to-[#EAB308] rounded-2xl p-6 shadow-md text-white">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-2xl border border-white/10">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-1">Rumah Tangga</h2>
                        <p class="text-sm opacity-90">Sistem Off-Grid / Hybrid</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Kebutuhan</p>
                        <p class="font-bold text-lg">300–1.500W</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Jumlah Panel</p>
                        <p class="font-bold text-lg">2–10 panel</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Kapasitas</p>
                        <p class="font-bold text-lg">0.9–4.5 kWp</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Estimasi Biaya</p>
                        <p class="font-bold text-lg">Rp 15–75 Juta</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5 text-sm">Spesifikasi Teknis</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Panel Surya</p>
                        <p class="font-bold text-gray-900">6 panel 450Wp</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Inverter</p>
                        <p class="font-bold text-gray-900">3 kW</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Baterai</p>
                        <p class="font-bold text-gray-900">10 kWh (off-grid)</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Luas Area</p>
                        <p class="font-bold text-gray-900">12 m²</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-4 text-sm">Cocok Untuk</h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm text-gray-700">
                        <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-brand-green shrink-0">
                            <i class="fa-solid fa-check text-[10px]"></i>
                        </div>
                        Rumah 1–3 kamar
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-700">
                        <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-brand-green shrink-0">
                            <i class="fa-solid fa-check text-[10px]"></i>
                        </div>
                        Daerah tanpa PLN
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-700">
                        <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-brand-green shrink-0">
                            <i class="fa-solid fa-check text-[10px]"></i>
                        </div>
                        Kebutuhan dasar (lampu, TV, kulkas)
                    </li>
                </ul>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 shrink-0">
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <div>
                    <h4 class="font-bold text-yellow-800 text-sm mb-1">Subsidi & Bantuan Pemerintah</h4>
                    <p class="text-sm text-yellow-700">Tersedia subsidi BPPT untuk rumah tangga miskin</p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-6 text-sm">
                    <i class="fa-solid fa-calculator text-brand-orange"></i> Kalkulator Cepat
                </h3>
                
                <div class="mb-6">
                    <label class="block text-xs font-medium text-gray-700 mb-3">Kebutuhan Listrik: <span class="text-brand-orange font-bold">900W</span></label>
                    <input type="range" min="300" max="1500" value="900" class="w-full appearance-none bg-transparent">
                </div>

                <div class="space-y-4 text-sm mt-8">
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Jumlah Panel</span>
                        <span class="font-bold text-gray-900">9 panel</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Kapasitas</span>
                        <span class="font-bold text-gray-900">4.05 kWp</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Produksi/Hari</span>
                        <span class="font-bold text-gray-900">22.3 kWh</span>
                    </div>
                    <div class="flex justify-between pb-1">
                        <span class="text-gray-500">ROI Estimasi</span>
                        <span class="font-bold text-gray-900">5–8 tahun</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5 text-sm">Perbandingan Sistem</h3>
                
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between border border-gray-100/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-brand-orange shrink-0">
                                <i class="fa-solid fa-plug text-xs"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-xs mb-0.5">On-Grid</h4>
                                <p class="text-[10px] text-gray-500">Terhubung PLN</p>
                            </div>
                        </div>
                        <div class="text-right text-[10px]">
                            <p class="text-brand-green font-medium mb-0.5">✓ Biaya rendah</p>
                            <p class="text-red-400">X Butuh PLN</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between border border-gray-100/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-brand-orange shrink-0">
                                <i class="fa-solid fa-car-battery text-xs"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-xs mb-0.5">Off-Grid</h4>
                                <p class="text-[10px] text-gray-500">Mandiri penuh</p>
                            </div>
                        </div>
                        <div class="text-right text-[10px]">
                            <p class="text-brand-green font-medium mb-0.5">✓ Tanpa PLN</p>
                            <p class="text-red-400">X Biaya baterai</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between border border-gray-100/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-brand-orange shrink-0">
                                <i class="fa-solid fa-arrows-spin text-xs"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-xs mb-0.5">Hybrid</h4>
                                <p class="text-[10px] text-gray-500">Kombinasi</p>
                            </div>
                        </div>
                        <div class="text-right text-[10px]">
                            <p class="text-brand-green font-medium mb-0.5">✓ Fleksibel</p>
                            <p class="text-red-400">X Biaya lebih</p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-3.5 rounded-xl shadow-md transition flex items-center justify-center gap-2 text-sm mt-4">
                <i class="fa-solid fa-calculator"></i> Kalkulator Lengkap
            </button>

        </div>
    </div>
</div>

@endsection