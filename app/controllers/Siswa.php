<?php

class Siswa extends Controller
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
        $data['title'] = 'Data Siswa';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'siswa');
        $this->view('siswa/index', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data siswa!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Tambah Siswa';

        // model
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'siswa');
        $this->view('siswa/page-tambah', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menambah data siswa!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // input data pembayaran
        if (isset($_POST['tambahSiswa'])) {
            if ($this->model('Siswa_model')->getSiswaByNis($_POST['nis'])) {
                Flasher::setFlashMessage('danger', 'NIS sudah terdaftar!');
            } else {
                $awalTempo = date($_POST['tanggal_masuk']);
                $hasil = $this->model('Siswa_model')->addDataSiswa($_POST);

                if ($hasil['rowCount'] > 0) {
                    $hasilPembayaran = 0;
                    $idSiswa = $hasil['lastInsertId'];
                    $siswa = $this->model('Siswa_model')->getSiswaById($idSiswa);
                    $nisSiswa = $siswa['nis'];
                    $angkatan = $siswa['angkatan'];
                    $spp = $this->model('Spp_model')->getSppByAngkatan($angkatan);

                    $idSpp = $spp['id_spp'];

                    $indonesiaMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    for ($i = 0; $i < 36; $i++) {
                        $jatuhTempo = date('Y-m-d', strtotime("+$i month", strtotime($awalTempo)));
                        $bulan = $indonesiaMonths[date('n', strtotime($jatuhTempo)) - 1];
                        $tahun = date('Y', strtotime($jatuhTempo));

                        $pembayaran = $this->model('Pembayaran_model')->addDataPembayaran($nisSiswa, $jatuhTempo, $idSpp, $bulan, $tahun);

                        if ($i == 35) {
                            $hasilPembayaran = $pembayaran;
                        }
                    }

                    if ($hasilPembayaran > 0) {
                        Flasher::setFlashMessage('success', 'Data berhasil ditambahkan!');
                        header('Location: ' . BASEURL . '/siswa');
                        exit;
                    } else {
                        Flasher::setFlashMessage('danger', 'Data gagal ditambahkan!');
                        header('Location: ' . BASEURL . '/siswa');
                        exit;
                    }
                }
            }
        }

        // cek apakah data berhasil ditambahkan atau tidak
        // if ($this->model('Siswa_model')->addDataSiswa($_POST) > 0) {
        //     Flasher::setFlashMessage('success', 'Data berhasil ditambahkan!');
        //     header('Location: ' . BASEURL . '/siswa');
        //     exit;
        // } else {
        //     Flasher::setFlashMessage('failed', 'Data gagal ditambahkan!');
        //     header('Location: ' . BASEURL . '/siswa');
        //     exit;
        // }
    }

    public function getUpdate($nis)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data siswa!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // data
        $data['title'] = 'Update Siswa';

        // model
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, 'siswa');
        $this->view('siswa/page-update', $data);
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
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa update data siswa!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhadil diupdate atau tidak
        if ($this->model('Siswa_model')->updateDataSiswa($_POST) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil diupdate!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal diupdate!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function delete($nis)
    {
        // cek session
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && @$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Petugas tidak bisa menghapus data siswa!');
            header('Location: ' . BASEURL . '/pembayaran');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            Flasher::setFlashMessage('danger', 'Anda tidak memiliki akses ke halaman tersebut!');
            header('Location: ' . BASEURL . '/history');
            exit;
        }

        // cek apakah data berhasil dihapus atau tidak
        if ($this->model('Siswa_model')->deleteDataSiswa($nis) > 0) {
            Flasher::setFlashMessage('success', 'Data berhasil dihapus!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlashMessage('failed', 'Data gagal dihapus!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }
}
