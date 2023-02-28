<section class="home">
    <div class="page-title">
        <h1 class="head-text">Laporan</h1>
        <h5 class="sub-text">Home / <span>Laporan</span></h5>
    </div>

    <div class="content laporan">
        <table class="">
            <tr>
                <th>Nama Laporan</th>
                <th>Cetak</th>
            </tr>
            <tr>
                <td>Laporan Pembayaran Kelas</td>
                <td>
                    <form action="<?= BASEURL; ?>/laporan/kelas" method="POST" target="_blank">
                        <div class="options-kelas">
                            <select class="form-control" name="kelas" id="" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($data['kelas'] as $kls) : ?>
                                    <option value="<?= $kls['kelas']; ?>"><?= $kls['kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="option-bulan">
                            <select class="form-control" name="bulan" id="" required>
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>

                        </div>
                        <button class="" type="submit" name="tampilKelas">Tampilkan</button>
                    </form>
                </td>
            </tr>

            <form action="<?= BASEURL; ?>/laporan/pembayaran" method="POST" target="_blank">
                <tr>
                    <td>Laporan Pembayaran</td>
                    <td>
                        <div class="">
                            <label for="">Mulai Tanggal</label>
                            <input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="">
                            <label for="">Sampai Tanggal</label>
                            <input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
                        </div>
                        <button class="" type="submit" name="tampilPembayaran">Tampilkan</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</section>