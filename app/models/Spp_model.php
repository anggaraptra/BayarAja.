<?php

class Spp_model
{
    // property 
    private $table = "tb_spp";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
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

    // method untuk mengambil semua row data
    public function getAllDataSpp()
    {
        $query = 'SELECT id_spp FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->count();
    }

    // method untuk mengambil data berdasarkan id
    public function getSppById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_spp=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan angkatan
    public function getSppByAngkatan($angkatan)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE angkatan = :angkatan';

        $this->db->query($query);
        $this->db->bind('angkatan', $angkatan);
        return $this->db->single();
    }

    // method untuk mengambil data dengan limit
    public function getSppWithLimit($startData, $totalDataPerPage)
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_spp DESC LIMIT :startData, :totalDataPerPage";

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);

        $this->db->execute();
        return $this->db->resultSet();
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
