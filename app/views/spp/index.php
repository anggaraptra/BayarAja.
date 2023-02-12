<section class="home">
    <div class="page-title">
        <h1 class="head-text">SPP</h1>
        <h5 class="sub-text">Home / <span>Data Spp</span></h5>
    </div>

    <?php if ($data['spp'] != null) : ?>
        <div class="content spp">
            <div class="add">
                <a href="<?= BASEURL; ?>spp/formAdd" class="btn btn-primary">Tambah Data</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['spp'] as $spp) : ?>
                        <tr>
                            <td><?= $spp['angkatan']; ?></td>
                            <td><?= $spp['nominal']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>spp/getUpdate/<?= $spp['id_angkatan']; ?>" class="btn">Update</a>
                                <a href="<?= BASEURL; ?>spp/delete/<?= $spp['id_angkatan']; ?>" class="btn" onclick="return confirm('Yakin?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="content spp">
            <h1 class="">Data Spp Kosong</h1>
            <a href="<?= BASEURL; ?>spp/formAdd" class="btn">Tambah Data</a>
        </div>
    <?php endif; ?>
</section>