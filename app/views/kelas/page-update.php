<section class="home">
    <div class="page-title">
        <h1 class="head-text">Kelas</h1>
        <h5 class="sub-text">Home / Data Kelas / <span>Update</span></h5>
    </div>

    <div class="content update-kelas">
        <form action="<?= BASEURL ?>kelas/update" method="POST">
            <input type="hidden" name="id_kelas" value="<?= $data['kelas']['id_kelas']; ?>">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" value="<?= $data['kelas']['kelas'] ?>" placeholder="Masukkan Kelas" required>
            <br>
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="10"><?= $data['kelas']['keterangan'] ?></textarea>
            <br>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</section>