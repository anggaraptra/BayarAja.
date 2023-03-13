<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pegawai">Data Pegawai</a> / <span>Tambah</span></h5>
    </div>

    <div class="content form-add add-pegawai">
        <form action="<?= BASEURL ?>/pegawai/add" method="POST">
            <div class="input-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="ex:Budi Joko" required>
            </div>

            <div class="input-group">
                <label for="telp">Telepon</label>
                <input type="number" name="telp" id="telp" class="form-control" placeholder="ex:089680897900" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="username">Username Anda</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="ex:budi" required>
            </div>

            <div class="input-group">
                <label for="password">Password Pegawai</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Pegawai" required>
            </div>

            <div class="input-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>

            <button type="submit" name="tambah" class="btn">Tambah</button>
        </form>
    </div>
</section>