<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Laporan Pembayaran';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = 'active';

        $this->view('templates/header', $data);
        $this->view('laporan/index');
        $this->view('templates/footer');
    }
}
