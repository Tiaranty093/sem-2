<?php
    require_once 'project1.php';

    $sqljenis = "SELECT * FROM produk";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Input Data</title>
</head>
<body>
	<a href="index.php">
        <h2>HOME</h2>
    </a>
	<form method="post" action="index1.php">
		<label for="kode">ID</label>
		<input type="number" id="id" name="kode"><br><br>
		
		<label for="tanggal">Tanggal</label>
		<input type="date" id="nama" name="tanggal"><br><br>
		
		<label for="nama">Nama</label>
        <input type="text" name="nama" ><br><br>

        <label for="alamat">Alamat</label>
		<input type="text" id="alamat" name="alamat"><br><br>

        <label for="nohp">No HP</label>
		<input type="number" id="nohp" name="nohp"><br><br>

        <label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>

        <label for="produk_id">Produk_id:</label>
		<select  id="produk_id" name="produk_id"><br><br>
        
        <?php
            while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
        ?>
            <option value="<?= $jenis['id'] ?>">         <?= $jenis['nama']  ?>          </option>
        <?php
            }
        ?>
        </select>

        <br><br>
		
		<input type="submit" value="Simpan" name="submit">
	</form>
</body>
</html>