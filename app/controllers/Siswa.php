<?php

class Siswa extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Data Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = 'active';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function formAdd()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Tambah Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = 'active';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('siswa/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhasil ditambahkan atau tidak
        if ($this->model('Siswa_model')->addDataSiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function getUpdate($nis)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Update Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = 'active';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('siswa/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhadil diupdate atau tidak
        if ($this->model('Siswa_model')->updateDataSiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function delete($nis)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhasil dihapus atau tidak
        if ($this->model('Siswa_model')->deleteDataSiswa($nis) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }
}
