@extends('layouts.frontend')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-gray-50/50">
    
    <div class="mb-8">
        <h4 class="text-brand-orange font-bold text-sm mb-1">Estimasi Finansial</h4>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Estimasi Biaya & Produksi Listrik</h1>
        <p class="text-gray-500 text-sm">
            Kalkulasi total biaya instalasi, ROI, dan estimasi produksi listrik tahunan.
        </p>
    </div>

    <div class="grid lg:grid-cols-12 gap-6">
        
        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-6">
                    <i class="fa-solid fa-gear text-brand-orange"></i> Parameter Sistem
                </h3>
                
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-900 mb-4">Jumlah Panel: <span id="panel-count-display" class="text-brand-orange">6 panel</span></label>
                    <input type="range" id="panel-count" min="1" max="100" value="6" class="w-full appearance-none bg-transparent">
                    <div class="flex justify-between text-xs text-gray-400 mt-2">
                        <span>1</span>
                        <span>100</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Panel Surya</label>
                    <div class="relative">
                        <select id="panel-type" class="w-full appearance-none px-4 py-2.5 border border-brand-orange rounded-lg text-sm text-gray-800 focus:outline-none bg-white font-medium">
                            @foreach($panelPrices as $panel)
                                <option value="{{ $panel->id }}" data-price="{{ $panel->price_per_watt }}" data-watt="{{ (int) filter_var($panel->name, FILTER_SANITIZE_NUMBER_INT) }}">
                                    {{ $panel->name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-900 font-bold"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Sistem</label>
                    <div class="flex bg-gray-100 p-1 rounded-lg" id="system-type-toggle">
                        <button data-type="on-grid" class="system-btn flex-1 py-2 text-sm font-medium text-gray-500 rounded-md hover:bg-gray-200 transition">On-Grid</button>
                        <button data-type="off-grid" class="system-btn flex-1 py-2 text-sm font-medium text-white bg-brand-orange shadow-sm rounded-md">Off-Grid</button>
                        <button data-type="hybrid" class="system-btn flex-1 py-2 text-sm font-medium text-gray-500 rounded-md hover:bg-gray-200 transition">Hybrid</button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 flex items-center gap-2 mb-5">
                    <i class="fa-solid fa-rupiah-sign text-brand-orange"></i> Rincian Biaya
                </h3>
                
                <div class="space-y-3 text-sm mb-6" id="cost-details">
                    <div class="flex justify-between text-gray-600">
                        <span id="detail-panel-label">Panel (6x Jinko Solar)</span>
                        <span class="font-medium text-gray-900" id="detail-panel-price">Rp 16.800.000</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span id="detail-inverter-label">Inverter (2.7 kW)</span>
                        <span class="font-medium text-gray-900" id="detail-inverter-price">Rp 9.450.000</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Instalasi</span>
                        <span class="font-medium text-gray-900" id="detail-install-price">Rp 3.000.000</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Mounting & Kabel</span>
                        <span class="font-medium text-gray-900" id="detail-mounting-price">Rp 2.100.000</span>
                    </div>
                    <div class="flex justify-between text-gray-600" id="detail-battery-row">
                        <span>Baterai (5 kWh)</span>
                        <span class="font-medium text-gray-900" id="detail-battery-price">Rp 40.000.000</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Sistem Monitoring</span>
                        <span class="font-medium text-gray-900" id="detail-monitor-price">Rp 2.500.000</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                    <span class="font-bold text-gray-900">Total Biaya</span>
                    <span class="text-xl font-bold text-brand-orange" id="total-cost">Rp 73.850.000</span>
                </div>
            </div>

            <div class="bg-teal-600 rounded-2xl p-6 text-white shadow-md relative overflow-hidden">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
                
                <h3 class="font-medium flex items-center gap-2 mb-2 text-sm opacity-90">
                    <i class="fa-solid fa-clock-rotate-left"></i> Estimasi Balik Modal (ROI)
                </h3>
                <p class="text-4xl font-bold mb-1" id="roi-years">9.2 Tahun</p>
                <p class="text-sm opacity-90 mb-6" id="monthly-savings-text">Penghematan: Rp 668.250/bulan</p>
                
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4 flex justify-between items-center border border-white/10">
                    <div>
                        <p class="text-xs opacity-80 mb-0.5">Produksi Bulanan</p>
                        <p class="font-bold text-lg" id="avg-monthly-prod">446 kWh</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col h-auto">
                <h3 class="font-bold text-gray-900 mb-4">Distribusi Biaya Instalasi</h3>
                <div class="flex-1 flex flex-col items-center justify-center relative min-h-[250px]">
                    <div class="w-full max-w-[280px] aspect-square relative">
                        <canvas id="costChart"></canvas>
                    </div>
                    <div class="flex flex-wrap justify-center gap-x-4 gap-y-2 mt-6 text-sm">
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#6366F1]"></span><span class="text-[#6366F1]">Baterai</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#10B981]"></span><span class="text-[#10B981]">Instalasi</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#EAB308]"></span><span class="text-[#EAB308]">Inverter</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#A855F7]"></span><span class="text-[#A855F7]">Monitoring</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#14B8A6]"></span><span class="text-[#14B8A6]">Mounting</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#F97316]"></span><span class="text-[#F97316]">Panel Surya</span></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-6">Estimasi Produksi Listrik per Bulan (kWh)</h3>
                <div class="w-full h-64">
                    <canvas id="productionChart"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-4">Perbandingan dengan Listrik PLN</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="border border-red-100 bg-red-50/50 rounded-xl p-4">
                        <p class="text-xs text-gray-500 mb-1">Tagihan PLN Saat Ini</p>
                        <p class="text-xl font-bold text-red-600 mb-1" id="current-pln-bill">Rp 750.000</p>
                        <p class="text-xs text-gray-400">Estimasi bulanan</p>
                    </div>
                    <div class="border border-green-100 bg-green-50/50 rounded-xl p-4">
                        <p class="text-xs text-gray-500 mb-1">Penghematan/Bulan</p>
                        <p class="text-xl font-bold text-brand-green mb-1" id="savings-monthly">Rp 668.250</p>
                        <p class="text-xs text-gray-400">Dengan panel surya</p>
                    </div>
                    <div class="border border-orange-100 bg-orange-50/50 rounded-xl p-4">
                        <p class="text-xs text-gray-500 mb-1">Penghematan/Tahun</p>
                        <p class="text-xl font-bold text-brand-orange mb-1" id="savings-yearly">Rp 8.019.000</p>
                        <p class="text-xs text-gray-400">Total per tahun</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data dari Controller
        const solarData = @json($solarData);
        const plnRate = 1500; // Rp per kWh (tarif rata-rata R1)
        
        let currentSystemType = 'off-grid';
        let costChart, productionChart;

        // Initialize Charts
        initCharts();
        
        // Event Listeners
        const panelCountInput = document.getElementById('panel-count');
        const panelTypeSelect = document.getElementById('panel-type');
        const systemBtns = document.querySelectorAll('.system-btn');

        panelCountInput.addEventListener('input', updateAll);
        panelTypeSelect.addEventListener('change', updateAll);
        
        systemBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                systemBtns.forEach(b => {
                    b.classList.remove('text-white', 'bg-brand-orange', 'shadow-sm');
                    b.classList.add('text-gray-500', 'hover:bg-gray-200');
                });
                this.classList.remove('text-gray-500', 'hover:bg-gray-200');
                this.classList.add('text-white', 'bg-brand-orange', 'shadow-sm');
                currentSystemType = this.dataset.type;
                updateAll();
            });
        });

        function updateAll() {
            const count = parseInt(panelCountInput.value);
            const selectedOption = panelTypeSelect.options[panelTypeSelect.selectedIndex];
            const pricePerWatt = parseFloat(selectedOption.dataset.price);
            const wattPerPanel = parseInt(selectedOption.dataset.watt);
            const panelName = selectedOption.text.trim();
            
            const totalWp = count * wattPerPanel;
            const totalkWp = totalWp / 1000;

            document.getElementById('panel-count-display').innerText = count + ' panel';

            // 1. Calculate Costs
            const panelCost = totalWp * pricePerWatt;
            const inverterCost = totalkWp * 3500000; // Estimasi 3.5jt per kW
            const installCost = 3000000 + (count * 100000); 
            const mountingCost = count * 350000;
            const monitorCost = 2500000;
            let batteryCost = 0;

            if (currentSystemType === 'off-grid') {
                batteryCost = totalkWp * 15000000; // Estimasi 15jt per kWp (kapasitas besar)
                document.getElementById('detail-battery-row').style.display = 'flex';
            } else if (currentSystemType === 'hybrid') {
                batteryCost = totalkWp * 7000000; // Estimasi 7jt per kWp (kapasitas backup)
                document.getElementById('detail-battery-row').style.display = 'flex';
            } else {
                document.getElementById('detail-battery-row').style.display = 'none';
            }

            const totalCost = panelCost + inverterCost + installCost + mountingCost + monitorCost + batteryCost;

            // Update UI Costs
            document.getElementById('detail-panel-label').innerText = `Panel (${count}x ${panelName})`;
            document.getElementById('detail-panel-price').innerText = formatRupiah(panelCost);
            document.getElementById('detail-inverter-label').innerText = `Inverter (${totalkWp.toFixed(1)} kW)`;
            document.getElementById('detail-inverter-price').innerText = formatRupiah(inverterCost);
            document.getElementById('detail-install-price').innerText = formatRupiah(installCost);
            document.getElementById('detail-mounting-price').innerText = formatRupiah(mountingCost);
            document.getElementById('detail-battery-price').innerText = formatRupiah(batteryCost);
            document.getElementById('detail-monitor-price').innerText = formatRupiah(monitorCost);
            document.getElementById('total-cost').innerText = formatRupiah(totalCost);

            // 2. Production & Savings
            const monthlyProductionArr = solarData.monthly.map(ghi => ghi * totalkWp * 30 * 0.8); // 0.8 efficiency factor
            const avgMonthlyProd = monthlyProductionArr.reduce((a, b) => a + b, 0) / 12;
            const monthlySavings = avgMonthlyProd * plnRate;
            const yearlySavings = monthlySavings * 12;
            const roiYears = totalCost / yearlySavings;

            document.getElementById('avg-monthly-prod').innerText = Math.round(avgMonthlyProd) + ' kWh';
            document.getElementById('savings-monthly').innerText = formatRupiah(monthlySavings);
            document.getElementById('savings-yearly').innerText = formatRupiah(yearlySavings);
            document.getElementById('roi-years').innerText = roiYears.toFixed(1) + ' Tahun';
            document.getElementById('monthly-savings-text').innerText = `Penghematan: ${formatRupiah(monthlySavings)}/bulan`;
            
            // Assume current bill is higher than production for visualization
            document.getElementById('current-pln-bill').innerText = formatRupiah(Math.max(monthlySavings * 1.2, 750000));

            // 3. Update Charts
            updateCharts(panelCost, inverterCost, installCost, mountingCost, batteryCost, monitorCost, monthlyProductionArr);
        }

        function formatRupiah(num) {
            return 'Rp ' + num.toLocaleString('id-ID');
        }

        function initCharts() {
            // Check for data from Calculator page
            const savedCount = localStorage.getItem('calc_panel_count');
            const savedType = localStorage.getItem('calc_system_type');
            
            if (savedCount) {
                document.getElementById('panel-count').value = savedCount;
            }
            if (savedType) {
                currentSystemType = savedType;
                const systemBtns = document.querySelectorAll('.system-btn');
                systemBtns.forEach(btn => {
                    btn.classList.remove('text-white', 'bg-brand-orange', 'shadow-sm');
                    btn.classList.add('text-gray-500', 'hover:bg-gray-200');
                    if (btn.dataset.type === savedType) {
                        btn.classList.remove('text-gray-500', 'hover:bg-gray-200');
                        btn.classList.add('text-white', 'bg-brand-orange', 'shadow-sm');
                    }
                });
            }

            const ctxCost = document.getElementById('costChart').getContext('2d');
            costChart = new Chart(ctxCost, {
                type: 'doughnut',
                data: {
                    labels: ['Baterai', 'Instalasi', 'Inverter', 'Monitoring', 'Mounting', 'Panel Surya'],
                    datasets: [{
                        data: [0, 0, 0, 0, 0, 0],
                        backgroundColor: ['#6366F1', '#10B981', '#EAB308', '#A855F7', '#14B8A6', '#F97316'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: { legend: { display: false } }
                }
            });

            const ctxProd = document.getElementById('productionChart').getContext('2d');
            productionChart = new Chart(ctxProd, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Produksi (kWh)',
                        data: Array(12).fill(0),
                        backgroundColor: '#F97316',
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [5, 5] } },
                        x: { grid: { display: false } }
                    }
                }
            });
            
            updateAll();
        }

        function updateCharts(panel, inverter, install, mounting, battery, monitor, prodArr) {
            costChart.data.datasets[0].data = [battery, install, inverter, monitor, mounting, panel];
            costChart.update();

            productionChart.data.datasets[0].data = prodArr;
            productionChart.update();
        }
    });
</script>

@endsection
