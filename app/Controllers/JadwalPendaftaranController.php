<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryActivityModel;
use App\Models\CategoryArtikelModel;
use App\Models\KontakModel;
use App\Models\MarketplaceModel;
use App\Models\MetaModel;
use App\Models\ProfilModel;
use App\Models\SosmedModel;

class JadwalPendaftaranController extends BaseController
{
    public function index()
    {
        $metaModel = new MetaModel();
        $lang = session()->get('lang') ?? 'id';
        $canonical = base_url("$lang/" . ($lang === 'id' ? 'jadwal-dan-pendaftaran' : 'schedule-and-registration'));

        // Tentukan segment URL berdasarkan bahasa
        $productSegment = ($lang === 'id') ? 'jadwal-dan-pendaftaran' : 'schedule-and-registration';

        $profilModel = new ProfilModel();
        $dataProfil = $profilModel->first();

        $kategoriModel = new CategoryArtikelModel();
        $kategoriTeratas = $kategoriModel->getKategoriTerbanyak();
        $categories = $kategoriModel->findAll();

        $kategoriAktivitasModel = new CategoryActivityModel();
        $categoriesAktivitas = $kategoriAktivitasModel->findAll();

        // Ambil metadata halaman
        $dataMeta = $metaModel->where('id_meta', '10')->first();

        // Ambil data sosial media
        $sosmedModel = new SosmedModel();
        $sosmed = $sosmedModel->findAll();

        // Ambil data marketplace
        $marketplaceModel = new MarketplaceModel();
        $marketplace = $marketplaceModel->findAll();

        // Ambil data kontak
        $kontakModel = new KontakModel();
        $kontak = $kontakModel->first();


        $data = [
            'lang' => $lang,
            'meta' => $dataMeta,
            'canonical' => $canonical,
            'productLink' => $productSegment,
            'activeMenu' => 'schedule-and-registration',
            'profil' => $dataProfil,
            'kategori_teratas' => $kategoriTeratas,
            'sosmed' => $sosmed,
            'marketplace' => $marketplace,
            'kontak' => $kontak,
            'categories' => $categories,
            'categoriesAktivitas' => $categoriesAktivitas,
        ];

        return view('jadwal_pendaftaran.php', $data);
    }
}
