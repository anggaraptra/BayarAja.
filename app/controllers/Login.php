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
        $this->view('auth/login', $data);
    }

    public function process()
    {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($pegawai = $this->model('Pegawai_model')->getPegawaiByUsername($username)) {
                if ($password == $pegawai['password']) {
                    $_SESSION['login'] = true;
                    $_SESSION['id_pegawai'] = $pegawai['id_pegawai'];
                    $_SESSION['username'] = $pegawai['username'];
                    $_SESSION['nama'] = $pegawai['nama_pegawai'];
                    $_SESSION['level'] = $pegawai['level'];
                } else {
                    Flasher::setFlashMessage('warning', 'Password tidak sesuai!');
                    header('Location: ' . BASEURL . '/login');
                    exit;
                }
            } elseif ($siswa = $this->model('Siswa_model')->getSiswaByNis($username)) {
                if ($password == $siswa['password']) {
                    $_SESSION['login'] = true;
                    $_SESSION['nis'] = $siswa['nis'];
                    $_SESSION['nama'] = $siswa['nama_siswa'];
                } else {
                    Flasher::setFlashMessage('warning', 'Password tidak sesuai!');
                    header('Location: ' . BASEURL . '/login');
                    exit;
                }
            } else {
                Flasher::setFlashMessage('error', 'Username dan password tidak sesuai!');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        }

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
    }

    public function processLogout()
    {
        // process logout
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
