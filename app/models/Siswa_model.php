<?php

class Siswa_model
{
    // property untuk menampung nama tabel
    private $table = "tb_siswa";
    private $db;

    // constructor untuk memanggil dan instansiasi class database
    public function __construct()
    {
        $this->db = new Database();
    }

    // method untuk mengambil semua data
    public function getAllSiswa()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY nis DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan nis siswa
    public function getSiswaByNis($nis)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan nis dan password
    public function getSiswaByNisAndPassword($nis, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis=:nis AND password=:password';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('password', $password);
        return $this->db->single();
    }


    // get siswa by kelas and bulan bayar
    public function getSiswaByKelasAndBulan($kelas, $bulan)
    {
        $query = 'SELECT ' . $this->table . '.*, tb_kelas.kelas, tb_kelas.id_kelas, tb_pembayaran.jumlah_bayar, tb_pembayaran.bulan_bayar FROM ' . $this->table . ' JOIN tb_kelas ON ' . $this->table . '.id_kelas = tb_kelas.id_kelas JOIN tb_pembayaran ON ' . $this->table . '.nis = tb_pembayaran.nis WHERE tb_kelas.kelas = :kelas AND tb_pembayaran.bulan_bayar = :bulan ORDER BY nis ASC';

        $this->db->query($query);
        $this->db->bind('kelas', $kelas);
        $this->db->bind('bulan', $bulan);
        return $this->db->resultSet();
    }

    // method untuk menambah data
    public function addDataSiswa($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (:nis, :nama_siswa, :id_kelas, :angkatan, :telp, :alamat, :telp_ortu, :password)';

        $this->db->query($query);
        $this->db->bind('nis', htmlspecialchars($data['nis']));
        $this->db->bind('nama_siswa', htmlspecialchars($data['nama_siswa']));
        $this->db->bind('id_kelas', htmlspecialchars($data['id_kelas']));
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('alamat', htmlspecialchars($data['alamat']));
        $this->db->bind('telp_ortu', htmlspecialchars($data['telp_ortu']));
        $this->db->bind('password', htmlspecialchars($data['password']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mengubah data
    public function updateDataSiswa($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET nama_siswa=:nama_siswa, id_kelas=:id_kelas, angkatan=:angkatan, telp=:telp, alamat=:alamat, telp_ortu=:telp_ortu, password=:password WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nama_siswa', htmlspecialchars($data['nama_siswa']));
        $this->db->bind('id_kelas', htmlspecialchars($data['id_kelas']));
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('alamat', htmlspecialchars($data['alamat']));
        $this->db->bind('telp_ortu', htmlspecialchars($data['telp_ortu']));
        $this->db->bind('password', htmlspecialchars($data['password']));
        $this->db->bind('nis', htmlspecialchars($data['nis']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk menghapus data
    public function deleteDataSiswa($nis)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nis', $nis);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // method untuk mencari data siswa
    public function searchDataSiswa()
    {
        if (@$_POST['keyword']) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = !null;
        }

        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis LIKE :keyword OR nama_siswa LIKE :keywordName';

        $this->db->query($query);
        $this->db->bind('keyword', "$keyword");
        $this->db->bind('keywordName', "%$keyword%");
        return $this->db->resultSet();
    }
}
