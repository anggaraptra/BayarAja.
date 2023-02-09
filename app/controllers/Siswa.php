<?php

class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data Siswa';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = 'active';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        $this->view('templates/header', $data);
        $this->view('siswa/index');
        $this->view('templates/footer');
    }
}
