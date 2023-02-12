<?php
class Kelas_model
{
    private $table = "tb_kelas";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addDataKelas($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (0, :kelas, :keterangan)";

        $this->db->query($query);
        $this->db->bind('kelas', htmlspecialchars($data['kelas']));
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataKelas($data)
    {
        $query = "UPDATE " . $this->table . " SET kelas=:kelas, keterangan=:keterangan WHERE id_kelas=:id";

        $this->db->query($query);
        $this->db->bind('kelas', htmlspecialchars($data['kelas']));
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->bind('id', $data['id_kelas']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDataKelas($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_kelas=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
