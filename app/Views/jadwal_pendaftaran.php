<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [ //YYYY-MM-DD format
                {
                    title: 'Event 1',
                    start: '2025-04-23'
                },
                {
                    title: 'Event 2',
                    start: '2025-04-25',
                    end: '2025-04-27'
                },
                {
                    title: 'Event 3',
                    start: '2025-04-27',
                }
            ]
        });
        calendar.render();
    });
</script>

<!-- Page Header Start -->
<div class="container-fluid page-header d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-2 text-white animated slideInDown mb-4">
                    <?= esc(lang('bahasa.schedule-and-registration')); ?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url($lang . '/') ?>"> <?= esc(lang('bahasa.home')); ?> </a>
                        </li>
                        <li class="breadcrumb-item text-white active" aria-current="page">
                            <?= esc(lang('bahasa.schedule-and-registration')); ?>
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

            <div id="calendar"></div>
                </div>

            </div>
        </div>
</section>
<!-- /Product Section -->

<?= $this->endSection(); ?>