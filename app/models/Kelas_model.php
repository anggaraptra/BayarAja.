<?php

class Kelas_model
{
    private $table = "tb_kelas";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllKelas()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_kelas DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllDataKelas()
    {
        $query = 'SELECT id_kelas FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->count();
    }

    // method untuk mengambil data berdasarkan id
    public function getKelasById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getKelasByNama($kelas)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE kelas=:kelas';

        $this->db->query($query);
        $this->db->bind('kelas', $kelas);
        return $this->db->single();
    }

    // method untuk menambah data
    public function addDataKelas($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (0, :kelas, :keterangan)";

        $this->db->query($query);
        $this->db->bind('kelas', htmlspecialchars($data['kelas']));
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mengubah data
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

    // method untuk menghapus data
    public function deleteDataKelas($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_kelas=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
