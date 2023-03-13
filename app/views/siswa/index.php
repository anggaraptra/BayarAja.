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

                            <td><?= $siswa['kelas']; ?></td>

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