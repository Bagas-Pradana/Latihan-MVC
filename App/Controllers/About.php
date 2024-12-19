<?php
class About extends Controller {
    // Controller Default = Home
    // Method Default = Index

    // Tambahkan Params Index($value, $value2)
    // public function Index($this->params);
    // tangani jika Parameter default agar tidak error $value = null, $value2=null
    public function Index($nama = 'Bagas Pradana', $jurusan = '20', $nim = '201542331') {
        // Fungsi disini akan Menerima data dari $data=[] dari Function View();
        $data['nama'] = $nama;
        $data['jurusan'] = $jurusan;
        $data['nim'] = $nim;
        $data['judul'] = 'About Us!';
        $this->view('Templates/Header', $data);
        $this->view('About/Index', $data);
        $this->view('Templates/Footer');
    }


    public function Halaman() {
        $data['judul'] = 'My Page';
        $this->view('Templates/Header', $data);
        $this->view('About/Halaman');
        $this->view('Templates/Footer');
    }
}