<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/kelas">Data Kelas</a> / <span>Update</span></h5>
    </div>

    <div class="content form-update update-kelas">
        <form action="<?= BASEURL ?>/kelas/update" method="POST">
            <input type="hidden" name="id_kelas" value="<?= $data['kelas']['id_kelas']; ?>">

            <div class="input-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $data['kelas']['kelas'] ?>" placeholder="ex:XII RPL 1" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="" class="form-control" placeholder="ex:Rekayasa Perangkat Lunak"><?= $data['kelas']['keterangan'] ?></textarea>
            </div>

            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</section>