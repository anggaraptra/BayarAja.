<section class="home">
    <div class="page-title">
        <h1 class="head-text">History</h1>
        <h5 class="sub-text"><a href="">Home</a> / <span>History Pembayaran (<?= $_SESSION['nama']; ?>)</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

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
                                        <a href="<?= BASEURL; ?>/history/siswa/<?= $data['pagination']['currentPage'] - 1; ?>/<?= $_SESSION['nis']; ?>" class="btn btn-prev">
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
                                            <a class="page-link" href="<?= BASEURL; ?>/history/siswa/1/<?= $_SESSION['nis']; ?>">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                    <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="<?= BASEURL; ?>/history/siswa/<?= $pageNumber; ?>/<?= $_SESSION['nis']; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                        </li>
                                    <?php else : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/history/siswa/<?= $pageNumber; ?>/<?= $_SESSION['nis']; ?>"><?= $pageNumber; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= BASEURL; ?>/history/siswa/<?= $data['pagination']['totalPage']; ?>/<?= $_SESSION['nis']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                    </li>
                                <?php endif; ?>
                                <!-- End Pagination Page -->

                                <!-- Next btn -->
                                <?php if ($data['pagination']['currentPage'] != $data['pagination']['totalPage']) : ?>
                                    <li class="next-btn">
                                        <a class="page-link" href="<?= BASEURL; ?>/history/siswa/<?= $data['pagination']['currentPage'] + 1; ?>/<?= $_SESSION['nis']; ?>" class="btn btn-next">
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