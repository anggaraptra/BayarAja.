<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text">Home / <span>Data Kelas</span></h5>
    </div>

    <?php if ($data['kelas'] != null) : ?>
        <div class="content kelas">

            <?php if (@$_SESSION['level'] == 'admin') : ?>
                <div class="add">
                    <a href="<?= BASEURL ?>/kelas/formAdd" class="btn">Tambah Data</a>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Keterangan</th>

                        <?php if (@$_SESSION['level'] == 'admin') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <tr>
                            <td><?= $kelas['kelas']; ?></td>
                            <td><?= $kelas['keterangan']; ?></td>

                            <?php if (@$_SESSION['level'] == 'admin') : ?>
                                <td>
                                    <a href="<?= BASEURL; ?>/kelas/getUpdate/<?= $kelas['id_kelas']; ?>" class="btn">Update</a>
                                    <a href="<?= BASEURL; ?>/kelas/delete/<?= $kelas['id_kelas']; ?>" class="btn" onclick="return confirm('Yakin?');">Hapus</a>
                                </td>
                            <?php endif; ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content kelas">
            <h1 class="">Data Kelas Kosong</h1>
            <a href="<?= BASEURL; ?>/kelas/formAdd" class="btn">Tambah Data</a>
        </div>
    <?php endif; ?>

</section>