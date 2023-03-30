<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Detail Siswa</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <!-- Biodata -->
    <?php if ($data['siswa'] != null) : ?>
        <div class="content biodata">
            <table class="table table-hover">
                <tr>
                    <th>Nis</th>
                    <td><?= $data['siswa']['nis']; ?></td>
                </tr>

                <tr>
                    <th>Nama Siswa</th>
                    <td><?= $data['siswa']['nama_siswa']; ?></td>
                </tr>

                <?php foreach ($data['kelas'] as $kls) : ?>
                    <?php if ($data['siswa']['id_kelas'] == $kls['id_kelas']) : ?>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $kls['kelas']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

                <tr>
                    <th>Angkatan</th>
                    <td><?= $data['siswa']['angkatan']; ?></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><?= $data['siswa']['telp']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $data['siswa']['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Telepon Ortu</th>
                    <td><?= $data['siswa']['telp_ortu']; ?></td>
                </tr>

                <?php if ($data['pagination']['currentPage'] == 1) : ?>
                    <tr>
                        <th>Tingkatan</th>
                        <td>Kelas 1</td>
                    </tr>
                <?php elseif ($data['pagination']['currentPage'] == 2) : ?>
                    <tr>
                        <th>Tingkatan</th>
                        <td>Kelas 2</td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <th>Tingkatan</th>
                        <td>Kelas 3</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>
    <?php endif; ?>

    <!-- Tagihan -->
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
                            <th></th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pembayaran'] as $pmb) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pmb['bulan']; ?></td>
                            <td><?= $pmb['jatuh_tempo']; ?></td>
                            <td><?= $pmb['tahun']; ?></td>
                            <td><?= rupiah($pmb['jumlah_bayar']); ?></td>
                            <td><?= $pmb['keterangan']; ?></td>

                            <?php if (!@$_SESSION['nis']) : ?>
                                <?php if ($pmb['jumlah_bayar'] == null || $pmb['keterangan'] === 'belum lunas' && $pmb['sisa_bayar'] !== 0) : ?>
                                    <td class="aksi"><a href="<?= BASEURL; ?>/pembayaran/formBayar/<?= $pmb['id_bayar']; ?>" class="btn btn-success">Bayar</a></td>
                                <?php else : ?>
                                    <td class="aksi"><a href="<?= BASEURL; ?>/history" class="btn btn-success"><i class="icon"><?= HISTORY; ?></i></a></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
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
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/detail/1/<?= $data['siswa']['nis']; ?>">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/detail/<?= $pageNumber; ?>/<?= $data['siswa']['nis']; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/pembayaran/detail/<?= $pageNumber; ?>/<?= $data['siswa']['nis']; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/pembayaran/detail/<?= $data['pagination']['totalPage']; ?>/<?= $data['siswa']['nis']; ?>"><?= $data['pagination']['totalPage']; ?></a>
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
    <?php else : ?>
        <div class="content content-null tagihan">
            <h1 class="">Biodata dan Tagihan tidak ditemukan!</h1>
            <a href="<?= BASEURL; ?>/pembayaran" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Pembayaran
            </a>
        </div>
    <?php endif; ?>
</section>