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

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/kelas/page/1');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }
    }

    public function page($page = 0)
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

        if ($page == 0) {
            header('Location: ' . BASEURL . '/kelas/page/1');
            exit;
        }

        // data
        $data['title'] = 'Data Kelas';

        // model
        // pagination
        $totalDataPerPage = 5;
        $totalData = count($this->model('Kelas_model')->getAllKelas());
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/kelas/page/' . $totalPage);
            exit;
        }

        $currentPage = $page;
        $startData = ($totalDataPerPage * $currentPage) - $totalDataPerPage;
        $endData = $startData + $totalDataPerPage;
        $totalLink = 2;

        if ($currentPage > $totalLink) {
            $startNumber = $currentPage - $totalLink;
        } else {
            $startNumber = 1;
        }

        if ($currentPage < ($totalPage - $totalLink)) {
            $endNumber = $currentPage + $totalLink;
        } else {
            $endNumber = $totalPage;
        }

        if ($endNumber != $totalPage) {
            $startNumber = $currentPage - $totalLink + 1;
            if ($startNumber < 1) {
                $startNumber = 1;
            }
        }

        $data['kelas'] = $this->model('Kelas_model')->getKelasWithLimit($startData, $totalDataPerPage);

        $data['pagination'] = [
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
            'startNumber' => $startNumber,
            'endNumber' => $endNumber,
            'totalLink' => $totalLink,
            'startData' => $startData,
            'endData' => $endData,
        ];

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

        // cek nama kelas
        if ($this->model('Kelas_model')->getKelasByNama($_POST['kelas'])) {
            Flasher::setFlashMessage('danger', 'Data gagal ditambahkan! Nama kelas sudah ada!');
            header('Location: ' . BASEURL . '/kelas/formAdd');
            exit;
        } else {
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

        // cek nama kelas
        if ($this->model('Kelas_model')->getKelasByNama($_POST['kelas']) && $_POST['kelas'] != $_POST['kelas_lama']) {
            Flasher::setFlashMessage('danger', 'Data gagal ditambahkan! Nama kelas sudah ada!');
            header('Location: ' . BASEURL . '/kelas/getUpdate/' . $_POST['id_kelas']);
            exit;
        } else {
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
