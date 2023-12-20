<?php


// block akses indexes: apabila ada users membuka folder app dan folder-folder didalamnya, selama di dalam folder itu tidak ada file index maka jangan tampilkan isi foldernya.
//  multiviews : menghindari kesalahan ketika kita memanggil folder atau file di dalam public
// bootsraping digunakan untuk memanggil satu file yang dimana file tsb nantinya akan memanggil seluruh aplikasi mvc

if( !session_id() ) session_start();

require_once '../app/init.php';

$app = new App;
?>

<!-- 
Options -Multiviews

RewriteEngine On -->

<!-- jika url yang ditulis folder maka diabaikan-->
    <!-- RewriteCond %{REQUEST_FILENAME} !-d -->

<!-- menghindari apabila ada nama file atau folder yang sama dengan controller atau method kita -->
    <!-- RewriteCond %{REQUEST_FILENAME} !-f -->

<!--  membaca apapun yang ditulis di url mulai dari awal-->
<!-- (.*) ambil semua karakter kecuali enter sampai habis kemudian arahkan ke file index yang mengirimkan url dimana nanti isi dari urlnya disimpan dalam place holder-->
<!-- apapun yang ditulis disini ^(.*)$ (bertujuan untuk mengambil apapun yang diketik setelah public/, terus dimasukkan ke dalam $1 yang nantinya dapat diteruskan menjadi string)nantinya akan disimpan di $1(placeholder) -->
<!-- jika ada rule yang sudah terpenuhi maka jangan jalankan rule lain setelah ini (menghindari jika ada orang ingin melakukan sesuatu yang jahat)-->
    <!-- RewiteRule ^(.*)$ index.php?url=$1 [L] -->