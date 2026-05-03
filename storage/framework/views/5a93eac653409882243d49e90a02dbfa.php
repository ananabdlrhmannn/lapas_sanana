<?php $__env->startSection('title', 'Beranda | Lapas Sanana'); ?>

<?php $__env->startSection('content'); ?>
<section id="hero" class="hero section dark-background hero-sanana">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                <span class="hero-tag mb-3"><i class="bi bi-shield-check me-2"></i>Portal layanan publik dan informasi resmi</span>
                <h1>Sistem Informasi Lembaga Pemasyarakatan Kelas IIB Sanana</h1>
                <p>Website ini menjadi pusat layanan publik, berita kegiatan, pendaftaran kunjungan, pengaduan masyarakat, dan akses informasi resmi dalam satu tampilan yang lebih modern dan menarik.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#layanan" class="btn-get-started">Lihat Layanan</a>
                    <a href="#pengaduan" class="btn-watch-video d-flex align-items-center"><i class="bi bi-chat-dots"></i><span>Kirim Pengaduan</span></a>
                </div>
                <div class="row g-3 mt-4 stat-row">
                    <div class="col-md-4 col-6">
                        <div class="stat-box">
                            <h3><?php echo e($news->count()); ?></h3>
                            <p>Berita Terbaru</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="stat-box">
                            <h3>24/7</h3>
                            <p>Akses Informasi</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="stat-box">
                            <h3>1x24</h3>
                            <p>Target Respons Aduan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?php echo e(asset('arsha/assets/img/foto_kantor.jpeg')); ?>" class="img-fluid animated rounded-4 shadow-lg" alt="Gedung Lapas Sanana">
            </div>
        </div>
    </div>
</section>

<section id="quick-access" class="section light-background pb-0">
    <div class="container" data-aos="fade-up">
        <div class="row g-4 quick-cards">
            <div class="col-lg-3 col-md-6">
                <div class="quick-card">
                    <i class="bi bi-people"></i>
                    <h4>Kunjungan Online</h4>
                    <p>Pendaftaran kunjungan warga binaan dilakukan lebih tertib, cepat, dan mudah dipantau.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="quick-card">
                    <i class="bi bi-journal-text"></i>
                    <h4>Berita </h4>
                    <p>Publikasi kegiatan dan informasi kelembagaan </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="quick-card">
                    <i class="bi bi-megaphone"></i>
                    <h4>Pengaduan Masyarakat</h4>
                    <p>Masyarakat bisa menyampaikan saran, kritik, dan laporan pelayanan melalui website.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="quick-card">
                    <i class="bi bi-shield-lock"></i>
                    <h4>Dashboard Admin</h4>
                    <p>Monitoring berita, kunjungan, dan pengaduan </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="profil" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Profil Lembaga</h2>
        <p>Ini merupakan profil resmi Lembaga Pemasyarakatan Kelas IIB Sanana.</p>
    </div>

    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p>Lembaga Pemasyarakatan Kelas IIB Sanana berperan dalam pembinaan warga binaan, pelayanan publik kepada masyarakat, dan penguatan tata kelola pemerintahan yang bersih dan akuntabel.</p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Pelayanan publik yang terbuka, tertib, dan mudah diakses masyarakat.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Pembinaan warga binaan yang berorientasi pada kepribadian dan kemandirian.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Komitmen terhadap pembangunan Zona Integritas dan budaya kerja melayani.</span></li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="info-panel">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="mini-info">
                                <span class="label">Visi</span>
                                <p>Menjadi lembaga pemasyarakatan yang profesional, akuntabel, humanis, dan berintegritas.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mini-info">
                                <span class="label">Misi</span>
                                <p>Meningkatkan pembinaan, pelayanan, dan pengawasan berbasis integritas serta inovasi.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mini-info image-card p-0 overflow-hidden">
                                <img src="<?php echo e(asset('arsha/assets/img/services/sdf.jpeg')); ?>" alt="Layanan publik Lapas Sanana" class="img-fluid w-100">
                                <div class="p-4">
                                    <h5 class="mb-2">Pelayanan Ramah dan Tertib</h5>
                                    <p class="mb-0">Layanan yang diberikan oleh Lembaga Pemasyarakatan Kelas IIB Sanana selalu berorientasi pada kenyamanan dan kepuasan pengunjung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="layanan" class="section why-us light-background">
    <div class="container-fluid">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
                <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                    <h3><span>Layanan digital yang mendukung </span><strong>pelayanan publik lebih cepat dan transparan</strong></h3>
                    <p>Lapas Sanana menyediakan berbagai layanan digital untuk memudahkan akses informasi dan pelayanan publik.</p>
                </div>

                <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-item faq-active">
                        <h3><span>01</span> Bagaimana alur pendaftaran kunjungan online?</h3>
                        <div class="faq-content">
                            <p>Pengunjung mengisi formulir pada website, data akan tersimpan ke sistem, lalu petugas dapat memverifikasi dan memperbarui status kunjungan.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3><span>02</span> Bagaimana publikasi berita dikelola?</h3>
                        <div class="faq-content">
                            <p>Publikasi berita menampilkan informasi terkini tentang kegiatan dan perkembangan di Lapas Sanana.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3><span>03</span> Bagaimana masyarakat mengirim pengaduan?</h3>
                        <div class="faq-content">
                            <p>Pengaduan dapat dikirim langsung melalui form website dan hasilnya masuk ke dashboard admin untuk ditindaklanjuti.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3><span>04</span> Kapan Jam Layanan?</h3>
                        <div class="faq-content">
                            <p>Jam layanan di Lapas Sanana adalah Senin - Jumat, pukul 08.00 - 16.00 WIT.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 why-us-img text-center">
                <img src="<?php echo e(asset('arsha/assets/img/why-us.png')); ?>" class="img-fluid" alt="Ilustrasi alur pelayanan" data-aos="zoom-in" data-aos-delay="100">
            </div>
        </div>
    </div>
