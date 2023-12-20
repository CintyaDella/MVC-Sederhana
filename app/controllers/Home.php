<?php

class Home extends Controller{
    // method deafult jika tidak menuliskan apapun di url maka method ini yang akan dipanggil
    public function index()
    {
        $data['judul'] = 'Home';
        $barangModel = $this->model('Barang_model');
        $data['brg'] = $barangModel->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}

?>