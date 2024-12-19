<?php
// Controller Default = Home
// Method Default = Index

// Class ini akan extends ke Controller.php
// public function Index($this->params);
// Jadikan Home Child class Controller Agar fungsi view() dapat di panggil
class Home extends Controller {
    public function Index() {
        $data['judul'] = 'Main Session';
        // Mengirimkan parameter $data['nama', 'jurusan', 'nim']
        // Misalnya setelah login
        $data['nama'] = $this->model('User_model')->getUser();     //----> diporeleh dari User_model
        $this->view('Templates/Header', $data);     //TAMPILAN HEADER DARI TEMPLATES 
        $this->view('Home/Index', $data);
        $this->view('Templates/Footer');            //TAMPILAN FOOTER DARI TEMPLATES 
    }
}