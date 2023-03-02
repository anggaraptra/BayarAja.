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
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => 'active',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
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
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => 'active',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('pembayaran/page-biodata', $data);
        $this->view('templates/footer');
    }

    public function tagihan($nis = null)
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

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Tagihan Siswa';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => 'active',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
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
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => 'active',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNis($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
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
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        // data
        $data['title'] = 'Bayar Tagihan';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => 'active',
            'history' => '',
            'laporan' => ''
        ];
        $data['nis'] = $nis;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        // view 
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('pembayaran/page-pembayaran', $data);
        $this->view('templates/footer');
    }

    public function bayar($nis)
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
            Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran!');
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $nis . '');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Gagal melakukan pembayaran!');
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $nis . '');
            exit;
        }
    }
}
