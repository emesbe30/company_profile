<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- /Hero Section -->
<section id="hero" class="hero section dark-background">
    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <?php $isActive = 'active'; ?>
        <?php if (!empty($slider) && is_array($slider)): ?>
            <?php foreach ($slider as $slide): ?>
                <div class="carousel-item <?= $isActive; ?>">
                    <img src="<?= base_url('assets/img/slider/' . $slide['foto_slider']) ?>" alt="<?= ($lang == 'id') ? $slide['alt_foto_slider_id'] : $slide['alt_foto_slider_en']; ?>" />
                    <div class="carousel-container">
                        <h1>
                            <?= ($lang == 'id') ? $slide['caption_slider_id'] : $slide['caption_slider_en']; ?>
                        </h1>
                    </div>
                </div>
                <?php $isActive = ''; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0"></use>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9"></use>
            </g>
        </svg>
    </div>
</section>
<!-- /Hero Section -->


<!-- About Section -->
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang == 'id' ? $aboutMeta['nama_halaman_id'] : $aboutMeta['nama_halaman_en']; ?></h2>
        <p><?= $lang == 'id' ? $aboutMeta['deskripsi_halaman_id'] : $aboutMeta['deskripsi_halaman_en']; ?></p>
    </div>
    <!-- End Section Title -->

    <div class="container">
        <div class="row gy-3">
            <div
                class="col-lg-6 d-flex align-items-center justify-content-center"
                data-aos="fade-up"
                data-aos-delay="100">
                <div class="img-frame">
                    <img src="<?= base_url('assets/img/profil/' . $profil['foto_perusahaan']); ?>" alt="<?= $lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']; ?>" alt="" class="img-fluid" />
                </div>
            </div>

            <div
                class="col-lg-6 d-flex flex-column justify-content-center"
                data-aos="fade-up"
                data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-3">
                    <h3><?= $profil['nama_perusahaan']; ?></h3>
                    <p class="">
                        <?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?>
                    </p>
                    <a href="<?= base_url($lang == 'id' ? 'id/tentang' : 'en/about') ?>" class="read-more">
                        <?= lang('bahasa.buttonArticle'); ?> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /About Section -->

<!-- Product Section -->
<section id="product" class="product section">
    <div class="container">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?= esc($lang == 'id' ? $productMeta['nama_halaman_id'] : $productMeta['nama_halaman_en']); ?></h2>
            <p><?= esc($lang == 'id' ? $productMeta['deskripsi_halaman_id'] : $productMeta['deskripsi_halaman_en']); ?></p>
        </div>
        <!-- End Section Title -->

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php if (!empty($product)) : ?>
                    <?php foreach ($product as $p) : ?>
                        <div class="col-lg-4 col-md-6 product-item isotope-item">
                            <div class="product-content">
                                <a href="<?= base_url($lang == 'id'
                                                ? 'id/produk/produk-detail/' . esc($p['slug_id'])
                                                : 'en/product/product-detail/' . esc($p['slug_en'])); ?>">
                                    <img src="<?= base_url('assets/img/produk/' . esc($p["foto_produk"])); ?>"
                                        class="img-fluid"
                                        alt="<?= esc($lang == 'id' ? $p['alt_produk_id'] : $p['alt_produk_en']); ?>" />
                                </a>
                                <div class="product-info">
                                    <h4>
                                        <a href="<?= base_url($lang == 'id'
                                                        ? 'id/produk/produk-detail/' . esc($p['slug_id'])
                                                        : 'en/product/product-detail/' . esc($p['slug_en'])); ?>">
                                            <?= esc($lang == 'id' ? $p['nama_produk_id'] : $p['nama_produk_en']); ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Produk tidak tersedia saat ini.</p>
                <?php endif; ?>
            </div>

            <!-- Button Lihat Semua -->
            <div class="text-center mt-4">
                <a href="<?= base_url($lang == 'id' ? 'id/produk' : 'en/product'); ?>" class="read-more">
                    <?= lang('bahasa.buttonArticle'); ?> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
</section>
<!-- /Product Section -->


