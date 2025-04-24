<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.product')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>"> <?= esc(lang('bahasa.home')); ?> </a>
                        </li>
                        <li class="breadcrumb-item text-white active" aria-current="page">
                            <?= esc(lang('bahasa.product')); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Product Section -->
<section id="product" class="product section">
    <div class="container">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
        </div>
        <!-- End Section Title -->

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php
                // Pastikan $product adalah array sebelum melakukan usort
                if (!empty($product) && is_array($product)) {
                    usort($product, function ($a, $b) {
                        return strtotime($b['updated_at']) - strtotime($a['updated_at']);
                    });
                } else {
                    echo "<p>Produk tidak tersedia.</p>";
                }
                ?>
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
                                        <a href="<?= base_url($lang == 'id' ? 'id/produk/' . $p['slug_id'] : 'en/product/' . $p['slug_en']); ?>" class="produk-card-title">
                                            <?= $lang == 'id' ? $p['nama_produk_id'] : $p['nama_produk_en']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Produk tidak tersedia saat ini, silahkan kembali lagi nanti.</p>
                <?php endif; ?>
            </div>
        </div>
</section>
<!-- /Product Section -->

<?= $this->endSection(); ?>