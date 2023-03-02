<?php

class Profile extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // data
        $data['title'] = 'Profile';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // model

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
}
