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