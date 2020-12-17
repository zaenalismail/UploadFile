<?php session_start();
include "koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$query=mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek=mysqli_num_rows($query);
if($cek){
    $_SESSION['username']=$username; 
    ?>Anda berhasil login. silahkan menuju <a href="home.php">Halaman HOME</a><?php
}else{
    ?>Anda gagal login. silahkan <a href="form_admin.php">Login kembali</a><?php
}
?>