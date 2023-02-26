<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / Pembayaran SPP / <span>Tagihan</span></h5>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content tagihan">
            <h1>Tagihan <?= $data['siswa']['nama_siswa']; ?></h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jatuh Tempo</th>
                        <th>Tahun</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>

                        <?php if (!@$_SESSION['nis']) : ?>
                            <th>Aksi</th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
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
                        <tr>
                            <td><?= $i; ?></td>

                            <td><?= $bulan; ?></td>

                            <td>10-<?= $bulanIndo[date('m', strtotime("+$i month", strtotime($awalTempo)))]; ?></td>

                            <td><?= $tahunAngkatan; ?></td>

                            <?php if (@$pembayaran) : ?>
                                <td><?= $pembayaran[0]['tanggal_bayar']; ?></td>
                                <td><?= $pembayaran[0]['jumlah_bayar']; ?></td>
                                <td><?= $pembayaran[0]['keterangan']; ?></td>
                            <?php else : ?>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            <?php endif; ?>

                            <?php if (!@$_SESSION['nis']) : ?>
                                <?php if (@$pembayaran) : ?>
                                    <td>
                                        <a href="">Cetak</a>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <a href="<?= BASEURL; ?>/pembayaran/formBayar/<?= $data['siswa']['nis']; ?>/<?= $bulan; ?>/<?= $tahunAngkatan; ?>">Bayar</a>
                                    </td>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content tagihan">
            <h1>Tagihan</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jatuh Tempo</th>
                        <th>Tahun</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7">Data tidak ditemukan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>