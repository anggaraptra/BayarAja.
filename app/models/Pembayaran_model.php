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

    public function getPembayaranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_bayar=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertPembayaran($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :id_pegawai, :nis, :tanggal_bayar, :bulan_bayar, :tahun_bayar, :jumlah_bayar, :keterangan)";

        $this->db->query($query);
        $this->db->bind('id_pegawai', htmlspecialchars($data['id_pegawai']));
        $this->db->bind('nis', htmlspecialchars($data['nis']));
        $this->db->bind('tanggal_bayar', htmlspecialchars($data['tanggal_bayar']));
        $this->db->bind('bulan_bayar', htmlspecialchars($data['bulan_bayar']));
        $this->db->bind('tahun_bayar', htmlspecialchars($data['tahun_bayar']));
        $this->db->bind('jumlah_bayar', htmlspecialchars($data['jumlah_bayar']));
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePembayaran($data)
    {
        $query = "UPDATE " . $this->table . " SET id_pegawai=:id_pegawai, nis=:nis, tanggal_bayar=:tanggal_bayar, bulan_bayar=:bulan_bayar, tahun_bayar=:tahun_bayar, jumlah_bayar=:jumlah_bayar, keterangan=:keterangan WHERE id_bayar=:id";

        $this->db->query($query);
        $this->db->bind('id_pegawai', htmlspecialchars($data['id_pegawai']));
        $this->db->bind('nis', htmlspecialchars($data['nis']));
        $this->db->bind('tanggal_bayar', htmlspecialchars($data['tanggal_bayar']));
        $this->db->bind('bulan_bayar', htmlspecialchars($data['bulan_bayar']));
        $this->db->bind('tahun_bayar', htmlspecialchars($data['tahun_bayar']));
        $this->db->bind('jumlah_bayar', htmlspecialchars($data['jumlah_bayar']));
        $this->db->bind('keterangan', htmlspecialchars($data['keterangan']));

        $this->db->bind('id', $data['id_bayar']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePembayaran($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_bayar=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
