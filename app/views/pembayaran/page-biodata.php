<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / Pembayaran SPP / <span>Biodata Siswa</span></h5>
    </div>

    <?php if ($data['siswa'] != null) : ?>
        <div class="content biodata">
            <table>
                <?php foreach ($data['siswa'] as $swa) : ?>
                    <tr>
                        <th>Nis</th>
                        <td><?= $swa['nis']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td><?= $swa['nama_siswa']; ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <?php foreach ($data['kelas'] as $kls) : ?>
                            <?php if ($kls['id_kelas'] == $swa['id_kelas']) : ?>
                                <td><?= $kls['kelas']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td><?= $swa['angkatan']; ?></td>
                    </tr>
                    <tr>
                        <th>Telp</th>
                        <td><?= $swa['telp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $swa['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Telp Ortu</th>
                        <td><?= $swa['telp_ortu']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="<?= BASEURL; ?>/pembayaran/tagihan/<?= $swa['nis']; ?>" class="btn">Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <div class="content biodata">
            <h1 class="head-text">Data tidak ditemukan.</h1>
        </div>
    <?php endif; ?>
</section>