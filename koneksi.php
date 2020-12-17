<?php
$host="localhost";
$user="root";
$password="";
$database="pwebdb";
$koneksi=mysqli_connect($host,$user,$password,$database);
//cek koneksi
if($koneksi){
    //echo "berhasil koneksi";
}else{
    echo "gagal koneksi";
}
?>