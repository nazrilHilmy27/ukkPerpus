<footer class="py-5 mt-5 footer-dark text-white">
    <div class="container">
        <div class="row gy-4">

            <!-- Logo & Deskripsi -->
            <div class="col-md-3">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-book fs-2 me-2"></i>
                    <h5 class="mb-0 fw-bold">Perpustakaan Digital</h5>
                </div>
                <p style="color: #dcd2e8;" class="small m-0">Platform perpustakaan modern untuk generasi digital</p>
            </div>

            <!-- Navigasi -->
            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="footer-link">Beranda</a></li>
                    <li><a href="{{ route('daftar.buku') }}" class="footer-link">Buku</a></li>
                    <li><a href="{{ route('kegiatan') }}" class="footer-link">Kegiatan</a></li>
                    <li><a href="{{ route('koleksi.khusus.user') }}" class="footer-link">Koleksi Khusus</a></li>
                </ul>
            </div>

            <!-- Layanan -->
            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Layanan</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="footer-link">Peminjaman Online</a></li>
                    <li><a href="#" class="footer-link">E-Book</a></li>
                    <li><a href="#" class="footer-link">Jurnal Digital</a></li>
                    <li><a href="{{ route('kritik.saran') }}" class="footer-link">Kritik & Saran</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-3">
                <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                <ul class="list-unstyled small">
                    <li><a href="" class="footer-link"><i class="fa-solid fa-envelope me-2"></i> info@perpustakaan.id</a></li>
                    <li><a href="" class="footer-link"><i class="fa-solid fa-phone me-2"></i> +62 21 1234 5678</a></li>
                    <li><a href="" class="footer-link"><i class="fa-solid fa-location-dot me-2"></i> Jakarta, Indonesia</a></li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary opacity-25 mt-4">

        <!-- Copyright + Sosmed -->
        <div class="d-flex justify-content-between align-items-center small pt-3">
            <p style="color: #dcd2e8;" class="m-0">© 2025 Perpustakaan Digital. All rights reserved.</p>
            <div class="d-flex gap-3 fs-5">
                <a href="" class="footer-link"><i class="fa-brands fa-facebook"></a></i>
                <a href="" class="footer-link"><i class="fa-brands fa-twitter"></a></i>
                <a href="https://www.instagram.com/nz_27my/" target="_blank" class="footer-link"><i class="fa-brands fa-instagram"></a></i>
                <a href="" class="footer-link"><i class="fa-brands fa-youtube"></a></i>
            </div>
        </div>

    </div>
</footer>
