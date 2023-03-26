<section class="home">
    <div class="page-title">
        <h1 class="head-text">Siswa</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/siswa">Data Siswa</a> / <span>Tambah</span></h5>
    </div>

    <div class="container-alert">
        <?php Flasher::flashMessage() ?>
    </div>

    <div class="content form-add add-siswa">
        <form action="<?= BASEURL ?>/siswa/add" method="POST">
            <div class="input-group">
                <label for="nis">Nis</label>
                <input type="text" name="nis" id="nis" class="form-control" placeholder="<?php if (!$data['siswa']) : ?>ex:5320<?php else : ?>Nis terakhir:<?= $data['siswa']['nis']; ?><?php endif; ?>" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="ex:I Kadek Anggara Putra" required>
            </div>

            <div class="input-group">
                <label for="kelas">Kelas</label>
                <select name="id_kelas" id="kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['kelas'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk Siswa" required>
            </div>

            <div class="input-group">
                <label for="angkatan">Angkatan</label>
                <select name="angkatan" id="angkatan" class="form-control" required>
                    <option value="">Pilih Angkatan</option>
                    <?php foreach ($data['spp'] as $spp) : ?>
                        <option value="<?= $spp['angkatan'] ?>"><?= $spp['angkatan'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group">
                <label for="telp">Telepon</label>
                <input type="number" name="telp" id="telp" class="form-control" placeholder="ex:089680897900" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="ex:Jln. Gelogor Carik No.96" rows="3"></textarea>
            </div>

            <div class="input-group">
                <label for="telp_ortu">Telepon Orang Tua</label>
                <input type="number" name="telp_ortu" id="telp_ortu" class="form-control" placeholder="ex:089680897900" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="password">Password Siswa</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Siswa" required>
            </div>

            <button type="submit" name="tambahSiswa" class="btn">Tambah</button>
        </form>
    </div>
</section>