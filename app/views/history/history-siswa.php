<section class="home">
    <div class="page-title">
        <h1 class="head-text">History</h1>
        <h5 class="sub-text">Home / <span>History Pembayaran (<?= $_SESSION['nama']; ?>)</span></h5>
    </div>

    <div class="content history">
        <table class="table">
            <thead>
                <tr>
                    <th>Id Bayar</th>
                    <th>Nama Petugas</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['pembayaran'] as $history) : ?>
                    <tr>
                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $history['id_bayar']; ?></td>
                        <?php endif; ?>

                        <?php foreach ($data['pegawai'] as $ptg) : ?>
                            <?php if ($ptg['id_pegawai'] == $history['id_pegawai'] && $data['siswa']['nis'] == $history['nis']) : ?>
                                <td><?= $ptg['nama_pegawai']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $data['siswa']['nis']; ?></td>
                        <?php endif; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $data['siswa']['nama_siswa']; ?></td>
                        <?php endif; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $history['tanggal_bayar']; ?></td>
                        <?php endif; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $history['bulan_bayar']; ?></td>
                        <?php endif; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td><?= $history['jumlah_bayar']; ?></td>
                        <?php endif; ?>

                        <?php if ($data['siswa']['nis'] == $history['nis']) : ?>
                            <td>
                                <button>Cetak</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>