<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleupload.css">
</head>

<body>
    <div class="col-md-6 offset-md-3 mt-5">
    <?php
        include "koneksi.php";
        $query=mysqli_query($koneksi,"SELECT * FROM log order by timestamp asc");
        ?>
        <h4 class="judul">Tabel Log</h4>
        <div class="table-responsive">
            <table border="1" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>IdLog</th>
                        <th>Nama File</th>
                        <th>Timestamp</th>
                    </tr>
            <?php
            while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $row['idfile'];?></td>
                <td><?php echo $row['filename'];?></td>
                <td><?php echo $row['timestamp'];?></td>
            <?php
            }
            ?>
            </table>
    </div>
</body>

</html>