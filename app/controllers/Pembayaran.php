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

        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        $this->view('templates/header', $data);
        $this->view('pembayaran/page-biodata', $data);
        $this->view('templates/footer');
    }

    public function tagihan($nis)
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

        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

        $this->view('templates/header', $data);
        $this->view('pembayaran/page-tagihan', $data);
        $this->view('templates/footer');
    }
}
