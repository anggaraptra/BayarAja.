<?php
class Flasher
{
    // method untuk mengirimkan pesan dan menerima parameter pesannya
    public static function setFlashMessage($type, $message)
    {
        $_SESSION['flashMessage'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    // method untuk mengirimkan pesan dan menerima parameter pesannya
    // public static function setFlashLogin($psn)
    // {
    //     $_SESSION['flash'] = [
    //         'pesan' => $psn,
    //     ];
    // }

    // method untuk menampilkan pesan
    public static function flashMessage()
    {
        if (isset($_SESSION['flashMessage'])) {
            $alertType = 'alert-' . $_SESSION['flashMessage']['type'];
            $alertMessage = $_SESSION['flashMessage']['message'];

            echo '<div class="alert ' . $alertType . '">
                    <p class="message">' . $alertMessage . '</p>
                    <button type="button" class="btn-close">x</button>
                </div>';
            unset($_SESSION['flashMessage']);
        }
    }

    // method untuk menampilkan pesan khusus login
    // public static function flashLogin()
    // {
    //     if (isset($_SESSION['flash'])) {
    //         echo '<script>
    //                 alert("' . $_SESSION['flash']['pesan'] . '");
    //             </script>';
    //         unset($_SESSION['flash']);
    //     }
    // }
}
