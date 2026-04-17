@include('layouts.dashboard.header')

<div class="absolute top-0 left-0 w-full h-64 bg-emerald-500 rounded-b-[3rem] z-0 print-bg-transparent"></div>

<!-- Container Struk -->
<div class="relative z-10 w-full max-w-lg mx-auto">

    <!-- Tombol Kembali (Tidak ikut ter-print) -->
    <a href="index.html"
        class="no-print inline-flex items-center gap-2 text-white/80 hover:text-white font-semibold mb-6 transition-colors">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
    </a>

    <!-- Kartu Struk -->
    <div class="bg-white rounded-3xl shadow-2xl print-shadow-none overflow-hidden pb-8">

        <!-- Header Struk -->
        <div class="p-6 sm:p-8 flex justify-between items-start">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-leaf text-emerald-500 text-2xl sm:text-3xl"></i>
                <div class="leading-tight">
                    <span class="text-lg sm:text-xl font-extrabold text-gray-900 tracking-tight block">GM <span
                            class="text-emerald-500">200</span></span>
                    <span class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Hydroponics</span>
                </div>
            </div>
            <h2 class="text-2xl font-extrabold text-emerald-500 tracking-tight">Invoice</h2>
        </div>

        <!-- Info Nomor & Tanggal -->
        <div class="px-6 sm:px-8 text-right mb-6">
            <p class="text-sm text-gray-600 font-medium">No Nota <span class="font-bold text-gray-900"
                    id="inv-id">#INV-...</span></p>
            <p class="text-sm text-gray-500" id="inv-date">Tanggal: ...</p>
        </div>

        <!-- Sambutan -->
        <div class="px-6 sm:px-8 mb-8">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4">GM 200 Hydroponics</h1>
            <p class="text-gray-600 text-sm leading-relaxed">
                Halo, <span class="font-bold text-gray-900" id="inv-name">Pelanggan</span>.<br>
                Terima kasih telah mempercayakan kebutuhan sayur sehat Anda kepada kami.
            </p>
        </div>

        <!-- Info Tagihan & Pembayaran (2 Kolom) -->
        <div class="px-6 sm:px-8 grid grid-cols-2 gap-6 mb-8">
            <!-- Kiri: Billing Info -->
            <div>
                <h3 class="text-xs font-extrabold text-gray-400 uppercase tracking-wider mb-2">Billing Information</h3>
                <p class="text-sm font-bold text-gray-900 mb-1" id="bill-name">Nama</p>
                <p class="text-sm text-gray-600 leading-tight mb-2" id="bill-address">Alamat...</p>
                <p class="text-sm text-emerald-600 font-medium" id="bill-phone">No: ...</p>
                <p class="text-xs text-gray-500 mt-2 italic" id="bill-note">Catatan: -</p>
            </div>

            <!-- Kanan: Payment Info -->
            <div class="text-right">
                <h3 class="text-xs font-extrabold text-gray-400 uppercase tracking-wider mb-2">Payment Method</h3>
                <p class="text-sm font-bold text-gray-900 mb-1">Transfer Bank</p>
                <p class="text-sm text-gray-600 mb-2">Nama Bank: <span class="font-semibold text-gray-900">BCA</span>
                </p>
                <p class="text-sm text-gray-600 mb-2">Status:
                    <span id="bill-status"
                        class="inline-block px-2 py-0.5 rounded text-xs font-bold uppercase tracking-wider bg-yellow-100 text-yellow-700">Pending</span>
                </p>
                <p class="text-xs text-gray-500 mt-2" id="bill-created">Dibuat: ...</p>
            </div>
        </div>

        <div class="px-6 sm:px-8">
            <div class="border-dashed-receipt mb-4"></div>
        </div>

        <!-- Tabel Barang -->
        <div class="px-6 sm:px-8 mb-6">
            <!-- Header Tabel -->
            <div class="flex text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">
                <div class="w-1/2">Nama Barang</div>
                <div class="w-1/6 text-center">Qty</div>
                <div class="w-1/3 text-right">Harga Total</div>
            </div>

            <!-- Container Item (Diisi oleh JS) -->
            <div id="items-container" class="space-y-4">
                <!-- Item template akan masuk sini -->
            </div>
        </div>

        <div class="px-6 sm:px-8">
            <div class="border-dashed-receipt mb-6"></div>
        </div>

        <!-- Total Perhitungan -->
        <div class="px-6 sm:px-8 space-y-3 mb-8">
            <div class="flex justify-end items-center gap-8 text-sm">
                <span class="text-gray-500 w-24 text-right">Sub Total</span>
                <span class="font-semibold text-gray-900 w-24 text-right" id="calc-subtotal">Rp 0</span>
            </div>
            <div class="flex justify-end items-center gap-8 text-sm">
                <span class="text-gray-500 w-24 text-right">Ongkir</span>
                <span class="font-semibold text-gray-900 w-24 text-right" id="calc-shipping">Rp 0</span>
            </div>
            <div class="flex justify-end items-center gap-8 text-base pt-2">
                <span class="font-extrabold text-gray-900 w-24 text-right">Total Harga</span>
                <span class="font-extrabold text-emerald-600 w-24 text-right" id="calc-total">Rp 0</span>
            </div>
        </div>

        <!-- Footer Struk -->
        <div class="px-6 sm:px-8 text-center bg-gray-50/50 py-6 mx-4 rounded-2xl">
            <i class="fa-solid fa-heart text-emerald-500 mb-2"></i>
            <p class="text-sm font-bold text-gray-900">Terima Kasih!</p>
            <p class="text-xs text-gray-500 mt-1">Struk ini adalah bukti pembayaran yang sah jika status telah LUNAS.
            </p>
        </div>

    </div>

    <!-- Tombol Aksi Bawah (Tidak ikut ter-print) -->
    <div class="no-print mt-6 flex justify-center gap-4">
        <button onclick="window.print()"
            class="px-6 py-3 rounded-xl bg-white text-gray-700 font-bold shadow-sm hover:shadow-md hover:text-emerald-600 transition-all flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Cetak / PDF
        </button>
        <!-- Simulasi Bayar untuk Testing -->
        <button onclick="simulatePayment()" id="btnPaySim"
            class="px-6 py-3 rounded-xl bg-emerald-500 text-white font-bold shadow-sm hover:bg-emerald-600 transition-all flex items-center gap-2">
            <i class="fa-solid fa-money-bill-wave"></i> Simulasi Bayar
        </button>
    </div>

