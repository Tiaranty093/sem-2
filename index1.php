<?php
    require_once 'project1.php';

    $sql =  "SELECT * FROM pesanan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();



    

    if(isset($_POST['submit'])){
        $kode = $_POST['id'];
        $tgl = $_POST['tanggal'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $email = $_POST['email'];
        $produk_id =$_POST['produk_id'];


        $sql = "INSERT INTO pesanan (id, tanggal, nama, alamat, nohp, email, produk_id)
                VALUES (?, ?, ?, ?, ?, ?, ?) ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$kode, $tgl, $nama, $alamat, $nohp, $email, $produk_id]);

        header("Location: index1.php");


    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="form.php">TAMBAH PELANGGAN</a>
    <hr>
    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Produk_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $number = 1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>


            <tr>
                <td>   <?=   $number  ?>   </td>
                <td>   <?=  $row['id']   ?>           </td>
                <td>   <?= $row['tanggal']  ?>  </td>
                <td>   <?= $row['nama']  ?>    </td>
                <td>  <?= $row['alamat'] ?>
                <td>  <?= $row['nohp']  ?>   </td>
                <td>  <?=  $row['email']   ?>    </td>
                <td>  <?=  $row['produk_id']   ?>    </td>
                <td>
                    <a href="edit.php?id=<?= $row['id']  ?>">EDIT</a>
                    <a href="delete.php?id=<?= $row['id'] ?>">DELETE</a>
                </td>
            </tr>

            <?php
                $number++;
                endwhile;
            ?>


        </tbody>
    </table>
</body>
</html>