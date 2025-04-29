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
                            <a href="<?= base_url($lang . '/training') ?>">
                                <?= esc(lang('bahasa.training')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= $lang == 'id' ? 'Detail Pelatihan' : 'Training Detail'; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Service Details Section -->
<section id="activity-detail" class="activity-detail section light-background">
    <div class="container">
        <div class="row gy-3">
            <!-- Section Title -->
            <div class="col-12 section-title" data-aos="fade-up">
                <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
                <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>

            </div>
            <!-- End Section Title -->
            <div class="container">
                <div class="row">
                    <!-- Aktivitas Utama -->
                    <div class="col-lg-8">
                        <div class="main-activity" data-aos="fade-up" data-aos-delay="200">
                            <img src="<?= base_url('assets/img/pelatihan/' . $aktivitas['foto_aktivitas']); ?>"
                                alt="<?= $lang == 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']; ?>"
                                class="img-fluid services-img">

                            <h1><?= $lang == 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']; ?></h1>

                            <p>
                                <span class="badge bg-primary"><?= $lang == 'id' ? $aktivitas['nama_kategori_id'] : $aktivitas['nama_kategori_en']; ?></span> -
                                <?= date('d F Y', strtotime($aktivitas['created_at'])); ?>
                            </p>

                            <p>
                                <?= $lang == 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en']; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Sidebar Aktivitas Lainnya -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-box">
                            <h4><?= $lang == 'id' ? 'Pelatihan Lainnya' : 'Related Trainings'; ?></h4>

                            <div class="services-list">
                                <?php if (!empty($sideActivity)): ?>
                                    <?php foreach ($sideActivity as $activity): ?>
                                        <a href="<?= base_url($lang == 'id'
                                                        ? 'id/pelatihan/' . $activity['slug_kategori_id'] . '/' . $activity['slug_aktivitas_id']
                                                        : 'en/training/' . $activity['slug_kategori_en'] . '/' . $activity['slug_aktivitas_en']); ?>"
                                            class="d-flex align-items-center mb-3">
                                            <img src="<?= base_url('assets/img/pelatihan/' . $activity['foto_aktivitas']); ?>"
                                                alt="<?= $lang == 'id' ? $activity['alt_aktivitas_id'] : $activity['alt_aktivitas_en']; ?>"
                                                class="img-fluid me-3"
                                                style="width: 100px; height: 80px; object-fit: cover; border-radius: 5%;">
                                            <div>
                                                <span><?= $lang == 'id' ? $activity['judul_aktivitas_id'] : $activity['judul_aktivitas_en']; ?></span>
                                                <p style="font-size: 0.875rem; color: #6c757d; margin-top: 4px;">
                                                    <?= date('d F Y', strtotime($activity['created_at'])); ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted"><?= $lang == 'id' ? 'Tidak ada pelatihan terkait.' : 'No related trainings found.'; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</section><!-- /Service Details Section -->
<?= $this->endSection(); ?>