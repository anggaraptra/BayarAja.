<!-- Navbar start-->
<nav class="navbar">
    <div class="logo">
        <a href="<?= BASEURL; ?>" class="navbar-logo text">Pembayaran<span>SPP. </span></a>
    </div>

    <div class="toggle-sidebar">
        <i class='icon'><?= CATEGORY; ?></i>
    </div>

    <div class="navbar-profile">
        <div class="dropdown">
            <div class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icon"><?= USER; ?></i>
                <span class="text"><?= $_SESSION['nama']; ?></span>
                <?php if (@$_SESSION['level']) : ?>
                    <span class="text"><?= $_SESSION['level']; ?></span>
                <?php else : ?>
                    <span class="text">siswa</span>
                <?php endif; ?>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item text" href="<?= BASEURL; ?>/profile">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<!-- Sidebar start -->
<nav class="sidebar">
    <div class="menu-bar">
        <div class="menu">

            <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                <li class="search-box">
                    <i class='icon'><?= SEARCH; ?></i>
                    <form action="<?= BASEURL; ?>/pembayaran/biodata" method="POST">
                        <input type="search" name="keyword" id="keyword" placeholder="Search siswa..." autocomplete="off">
                    </form>
                </li>
            <?php endif; ?>

            <ul class="menu-links">
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>" class="<?= $status['dashboard'] ?>">
                            <i class='icon'><?= HOME; ?></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/kelas" class="<?= $status['kelas'] ?>">
                            <i class='icon'><?= COLUMNS; ?></i>
                            <span class="text nav-text">Data Kelas</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/siswa" class="<?= $status['siswa'] ?>">
                            <i class='icon'><?= SPREADSHEET ?></i>
                            <span class="text nav-text">Data Siswa</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/pegawai" class="<?= $status['pegawai'] ?>">
                            <i class='icon'><?= SPREADSHEET; ?></i>
                            <span class="text nav-text">Data Pegawai</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/spp" class="<?= $status['spp'] ?>">
                            <i class='icon'><?= RECEIPT; ?></i>
                            <span class="text nav-text">Data SPP</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-link">
                    <a href="<?= BASEURL; ?>/pembayaran" class="<?= $status['pembayaran'] ?>">
                        <i class='icon'><?= CREDITCARD; ?></i>
                        <span class="text nav-text">Pembayaran</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= BASEURL; ?>/history" class="<?= $status['history'] ?>">
                        <i class='icon'><?= HISTORY; ?></i>
                        <span class="text nav-text">History</span>
                    </a>
                </li>

                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/laporan" class="<?= $status['laporan'] ?>">
                            <i class='icon'><?= REPORT; ?></i>
                            <span class="text nav-text">Laporan</span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a class="logout" href="<?= BASEURL; ?>/login/processLogout">
                    <i class='icon'><?= LOGOUT; ?></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='icon moon'><?= MOON; ?></i>
                    <i class='icon sun'><?= SUN; ?></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>
</nav>
<!-- Sidebar end -->