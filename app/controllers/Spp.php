<?php

class Spp extends Controller
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
        $data['title'] = 'Data SPP';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = 'active';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('spp/index', $data);
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
        $data['title'] = 'Tambah SPP';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = 'active';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // view
        $this->view('templates/header', $data);
        $this->view('spp/page-tambah', $data);
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
        if ($this->model('Spp_model')->addDataSpp($_POST) > 0) {
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }

    public function getUpdate($angkatan)
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
        $data['title'] = 'Update SPP';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = 'active';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['spp'] = $this->model('Spp_model')->getSppByAngkatan($angkatan);

        // view
        $this->view('templates/header', $data);
        $this->view('spp/page-update', $data);
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

        // cek apakah data berhasil diupdate atau tidak
        if ($this->model('Spp_model')->updateDataSpp($_POST) > 0) {
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }

    public function delete($angkatan)
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
        if ($this->model('Spp_model')->deleteDataSpp($angkatan) > 0) {
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }
}
