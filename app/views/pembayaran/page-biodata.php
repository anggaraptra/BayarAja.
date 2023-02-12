<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / Pembayaran SPP / <span>Biodata Siswa</span></h5>
    </div>

    <div class="content biodata">
        <table>
            <thead>
                <td>Nis</td>
                <td>Nama Siswa</td>
                <td>Id Kelas</td>
                <td>Angkatan</td>
                <td>Telp</td>
                <td>Alamat</td>
                <td>Telp Ortu</td>
            </thead>
            <?php foreach ($data['siswa'] as $swa) : ?>
                <tbody>
                    <td><?= $swa['nis']; ?></td>
                    <td><?= $swa['nama_siswa']; ?></td>
                    <td><?= $swa['id_kelas']; ?></td>
                    <?php foreach ($data['spp'] as $spp) : ?>
                        <?php if ($swa['id_angkatan'] == $spp['id_angkatan']) : ?>
                            <td><?= $spp['angkatan']; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?> <td><?= $swa['telp']; ?></td>
                    <td><?= $swa['alamat']; ?></td>
                    <td><?= $swa['telp_ortu']; ?></td>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</section>