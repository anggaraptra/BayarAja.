<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text">Home / Data Pegawai / <span>Update</span></h5>
    </div>

    <div class="content update-pegawai">
        <form action="<?= BASEURL ?>pegawai/update" method="POST">
            <input type="hidden" name="id_pegawai" value="<?= $data['pegawai']['id_pegawai']; ?>">
            <label for="nama_pegawai">Nama</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" value="<?= $data['pegawai']['nama_pegawai']; ?>" placeholder="Masukkan Nama" required>
            <br>
            <label for="telp">Telepon</label>
            <input type="number" name="telp" id="telp" value="<?= $data['pegawai']['telp'] ?>" placeholder="Masukkan Telepon" required>
            <br>
            <label for="username">Username Anda</label>
            <input type="text" name="username" id="username" value="<?= $data['pegawai']['username'] ?>" placeholder="Masukkan Username Anda" required>
            <br>
            <label for="password">Password Anda</label>
            <input type="password" name="password" id="password" value="<?= $data['pegawai']['password']; ?>" placeholder="Masukkan Password Anda" required>
            <br>
            <select name="level" id="level">
                <option value="<?= $data['pegawai']['level'] ?>"><?= $data['pegawai']['level']; ?></option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</section>