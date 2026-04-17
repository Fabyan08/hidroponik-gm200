@include('layouts.onboarding.header')
<main class="pt-32 pb-24 px-6 relative min-h-screen">

    <!-- Ambient Light Glows -->
    <div class="glow-blob bg-emerald-100 w-[500px] h-[500px] top-0 left-0"></div>
    <div class="glow-blob bg-teal-50 w-[600px] h-[600px] bottom-0 right-0"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-8 font-medium">
            <a href="pelatihan.html" class="hover:text-emerald-600 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Akademi
            </a>
            <span class="text-gray-300 hidden sm:inline">/</span>
            <span class="text-gray-900 font-bold truncate hidden sm:inline">{{ $data->title }}</span>
        </div>

        <!-- Layout 2 Kolom -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <!-- Kolom Kiri: Detail Konten (Span 8) -->
            <div class="lg:col-span-8">

                <!-- Header Visual -->
                <div
                    class="rounded-[2rem] overflow-hidden mb-10 shadow-lg border border-gray-100 relative h-[300px] md:h-[450px]">
                    <div class="absolute inset-0 bg-gray-900/10 z-10"></div>
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}"
                        class="w-full h-full object-cover relative z-0">

                </div>

                <!-- Judul & Meta -->
                <div class="pb-2 border-b border-gray-100">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">{{ $data->title }}
                    </h1>
                    <p class="text-lg text-gray-500 mb-6 leading-relaxed">{{ $data->description }}</p>
                </div>


            </div>

            <!-- Kolom Kanan: Sticky Sidebar Pendaftaran (Span 4) -->
            <div class="lg:col-span-4 relative">
                <!-- Gunakan top-28 agar tidak tertutup navbar saat sticky -->
                <div class="lg:sticky lg:top-28">

                    <!-- Kartu Informasi & Harga -->
                    <div class="glass-card rounded-[2rem] p-6 shadow-xl ">

                        <!-- Harga -->
                        <div class="mb-6 pb-6 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-500 mb-1">Informasi Pendaftaran</p>
                        </div>

                        <!-- Detail Jadwal -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 shrink-0">
                                    <i class="fa-regular fa-calendar text-emerald-500"></i>
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-gray-900">Tanggal</h5>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::setLocale('id') }}
                                        {{ \Carbon\Carbon::parse($data->date)->translatedFormat('l, d F Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 shrink-0">
                                    <i class="fa-regular fa-clock text-emerald-500"></i>
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-gray-900">Waktu Pelaksanaan</h5>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($data->time)->format('H.i') }} WIB</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 shrink-0">
                                    <i class="fa-solid fa-location-dot text-emerald-500"></i>
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-gray-900">Lokasi Pelatihan</h5>
                                    <p class="text-sm text-gray-600 leading-tight">{{ $data->location }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar Kuota -->
                        @php
                            $quota = $data->quota;
                            $booked = 0; // sementara
                            $sisa = $quota - $booked;
                            $percent = $quota > 0 ? ($booked / $quota) * 100 : 0;
                        @endphp

                        <div class="mb-6 bg-red-50/50 p-4 rounded-xl border border-red-100">

                            <!-- HEADER -->
                            <div class="flex justify-between w-full text-xs font-bold mb-2">
                                <span class="text-gray-700">Kuota Terisi</span>

                                <span class="{{ $sisa <= 5 ? 'text-red-600' : 'text-emerald-600' }}">
                                    Sisa {{ $sisa }} kursi
                                </span>
                            </div>

                            <!-- PROGRESS BAR -->
                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full
            {{ $sisa <= 5 ? 'bg-red-500' : 'bg-emerald-500' }}
            rounded-full transition-all duration-500"
                                    style="width: {{ $percent }}%">
                                </div>
                            </div>

                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col gap-3">
                            <button onclick="daftarPelatihan()"
                                class="w-full py-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold transition-all shadow-[0_4px_15px_rgba(16,185,129,0.3)] hover:shadow-[0_8px_20px_rgba(16,185,129,0.4)] flex items-center justify-center gap-2">
                                Daftar Sekarang <i class="fa-solid fa-arrow-right text-sm"></i>
                            </button>
                            <button onclick="bagikanLink()"
                                class="w-full py-3 rounded-xl bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold text-sm transition-all flex items-center justify-center gap-2">
                                <i class="fa-solid fa-share-nodes"></i> Bagikan Info Kelas
                            </button>
                        </div>

                    </div>

                    <!-- Card Bantuan -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-500">Ada pertanyaan tentang kelas ini?</p>
                        <a href="#"
                            class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 hover:text-emerald-700 mt-1">
                            <i class="fa-brands fa-whatsapp"></i> Tanya Admin (CS)
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<!-- Sticky Bottom Bar untuk Mobile (Tampil saat di-scroll ke bawah pada layar kecil) -->
<div id="mobileBottomCTA"
    class="lg:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-100 shadow-[0_-4px_20px_rgba(0,0,0,0.05)] p-4 z-50 transform translate-y-full transition-transform duration-300">
    <div class="flex items-center justify-between gap-4 max-w-7xl mx-auto">

        <button onclick="daftarPelatihan()"
            class="flex-1 py-3 px-6 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold transition-all shadow-md flex justify-center items-center gap-2 whitespace-nowrap">
            Daftar <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-24 lg:pb-8 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
        <div>
            <a href="index.html" class="text-2xl font-extrabold flex items-center gap-2 mb-6">
                <i class="fa-solid fa-leaf text-emerald-500"></i>
                <span class="text-white">GM <span class="text-emerald-500">200</span></span>
            </a>
            <p class="text-gray-400 text-sm mb-6 leading-relaxed">Menyediakan sayuran hidroponik premium dan pusat
                pelatihan pertanian modern untuk gaya hidup sehat dan mandiri.</p>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Navigasi</h4>
            <ul class="space-y-3 text-sm text-gray-400">
                <li><a href="index.html" class="hover:text-emerald-400 transition-colors">Beranda</a></li>
                <li><a href="produk.html" class="hover:text-emerald-400 transition-colors">Katalog Sayuran</a></li>
                <li><a href="artikel.html" class="hover:text-emerald-400 transition-colors">Blog & Edukasi</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Layanan</h4>
            <ul class="space-y-3 text-sm text-gray-400">
                <li><a href="#" class="hover:text-emerald-400 transition-colors">Langganan Sayur</a></li>
                <li><a href="#" class="hover:text-emerald-400 transition-colors">Supply Restoran</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Kontak Kami</h4>
            <ul class="space-y-4 text-sm text-gray-400">
                <li class="flex items-center gap-3">
                    <i class="fa-brands fa-whatsapp text-emerald-500"></i>
                    <span>+62 812 3456 7890</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto border-t border-gray-800 pt-8 text-center text-xs text-gray-500">
        <p>&copy; 2026 GM 200 Hydroponics. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<!-- Toast Container -->
<div id="toastContainer"
    class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[100] flex flex-col gap-2 pointer-events-none"></div>


@include('layouts.onboarding.footer')
