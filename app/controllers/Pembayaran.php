<?php

class Pembayaran extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Pembayaran';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model


        // view
        $this->view('templates/header', $data);
        $this->view('pembayaran/index');
        $this->view('templates/footer');
    }

    public function biodata()
    {
        $data['judul'] = 'Biodata Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = 'active';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();

        $this->view('templates/header', $data);
        $this->view('pembayaran/page-biodata', $data);
        $this->view('templates/footer');
    }
}
