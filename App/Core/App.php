<?php
// File Terpusat
// Related index.php'

// Dalam konsep mengHandling URL dilakukan dengan 4 STEP
// FILE INI YANG DI GUNAKAN OLEH index.php
// STEP 1 -> Menangkap parameter $_GET dan ambil lalu jadikan array
// STEP 2 -> Membuat Controller Default dan Method DEfault dengan menSET kondisi awal di Property Class APP ini
// STEP 3 -> Membuat Controller lainnya dengan membuat fungsi File_exists lalu timpa parameter Controller default dengan Parameter yang baru
// STEP 4 -> Membuat Method lainnya dengan membuat fungsi method_exists lalu timpa parameter method default dengan Parameter yang baru
class App {
    // SETUP Property default (Home, Index, [])
    protected   $controller = 'Home',
                $method = 'Index',
                $params = [];

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __construct() {
        // // $this->var = $var;

        $url = $this->parseURL();
        // // var_dump($url); ----------> DEBUGGING  // echo "test";

        // JIka kosong jadikan Param default
        if (empty($url)) {
            $url = [$this->controller];
        }
        
        // Handling CONTROLLER
        // // cek apakah ada file di dalam folder App/Controller 
        // // Yang namanya sesuai dengan '/Home/'
        // // Cari file di direktory Controllers yang namanya $url[0].php
        if(file_exists('../App/Controllers/' . $url[0] . '.php')){
            // Timpa property controller dengan Array yang ada di $_GET['url']
            $this->controller = $url[0];
            // hilangkan Controller dari elemen array $_GET['url']
            unset($url[0]);
            // var_dump($url);
            // echo"p";
        }

        // Handling METHOD
        // Memanggil File yang ada di Controller 
        // $this->controller yang didapat dari if(file_exists...($this->controller = $url[0];)
        require_once '../App/Controllers/' . $this->controller . '.php';
        // Panggil Class yang ada di file controller
        $this->controller = new $this->controller;

        if (isset($url[1])){
            // method_exists(object, method_name)
            // Ambil Object baru dari ($this->controller = new $this->controller)
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                // hilangkan method dario elemen array
                unset($url[1]);
                // echo "haloo halo bandung";
            }
        }
        // KESIMPULANNYA JIKA Url controller dan url method Hilang(notAppear) maka halaman browser yang dimuat BENAR

        // Handling PARAMS (ambil data Params lalu masukan ke fungsi arry_value)
        if(!empty($url)){
            // var_dump($url);      --------->DEBUGGING
            // Fungsi ini akan berjalan ketika Contrroller(File_exists...) dan Method(Method_exists...) BENAR!
            // Timpa Property Params dengan yang baru
            $this->params = array_values($url);
        }

        // JIKA SEMUA FUNGSI BERJALAN BENAR
        // Jalankan Controller , Method, dan KIrimkan Params Jika ada [call_user_func_array(function_arr, param_arr)]
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    // Handler PARSING $_GET
    public function parseURL(){
        if (isset($_GET['url']) && !empty($_GET['url'])){
            // Pisahkan '/' dari array 
            $url = rtrim($_GET['url'], '/');
            // bersihkan url dari karakter random
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Hilangkan '/' dari array
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}

// DEBUGGING
// ABSOLUTE PATH C:/xampp/htdocs/directory/phpmvc/App/Controllers/Home.php
// public function __construct() {
//     // // $this->var = $var;
//     $url = $this->parseURL();
//     $path = '../App/Controllers/Home.php';
//     echo "Checking path: " . $path . "<br>";

//     if (file_exists($path)) {
//         $this->controller = $url[0];
//         unset($url[0]);
//     } else {
//         echo "ERROR: File not found at " . $path;
//     }

//     var_dump($url);
// }