<!-- Training Section -->
<section id="activities" class="activities section light-background">
    <div class="container">
        <div class="row gy-3">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2><?= esc($lang == 'id' ? $aktivitasMeta['nama_halaman_id'] : $aktivitasMeta['nama_halaman_en']); ?></h2>
                <p><?= esc($lang == 'id' ? $aktivitasMeta['deskripsi_halaman_id'] : $aktivitasMeta['deskripsi_halaman_en']); ?></p>
            </div>
            <!-- End Section Title -->

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4 justify-content-center">
                    <?php if (!empty($aktivitas)) : ?>
                        <?php foreach (array_slice($aktivitas, 0, 3) as $p) : ?>
                            <div class="col-md-4">
                                <div class="activity-box" data-aos="fade-up" data-aos-delay="100">
                                    <a href="<?= base_url($lang == 'id'
                                                    ? 'id/pelatihan/' . esc($p['slug_aktivitas_id'])
                                                    : 'en/training/' . esc($p['slug_aktivitas_en'])); ?>">
                                        <img src="<?= base_url('assets/img/pelatihan/' . esc($p['foto_aktivitas'])); ?>"
                                            class="img-fluid"
                                            alt="<?= esc($lang == 'id' ? $p['alt_aktivitas_id'] : $p['alt_aktivitas_en']); ?>"
                                            style="height: 250px; object-fit: cover;">

                                        <div class="activity-info">
                                            <h4><?= esc($lang == 'id' ? $p['judul_aktivitas_id'] : $p['judul_aktivitas_en']); ?></h4>
                                            <p><?= esc($lang == 'id' ? $p['deskripsi_aktivitas_id'] : $p['deskripsi_aktivitas_en']); ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center">Tidak ada aktivitas yang tersedia saat ini.</p>
                    <?php endif; ?>
                </div>
            </div>


            <!-- Button Lihat Semua -->
            <div class="text-center mt-4">
                <a href="<?= base_url($lang == 'id' ? 'id/pelatihan' : 'en/training'); ?>" class="read-more">
                    <?= lang('bahasa.buttonArticle'); ?> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- /Activities Section -->


