<?php

class App
{
    // property untuk menampung controller, method, dan parameter default   
    protected $controller = 'Dashboard';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // memanggil method parseURL untuk memecah url menjadi array
        $url = $this->parseURL();

        // mengecek jika controller bernilai null, maka timpa url dengan controller default
        if (is_null($url)) {
            $url = [$this->controller];
        }

        // CONTROLLER
        // cek apakah file controller ada atau tidak
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];  // jika ada, timpa, maka controller akan di set sesuai dengan url
            unset($url[0]); // menghapus url yang pertama[0] agar tidak terjadi error
        }

        require '../app/controllers/' . $this->controller . '.php'; // memanggil controller yang telah ditentukan
        $this->controller = new $this->controller; // instansiasi controller

        // METHOD
        // cek apakah method ada atau tidak
        if (isset($url[1])) {
            // cek apakah method ada atau tidak
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1]; // jika ada, timpa, maka method akan di set sesuai dengan url
                unset($url[1]); // menghapus url yang kedua[1] agar tidak terjadi error
            }
        }

        // PARAMETER
        // mengecek parameter ada atau tidak
        if (!empty($url)) {
            $this->params = array_values($url); // jika ada, timpa, maka parameter akan di set sesuai dengan url
        }

        // jalankan controller dan method, serta kirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // memanggil url dan memecahkannya
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($_GET['url'], '/'); // menghapus tanda '/' di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan url dari karakter aneh
            $url = explode('/', $url); // memecah url menjadi array
            return $url;
        }
    }
}
