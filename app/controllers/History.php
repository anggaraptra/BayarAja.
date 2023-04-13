<?php

class History extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history/page/1');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
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
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
            exit;
        }

        // cek page
        if ($page == 0) {
            header('Location: ' . BASEURL . '/history/page/1');
            exit;
        }

        // title
        $data['title'] = 'History Pembayaran';

        // pagination
        $totalDataPerPage = 10;
        $totalData = count($this->model('DetailPembayaran_model')->getAllDetailPembayaran());
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/history/page/' . $totalPage);
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
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranWithLimit($startData, $totalDataPerPage);
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'history');
        $this->view('history/index', $data);
        $this->view('templates/footer');
    }

    public function siswa($page = 0, $nis = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek nis
        if ($nis == null) {
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
            exit;
        }

        if ($nis !== $_SESSION['nis']) {
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
            exit;
        }

        // cek page
        if ($page == 0) {
            header('Location: ' . BASEURL . '/history/siswa/1/' . $nis);
            exit;
        }

        // title
        $data['title'] = 'History Pembayaran';

        // pagination
        $totalDataPerPage = 5;
        $totalData = count($this->model('DetailPembayaran_model')->getDetailPembayaranByNis($nis));
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/history/siswa');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/history/siswa/' . $totalPage . '/' . $nis);
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
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranByNisLimit($nis, $startData, $totalDataPerPage);
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'history');
        $this->view('history/history-siswa', $data);
        $this->view('templates/footer');
    }

    public function cetak($id = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // cek id cetak
        if ($id == null) {
            header('Location: ' . BASEURL . '/history/siswa/1/' . $_SESSION['nis']);
            exit;
        }

        // title
        $data['title'] = 'Cetak Bukti Pembayaran';

        // model
        $data['detail'] = $this->model('DetailPembayaran_model')->getDetailPembayaranById($id);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranById($data['detail']['id_bayar']);
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($data['pembayaran']['nis']);
        $data['spp'] = $this->model('Spp_model')->getSppById($data['pembayaran']['id_spp']);
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($data['siswa']['id_kelas']);
        $data['pegawai'] = $this->model('Pegawai_model')->getPegawaiById($data['detail']['id_pegawai']);

        // view
        $this->view('history/cetak-history', $data);
    }
}
