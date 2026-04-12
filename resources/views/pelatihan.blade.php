@include('layouts.onboarding.header')
<style>
    /* Tab Active State */
    .tab-btn.active {
        background-color: #10B981;
        color: white;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        border-color: #10B981;
    }

    /* Accordion transition */
    .accordion-content {
        transition: max-height 0.4s ease-in-out, opacity 0.3s ease-in-out;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
    }

    .accordion-content.open {
        max-height: 500px;
        /* Arbitrary large number */
        opacity: 1;
    }

    .accordion-icon {
        transition: transform 0.3s ease;
    }

    .accordion-item.open .accordion-icon {
        transform: rotate(180deg);
    }


    /* Toast Animation */
    /* Toast Animation (Biarkan yang ini, jangan dihapus) */
    @keyframes slideInUp {
        from {
            transform: translate(-50%, 100%);
            opacity: 0;
        }

        to {
            transform: translate(-50%, 0);
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .toast {
        animation: slideInUp 0.3s ease-out forwards;
    }

    .toast.hiding {
        animation: fadeOut 0.3s ease-in forwards;
    }

    /* --- TAMBAHKAN KODE INI UNTUK KARTU --- */
    @keyframes fadeUp {
        from {
            transform: translateY(40px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
<section class="relative pt-32 pb-20 px-6 overflow-hidden bg-white">
    <div
        class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-bl from-emerald-50 to-transparent rounded-bl-full z-0 opacity-70">
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
        <div class="reveal">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-600 text-sm font-semibold mb-6">
                <i class="fa-solid fa-star text-yellow-400"></i> Diikuti 1.200+ Alumni
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] mb-6 text-gray-900">
                Kuasai Ilmu <span class="text-gradient">Hidroponik</span> Langsung dari Pakarnya.
            </h1>
            <p class="text-gray-600 text-lg md:text-xl mb-8 leading-relaxed max-w-lg">
                Dari hobi skala rumahan hingga membangun bisnis greenhouse komersial beromzet puluhan juta. Temukan
                kelas yang tepat untuk Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#jadwal"
                    class="px-8 py-4 rounded-full bg-emerald-500 text-white font-bold hover:bg-emerald-600 hover:shadow-[0_8px_20px_rgba(16,185,129,0.3)] transition-all text-center flex items-center justify-center gap-2">
                    Lihat Jadwal Kelas
                </a>
            </div>
        </div>

        <div class="relative reveal" style="transition-delay: 200ms;">
            <div
                class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white aspect-video bg-gray-900 group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                    alt="Video Pelatihan"
                    class="w-full h-full object-cover opacity-80 group-hover:scale-105 group-hover:opacity-60 transition-all duration-500">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div
                        class="w-20 h-20 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center text-white text-3xl group-hover:bg-emerald-500 group-hover:scale-110 transition-all duration-300">
                        <i class="fa-solid fa-play ml-1"></i>
                    </div>
                </div>
            </div>
            <div
                class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 animate-float hidden md:flex z-20">
                <div
                    class="w-12 h-12 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-500 text-xl">
                    <i class="fa-solid fa-certificate"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900">Sertifikat Resmi</p>
                    <p class="text-xs text-gray-500">Diberikan di akhir sesi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="jadwal" class="py-24 px-6 relative bg-[#f8fafc] border-y border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 reveal">
            <h2 class="text-sm font-extrabold text-emerald-500 tracking-wider uppercase mb-2">Program Kami</h2>
            <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900">Pilih <span
                    class="text-gradient">Kelasmu</span></h3>
        </div>

        <div class="flex justify-center mb-12 reveal" style="transition-delay: 100ms;">
            <div class="inline-flex bg-white p-1.5 rounded-full border border-gray-200 shadow-sm">
                <button class="tab-btn active px-6 sm:px-8 py-3 rounded-full text-sm font-bold transition-all"
                    data-target="offline">
                    <i class="fa-solid fa-users mr-2"></i>Kelas Offline (Surabaya)
                </button>
                <button
                    class="tab-btn text-gray-500 hover:text-gray-900 px-6 sm:px-8 py-3 rounded-full text-sm font-bold transition-all"
                    data-target="online">
                    <i class="fa-solid fa-laptop mr-2"></i>Webinar Online
                </button>
            </div>
        </div>

        <div id="classGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal"
            style="transition-delay: 200ms;">
        </div>
    </div>
</section>
<section class="py-24 px-6 bg-white relative">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16 reveal">
            <h2 class="text-sm font-extrabold text-emerald-500 tracking-wider uppercase mb-2">Materi Belajar</h2>
            <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900">Apa Saja yang Akan <span
                    class="text-gradient">Dipelajari?</span></h3>
            <p class="text-gray-600 mt-4">Silabus disusun berdasarkan praktik nyata di greenhouse komersial kami.</p>
        </div>

        <div class="space-y-5 reveal" style="transition-delay: 100ms;">

            <div
                class="accordion-item bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                <button
                    class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none bg-white transition-colors"
                    onclick="toggleAccordion(this)">
                    <div class="flex items-center gap-4">
                        <span
                            class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-extrabold text-sm shrink-0 border border-emerald-100">1</span>
                        <span class="font-bold text-gray-900 text-base md:text-lg">Dasar-Dasar Hidroponik & Persiapan
                            Alat</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center shrink-0 ml-4">
                        <i
                            class="fa-solid fa-chevron-down text-gray-500 accordion-icon transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="accordion-content bg-white border-t border-gray-100">
                    <div class="p-6 md:pl-20 text-gray-600 text-sm leading-relaxed">
                        <ul class="list-disc space-y-3 marker:text-emerald-500 pr-4">
                            <li>Pengenalan berbagai sistem hidroponik (NFT, DFT, Wick, Aeroponik).</li>
                            <li>Pengenalan alat ukur wajib (TDS meter, pH meter, Thermohygrometer).</li>
                            <li>Cara menyemai benih menggunakan rockwool dengan tingkat keberhasilan 99%.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div
                class="accordion-item bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                <button
                    class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none bg-white transition-colors"
                    onclick="toggleAccordion(this)">
                    <div class="flex items-center gap-4">
                        <span
                            class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-extrabold text-sm shrink-0 border border-emerald-100">2</span>
                        <span class="font-bold text-gray-900 text-base md:text-lg">Manajemen Nutrisi (Meracik AB
                            Mix)</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center shrink-0 ml-4">
                        <i
                            class="fa-solid fa-chevron-down text-gray-500 accordion-icon transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="accordion-content bg-white border-t border-gray-100">
                    <div class="p-6 md:pl-20 text-gray-600 text-sm leading-relaxed">
                        <ul class="list-disc space-y-3 marker:text-emerald-500 pr-4">
                            <li>Fungsi unsur makro dan mikro pada tanaman.</li>
                            <li>Praktek langsung mencairkan dan meracik nutrisi AB Mix.</li>
                            <li>Cara mengatur dan menjaga kestabilan pH air dan kepekatan (PPM) nutrisi.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div
                class="accordion-item bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md hover:border-emerald-200">
                <button
                    class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none bg-white transition-colors"
                    onclick="toggleAccordion(this)">
                    <div class="flex items-center gap-4">
                        <span
                            class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-extrabold text-sm shrink-0 border border-emerald-100">3</span>
                        <span class="font-bold text-gray-900 text-base md:text-lg">Hama, Penyakit & Pemanenan</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center shrink-0 ml-4">
                        <i
                            class="fa-solid fa-chevron-down text-gray-500 accordion-icon transition-transform duration-300"></i>
                    </div>
                </button>
                <div class="accordion-content bg-white border-t border-gray-100">
                    <div class="p-6 md:pl-20 text-gray-600 text-sm leading-relaxed">
                        <ul class="list-disc space-y-3 marker:text-emerald-500 pr-4">
                            <li>Identifikasi hama umum (kutu daun, thrips, ulat) dan cara penanganannya secara organik.
                            </li>
                            <li>Teknik panen yang benar agar kesegaran sayur terjaga lebih lama (pasca-panen).</li>
                            <li>Standardisasi pengemasan sayuran premium.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-24 -mb-20 px-6 relative bg-emerald-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-5xl mx-auto text-center relative z-10 reveal">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 text-white">Butuh Pelatihan Khusus untuk <span
                class="text-emerald-400">Instansi / Sekolah?</span></h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto">
            Kami melayani program CSR, pelatihan kelompok tani, dan ekstrakurikuler sekolah dengan kurikulum yang bisa
            disesuaikan.
        </p>
        <button onclick="contactInstansi()"
            class="px-8 py-4 rounded-full bg-white text-emerald-700 font-bold hover:bg-emerald-50 hover:scale-105 transition-all shadow-xl">
            <i class="fa-brands fa-whatsapp mr-2 text-emerald-500"></i> Hubungi Tim Kami
        </button>
    </div>
</section>



<div id="toastContainer"
    class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[60] flex flex-col gap-2 pointer-events-none"></div>

<script>
    // 1. Data Kelas (Mock)
    const classesData = [{
            id: 1,
            title: 'Basic Hydroponic 101',
            type: 'offline',
            date: '25 April 2026',
            time: '09:00 - 15:00 WIB',
            location: 'Greenhouse GM 200, Surabaya',
            price: 350000,
            capacity: 20,
            booked: 15,
            image: 'https://images.unsplash.com/photo-1591857177580-dc82b9ac4e1e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Paling Diminati'
        },
        {
            id: 2,
            title: 'Masterclass: Skala Komersial',
            type: 'offline',
            date: '10 Mei 2026',
            time: '08:00 - 16:00 WIB',
            location: 'Greenhouse GM 200, Surabaya',
            price: 750000,
            capacity: 15,
            booked: 14,
            image: 'https://images.unsplash.com/photo-1588614611586-2582845ac5e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Sisa 1 Kuota'
        },
        {
            id: 3,
            title: 'Webinar: Meracik Nutrisi AB Mix',
            type: 'online',
            date: '02 Mei 2026',
            time: '19:00 - 21:00 WIB',
            location: 'Zoom Meeting',
            price: 150000,
            capacity: 100,
            booked: 45,
            image: 'https://images.unsplash.com/photo-1584824486509-112e4181f1ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: ''
        },
        {
            id: 4,
            title: 'Webinar: Buka Pasar Sayur Premium',
            type: 'online',
            date: '15 Mei 2026',
            time: '19:00 - 21:00 WIB',
            location: 'Zoom Meeting',
            price: 100000,
            capacity: 100,
            booked: 80,
            image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Live Q&A'
        },
        {
            id: 2,
            title: 'Masterclass: Skala Komersial',
            type: 'offline',
            date: '10 Mei 2026',
            time: '08:00 - 16:00 WIB',
            location: 'Greenhouse GM 200, Surabaya',
            price: 750000,
            capacity: 15,
            booked: 14,
            image: 'https://images.unsplash.com/photo-1588614611586-2582845ac5e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Sisa 1 Kuota'
        },
        {
            id: 2,
            title: 'Masterclass: Skala Komersial',
            type: 'offline',
            date: '10 Mei 2026',
            time: '08:00 - 16:00 WIB',
            location: 'Greenhouse GM 200, Surabaya',
            price: 750000,
            capacity: 15,
            booked: 14,
            image: 'https://images.unsplash.com/photo-1588614611586-2582845ac5e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Sisa 1 Kuota'
        },

    ];

    // Format Rupiah
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    // 2. Render Engine untuk Grid Kelas
    const classGrid = document.getElementById('classGrid');

    function renderClasses(type) {
        classGrid.innerHTML = '';
        const filteredClasses = classesData.filter(c => c.type === type);

        filteredClasses.forEach((cls, index) => {
            const sisaKuota = cls.capacity - cls.booked;
            const progressWidth = (cls.booked / cls.capacity) * 100;

            // Styling warna sisa kuota
            let kuotaColor = 'bg-emerald-500';
            if (sisaKuota <= 5) kuotaColor = 'bg-red-500';
            else if (sisaKuota <= 10) kuotaColor = 'bg-yellow-500';

            const badgeHTML = cls.badge ?
                `<div class="absolute top-4 right-4 bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md z-10">${cls.badge}</div>` :
                '';

            const cardHTML = `
    <div class="glass-card rounded-3xl overflow-hidden group flex flex-col h-full bg-white relative" style="animation: fadeUp 0.5s ease-out ${index * 100}ms both;">
                        <div class="h-52 overflow-hidden relative bg-gray-100 flex items-center justify-center">
                            <i class="fa-solid fa-image text-gray-300 text-4xl absolute z-0"></i>
                            <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                            <img src="${cls.image}" alt="${cls.title}" onerror="this.style.display='none'" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 relative z-20">
                            ${badgeHTML}
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 mb-5 group-hover:text-emerald-600 transition-colors line-clamp-2">${cls.title}</h4>

                            <div class="space-y-3 mb-8 flex-grow">
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <div class="w-6 text-center"><i class="fa-regular fa-calendar text-emerald-500"></i></div>
                                    ${cls.date}
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <div class="w-6 text-center"><i class="fa-regular fa-clock text-emerald-500"></i></div>
                                    ${cls.time}
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <div class="w-6 text-center"><i class="fa-solid ${type === 'offline' ? 'fa-location-dot' : 'fa-video'} text-emerald-500"></i></div>
                                    <span class="line-clamp-1">${cls.location}</span>
                                </div>
                            </div>

                            <div class="mb-6 bg-gray-50 p-3 rounded-xl border border-gray-100">
                                <div class="flex justify-between text-xs font-bold mb-2">
                                    <span class="text-gray-500">Kuota Terisi</span>
                                    <span class="${sisaKuota <= 5 ? 'text-red-500' : 'text-emerald-600'}">Sisa ${sisaKuota} kursi</span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full ${kuotaColor} rounded-full transition-all duration-1000" style="width: ${progressWidth}%"></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                <div>
                                    <span class="text-2xl font-extrabold text-gray-900">${formatRupiah(cls.price)}</span>
                                </div>
                                <button onclick="daftarKelas('${cls.title}')" class="px-6 py-2.5 rounded-full bg-emerald-50 hover:bg-emerald-500 text-emerald-600 hover:text-white font-bold text-sm transition-all shadow-sm">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            classGrid.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    // 3. Tab Logic
    const tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // Reset active styles
            tabBtns.forEach(b => {
                b.classList.remove('active', 'bg-emerald-500', 'text-white',
                    'shadow-[0_4px_15px_rgba(16,185,129,0.3)]', 'border-emerald-500');
                b.classList.add('text-gray-500', 'hover:text-gray-900');
            });

            // Set active style
            const currentBtn = e.currentTarget;
            currentBtn.classList.remove('text-gray-500', 'hover:text-gray-900');
            currentBtn.classList.add('active', 'bg-emerald-500', 'text-white',
                'shadow-[0_4px_15px_rgba(16,185,129,0.3)]', 'border-emerald-500');

            // Render data
            const target = currentBtn.dataset.target;
            renderClasses(target);
        });
    });

    // Initialize Render (Offline as default)
    renderClasses('offline');

    // 4. Accordion Logic
    window.toggleAccordion = function(button) {
        const item = button.parentElement;
        const content = button.nextElementSibling;

        // Close all others
        document.querySelectorAll('.accordion-item').forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('open');
                otherItem.querySelector('.accordion-content').classList.remove('open');
            }
        });

        // Toggle current
        item.classList.toggle('open');
        content.classList.toggle('open');
    }

    // 5. Toast & Interactions
    const toastContainer = document.getElementById('toastContainer');

    window.daftarKelas = function(className) {
        showToast(`Mengarahkan pendaftaran untuk: <b>${className}</b>...`, 'fa-spinner fa-spin');
    }

    window.contactInstansi = function() {
        showToast(`Membuka WhatsApp B2B Admin...`, 'fa-whatsapp');
    }

    function showToast(message, iconClass) {
        const toast = document.createElement('div');
        toast.className =
            'toast bg-gray-900 text-white px-6 py-4 rounded-full shadow-2xl flex items-center gap-3 text-sm border border-gray-700 pointer-events-auto';
        toast.innerHTML = `
                <div class="w-6 h-6 rounded-full flex items-center justify-center text-emerald-400 text-base">
                    <i class="fa-solid ${iconClass}"></i>
                </div>
                <span>${message}</span>
            `;
        toastContainer.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('hiding');
            toast.addEventListener('animationend', () => toast.remove());
        }, 3000);
    }

    // Navbar Scroll Effect & Reveal Animation
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('bg-white/95', 'shadow-md');
            navbar.classList.remove('border-transparent');
        } else {
            navbar.classList.remove('bg-white/95', 'shadow-md');
        }
    });

    const revealElements = document.querySelectorAll('.reveal');
    const revealOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    };
    const revealOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, revealOptions);

    revealElements.forEach(el => revealOnScroll.observe(el));
</script>
@include('layouts.onboarding.footer')
