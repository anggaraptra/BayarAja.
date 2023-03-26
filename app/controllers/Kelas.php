<?php

class Kelas extends Controller
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

        // data
        $data['title'] = 'Data Kelas';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'kelas');
        $this->view('kelas/index', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data kelas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Tambah Kelas';

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'kelas');
        $this->view('kelas/page-tambah', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data kelas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhasil ditambahkan
        if ($this->model('Kelas_model')->getKelasByNama($_POST['kelas'])) {
            Flasher::setFlashMessage('danger', 'Data gagal ditambahkan! Nama kelas sudah ada!');
            header('Location: ' . BASEURL . '/kelas/formAdd');
            exit;
        } else {
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
    }

    public function getUpdate($id)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data kelas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Update Kelas';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'kelas');
        $this->view('kelas/page-update', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data kelas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
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
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menghapus data kelas!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        $data['siswaRow'] = $this->model('Siswa_model')->getAllDataSiswa();
        if ($data['siswaRow'] == 0) {
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
        } else {
            Flasher::setFlashMessage('danger', 'Data kelas tidak bisa dihapus karena masih ada data siswa!');
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }
}
