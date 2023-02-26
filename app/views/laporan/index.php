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
                        <select class="form-control" name="kelas" id="">
                            <?php foreach ($data['kelas'] as $kls) : ?>
                                <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-success btn-lg" type="submit" name="tampil">Tampilkan</button>
                    </form>
                </td>
            </tr>

            <form class="col-md-2" action="<?= BASEURL; ?>/laporan/pembayaran" method="POST" target="_blank">
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
                        <button class="btn btn-success btn-lg" type="submit" name="tampil">Tampilkan</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</section>