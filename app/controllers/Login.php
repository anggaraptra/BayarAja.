<?php

class Login extends Controller
{
    public function index()
    {
        // cek cookie
        if (@$_COOKIE['id'] && @$_COOKIE['key']) {
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];

            $resultPegawai = $this->model('Pegawai_model')->getPegawaiById($id);

            if ($key === hash('sha256', $resultPegawai['username'])) {
                $_SESSION['login'] = true;
                $_SESSION['id_pegawai'] = $resultPegawai['id_pegawai'];
                $_SESSION['username'] = $resultPegawai['username'];
                $_SESSION['nama'] = $resultPegawai['nama_lengkap'];
                $_SESSION['level'] = $resultPegawai['level'];
            }
        }

        // cek setiap session yang ada dan level
        if (@$_SESSION['login'] && $_SESSION['level'] == 'admin') {
            header('Location: ' . BASEURL . '');
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
                if (password_verify($password, $pegawai['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['id_pegawai'] = $pegawai['id_pegawai'];
                    $_SESSION['username'] = $pegawai['username'];
                    $_SESSION['nama'] = $pegawai['nama_lengkap'];
                    $_SESSION['level'] = $pegawai['level'];
                } else {
                    Flasher::setFlashMessage('warning', 'Password tidak sesuai!');
                    header('Location: ' . BASEURL . '/login');
                    exit;
                }

                // cookie
                if (@$_POST['rememberMe']) {
                    setcookie('id', $pegawai['id_pegawai'], time() + 3600);
                    setcookie('key', hash('sha256', $pegawai['username']),  time() + 3600);
                }
            } elseif ($siswa = $this->model('Siswa_model')->getSiswaByNis($username)) {
                if (password_verify($password, $siswa['password'])) {
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
            Flasher::setFlashMessage('info', 'Selamat datang admin!');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } elseif (@$_SESSION['login'] && $_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('info', 'Selamat datang petugas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        } elseif (@$_SESSION['login'] && @$_SESSION['nis']) {
            Flasher::setFlashMessage('info', 'Selamat datang ' . $_SESSION['nama'] . '!');
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

        // hapus cookie
        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);

        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
