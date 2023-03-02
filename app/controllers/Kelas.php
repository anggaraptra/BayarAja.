<?php

class Kelas extends Controller
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
        $data['title'] = 'Data Kelas';
        $status = [
            'dashboard' => '',
            'kelas' => 'active',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('kelas/index', $data);
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
                alert("Petugas tidak bisa menambah data kelas!");
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
        $data['title'] = 'Tambah Kelas';
        $status = [
            'dashboard' => '',
            'kelas' => 'active',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('kelas/page-tambah', $data);
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
                alert("Petugas tidak bisa menambah data kelas!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil ditambahkan
        if ($this->model('Kelas_model')->addDataKelas($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil ditambahkan!');
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal ditambahkan!');
            header('Location: ' . BASEURL . '/kelas');
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
                alert("Petugas tidak bisa update data kelas!");
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
        $data['title'] = 'Update Kelas';
        $status = [
            'dashboard' => '',
            'kelas' => 'active',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('kelas/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Petugas tidak bisa update data kelas!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil diupdate
        if ($this->model('Kelas_model')->updateDataKelas($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil diupdate!');
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal diupdate!');
            header('Location: ' . BASEURL . '/kelas');
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
                alert("Petugas tidak bisa menghapus data kelas!");
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
        if ($this->model('Kelas_model')->deleteDataKelas($id) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil dihapus!');
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal dihapus!');
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }
}
