<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text">Home / <span>Data Pegawai</span></h5>
    </div>

    <?php Flasher::flash() ?>

    <?php if ($data['pegawai'] != null) : ?>
        <div class="content pegawai">
            <div class="add">
                <a href="<?= BASEURL; ?>/pegawai/formAdd" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Telepon</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['pegawai'] as $pegawai) : ?>
                        <tr>
                            <td><?= $pegawai['nama_pegawai']; ?></td>
                            <td><?= $pegawai['telp']; ?></td>
                            <td><?= $pegawai['username']; ?></td>
                            <td><?= $pegawai['level']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/pegawai/getUpdate/<?= $pegawai['id_pegawai']; ?>" class="btn">Update</a>
                                <a href="<?= BASEURL; ?>/pegawai/delete/<?= $pegawai['id_pegawai']; ?>" class="btn" onclick="return confirm('Yakin?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content pegawai">
            <h1 class="">Data Pegawai Kosong</h1>
            <a href="<?= BASEURL; ?>/pegawai/formAdd" class="btn btn-primary">Tambah Data</a>
        </div>
    <?php endif; ?>
</section>