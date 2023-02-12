<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text">Home / <span>Data Siswa</span></h5>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content siswa">
            <div class="add">
                <a href="<?= BASEURL; ?>siswa/formAdd" class="btn btn-primary">Tambah Data</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Telp Ortu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['siswa'] as $siswa) : ?>
                        <tr>
                            <td><?= $siswa['nis']; ?></td>
                            <td><?= $siswa['nama_siswa']; ?></td>
                            <td><?= $siswa['id_kelas']; ?></td>
                            <td><?= $siswa['angkatan']; ?></td>
                            <td><?= $siswa['telp']; ?></td>
                            <td><?= $siswa['alamat']; ?></td>
                            <td><?= $siswa['telp_ortu']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>siswa/getUpdate/<?= $siswa['nis']; ?>" class="btn">Update</a>
                                <a href="<?= BASEURL; ?>siswa/delete/<?= $siswa['nis']; ?>" class="btn" onclick="return confirm('Yakin?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content">
            <h1 class="">Data Siswa Kosong</h1>
            <a href="<?= BASEURL; ?>siswa/formAdd" class="btn btn-primary">Tambah Data</a>
        </div>
    <?php endif; ?>
</section>