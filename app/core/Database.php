<?php

class Database
{
    public $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check koneksi
        if (!$this->koneksi) {
            die('Koneksi Gagal: ' . mysqli_connect_error() . '.<br><a href="' . BASEURL . 'siswa"> Kembali ke halaman sebelumnya</a>');
        }
    }

    public function query($query)
    {
        $query = mysqli_query($this->koneksi, $query);
        // // Check query
        if (!$query) {
            die('Query Gagal: ' . mysqli_error($this->koneksi) . '.<br><a href="' . BASEURL . 'siswa"> Kembali ke halaman sebelumnya</a>');
        }
        return $query;
    }

    public function fetchData($query)
    {
        return mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }

    public function checkData($query)
    {
        if (!$this->fetchData($query)) {
            die('Data tidak ditemukan.<br><a href="' . BASEURL . 'siswa"> Kembali ke halaman sebelumnya</a>');
        }
        return $this->fetchData($query);
    }
}