<!-- Informasi Section -->
<section id="articles" class="articles section light-background">
    <div class="container">
        <!-- Judul Section -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $articleMeta['nama_halaman_id'] : $articleMeta['nama_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $articleMeta['deskripsi_halaman_id'] : $articleMeta['deskripsi_halaman_en']; ?></p>
        </div>

        <div class="articles-layout" data-aos="fade-up" data-aos-delay="200">
            <!-- Artikel Utama -->
            <div class="featured-article" data-aos="fade-up" data-aos-delay="200">
                <?php if (!empty($article)): ?>
                    <div class="article-image">
                        <a href="<?= base_url(
                                        $lang === 'id'
                                            ? 'id/artikel/' . esc($article[0]['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . esc($article[0]['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                            : 'en/article/' . esc($article[0]['slug_kategori_en'] ?? 'category-not-found') . '/' . esc($article[0]['slug_artikel_en'] ?? 'article-not-found')
                                    ); ?>">
                            <img src="<?= base_url('assets/img/artikel/' . esc($article[0]['foto_artikel'] ?? 'default.jpg')); ?>"
                                alt="<?= esc($lang == 'id' ? $article[0]['alt_artikel_id'] : $article[0]['alt_artikel_en']); ?>"
                                class="img-fluid"
                                loading="lazy">
                        </a>
                    </div>

                    <div class="article-content">
                        <h3 class="article-title">
                            <a href="<?= base_url(
                                            $lang === 'id'
                                                ? 'id/artikel/' . esc($article[0]['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . esc($article[0]['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                : 'en/article/' . esc($article[0]['slug_kategori_en'] ?? 'category-not-found') . '/' . esc($article[0]['slug_artikel_en'] ?? 'article-not-found')
                                        ); ?>">
                                <?= esc($lang == 'id' ? $article[0]['judul_artikel_id'] : $article[0]['judul_artikel_en']); ?>
                            </a>
                        </h3>

                        <p class="article-category">
                            <?= esc($lang == 'id' ? $article[0]['nama_kategori'] : $article[0]['nama_kategori']); ?>
                        </p>
                        <p class="article-date">🗓 <?= date('d F Y', strtotime($article[0]['created_at'])); ?></p>

                        <p class="article-desc">
                            <?= esc($lang == 'id' ? $article[0]['snippet_id'] : $article[0]['snippet_en']); ?>
                        </p>

                        <div class="text-start mt-3">
                            <a href="<?= base_url(
                                            $lang === 'id'
                                                ? 'id/artikel/' . esc($article[0]['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . esc($article[0]['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                : 'en/article/' . esc($article[0]['slug_kategori_en'] ?? 'category-not-found') . '/' . esc($article[0]['slug_artikel_en'] ?? 'article-not-found')
                                        ); ?>" class="btn btn-secondary">
                                <?= lang('bahasa.buttonArticle'); ?>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-center">Tidak ada artikel tersedia saat ini.</p>
                <?php endif; ?>
            </div>

            <!-- Artikel Lainnya -->
            <div class="articles-list" data-aos="fade-up" data-aos-delay="100">
                <h3 class="articles-list-title"><?= $lang == 'id' ? 'Artikel Lainnya' : 'Related Articles'; ?></h3>

                <?php if (!empty($sideArtikel)) : ?>
                    <?php foreach ($sideArtikel as $article) : ?>
                        <div class="article-item">
                            <div class="article-image">
                                <a href="<?= base_url(
                                                $lang == 'id'
                                                    ? 'id/artikel/' . esc($article['slug_kategori_id']) . '/' . esc($article['slug_artikel_id'])
                                                    : 'en/article/' . esc($article['slug_kategori_en']) . '/' . esc($article['slug_artikel_en'])
                                            ); ?>">
                                    <img src="<?= base_url('assets/img/artikel/' . esc($article['foto_artikel'])); ?>"
                                        alt="<?= esc($lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']); ?>"
                                        class="img-fluid" style="width: 120px; height: 100px; object-fit: cover; border-radius: 8%;" loading="lazy">
                                </a>
                            </div>

                            <div class="article-content">
                                <h4 class="article-title">
                                    <a href="<?= base_url(
                                                    $lang == 'id'
                                                        ? 'id/artikel/' . esc($article['slug_kategori_id']) . '/' . esc($article['slug_artikel_id'])
                                                        : 'en/article/' . esc($article['slug_kategori_en']) . '/' . esc($article['slug_artikel_en'])
                                                ); ?>">
                                        <?= esc($lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']); ?>
                                    </a>
                                </h4>
                                <p class="article-category"><?= esc($article['nama_kategori']); ?></p>
                                <p class="article-date">🗓 <?= date('d F Y', strtotime($article['created_at'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Tidak ada artikel terkait.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- /Articles Section -->

<!-- Contact Section -->
<section id="contact" class="contact section light-background">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $contactMeta['nama_halaman_id'] : $contactMeta['nama_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $contactMeta['deskripsi_halaman_id'] : $contactMeta['deskripsi_halaman_en']; ?></p>
        </div>
        <!-- End Section Title -->

        <div class="contact-wrapper">
            <!-- Contact Info -->
            <div class="contact-card" data-aos="fade-right">
                <h3><?= $lang == 'id' ? 'Hubungi Kami' : 'Contact Us'; ?></h3>
                <p><?= $lang == 'id' ? 'Kami siap membantu Anda dengan layanan terbaik.' : 'We are ready to help you with the best service.'; ?></p>

                <div class="contact-info">
                    <div class="info-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <h4><?= $lang == 'id' ? 'Lokasi' : 'Location'; ?></h4>
                            <p><?= $kontak['lokasi'] ?? 'Jl. Danau Giji Kota Malang'; ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <h4><?= $lang == 'id' ? 'Nomor Telepon' : 'Phone Number'; ?></h4>
                            <p><?= $kontak['nomor_telepon'] ?? '0822-4597-5428'; ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p><?= $kontak['email'] ?? 'web2bahasa@gmail.com'; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="map-container" data-aos="fade-left">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2410172253694!2d112.66325561145756!3d-7.974024292017904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298db1e5b70b%3A0xaf3552a89f1cc9f0!2sELECOMP%20INDONESIA!5e0!3m2!1sen!2sid!4v1738309308019!5m2!1sen!2sid"
                    class="w-100"
                    height="550"
                    border-radius="15px" ;
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
<!-- /Contact Section -->




<?= $this->endSection(); ?>