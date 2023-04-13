<!-- Navbar start-->
<nav class="navbar">
    <a class="logo" href="<?= BASEURL; ?>">
        <i class="icon logo-light"><?= LOGOLIGHT; ?></i>
        <i class="icon logo-dark d-none"><?= LOGODARK; ?></i>
        <h1 class="navbar-logo text">Bayar<span>Aja.</span></h1>
    </a>

    <div class="toggle-sidebar">
        <i class='icon toggle'><?= MENU; ?></i>
    </div>

    <div class="navbar-profile">
        <i class="icon"><?= USER; ?></i>
        <div class="dropdown">
            <i class="icon icon-down"><?= DOWN; ?></i>
            <ul class="dropdown-menu">
                <li class="level">
                    <h5 class="text"><?= $_SESSION['nama']; ?></h5>
                    <?php if (@$_SESSION['level']) : ?>
                        <span class="text"><?= $_SESSION['level']; ?></span>
                    <?php else : ?>
                        <span class="text">siswa</span>
                    <?php endif; ?>
                </li>
                <a class="text" href="<?= BASEURL; ?>/profile">
                    <li>Profile</li>
                </a>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<!-- Sidebar start -->
<nav class="sidebar">
    <div class="menu-bar">
        <div class="menu">

            <!-- Search box -->
            <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                <li class="search-box">
                    <i class='icon search'><?= SEARCH; ?></i>
                    <form action="<?= BASEURL; ?>/siswa/biodata" method="POST">
                        <input type="text" name="keyword" id="keyword" placeholder="Search Siswa..." autocomplete="off" required maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </form>
                </li>
            <?php endif; ?>

            <!-- Dashboard -->
            <ul class="menu-links">
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <?php if ($activeTab == 'dashboard') : ?>
                            <a href="<?= BASEURL; ?>" class="active">
                            <?php else : ?>
                                <a href="<?= BASEURL; ?>">
                                <?php endif; ?>
                                <i class='icon'><?= HOME; ?></i>
                                <span class="text nav-text">Dashboard</span>
                                </a>
                    </li>
                <?php endif; ?>

                <!-- Kelas -->
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <?php if ($activeTab == 'kelas') :  ?>
                            <a href="<?= BASEURL; ?>/kelas" class="active">
                            <?php else : ?>
                                <a href="<?= BASEURL; ?>/kelas">
                                <?php endif; ?>
                                <i class='icon'><?= COLUMNS; ?></i>
                                <span class="text nav-text">Data Kelas</span>
                                </a>
                    </li>
                <?php endif; ?>

                <!-- Siswa -->
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <?php if ($activeTab == 'siswa') : ?>
                            <a href="<?= BASEURL; ?>/siswa" class="active">
                            <?php else : ?>
                                <a href="<?= BASEURL; ?>/siswa">
                                <?php endif; ?>
                                <i class='icon'><?= SPREADSHEET ?></i>
                                <span class="text nav-text">Data Siswa</span>
                                </a>
                    </li>
                <?php endif; ?>

                <!-- Pegawai -->
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin') : ?>
                    <li class="nav-link">
                        <?php if ($activeTab == 'pegawai') : ?>
                            <a href="<?= BASEURL; ?>/pegawai" class="active">
                            <?php else : ?>
                                <a href="<?= BASEURL; ?>/pegawai">
                                <?php endif; ?>
                                <i class='icon'><?= SPREADSHEET; ?></i>
                                <span class="text nav-text">Data Pegawai</span>
                                </a>
                    </li>
                <?php endif; ?>

                <!-- Spp -->
                <li class="nav-link">
                    <?php if ($activeTab == 'spp') : ?>
                        <a href="<?= BASEURL; ?>/spp" class="active">
                        <?php else : ?>
                            <a href="<?= BASEURL; ?>/spp">
                            <?php endif; ?>
                            <i class='icon'><?= RECEIPT; ?></i>
                            <span class="text nav-text">Data SPP</span>
                            </a>
                </li>

                <!-- Pembayaran -->
                <li class="nav-link">
                    <?php if ($activeTab == 'pembayaran') : ?>
                        <a href="<?= BASEURL; ?>/pembayaran" class="active">
                        <?php else : ?>
                            <a href="<?= BASEURL; ?>/pembayaran">
                            <?php endif; ?>
                            <i class='icon'><?= CREDITCARD; ?></i>
                            <span class="text nav-text">Pembayaran</span>
                            </a>
                </li>

                <!-- History -->
                <li class="nav-link">
                    <?php if ($activeTab == 'history') : ?>
                        <a href="<?= BASEURL; ?>/history" class="active">
                        <?php else : ?>
                            <a href="<?= BASEURL; ?>/history">
                            <?php endif; ?>
                            <i class='icon'><?= HISTORY; ?></i>
                            <span class="text nav-text">History</span>
                            </a>
                </li>

                <!-- Laporan -->
                <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                    <li class="nav-link">
                        <?php if ($activeTab == 'laporan') : ?>
                            <a href="<?= BASEURL; ?>/laporan" class="active">
                            <?php else : ?>
                                <a href="<?= BASEURL; ?>/laporan">
                                <?php endif; ?>
                                <i class='icon'><?= REPORT; ?></i>
                                <span class="text nav-text">Laporan</span>
                                </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

        <!-- Bottom content -->
        <div class="bottom-content">
            <li class="">
                <a class="logout" href="<?= BASEURL; ?>/login/processLogout" onclick="return confirm('Ingin logout?')">
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