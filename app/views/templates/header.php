<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!-- Hind Madurai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

    <title><?= SITENAME; ?> - <?= $data['title']; ?></title>
</head>

<body>
    <!-- Navbar start-->
    <nav class="navbar">
        <div class="logo">
            <a href="<?= BASEURL; ?>" class="navbar-logo text">Pembayaran<span>SPP. </span></a>
        </div>

        <div class="toggle-sidebar">
            <i class='bx bx-chevron-right toggle'>IconToggle</i>
        </div>

        <div class="navbar-profile">
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt="profile">
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
                            <a href="<?= BASEURL; ?>" class="<?= $data['statusDashboard'] ?>">
                                <i class='icon'><?= HOME; ?></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                        <li class="nav-link">
                            <a href="<?= BASEURL; ?>/kelas" class="<?= $data['statusKelas'] ?>">
                                <i class='icon'><?= COLUMNS; ?></i>
                                <span class="text nav-text">Data Kelas</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                        <li class="nav-link">
                            <a href="<?= BASEURL; ?>/siswa" class="<?= $data['statusSiswa'] ?>">
                                <i class='icon'><?= SPREADSHEET ?></i>
                                <span class="text nav-text">Data Siswa</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin') : ?>
                        <li class="nav-link">
                            <a href="<?= BASEURL; ?>/pegawai" class="<?= $data['statusPegawai'] ?>">
                                <i class='icon'><?= SPREADSHEET; ?></i>
                                <span class="text nav-text">Data Pegawai</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                        <li class="nav-link">
                            <a href="<?= BASEURL; ?>/spp" class="<?= $data['statusSpp'] ?>">
                                <i class='icon'><?= RECEIPT; ?></i>
                                <span class="text nav-text">Data SPP</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/pembayaran" class="<?= $data['statusPembayaran'] ?>">
                            <i class='icon'><?= CREDITCARD; ?></i>
                            <span class="text nav-text">Pembayaran</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= BASEURL; ?>/history" class="<?= $data['statusHistory'] ?>">
                            <i class='icon'><?= HISTORY; ?></i>
                            <span class="text nav-text">History</span>
                        </a>
                    </li>

                    <?php if (@$_SESSION['login'] && @$_SESSION['level'] == 'admin' || @$_SESSION['level'] == 'petugas') : ?>
                        <li class="nav-link">
                            <a href="<?= BASEURL; ?>/laporan" class="<?= $data['statusLaporan'] ?>">
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