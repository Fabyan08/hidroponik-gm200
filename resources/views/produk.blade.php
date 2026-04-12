@include('layouts.onboarding.header')
<section class="pt-32 pb-12 px-6 bg-gradient-to-b from-emerald-50 to-white relative overflow-hidden">
    <div
        class="absolute top-10 left-10 w-64 h-64 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30">
    </div>
    <div
        class="absolute top-10 right-10 w-64 h-64 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30">
    </div>

    <div class="max-w-7xl mx-auto text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">Katalog <span
                class="text-gradient">Produk</span></h1>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto text-lg">Pilih sayuran segar harianmu atau temukan perlengkapan
            hidroponik untuk kebunmu sendiri.</p>

        <div class="max-w-2xl mx-auto relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i
                    class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-emerald-500 transition-colors"></i>
            </div>
            <input type="text" id="searchInput" placeholder="Cari selada, pakcoy, atau nutrisi..."
                class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-gray-700 bg-white shadow-sm font-medium">
        </div>
    </div>
</section>

<section class="pb-24 px-6 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">

        <aside class="w-full md:w-64 shrink-0">
            <div class="sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 mb-4 hidden md:block">Kategori</h3>

                <div class="flex md:flex-col gap-3 overflow-x-auto no-scrollbar pb-4 md:pb-0" id="filterContainer">
                    <button
                        class="filter-btn active px-4 py-2 md:py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 text-left whitespace-nowrap transition-colors hover:border-emerald-500 flex justify-between items-center"
                        data-filter="all">
                        Semua Produk <span
                            class="hidden md:inline-block bg-gray-100 text-gray-500 text-xs py-0.5 px-2 rounded-md">8</span>
                    </button>
                    <button
                        class="filter-btn px-4 py-2 md:py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 text-left whitespace-nowrap transition-colors hover:border-emerald-500 flex justify-between items-center"
                        data-filter="sayuran-daun">
                        Sayuran Daun <span
                            class="hidden md:inline-block bg-gray-100 text-gray-500 text-xs py-0.5 px-2 rounded-md">4</span>
                    </button>
                    <button
                        class="filter-btn px-4 py-2 md:py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 text-left whitespace-nowrap transition-colors hover:border-emerald-500 flex justify-between items-center"
                        data-filter="sayuran-buah">
                        Sayuran Buah <span
                            class="hidden md:inline-block bg-gray-100 text-gray-500 text-xs py-0.5 px-2 rounded-md">1</span>
                    </button>
                    <button
                        class="filter-btn px-4 py-2 md:py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 text-left whitespace-nowrap transition-colors hover:border-emerald-500 flex justify-between items-center"
                        data-filter="perlengkapan">
                        Perlengkapan <span
                            class="hidden md:inline-block bg-gray-100 text-gray-500 text-xs py-0.5 px-2 rounded-md">3</span>
                    </button>
                </div>

                <div
                    class="hidden md:block mt-8 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl p-6 text-white shadow-lg">
                    <h4 class="font-bold text-lg mb-2">Diskon Spesial!</h4>
                    <p class="text-sm text-emerald-50 mb-4">Gunakan kode <strong
                            class="bg-white/20 px-1 rounded">SEGAR20</strong> untuk diskon 20% pembelian pertama.</p>
                    <button
                        class="w-full py-2 bg-white text-emerald-600 font-bold rounded-lg text-sm hover:bg-gray-50 transition-colors">Salin
                        Kode</button>
                </div>
            </div>
        </aside>

        <div class="flex-1 w-full">
            <div class="flex justify-between items-center mb-6">
                <p class="text-sm text-gray-500 font-medium" id="productCount">Menampilkan <span
                        class="font-bold text-gray-900">8</span> produk</p>
                <select id="sortSelect"
                    class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block p-2 outline-none font-medium">
                    <option value="default">Urutkan: Rekomendasi</option>
                    <option value="price-asc">Harga: Rendah ke Tinggi</option>
                    <option value="price-desc">Harga: Tinggi ke Rendah</option>
                    <option value="name-asc">Nama: A - Z</option>
                </select>
            </div>

            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            </div>

            <div id="emptyState" class="hidden text-center py-20">
                <i class="fa-solid fa-face-frown-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Oops, produk tidak ditemukan</h3>
                <p class="text-gray-500">Coba gunakan kata kunci lain atau pilih kategori yang berbeda.</p>
                <button onclick="resetFilters()"
                    class="mt-4 px-6 py-2 bg-emerald-50 text-emerald-600 font-bold rounded-lg hover:bg-emerald-100 transition-colors">Reset
                    Filter</button>
            </div>
        </div>

    </div>
