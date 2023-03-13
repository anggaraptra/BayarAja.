<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/siswa">Data Siswa</a> / <span>Update</span></h5>
    </div>

    <div class="content form-update update-siswa">
        <form action="<?= BASEURL ?>/siswa/update" method="POST">
            <input type="hidden" name="id_siswa" value="<?= $data['siswa']['id_siswa']; ?>">

            <div class="input-group">
                <label for="nis">Nis</label>
                <input type="text" name="nis" id="nis" class="form-control" value="<?= $data['siswa']['nis'] ?>" placeholder="ex:5320" readonly>
            </div>

            <div class="input-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= $data['siswa']['nama_siswa'] ?>" placeholder="ex:I Kadek Putra Angga" required>
            </div>

            <div class="input-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <?php if ($kelas['kelas'] == $data['siswa']['kelas']) : ?>
                            <option value="<?= $kelas['kelas'] ?>" selected><?= $kelas['kelas'] ?></option>
                        <?php else : ?>
                            <option value="<?= $kelas['kelas'] ?>"><?= $kelas['kelas'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group">
                <label for="angkatan">Angkatan</label>
                <select name="angkatan" id="angkatan" class="form-control">
                    <?php foreach ($data['spp'] as $spp) : ?>
                        <?php if ($spp['angkatan'] == $data['siswa']['angkatan']) : ?>
                            <option value="<?= $spp['angkatan'] ?>" selected><?= $spp['angkatan'] ?></option>
                        <?php else : ?>
                            <option value="<?= $spp['angkatan'] ?>"><?= $spp['angkatan'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group">
                <label for="telp">Telepon</label>
                <input type="number" name="telp" id="telp" class="form-control" value="<?= $data['siswa']['telp'] ?>" placeholder="ex:089680897900" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="ex:Jln. Gelogor Carik No.96" rows="3"><?= $data['siswa']['alamat']; ?></textarea>
            </div>

            <div class="input-group">
                <label for="telp_ortu">Telepon Orang Tua</label>
                <input type="number" name="telp_ortu" id="telp_ortu" class="form-control" value="<?= $data['siswa']['telp_ortu']; ?>" placeholder="ex:089680897900" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="password">Password Siswa</label>
                <input type="password" name="password" id="password" class="form-control" value="<?= $data['siswa']['password'] ?>" placeholder="Masukkan Password Siswa" required>
            </div>

            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</section>