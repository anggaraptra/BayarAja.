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

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas' || @$_SESSION['level'] == 'admin' || @$_SESSION['nis']) {
            header('Location: ' . BASEURL . '/spp/page/1');
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

        // cek page
        if ($page == 0) {
            header('Location: ' . BASEURL . '/spp/page/1');
            exit;
        }

        // title
        $data['title'] = 'Data SPP';

        // pagination
        $totalDataPerPage = 5;
        $totalData = count($this->model('Spp_model')->getAllSpp());
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/spp');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/spp/page/' . $totalPage);
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
        $data['spp'] = $this->model('Spp_model')->getSppWithLimit($startData, $totalDataPerPage);

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

        // title
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

        // cek apakah data spp sudah ada
        if ($this->model('Spp_model')->getSppByAngkatan($_POST['angkatan'])) {
            Flasher::setFlashMessage('danger', 'Data gagal ditambahkan! Tahun angkatan sudah ada!');
            header('Location: ' . BASEURL . '/spp/formAdd');
            exit;
        } else {
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

        // title
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

        // cek apakah data pembayaran sudah kosong
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
