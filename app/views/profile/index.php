<section class="home">
    <div class="page-title">
        <h1 class="head-text">Your Profile</h1>
        <h5 class="sub-text"><a href="<?= BASEURL; ?>">Home</a> / <span>Profile</span></h5>
    </div>

    <div class="content profile">
        <div class="container">
            <div class="profile-image">
                <?php if (@$_SESSION['nis']) : ?>
                    <img src="<?= BASEURL; ?>/assets/images/profile.png" alt="">
                <?php else : ?>
                    <img src="<?= BASEURL; ?>/assets/images/profile-admin.png" alt="">
                <?php endif; ?>
            </div>
            <div class="profile-info">
                <h1>Profile Details</h1>
                <table class="table table-hover">
                    <?php if (@$_SESSION['level']) : ?>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $_SESSION['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?= $_SESSION['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><?= $data['pegawai']['telp']; ?></td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td><?= $_SESSION['level']; ?></td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $data['siswa']['nama_siswa']; ?></td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td><?= $data['siswa']['nis']; ?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td><?= $data['kelas']['kelas']; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><?= $data['siswa']['telp']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $data['siswa']['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon Orang Tua</th>
                            <td><?= $data['siswa']['telp_ortu']; ?></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</section>