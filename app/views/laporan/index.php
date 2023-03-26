<section class="home">
    <div class="page-title">
        <h1 class="head-text">Laporan Data</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Laporan Data</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content laporan">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama Laporan</th>
                    <th>Cetak</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Laporan Pembayaran Kelas</td>
                    <td>
                        <form action="<?= BASEURL; ?>/laporan/kelas" method="POST" target="_blank" class="form-pembayaran-kelas">
                            <div class="option-kelas">
                                <select class="form-control" name="id_kelas" id="" required>
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($data['kelas'] as $kls) : ?>
                                        <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <select class="form-control" name="angkatan" id="" required>
                                    <option value="">Pilih Angkatan</option>
                                    <?php foreach ($data['spp'] as $spp) : ?>
                                        <option value="<?= $spp['angkatan']; ?>"><?= $spp['angkatan']; ?></option>
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

                            <button class="btn" type="submit" name="submit">Tampilkan</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Laporan Pembayaran</td>
                    <td>
                        <form action="<?= BASEURL; ?>/laporan/pembayaran" method="POST" target="_blank" class="form-tanggal">
                            <div class="input-group">
                                <label for="">Mulai Tanggal</label>
                                <input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="">Sampai Tanggal</label>
                                <input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="input-group">
                                <button class="btn" type="submit" name="tampilPembayaran">Tampilkan</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>