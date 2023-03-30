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

            <!-- Pagination -->
            <?php if ($data['totalData'] > 0) : ?>
                <div class="pagination">
                    <div class="left">
                        <?= $data['pagination']['startData'] + 1 ?>
                        <?php if ($data['pagination']['startData'] + 1 != $data['totalData']) : ?>
                            -
                            <?php if ($data['totalData'] < $data['pagination']['endData']) : ?>
                                <?= $data['totalData'] ?>
                            <?php else : ?>
                                <?= $data['pagination']['endData'] ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        dari <?= $data['totalData'] ?>
                        <?php if ($data['totalData'] < 2) : ?>
                            data
                        <?php else : ?>
                            data
                        <?php endif; ?>
                    </div>

                    <?php if ($data['pagination']['totalPage'] > 1) : ?>
                        <div class="right">
                            <ul class="pagination-list">
                                <?php if ($data['pagination']['totalPage'] >= 2) : ?>
                                    <!-- Prev btn -->
                                    <?php if ($data['pagination']['currentPage'] > 1) : ?>
                                        <li class="prev-btn">
                                            <a href="<?= BASEURL; ?>/history/page/<?= $data['pagination']['currentPage'] - 1; ?>" class="btn btn-prev">
                                                <span>&laquo;</span> Prev
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Prev btn -->

                                    <!-- Pagination Page -->
                                    <?php if ($data['pagination']['totalPage'] > 5) : ?>
                                        <?php
                                        $endPageNumber = $data['pagination']['endNumber'];
                                        $totalPage = $data['pagination']['totalPage'];

                                        if ($endPageNumber >= $totalPage) :
                                        ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/history/page/1">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/history/page/<?= $pageNumber; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/history/page/<?= $pageNumber; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/history/page/<?= $data['pagination']['totalPage']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Pagination Page -->

                                    <!-- Next btn -->
                                    <?php if ($data['pagination']['currentPage'] != $data['pagination']['totalPage']) : ?>
                                        <li class="next-btn">
                                            <a class="page-link" href="<?= BASEURL; ?>/history/page/<?= $data['pagination']['currentPage'] + 1; ?>" class="btn btn-next">
                                                Next <span>&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Next btn -->

                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <!-- End Pagination -->

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