<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <a href="<?= BASEURL; ?>/pegawai">Data Pegawai</a> / <span>Update</span></h5>
    </div>

    <div class="content form-update update-pegawai">
        <form action="<?= BASEURL ?>/pegawai/update" method="POST">
            <input type="hidden" name="id_pegawai" value="<?= $data['pegawai']['id_pegawai']; ?>">
            <input type="hidden" name="password_lama" value="<?= $data['pegawai']['password']; ?>">

            <div class="input-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $data['pegawai']['nama_lengkap']; ?>" placeholder="ex:Budi Joko" required>
            </div>

            <div class="input-group">
                <label for="telp">Telepon</label>
                <input type="number" name="telp" id="telp" class="form-control" value="<?= $data['pegawai']['telp'] ?>" placeholder="ex:089680897900" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
            </div>

            <div class="input-group">
                <label for="username">Username Anda</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $data['pegawai']['username'] ?>" placeholder="ex:budi" required>
            </div>

            <div class="input-group">
                <label for="password">Password Pegawai</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Update Password">
            </div>

            <div class="input-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="<?= $data['pegawai']['level'] ?>"><?= $data['pegawai']['level']; ?></option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</section>