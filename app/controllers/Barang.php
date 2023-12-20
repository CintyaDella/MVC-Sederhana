<?php

class Barang extends Controller{
    public function index()
    {
        $data['judul'] = 'Daftar Barang';
        $data['brg'] = $this->model('Barang_model')->getAllbarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Barang';
        $data['brg'] = $this->model('Barang_model')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('barang/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        // menjalankan sebuah method dalam model yang namanya add data barang yang mengirimkan data ($_POST) dan menghasilkan nilai > dari 0 berarti ada baris baru yang ditambahkan
        if( $this->model('Barang_model')->addDataBarang($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            // maka data berhasil masuk. setelah berhasil masuk maka kita redirect pindahkan ke halaman utama barang
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function delete($id)
    {
        // menjalankan sebuah method dalam model yang namanya add data barang yang mengirimkan data ($_POST) dan menghasilkan nilai > dari 0 berarti ada baris baru yang ditambahkan
        if( $this->model('Barang_model')->deleteDataBarang($id) > 0 ){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            // maka data berhasil masuk. setelah berhasil masuk maka kita redirect pindahkan ke halaman utama barang
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function getUpdate()
    {
        // json_encode : agar data berbentuk json tidak aray assosiatif
        echo json_encode($this->model('Barang_model')->getBarangById($_POST['id']));
      
        // json akan dikirimkan ke data diskrit
    }

    public function edit()
    {
        // menjalankan sebuah method dalam model yang namanya edit data barang yang mengirimkan data ($_POST) dan menghasilkan nilai > dari 0 berarti ada baris baru yang ditambahkan
        if( $this->model('Barang_model')->editDataBarang($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            // maka data berhasil masuk. setelah berhasil masuk maka kita redirect pindahkan ke halaman utama barang
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function search()
    {
        $data['judul'] = 'Daftar Barang';
        $data['brg'] = $this->model('Barang_model')->searchDataBarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function getDetail()
    {
        $id = $_POST['id'];
        $data['brg'] = $this->model('Barang_model')->getBarangById($id);
        echo json_encode($data['brg']);
    }

}
?>