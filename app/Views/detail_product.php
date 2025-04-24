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
                            <a href="<?= base_url($lang . '/') ?>">
                                <?= esc(lang('bahasa.home')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <a href="<?= base_url($lang . '/product') ?>">
                                <?= esc(lang('bahasa.product')); ?>
                            </a>

                        </li>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= $lang == 'id' ? 'Detail Produk' : 'Product Detail'; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<section>
    <div class="container my-5">
        <!-- Section Title -->
        <div class="section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-info shadow-sm">
                    <div class="row g-0 flex-column">

                        <!-- Gambar Produk -->
                        <div class="col-12">
                            <img src="<?= base_url('assets/img/produk/' . $product["foto_produk"]) ?>"
                                alt="<?= esc($lang == 'id' ? $product['alt_produk_id'] : $product['alt_produk_en']); ?>"
                                class="img-fluid rounded-top w-100"
                                style="object-fit: cover; max-height: 400px;">
                        </div>

                        <!-- Informasi Produk -->
                        <div class="col-12">
                            <div class="card-body">
                                <h1 class="card-title text-uppercase mb-3" style="font-weight: bold; letter-spacing: 1px; font-size: 1.5rem;">
                                    <?= esc($lang == 'id' ? $product['nama_produk_id'] : $product['nama_produk_en']); ?>
                                </h1>
                                <div class="mb-3" style="width: 50px; height: 4px; background-color: blue;"></div>
                                <p class="card-text" style="text-align: justify; font-size: 1.1em;">
                                    <?= esc($lang == 'id' ? $product['deskripsi_produk_id'] : $product['deskripsi_produk_en']); ?>
                                </p>
                            </div>
                        </div>

                    </div> <!-- /.row -->
                </div> <!-- /.card -->
            </div>
        </div>
    </div>

</section>



<?= $this->endSection(); ?>