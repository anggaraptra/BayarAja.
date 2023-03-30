<section class="home">
    <div class="page-title">
        <h1 class="head-text">Dashboard</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content dashboard">
        <div class="container-info">
            <h1>Selamat <span id="ucapan"></span>, <?= $_SESSION['level']; ?>!</h1>
        </div>

        <div class="container-card">
            <div class="card">
                <div class="card-header">
                    <img src="<?= BASEURL; ?>/assets/images/user.png" alt="">
                    <h1>Jumlah Siswa</h1>
                </div>
                <div class="card-body">
                    <h1><?= $data['siswaRow']; ?></h1>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <img src="<?= BASEURL; ?>/assets/images/pay.png" alt="">
                    <h1>Jumlah Transaksi</h1>
                </div>
                <div class="card-body">
                    <h1><?= $data['detailRow']; ?></h1>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <img src="<?= BASEURL; ?>/assets/images/clock.png" alt="">
                    <h1>Jam</h1>
                </div>
                <div class="card-body">
                    <h1 id="jam"></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content transaksi">
        <h1>Transaksi Terbaru</h1>
        <?php if ($data['detail']) : ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
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
                        <?php $pembayaran = $this->model('Pembayaran_model')->getPembayaranById($history['id_bayar']); ?>
                        <?php $siswa = $this->model('Siswa_model')->getSiswaByNis($pembayaran['nis']); ?>
                        <?php $pegawai = $this->model('Pegawai_model')->getPegawaiById($history['id_pegawai']); ?>

                        <tr>
                            <?php if ($pegawai['id_pegawai'] == $history['id_pegawai']) : ?>
                                <td><?= $pegawai['nama_lengkap']; ?></td>
                            <?php endif; ?>

                            <?php if ($pembayaran['id_bayar'] == $history['id_bayar']) : ?>
                                <td><?= $pembayaran['nis']; ?></td>
                            <?php endif; ?>

                            <?php if ($pembayaran['nis'] == $siswa['nis']) : ?>
                                <td><?= $siswa['nama_siswa']; ?></td>
                            <?php endif; ?>

                            <?php if ($history['id_bayar'] == $pembayaran['id_bayar']) : ?>
                                <td><?= $pembayaran['bulan'] ?> <?= $pembayaran['tahun']; ?></td>
                            <?php endif; ?>

                            <?php if ($history['id_bayar'] == $pembayaran['id_bayar']) : ?>
                                <td><?= $history['tanggal_bayar']; ?></td>
                            <?php endif; ?>

                            <?php if ($history['id_bayar'] == $pembayaran['id_bayar']) : ?>
                                <td><?= rupiah($history['total_bayar']); ?></td>
                            <?php endif; ?>

                            <?php if ($history['id_bayar'] == $pembayaran['id_bayar']) : ?>
                                <td><?= rupiah($history['kembalian']); ?></td>
                            <?php endif; ?>

                            <?php if ($history['id_bayar'] == $pembayaran['id_bayar']) : ?>
                                <td><?= $pembayaran['keterangan']; ?></td>
                            <?php endif; ?>

                            <td class="aksi">
                                <a target="_blank" href="<?= BASEURL; ?>/history/cetak/<?= $history['id_detail']; ?>" class="btn">
                                    <i class="icon"><?= PRINTER; ?></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="content content-null transaksi">
                <h1 class="">Tidak Ada Transaksi!</h1>
                <a href="<?= BASEURL; ?>/pembayaran" class="btn btn-primary">
                    <i class="icon"><?= ADD; ?></i>
                    Pembayaran
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>