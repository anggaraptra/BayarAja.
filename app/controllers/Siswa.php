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


        // view
        $this->view('templates/header', $data);
        $this->view('siswa/index');
        $this->view('templates/footer');
    }
}
