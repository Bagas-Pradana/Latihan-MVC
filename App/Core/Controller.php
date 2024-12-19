<?php
class Controller {
    // memiliki 2 parameter untuk View dari file Controller yang akan di arahkan ke file index.php 
    // $view = ('Home/Index');
    // $data = data yang dikirim ke function view 
    public function view($view, $data = []){        //TAMPILAN DARI TEMPLATES DAN CONTENT
        // Memanggil File index.php di folder views
        require_once '../App/Views/' . $view . '.php';
        // var_dump($data);
    }
    public function model($model) {
        require '../App/Models/' . $model . '.php';
        // karena isinya model adalah class User_model maka perlu di inisiasi
        return new $model;
    }
}