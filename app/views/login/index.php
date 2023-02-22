<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <title><?= $data['title']; ?> - <?= SITENAME; ?></title>
</head>

<body>
    <?php Flasher::flashLogin(); ?>
    <div class="container-login">
        <div class="wrapper-login">
            <div class="judul-login">
                <img src="" alt="">
                <h1>Pembayaran SPP</h1>
                <p>Login to your account</p>
            </div>
            <div class="form-login">
                <form action="<?= BASEURL; ?>/login/process" method="POST">
                    <div class="input-box">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="input-box">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>