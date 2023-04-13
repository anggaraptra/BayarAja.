<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Tagihan</span></h5>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content tagihan">
            <div class="header-tagihan">
                <h1>Tagihan (<?= $data['siswa']['nama_siswa']; ?>)</h1>

                Tingkatan :
                <?php if ($data['pagination']['currentPage'] == 1) : ?>
                    kelas 1
                <?php elseif ($data['pagination']['currentPage'] == 2) : ?>
                    kelas 2
                <?php else : ?>
                    kelas 3
                <?php endif; ?>

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
                            <th></th>
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

                                <?php foreach ($data['spp'] as $spp) : ?>
                                    <?php if ($spp['id_spp'] == $pmbyr['id_spp']) : ?>
                                        <?php if ($spp['nominal'] == $pmbyr['jumlah_bayar']) : ?>
                                            <td><?= rupiah($pmbyr['jumlah_bayar']); ?></td>
                                        <?php elseif ($spp['nominal'] > $pmbyr['jumlah_bayar'] && $pmbyr['jumlah_bayar'] != null) : ?>
                                            <?php
                                            $jumlahBayar = $pmbyr['jumlah_bayar'];
                                            $nominal = $spp['nominal'];
                                            $sisaBayar = $nominal - $jumlahBayar;
                                            ?>
                                            <td>-<?= rupiah($sisaBayar); ?></td>
                                        <?php else : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($pmbyr['keterangan'] == null) : ?>
                                    <td>-</td>
                                <?php else : ?>
                                    <td><?= $pmbyr['keterangan']; ?></td>
                                <?php endif; ?>

                                <?php if (!@$_SESSION['nis']) : ?>
                                    <td>Aksi</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($data['totalData'] > 0) : ?>
                <div class="pagination page-kelas">

                    <?php if ($data['pagination']['totalPage'] > 1) : ?>
                        <div class="right">
                            <ul class="pagination-list">
                                <?php if ($data['pagination']['totalPage'] >= 2) : ?>

                                    <!-- Pagination Page -->
                                    <?php if ($data['pagination']['totalPage'] > 5) : ?>
                                        <?php
                                        $endPageNumber = $data['pagination']['endNumber'];
                                        $totalPage = $data['pagination']['totalPage'];

                                        if ($endPageNumber >= $totalPage) :
                                        ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/tagihanSiswa/1/<?= $data['siswa']['nis']; ?>">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/tagihanSiswa/<?= $pageNumber; ?>/<?= $data['siswa']['nis']; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/tagihanSiswa/<?= $pageNumber; ?>/<?= $data['siswa']['nis']; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/pembayaran/tagihanSiswa/<?= $data['pagination']['totalPage']; ?>/<?= $data['siswa']['nis']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Pagination Page -->

                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <!-- End Pagination -->

        </div>
    <?php endif; ?>
</section>