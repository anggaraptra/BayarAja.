<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk melakukan login dan mengisi session
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // admin dan petugas
        $this->db->query('SELECT * FROM tb_pegawai WHERE username=:username AND password=:password');
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->execute();
        $rowPegawai = $this->db->single();

        if ($rowPegawai && $rowPegawai['level'] == 'admin') {
            $_SESSION['login'] = true;
            $_SESSION['id_pegawai'] = $rowPegawai['id_pegawai'];
            $_SESSION['username'] = $rowPegawai['username'];
            $_SESSION['nama'] = $rowPegawai['nama_pegawai'];
            $_SESSION['level'] = $rowPegawai['level'];
            return $this->db->rowCount();
        } elseif ($rowPegawai && $rowPegawai['level'] == 'petugas') {
            $_SESSION['login'] = true;
            $_SESSION['id_pegawai'] = $rowPegawai['id_pegawai'];
            $_SESSION['username'] = $rowPegawai['username'];
            $_SESSION['nama'] = $rowPegawai['nama_pegawai'];
            $_SESSION['level'] = $rowPegawai['level'];
            return $this->db->rowCount();
        } else {
            // siswa
            $this->db->query('SELECT * FROM tb_siswa WHERE nis=:nis AND password=:password');
            $this->db->bind('nis', $username);
            $this->db->bind('password', $password);
            $this->db->execute();
            $rowSiswa = $this->db->single();

            if ($rowSiswa && $rowSiswa['nis'] == $username && $rowSiswa['password'] == $password) {
                $_SESSION['login'] = true;
                $_SESSION['nis'] = $rowSiswa['nis'];
                $_SESSION['nama'] = $rowSiswa['nama_siswa'];
                return $this->db->rowCount();
            } else {
                return 0;
            }
        }
    }

    // method untuk melakukan logout
    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
    }
}
