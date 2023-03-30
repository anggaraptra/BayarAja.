<?php

class Pegawai_model
{
    // property
    private $table = "tb_pegawai";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllPegawai()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_pegawai DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil semua data berdasarkan level petugas
    public function getAllPetugas()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE level!=:level ORDER BY id_pegawai DESC';

        $this->db->query($query);
        $this->db->bind('level', 'admin');
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan id
    public function getPegawaiById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pegawai=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan username
    public function getPegawaiByUsername($username)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username=:username';

        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan username dan password    
    public function getPegawaiByUsernameAndPassword($username, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username=:username AND password=:password';

        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        return $this->db->single();
    }

    public function getPegawaiWithLimit($startData, $totalDataPerPage)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE level!=:level ORDER BY id_pegawai DESC LIMIT :startData, :totalDataPerPage";

        $this->db->query($query);
        $this->db->bind('level', 'admin');
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);

        $this->db->execute();
        return $this->db->resultSet();
    }

    // method untuk menambah data
    public function addDataPegawai($data)
    {
        $namaLengkap = htmlspecialchars($data['nama_lengkap']);
        $telp = htmlspecialchars($data['telp']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash(htmlspecialchars($data['password']), PASSWORD_BCRYPT);
        $level = htmlspecialchars($data['level']);

        $query = "INSERT INTO " . $this->table . " VALUES (0, :nama_lengkap, :telp, :username, :password, :level)";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $namaLengkap);
        $this->db->bind('telp', $telp);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('level', $level);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mengubah data
    public function updateDataPegawai($data)
    {
        $query = "UPDATE " . $this->table . " SET nama_lengkap=:nama_lengkap, telp=:telp, username=:username, password=:password, level=:level WHERE id_pegawai=:id";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', htmlspecialchars($data['nama_lengkap']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('username', htmlspecialchars($data['username']));
        if ($data['password'] == '') {
            $this->db->bind('password', $data['password_lama']);
        } else {
            $this->db->bind('password', password_hash(htmlspecialchars($data['password']), PASSWORD_BCRYPT));
        }
        $this->db->bind('level', htmlspecialchars($data['level']));

        $this->db->bind('id', $data['id_pegawai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk menghapus data
    public function deleteDataPegawai($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pegawai=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
