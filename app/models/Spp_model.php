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
}
