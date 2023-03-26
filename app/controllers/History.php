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
        $data['detail'] = $this->model('DetailPembayaran_model')->getAllDetailPembayaran();

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
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranByNis($nis);
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'history');
        $this->view('history/history-siswa', $data);
        $this->view('templates/footer');
    }

    public function cetak($id)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if ($id == null) {
            header('Location: ' . BASEURL . '/history/siswa/' . $_SESSION['nis']);
            exit;
        }

        // data
        $data['title'] = 'Cetak Bukti Pembayaran';

        // model
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranById($id);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranById($data['detail']['id_bayar']);
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($data['pembayaran']['nis']);
        $data['spp'] = $this->model('Spp_model')->getSppById($data['pembayaran']['id_spp']);
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($data['siswa']['id_kelas']);
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($data['detail']['id_pegawai']);

        // view
        $this->view('history/cetak-history', $data);
    }
}
