<section class="home">
    <div class="page-title">
        <h1 class="head-text">Pegawai</h1>
        <h5 class="sub-text">Home / Data Pegawai / <span>Tambah</span></h5>
    </div>

    <div class="content tambah-pegawai">
        <form action="<?= BASEURL ?>pegawai/add" method="POST">
            <label for="nama_pegawai">Nama</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Masukkan Nama" required>
            <br>
            <label for="telp">Telepon</label>
            <input type="number" name="telp" id="telp" placeholder="Masukkan Telepon" required>
            <br>
            <label for="username">Username Anda</label>
            <input type="text" name="username" id="username" placeholder="Masukkan Username Anda" required>
            <br>
            <label for="password">Password Anda</label>
            <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required>
            <br>
            <select name="level" id="level">
                <option value="">Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <br>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</section>