<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Hidroponik GM200') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            400: '#34d399',
                            500: '#10B981',
                            600: '#059669',
                            900: '#065F46'
                        },
                        leaf: '#2ecc71',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-15px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAFAFA;
            /* Dominan putih bersih/abu sangat muda */
            color: #1F2937;
            overflow-x: hidden;
        }

        /* Light Glassmorphism */
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(16, 185, 129, 0.1);
            border-color: rgba(16, 185, 129, 0.2);
        }

        /* Text Gradients */
        .text-gradient {
            background: linear-gradient(135deg, #059669, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Soft Background Blobs */
        .glow-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>

<body class="antialiased relative">
    <!-- FLOATING CART -->
    <div id="floatingCart"
        class="fixed bottom-6 left-6 w-14 h-14  bg-emerald-500 text-white rounded-full shadow-lg flex items-center justify-center cursor-pointer hidden z-[9999]">

        <i class="fas fa-shopping-cart text-lg"></i>

        <!-- badge -->
        <span id="cartCount"
            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
            0
        </span>
    </div>
    <div id="cartBackdrop" class="fixed inset-0 bg-black/40 hidden z-[9997]" onclick="toggleCart()"></div>
    <!-- OVERLAY CART -->
    <div id="cartOverlay"
        class="fixed top-0 left-0 h-full w-0 bg-white z-[9998] shadow-xl overflow-hidden transition-all duration-300">

        <div class="p-6 flex flex-col h-full">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Keranjang</h2>
                <button onclick="toggleCart()" class="text-xl font-bold">✕</button>
            </div>

            <!-- ITEMS -->
            <div id="cartItems" class="flex-1 overflow-y-auto space-y-4"></div>

            <!-- FOOTER -->
            <div class="border-t pt-4">
                <p class="font-bold mb-2">Total: <span id="cartTotal">Rp 0</span></p>
                <button class="w-full bg-emerald-500 text-white py-3 rounded-xl">
                    Checkout
                </button>
            </div>

        </div>
    </div>
    <div class="glow-blob bg-emerald-200 w-[500px] h-[500px] top-[-10%] left-[-10%]"></div>
    <div class="glow-blob bg-green-100 w-[400px] h-[400px] top-[40%] right-[-5%]"></div>
    <div class="glow-blob bg-teal-100 w-[600px] h-[600px] bottom-[10%] left-[20%]"></div>

    <nav class="fixed w-full z-50 glass-nav transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex justify-between items-center">

            <!-- Logo -->
            <a href="#" class="text-xl md:text-2xl font-extrabold flex items-center gap-2">
                <i class="fa-solid fa-leaf text-emerald-500 text-2xl md:text-3xl"></i>
                <span class="text-gray-900 tracking-tight">
                    GM <span class="text-emerald-500">200</span>
                </span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center text-sm font-semibold text-gray-600">
                <a href="/"
                    class="{{ request()->is('/') ? 'text-emerald-500' : 'text-gray-600' }} hover:text-emerald-500">
                    Beranda
                </a>

                <a href="tentang-kami"
                    class="{{ request()->is('tentang-kami') ? 'text-emerald-500' : 'text-gray-600' }} hover:text-emerald-500">
                    Tentang Kami
                </a>

                <a href="produk"
                    class="{{ request()->is('produk') ? 'text-emerald-500' : 'text-gray-600' }} hover:text-emerald-500">
                    Produk
                </a>

                <a href="artikel"
                    class="{{ request()->is('artikel') ? 'text-emerald-500' : 'text-gray-600' }} hover:text-emerald-500">
                    Artikel
                </a>

                <a href="pelatihan"
                    class="{{ request()->is('pelatihan') ? 'text-emerald-500' : 'text-gray-600' }} hover:text-emerald-500">
                    Pelatihan
                </a>
                <a href="https://wa.me/6281234567890"
                    class="block text-center bg-emerald-500 text-white px-5 py-2 rounded-full">
                    Hubungi Kami
                </a>
            </div>

            <!-- Hamburger -->
            <button id="menu-btn" class="md:hidden text-gray-900 focus:outline-none">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden px-6 pb-4 space-y-4 text-sm font-semibold text-gray-700 bg-white/90 backdrop-blur-lg">

            <a href="/" class="block {{ request()->is('/') ? 'text-emerald-500' : '' }}">
                Beranda
            </a> <a href="tentang-kami" class="block {{ request()->is('tentang-kami') ? 'text-emerald-500' : '' }}">
                Tentang Kami
            </a>
            <a href="produk" class="block {{ request()->is('produk') ? 'text-emerald-500' : '' }}">
                Produk
            </a>
            <a href="artikel" class="block {{ request()->is('artikel') ? 'text-emerald-500' : '' }}">
                Artikel
            </a>
            <a href="pelatihan" class="block {{ request()->is('pelatihan') ? 'text-emerald-500' : '' }}">
                Pelatihan
            </a>

            <a href="https://wa.me/6281234567890"
                class="block text-center bg-emerald-500 text-white px-5 py-2 rounded-full">
                Hubungi Kami
            </a>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
