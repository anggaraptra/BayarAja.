<?php

class Pegawai extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Data Pegawai';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pegawai');
        $this->view('pegawai/index', $data);
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
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Tambah Pegawai';

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pegawai');
        $this->view('pegawai/page-tambah', $data);
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
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
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
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Update Pegawai';

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pegawai');
        $this->view('pegawai/page-update', $data);
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
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
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
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
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
