<?php


// block akses indexes: apabila ada users membuka folder app dan folder-folder didalamnya, selama di dalam folder itu tidak ada file index maka jangan tampilkan isi foldernya.
//  multiviews : menghindari kesalahan ketika kita memanggil folder atau file di dalam public
// bootsraping digunakan untuk memanggil satu file yang dimana file tsb nantinya akan memanggil seluruh aplikasi mvc

if( !session_id() ) session_start();

require_once '../app/init.php';

$app = new App;
?>

