<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.about')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>"
                                class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>">
                                <?= esc(lang('bahasa.home')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= esc(lang('bahasa.about')); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Section -->
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
        <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
    </div>
    <!-- End Section Title -->

    <div class="container">
        <div class="row gy-3">
            <!-- Image Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="img-frame">
                    <img src="<?= base_url('assets/img/profil/' . esc($profil['foto_perusahaan'])); ?>"
                        alt="<?= esc($lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']); ?>"
                        class="img-fluid rounded-4 shadow">
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-3">
                    <h3>Web2Bahasa</h3>
                    <p>
                        <?= esc($lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- /About Section -->




<?= $this->endSection(); ?>