</section>

<section id="publikasi" class="portfolio section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Publikasi & Galeri</h2>
        <p>Dokumentasi kegiatan dan berita terkini dari Lapas Sanana.</p>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Semua</li>
                <li data-filter=".filter-layanan">Layanan</li>
                <li data-filter=".filter-pembinaan">Pembinaan</li>
                <li data-filter=".filter-publikasi">Publikasi</li>
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
    <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo e($item->category); ?>">
            <div class="portfolio-content h-100">
                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" class="img-fluid publikasi-thumb" alt="<?php echo e($item->title); ?>">
                <div class="portfolio-info">
                    <h4><?php echo e($item->title); ?></h4>
                    <p><?php echo e($item->description); ?></p>
                    <a href="<?php echo e(asset('storage/' . $item->image)); ?>"
                       title="<?php echo e($item->title); ?>"
                       data-gallery="portfolio-gallery-<?php echo e($item->category); ?>"
                       class="glightbox preview-link">
                        <i class="bi bi-zoom-in"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center text-muted">
            Belum ada publikasi dan galeri.
        </div>
    <?php endif; ?>
</div>
        </div>
    </div>
</section>

<section id="berita" class="section light-background">
    <div class="container section-title d-lg-flex justify-content-between align-items-end" data-aos="fade-up">
        <div>
            <h2>Berita & Kegiatan</h2>
            <p>Berita mengenai kegiatan serta informasi terkini</p>
        </div>
        <div class="mt-3 mt-lg-0">
            <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary rounded-pill px-4">Lihat Semua Berita</a>
        </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-4 col-md-6 news-item" data-search="<?php echo e(strtolower($item->title . ' ' . ($item->category ?? '') . ' ' . ($item->excerpt ?? ''))); ?>">
                   <article class="news-card h-100">
                        <div class="news-thumb">
                            <img src="<?php echo e($item->thumbnail ? asset('storage/' . $item->thumbnail) : asset('arsha/assets/img/blog/blog-post-2.webp')); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
                        </div>
                        <div class="news-content">
                            <span class="category"><?php echo e($item->category ?: 'Berita'); ?></span>
                            <h3><?php echo e($item->title); ?></h3>
                            <small><?php echo e(optional($item->published_at)->translatedFormat('d F Y') ?: $item->created_at->translatedFormat('d F Y')); ?></small>
                            <p><?php echo e($item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 120)); ?></p>
                            <a href="<?php echo e(route('news.show', $item->slug)); ?>" class="btn btn-outline-primary rounded-pill px-4">Baca Selengkapnya</a>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="soft-panel p-5 text-center">
                        <i class="bi bi-journal-text fs-1 text-primary"></i>
                        <h3 class="mt-3">Belum ada berita dipublikasikan</h3>
                        <p class="mb-0">Silakan tambahkan berita dari dashboard admin agar konten muncul di halaman ini.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="kunjungan" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Pendaftaran Kunjungan Online</h2>
        <p>Untuk Pendaftaran Kunjungan Online Silahkan Mengisi Form Di Bawah Ini </p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap h-100">
                    <div class="info-item d-flex">
                        <i class="bi bi-person-check flex-shrink-0"></i>
                        <div>
                            <h3>Verifikasi Data</h3>
                            <p>Pastikan identitas pengunjung dan warga binaan diisi dengan benar untuk mempercepat proses verifikasi.</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-calendar2-check flex-shrink-0"></i>
                        <div>
                            <h3>Jadwal Kunjungan</h3>
                            <p>Pilih tanggal kunjungan sesuai kebijakan dan jam layanan yang berlaku di Lapas Sanana.</p>
                        </div>
                    </div>
                    <div class="info-item d-flex mb-0">
                        <i class="bi bi-shield-check flex-shrink-0"></i>
                        <div>
                            <h3>Status Pengajuan</h3>
                            <p>Petugas akan memberikan informasi terkait status pengajuan kunjungan yang telah Anda ajukan melalui kontak yang telah Anda berikan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="<?php echo e(route('visits.store')); ?>" method="POST" class="php-email-form">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="visitor_name" class="form-control" placeholder="Nama pengunjung" value="<?php echo e(old('visitor_name')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo e(old('nik')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" placeholder="Nomor HP" value="<?php echo e(old('phone')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email (opsional)" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="prisoner_name" class="form-control" placeholder="Nama warga binaan" value="<?php echo e(old('prisoner_name')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="relationship" class="form-control" placeholder="Hubungan dengan warga binaan" value="<?php echo e(old('relationship')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="visit_date" class="form-control" value="<?php echo e(old('visit_date')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <select name="session" class="form-control">
                                <option value="">Pilih sesi kunjungan</option>
                                <option value="Pagi" <?php if(old('session') === 'Pagi'): echo 'selected'; endif; ?>>Pagi</option>
                                <option value="Siang" <?php if(old('session') === 'Siang'): echo 'selected'; endif; ?>>Siang</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea name="notes" rows="5" class="form-control" placeholder="Catatan tambahan (opsional)"><?php echo e(old('notes')); ?></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit">Kirim Pendaftaran Kunjungan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="pengaduan" class="contact section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Pengaduan Masyarakat</h2>
        <p>Form pengaduan ini akan di proses untuk ditindaklanjuti.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap h-100">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Kanal Pengaduan</h3>
                            <p>Gunakan form ini untuk menyampaikan kritik, saran, atau laporan terkait pelayanan.</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-shield-lock flex-shrink-0"></i>
                        <div>
                            <h3>Kerahasiaan Pelapor</h3>
                            <p>Data pelapor ditangani secara profesional sesuai kebutuhan tindak lanjut pengaduan.</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-clock-history flex-shrink-0"></i>
                        <div>
                            <h3>Status Penanganan</h3>
                            <p>Petugas akan memberikan informasi terkait status pengaduan yang telah Anda ajukan melalui kontak yang telah Anda berikan.</p>
                        </div>
                    </div>
                    <div class="complaint-illustration mt-4">
                        <img src="<?php echo e(asset('arsha/assets/img/illustration/illustration-10.webp')); ?>" class="img-fluid" alt="Ilustrasi pengaduan masyarakat">
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="<?php echo e(route('complaints.store')); ?>" method="POST" class="php-email-form">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Nama pelapor" value="<?php echo e(old('name')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="contact" class="form-control" placeholder="Nomor HP / Email" value="<?php echo e(old('contact')); ?>" required>
                        </div>
                        <div class="col-md-12">
                            <select name="category" class="form-control" required>
                                <option value="">Pilih kategori pengaduan</option>
                                <option value="Layanan Publik" <?php if(old('category') === 'Layanan Publik'): echo 'selected'; endif; ?>>Layanan Publik</option>
                                <option value="Administrasi" <?php if(old('category') === 'Administrasi'): echo 'selected'; endif; ?>>Administrasi</option>
                                <option value="Dugaan Pungli" <?php if(old('category') === 'Dugaan Pungli'): echo 'selected'; endif; ?>>Dugaan Pungli</option>
                                <option value="Petugas" <?php if(old('category') === 'Petugas'): echo 'selected'; endif; ?>>Petugas</option>
                                <option value="Lainnya" <?php if(old('category') === 'Lainnya'): echo 'selected'; endif; ?>>Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" rows="6" class="form-control" placeholder="Tulis pengaduan atau masukan Anda" required><?php echo e(old('message')); ?></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit">Kirim Pengaduan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="zi" class="call-to-action section dark-background">
    <img src="<?php echo e(asset('arsha/assets/img/bg/bg-8.webp')); ?>" alt="Latar zona integritas">
    <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <h3>Pembangunan Zona Integritas</h3>
                    <p>Website ini mendukung penguatan tata kelola yang bersih, akuntabel, dan melayani. Kombinasi backend Laravel dan template Arsha membuat portal lebih siap digunakan sebagai media pelayanan publik resmi.</p>
                    <a class="cta-btn" href="#pengaduan">Laporkan Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="kontak" class="contact section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Kontak Resmi Lembaga Pemasyarakatan Kelas IIB Sanana</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap h-100">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Sanana, Kabupaten Kepulauan Sula, Maluku Utara</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p>(0921) 423456</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email</h3>
                            <p>lapassanana@gmail.com</p>
                        </div>
                    </div>
                    <div class="info-item d-flex mb-0">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>Jam Layanan</h3>
                            <p>Senin - Jumat, 08.00 - 12.00 WIT</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-panel h-100">
                    <h3 class="mb-3">Akses Cepat</h3>
                    <div class="row g-3">
                        <div class="col-md-6"><a class="contact-shortcut" href="#kunjungan"><i class="bi bi-arrow-right-circle"></i> Form kunjungan</a></div>
                        <div class="col-md-6"><a class="contact-shortcut" href="#berita"><i class="bi bi-arrow-right-circle"></i> Berita terbaru</a></div>
                        <div class="col-md-6"><a class="contact-shortcut" href="#pengaduan"><i class="bi bi-arrow-right-circle"></i> Form pengaduan</a></div>
                        <div class="col-md-6"><a class="contact-shortcut" href="<?php echo e(route('login')); ?>"><i class="bi bi-arrow-right-circle"></i> Login admin</a></div>
                    </div>
                    <div class="official-note mt-4">
                        <h4 class="mb-2">Catatan Pengembangan</h4>
                        <p class="mb-0">Website ini sedang dalam pengembangan dan akan terus diperbaiki untuk memberikan pengalaman terbaik bagi pengguna.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/home.blade.php ENDPATH**/ ?>