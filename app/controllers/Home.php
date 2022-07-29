<?php
class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['nama'] = $this->model('User_model')->getNama();
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
