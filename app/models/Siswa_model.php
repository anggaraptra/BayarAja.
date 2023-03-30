<?php

class Siswa_model
{
    // property
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

    public function getLastSiswa()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY nis DESC LIMIT 1';

        $this->db->query($query);
        return $this->db->single();
    }

    // method untuk mengambil data berdasarkan id kelas
    public function getSiswaByKelasAndBulan($idKelas, $bulan, $tahun, $angkatan)
    {
        $query = 'SELECT ' . $this->table . '.*, tb_pembayaran.* FROM ' . $this->table . ' JOIN tb_pembayaran ON ' . $this->table . '.nis = tb_pembayaran.nis WHERE ' . $this->table . '.id_kelas = :id_kelas AND ' . $this->table . '.angkatan = :angkatan AND tb_pembayaran.bulan = :bulan AND tb_pembayaran.tahun = :tahun ORDER BY ' . $this->table . '.nis ASC';

        $this->db->query($query);
        $this->db->bind('id_kelas', $idKelas);
        $this->db->bind('bulan', $bulan);
        $this->db->bind('tahun', $tahun);
        $this->db->bind('angkatan', $angkatan);
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

    public function getSiswaWithLimit($startData, $totalDataPerPage)
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nis DESC LIMIT :startData, :totalDataPerPage";

        $this->db->query($query);
        $this->db->bind('startData', $startData, PDO::PARAM_INT);
        $this->db->bind('totalDataPerPage', $totalDataPerPage, PDO::PARAM_INT);

        $this->db->execute();
        return $this->db->resultSet();
    }

    // method untuk menambah data
    public function addDataSiswa($data)
    {
        $nis = htmlspecialchars($data['nis']);
        $password = password_hash(htmlspecialchars($data['password']), PASSWORD_BCRYPT);
        $tanggalMasuk = $data['tanggal_masuk'];
        $angkatan = htmlspecialchars($data['angkatan']);
        $namaSiswa = htmlspecialchars($data['nama_siswa']);
        $idKelas = htmlspecialchars($data['id_kelas']);
        $telp = htmlspecialchars($data['telp']);
        $alamat = htmlspecialchars($data['alamat']);
        $telpOrtu = htmlspecialchars($data['telp_ortu']);

        $query = 'INSERT INTO ' . $this->table . ' VALUES (0, :nis, :password, :tanggal_masuk, :angkatan, :nama_siswa, :id_kelas, :telp, :alamat, :telp_ortu)';

        $this->db->query($query);
        $this->db->bind('nis', $nis);
        $this->db->bind('password', $password);
        $this->db->bind('tanggal_masuk', $tanggalMasuk);
        $this->db->bind('angkatan', $angkatan);
        $this->db->bind('nama_siswa', $namaSiswa);
        $this->db->bind('id_kelas', $idKelas);
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
        $query = 'UPDATE ' . $this->table . ' SET nama_siswa=:nama_siswa, id_kelas=:id_kelas, angkatan=:angkatan, telp=:telp, alamat=:alamat, telp_ortu=:telp_ortu, password=:password WHERE nis=:nis';

        $this->db->query($query);
        $this->db->bind('nama_siswa', htmlspecialchars($data['nama_siswa']));
        $this->db->bind('id_kelas', htmlspecialchars($data['id_kelas']));
        $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));
        $this->db->bind('telp', htmlspecialchars($data['telp']));
        $this->db->bind('alamat', htmlspecialchars($data['alamat']));
        if ($data['password'] == '') {
            $this->db->bind('password', $data['password_lama']);
        } else {
            $this->db->bind('password', password_hash(htmlspecialchars($data['password']), PASSWORD_BCRYPT));
        }
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
    public function searchSiswaByNis()
    {
        if (@$_POST['keyword']) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = !null;
        }

        $query = 'SELECT * FROM ' . $this->table . ' WHERE nis LIKE :keyword';

        $this->db->query($query);
        $this->db->bind('keyword', "$keyword");
        return $this->db->single();
    }

    // method untuk mencari data siswa sesuai dengan nama dan nis
    public function searchSiswa()
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
        return $this->db->single();
    }
}
