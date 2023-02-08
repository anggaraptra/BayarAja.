<?php
class Pegawai_model
{
    private $table = "tb_pegawai";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
