<section class="home">
    <div class="page-title">
        <h1 class="head-text">SPP</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/spp">Data Spp</a> / <span>Tambah</span></h5>
    </div>

    <div class="content form-add add-spp">
        <form action="<?= BASEURL ?>/spp/add" method="POST">
            <div class="input-group">
                <label for="angkatan">Angkatan</label>
                <input type="number" name="angkatan" id="angkatan" class="form-control" placeholder="Tahun. ex:2023" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Rp. ex:700000" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="nominalRupiah" required>
            </div>

            <button type="submit" name="tambah" class="btn">Tambah</button>
        </form>
    </div>
</section>