</section>


<div id="toastContainer"
    class="fixed bottom-24 left-1/2 transform -translate-x-1/2 z-50 flex flex-col gap-2 pointer-events-none"></div>

<script>
    // --- 1. Data Produk (Mock Database) ---
    const productsData = [{
            id: 1,
            name: 'Selada Romaine',
            category: 'sayuran-daun',
            price: 15000,
            unit: '250g',
            image: 'https://images.unsplash.com/photo-1622205313162-be1d5712a43f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Terlaris',
            desc: 'Renyah, manis, cocok untuk salad segar.'
        },
        {
            id: 2,
            name: 'Pakcoy Super',
            category: 'sayuran-daun',
            price: 12000,
            unit: '250g',
            image: 'https://images.unsplash.com/photo-1599388836569-8f0a06af0602?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: '',
            desc: 'Batang besar, daun hijau segar tanpa ulat.'
        },
        {
            id: 3,
            name: 'Kale Curly',
            category: 'sayuran-daun',
            price: 25000,
            unit: '200g',
            image: 'https://images.unsplash.com/photo-1524174099499-d5c22f0c7fc1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Superfood',
            desc: 'Kaya antioksidan dan serat. Sempurna untuk jus.'
        },
        {
            id: 4,
            name: 'Bayam Merah',
            category: 'sayuran-daun',
            price: 14000,
            unit: '250g',
            image: 'https://images.unsplash.com/photo-1628157732276-8dc40d6c5c06?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: '',
            desc: 'Tinggi zat besi, sempurna untuk MPASI.'
        },
        {
            id: 5,
            name: 'Tomat Cherry',
            category: 'sayuran-buah',
            price: 18000,
            unit: '250g',
            image: 'https://images.unsplash.com/photo-1561136594-7f68413baa99?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Baru',
            desc: 'Manis, juicy, dipetik saat matang sempurna.'
        },
        {
            id: 6,
            name: 'Nutrisi AB Mix Daun',
            category: 'perlengkapan',
            price: 85000,
            unit: '1 Liter',
            image: 'https://images.unsplash.com/photo-1584824486509-112e4181f1ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: '',
            desc: 'Pekatan nutrisi siap pakai untuk sayuran daun.'
        },
        {
            id: 7,
            name: 'Starter Kit Pemula',
            category: 'perlengkapan',
            price: 250000,
            unit: '1 Set',
            image: 'https://images.unsplash.com/photo-1530836369250-ef71a3a5e4b6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: 'Promo',
            desc: 'Lengkap: bak, netpot, rockwool, benih, nutrisi.'
        },
        {
            id: 8,
            name: 'Rockwool Cultilene',
            category: 'perlengkapan',
            price: 60000,
            unit: '1 Slab',
            image: 'https://images.unsplash.com/photo-1615811361523-6bd03d7748e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            badge: '',
            desc: 'Media tanam steril dengan daya serap air tinggi.'
        },
    ];

    let currentProducts = [...productsData];
    let cartCount = 0;

    // --- 2. Format Mata Uang ---
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    // --- 3. Render Produk ---
    const productGrid = document.getElementById('productGrid');
    const emptyState = document.getElementById('emptyState');
    const productCountText = document.getElementById('productCount');

    function renderProducts(products) {
        productGrid.innerHTML = '';

        if (products.length === 0) {
            productGrid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            productCountText.innerHTML = `Menampilkan <span class="font-bold text-gray-900">0</span> produk`;
            return;
        }

        productGrid.classList.remove('hidden');
        emptyState.classList.add('hidden');
        productCountText.innerHTML =
            `Menampilkan <span class="font-bold text-gray-900">${products.length}</span> produk`;

        products.forEach((product, index) => {
            // Delay for stagger animation effect based on index
            const delay = index * 50;

            const badgeHTML = product.badge ?
                `<div class="absolute top-4 right-4 bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">${product.badge}</div>` :
                '';

            const cardHTML = `
                    <div class="glass-card rounded-3xl overflow-hidden group flex flex-col h-full" style="animation: slideInUp 0.5s ease-out ${delay}ms both;">
                        <div class="h-56 overflow-hidden relative p-4 bg-emerald-50/50">
                            <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover rounded-2xl shadow-sm group-hover:scale-105 transition-transform duration-500">
                            ${badgeHTML}
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-emerald-600 transition-colors">${product.name}</h4>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2 flex-grow">${product.desc}</p>

                            <div class="flex items-end justify-between mt-auto pt-4 border-t border-gray-100">
                                <div>
                                    <span class="text-xl font-extrabold text-emerald-600">${formatRupiah(product.price)}</span>
                                    <span class="text-xs text-gray-400 block mt-0.5">/ ${product.unit}</span>
                                </div>
                                <button onclick="addToCart('${product.name}')" class="w-12 h-12 rounded-full bg-emerald-50 hover:bg-emerald-500 text-emerald-600 hover:text-white transition-all duration-300 flex items-center justify-center shadow-sm hover:shadow-lg hover:-translate-y-1">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            productGrid.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    // --- 4. Search & Filter Logic ---
    const searchInput = document.getElementById('searchInput');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const sortSelect = document.getElementById('sortSelect');

    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeFilterBtn = document.querySelector('.filter-btn.active');
        const category = activeFilterBtn.dataset.filter;
        const sortVal = sortSelect.value;

        // 1. Filter by Category & Search
        let filtered = productsData.filter(p => {
            const matchCategory = category === 'all' || p.category === category;
            const matchSearch = p.name.toLowerCase().includes(searchTerm);
            return matchCategory && matchSearch;
        });

        // 2. Sort
        if (sortVal === 'price-asc') {
            filtered.sort((a, b) => a.price - b.price);
        } else if (sortVal === 'price-desc') {
            filtered.sort((a, b) => b.price - a.price);
        } else if (sortVal === 'name-asc') {
            filtered.sort((a, b) => a.name.localeCompare(b.name));
        } else {
            // Default ID sort (rekomendasi)
            filtered.sort((a, b) => a.id - b.id);
        }

        renderProducts(filtered);
    }

    // Event Listeners
    searchInput.addEventListener('input', applyFilters);
    sortSelect.addEventListener('change', applyFilters);

    filterBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // Remove active class from all
            filterBtns.forEach(b => b.classList.remove('active', 'bg-emerald-500', 'text-white'));
            filterBtns.forEach(b => b.classList.add('text-gray-600'));

            // Add active to clicked
            const currentBtn = e.currentTarget;
            currentBtn.classList.add('active');

            applyFilters();
        });
    });

    // Function to reset from Empty State
    window.resetFilters = function() {
        searchInput.value = '';
        document.querySelector('[data-filter="all"]').click();
        sortSelect.value = 'default';
        applyFilters();
    }

    // --- 5. Add To Cart & Toast Notification ---
    const cartBadge = document.getElementById('cart-badge');
    const toastContainer = document.getElementById('toastContainer');

    window.addToCart = function(productName) {
        // Update cart count
        cartCount++;
        cartBadge.textContent = cartCount;
        cartBadge.classList.remove('scale-0');
        cartBadge.classList.add('scale-100');

        // Pop animation on badge
        cartBadge.classList.add('animate-ping');
        setTimeout(() => cartBadge.classList.remove('animate-ping'), 300);

        // Create Toast
        const toast = document.createElement('div');
        toast.className =
            'toast bg-gray-900 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-3 font-medium text-sm border border-gray-700 pointer-events-auto';
        toast.innerHTML = `
                <div class="w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center text-white text-xs">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span><b>${productName}</b> ditambahkan ke keranjang</span>
            `;

        toastContainer.appendChild(toast);

        // Remove Toast after 3 seconds
        setTimeout(() => {
            toast.classList.add('hiding');
            toast.addEventListener('animationend', () => {
                toast.remove();
            });
        }, 3000);
    }

    // --- 6. Initial Render ---
    renderProducts(productsData);

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
