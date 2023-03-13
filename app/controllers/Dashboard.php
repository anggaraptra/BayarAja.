<?php

class Dashboard extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // model
        $data['siswa'] = $this->model('Siswa_model')->getAllDataSiswa();

        // data
        $data['title'] = 'Dashboard';

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'dashboard');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
