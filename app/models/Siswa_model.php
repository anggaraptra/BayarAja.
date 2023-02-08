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
}
