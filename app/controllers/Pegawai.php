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

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pegawai/page/1');
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

        // cek page
        if ($page == 0) {
            header('Location: ' . BASEURL . '/pegawai/page/1');
            exit;
        }

        // title
        $data['title'] = 'Data Pegawai';

        // pagination
        $totalDataPerPage = 5;
        $totalData = count($this->model('Pegawai_model')->getAllPetugas());
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/pegawai/page/' . $totalPage);
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

        if ($startNumber != 1) {
            $endNumber = $currentPage + $totalLink - 1;
            if ($endNumber > $totalPage) {
                $endNumber = $totalPage;
            }
        }

        $data['pagination'] = [
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
            'startNumber' => $startNumber,
            'endNumber' => $endNumber,
            'totalLink' => $totalLink,
            'startData' => $startData,
            'endData' => $endData,
        ];

        // model
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiWithLimit($startData, $totalDataPerPage);

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

        // title
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

        // cek apakah username sudah digunakan
        if ($this->model('Pegawai_model')->getPegawaiByUsername($_POST['username'])) {
            Flasher::setFlashMessage('danger', 'Username sudah digunakan!');
            header('Location: ' . BASEURL . '/pegawai/formAdd');
            exit;
        } else {
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

        // title
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

        // cek apakah username sudah digunakan
        if ($this->model('Pegawai_model')->getPegawaiByUsername($_POST['username']) && $_POST['username'] != $_POST['username_lama']) {
            Flasher::setFlashMessage('danger', 'Username sudah digunakan!');
            header('Location: ' . BASEURL . '/pegawai/getUpdate/' . $_POST['id_pegawai'] . '');
            exit;
        } else {
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
