<?php

class History extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history/siswa/' . $_SESSION['nis']);
            exit;
        }

        // data
        $data['title'] = 'History Pembayaran';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'history');
        $this->view('history/index', $data);
        $this->view('templates/footer');
    }

    public function siswa($nis = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        if ($nis == null) {
            header('Location: ' . BASEURL . '/history/siswa/' . $_SESSION['nis']);
            exit;
        }

        if ($nis !== $_SESSION['nis']) {
            header('Location: ' . BASEURL . '/history/siswa/' . $_SESSION['nis']);
            exit;
        }

        // data
        $data['title'] = 'History Pembayaran';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'history');
        $this->view('history/history-siswa', $data);
        $this->view('templates/footer');
    }
}
