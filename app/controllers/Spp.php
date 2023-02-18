<?php

class Spp extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Data SPP';
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
        // data
        $data['judul'] = 'Tambah SPP';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = 'active';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model


        // view
        $this->view('templates/header', $data);
        $this->view('spp/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
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
        // data
        $data['judul'] = 'Update SPP';
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
        if ($this->model('Spp_model')->deleteDataSpp($angkatan) > 0) {
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }
}
