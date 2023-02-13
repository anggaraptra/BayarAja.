<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text">Home / Data Siswa / <span>Update</span></h5>
    </div>

    <div class="content update-siswa">
        <form action="<?= BASEURL ?>siswa/update" method="POST">
            <label for="nis">Nis</label>
            <input type="text" name="nis" id="nis" value="<?= $data['siswa']['nis'] ?>" readonly>
            <br>
            <label for="nama">Nama</label>
            <input type="text" name="nama_siswa" id="nama_siswa" value="<?= $data['siswa']['nama_siswa'] ?>" placeholder="Masukkan Nama" required>
            <br>
            <label for="kelas">Kelas</label>
            <select name="id_kelas" id="id_kelas">
                <?php foreach ($data['kelas'] as $kelas) : ?>
                    <?php if ($kelas['id_kelas'] == $data['siswa']['id_kelas']) : ?>
                        <option value="<?= $kelas['id_kelas'] ?>" selected><?= $kelas['kelas'] ?></option>
                    <?php else : ?>
                        <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['kelas'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="angkatan">Angkatan</label>
            <select name="angkatan" id="angkatan">
                <?php foreach ($data['spp'] as $spp) : ?>
                    <?php if ($spp['angkatan'] == $data['siswa']['angkatan']) : ?>
                        <option value="<?= $spp['angkatan'] ?>" selected><?= $spp['angkatan'] ?></option>
                    <?php else : ?>
                        <option value="<?= $spp['angkatan'] ?>"><?= $spp['angkatan'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="telp">Telepon</label>
            <input type="number" name="telp" id="telp" value="<?= $data['siswa']['telp'] ?>" placeholder="Masukkan Telepon" required>
            <br>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"><?= $data['siswa']['alamat']; ?></textarea>
            <br>
            <label for="telp_ortu">Telepon Orang Tua</label>
            <input type="number" name="telp_ortu" id="telp_ortu" value="<?= $data['siswa']['telp_ortu']; ?>" placeholder="Masukkan Telepon Orang Tua" required>
            <br>
            <label for="password">Password Anda</label>
            <input type="password" name="password" id="password" value="<?= $data['siswa']['password'] ?>" placeholder="Masukkan Password Anda" required>
            <br>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</section>