<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.contact')); ?>
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
                            <?= esc(lang('bahasa.contact')); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Section -->
<section id="contact" class="contact section light-background">
    <div class="container">
        <div class="container section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
        </div><!-- End Section Title -->

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