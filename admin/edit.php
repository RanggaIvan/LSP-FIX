<?php

include 'functions.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

if(isset($_POST["kirim"])){
    if(editProduk($_POST) > 0){
        echo "
        <script type='text/javascript'>
        alert('Produk berhasil di edit');
        window.location = 'produk.php';
    </script>";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Produk gagal di edit');
            window.location = 'produk.php';
        </script>";
    }
}

if(!isset($_SESSION["username"])){
    echo"
    <script type='text/javascript'>
    alert('Silahkan login terlebih dahulu')
    window.location: '../login/index.php';
</script>";
}
if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Anda bukan admin')
        window.location= '../login/index.php';
    </script>
";
}

?>
<html lang="en">
<head>
    <title>Edit Produk</title>
</head>
<body>
    <?php include'../layout/sidebar.php'; ?>
    <div class="main">

        <h1>Edit data produk</h1>
        <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">

        <label for="nama_produk">Nama Produk</label><br>
        <input type="text" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>"><br>
        
        <label for="foto">Foto</label><br>
        <input type="file" name="foto" id="foto" value="<?= $produk['foto']; ?>"><br>

        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="harga" value="<?= $produk['harga']; ?>"><br>

        <label for="stok"></label><br>
        <input type="number" name="stok" id="stok" value="<?= $produk['stok']; ?>"><br>

        <label for="deskripsi"></label><br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"> <?= $produk['deskripsi']; ?></textarea><br><br>

        <button type="submit" name="kirim">Edit</button>
    </form>
</div>
</body>
</html>