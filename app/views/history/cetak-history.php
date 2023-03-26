<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASEURL ?>/assets/favicon-dark/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-dark/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-dark/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-dark/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-dark/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-dark/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

    <title><?= $data['title']; ?></title>
</head>

<body id="cetak-history">

    <div class="container">
        <div class="header">
            <img src="<?= BASEURL; ?>/assets/images/logo.png" alt="logo">
            <h1 class="navbar-logo">Bayar<span>Aja.</span></h1>
        </div>

        <div class="header-table">
            <h1>Bukti Pembayaran Siswa</h1>
        </div>
        <table class="table table-striped table-cetak">
            <tr>
                <th>Petugas</th>
                <td><?= $data['pegawai']['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <th>NIS</th>
                <td><?= $data['siswa']['nis']; ?></td>
            </tr>
            <tr>
                <th>Nama Siswa</th>
                <td><?= $data['siswa']['nama_siswa']; ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?= $data['kelas']['kelas']; ?></td>
            </tr>
        </table>

        <div class="header-table">
            <h1>Keterangan Pembayaran</h1>
        </div>
        <table class="table table-striped table-cetak">
            <tr>
                <th>Tanggal Bayar</th>
                <td><?= $data['detail']['tanggal_bayar']; ?></td>
            </tr>
            <tr>
                <th>Bulan Bayar</th>
                <td><?= $data['pembayaran']['bulan']; ?> <?= $data['pembayaran']['tahun']; ?></td>
            </tr>

            <?php if ($data['pembayaran']['jumlah_bayar'] == $data['spp']['nominal'] && $data['detail']['total_bayar'] == $data['spp']['nominal']) : ?>
                <tr>
                    <th>Jumlah Bayar</th>
                    <td><?= rupiah($data['pembayaran']['jumlah_bayar']); ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <th>Jumlah Bayar</th>
                    <td><?= rupiah($data['detail']['total_bayar']); ?></td>
                </tr>
            <?php endif; ?>

            <?php if ($data['detail']['kembalian'] != 0) : ?>
                <tr>
                    <th>Kembalian</th>
                    <td><?= rupiah($data['detail']['kembalian']); ?></td>
                </tr>
            <?php endif; ?>

            <?php if ($data['pembayaran']['sisa_bayar'] != 0) : ?>
                <tr>
                    <th>Tunggakan</th>
                    <td><?= rupiah($data['pembayaran']['sisa_bayar']); ?></td>
                </tr>
            <?php endif; ?>

            <?php if ($data['detail']['total_bayar'] < $data['spp']['nominal'] && $data['pembayaran']['sisa_bayar'] == 0) : ?>
                <tr>
                    <th>Keterangan</th>
                    <td>Cicilan Lunas</td>
                </tr>
            <?php else : ?>
                <tr>
                    <th>Keterangan</th>
                    <td><?= $data['pembayaran']['keterangan']; ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <center>
        <a class="btn-print print" href="" onclick="window.print();">Cetak</a>
    </center>
</body>

</html>