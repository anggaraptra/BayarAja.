<?php

class Pegawai extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Data Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();

        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/index', $data);
        $this->view('templates/footer');
    }

    public function formAdd()
    {
        // data
        $data['judul'] = 'Tambah Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model


        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Pegawai_model')->addDataPegawai($_POST) > 0) {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        } else {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        }
    }

    public function getUpdate($id)
    {
        // data
        $data['judul'] = 'Update Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('Pegawai_model')->updateDataPegawai($_POST) > 0) {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        } else {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Pegawai_model')->deleteDataPegawai($id) > 0) {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        } else {
            header('Location: ' . BASEURL . 'pegawai');
            exit;
        }
    }
}
