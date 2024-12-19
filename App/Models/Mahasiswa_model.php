<?php

// Untuk handling data struktur , data2 beragam Mahasiswa 
// As Example =  kita membuat langsung simulasi data pada property
// MEngolah data mahasiswa yang ada pada Database MYSQL dengan Driver
class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "Bagas Pradana",
    //         "jurusan" => "Teknik Elektronik",
    //         "nim" => "2017364712",
    //         "email" => "gabasprad@gmail.com"
    //     ],
    //     [
    //         "nama" => "Dodik Hetianto",
    //         "jurusan" => "Teknik Informatika",
    //         "nim" => "2018635472",
    //         "email" => "dodik.fans@gmail.com"
    //     ],
    //     [
    //         "nama" => "Erik ladilaksono",
    //         "jurusan" => "Teknik Mesin",
    //         "nim" => "2018636452",
    //         "email" => "erik.mau@gmail.com"
    //     ],
    //     [
    //         "nama" => "Fajar Baduy",
    //         "jurusan" => "Teknik Industri",
    //         "nim" => "2018735472",
    //         "email" => "fajar12@gmail.com"
    //     ],
    //     [
    //         "nama" => "Boy Willia,",
    //         "jurusan" => "Teknik Informatika",
    //         "nim" => "20145243181",
    //         "email" => "boyacc@gmail.com"
    //     ]
    // ];

    private $dbh;           // variabel koneksi PDO
    private $stmt;           // variabel querySQL PDO
    private $table = 'mahasiswa';
    private $db;
    // private $servername = "localhost";
    // private $database = "latihan_mvc";

    // Menggunakan __construct agar data SQL pertama kali dimuat di file ini
    public function __construct()
    {       
        $this->db = new Database;
    }

    protected function getAllData () {
        // return $this->mhs;
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');       //siapkan query untuk fetch statment
        // $this->stmt->execute();
        // // FetchAll data
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);         //Jadikan Array Associative

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Jika kamu ingin tetap menggunakan metode protected untuk getAllData(), 
    // kamu bisa mengakses metode tersebut melalui metode public dalam kelas yang sama. 
    // Pendekatan ini menjaga prinsip enkapsulasi dengan tetap membatasi akses langsung ke metode protected.

    // Metode public sebagai pembungkus
    public function fetchData() {
        return $this->getAllData();
    }
    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}