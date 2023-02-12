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


        // view
        $this->view('templates/header', $data);
        $this->view('spp/index');
        $this->view('templates/footer');
    }

    public function formTambah()
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
}
