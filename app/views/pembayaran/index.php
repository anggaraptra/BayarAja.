<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / <span>Pembayaran SPP</span></h5>
    </div>

    <?php Flasher::flashLogin(); ?>

    <div class="content pembayaran">
        <form action="<?= BASEURL; ?>/pembayaran/biodata" method="POST" class="">
            <input class="" type="search" placeholder="Search nis" name="keyword" id="keyword" autocomplete="off" required>
        </form>

        <div class="history">
            <h1>Pembayaran Terakhir</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id Bayar</th>
                    <th>Nama Petugas</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['pembayaran'] as $history) : ?>
                    <tr>
                        <td><?= $history['id_bayar']; ?></td>

                        <?php foreach ($data['pegawai'] as $ptg) : ?>
                            <?php if ($ptg['id_pegawai'] == $history['id_pegawai']) : ?>
                                <td><?= $ptg['nama_pegawai']; ?></td>
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
                        <td>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>