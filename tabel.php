<?php
include "koneksi.php";
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$usia=$_POST['usia'];
$query=mysqli_query($koneksi,"insert into biodata(nama, alamat, usia) value('$nama','$alamat','$usia')");
if($query){
    echo "Berhasil input data ke database ";
    ?><a href="tabel.php">Lihat data di Tabel</a>
    <?php
}else{
    echo "Gagal input data";
    echo mysqli_error($query);
}
?> 