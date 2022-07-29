<?php
class App
{
    // Buat controller default
    protected $controller = 'Home';
    // Buat method default
    protected $method = 'index';
    // Buat parameter default (menggunakan array karna parameter bisa banyak)
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Ambil controller dsb dari URL
        // Jika controllernya memang ada
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Jika methodnya dikirimkan di URL
        if (isset($url[1])) {
            // Jika methodnya memang ada
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Jika parameternya ada
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Memanggil controller dsb (sesuai yang dikirimkan di parameter)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/'); // Hapus slash di akhir URL
            $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi (filter/hapus karakter "jahat" yang ada di) URL
            $url = explode('/', $url); // Memecah URL menjadi array
            return $url;
        }
    }
}
