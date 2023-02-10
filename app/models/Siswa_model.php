<?php
class Siswa_model
{
    private $table = "tb_siswa";
    private $db;

    // Constructor untuk memanggil dan instansiasi class Database
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function cariSiswa()
    {
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nis LIKE :keyword OR nama_siswa LIKE :keyword");
        $this->db->bind('keyword', "$keyword");
        return $this->db->resultSet();
    }
}
