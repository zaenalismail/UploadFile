<?php
include "koneksi.php";
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($koneksi,"insert into user(nama, username, password) value('$nama','$username','$password')");
if($query){
    echo "Berhasil input data ke database ";
?><a href="form_admin.php">Silahkan Log in</a>
<?php
}else{
    echo "Gagal input data";
}
?> 