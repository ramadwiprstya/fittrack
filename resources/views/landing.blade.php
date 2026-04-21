<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack - Pantau Kesehatan & Nutrisi Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        .floating-delayed {
            animation: floating 3s ease-in-out infinite 1s;
        }
        .floating-slow {
            animation: floating 4s ease-in-out infinite 2s;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Header -->
    <header class="px-6 py-4 bg-white shadow-lg border-b border-green-100">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3 group">
                <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="h-20 w-auto group-hover:scale-105 transition-all duration-300">
            </div>
            
            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">
                    Masuk
                </a>
                <a href="#about" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">
                    Tentang Kami
                </a>
                <a href="#features" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">
                    Fitur
                </a>
            </nav>
            
            <!-- Language Selector & CTA -->
            <div class="flex items-center space-x-4">
                <!-- Language Selector -->
                <div class="flex items-center space-x-2 bg-gray-50 rounded-lg px-3 py-2 hover:bg-gray-100 transition-colors duration-300 cursor-pointer group">
                    <div class="w-6 h-4 rounded-sm overflow-hidden shadow-sm border border-gray-300 group-hover:shadow-md transition-shadow">
                        <div class="w-full h-1/2 bg-red-500"></div>
                        <div class="w-full h-1/2 bg-white"></div>
                    </div>
                    <span class="text-sm text-gray-600 font-medium">ID</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-gray-600 transition-colors"></i>
                </div>
                
                <!-- CTA Button -->
                <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen bg-gray-50 relative overflow-hidden">
        
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center min-h-screen">
                <!-- Left Section - Text Content -->
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-6xl lg:text-7xl font-bold leading-tight">
                            <span class="text-gray-900">Pantau Kesehatan</span>
                            <br>
                            <span class="text-green-500">& Nutrisi Anda</span>
                            <br>
                            <span class="text-gray-900">Setiap Hari</span>
                        </h1>
                        <p class="text-2xl text-gray-700 font-medium">
                            Dapatkan kontrol penuh atas kesehatan Anda dengan FitTrack
                        </p>
                    </div>
                    
                    <div class="pt-4">
                        <a href="{{ route('register') }}" 
                           class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-xl text-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-block">
                            Mulai Menggunakan FitTrack
                        </a>
                    </div>
                </div>
                
                <!-- Right Section - Visual Content -->
                <div class="relative flex justify-center items-center">
                    <div class="relative">
                        <!-- Dashboard Image -->
                        <img src="{{ asset('images/fotodashboard.png') }}" 
                             alt="FitTrack Dashboard Preview" 
                             class="w-full max-w-2xl mx-auto drop-shadow-2xl hover:drop-shadow-3xl transition-all duration-500 transform hover:scale-105">
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Fitur Unggulan FitTrack</h2>
                <p class="text-xl text-gray-600">Semua yang Anda butuhkan untuk hidup sehat dalam satu aplikasi</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100 hover:shadow-lg transition-all duration-300">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <!-- Outer ring -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full opacity-20"></div>
                        <!-- Middle ring -->
                        <div class="absolute inset-2 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full opacity-40"></div>
                        <!-- Inner circle -->
                        <div class="absolute inset-4 bg-gradient-to-br from-green-600 to-emerald-700 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-utensils text-white text-2xl"></i>
                        </div>
                        <!-- Decorative dots -->
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full"></div>
                        <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-orange-400 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Pantau Nutrisi</h3>
                    <p class="text-gray-600">Catat setiap makanan dan minuman dengan detail nutrisi yang akurat</p>
                </div>
                
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-100 hover:shadow-lg transition-all duration-300">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <!-- Outer ring -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full opacity-20"></div>
                        <!-- Middle ring -->
                        <div class="absolute inset-2 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full opacity-40"></div>
                        <!-- Inner circle -->
                        <div class="absolute inset-4 bg-gradient-to-br from-blue-600 to-cyan-700 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <!-- Chart lines decoration -->
                        <div class="absolute -top-2 -right-2 w-4 h-4 border-2 border-blue-300 rounded-sm transform rotate-45"></div>
                        <div class="absolute -bottom-2 -left-2 w-3 h-3 border-2 border-cyan-300 rounded-sm transform rotate-12"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Analisis Kesehatan</h3>
                    <p class="text-gray-600">Lihat tren kesehatan Anda dengan grafik dan statistik yang mudah dipahami</p>
                </div>
                
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-purple-50 to-indigo-50 border border-purple-100 hover:shadow-lg transition-all duration-300">
                    <div class="relative w-20 h-20 mx-auto mb-4">
                        <!-- Outer ring -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full opacity-20"></div>
                        <!-- Middle ring -->
                        <div class="absolute inset-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full opacity-40"></div>
                        <!-- Inner circle -->
                        <div class="absolute inset-4 bg-gradient-to-br from-purple-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <!-- Progress indicator -->
                        <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-md">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Target Harian</h3>
                    <p class="text-gray-600">Tetapkan dan capai target nutrisi harian yang sesuai dengan kebutuhan Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-8">Tentang FitTrack</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                FitTrack adalah aplikasi kesehatan yang dirancang khusus untuk membantu Anda 
                mencapai gaya hidup sehat melalui pemantauan nutrisi yang tepat. Dengan antarmuka 
                yang intuitif dan data yang akurat, kami memudahkan Anda untuk mengontrol kesehatan 
                dan mencapai target nutrisi harian.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="flex items-center justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="FitTrack Logo" class="h-24 w-auto">
            </div>
        </div>
    </footer>

</body>
</html>