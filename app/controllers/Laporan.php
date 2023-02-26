<?php

class Laporan extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Laporan Pembayaran';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = '';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = 'active';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function kelas()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Laporan Pembayaran Kelas';
        // $data['statusDashboard'] = '';
        // $data['statusKelas'] = '';
        // $data['statusSiswa'] = '';
        // $data['statusPegawai'] = '';
        // $data['statusSpp'] = '';
        // $data['statusPembayaran'] = '';
        // $data['statusHistory'] = '';
        // $data['statusLaporan'] = 'active';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('laporan/kelas', $data);
    }

    public function pembayaran()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Laporan Pembayaran';
        // $data['statusDashboard'] = '';
        // $data['statusKelas'] = '';
        // $data['statusSiswa'] = '';
        // $data['statusPegawai'] = '';
        // $data['statusSpp'] = '';
        // $data['statusPembayaran'] = '';
        // $data['statusHistory'] = '';
        // $data['statusLaporan'] = 'active';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();

        // view
        $this->view('laporan/pembayaran', $data);
    }
}
