<?php

class Pembayaran extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Pembayaran';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        // view
        $this->view('templates/header', $data);
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }

    public function biodata()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
            exit;
        }

        // data
        $data['title'] = 'Biodata Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('pembayaran/page-biodata', $data);
        $this->view('templates/footer');
    }

    public function tagihan($nis)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['nis']) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        // if ($nis == null) {
        //     header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis'] . '');
        //     exit;
        // }

        // if ($nis !== $_SESSION['nis']) {
        //     header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis'] . '');
        //     exit;
        // }

        // if ($nis == null) {
        //     header('Location: ' . !@$_SESSION['nis'] ? '' . BASEURL . '/pembayaran/tagihan/' : '' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis'] . '');
        //     exit;
        // }

        // data
        $data['title'] = 'Tagihan Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('pembayaran/page-tagihan', $data);
        $this->view('templates/footer');
    }

    public function tagihanSiswa($nis = null)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if ($nis == null) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        if ($nis !== $_SESSION['nis']) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Tagihan Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNis($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('pembayaran/page-tagihan', $data);
        $this->view('templates/footer');
    }

    public function formBayar($nis = null, $bulan = null, $tahun = null)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
            exit;
        }

        if ($nis == null || $bulan == null || $tahun == null) {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Bayar Tagihan';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';
        $data['nis'] = $nis;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        // view 
        $this->view('templates/header', $data);
        $this->view('pembayaran/page-pembayaran', $data);
        $this->view('templates/footer');
    }

    public function bayar()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
            exit;
        }

        if ($this->model('Pembayaran_model')->addDataPembayaran($_POST) > 0) {
            Flasher::setFlash('Data pembayaran berhasil ditambah!', 'berhasil');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        } else {
            Flasher::setFlash('Data pembayaran gagal ditambah!', 'gagal');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }
    }
}
