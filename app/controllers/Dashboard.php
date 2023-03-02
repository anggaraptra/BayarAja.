<?php

class Dashboard extends Controller
{
    public function index()
    {
        // cek session login
        if (!@$_SESSION['login']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        if (@$_SESSION['login'] && !@$_SESSION['level'] == 'admin' || !@$_SESSION['level'] == 'petugas') {
            echo "<script>
                    alert('Anda tidak memiliki akses ke halaman ini!');
                    window.location.href = '" . BASEURL . "/history';
            </script>";
        }

        // data
        $data['title'] = 'Dashboard';
        $status = [
            'dashboard' => 'active',
            'kelas' => '',
            'siswa' => '',
            'pegawai' => '',
            'spp' => '',
            'pembayaran' => '',
            'history' => '',
            'laporan' => ''
        ];

        // view
        $this->view('templates/header', $data);
        $this->view('templates/navsidebar', $data, $status);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
