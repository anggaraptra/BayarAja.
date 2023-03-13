<?php

class Spp_model
{
    private $table = "tb_spp";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllSpp()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_spp DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan angkatan
    public function getSppById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_spp=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getSppByAngkatan($angkatan)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE angkatan = :angkatan';

        $this->db->query($query);
        $this->db->bind('angkatan', $angkatan);
        return $this->db->single();
    }

    // method untuk menambah data
    public function addDataSpp($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (null, :angkatan, :nominal)';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mengubah data
    public function updateDataSpp($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET angkatan=:angkatan, nominal=:nominal WHERE id_spp=:id';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->bind('id', $data['id_spp']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk menghapus data
    public function deleteDataSpp($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_spp=:id ';

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
