<section class="home">
    <div class="page-title">
        <h1 class="head-text">Biodata</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Biodata Siswa</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content biodata-siswa">
        <?php if ($data['siswa'] != null) : ?>
            <table class="table table-hover">
                <tr>
                    <th>Nis</th>
                    <td><?= $data['siswa']['nis']; ?></td>
                </tr>
                <tr>
                    <th>Nama Siswa</th>
                    <td><?= $data['siswa']['nama_siswa']; ?></td>
                </tr>

                <?php foreach ($data['kelas'] as $kls) : ?>
                    <?php if ($data['siswa']['id_kelas'] == $kls['id_kelas']) : ?>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $kls['kelas']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                    <th>Angkatan</th>
                    <td><?= $data['siswa']['angkatan']; ?></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><?= $data['siswa']['telp']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $data['siswa']['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Telepon Ortu</th>
                    <td><?= $data['siswa']['telp_ortu']; ?></td>
                </tr>
            </table>
            <a href="<?= BASEURL; ?>/pembayaran/detail/<?= $data['siswa']['nis']; ?>">Details</a>
        <?php else : ?>
            <div class="content content-null biodata-siswa">
                <h1 class="">Biodata siswa tidak ditemukan.</h1>
            </div>
        <?php endif; ?>
    </div>
</section>