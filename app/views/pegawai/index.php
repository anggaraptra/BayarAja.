<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Data Pegawai</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <?php if ($data['pegawai'] != null) : ?>
        <div class="content pegawai">

            <div class="add">
                <a href="<?= BASEURL; ?>/pegawai/formAdd" class="btn btn-primary">
                    <i class="icon"><?= ADD; ?></i>
                    Tambah Data
                </a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Telepon</th>
                        <th>Username</th>
                        <th>Level Pegawai</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['pegawai'] as $pegawai) : ?>
                        <tr>
                            <td><?= $pegawai['nama_lengkap']; ?></td>
                            <td><?= $pegawai['telp']; ?></td>
                            <td class="username"><?= $pegawai['username']; ?></td>
                            <td><?= $pegawai['level']; ?></td>
                            <td class="aksi">
                                <a href="<?= BASEURL; ?>/pegawai/getUpdate/<?= $pegawai['id_pegawai']; ?>" class="btn"><i class="icon"><?= UPLOAD; ?></i></a>
                                <a href="<?= BASEURL; ?>/pegawai/delete/<?= $pegawai['id_pegawai']; ?>" class="btn btn-delete" onclick="return confirm('Yakin?');"><i class="icon"><?= TRASH; ?></i></a>
                            </td>
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
                                            <a href="<?= BASEURL; ?>/pegawai/page/<?= $data['pagination']['currentPage'] - 1; ?>" class="btn btn-prev">
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
                                                <a class="page-link" href="<?= BASEURL; ?>/pegawai/page/1">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/pegawai/page/<?= $pageNumber; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/pegawai/page/<?= $pageNumber; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/pegawai/page/<?= $data['pagination']['totalPage']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Pagination Page -->

                                    <!-- Next btn -->
                                    <?php if ($data['pagination']['currentPage'] != $data['pagination']['totalPage']) : ?>
                                        <li class="next-btn">
                                            <a class="page-link" href="<?= BASEURL; ?>/pegawai/page/<?= $data['pagination']['currentPage'] + 1; ?>" class="btn btn-next">
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
        <div class="content content-null pegawai">
            <h1 class="">Data Pegawai Kosong!</h1>
            <a href="<?= BASEURL; ?>/pegawai/formAdd" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Tambah Data
            </a>
        </div>
    <?php endif; ?>
</section>