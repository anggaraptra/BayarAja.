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
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY angkatan DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan angkatan
    public function getSppByAngkatan($angkatan)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE angkatan=:angkatan';

        $this->db->query($query);
        $this->db->bind('angkatan', $angkatan);
        return $this->db->single();
    }

    // method untuk menambah data
    public function addDataSpp($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (:angkatan, :nominal)';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mengubah data
    public function updateDataSpp($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET nominal=:nominal WHERE angkatan=:angkatan';

        $this->db->query($query);
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk menghapus data
    public function deleteDataSpp($angkatan)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE angkatan=:angkatan ';

        $this->db->query($query);
        $this->db->bind('angkatan', $angkatan);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
