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
            events: [{
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
            <div class="col-lg-12">
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

<!-- Jadwal Section -->
<section id="jadwal" class="jadwal section">
    <div class="container">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h2>
            <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

            <!-- Kalender - Full Width -->
            <div class="col-12">
                <div id="calendar"></div>
            </div>

            <!-- Form 1 dan Form 2 berdampingan -->
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center mb-4">Pendaftaran Pelatihan</h3>
                    <form action="<?= base_url('id/jadwal-dan-pendaftaran/tambah-pelatihan') ?>" method="POST">
                        <label for="nama1"><span style="color: red;">*</span>Nama :</label>
                        <input type="text" name="nama1" id="nama1" required>

                        <label for="domisili1"><span style="color: red;">*</span>Kota Domisili :</label>
                        <input type="text" name="domisili1" id="domisili1" required>

                        <label for="no_tlp1"><span style="color: red;">*</span>No Telepon / Whatsapp :</label>
                        <input type="text" name="no_tlp1" id="no_tlp1" pattern="^[0-9]{12,13}$" title="Nomor yang anda masukkan tidak sesuai format" required>

                        <label for="email1"><span style="color: red;">*</span>Alamat Email :</label>
                        <input type="text" name="email1" id="email1" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="Masukkan email dengan benar" required>

                        <label for="jadwal1"><span style="color: red;">*</span>Jadwal Pelatihan :</label>
                        <select name="jadwal1" id="jadwal1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                        <label><span style="color: red;">*</span>Mengetahui Competent Academy dari mana :</label>
                        <div>
                            <input type="radio" name="survey1" id="survey1" value="website"> Website <br>
                            <input type="radio" name="survey1" id="survey1" value="ig"> Instagram <br>
                            <input type="radio" name="survey1" id="survey1" value="tiktok"> Tiktok <br>
                            <input type="radio" name="survey1" id="survey1" value="fb"> Facebook <br>
                            <input type="radio" name="survey1" id="survey1" value="linkedin"> LinkedIn <br>
                            <input type="radio" name="survey1" id="survey1" value="yt"> Youtube <br>
                            <input type="radio" name="survey1" id="survey1" value="iklan"> Iklan <br>
                            <input type="radio" name="survey1" id="survey1" value="group_wa"> Group Whatsapp <br>
                            <input type="radio" name="survey1" id="survey1" value="chat_wa"> Chat Whatsapp <br>
                            <input type="radio" name="survey1" id="survey1" value="pelatihan"> Pelatihan <br>
                            <input type="radio" name="survey1" id="survey1" value="teman"> Teman <br>
                            <input type="radio" name="survey1" id="survey1" value="brosur"> Brosur <br>
                            <input type="radio" name="survey1" id="survey1" value="voucher"> Voucher <br>
                            <input type="radio" name="survey1" id="survey1" value="pameran"> Pameran <br>
                            <input type="radio" name="survey1" id="survey1" value="lainnya"> Lainnya <br>
                        </div>

                        <input type="submit" name="submit1" id="submit1" value="Kirim">
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center mb-4">Pendaftaran Sertifikasi</h3>
                    <form action="<?= base_url('id/jadwal-dan-pendaftaran/tambah-sertifikasi') ?>" method="POST">
                        <label for="nama2"><span style="color: red;">*</span>Nama :</label>
                        <input type="text" name="nama2" id="nama2" required>

                        <label for="domisili2"><span style="color: red;">*</span>Kota Domisili :</label>
                        <input type="text" name="domisili2" id="domisili2" required>

                        <label for="no_tlp2"><span style="color: red;">*</span>No Telepon / Whatsapp :</label>
                        <input type="text" name="no_tlp2" id="no_tlp2" pattern="^[0-9]{12,13}$" title="Nomor yang anda masukkan tidak sesuai format" required>

                        <label for="email2"><span style="color: red;">*</span>Alamat Email :</label>
                        <input type="text" name="email2" id="email2" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="Masukkan email dengan benar" required>

                        <label for="jadwal2"><span style="color: red;">*</span>Jadwal Sertifikasi :</label>
                        <select name="jadwal2" id="jadwal2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                        <label><span style="color: red;">*</span>Mengetahui Competent Academy dari mana :</label>
                        <div>
                            <input type="radio" name="survey2" value="website"> Website <br>
                            <input type="radio" name="survey2" value="ig"> Instagram <br>
                            <input type="radio" name="survey2" value="tiktok"> Tiktok <br>
                            <input type="radio" name="survey2" value="fb"> Facebook <br>
                            <input type="radio" name="survey2" value="linkedin"> LinkedIn <br>
                            <input type="radio" name="survey2" value="yt"> Youtube <br>
                            <input type="radio" name="survey2" value="iklan"> Iklan <br>
                            <input type="radio" name="survey2" value="group_wa"> Group Whatsapp <br>
                            <input type="radio" name="survey2" value="chat_wa"> Chat Whatsapp <br>
                            <input type="radio" name="survey2" value="pelatihan"> Pelatihan <br>
                            <input type="radio" name="survey2" value="teman"> Teman <br>
                            <input type="radio" name="survey2" value="brosur"> Brosur <br>
                            <input type="radio" name="survey2" value="voucher"> Voucher <br>
                            <input type="radio" name="survey2" value="pameran"> Pameran <br>
                            <input type="radio" name="survey2" value="lainnya"> Lainnya <br>
                        </div>

                        <input type="submit" name="submit2" id="submit2" value="Kirim">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- /Jadwal Section -->

<?= $this->endSection(); ?>