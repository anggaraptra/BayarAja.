<?php

class Kelas extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Kelas';
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
}
