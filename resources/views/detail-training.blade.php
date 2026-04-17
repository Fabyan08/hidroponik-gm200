@include('layouts.onboarding.header')
<style>
    .input-modern {
        width: 100%;
        padding: 12px 16px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        background: #f9fafb;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .input-modern:focus {
        outline: none;
        border-color: #10b981;
        background: white;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
    }

    /* ANIMASI */
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-scaleIn {
        animation: scaleIn 0.25s ease;
    }
</style>
<main class="pt-32 pb-24 px-6 relative min-h-screen">
    <div id="modalDaftar" class="fixed inset-0 z-[9999] hidden flex items-center justify-center">

        <!-- BACKDROP -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm z-10" onclick="closeModal()"></div>

        <!-- MODAL -->
        <div class="relative z-20 bg-white/90 backdrop-blur-xl w-full max-w-md p-8 rounded-3xl shadow-2xl">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
                ✕
            </button>
            <!-- HEADER -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-extrabold text-gray-900">Form Pendaftaran</h2>
                <p class="text-sm text-gray-500 mt-1">Isi data dengan benar ya 👇</p>
            </div>

            <form id="formPelatihan" class="space-y-4">

                <input type="hidden" id="training_id" value="{{ $data->id }}">

                <!-- INPUT -->
                <div class="space-y-3">

                    <input type="text" id="nama" placeholder="Nama Lengkap" class="input-modern">

                    <input type="email" id="email" placeholder="Email" class="input-modern">

                    <input type="text" id="phone" placeholder="No HP" class="input-modern">

                    <input type="text" id="pekerjaan" placeholder="Pekerjaan" class="input-modern">

                    <input type="text" id="institusi" placeholder="Institusi" class="input-modern">
                </div>

                <!-- BUTTON -->
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()"
                        class="w-1/2 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 font-semibold transition">
                        Batal
                    </button>

                    <button type="submit"
                        class="w-1/2 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold shadow-lg hover:shadow-xl transition-all">
                        Daftar
                    </button>
                </div>

            </form>
        </div>
    </div>
    <!-- Ambient Light Glows -->
    <div class="glow-blob bg-emerald-100 w-[500px] h-[500px] top-0 left-0"></div>
    <div class="glow-blob bg-teal-50 w-[600px] h-[600px] bottom-0 right-0"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-8 font-medium">
            <a href="/pelatihan" class="hover:text-emerald-600 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali
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


<!-- Toast Container -->
<div id="toastContainer"
    class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[100] flex flex-col gap-2 pointer-events-none"></div>
<script>
    function daftarPelatihan() {
        document.getElementById("modalDaftar").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("modalDaftar").classList.add("hidden");
    }

    document.getElementById("formPelatihan").addEventListener("submit", function(e) {
        e.preventDefault();

        const data = {
            training_id: document.getElementById("training_id").value,
            name: document.getElementById("nama").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            pekerjaan: document.getElementById("pekerjaan").value,
            institusi: document.getElementById("institusi").value,
        };

        fetch("/pelatihan/daftar", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => {
                alert("Berhasil daftar!");
                closeModal();
            })
            .catch(err => {
                console.error(err);
                alert("Error!");
            });
    });
</script>

@include('layouts.onboarding.footer')
