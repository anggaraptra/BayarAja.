<?php

class Dashboard extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Dashboard';
        $data['statusDashboard'] = 'active';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model


        // view
        $this->view('templates/header', $data);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
