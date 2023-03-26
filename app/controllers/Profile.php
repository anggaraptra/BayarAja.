<?php

class Profile extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // data
        $data['title'] = 'Profile';

        // model
        if (@$_SESSION['level']) {
            $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($_SESSION['id_pegawai']);
        } else {
            $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($_SESSION['nis']);
            $data['kelas'] = $this->model('Kelas_model')->getKelasById($data['siswa']['id_kelas']);
        }

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'profile');
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
}
