<?php

class barang_model {
    private $table = 'stokbarang';
    private $db;

    //ketika dipanggil constructnya langsung connect ke class database
    // ketika class barang_model dipanggil dalam controller maka otomatis langsung instansiasi class Database
    // jadi bisa pakai semua method di dalamnya
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllbarang()
    {
        $this->db->query(' SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        // kenapa tidak langsung menggunakan $id?
        // untuk menyimpan data yang akan digunakan, untuk menghindari sql injection dan mengamankan query kita
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id ');
        $this->db->bind('id', $id);
        // jika datanya hanya satu maka menggunakan sinhle
        // jika datanya banyak maka menggukana resultSet
        return $this->db->single();
    }

    public function addDataBarang($data)
    {
        $query = "INSERT INTO stokbarang
                    VALUES
                    ('', :nama, :stok, :harga)";
        $this->db->query($query);
        // nama diambil dari nama yang diinputkan dalam form
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDataBarang($id)
    {
        $query = "DELETE FROM stokbarang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        // jika berhasil dihapus maka return akan mengasilkan angka 1, jika berhasil menghasilkan angka 1 maka
        // if( $this->model('Barang_model')->deleteDataBarang($id) > 0 ) dalam Barang.php di folder controller bernilai true
        return $this->db->rowCount();
    }

    public function editDataBarang($data)
    {
        $query = "UPDATE stokbarang SET
                    nama = :nama,
                    stok = :stok,
                    harga = :harga
                    WHERE id = :id";

        $this->db->query($query);
        // nama diambil dari nama yang diinputkan dalam form
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchDataBarang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM stokbarang WHERE nama LIKE :keyword";
        $this->db->query($query);
        // nama diambil dari nama yang diinputkan dalam form
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
        // ketika searchDataBarang dijalankan data akan dikirim ke controller barang masuk ke $data ['brg'] dikirim ke index lalu dipanggil di foreach
    }

    

}
?>