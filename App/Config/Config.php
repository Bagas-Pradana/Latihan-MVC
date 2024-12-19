<?php
// Simpan URL Absolute untuk Css dan JS
// define('name', value);
// DESIGN CONFIG GUNAKAN CONSTANTA define():
define('BASEURL', 'http://localhost/directory/phpmvc/Public');

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'latihan_mvc');

















































// CHECKING CONFIGURATION DATABASE
// $servername = 'localhost';
// $database = 'latihan_mvc';

// $dsn = "mysql:host=$servername;dbname=$database;";

// try{
//     $konek = new PDO($dsn, 'root', '');
//     // set the PDO erro
//     $konek->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo 'ok';
// }catch(PDOException $kacau){
//     echo"gagal konek" . $kacau->getMessage();
// }

// $stmt = $konek->prepare('SELECT * FROM mahasiswa');       //siapkan query untuk fetch statment
// $stmt->execute();
// // FetchAll data
// var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));