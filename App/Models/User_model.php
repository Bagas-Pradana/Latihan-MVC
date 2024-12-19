<?php
class User_model {
    private $nama = 'Bagas Pradana';

    // Ambil datanya yang diterima 
    public function getUser() {
        return $this->nama;
    }
}