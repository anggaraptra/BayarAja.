<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">

    <!-- Fonts -->
    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!-- Hind Madurai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <title>PembayaranSPP - <?= $data['judul']; ?></title>
</head>

<body>
    <!-- Navbar start-->
    <nav class="navbar">
        <div class="logo">
            <a href="#" class="navbar-logo text">Pembayaran<span>SPP. </span></a>
        </div>

        <div class="toggle-sidebar">
            <i class='bx bx-chevron-right toggle'>IconToggle</i>
        </div>

        <div class="navbar-profile">
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt="profile">
                    <span class="text">Admin</span>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item text" href="#">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Sidebar start -->
    <nav class="sidebar">
        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='icon'><?= SEARCH; ?></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= HOME; ?></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= COLUMNS; ?></i>
                            <span class="text nav-text">Data Kelas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= SPREADSHEET ?></i>
                            <span class="text nav-text">Data Siswa</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= SPREADSHEET; ?></i>
                            <span class="text nav-text">Data Petugas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= RECEIPT; ?></i>
                            <span class="text nav-text">Data SPP</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= CREDITCARD; ?></i>
                            <span class="text nav-text">Pembayaran</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= HISTORY; ?></i>
                            <span class="text nav-text">History</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='icon'><?= REPORT; ?></i>
                            <span class="text nav-text">Laporan</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a class="logout" href="#">
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