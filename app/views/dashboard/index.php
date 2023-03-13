<section class="home">
    <div class="page-title">
        <h1 class="head-text">Dashboard</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content dashboard">

        <div class="container-siswa">
            <div class="card">
                <div class="card-header">
                    <h1>Jumlah Siswa</h1>
                </div>
                <div class="card-body">
                    <h1><?= $data['siswa']; ?></h1>
                </div>
            </div>
        </div>

        <div class="container-transaksi">
            <div class="card">
                <div class="card-header">
                    <h1>Jumlah Transaksi</h1>
                </div>
            </div>
        </div>

        <div class="container-transaksi">
            <div class="card">
                <div class="card-header">
                    <h1>Jam</h1>
                </div>
            </div>
        </div>

        <div class="container-history">
            <div class="card">
                <div class="card-header">
                    <h1>Transaksi Terakhir</h1>
                </div>
            </div>
        </div>

    </div>
</section>