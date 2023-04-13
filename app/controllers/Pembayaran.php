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
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis'] . '');
            exit;
        }

        // title
        $data['title'] = 'Pembayaran';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaranByKet();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }

    public function detail($page = 0, $nis = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis'] . '');
            exit;
        }

        // cek nis
        if (@$_POST['keyword'] == null && $nis == null) {
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        // title
        $data['title'] = 'Detail Pembayaran';

        // jika nis null dan keyword tidak null
        if ($nis == null) {
            $data['siswa'] = $this->model('Siswa_model')->searchSiswaByNis();
            // pagination
            $totalDataPerPage = 12;
            $totalData = count($this->model('Pembayaran_model')->getPembayaranByNisAll($_POST['keyword']));
            $totalPage = ceil($totalData / $totalDataPerPage);

            $data['totalData'] = $totalData;

            if ($totalPage <= 1 && $page != 1) {
                header('Location: ' . BASEURL . '/pembayaran/detail/1/' . $_POST['keyword'] . '');
                exit;
            }

            if ($page > $totalPage && $totalPage > 1) {
                header('Location: ' . BASEURL . '/pembayaran/detail/' . $totalPage . '/' . $_POST['keyword'] . '');
                exit;
            }

            $currentPage = $page;
            $startData = ($totalDataPerPage * $currentPage) - $totalDataPerPage;
            $endData = $startData + $totalDataPerPage;
            $totalLink = 3;

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

            $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNisAllLimit($_POST['keyword'], $startData, $totalDataPerPage);

            $data['pagination'] = [
                'totalPage' => $totalPage,
                'currentPage' => $currentPage,
                'startNumber' => $startNumber,
                'endNumber' => $endNumber,
                'totalLink' => $totalLink,
                'startData' => $startData,
                'endData' => $endData,
            ];
        }

        // jika nis tidak null dan keyword null
        if ($nis !== null) {
            $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
            // pagination
            $totalDataPerPage = 12;
            $totalData = count($this->model('Pembayaran_model')->getPembayaranByNisAll($nis));
            $totalPage = ceil($totalData / $totalDataPerPage);

            $data['totalData'] = $totalData;

            if ($totalPage <= 1 && $page != 1) {
                header('Location: ' . BASEURL . '/pembayaran/detail/1/' . $nis . '');
                exit;
            }

            if ($page > $totalPage && $totalPage > 1) {
                header('Location: ' . BASEURL . '/pembayaran/detail/' . $totalPage . '/' . $nis . '');
                exit;
            }

            $currentPage = $page;
            $startData = ($totalDataPerPage * $currentPage) - $totalDataPerPage;
            $endData = $startData + $totalDataPerPage;
            $totalLink = 3;

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

            $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNisAllLimit($nis, $startData, $totalDataPerPage);

            $data['pagination'] = [
                'totalPage' => $totalPage,
                'currentPage' => $currentPage,
                'startNumber' => $startNumber,
                'endNumber' => $endNumber,
                'totalLink' => $totalLink,
                'startData' => $startData,
                'endData' => $endData,
            ];
        }

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/page-detail', $data);
        $this->view('templates/footer');
    }

    public function tagihanSiswa($page = 0, $nis = null)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // cek nis
        if ($nis == null) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis'] . '');
            exit;
        }

        if ($nis !== $_SESSION['nis']) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis'] . '');
            exit;
        }

        // title
        $data['title'] = 'Tagihan Siswa';

        // pagination
        $totalDataPerPage = 12;
        $totalData = count($this->model('Pembayaran_model')->getPembayaranByNisAll($nis));
        $totalPage = ceil($totalData / $totalDataPerPage);

        $data['totalData'] = $totalData;

        if ($totalPage <= 1 && $page != 1) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $nis . '');
            exit;
        }

        if ($page > $totalPage && $totalPage > 1) {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $totalPage . '/' . $nis . '');
            exit;
        }

        $currentPage = $page;
        $startData = ($totalDataPerPage * $currentPage) - $totalDataPerPage;
        $endData = $startData + $totalDataPerPage;
        $totalLink = 3;

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
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByNisAllLimit($nis, $startData, $totalDataPerPage);
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

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
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis']);
            exit;
        }

        // cek id bayar
        if ($idBayar == null) {
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        // title
        $data['title'] = 'Bayar Tagihan';

        // model
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranById($idBayar);
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($data['pembayaran']['nis']);

        // cek pembayaran sudah lunas atau belum
        if ($data['pembayaran']['jumlah_bayar'] == null) {
            $data['spp'] = $this->model('Spp_model')->getSppById($data['pembayaran']['id_spp']);
        } else {
            $spp = $this->model('Spp_model')->getSppById($data['pembayaran']['id_spp']);
            $jumlahBayar = $data['pembayaran']['jumlah_bayar'];
            $sisaBayar = $spp['nominal'] - $jumlahBayar;
            $data['spp'] = [
                'nominal' => $sisaBayar
            ];
        }

        // view 
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'pembayaran');
        $this->view('pembayaran/page-pembayaran', $data);
        $this->view('templates/footer');
    }

    public function bayar()
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/1/' . $_SESSION['nis']);
            exit;
        }

        // fungsi melakukan pembayaran
        if (isset($_POST['bayar'])) {
            $idBayar = $_POST['id_bayar'];
            $jumlahBayar = $_POST['jumlah_bayar'];
            $nisSiswa = $_POST['nis'];
            $namaSiswa = $_POST['nama_siswa'];
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
                    } else if (($jumlahBayarDb + $jumlahBayar) == $totalBayar) {
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $jumlahBayar + $jumlahBayarDb, 'lunas', 0);
                    } else {
                        $sisaBayar = $totalBayar - ($jumlahBayarDb + $jumlahBayar);
                        $rowJumlahBayar = $this->model('Pembayaran_model')->updatePembayaran($idBayar, $jumlahBayar + $jumlahBayarDb, 'belum lunas', $sisaBayar);
                    }
                }
            }

            if ($rowJumlahBayar) {
                $idPegawai = $_SESSION['id_pegawai'];
                $tanggalBayar = $_POST['tanggal_bayar'];
                $rowDetailBayar = $this->model('DetailPembayaran_model')->addDetailPembayaran($tanggalBayar, $jumlahBayar, $uangKembali, $idPegawai, $idBayar);

                if ($rowDetailBayar) {
                    if ($uangKembali !== 0) {
                        Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran! Uang kembali ' . $namaSiswa . ' adalah ' . rupiah($uangKembali) . '');
                        header('Location: ' . BASEURL . '/pembayaran/detail/1/' . $nisSiswa . '');
                        exit;
                    } else if ($sisaBayar !== 0) {
                        Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran! Sisa pembayaran ' . $namaSiswa . ' adalah ' . rupiah($sisaBayar) . '');
                        header('Location: ' . BASEURL . '/pembayaran/detail/1/' . $nisSiswa . '');
                        exit;
                    } else {
                        Flasher::setFlashMessage('success', 'Berhasil melakukan pembayaran!');
                        header('Location: ' . BASEURL . '/pembayaran/detail/1/' . $nisSiswa . '');
                        exit;
                    }
                }
            }
        }
    }
}
