<?php

class Pembayaran_model
{
    private $table = "tb_pembayaran";
    private $db;

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

    // method untuk mengambil data berdasarkan nis dan bulan
    public function getPembayaranByNisAndMonth($nis, $bulan)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis AND bulan_bayar=:bulan';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('bulan', $bulan);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan tanggal 1 dan tanggal 2
    // public function getPembayaranByDate($tanggal1, $tanggal2)
    // {
    //     $query = 'SELECT ' . $this->table . '.*, tb_siswa.nis, tb_siswa.nama_siswa, tb_siswa.kelas FROM ' . $this->table . ' INNER JOIN tb_siswa ON ' . $this->table . '.nis = tb_siswa.nis WHERE tanggal_bayar BETWEEN :tanggal1 AND :tanggal2 ORDER BY tanggal_bayar ASC';

    //     $this->db->query($query);
    //     $this->db->bind('tanggal1', $tanggal1);
    //     $this->db->bind('tanggal2', $tanggal2);
    //     return $this->db->resultSet();
    // }

    // method untuk menambah data
    public function addDataPembayaran($nisSiswa, $jatuhTempo, $idSpp, $bulan, $tahun)
    {
        $query = "INSERT INTO " . $this->table . " VALUES (0, :nis, :id_spp, :jatuh_tempo, :bulan_bayar, :tahun_bayar, null, null, null)";

        $this->db->query($query);
        $this->db->bind('nis', $nisSiswa);
        $this->db->bind('id_spp', $idSpp);
        $this->db->bind('jatuh_tempo', $jatuhTempo);
        $this->db->bind('bulan_bayar', $bulan);
        $this->db->bind('tahun_bayar', $tahun);
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
