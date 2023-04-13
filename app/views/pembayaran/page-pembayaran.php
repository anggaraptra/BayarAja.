<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Bayar</span></h5>
    </div>

    <div class="content form-bayar bayar">
        <form action="<?= BASEURL; ?>/pembayaran/bayar/<?= $data['pembayaran']['id_bayar']; ?>" method="POST">
            <input type="hidden" name="id_bayar" value="<?= $data['pembayaran']['id_bayar']; ?>">
            <input type="hidden" name="nis" value="<?= $data['siswa']['nis']; ?>">

            <div class="input-group">
                <label for="">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?= $data['siswa']['nama_siswa']; ?>" readonly>
            </div>

            <div class="input-group">
                <label for="bulan">Bulan</label>
                <input type="text" name="bulan" class="form-control" value="<?= $data['pembayaran']['bulan']; ?> <?= $data['pembayaran']['tahun']; ?>" readonly>
            </div>

            <div class="input-group">
                <label for="tahun">Tanggal</label>
                <input type="date" name="tanggal_bayar" class="form-control" id="tanggal" value="<?= date('Y-m-d') ?>" readonly>
            </div>

            <div class="input-group">
                <label for="jumlah">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" id="jumlah" class="form-control" placeholder="<?php if ($data['pembayaran']['jumlah_bayar'] == null) : ?>Nominal : <?= rupiah($data['spp']['nominal']); ?><?php else : ?>Tunggakan : <?= rupiah($data['spp']['nominal']); ?> <?php endif; ?>" required>
            </div>

            <button type="submit" name="bayar" class="btn">Bayar</button>
        </form>
    </div>
</section>