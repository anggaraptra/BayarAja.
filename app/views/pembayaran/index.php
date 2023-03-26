<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Pembayaran SPP</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content pembayaran">
        <div class="search-box">
            <form action="<?= BASEURL; ?>/pembayaran/detail" method="POST">
                <input type="number" name="keyword" id="keyword" class="form-control" placeholder="Search NIS..." autocomplete="off" required maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                <button type="submit" name="cari" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <?php if (@$data['pembayaran']) : ?>
        <div class="content tunggakan">
            <h1>Tunggakan Bayar</h1>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Bulan</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['pembayaran'] as $pmbyr) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $pmbyr['nis']; ?></td>

                            <?php foreach ($data['siswa'] as $swa) : ?>
                                <?php if ($swa['nis'] == $pmbyr['nis']) : ?>
                                    <td><?= $swa['nama_siswa']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php foreach ($data['kelas'] as $kls) : ?>
                                <?php if ($kls['id_kelas'] == $pmbyr['id_kelas']) : ?>
                                    <td><?= $kls['kelas']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <td><?= $pmbyr['bulan']; ?> <?= $pmbyr['tahun'] ?></td>
                            <td><?= rupiah($pmbyr['jumlah_bayar']); ?></td>
                            <td><?= $pmbyr['keterangan']; ?></td>
                            <td class="aksi">
                                <a href="<?= BASEURL; ?>/pembayaran/formBayar/<?= $pmbyr['id_bayar']; ?>" class="btn btn-primary">Bayar</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>