<?php
class About extends Controller
{
    // Parameternya dikirim dari file App.php:39
    public function index($nama = 'Mushlih', $pekerjaan = 'Pelajar', $umur = 17)
    {
        $data['judul'] = 'About Me';
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'My Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
