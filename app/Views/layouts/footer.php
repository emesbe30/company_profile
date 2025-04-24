<?php
// Ambil bahasa yang disimpan di session
$lang = session()->get('lang') ?? 'id'; // Default ke 'en' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING']; // Mengambil query string dari URL

// Simpan segmen bahasa saat ini
$lang_segment = substr($current_url, 0, strpos($current_url, '/') + 1); // Menyimpan 'id/' atau 'en/'

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink = ($lang_segment === 'en/') ? '/' : '/';
$aboutLink = ($lang_segment === 'en/') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en/') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en/') ? 'article' : 'artikel';
$productLink = ($lang_segment === 'en/') ? 'product' : 'produk';
$detailProduct = ($lang_segment === 'en/') ? 'product-detail' : 'produk-detail';

// Buat array untuk menggantikan segmen berdasarkan bahasa
$replace_map = [
    'kontak' => 'contact',
    'tentang' => 'about',
    'artikel' => 'article',
    'produk' => 'product',
    'produk-detail' => 'product-detail',
];

// Ambil bagian dari URL tanpa segmen bahasa
$url_without_lang = substr($current_url, strlen($lang_segment));

// Tentukan bahasa yang ingin digunakan
$new_lang_segment = ($lang_segment === 'en/') ? 'id/' : 'en/';

// Gantikan setiap segmen dalam URL berdasarkan bahasa yang aktif
foreach ($replace_map as $indonesian_segment => $english_segment) {
    if ($lang_segment === 'en/') {
        // Jika bahasa yang dipilih adalah 'en', maka ganti segmen ID ke EN
        $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
    } else {
        // Jika bahasa yang dipilih adalah 'id', maka ganti segmen EN ke ID
        $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
    }
}

// Tautan dengan bahasa yang baru
$clean_url = $new_lang_segment . ltrim($url_without_lang, '/');

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}


// Tautan Bahasa Inggris
$english_url = base_url($clean_url);

// Tautan Bahasa Indonesia
$indonesia_url = base_url($clean_url);
?>

<!-- Footer -->
<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <!-- Logo Perusahaan -->
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="/" class="d-flex align-items-center">
                    <img src="<?= base_url('assets/img/profil/' . $profil['logo_perusahaan']); ?>" 
                         alt="<?= $lang == 'id' ? $profil['alt_logo_perusahaan_id'] : $profil['alt_logo_perusahaan_en']; ?>" 
                        >
                </a>
            </div>

            <!-- Tautan Berguna -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4><?= lang('bahasa.headerLink'); ?></h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url($lang . '/' . $homeLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>"> <?= lang('bahasa.home'); ?> </a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'about' ? 'active' : '' ?>"> <?= lang('bahasa.about'); ?> </a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url($lang . '/' . $articleLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'article' ? 'active' : '' ?>"> <?= lang('bahasa.article'); ?> </a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url($lang . '/' . $productLink) ?>" class="<?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>"> <?= lang('bahasa.product'); ?> </a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'contact' ? 'active' : '' ?>"> <?= lang('bahasa.contact'); ?> </a></li>
                </ul>
            </div>

            <!-- Artikel Kami / Layanan -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4><?= lang('bahasa.headerService'); ?></h4>
                <ul>
                    <?php if (!empty($kategori_teratas) && is_array($kategori_teratas)): ?>
                        <?php foreach ($kategori_teratas as $kategori): ?>
                            <li><i class="bi bi-chevron-right"></i> 
                                <a href="<?= base_url($lang . '/artikel/' . $kategori['slug_kategori_id']) ?>"> 
                                    <?= $kategori['nama_kategori_id']; ?> 
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><i class="bi bi-chevron-right"></i> <?= lang('bahasa.noCategory'); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Sosial Media & Marketplace -->
            <div class="col-lg-4 col-md-12">
                <h4><?= lang('bahasa.sosmedLink'); ?></h4>
                <ul>
                    <?php if (!empty($sosmed) && is_array($sosmed)): ?>
                        <?php foreach ($sosmed as $s): ?>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="<?= $s['link_sosmed']; ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/logo/' . $s['logo_sosmed']); ?>" alt="<?= $s['nama_sosmed']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                    <?= $s['nama_sosmed']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><i class="bi bi-chevron-right"></i> <?= lang('bahasa.noSosmed'); ?></li>
                    <?php endif; ?>
                </ul>

                <h4><?= lang('bahasa.marketplaceLink'); ?></h4>
                <ul>
                    <?php if (!empty($marketplace) && is_array($marketplace)): ?>
                        <?php foreach ($marketplace as $m): ?>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="<?= $m['link_marketplace']; ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/logo/' . $m['logo_marketplace']); ?>" alt="<?= $m['nama_marketplace']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                    <?= $m['nama_marketplace']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><i class="bi bi-chevron-right"></i> <?= lang('bahasa.noMarketplace'); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

