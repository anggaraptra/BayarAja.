<?php

class Laporan extends Controller
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

        // data
        $data['title'] = 'Laporan Pembayaran';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'laporan');
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function kelas()
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

        if (empty($_POST['id_kelas']) || empty($_POST['bulan'])) {
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }

        // data
        $data['title'] = 'Laporan Pembayaran Kelas';

        // model
        $idKelas = $_POST['id_kelas'];
        $bulan = $_POST['bulan'];
        $tahunNow = date('Y');
        $angkatan = $_POST['angkatan'];

        $data['siswa'] = $this->model('Siswa_model')->getSiswaByKelasAndBulan($idKelas, $bulan, $tahunNow, $angkatan);
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($idKelas);

        // view
        $this->view('laporan/kelas', $data);
    }

    public function pembayaran()
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

        if (empty($_POST['tgl1']) || empty($_POST['tgl2'])) {
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }

        // data
        $data['title'] = 'Laporan Pembayaran';

        // model
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranByDate($_POST['tgl1'], $_POST['tgl2']);
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();

        // view
        $this->view('laporan/pembayaran', $data);
    }
}
