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

    // method untuk menghitung jumlah data
    public function getAllDataSiswa()
    {
        $query = 'SELECT nis FROM ' . $this->table;

        $this->db->query($query);
        return $this->db->count();
    }

    // method untuk mengambil semua data
    public function getAllSiswa()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY nis DESC';

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // method untuk mengambil data berdasarkan id
    public function getSiswaById($idSiswa)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_siswa=:id_siswa';

        $this->db->query($query);
        $this->db->bind('id_siswa', $idSiswa);
        return $this->db->single();
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
        $nis = htmlspecialchars($data['nis']);
        // $password = password_hash(htmlspecialchars($data['password']), PASSWORD_BCRYPT);
        $password = htmlspecialchars($data['password']);
        $tanggalMasuk = $data['tanggal_masuk'];
        $angkatan = htmlspecialchars($data['angkatan']);
        $namaSiswa = htmlspecialchars($data['nama_siswa']);
        $kelas = htmlspecialchars($data['kelas']);
        $telp = htmlspecialchars($data['telp']);
        $alamat = htmlspecialchars($data['alamat']);
        $telpOrtu = htmlspecialchars($data['telp_ortu']);

        $query = 'INSERT INTO ' . $this->table . ' VALUES (0, :nis, :password, :tanggal_masuk, :angkatan, :nama_siswa, :kelas, :telp, :alamat, :telp_ortu)';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('password', $password);
        $this->db->bind('tanggal_masuk', $tanggalMasuk);
        $this->db->bind('angkatan', $angkatan);
        $this->db->bind('nama_siswa', $namaSiswa);
        $this->db->bind('kelas', $kelas);
        $this->db->bind('telp', $telp);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('telp_ortu', $telpOrtu);

        $this->db->execute();
        return [
            'rowCount' => $this->db->rowCount(),
            'lastInsertId' => $this->db->lastInsertId(),
        ];
    }

    // method untuk mengubah data
    public function updateDataSiswa($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET nama_siswa=:nama_siswa, kelas=:kelas, angkatan=:angkatan, telp=:telp, alamat=:alamat, telp_ortu=:telp_ortu, password=:password WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nama_siswa', htmlspecialchars($data['nama_siswa']));
        $this->db->bind('kelas', htmlspecialchars($data['kelas']));
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('alamat', htmlspecialchars($data['alamat']));
        $this->db->bind('password', htmlspecialchars($data['password']));
        $this->db->bind('telp_ortu', htmlspecialchars($data['telp_ortu']));

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
