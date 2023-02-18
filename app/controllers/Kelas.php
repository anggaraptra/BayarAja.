<?php

class Kelas extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Data Kelas';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = 'active';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }

    public function formAdd()
    {
        // data
        $data['judul'] = 'Tambah Kelas';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = 'active';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model


        // view
        $this->view('templates/header', $data);
        $this->view('kelas/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Kelas_model')->addDataKelas($_POST) > 0) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }

    public function getUpdate($id)
    {
        // data
        $data['judul'] = 'Update Kelas';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = 'active';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('kelas/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('Kelas_model')->updateDataKelas($_POST) > 0) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Kelas_model')->deleteDataKelas($id) > 0) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }
}
