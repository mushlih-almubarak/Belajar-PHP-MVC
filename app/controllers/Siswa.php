<?php

class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();

        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);

        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambahSiswa()
    {
        if (!isset($_POST['nama']) || !isset($_POST['no_hp']) || !isset($_POST['alamat']) || !isset($_POST['hobi'])) {
            header('Location: ' . BASEURL . 'siswa');
            exit;
        }

        $this->model('Siswa_model')->tambahSiswa();

        Flasher::setFlash('berhasil ditambahkan', 'success');
        header('Location: ' . BASEURL . 'siswa');
        exit;
    }

    public function hapusSiswa($id)
    {
        $this->model('Siswa_model')->hapusSiswa($id);

        Flasher::setFlash('berhasil dihapus', 'success');
        header('Location: ' . BASEURL . 'siswa');
        exit;
    }

    public function getUbahSiswa()
    {
        if (!isset($_POST['id'])) {
            header('Location: ' . BASEURL . 'siswa');
            exit;
        }

        $id = $_POST['id']; // Diambil dari data yang dikirimkan melalui ajax
        $hasil = $this->model('Siswa_model')->getSiswaById($id);
        // Ubah datanya ke json
        echo json_encode($hasil);
    }

    public function ubahSiswa($id)
    {
        if (!isset($_POST['nama']) || !isset($_POST['no_hp']) || !isset($_POST['alamat']) || !isset($_POST['hobi'])) {
            header('Location: ' . BASEURL . 'siswa');
            exit;
        }

        $this->model('Siswa_model')->ubahSiswa($id);

        Flasher::setFlash('berhasil diubah', 'success');
        header('Location: ' . BASEURL . 'siswa');
        exit;
    }

    public function cariSiswa()
    {
        $keyword = $_POST['keyword'];
        $data['judul'] = 'Hasil Pencarian dari "' . $keyword . '"';
        $data['siswa'] = $this->model('Siswa_model')->cariSiswa($keyword);

        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
}
