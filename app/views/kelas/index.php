<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Data Kelas</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <?php if ($data['kelas'] != null) : ?>
        <div class="content kelas">

            <?php if (@$_SESSION['level'] == 'admin') : ?>
                <div class="add">
                    <a href="<?= BASEURL ?>/kelas/formAdd" class="btn">
                        <i class="icon"><?= ADD; ?></i>
                        Tambah Data
                    </a>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Keterangan</th>

                        <?php if (@$_SESSION['level'] == 'admin') : ?>
                            <th></th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <tr>
                            <td class="nama-kelas"><?= $kelas['kelas']; ?></td>
                            <td><?= $kelas['keterangan']; ?></td>

                            <?php if (@$_SESSION['level'] == 'admin') : ?>
                                <td class="aksi">
                                    <a href="<?= BASEURL; ?>/kelas/getUpdate/<?= $kelas['id_kelas']; ?>" class="btn"><i class="icon"><?= UPLOAD; ?></i></a>
                                    <a href="<?= BASEURL; ?>/kelas/delete/<?= $kelas['id_kelas']; ?>" class="btn btn-delete" onclick="return confirm('Yakin?');"><i class="icon"><?= TRASH; ?></i></a>
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
                                            <a href="<?= BASEURL; ?>/kelas/page/<?= $data['pagination']['currentPage'] - 1; ?>" class="btn btn-prev">
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
                                                <a class="page-link" href="<?= BASEURL; ?>/kelas/page/1">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php for ($pageNumber = $data['pagination']['startNumber']; $pageNumber <= $data['pagination']['endNumber']; $pageNumber++) : ?>
                                        <?php if ($pageNumber == $data['pagination']['currentPage']) : ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?= BASEURL; ?>/kelas/page/<?= $pageNumber; ?>" class="btn btn-active"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?= BASEURL; ?>/kelas/page/<?= $pageNumber; ?>"><?= $pageNumber; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($data['pagination']['endNumber'] != $data['pagination']['totalPage']) : ?>
                                        <li class="page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL; ?>/kelas/page/<?= $data['pagination']['totalPage']; ?>"><?= $data['pagination']['totalPage']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End Pagination Page -->

                                    <!-- Next btn -->
                                    <?php if ($data['pagination']['currentPage'] != $data['pagination']['totalPage']) : ?>
                                        <li class="next-btn">
                                            <a class="page-link" href="<?= BASEURL; ?>/kelas/page/<?= $data['pagination']['currentPage'] + 1; ?>" class="btn btn-next">
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
        <div class="content content-null kelas">
            <h1 class="">Data Kelas Kosong!</h1>
            <a href="<?= BASEURL; ?>/kelas/formAdd" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Tambah Data
            </a>
        </div>
    <?php endif; ?>

</section>