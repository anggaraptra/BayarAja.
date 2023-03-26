<section class="home">
    <div class="page-title">
        <h1 class="head-text">SPP</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/spp">Data Spp</a> / <span>Update</span></h5>
    </div>

    <div class="content form-update update-spp">
        <form action="<?= BASEURL ?>/spp/update" method="POST">
            <input type="hidden" name="id_spp" value="<?= $data['spp']['id_spp']; ?>">

            <div class="input-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" name="angkatan" id="angkatan" class="form-control" value="<?= $data['spp']['angkatan']; ?>" placeholder="Tahun. ex:<?= date('Y'); ?>" readonly required>
            </div>

            <div class="input-group">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="form-control" value="<?= $data['spp']['nominal']; ?>" placeholder="Masukkan Nominal" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-type="nominalRupiah" required>
            </div>

            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</section>