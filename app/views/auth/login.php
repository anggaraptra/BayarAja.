<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASEURL ?>/assets/favicon/favicon-light/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-light/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-light/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-light/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-light/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/assets/favicon/favicon-light/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">

    <title><?= $data['title']; ?> - <?= SITENAME; ?></title>
</head>

<body id="login">
    <div class="container-login">
        <div class="wrapper-login">
            <div class="judul-login">
                <img src="<?= BASEURL; ?>/assets/images/logo.png" alt="">
                <h1>Bayar<span>Aja.</span></h1>
                <p>Login to your account</p>
            </div>

            <div class="container-alert">
                <?php Flasher::flashMessage(); ?>
            </div>

            <div class="form-login">
                <form action="<?= BASEURL; ?>/login/process" method="POST">
                    <div class="input-group">
                        <label class="label-input" for="username">Username atau NIS</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="input-group password">
                        <div class="head-input">
                            <label class="label-input" for="password">Password</label>
                            <div class="show-password">
                                <input type="checkbox" onclick="showPass()" class="password">
                                <label for="">Show</label>
                            </div>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="input-group">
                        <div class="remember">
                            <input type="checkbox" name="rememberMe" class="remember-me">
                            <label for="">Remember me</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>