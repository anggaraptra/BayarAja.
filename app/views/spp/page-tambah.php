<section class="home">
    <div class="page-title">
        <h1 class="head-text">SPP</h1>
        <h5 class="sub-text">Home / Data Spp / <span>Tambah</span></h5>
    </div>

    <div class="content tambah-spp">
        <form action="<?= BASEURL ?>spp/add" method="POST">
            <label for="angkatan">Angkatan</label>
            <input type="text" name="angkatan" id="angkatan" placeholder="Masukkan Angkatan" required>
            <br>
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" id="nominal" placeholder="Masukkan Nominal" required>
            <br>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</section>