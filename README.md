<!-- Jika di dalam folder ini tidak terdapat index, jangan tampilkan isi foldernya, dan block aksesnya -->

1. menambahkan registrasi
2. menambahkan pagination
3. menambahkan 3 tahun page bayar
4. membuat style css

<?php
                    $awalTempo = date("Y-00-d");
                    $bulanIndo = [
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'
                    ];

                    for ($i = 1; $i < 13; $i++) :
                        $jatuhTempo = date("Y-m-d", strtotime("+$i month", strtotime($awalTempo)));
                        $tahunAngkatan = $data['siswa']['angkatan'];

                        $tanggal = date("Y-m-d");
                        $bulan = $bulanIndo[date("m", strtotime($jatuhTempo))];

                        $nis = $data['siswa']['nis'];

                        $pembayaran = $this->model('Pembayaran_model')->getPembayaranByNisAndMonth($nis, $bulan);

                    ?>

// public function biodata()
// {
// // cek session login
// if (!@$\_SESSION['login']) {
// header('Location: ' . BASEURL . '/login');
// exit;
// }

    //     if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
    //         header('Location: ' . BASEURL . '/pembayaran/tagihan/' . $_SESSION['nis']);
    //         exit;
    //     }

    //     // data
    //     $data['title'] = 'Biodata Siswa';
    //     $status = [
    //         'dashboard' => '',
    //         'kelas' => '',
    //         'siswa' => '',
    //         'pegawai' => '',
    //         'spp' => '',
    //         'pembayaran' => 'active',
    //         'history' => '',
    //         'laporan' => ''
    //     ];

    //     // model
    //     $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
    //     $data['siswa'] = $this->model('Siswa_model')->searchDataSiswa();
    //     $data['spp'] = $this->model('Spp_model')->getAllSpp();

    //     // view
    //     $this->view('templates/header', $data);
    //     $this->view('templates/navsidebar', $data, $status);
    //     $this->view('pembayaran/page-biodata', $data);
    //     $this->view('templates/footer');
    // }

    // public function tagihan($nis = null)
    // {
    //     // cek session login
    //     if (!@$_SESSION['login']) {
    //         header('Location: ' . BASEURL . '/login');
    //         exit;
    //     }

    //     if (@$_SESSION['nis']) {
    //         header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
    //         exit;
    //     }

    //     if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
    //         header('Location: ' . BASEURL . '/pembayaran/tagihanSiswa/' . $_SESSION['nis'] . '');
    //         exit;
    //     }

    //     // data
    //     $data['title'] = 'Tagihan Siswa';
    //     $status = [
    //         'dashboard' => '',
    //         'kelas' => '',
    //         'siswa' => '',
    //         'pegawai' => '',
    //         'spp' => '',
    //         'pembayaran' => 'active',
    //         'history' => '',
    //         'laporan' => ''
    //     ];

    //     // model
    //     $data['siswa'] = $this->model('Siswa_model')->getSiswaByNis($nis);

    //     // view
    //     $this->view('templates/header', $data);
    //     $this->view('templates/navsidebar', $data, $status);
    //     $this->view('pembayaran/page-tagihan', $data);
    //     $this->view('templates/footer');
    // }

<!-- HISTORY -->
<?php foreach ($data['pegawai'] as $ptg) : ?>

                            <?php if ($ptg['id_pegawai'] == $history['id_pegawai']) : ?>
                                <td><?= $ptg['nama_lengkap']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $history['nis']; ?></td>

                        <?php foreach ($data['siswa'] as $swa) : ?>
                            <?php if ($swa['nis'] == $history['nis']) : ?>
                                <td><?= $swa['nama_siswa']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $history['tanggal_bayar']; ?></td>
                        <td><?= $history['jumlah_bayar']; ?></td>
                        <td class="aksi">
                            <a href="" class="btn">Cetak</a>
                        </td>
