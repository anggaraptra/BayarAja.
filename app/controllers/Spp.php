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
}
