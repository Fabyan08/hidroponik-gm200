@include('layouts.onboarding.header')
<section class="pt-32 pb-12 px-6 bg-gradient-to-b from-emerald-50 to-white relative">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">Pojok <span
                    class="text-gradient">Edukasi</span></h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Pelajari tips bertani, wawasan bisnis hidroponik, dan
                panduan lengkap dari para pakar GM 200.</p>
        </div>

        <div class="relative rounded-[2rem] overflow-hidden shadow-xl group cursor-pointer border border-gray-100">
            <div class="absolute inset-0 bg-gray-900/40 group-hover:bg-gray-900/20 transition-colors duration-500 z-10">
            </div>
            <img src="https://images.unsplash.com/photo-1591857177580-dc82b9ac4e1e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                alt="Featured Article" class="w-full h-[400px] md:h-[500px] object-cover img-zoom">

            <div
                class="absolute bottom-0 left-0 w-full p-8 md:p-12 z-20 bg-gradient-to-t from-gray-900 via-gray-900/80 to-transparent">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-full">TERBARU</span>
                    <span class="text-gray-300 text-sm"><i class="fa-regular fa-clock mr-1"></i> 8 Menit Baca</span>
                </div>
                <h2
                    class="text-3xl md:text-5xl font-bold text-white mb-4 group-hover:text-emerald-400 transition-colors leading-tight">
                    Panduan Lengkap Skala Komersial: Dari Halaman ke Omzet Jutaan.</h2>
                <p class="text-gray-300 md:text-lg mb-6 line-clamp-2 max-w-3xl">Banyak yang ragu untuk memulai bisnis
                    hidroponik karena biaya awal. Artikel ini membedah ROI (Return of Investment) dan strategi menggaet
                    restoran sebagai klien tetap Anda.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                            alt="Author" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                        <div>
                            <p class="text-white font-semibold text-sm">Budi Pratama</p>
                            <p class="text-emerald-400 text-xs">Head of Agronomy</p>
                        </div>
                    </div>
                    <button
                        class="w-12 h-12 rounded-full bg-white/20 hover:bg-emerald-500 text-white flex items-center justify-center transition-all backdrop-blur-sm">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-24 px-6 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto">

        <div
            class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12 sticky top-20 bg-white/90 backdrop-blur-md py-4 z-30 border-b border-gray-100">
            <div class="flex gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
                <button
                    class="filter-btn active px-5 py-2.5 rounded-full border border-gray-200 text-sm font-bold text-gray-600 transition-colors hover:border-emerald-500 whitespace-nowrap"
                    data-category="all">Semua</button>
                <button
                    class="filter-btn px-5 py-2.5 rounded-full border border-gray-200 text-sm font-bold text-gray-600 transition-colors hover:border-emerald-500 whitespace-nowrap"
                    data-category="tutorial">Tutorial</button>
                <button
                    class="filter-btn px-5 py-2.5 rounded-full border border-gray-200 text-sm font-bold text-gray-600 transition-colors hover:border-emerald-500 whitespace-nowrap"
                    data-category="bisnis">Bisnis</button>
                <button
                    class="filter-btn px-5 py-2.5 rounded-full border border-gray-200 text-sm font-bold text-gray-600 transition-colors hover:border-emerald-500 whitespace-nowrap"
                    data-category="tips">Tips & Trik</button>
            </div>

            <div class="relative w-full md:w-72">
                <input type="text" id="searchInput" placeholder="Cari artikel..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-gray-700 bg-gray-50 text-sm">
                <i class="fa-solid fa-magnifying-glass text-gray-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
            </div>
        </div>

        <div id="articleGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        </div>

        <div id="emptyState" class="hidden text-center py-20">
            <i class="fa-solid fa-folder-open text-6xl text-gray-200 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Artikel tidak ditemukan</h3>
            <p class="text-gray-500">Coba gunakan kata kunci pencarian yang lain.</p>
            <button onclick="resetFilters()"
                class="mt-4 px-6 py-2 bg-emerald-50 text-emerald-600 font-bold rounded-lg hover:bg-emerald-100 transition-colors">Reset
                Pencarian</button>
        </div>

        <div class="text-center mt-12" id="loadMoreContainer">
            <button
                class="px-8 py-3 rounded-full border-2 border-emerald-500 text-emerald-600 font-bold hover:bg-emerald-50 transition-colors">
                <i class="fa-solid fa-rotate-right mr-2"></i> Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<section class="py-20 px-6 -mb-20 bg-emerald-900 relative overflow-hidden">
    <div
        class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50">
    </div>
    <div
        class="absolute -bottom-24 -left-24 w-64 h-64 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50">
    </div>

    <div
        class="max-w-4xl mx-auto text-center relative z-10 bg-white/10 backdrop-blur-md p-10 md:p-16 rounded-[3rem] border border-white/20">
        <i class="fa-regular fa-envelope-open text-5xl text-emerald-400 mb-6"></i>
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Jangan Ketinggalan Info Pertanian Modern!</h2>
        <p class="text-emerald-100 mb-8 text-lg">Dapatkan artikel terbaru, tips eksklusif, dan promo kelas pelatihan
            langsung ke inbox email Anda setiap minggunya.</p>

        <form class="flex flex-col sm:flex-row gap-3 justify-center max-w-xl mx-auto"
            onsubmit="event.preventDefault(); subscribeNewsletter();">
            <input type="email" placeholder="Masukkan alamat email Anda" required
                class="flex-1 px-6 py-4 rounded-full bg-white/90 focus:bg-white text-gray-900 outline-none focus:ring-4 focus:ring-emerald-500/50 transition-all font-medium">
            <button type="submit"
                class="px-8 py-4 rounded-full bg-emerald-500 text-white font-bold hover:bg-emerald-400 shadow-lg transition-all whitespace-nowrap">
                Berlangganan
            </button>
        </form>
        <p class="text-emerald-200/60 text-xs mt-4">Kami menjaga privasi Anda. Tidak ada spam.</p>
    </div>
