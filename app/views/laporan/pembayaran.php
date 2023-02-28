<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Laporan Pembayaran SPP</h1>
        </div>
        <div class="header">
            <p>Tanggal <?= $_POST['tgl1']; ?> - <?= $_POST['tgl2']; ?></p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pembayaran Bulan</th>
                    <th>Jumlah Bayar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pembayaran['nis']; ?></td>
                        <td><?= $pembayaran['nama_siswa']; ?></td>

                        <?php foreach ($data['kelas'] as $kls) : ?>
                            <?php if ($kls['id_kelas'] == $pembayaran['id_kelas']) : ?>
                                <td><?= $kls['kelas']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $pembayaran['bulan_bayar']; ?> <?= $pembayaran['tahun_bayar']; ?></td>
                        <td><?= $pembayaran['jumlah_bayar']; ?></td>
                        <td><?= $pembayaran['keterangan']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">Total</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>