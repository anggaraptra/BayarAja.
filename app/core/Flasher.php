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
}
