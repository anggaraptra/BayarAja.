<?php

class Login extends Controller
{
    public function index()
    {
        // cek setiap session yang ada dan level
        if (@$_SESSION['login'] && $_SESSION['level'] == 'admin') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } elseif (@$_SESSION['login'] && $_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        } elseif (@$_SESSION['login'] && @$_SESSION['nis']) {
            header('Location: ' . BASEURL . '/history/siswa/' . $_SESSION['nis']);
            exit;
        }

        // data
        $data['title'] = 'Login';

        // view
        $this->view('login/index', $data);
    }

    public function process()
    {
        // process login dan mengirimkan session sesuai yang login
        if ($this->model('User_model')->login($_POST) > 0 && $_SESSION['level'] == 'admin') {
            Flasher::setFlashLogin('Selamat datang ' . $_SESSION['nama'] . ' (' . $_SESSION['level'] . ') !');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } elseif ($this->model('User_model')->login($_POST) > 0 && $_SESSION['level'] == 'petugas') {
            Flasher::setFlashLogin('Selamat datang ' . $_SESSION['nama'] . ' (' . $_SESSION['level'] . ') !');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        } elseif ($this->model('User_model')->login($_POST) > 0 && @$_SESSION['nis']) {
            Flasher::setFlashLogin('Selamat datang ' . $_SESSION['nama'] . ' !');
            header('Location: ' . BASEURL . '/history');
            exit;
        } else {
            Flasher::setFlashLogin('Username atau password salah!');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function processLogout()
    {
        // process logout
        $this->model('User_model')->logout();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
