<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\JadwalPendaftaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class FormController extends BaseController
{

    private $formModel;

    public function __construct()
    {
        $this->formModel = new JadwalPendaftaranModel();
    }

    public function index()
    {

        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        // Set menu aktif
        $data['activeMenu'] = 'form';

        // Ambil data dari database

        // Kirim data ke view
        return view('admin/form/index', [
            'peserta' => $this->formModel->countAll(),
            'form' => $this->formModel->findAll(),
            'activeMenu' => $data['activeMenu'],
        ]);
    }
}
