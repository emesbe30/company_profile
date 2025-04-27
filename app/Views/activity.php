<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.training')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>">
                                <?= esc(lang('bahasa.home')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= esc(lang('bahasa.training')); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Activities Section -->
<section id="activities" class="activities section light-background">
    <div class="container">
        <div class="row gy-3">
            <!-- Section Title -->
            <div class="col-12 section-title" data-aos="fade-up">
                <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
                <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>

            </div>
            <!-- End Section Title -->

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4 justify-content-center">
                    <?php if (!empty($allAktivitas)): ?>
                        <?php foreach ($allAktivitas as $p): ?>
                            <div class="col-md-4">
                                <div class="activity-box">
                                    <a href="<?= base_url(
                                                    $lang === 'id'
                                                        ? 'id/pelatihan/' . ($p['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($p['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                                                        : 'en/training/' . ($p['slug_kategori_en'] ?? 'category-not-found') . '/' . ($p['slug_aktivitas_en'] ?? 'activity-not-found')
                                                ); ?>">
                                        <img src="<?= base_url('assets/img/pelatihan/' . esc($p["foto_aktivitas"])); ?>"
                                            class="img-fluid"
                                            alt="<?= esc($lang == 'id' ? $p['alt_aktivitas_id'] : $p['alt_aktivitas_en']); ?>"
                                            style="object-fit: cover; height: 250px; width: 100%;"
                                            loading="lazy">

                                        <div class="activity-info">
                                            <h4><?= esc($lang == 'id' ? $p['judul_aktivitas_id'] : $p['judul_aktivitas_en']); ?></h4>
                                            <div class="activity-meta">
                                                <span class="activity-category"><?= esc($lang == 'id' ? $p['nama_kategori'] : $p['nama_kategori']); ?></span>
                                                <div class="activity-date"><?= date('d M Y', strtotime($p['updated_at'])); ?></div>
                                            </div>
                                            <p><?= esc($lang == 'id' ? substr($p['deskripsi_aktivitas_id'], 0, 100) : substr($p['deskripsi_aktivitas_en'], 0, 100)); ?>...</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <p class="text-muted"><?= esc($lang == 'id' ? 'Belum ada aktivitas.' : 'No activities found.'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Activities Section -->

<?= $this->endSection(); ?>