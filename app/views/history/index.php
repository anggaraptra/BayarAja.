<section class="home">
    <div class="page-title">
        <h1 class="head-text">History</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>History Pembayaran</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content history">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Petugas</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['pembayaran'] as $history) : ?>
                    <tr>
                        <td><?= $no; ?></td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="aksi">
                            <a href="" class="btn">
                                <i class="icon"><?= PRINTER; ?></i>
                            </a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>