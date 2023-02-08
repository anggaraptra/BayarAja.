<?php

class Dashboard extends Controller
{
    public function index()
    {
        // data
        $data['judul'] = 'Dashboard';
        // model
        // 
        // view
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
