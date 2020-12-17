<?php
include "koneksi.php";

session_start();
if(isset($_SESSION["username"])){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $query=mysqli_query($koneksi,"update user set nama='$nama', username='$username' where id='$id'");
}else{
    ?>Anda tidak boleh mengakses halaman ini. silahkan <a href="form_admin.php">Login
    dahulu</a><?php
}
if($query){
    echo "Berhasil update data ke database ";
    ?><a href="home.php">Kembali ke home</a><?php
}else{
    echo "Gagal update data";
    echo mysqli_error($query);
}
?>