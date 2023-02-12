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

    public function getSppById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_angkatan=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addDataSpp($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (0, :angkatan, :nominal)';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataSpp($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET angkatan=:angkatan, nominal=:nominal WHERE id_angkatan=:id_angkatan';

        $this->db->query($query);
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('nominal', htmlspecialchars($data['nominal']));

        $this->db->bind('id_angkatan', $data['id_angkatan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDataSpp($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_angkatan=:id ';

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
