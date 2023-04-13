<?php

class DetailPembayaran_model
{
    // property
    private $table = "tb_detail_pembayaran";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllDetailPembayaran()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_detail DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil semua row data
    public function getAllDataDetailPembayaran()
    {
        $query = 'SELECT id_detail FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->count();
    }

    // method untuk mengambil 5 data terbaru
    public function getAllDetailPembayaranLatest()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_detail DESC LIMIT 5';

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

    // method untuk mengambil data berdasarkan nis dari tabel pembayaran
    public function getDetailPembayaranByNis($nis)
    {
        $query = 'SELECT ' . $this->table . '.*, tb_pembayaran.* FROM ' . $this->table . ' JOIN tb_pembayaran ON ' . $this->table . '.id_bayar = tb_pembayaran.id_bayar WHERE tb_pembayaran.nis = :nis ORDER BY id_detail DESC';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan nis dari tabel pembayaran dengan limit
    public function getDetailPembayaranByNisLimit($nis, $startData, $totalDataPerPage)
    {
        $query = 'SELECT ' . $this->table . '.*, tb_pembayaran.* FROM ' . $this->table . ' JOIN tb_pembayaran ON ' . $this->table . '.id_bayar = tb_pembayaran.id_bayar WHERE tb_pembayaran.nis = :nis ORDER BY id_detail DESC LIMIT :startData, :totalDataPerPage';

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan tanggal
    public function getDetailPembayaranByDate($tanggal1, $tanggal2)
    {
        $query = 'SELECT ' . $this->table . '.*, tb_pembayaran.*, tb_siswa.id_kelas, tb_siswa.nama_siswa FROM ' . $this->table . ' JOIN tb_pembayaran ON ' . $this->table . '.id_bayar = tb_pembayaran.id_bayar JOIN tb_siswa ON tb_pembayaran.nis = tb_siswa.nis WHERE ' . $this->table . '.tanggal_bayar BETWEEN :tanggal1 AND :tanggal2 ORDER BY tanggal_bayar ASC';

        $this->db->query($query);
        $this->db->bind('tanggal1', $tanggal1);
        $this->db->bind('tanggal2', $tanggal2);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan dengan limit
    public function getDetailPembayaranWithLimit($startData, $totalDataPerPage)
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_detail DESC LIMIT :startData, :totalDataPerPage";

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);

        $this->db->execute();
        return $this->db->resultSet();
    }

    // method untuk menambah data detail pembayaran
    public function addDetailPembayaran($tanggalBayar, $jumlahBayar, $uangKembali, $namaPegawai, $idBayar)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (null, :tanggal_bayar, :total_bayar, :kembalian, :nama_lengkap, :id_bayar)";

        $this->db->query($query);
        $this->db->bind('tanggal_bayar', $tanggalBayar);
        $this->db->bind('total_bayar', $jumlahBayar);
        $this->db->bind('kembalian', $uangKembali);
        $this->db->bind('nama_lengkap', $namaPegawai);
        $this->db->bind('id_bayar', $idBayar);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
