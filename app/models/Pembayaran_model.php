<?php

class Pembayaran_model
{
    // property
    private $table = "tb_pembayaran";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllPembayaran()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_bayar DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil semua row data
    public function getAllDataPembayaran()
    {
        $query = 'SELECT id_bayar FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->count();
    }

    // method untuk mengambil semua data berdasarkan keterangan
    public function getAllPembayaranByKet()
    {
        $query = 'SELECT ' . $this->table . '.*, tb_siswa.* FROM ' . $this->table . ' JOIN tb_siswa ON ' . $this->table . '.nis = tb_siswa.nis WHERE ' . $this->table . '.keterangan = "belum lunas" ORDER BY id_bayar DESC LIMIT 5';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan id
    public function getPembayaranById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_bayar=:id';

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan nis
    public function getPembayaranByNis($nis)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        return $this->db->single();
    }

    // method untuk mengambil data pembayaran berdasarkan nis
    public function getPembayaranByNisAll($nis)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }

    // method untuk mengambil data pembayaran berdasarkan nis dengan limit
    public function getPembayaranByNisAllLimit($nis, $startData, $totalDataPerPage)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis LIMIT :startData, :totalDataPerPage';

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan id bayar dan nis
    public function getPembayaranByIdBayarAndNis($idBayar, $nis)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_bayar=:id_bayar AND nis=:nis';

        $this->db->query($query);
        $this->db->bind('id_bayar', $idBayar);
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan nis dan bulan
    public function getPembayaranByNisAndMonth($nis, $bulan)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis AND bulan=:bulan';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('bulan', $bulan);
        return $this->db->resultSet();
    }

    // method untuk menambah data
    public function addDataPembayaran($nisSiswa, $jatuhTempo, $idSpp, $bulan, $tahun)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (0, :nis, :id_spp, :jatuh_tempo, :bulan, :tahun, null, null, null)";

        $this->db->query($query);
        $this->db->bind('nis', $nisSiswa);
        $this->db->bind('id_spp', $idSpp);
        $this->db->bind('jatuh_tempo', $jatuhTempo);
        $this->db->bind('bulan', $bulan);
        $this->db->bind('tahun', $tahun);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // method untuk update data pembayaran
    public function updatePembayaran($idBayar, $jumlahBayar, $ket, $sisaBayar)
    {
        $query = "UPDATE " . $this->table . " SET jumlah_bayar=:jumlah_bayar, keterangan=:keterangan, sisa_bayar=:sisa_bayar WHERE id_bayar=:id_bayar";

        $this->db->query($query);
        $this->db->bind('jumlah_bayar', $jumlahBayar);
        $this->db->bind('keterangan', $ket);
        $this->db->bind('sisa_bayar', $sisaBayar);
        $this->db->bind('id_bayar', $idBayar);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
