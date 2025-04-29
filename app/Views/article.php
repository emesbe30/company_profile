<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.information')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>">
                                <?= esc(lang('bahasa.home')); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <?= esc(lang('bahasa.information')); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Articles Section -->
<section id="articles" class="articles section light-background">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></p>
        </div>
        
        <div class="container">
            <div class="row">
                <!-- Main Articles Column -->
                <div class="col-lg-8">
                    <div class="main-articles">
                        <?php foreach ($allArticle as $article): ?>
                        <div class="card mb-4">
                            <img src="<?= base_url('assets/img/information/' . $article['foto_artikel']); ?>" 
                                 class="card-img-top" 
                                 alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>"
                                 loading="lazy">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?= base_url(
                                        $lang === 'id'
                                            ? 'id/informasi/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                            : 'en/information/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                                    ); ?>">
                                        <?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?>
                                    </a>
                                </h5>
                                <div class="article-meta">
                                    <span class="article-category"><?= $article['nama_kategori']; ?></span>
                                    <small class="text-muted">🗓 <?= date('d F Y', strtotime($article['created_at'])); ?></small>
                                </div>
                                <p class="card-text mt-2">
                                    <?= $lang == 'id' ? $article['snippet_id'] : $article['snippet_en']; ?>
                                </p>
                                <a href="<?= base_url(
                                    $lang === 'id'
                                        ? 'id/information/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                        : 'en/information/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                                ); ?>" class="btn btn-primary">
                                    <?= lang('bahasa.buttonArticle'); ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <!-- Pagination -->
                        <nav aria-label="Pagination" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">‹</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">›</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4">
                    <h4 class="mb-3"><?= $lang == 'id' ? 'Artikel Lainnya' : 'Related Articles'; ?></h4>
                    <div class="list-group">
                        <?php foreach ($sideArticle as $article): ?>
                        <a href="<?= base_url($lang == 'id'
                                        ? 'id/information/' . $article['slug_kategori_id'] . '/' . $article['slug_artikel_id']
                                        : 'en/information/' . $article['slug_kategori_en'] . '/' . $article['slug_artikel_en']); ?>" 
                           class="list-group-item list-group-item-action d-flex align-items-start">
                            <img src="<?= base_url('assets/img/information/' . $article['foto_artikel']); ?>" 
                                 class="article-thumbnail me-3" 
                                 alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>"
                                 loading="lazy">
                            <div>
                                <h6 class="mb-1"><?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?></h6>
                                <div class="article-meta">
                                    <small class="text-muted">🗓 <?= date('d F Y', strtotime($article['created_at'])); ?></small>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>