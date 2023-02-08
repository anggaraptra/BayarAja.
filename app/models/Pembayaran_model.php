<?php
class Pembayaran_model
{
    private $table = "tb_pembayaran";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPembayaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
