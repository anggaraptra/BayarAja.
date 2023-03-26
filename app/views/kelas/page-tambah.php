<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/kelas">Data Kelas</a> / <span>Tambah</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content form-add add-kelas">
        <form action="<?= BASEURL ?>/kelas/add" method="POST">
            <div class="input-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" placeholder="ex:RPL 1" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="" class="form-control" placeholder="ex:Rekayasa Perangkat Lunak"></textarea>
            </div>

            <button type="submit" name="tambah" class="btn">
                Tambah
            </button>
        </form>
    </div>
</section>