</div>

<!-- Script Data & Render -->
<script>
    // --- 1. DATA DUMMY (Sesuai struktur database Anda) ---

    // Tabel: orders
    const dbOrder = {
        id: 1, // ID order (seperti row 1 di database)
        name: "Jin Chase",
        phone: "+1 (855) 556-5497",
        email: "jyvumex@mailinator.com",
        address: "Temporibus consequat, Magnum provident al",
        note: "Mollit exercitation",
        order_date: "2026-04-17 03:44:24",
        total_price: 35562,
        status: "pending", // pending, dibayar, dikirimkan, selesai
        created_at: "2026-04-17 03:44:24"
    };

    // Tabel: order_items (Misal order_id = 1 memiliki 2 produk)
    // Note: product_id 5 dan 2. Saya tambahkan nama produk untuk tampilan.
    const dbOrderItems = [{
            id: 1,
            order_id: 1,
            product_id: 5,
            product_name: "Tomat Cherry Premium",
            quantity: 2,
            price: 981
        },
        {
            id: 2,
            order_id: 1,
            product_id: 2,
            product_name: "Selada Romaine",
            quantity: 1,
            price: 33600
        }
    ];

    // Ongkos kirim simulasi (Bisa ditambahkan ke total_price nanti)
    const shippingFee = 0; // Asumsi total_price sudah termasuk ongkir/tanpa ongkir di data Anda

    // --- 2. FUNGSI FORMATTING ---
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    const formatDate = (dateString) => {
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).format(date);
    };

    // --- 3. FUNGSI RENDER KE HTML ---
    function renderInvoice() {
        // Header Info
        document.getElementById('inv-id').innerText = `#INV-${dbOrder.id.toString().padStart(5, '0')}`;
        document.getElementById('inv-date').innerText = formatDate(dbOrder.order_date);
        document.getElementById('inv-name').innerText = dbOrder.name;

        // Billing Info
        document.getElementById('bill-name').innerText = dbOrder.name;
        document.getElementById('bill-address').innerText = dbOrder.address;
        document.getElementById('bill-phone').innerText = dbOrder.phone;
        document.getElementById('bill-note').innerText = dbOrder.note ? `Catatan: ${dbOrder.note}` : 'Catatan: -';
        document.getElementById('bill-created').innerText = `Dibuat: ${formatDate(dbOrder.created_at)}`;

        // Status Badge
        const statusEl = document.getElementById('bill-status');
        if (dbOrder.status === 'pending') {
            statusEl.innerText = 'BELUM BAYAR';
            statusEl.className =
                'inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-yellow-100 text-yellow-700 border border-yellow-200';
        } else if (dbOrder.status === 'dibayar' || dbOrder.status === 'selesai' || dbOrder.status === 'dikirimkan') {
            statusEl.innerText = 'LUNAS';
            statusEl.className =
                'inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700 border border-emerald-200';
        }

        // Render Order Items
        const itemsContainer = document.getElementById('items-container');
        itemsContainer.innerHTML = '';
        let subTotal = 0;

        dbOrderItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            subTotal += itemTotal;

            const itemHTML = `
                    <div class="flex text-sm">
                        <div class="w-1/2 pr-2">
                            <p class="font-bold text-gray-900">${item.product_name}</p>
                            <p class="text-xs text-gray-500">@ ${formatRupiah(item.price)}</p>
                        </div>
                        <div class="w-1/6 text-center text-gray-700 font-medium">
                            ${item.quantity}
                        </div>
                        <div class="w-1/3 text-right font-bold text-gray-900">
                            ${formatRupiah(itemTotal)}
                        </div>
                    </div>
                `;
            itemsContainer.insertAdjacentHTML('beforeend', itemHTML);
        });

        // Kalkulasi Total
        document.getElementById('calc-subtotal').innerText = formatRupiah(subTotal);
        document.getElementById('calc-shipping').innerText = formatRupiah(shippingFee);
        document.getElementById('calc-total').innerText = formatRupiah(dbOrder.total_price);
    }

    // --- 4. INISIALISASI ---
    window.onload = renderInvoice;

    // --- 5. SIMULASI TOMBOL BAYAR (Hanya untuk testing UI) ---
    function simulatePayment() {
        dbOrder.status = 'dibayar';
        renderInvoice();
        document.getElementById('btnPaySim').style.display = 'none'; // Hilangkan tombol setelah dibayar
    }
</script>
@include('layouts.dashboard.footer')
