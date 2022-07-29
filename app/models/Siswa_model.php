<?php

class Siswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSiswa()
    {
        return $this->db->checkData("SELECT * FROM siswa");
    }

    public function getSiswaById($id)
    {
        return $this->db->checkData("SELECT * FROM siswa WHERE id = $id");
    }

    public function tambahSiswa()
    {
        $nama = strip_tags($_POST['nama']);
        $no_hp = strip_tags($_POST['no_hp']);
        $alamat = strip_tags($_POST['alamat']);
        $hobi = strip_tags($_POST['hobi']);
        $this->db->query("INSERT INTO siswa VALUES ('', '$nama', '$no_hp', '$alamat', '$hobi')");
    }

    public function hapusSiswa($id)
    {
        $this->db->query("DELETE FROM siswa WHERE id = $id");
    }

    public function ubahSiswa($id)
    {
        $nama = strip_tags($_POST['nama']);
        $no_hp = strip_tags($_POST['no_hp']);
        $alamat = strip_tags($_POST['alamat']);
        $hobi = strip_tags($_POST['hobi']);
        $this->db->query("UPDATE siswa SET nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', hobi = '$hobi' WHERE id = $id");
    }

    public function cariSiswa($keyword)
    {
        if (!isset($keyword)) {
            header('Location: ' . BASEURL . 'siswa');
            exit;
        }

        return $this->db->checkData("SELECT * FROM siswa WHERE nama LIKE '%$keyword%'");
    }
}
