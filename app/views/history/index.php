<section class="home">
    <div class="page-title">
        <h1 class="head-text">History</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>History Pembayaran</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <?php if ($data['detail']) : ?>
        <div class="content history">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
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
                        <?php $kelas = $this->model('Kelas_model')->getKelasById($siswa['id_kelas']); ?>

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

                            <?php if ($siswa['id_kelas'] == $kelas['id_kelas']) : ?>
                                <td><?= $kelas['kelas']; ?></td>
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
                                <a target="_blank" href="<?= BASEURL; ?>/history/cetak/<?= $history['id_detail']; ?>" class="btn btn-primary">
                                    <i class="icon"><?= PRINTER; ?></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content content-null history">
            <h1 class="">Tidak Ada Data!</h1>
            <a href="<?= BASEURL; ?>/pembayaran" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Pembayaran
            </a>
        </div>
    <?php endif; ?>
</section>