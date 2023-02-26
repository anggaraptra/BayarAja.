<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Telp Ortu</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['siswa'] as $siswa) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $siswa['nis']; ?></td>
                    <td><?= $siswa['nama_siswa']; ?></td>
                    <td><?= $siswa['id_kelas']; ?></td>
                    <td><?= $siswa['angkatan']; ?></td>
                    <td><?= $siswa['telp']; ?></td>
                    <td><?= $siswa['alamat']; ?></td>
                    <td><?= $siswa['telp_ortu']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>