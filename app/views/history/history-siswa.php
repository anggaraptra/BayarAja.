<section class="home">
    <div class="page-title">
        <h1 class="head-text">History</h1>
        <h5 class="sub-text"><a href="">Home</a> / <span>History Pembayaran (<?= $_SESSION['nama']; ?>)</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content history">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Petugas</th>
                    <th>Bulan</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Kembalian</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['detail'] as $history) : ?>
                    <tr>
                        <?php foreach ($data['pegawai'] as $p) : ?>
                            <?php if ($p['id_pegawai'] == $history['id_pegawai']) : ?>
                                <td><?= $p['nama_lengkap']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $history['bulan']; ?> <?= $history['tahun']; ?></td>
                        <td><?= $history['tanggal_bayar']; ?></td>
                        <td><?= rupiah($history['total_bayar']); ?></td>
                        <td><?= rupiah($history['kembalian']); ?></td>
                        <td><?= $history['keterangan']; ?></td>
                        <td class="aksi">
                            <a target="_blank" href="<?= BASEURL; ?>/history/cetak/<?= $history['id_detail']; ?>" class="btn">
                                <i class="icon"><?= PRINTER; ?></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>