<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pembayaran">Pembayaran SPP</a> / <span>Bayar</span></h5>
    </div>

    <div class="content bayar">
        <form action="<?= BASEURL; ?>/pembayaran/bayar/<?= $data['pembayaran']['id_bayar']; ?>" method="POST">
            <input type="hidden" name="id_bayar" value="<?= $data['pembayaran']['id_bayar']; ?>">

            <div class="input-group">
                <label for="">Nama Siswa</label>
                <input type="text" name="nama_siswa" value="<?= $data['siswa']['nama_siswa']; ?>" readonly>
            </div>

            <div class="input-group">
                <label for="bulan">Bulan</label>
                <input type="text" name="bulan_bayar" name="bulan_bayar" value="<?= $data['pembayaran']['bulan_bayar']; ?>" readonly>
            </div>

            <div class="input-group">
                <label for="tahun">Tanggal</label>
                <input type="date" name="tanggal_bayar" id="tanggal" value="<?= date('Y-m-d') ?>" readonly>
            </div>

            <div class="input-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah_bayar" id="jumlah" placeholder="Masukan jumlah bayar" required>
            </div>

            <button type="submit" name="bayar">Bayar</button>
        </form>
    </div>
</section>