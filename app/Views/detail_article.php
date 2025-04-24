<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.article')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>">
                                <?= esc(lang('bahasa.home')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <a href="<?= base_url($lang . '/article') ?>">
                                <?= esc(lang('bahasa.article')); ?>
                            </a>

                        </li>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= $lang == 'id' ? 'Detail Artikel' : 'Article Detail'; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Artikel Detail -->
<section class="article-detail section">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></p>
        </div>
        <div class="container">
            <div class="row">
                <!-- Artikel Utama -->
                <div class="col-lg-8">
                    <div class="main-article" data-aos="fade-up" data-aos-delay="200">
                        <img src="<?= base_url('assets/img/artikel/' . $artikel['foto_artikel']); ?>"
                            alt="<?= $lang == 'id' ? $artikel['alt_artikel_id'] : $artikel['alt_artikel_en']; ?>"
                            class="img-fluid services-img">

                        <h1><?= $lang == 'id' ? $artikel['judul_artikel_id'] : $artikel['judul_artikel_en']; ?></h1>

                        <p>
                            <span class="badge bg-primary"><?= $lang == 'id' ? $artikel['nama_kategori_id'] : $artikel['nama_kategori_en']; ?></span> -
                            <?= date('d F Y', strtotime($artikel['created_at'])); ?>
                        </p>

                        <p>
                            <?= $lang == 'id' ? $artikel['deskripsi_artikel_id'] : $artikel['deskripsi_artikel_en']; ?>
                        </p>
                    </div>
                </div>

                <!-- Sidebar Artikel Lainnya -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="artikel-box">
                        <h4><?= $lang == 'id' ? 'Artikel Lainnya' : 'Related Articles'; ?></h4>
                        <div class="list-group">
                            <?php if (!empty($sideArticle) && is_array($sideArticle)): ?>
                                <?php foreach ($sideArticle as $article): ?>
                                    <a href="<?= base_url($lang == 'id'
                                                    ? 'id/artikel/' . $article['slug_kategori_id'] . '/' . $article['slug_artikel_id']
                                                    : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_artikel_en']); ?>"
                                        class="d-flex align-items-center mb-3">
                                        <img src="<?= base_url('assets/img/artikel/' . $article['foto_artikel']); ?>"
                                            alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>"
                                            class="img-fluid me-3"
                                            style="width: 100px; height: 80px; object-fit: cover; border-radius: 5%;" loading="lazy">
                                        <div>
                                            <span><?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?></span>
                                            <p style="font-size: 0.875rem; color: #6c757d; margin-top: 4px;">
                                                <?= date('d F Y', strtotime($article['created_at'])); ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted"><?= $lang == 'id' ? 'Tidak ada artikel terkait.' : 'No related articles found.'; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>