<?php

class Database
{
    // property untuk koneksi ke database
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // property handler dan statement
    private $dbh;
    private $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options, untuk mengoptimasi koneksi ke database
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        // Bind value
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // mengambil data banyak 
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // mengambil data satu
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // mengambil jumlah baris
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    // mengambil id terakhir
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    // menghitung jumlah row 
    public function count()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}
