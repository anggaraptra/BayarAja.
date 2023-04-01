<?php

class Login extends Controller
{
    public function index()
    {
        // cek cookie pegawai
        if (@$_COOKIE['idPegawai'] && @$_COOKIE['keyPegawai']) {
            $id = $_COOKIE['idPegawai'];
            $key = $_COOKIE['keyPegawai'];

            $resultPegawai = $this->model('Pegawai_model')->getPegawaiById($id);

            if ($key === hash('sha256', $resultPegawai['username'])) {
                $_SESSION['login'] = true;
                $_SESSION['id_pegawai'] = $resultPegawai['id_pegawai'];
                $_SESSION['username'] = $resultPegawai['username'];
                $_SESSION['nama'] = $resultPegawai['nama_lengkap'];
                $_SESSION['level'] = $resultPegawai['level'];
            }
        }

        // cek cookie siswa
        if (@$_COOKIE['idSiswa'] && @$_COOKIE['keySiswa']) {
            $id = $_COOKIE['idSiswa'];
            $key = $_COOKIE['keySiswa'];

            $resultSiswa = $this->model('Siswa_model')->getSiswaById($id);

            if ($key === hash('sha256', $resultSiswa['nama_siswa'])) {
                $_SESSION['login'] = true;
                $_SESSION['nis'] = $resultSiswa['nis'];
                $_SESSION['nama'] = $resultSiswa['nama_siswa'];
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
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
            exit;
        }

        // title
        $data['title'] = 'Login';

        // view
        $this->view('auth/login', $data);
    }

    public function process()
    {
        // cek apakah ada data yang dikirim
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // cek apakah username ada di database
            if ($pegawai = $this->model('Pegawai_model')->getPegawaiByUsername($username)) {

                // cek password
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

                // set cookie jika remember me dicentang
                if (@$_POST['rememberMe']) {
                    setcookie('idPegawai', $pegawai['id_pegawai'], time() + 3600);
                    setcookie('keyPegawai', hash('sha256', $pegawai['username']),  time() + 3600);
                }

                // cek apakah nis siswa ada di database
            } elseif ($siswa = $this->model('Siswa_model')->getSiswaByNis($username)) {

                // cek password
                if (password_verify($password, $siswa['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['nis'] = $siswa['nis'];
                    $_SESSION['nama'] = $siswa['nama_siswa'];
                } else {
                    Flasher::setFlashMessage('warning', 'Password tidak sesuai!');
                    header('Location: ' . BASEURL . '/login');
                    exit;
                }

                // set cookie jika remember me dicentang
                if (@$_POST['rememberMe']) {
                    setcookie('idSiswa', $siswa['id_siswa'], time() + 3600);
                    setcookie('keySiswa', hash('sha256', $siswa['nama_siswa']),  time() + 3600);
                }
            } else {
                Flasher::setFlashMessage('error', 'Username dan password tidak sesuai!');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        }

        // cek setiap session yang ada dan level
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
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
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
        setcookie('idPegawai', '', time() - 3600);
        setcookie('keyPegawai', '', time() - 3600);
        setcookie('idSiswa', '', time() - 3600);
        setcookie('keySiswa', '', time() - 3600);

        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
