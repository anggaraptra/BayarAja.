<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Data Siswa</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content siswa">

            <?php if (@$_SESSION['level'] == 'admin') : ?>
                <div class="add">
                    <a href="<?= BASEURL; ?>/siswa/formAdd" class="btn btn-primary">
                        <i class="icon"><?= ADD; ?></i>
                        Tambah Data
                    </a>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tanggal Masuk</th>
                        <th>Angkatan</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Telp Ortu</th>

                        <?php if (@$_SESSION['level'] == 'admin') : ?>
                            <th></th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['siswa'] as $siswa) : ?>
                        <tr>
                            <td><?= $siswa['nis']; ?></td>
                            <td><?= $siswa['nama_siswa']; ?></td>

                            <?php foreach ($data['kelas'] as $kls) : ?>
                                <?php if ($kls['id_kelas'] == $siswa['id_kelas']) : ?>
                                    <td><?= $kls['kelas']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <td><?= $siswa['tanggal_masuk']; ?></td>
                            <td><?= $siswa['angkatan']; ?></td>
                            <td><?= $siswa['telp']; ?></td>
                            <td><?= $siswa['alamat']; ?></td>
                            <td><?= $siswa['telp_ortu']; ?></td>

                            <?php if (@$_SESSION['level'] == 'admin') : ?>
                                <td class="aksi">
                                    <a href="<?= BASEURL; ?>/siswa/getUpdate/<?= $siswa['nis']; ?>" class="btn"><i class="icon"><?= UPLOAD; ?></i></a>
                                    <a href="<?= BASEURL; ?>/siswa/delete/<?= $siswa['nis']; ?>" class="btn btn-delete" onclick="return confirm('Yakin?');"><i class="icon"><?= TRASH; ?></i></a>
                                </td>
                            <?php endif; ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
                                            <a href="<?= BASEURL; ?>/siswa/page/<?= $data['pagination']['currentPage'] - 1; ?>" class="btn btn-prev">
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
                                                <a class="page-link" href="<?= BASEURL; ?>/siswa/page/1">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/siswa/page/<?= $pageNumber; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/siswa/page/<?= $pageNumber; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/siswa/page/<?= $data['pagination']['totalPage']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Pagination Page -->

                                    <!-- Next btn -->
                                    <?php if ($data['pagination']['currentPage'] != $data['pagination']['totalPage']) : ?>
                                        <li class="next-btn">
                                            <a class="page-link" href="<?= BASEURL; ?>/siswa/page/<?= $data['pagination']['currentPage'] + 1; ?>" class="btn btn-next">
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

        </div>
    <?php else : ?>
        <div class="content content-null siswa">
            <h1 class="">Data Siswa Kosong!</h1>
            <a href="<?= BASEURL; ?>/siswa/formAdd" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Tambah Data
            </a>
        </div>
    <?php endif; ?>
</section>