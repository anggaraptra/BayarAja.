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
            <h1>Laporan Pembayaran Kelas <?= $_POST['kelas']; ?></h1>
        </div>
        <div class="header">
            <p>Bulan <?= $_POST['bulan'] ?></p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Jumlah Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['siswa'] as $swa) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $swa['nis']; ?></td>
                        <td><?= $swa['nama_siswa']; ?></td>
                        <td><?= $swa['jumlah_bayar']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">Total</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>