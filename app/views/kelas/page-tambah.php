<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text">Home / Data Kelas / <span>Tambah</span></h5>
    </div>

    <div class="content tambah-kelas">
        <form action="<?= BASEURL ?>/kelas/add" method="POST">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" placeholder="Masukkan Kelas" required>
            <br>
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="10"></textarea>
            <br>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</section>