<?php

class Spp extends Controller
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
        $data['title'] = 'Data SPP';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => 'active',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('spp/index', $data);
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
                alert("Petugas tidak bisa menambah data spp!");
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
        $data['title'] = 'Tambah SPP';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => 'active',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('spp/page-tambah', $data);
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
                alert("Petugas tidak bisa menambah data spp!");
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
        if ($this->model('Spp_model')->addDataSpp($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil ditambahkan!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal ditambahkan!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }

    public function getUpdate($angkatan)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Petugas tidak bisa update data spp!");
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
        $data['title'] = 'Update SPP';
        $status = [
            'dashboard' => '',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => 'active',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // model
        $data['spp'] = $this->model('Spp_model')->getSppByAngkatan($angkatan);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('spp/page-update', $data);
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
                alert("Petugas tidak bisa update data spp!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil diupdate atau tidak
        if ($this->model('Spp_model')->updateDataSpp($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil diupdate!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal diupdate!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }

    public function delete($angkatan)
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            echo '<script>
                alert("Petugas tidak bisa menghapus data spp!");
                window.location.href = "' . BASEURL . '/pembayaran";
            </script>';
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                alert('Anda tidak memiliki akses ke halaman ini!');
                window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // cek apakah data berhasil dihapus atau tidak
        if ($this->model('Spp_model')->deleteDataSpp($angkatan) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil dihapus!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal dihapus!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }
}
