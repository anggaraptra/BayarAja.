<?php

class Pembayaran extends Controller
{
    public function index()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Pembayaran';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }

    public function detail()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/detail/' . $_SESSION['nis'] . '');
            exit;
        }

        if ($_POST['keyword'] == null) {
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        // data
        $data['title'] = 'Detail Pembayaran';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNisAll($_POST['keyword']);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/page-detail', $data);
        $this->view('templates/footer');
    }

    public function tagihanSiswa($nis = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if ($nis == null) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        if ($nis !== $_SESSION['nis']) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
            exit;
        }

        // data
        $data['title'] = 'Tagihan Siswa';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNisAll($nis);

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/page-tagihan', $data);
        $this->view('templates/footer');
    }

    public function formBayar($idBayar = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
            exit;
        }

        if ($idBayar == null) {
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        // data
        $data['title'] = 'Bayar Tagihan';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranById($idBayar);
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($data['pembayaran']['nis']);

        // view 
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/page-pembayaran', $data);
        $this->view('templates/footer');
    }

    public function bayar($nis)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
            exit;
        }

        // fungsi melakukan pembayaran
        if (isset($_POST['bayar'])) {
            $idBayar = $_POST['id_bayar'];
            $jumlahBayar = $_POST['jumlah_bayar'];
            $rowJumlahBayar = 0;
            $uangKembali = 0;
            $sisaBayar = 0;
            $pembayaran = $this->model('Pembayaran_model')->getPembayaranById($_POST['id_bayar']);

            if ($pembayaran) {
                $jumlahBayarDb = $pembayaran['jumlah_bayar'];
                $spp = $this->model('Spp_model')->getSppById($pembayaran['id_spp']);
                $totalBayar = $spp['nominal'];

                if ($jumlahBayarDb == null) {
                    if ($jumlahBayar > $totalBayar) {
                        $uangKembali = $jumlahBayar - $totalBayar;
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $totalBayar, 'lunas', 0);
                    } else if ($jumlahBayar == $totalBayar) {
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $jumlahBayar, 'lunas', 0);
                    } else {
                        $sisaBayar = $totalBayar - $jumlahBayar;
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $jumlahBayar, 'belum lunas', $sisaBayar);
                    }
                } else {
                    if (($jumlahBayarDb + $jumlahBayar) > $totalBayar) {
                        $uangKembali = ($jumlahBayarDb + $jumlahBayar) - $totalBayar;
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $totalBayar, 'lunas', 0);
                    } else {
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $jumlahBayar + $jumlahBayarDb, 'lunas', 0);
                    }
                }
            }

            if ($rowJumlahBayar) {
                $idPegawai = $_SESSION['id_pegawai'];
                $tanggalBayar = $_POST['tanggal_bayar'];
                $rowDetailBayar = $this->model('DetailPembayaran_model')->addDetailPembayaran($tanggalBayar, $jumlahBayar, $uangKembali, $idPegawai, $idBayar);

                if ($rowDetailBayar) {
                    if ($uangKembali !== 0) {
                        Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran! Uang kembali anda adalah Rp. ' . $uangKembali . '');
                    } else {
                        Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran!');
                    }
                }
            }
        }

        // if ($this->model('Pembayaran_model')->addDataPembayaran($_POST) > 0) {
        //     Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran!');
        //     header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $nis . '');
        //     exit;
        // } else {
        //     Flasher::setFlashMessage('failed', 'Gagal melakukan pembayaran!');
        //     header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $nis . '');
        //     exit;
        // }
    }
}
