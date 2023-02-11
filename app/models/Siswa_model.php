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

    public function getSiswaByNis($nis)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nis=:nis');
        $this->db->bind('nis', $nis);
        return $this->db->single();
    }

    public function insertSiswa($data)
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

    public function updateSiswa($data)
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

    public function deleteSiswa($nis)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nis', $nis);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariSiswa()
    {
        $keyword = $_POST['keyword'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nis LIKE :keyword OR nama_siswa LIKE :keyword');
        $this->db->bind('keyword', "$keyword");
        return $this->db->resultSet();
    }
}
