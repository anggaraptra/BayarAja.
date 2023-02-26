<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / Pembayaran SPP / <span>Bayar</span></h5>
    </div>

    <div class="content bayar">
        <form action="<?= BASEURL; ?>/pembayaran/bayar" method="POST">
            <input type="hidden" name="id_pegawai" value="<?= $_SESSION['id_pegawai']; ?>">
            <input type="hidden" name="nis" value="<?= $data['nis']; ?>">
            <input type="hidden" name="tahun_bayar" value="<?= $data['tahun']; ?>">
            <input type="hidden" name="keterangan" value="lunas">

            <label for="bulan">Bulan</label>
            <input type="text" name="bulan_bayar" value="<?= $data['bulan']; ?>" readonly>
            <br>
            <label for="">Nama Siswa</label>
            <input type="text" value="<?= $data['siswa']['nama_siswa']; ?>" readonly>
            <br>
            <label for="">Pegawai</label>
            <input type="text" value="<?= $_SESSION['nama']; ?>" readonly>
            <br>
            <label for="tahun">Tanggal</label>
            <input type="date" name="tanggal_bayar" id="tanggal" value="<?= date('Y-m-d') ?>" readonly>
            <br>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah_bayar" id="jumlah" placeholder="Masukkan Jumlah" value="700000" readonly>
            <br>
            <button type="submit" name="bayar">Bayar</button>
        </form>
    </div>
</section>