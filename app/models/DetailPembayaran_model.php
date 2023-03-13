<?php

class DetailPembayaran_model
{
    private $table = "tb_detail_pembayaran";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllDetailPembayaran()
    {
        $query = 'SELECT * FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan id
    public function getDetailPembayaranById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_detail=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method untuk mengambil data sesuai id pembayaran
    public function getDetailPembayaranByIdBayar($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_bayar=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addDetailPembayaran($tanggalBayar, $jumlahBayar, $uangKembali, $idPegawai, $idBayar)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (null, :tanggal_bayar, :total_bayar, :kembalian, :id_pegawai, :id_bayar)";

        $this->db->query($query);
        $this->db->bind('tanggal_bayar', $tanggalBayar);
        $this->db->bind('total_bayar', $jumlahBayar);
        $this->db->bind('kembalian', $uangKembali);
        $this->db->bind('id_pegawai', $idPegawai);
        $this->db->bind('id_bayar', $idBayar);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
