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
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASEURL ?>/assets/favicon/favicon-dark/apple-touch-icon-152x152.png" />
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

<body id="laporan-pembayaran">
    <div class="container">
        <div class="header">
            <img src="<?= BASEURL; ?>/assets/images/logo.png" alt="logo">
            <h1 class="navbar-logo">Bayar<span>Aja.</span></h1>
        </div>

        <div class="header-table">
            <h1>Laporan Pembayaran SPP</h1>
            <p>Tanggal <?= $_POST['tgl1']; ?> &mdash; <?= $_POST['tgl2']; ?></p>
        </div>
        <table class="table-cetak" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Bulan</th>
                    <th>Jumlah Bayar</th>
                    <th>Kembalian</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $total = 0; ?>
                <?php $bayar = 0; ?>
                <?php $kembalian = 0; ?>
                <?php foreach ($data['detail'] as $detail) : ?>
                    <tr>
                        <td align="center"><?= $i; ?></td>
                        <td align="center"><?= $detail['nis']; ?></td>
                        <td><?= $detail['nama_siswa']; ?></td>

                        <?php foreach ($data['kelas'] as $kls) : ?>
                            <?php if ($kls['id_kelas'] == $detail['id_kelas']) : ?>
                                <td><?= $kls['kelas']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $detail['bulan']; ?> <?= $detail['tahun']; ?></td>
                        <td align="right"><?= rupiahFormat($detail['total_bayar']); ?></td>
                        <td align="right"><?= rupiahFormat($detail['kembalian']); ?></td>

                        <?php foreach ($data['pembayaran'] as $pmbyr) : ?>
                            <?php if ($pmbyr['id_bayar'] == $detail['id_bayar']) : ?>
                                <td align="center"><?= $pmbyr['keterangan']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                    <?php $i++; ?>
                    <?php $bayar += $detail['total_bayar']; ?>
                    <?php $kembalian += $detail['kembalian']; ?>
                    <?php $total = $bayar - $kembalian; ?>
                <?php endforeach; ?>
                <tr>
                    <td class="total" colspan="5">Total</td>
                    <td class="total"><?= rupiah($total); ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table class="info">
            <tr>
                <td></td>
                <td class="ttd">
                    <p>Denpasar , <?= date('d/m/y') ?><br>
                        <?= $_SESSION['level']; ?>,
                        <br />
                        <br />
                        <br />
                        __________________________
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <center>
        <a class="btn-print print" href="" onclick="window.print();">Cetak</a>
    </center>
</body>

</html>