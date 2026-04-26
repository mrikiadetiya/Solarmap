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
        <div onclick="switchCategory('rumah-tangga')" id="tab-rumah-tangga" class="category-tab border border-orange-200 bg-orange-50/20 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer shadow-sm relative overflow-hidden transition-all duration-300">
            <div class="active-indicator absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
            <div class="icon-bg w-12 h-12 rounded-xl bg-orange-400 flex items-center justify-center text-white mb-3 shadow-md shadow-orange-200">
                <i class="fa-solid fa-house"></i>
            </div>
            <p class="tab-label font-bold text-sm text-gray-900">Rumah Tangga</p>
        </div>

        <div onclick="switchCategory('sekolah')" id="tab-sekolah" class="category-tab border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition-all duration-300">
            <div class="active-indicator hidden absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
            <div class="icon-bg w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-500 mb-3">
                <i class="fa-solid fa-school"></i>
            </div>
            <p class="tab-label font-medium text-sm text-gray-600">Sekolah</p>
        </div>

        <div onclick="switchCategory('puskesmas')" id="tab-puskesmas" class="category-tab border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition-all duration-300">
            <div class="active-indicator hidden absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
            <div class="icon-bg w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 mb-3">
                <i class="fa-solid fa-hospital"></i>
            </div>
            <p class="tab-label font-medium text-sm text-gray-600">Puskesmas</p>
        </div>

        <div onclick="switchCategory('desa')" id="tab-desa" class="category-tab border border-gray-200 bg-white hover:border-gray-300 rounded-2xl p-5 flex flex-col items-center justify-center cursor-pointer transition-all duration-300">
            <div class="active-indicator hidden absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
            <div class="icon-bg w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-500 mb-3">
                <i class="fa-solid fa-city"></i>
            </div>
            <p class="tab-label font-medium text-sm text-gray-600">Desa Terpencil</p>
        </div>
    </div>

    <div class="grid lg:grid-cols-12 gap-6">
        
        <div class="lg:col-span-8 space-y-6">
            
            <div id="main-card" class="bg-gradient-to-r from-[#F97316] to-[#EAB308] rounded-2xl p-6 shadow-md text-white">
                <div class="flex items-center gap-4 mb-6">
                    <div id="main-icon" class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-2xl border border-white/10">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <h2 id="main-title" class="text-2xl font-bold mb-1">Rumah Tangga</h2>
                        <p id="main-subtitle" class="text-sm opacity-90">Sistem Off-Grid / Hybrid</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Kebutuhan</p>
                        <p id="stat-kebutuhan" class="font-bold text-lg">300–1.500W</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Jumlah Panel</p>
                        <p id="stat-panel" class="font-bold text-lg">2–10 panel</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Kapasitas</p>
                        <p id="stat-kapasitas" class="font-bold text-lg">0.9–4.5 kWp</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/10">
                        <p class="text-xs opacity-80 mb-1">Estimasi Biaya</p>
                        <p id="stat-biaya" class="font-bold text-lg">Rp 15–75 Juta</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5 text-sm">Spesifikasi Teknis</h3>
                <div id="specs-container" class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Panel Surya</p>
                        <p id="spec-panel" class="font-bold text-gray-900">6 panel 450Wp</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Inverter</p>
                        <p id="spec-inverter" class="font-bold text-gray-900">3 kW</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Baterai</p>
                        <p id="spec-baterai" class="font-bold text-gray-900">10 kWh (off-grid)</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100/50">
                        <p class="text-xs text-gray-500 mb-1">Luas Area</p>
                        <p id="spec-luas" class="font-bold text-gray-900">12 m²</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-4 text-sm">Cocok Untuk</h3>
                <ul id="suitable-list" class="space-y-3">
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
                    <p id="subsidy-text" class="text-sm text-yellow-700">Tersedia subsidi BPPT untuk rumah tangga miskin</p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-6 text-sm">
                    <i class="fa-solid fa-calculator text-brand-orange"></i> Kalkulator Cepat
                </h3>
                
                <div class="mb-6">
                    <label class="block text-xs font-medium text-gray-700 mb-3">Kebutuhan Listrik: <span id="calc-watt-label" class="text-brand-orange font-bold">900W</span></label>
                    <input type="range" id="calc-watt-range" min="300" max="1500" step="100" value="900" class="w-full appearance-none bg-transparent">
                </div>

                <div class="space-y-4 text-sm mt-8">
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Jumlah Panel</span>
                        <span id="calc-panel" class="font-bold text-gray-900">2 panel</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Kapasitas</span>
                        <span id="calc-kapasitas" class="font-bold text-gray-900">0.9 kWp</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-50 pb-3">
                        <span class="text-gray-500">Produksi/Hari</span>
                        <span id="calc-produksi" class="font-bold text-gray-900">4.5 kWh</span>
                    </div>
                    <div class="flex justify-between pb-1">
                        <span class="text-gray-500">ROI Estimasi</span>
                        <span id="calc-roi" class="font-bold text-gray-900">5–8 tahun</span>
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

            <a href="/calculator" class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-3.5 rounded-xl shadow-md transition flex items-center justify-center gap-2 text-sm mt-4">
                <i class="fa-solid fa-calculator"></i> Kalkulator Lengkap
            </a>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const recommendations = {
        'rumah-tangga': {
            title: 'Rumah Tangga',
            subtitle: 'Sistem Off-Grid / Hybrid',
            icon: 'fa-house',
            stats: {
                kebutuhan: '300–1.500W',
                panel: '2–10 panel',
                kapasitas: '0.9–4.5 kWp',
                biaya: 'Rp 15–75 Juta'
            },
            specs: {
                panel: '6 panel 450Wp',
                inverter: '3 kW',
                baterai: '10 kWh (off-grid)',
                luas: '12 m²'
            },
            suitable: [
                'Rumah 1–3 kamar',
                'Daerah tanpa PLN',
                'Kebutuhan dasar (lampu, TV, kulkas)'
            ],
            subsidy: 'Tersedia subsidi BPPT untuk rumah tangga miskin',
            calcRange: { min: 300, max: 1500, step: 100, default: 900 }
        },
        'sekolah': {
            title: 'Sekolah',
            subtitle: 'Sistem Hybrid / On-Grid',
            icon: 'fa-school',
            stats: {
                kebutuhan: '2.000–5.000W',
                panel: '10–25 panel',
                kapasitas: '4.5–11.2 kWp',
                biaya: 'Rp 80–180 Juta'
            },
            specs: {
                panel: '20 panel 450Wp',
                inverter: '8 kW',
                baterai: '20 kWh (backup)',
                luas: '40 m²'
            },
            suitable: [
                'Sekolah Dasar & Menengah',
                'Laboratorium Komputer',
                'Penerangan Area Sekolah'
            ],
            subsidy: 'Dana Alokasi Khusus (DAK) Pendidikan tersedia untuk PLTS',
            calcRange: { min: 2000, max: 5000, step: 500, default: 3000 }
        },
        'puskesmas': {
            title: 'Puskesmas',
            subtitle: 'Sistem Hybrid High-Reliability',
            icon: 'fa-hospital',
            stats: {
                kebutuhan: '3.000–10.000W',
                panel: '15–50 panel',
                kapasitas: '6.7–22.5 kWp',
                biaya: 'Rp 120–450 Juta'
            },
            specs: {
                panel: '30 panel 450Wp',
                inverter: '12 kW',
                baterai: '40 kWh (critical backup)',
                luas: '60 m²'
            },
            suitable: [
                'Puskesmas Pembantu',
                'Penyimpanan Vaksin (Cold Chain)',
                'Layanan Gawat Darurat 24 Jam'
            ],
            subsidy: 'Program Kemenkes untuk elektrifikasi fasilitas kesehatan daerah 3T',
            calcRange: { min: 3000, max: 10000, step: 1000, default: 5000 }
        },
        'desa': {
            title: 'Desa Terpencil',
            subtitle: 'Micro-Grid Komunal',
            icon: 'fa-city',
            stats: {
                kebutuhan: '10–50 kW',
                panel: '50–250 panel',
                kapasitas: '22.5–112.5 kWp',
                biaya: 'Rp 500 Juta – 2.5 Miliar'
            },
            specs: {
                panel: '150 panel 450Wp',
                inverter: '50 kW Central',
                baterai: '200 kWh Energy Storage',
                luas: '300 m²'
            },
            suitable: [
                'Komunitas 20–50 KK',
                'Pompa Air Desa',
                'Penerangan Jalan Umum'
            ],
            subsidy: 'Subsidi Energi Baru Terbarukan (EBT) dari Kementerian ESDM',
            calcRange: { min: 10000, max: 50000, step: 5000, default: 20000 }
        }
    };

    function switchCategory(categoryId) {
        const data = recommendations[categoryId];
        if (!data) return;

        // Update Tabs UI
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.classList.remove('border-orange-200', 'bg-orange-50/20', 'shadow-sm');
            tab.classList.add('border-gray-200', 'bg-white');
            tab.querySelector('.active-indicator').classList.add('hidden');
            const label = tab.querySelector('.tab-label');
            label.classList.remove('font-bold', 'text-gray-900');
            label.classList.add('font-medium', 'text-gray-600');
            
            const iconBg = tab.querySelector('.icon-bg');
            if (tab.id === 'tab-rumah-tangga') {
                iconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 mb-3';
            } else if (tab.id === 'tab-sekolah') {
                iconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-500 mb-3';
            } else if (tab.id === 'tab-puskesmas') {
                iconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 mb-3';
            } else if (tab.id === 'tab-desa') {
                iconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-500 mb-3';
            }
        });

        const activeTab = document.getElementById(`tab-${categoryId}`);
        activeTab.classList.add('border-orange-200', 'bg-orange-50/20', 'shadow-sm');
        activeTab.classList.remove('border-gray-200', 'bg-white');
        activeTab.querySelector('.active-indicator').classList.remove('hidden');
        const activeLabel = activeTab.querySelector('.tab-label');
        activeLabel.classList.add('font-bold', 'text-gray-900');
        activeLabel.classList.remove('font-medium', 'text-gray-600');
        
        const activeIconBg = activeTab.querySelector('.icon-bg');
        if (categoryId === 'rumah-tangga') activeIconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-orange-400 flex items-center justify-center text-white mb-3 shadow-md shadow-orange-200';
        if (categoryId === 'sekolah') activeIconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-emerald-500 flex items-center justify-center text-white mb-3 shadow-md shadow-emerald-200';
        if (categoryId === 'puskesmas') activeIconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-blue-500 flex items-center justify-center text-white mb-3 shadow-md shadow-blue-200';
        if (categoryId === 'desa') activeIconBg.className = 'icon-bg w-12 h-12 rounded-xl bg-purple-500 flex items-center justify-center text-white mb-3 shadow-md shadow-purple-200';

        // Update Main Content
        document.getElementById('main-title').innerText = data.title;
        document.getElementById('main-subtitle').innerText = data.subtitle;
        document.getElementById('main-icon').innerHTML = `<i class="fa-solid ${data.icon}"></i>`;
        
        // Update Stats
        document.getElementById('stat-kebutuhan').innerText = data.stats.kebutuhan;
        document.getElementById('stat-panel').innerText = data.stats.panel;
        document.getElementById('stat-kapasitas').innerText = data.stats.kapasitas;
        document.getElementById('stat-biaya').innerText = data.stats.biaya;

        // Update Specs
        document.getElementById('spec-panel').innerText = data.specs.panel;
        document.getElementById('spec-inverter').innerText = data.specs.inverter;
        document.getElementById('spec-baterai').innerText = data.specs.baterai;
        document.getElementById('spec-luas').innerText = data.specs.luas;

        // Update Suitable List
        const list = document.getElementById('suitable-list');
        list.innerHTML = '';
        data.suitable.forEach(item => {
            list.innerHTML += `
                <li class="flex items-center gap-3 text-sm text-gray-700">
                    <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-brand-green shrink-0">
                        <i class="fa-solid fa-check text-[10px]"></i>
                    </div>
                    ${item}
                </li>
            `;
        });

        // Update Subsidy
        document.getElementById('subsidy-text').innerText = data.subsidy;

        // Update Calculator Range
        const range = document.getElementById('calc-watt-range');
        range.min = data.calcRange.min;
        range.max = data.calcRange.max;
        range.step = data.calcRange.step;
        range.value = data.calcRange.default;
        updateCalculator(data.calcRange.default);
    }

    function updateCalculator(watt) {
        document.getElementById('calc-watt-label').innerText = watt >= 1000 ? (watt/1000).toFixed(1) + 'kW' : watt + 'W';
        
        const panelCapacity = 450; // Wp per panel
        const numPanels = Math.ceil(watt / panelCapacity);
        const totalCapacity = (numPanels * panelCapacity) / 1000; // kWp
        const dailyProduction = (totalCapacity * 4.5).toFixed(1); // kWh (avg 4.5 hours sun)
        
        document.getElementById('calc-panel').innerText = numPanels + ' panel';
        document.getElementById('calc-kapasitas').innerText = totalCapacity.toFixed(2) + ' kWp';
        document.getElementById('calc-produksi').innerText = dailyProduction + ' kWh';
        
        // Simple ROI estimate
        const roi = watt < 2000 ? '5–8 tahun' : (watt < 10000 ? '4–7 tahun' : '3–6 tahun');
        document.getElementById('calc-roi').innerText = roi;
    }

    document.getElementById('calc-watt-range').addEventListener('input', function(e) {
        updateCalculator(parseInt(e.target.value));
    });

    // Initial load
    document.addEventListener('DOMContentLoaded', () => {
        updateCalculator(900);
    });
</script>
@endpush