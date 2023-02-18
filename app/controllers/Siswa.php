<?php

class Siswa extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Data Siswa';
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
        // data
        $data['judul'] = 'Tambah Siswa';
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
        // data
        $data['judul'] = 'Update Siswa';
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
        if ($this->model('Siswa_model')->deleteDataSiswa($nis) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }
}
