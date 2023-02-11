<?php
class Spp_model
{
    private $table = "tb_spp";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSpp()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSppByAngkatan($angkatan)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE angkatan=:angkatan');
        $this->db->bind('angkatan', $angkatan);
        return $this->db->single();
    }

    public function insertSpp($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (:angkatan, :nominal)';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateSpp($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET nominal=:nominal WHERE angkatan=:angkatan';

        $this->db->query($query);
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteSpp($angkatan)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE angkatan=:angkatan';

        $this->db->query($query);
        $this->db->bind('angkatan', $angkatan);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
