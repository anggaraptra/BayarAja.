<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pembayaran</h1>
        <h5 class="sub-text">Home / Pembayaran SPP / <span>Tagihan</span></h5>
    </div>

    <div class="content tagihan">
        <h1>Tagihan <?= $data['siswa']['nama_siswa']; ?></h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $awalTempo = date("Y-06-d");
                $bulanIndo = [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ];

                for ($i = 1; $i < 13; $i++) :
                    $jatuhTempo = date("Y-m-d", strtotime("+$i month", strtotime($awalTempo)));

                    $bulan = $bulanIndo[date("m", strtotime($jatuhTempo))];
                    $tahun = date("Y", strtotime($jatuhTempo));
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $bulan; ?></td>
                        <td>10-<?= $bulanIndo[date('m', strtotime("+$i month", strtotime($awalTempo)))]; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</section>