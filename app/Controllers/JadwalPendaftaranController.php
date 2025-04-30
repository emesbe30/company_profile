<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Controllers\BaseController;
use App\Models\CategoryActivityModel;
use App\Models\CategoryArtikelModel;
use App\Models\KontakModel;
use App\Models\MarketplaceModel;
use App\Models\ProfilModel;
use App\Models\SosmedModel;

class JadwalPendaftaranController extends BaseController
{
    protected $lang;
    protected $uri;
    private $jadwalPendaftaranModel;

    public function __construct()
    {
        $this->lang = session()->get('lang') ?? 'id';
        $this->uri = service('uri');
        $this->jadwalPendaftaranModel = new \App\Models\JadwalPendaftaranModel();
    }

    public function index()
    {

        $canonical = base_url("$this->lang/" . ($this->lang === 'id' ? 'jadwal-dan-pendaftaran' : 'schedule-and-registration'));

        // Jika URL saat ini tidak sama dengan canonical, lakukan redirect
        // if (current_url() !== $canonical) {
        //     return redirect()->to($canonical);
        // }
        // Set menu aktif
        $data['activeMenu'] = 'schedule-and-registration';

        // Instansiasi model yang dibutuhkan
        $metaModel = new MetaModel();
        $kontakModel = new KontakModel();
        $profilModel = new ProfilModel();
        $kategoriModel = new CategoryArtikelModel();
        $sosmedModel = new SosmedModel();
        $marketplaceModel = new MarketplaceModel();
        $kategoriAktivitasModel = new CategoryActivityModel();

        // Ambil data dari database
        $dataMeta = $metaModel->where('id_meta', '10')->first();
        $dataKontak = $kontakModel->first();
        $dataProfil = $profilModel->first();
        $kategoriTeratas = $kategoriModel->getKategoriTerbanyak();
        $categories = $kategoriModel->findAll();
        $sosmed = $sosmedModel->findAll();
        $marketplace = $marketplaceModel->findAll();
        $categoriesAktivitas = $kategoriAktivitasModel->findAll();

        // Kirim data ke view
        return view('jadwal_pendaftaran', [
            'canonical' => $canonical,
            'meta' => $dataMeta,
            'kontak' => $dataKontak,
            'lang' => $this->lang,
            'data' => $data,
            'profil' => $dataProfil,
            'kategori_teratas' => $kategoriTeratas,
            'sosmed' => $sosmed,
            'marketplace' => $marketplace,
            'categories' => $categories,
            'categoriesAktivitas' => $categoriesAktivitas
        ]);
    }

    public function tambah_pelatihan(){
        $nama = $this->request->getVar('nama1');
        $domisili = $this->request->getVar('domisili1');
        $no_tlp = $this->request->getVar('no_tlp1');
        $email = $this->request->getVar('email1');
        $jadwal = $this->request->getVar('jadwal1');
        $survey = $this->request->getVar('survey1');
        
        $type = 'sertifikasi_dan_pelatihan';
        $data = [
            'nama_peserta' => $nama,
            'domisili' => $domisili,
            'no_tlp' => $no_tlp,
            'email' => $email,
            'jadwal' => $jadwal,
            'survey' => $survey,
            'tipe_pendaftaran' => $type,
        ];
        $this->jadwalPendaftaranModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/id/jadwal-dan-pendaftaran'));

    }

    public function tambah_sertifikasi(){
        $nama = $this->request->getVar('nama2');
        $domisili = $this->request->getVar('domisili2');
        $no_tlp = $this->request->getVar('no_tlp2');
        $email = $this->request->getVar('email2');
        $jadwal = $this->request->getVar('jadwal2');
        $survey = $this->request->getVar('survey2');
        
        $type = 'sertifikasi_saja';
        $data = [
            'nama_peserta' => $nama,
            'domisili' => $domisili,
            'no_tlp' => $no_tlp,
            'email' => $email,
            'jadwal' => $jadwal,
            'survey' => $survey,
            'tipe_pendaftaran' => $type,
        ];
        $this->jadwalPendaftaranModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/id/jadwal-dan-pendaftaran'));

    }
}
