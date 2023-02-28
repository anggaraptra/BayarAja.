<?php

class Pegawai extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Data Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();

        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/index', $data);
        $this->view('templates/footer');
    }

    public function formAdd()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Tambah Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil ditambahkan atau tidak
        if ($this->model('Pegawai_model')->addDataPegawai($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil ditambahkan!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal ditambahkan!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }
    }

    public function getUpdate($id)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Update Pegawai';
        $data['statusDashboard'] = '';
        $data['statusKelas'] = '';
        $data['statusSiswa'] = '';
        $data['statusPegawai'] = 'active';
        $data['statusSpp'] = '';
        $data['statusPembayaran'] = '';
        $data['statusHistory'] = '';
        $data['statusLaporan'] = '';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('pegawai/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil diupdate
        if ($this->model('Pegawai_model')->updateDataPegawai($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil diupdate!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal diupdate!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }
    }

    public function delete($id)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Anda tidak memiliki akses ke halaman ini!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil dihapus
        if ($this->model('Pegawai_model')->deleteDataPegawai($id) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil dihapus!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal dihapus!');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }
    }
}
