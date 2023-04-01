<?php

class Dashboard extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // title
        $data['title'] = 'Dashboard';

        // model
        $data['siswaRow'] = $this->model('Siswa_model')->getAllDataSiswa();
        $data['detailRow'] = $this->model('DetailPembayaran_model')->getAllDataDetailPembayaran();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['detail'] = $this->model('DetailPembayaran_model')->getAllDetailPembayaranLatest();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'dashboard');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
