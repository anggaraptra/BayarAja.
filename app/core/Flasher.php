<?php
class Flasher
{
    // method untuk mengirimkan pesan dan menerima parameter pesannya
    public static function setFlashInfo($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe,
        ];
    }

    // method untuk mengirimkan pesan dan menerima parameter pesannya
    public static function setFlashLogin($psn)
    {
        $_SESSION['flash'] = [
            'pesan' => $psn,
        ];
    }

    // method untuk menampilkan pesan
    public static function flashInfo()
    {
        if (isset($_SESSION['flash'])) {
            echo '<script>
                alert("' . $_SESSION['flash']['tipe'] . ' ' . $_SESSION['flash']['pesan'] . '");
            </script>';
            unset($_SESSION['flash']);
        }
    }

    // method untuk menampilkan pesan khusus login
    public static function flashLogin()
    {
        if (isset($_SESSION['flash'])) {
            echo '<script>
                    alert("' . $_SESSION['flash']['pesan'] . '");
                </script>';
            unset($_SESSION['flash']);
        }
    }
}
