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
        $data['kelasRow'] = $this->model('Kelas_model')->getAllDataKelas();
        $data['sppRow'] = $this->model('Spp_model')->getAllDataSpp();

        if ($data['kelasRow'] == 0) {
            Flasher::setFlashMessage('danger', 'Data kelas kosong, silahkan tambah data kelas terlebih dahulu!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }

        if ($data['sppRow'] == 0) {
            Flasher::setFlashMessage('danger', 'Data spp kosong, silahkan tambah data spp terlebih dahulu!');
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }

        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['spp'] = $this->model('Spp_model')->getAllSpp();
        $data['siswa'] = $this->model('Siswa_model')->getLastSiswa();

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
                header('Location: ' . BASEURL . '/siswa/formAdd');
                exit;
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
                        Flasher::setFlashMessage('failed', 'Data gagal ditambahkan!');
                        header('Location: ' . BASEURL . '/siswa');
                        exit;
                    }
                }
            }
        }
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

        // cek apakah data berhasil diupdate atau tidak
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
