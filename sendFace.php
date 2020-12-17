<?php
include "koneksi.php";
header ('home.php');

$base64_string = $_POST["image"];
$username = $_POST["username"];
$password = $_POST["password"];
$image_name = "uploadFace\\".$username;
$login = mysqli_query($koneksi,"select * from `user` where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek < 1){
    echo "User tidak valid";
    return;
}

while($user_data = mysqli_fetch_array($login)){
    $id = $user_data['id'];
}

if (!file_exists($image_name)) {
 if (!mkdir($image_name)) {
    $m=array('msg' => "REJECTED, cant create folder");
    echo json_encode($m);
    return;}
}

$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi)+1;
$data = explode(',', $base64_string);
$fullName = $image_name."\\X__".$fileCount."_". date("YmdHis") .".png";
$ifp = fopen($fullName, "wb");
fwrite($ifp, base64_decode($data[0]));
fclose($ifp);
if (!$ifp){
    $m=array('msg' => "REJECTED, ".$fullName."not saved");
    echo json_encode($m);
    return;}

// $command = escapeshellcmd("python checkFace.py ".$fullName);
// $output = shell_exec($command);
$date = date("Y-m-d H:i:s");
$result = mysqli_query($koneksi, "INSERT INTO `log`(filename, timestamp) VALUES('$fullName','$date')");
mysqli_close($koneksi);

$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
$m = array('msg' => "Berhasil Mengirim"." total(".$fileCount.")");
echo json_encode($m);

?>
