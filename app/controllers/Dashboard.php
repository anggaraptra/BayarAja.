<?php

class Dashboard extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Dashboard';
        // model
        $data['nama'] = $this->model('Example_model')->getNama();
        // view
        $this->view('templates/header', $data);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
