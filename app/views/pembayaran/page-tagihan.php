<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Tagihan</span></h5>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content tagihan">
            <div class="header-tagihan">
                <h1>Tagihan (<?= $data['siswa']['nama_siswa']; ?>)</h1>

                <?php foreach ($data['spp'] as $spp) : ?>
                    <?php if ($spp['id_spp'] == $data['pembayaran'][0]['id_spp']) : ?>
                        <h1>Nominal <?= rupiah($spp['nominal']); ?></h1>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jatuh Tempo</th>
                        <th>Tahun</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>

                        <?php if (!@$_SESSION['nis']) : ?>
                            <th>Aksi</th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php if ($data['pembayaran'] != null) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($data['pembayaran'] as $pmbyr) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pmbyr['bulan']; ?></td>
                                <td><?= $pmbyr['jatuh_tempo']; ?></td>
                                <td><?= $pmbyr['tahun']; ?></td>
                                <td><?= rupiah($pmbyr['jumlah_bayar']); ?></td>
                                <td><?= $pmbyr['keterangan']; ?></td>

                                <?php if (!@$_SESSION['nis']) : ?>
                                    <td>Aksi</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else :  ?>
                        <tr>
                            <td colspan="7">Data pembayaran kosong!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content tagihan">
            <h1>Tagihan ...</h1>
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