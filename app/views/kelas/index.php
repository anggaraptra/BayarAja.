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

            <div class="pagination"></div>
        </div>
    <?php else : ?>
        <div class="content content-null kelas">
            <h1 class="">Data Kelas Kosong</h1>
            <a href="<?= BASEURL; ?>/kelas/formAdd" class="btn btn-primary">
                <i class="icon"><?= ADD; ?></i>
                Tambah Data
            </a>
        </div>
    <?php endif; ?>

</section>