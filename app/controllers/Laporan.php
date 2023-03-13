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
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();

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

        if (empty($_POST['kelas']) || empty($_POST['bulan'])) {
            Flasher::setFlashMessage('danger', 'Kelas dan bulan harus diisi!');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }

        // data
        $data['title'] = 'Laporan Pembayaran Kelas';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByKelasAndBulan($_POST['kelas'], $_POST['bulan']);

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
            Flasher::setFlashMessage('danger', 'Tanggal harus diisi!');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }

        // data
        $data['title'] = 'Laporan Pembayaran';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByDate($_POST['tgl1'], $_POST['tgl2']);
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('laporan/pembayaran', $data);
    }
}
