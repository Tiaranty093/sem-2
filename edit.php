<?php
    require_once 'project1.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM pesanan WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $kode = $_POST['id'];
        $tgl = $_POST['tanggal'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp']; 
        $email = $_POST['email'];
        $produk_id = $_POST['produk_id'];
       

        $sql = "UPDATE pelanggan SET kode = :kode, tgl = :tanggal, nama = :nama, alamat = :alamat,
                        nohp = :no_hp, email = :email, produk_id = :produk_id WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id', $kode);
        $stmt->bindParam(':tanggal', $tgl);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':no_hp', $nohp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':produk_id', $produk_id);
        
        $stmt->execute();

        header('Location: index1.php');


    }



    $sqljenis = "SELECT * FROM kategori_produk";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();

  
?>


<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Kode</label>
    <input type="number" name="kode" value="<?php echo $row['kode']; ?>">
    <br>
    <label>Tanggal</label>
    <input type="date" name="tgl" value="<?php echo $row['tanggal']; ?>">
    <br>
    <label>Nama</label> 
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
    <br>
    <label>Alamat</label>
    <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>">
    <br>
    <label>No HP</label>
    <input type="number" name="no_hp" value="<?php echo $row['no_hp']; ?>">
    <br>
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>">
    <br>
    <label>Produk_id</label>
    <select type="number" name="produk_id" value="<?php echo $row['produk_id']; ?>">

  
        <?php
            while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
        ?>
            <option value="<?= $jenis['id'] ?>">         <?= $jenis['nama']  ?>          </option>
        <?php
            }
        ?>


    </select>
    

    <br>
    <button type="submit" name="submit">Save</button>
</form>