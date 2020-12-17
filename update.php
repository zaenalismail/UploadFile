<?php
include "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($koneksi,"select * from user where id='$id'");
?>
<form action="simpan.php" method="post">
<table border="1">
    <?php
    while($row=mysqli_fetch_array($query)){
        ?>
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <tr>
            <td>Nama</td><td><input type="text" name="nama" value="<?php echo $row['nama'];?>" /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><textarea cols="20" rows="5" name="username"><?php echo $row['username'];?></textarea></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $row['password'];?>" /></td>
        </tr>
        <tr>
            <td><input type="submit" value="Simpan" name="simpan" /></td>
        </tr>
    <?php
    }
    ?>
</table>
</form> 