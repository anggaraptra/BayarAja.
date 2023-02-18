<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text">Home / Data Siswa / <span>Tambah</span></h5>
    </div>

    <div class="content tambah-siswa">
        <form action="<?= BASEURL ?>/siswa/add" method="POST">
            <label for="nis">Nis</label>
            <input type="text" name="nis" id="nis" placeholder="Masukkan Nis" required>
            <br>
            <label for="nama">Nama</label>
            <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama" required>
            <br>
            <label for="kelas">Kelas</label>
            <select name="id_kelas" id="id_kelas">
                <option value="">Pilih Kelas</option>
                <?php foreach ($data['kelas'] as $kelas) : ?>
                    <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['kelas'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="angkatan">Angkatan</label>
            <select name="angkatan" id="angkatan">
                <option value="">Pilih Angkatan</option>
                <?php foreach ($data['spp'] as $spp) : ?>
                    <option value="<?= $spp['angkatan'] ?>"><?= $spp['angkatan'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="telp">Telepon</label>
            <input type="number" name="telp" id="telp" placeholder="Masukkan Telepon" required>
            <br>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
            <br>
            <label for="telp_ortu">Telepon Orang Tua</label>
            <input type="number" name="telp_ortu" id="telp_ortu" placeholder="Masukkan Telepon Orang Tua" required>
            <br>
            <label for="password">Password Anda</label>
            <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required>
            <br>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</section>