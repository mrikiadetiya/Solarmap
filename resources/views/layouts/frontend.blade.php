<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SolarMap Indonesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            orange: '#F97316',
                            dark: '#032D1E',
                            green: '#10B981',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="flex items-center gap-2">
                    <i class="fa-solid fa-sun text-brand-orange text-3xl"></i>
                    <span class="font-bold text-xl text-gray-900">SolarMap <span class="text-brand-orange">Indonesia</span></span>
                </a>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="{{ request()->is('/') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Beranda
                    </a>
                    
                    <a href="/map" class="{{ request()->is('map') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Peta Interaktif
                    </a>
                    
                    <a href="/analysis" class="{{ request()->is('analysis') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Analisis
                    </a>
                    
                    <a href="/calculator" class="{{ request()->is('calculator') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Kalkulator
                    </a>
                    
                    <a href="/cost" class="{{ request()->is('cost') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Estimasi Biaya
                    </a>
                    
                    <a href="/recommendation" class="{{ request()->is('recommendation') ? 'px-4 py-2 rounded-full border border-gray-200 text-brand-orange font-semibold shadow-sm bg-orange-50' : 'text-gray-600 hover:text-gray-900 font-medium transition' }}">
                        Rekomendasi
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="/login" class="text-gray-700 font-medium hover:text-gray-900 transition">Masuk</a>
                    <a href="/admin" class="bg-brand-orange hover:bg-orange-600 text-white px-5 py-2.5 rounded-full font-medium transition shadow-md shadow-orange-500/30">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>