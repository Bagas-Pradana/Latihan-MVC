<?php

class Database {
    // Config from config.php
    private $host = DB_HOST,
            $user = DB_USER,
            $pass = DB_PASS,
            $db_name = DB_NAME;

    // Koneksi
    private $dbh,
            $stmt;

    public function __construct()
    {
        // Kedepannya jika menampung username dan password dibuat di file berbeda
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};";
        // option sebagai parameter optimasi koneksi database 
        $option = [
            PDO::ATTR_PERSISTENT => true,       //Membuat koneksi terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  //Mode Error tampilkan Exception
        ];

        // CHECKING koneksi dengan try catch PDO ditambah optimasi koneksi database dengan $option
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
                // Set atribut PDO agar menampilkan error jika terjadi masalah
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $kacau){
            die($kacau->getMessage());
        }
    }

    // Fungsi handling query database 
    public function query ($query){
        // Agar bisa generate jenis apapun
        // SELECT-INSERT-UPDATE-DELETE
        $this->stmt = $this->dbh->prepare($query);
    }

    // Fungsi Binding data pengaman agar terhindar dari SQL Injection
    public function bind($params, $value, $type = null){
        // WHERE, SET, VALUES
        if(is_null($type)){
            // jika $type kosong
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($params, $value, $type);
    }
    
    // Eksekusi Query
    protected function execute(){
        $this->stmt->execute();
    }

    // Sajikan Hasil Query secara keseluruhan 
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //sajikan Hasil query secara Spesifik
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}