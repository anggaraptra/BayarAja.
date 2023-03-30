<?php

class Kelas_model
{
    // property
    private $table = "tb_kelas";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
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

    // method untuk mengambil semua row data
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

    // method untuk mengambil data berdasarkan nama kelas
    public function getKelasByNama($kelas)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE kelas=:kelas';

        $this->db->query($query);
        $this->db->bind('kelas', $kelas);
        return $this->db->single();
    }

    public function getKelasWithLimit($startData, $totalDataPerPage)
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_kelas DESC LIMIT :startData, :totalDataPerPage";

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);

        $this->db->execute();
        return $this->db->resultSet();
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
