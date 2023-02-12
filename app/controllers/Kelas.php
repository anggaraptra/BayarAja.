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


        // view
        $this->view('templates/header', $data);
        $this->view('kelas/index');
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
}
