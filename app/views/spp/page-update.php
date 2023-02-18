<section class="home">
    <div class="page-title">
        <h1 class="head-text">SPP</h1>
        <h5 class="sub-text">Home / Data Spp / <span>Update</span></h5>
    </div>

    <div class="content update-spp">
        <form action="<?= BASEURL ?>/spp/update" method="POST">
            <label for="angkatan">Angkatan</label>
            <input type="text" name="angkatan" id="angkatan" value="<?= $data['spp']['angkatan']; ?>" placeholder="Masukkan Angkatan" readonly required>
            <br>
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" id="nominal" value="<?= $data['spp']['nominal']; ?>" placeholder="Masukkan Nominal" required>
            <br>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</section>