</section>



<div id="toastContainer"
    class="fixed bottom-10 left-1/2 transform -translate-x-1/2 z-50 flex flex-col gap-2 pointer-events-none"></div>

<script>
    // 1. Database Artikel (Mock)
    const articlesData = [{
            id: 1,
            title: 'Cara Meracik Nutrisi AB Mix yang Benar untuk Sayuran Daun',
            category: 'tutorial',
            categoryLabel: 'TUTORIAL',
            image: 'https://images.unsplash.com/photo-1584824486509-112e4181f1ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Takaran yang pas adalah kunci pertumbuhan maksimal. Pelajari rasio terbaik untuk fase vegetatif agar sayuran cepat besar.',
            date: '10 Apr 2026',
            readTime: '5 Menit',
            bookmarked: false
        },
        {
            id: 2,
            title: '5 Sayuran Hidroponik Paling Cepat Panen untuk Pemula',
            category: 'tips',
            categoryLabel: 'TIPS',
            image: 'https://images.unsplash.com/photo-1524174099499-d5c22f0c7fc1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Baru mulai mencoba hidroponik? Tanam 5 jenis sayuran ini. Dalam waktu kurang dari 30 hari, Anda sudah bisa panen!',
            date: '05 Apr 2026',
            readTime: '4 Menit',
            bookmarked: false
        },
        {
            id: 3,
            title: 'Analisis Modal & Keuntungan Buka Kebun Sayur di Atap Rumah',
            category: 'bisnis',
            categoryLabel: 'BISNIS',
            image: 'https://images.unsplash.com/photo-1530836369250-ef71a3a5e4b6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Punya lahan atap nganggur? Simak rincian modal pembuatan sistem NFT dan potensi omzet bulanannya.',
            date: '28 Mar 2026',
            readTime: '10 Menit',
            bookmarked: false
        },
        {
            id: 4,
            title: 'Cara Alami Mengusir Kutu Daun (Aphids) Tanpa Kimia',
            category: 'tips',
            categoryLabel: 'TIPS & TRIK',
            image: 'https://images.unsplash.com/photo-1628157732276-8dc40d6c5c06?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Jangan gunakan pestisida kimia. Lindungi sayuran Anda menggunakan ramuan neem oil dan sabun cuci piring yang aman.',
            date: '20 Mar 2026',
            readTime: '6 Menit',
            bookmarked: false
        },
        {
            id: 5,
            title: 'Panduan Memilih Lampu Grow Light untuk Pertanian Indoor',
            category: 'tutorial',
            categoryLabel: 'TUTORIAL',
            image: 'https://images.unsplash.com/photo-1588614611586-2582845ac5e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Matahari kurang terik di dalam ruangan? Pemilihan spektrum lampu LED Grow Light sangat menentukan warna daun sayuran Anda.',
            date: '15 Mar 2026',
            readTime: '8 Menit',
            bookmarked: false
        },
        {
            id: 6,
            title: 'Kisah Sukses Alumni: Omzet 50 Juta dari Supply Restoran',
            category: 'bisnis',
            categoryLabel: 'INSPIRASI BISNIS',
            image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            excerpt: 'Simak wawancara kami dengan Pak Dimas, alumni angkatan ke-3 yang kini sukses menjadi supplier utama 5 restoran sehat di Surabaya.',
            date: '02 Mar 2026',
            readTime: '12 Menit',
            bookmarked: false
        }
    ];

    // 2. Render Engine
    const articleGrid = document.getElementById('articleGrid');
    const emptyState = document.getElementById('emptyState');
    const loadMoreContainer = document.getElementById('loadMoreContainer');

    function renderArticles(articles) {
        articleGrid.innerHTML = '';

        if (articles.length === 0) {
            articleGrid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            loadMoreContainer.classList.add('hidden');
            return;
        }

        articleGrid.classList.remove('hidden');
        emptyState.classList.add('hidden');
        loadMoreContainer.classList.remove('hidden');

        articles.forEach((article, index) => {
            const bookmarkIcon = article.bookmarked ? 'fa-solid text-emerald-500' :
                'fa-regular text-gray-400 hover:text-emerald-500';

            const cardHTML = `
                    <div class="glass-card rounded-3xl overflow-hidden group flex flex-col h-full bg-white relative" style="animation: slideInUp 0.5s ease-out ${index * 50}ms both;">

                        <button onclick="toggleBookmark(${article.id}, this)" class="absolute top-4 right-4 z-20 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:scale-110 transition-transform">
                            <i class="${bookmarkIcon} fa-bookmark text-lg transition-colors duration-300"></i>
                        </button>

                        <div class="h-56 overflow-hidden relative">
                            <div class="absolute inset-0 bg-emerald-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                            <img src="${article.image}" alt="${article.title}" class="w-full h-full object-cover img-zoom">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-3 mb-3 text-xs font-bold">
                                <span class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded">${article.categoryLabel}</span>
                                <span class="text-gray-400"><i class="fa-regular fa-clock mr-1"></i>${article.readTime}</span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors leading-tight cursor-pointer">${article.title}</h3>
                            <p class="text-sm text-gray-500 mb-6 line-clamp-3 flex-grow">${article.excerpt}</p>

                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400 font-medium">${article.date}</span>
                                <button class="text-sm font-bold text-emerald-500 hover:text-emerald-600 group/btn flex items-center gap-1">
                                    Baca <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover/btn:translate-x-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            articleGrid.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    // 3. Search & Filter Logic
    const searchInput = document.getElementById('searchInput');
    const filterBtns = document.querySelectorAll('.filter-btn');

    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeFilterBtn = document.querySelector('.filter-btn.active');
        const category = activeFilterBtn.dataset.category;

        let filtered = articlesData.filter(article => {
            const matchCategory = category === 'all' || article.category === category;
            const matchSearch = article.title.toLowerCase().includes(searchTerm) || article.excerpt
                .toLowerCase().includes(searchTerm);
            return matchCategory && matchSearch;
        });

        renderArticles(filtered);
    }

    searchInput.addEventListener('input', applyFilters);

    filterBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-emerald-500', 'text-white');
                b.classList.add('text-gray-600');
            });
            const currentBtn = e.currentTarget;
            currentBtn.classList.add('active', 'bg-emerald-500', 'text-white');
            currentBtn.classList.remove('text-gray-600');

            applyFilters();
        });
    });

    window.resetFilters = function() {
        searchInput.value = '';
        document.querySelector('[data-category="all"]').click();
    }

    // 4. Bookmark Functionality & Toast
    const toastContainer = document.getElementById('toastContainer');

    window.toggleBookmark = function(id, btnElement) {
        const article = articlesData.find(a => a.id === id);
        article.bookmarked = !article.bookmarked; // Toggle boolean

        // Toggle UI classes on the icon
        const icon = btnElement.querySelector('i');
        if (article.bookmarked) {
            icon.classList.remove('fa-regular', 'text-gray-400');
            icon.classList.add('fa-solid', 'text-emerald-500');
            showToast(`Artikel disimpan ke koleksi Anda`, 'fa-bookmark');
        } else {
            icon.classList.remove('fa-solid', 'text-emerald-500');
            icon.classList.add('fa-regular', 'text-gray-400');
            showToast(`Artikel dihapus dari koleksi`, 'fa-xmark');
        }
    }

    function showToast(message, iconClass) {
        const toast = document.createElement('div');
        toast.className =
            'toast bg-gray-900 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-3 font-medium text-sm border border-gray-700 pointer-events-auto';
        toast.innerHTML = `
                <div class="w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center text-white text-xs">
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

    // 5. Newsletter Subscription Fake Submit
    window.subscribeNewsletter = function() {
        showToast("Terima kasih telah berlangganan!", "fa-envelope-circle-check");
        document.querySelector('input[type="email"]').value = '';
    }

    // Initialize Render
    renderArticles(articlesData);

    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('bg-white/95', 'shadow-md');
            navbar.classList.remove('border-transparent');
        } else {
            navbar.classList.remove('bg-white/95', 'shadow-md');
        }
    });
</script>
@include('layouts.onboarding.footer')
