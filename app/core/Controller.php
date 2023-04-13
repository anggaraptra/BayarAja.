<?php

class Controller
{
    // method untuk memanggil model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php'; // memanggil model
        return new $model; // instansiasi model
    }

    // method untuk memanggil view dan mengirimkan data
    public function view($view, $data = [], $activeTab = '')
    {
        require_once '../app/views/' . $view . '.php'; // memanggil view
    }
}
