<?php
// Ambil Query dari file model yang handling data mahasiswa
class Mahasiswa extends Controller {
    public function Index() {
        $data['judul'] =  'Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->fetchData();
        $this->view('Templates/Header', $data);
        $this->view('Mahasiswa/Index', $data);
        $this->view('Templates/Footer');
    }

    public function Detail($id) {
        $data['judul'] =  'Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('Templates/Header', $data);
        $this->view('Mahasiswa/Detail', $data);
        $this->view('Templates/Footer');
    }
}