<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Detail Siswa</span></h5>
    </div>

    <!-- Biodata -->
    <?php if ($data['siswa'] != null) : ?>
        <div class="content biodata">
            <table class="table table-hover">
                <?php foreach ($data['siswa'] as $swa) : ?>
                    <tr>
                        <th>Nis</th>
                        <td><?= $swa['nis']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td><?= $swa['nama_siswa']; ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><?= $swa['kelas']; ?></td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td><?= $swa['angkatan']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?= $swa['telp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $swa['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon Ortu</th>
                        <td><?= $swa['telp_ortu']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <div class="content biodata">
            <h1 class="head-text">Biodata tidak ditemukan.</h1>
        </div>
    <?php endif; ?>

    <!-- Tagihan -->
    <?php if ($data['siswa'] != null) : ?>
        <div class="content tagihan">
            <?php foreach ($data['siswa'] as $swa) : ?>
                <h1>Tagihan (<?= $swa['nama_siswa']; ?>)</h1>
            <?php endforeach; ?>
            <table class="table table-striped table-hover">
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
                            <th></th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pembayaran'] as $pmb) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pmb['bulan_bayar']; ?></td>
                            <td><?= $pmb['jatuh_tempo']; ?></td>
                            <td><?= $pmb['tahun_bayar']; ?></td>
                            <td></td>
                            <td><?= $pmb['jumlah_bayar']; ?></td>
                            <td><?= $pmb['keterangan']; ?></td>

                            <?php if (!@$_SESSION['nis']) : ?>
                                <?php if ($pmb['jumlah_bayar'] == null) : ?>
                                    <td><a href="<?= BASEURL; ?>/pembayaran/formBayar/<?= $pmb['id_bayar']; ?>" class="btn btn-success">Bayar</a></td>
                                <?php elseif ($pmb['keterangan'] === 'belum lunas' && $pmb['sisa_bayar'] !== 0) : ?>
                                    <td><a href="<?= BASEURL; ?>/pembayaran/formBayar/<?= $pmb['id_bayar']; ?>" class="btn btn-success">Lunasi</a></td>
                                <?php else : ?>
                                    <td><a href="" class="btn btn-success">Cetak</a></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
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
                        <td colspan="7">Data tagihan kosong</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>