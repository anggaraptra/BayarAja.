<?php
class Pegawai_model
{
    private $table = "tb_pegawai";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPegawaiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pegawai=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertPegawai($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :nama_pegawai, :telp, :username, :password, :level)";

        $this->db->query($query);
        $this->db->bind('nama_pegawai', htmlspecialchars($data['nama_pegawai']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('username', htmlspecialchars($data['username']));
        $this->db->bind('password', htmlspecialchars($data['password']));
        $this->db->bind('level', htmlspecialchars($data['level']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePegawai($data)
    {
        $query = "UPDATE " . $this->table . " SET nama_pegawai=:nama_pegawai, telp=:telp, username=:username, password=:password, level=:level WHERE id_pegawai=:id";

        $this->db->query($query);
        $this->db->bind('nama_pegawai', htmlspecialchars($data['nama_pegawai']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('username', htmlspecialchars($data['username']));
        $this->db->bind('password', htmlspecialchars($data['password']));
        $this->db->bind('level', htmlspecialchars($data['level']));

        $this->db->bind('id', $data['id_pegawai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePegawai($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pegawai=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
