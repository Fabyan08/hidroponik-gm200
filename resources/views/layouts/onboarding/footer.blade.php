    <footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-8 px-6 mt-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div>
                <a href="#" class="text-2xl font-extrabold flex items-center gap-2 mb-6">
                    <i class="fa-solid fa-leaf text-emerald-500"></i>
                    <span class="text-white">GM <span class="text-emerald-500">200</span></span>
                </a>
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">Menyediakan sayuran hidroponik premium dan pusat
                    pelatihan pertanian modern untuk gaya hidup sehat dan mandiri.</p>
                <div class="flex gap-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-emerald-500 transition-all"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-emerald-500 transition-all"><i
                            class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-emerald-500 transition-all"><i
                            class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Navigasi</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#home" class="hover:text-emerald-400 transition-colors">Beranda</a></li>
                    <li><a href="#tentang-kami" class="hover:text-emerald-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="#produk" class="hover:text-emerald-400 transition-colors">Katalog Sayuran</a></li>
                    <li><a href="#artikel" class="hover:text-emerald-400 transition-colors">Blog & Edukasi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-6">Layanan</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Langganan Sayur (B2C)</a>
                    </li>
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Supply Restoran (B2B)</a>
                    </li>
                    <li><a href="#pelatihan" class="hover:text-emerald-400 transition-colors">Pelatihan Offline</a>
                    </li>
                    <li><a href="#pelatihan" class="hover:text-emerald-400 transition-colors">Webinar Online</a></li>
                </ul>
            </div>

            <div id="contact">
                <h4 class="text-white font-bold mb-6">Kontak Kami</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-emerald-500"></i>
                        <span>Jember, Jawa Timur<br>Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-emerald-500"></i>
                        <a href="mailto:halo@gm200.id" class="hover:text-emerald-400">halo@gm200.id</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-brands fa-whatsapp text-emerald-500"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
            <p>&copy; 2026 GM 200 Hydroponics. Hak Cipta Dilindungi.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    </body>
    <script>
        // Efek transparan/solid pada Navbar saat scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('bg-white/90', 'shadow-md');
                navbar.classList.remove('bg-white/50', 'border-transparent');
            } else {
                navbar.classList.remove('bg-white/90', 'shadow-md');
            }
        });

        // Efek animasi scroll (Reveal)
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

        revealElements.forEach(el => {
            revealOnScroll.observe(el);
        });
    </script>

    </html>
