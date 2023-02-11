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


        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/index');
        $this->view('templates/footer');
    }
}
