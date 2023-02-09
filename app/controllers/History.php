<?php

class History extends Controller
{
    public function index()
    {
        $data['judul'] = 'History Pembayaran';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = 'active';
        $data['statusLaporan'] = '';

        $this->view('templates/header', $data);
        $this->view('history/index');
        $this->view('templates/footer');
    }
}
