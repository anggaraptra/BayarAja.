<?php

class Spp extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // data
        $data['title'] = 'Data SPP';

        // model
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'spp');
        $this->view('spp/index', $data);
        $this->view('templates/footer');
    }

    public function formAdd()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data spp!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Tambah SPP';

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'spp');
        $this->view('spp/page-tambah', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data spp!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhasil ditambahkan atau tidak
        if ($this->model('Spp_model')->getSppByAngkatan($_POST['angkatan'])) {
            Flasher::setFlashMessage('danger', 'Data gagal ditambahkan! Tahun angkatan sudah ada!');
            header('Location: ' . BASEURL . '/spp/formAdd');
            exit;
        } else {
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
    }

    public function getUpdate($id)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data spp!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Update SPP';

        // model
        $data['spp'] = $this->model('Spp_model')->getSppById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'spp');
        $this->view('spp/page-update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data spp!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
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
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menghapus data spp!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        $data['bayarRow'] = $this->model('Pembayaran_model')->getAllDataPembayaran();

        if ($data['bayarRow'] == 0) {
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
        } else {
            Flasher::setFlashMessage('danger', 'Data spp tidak bisa dihapus karena masih ada data pembayaran yang terkait!');
            header('Location: ' . BASEURL . '/spp');
            exit;
        }
    }
}
