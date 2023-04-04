<?php

include 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location: '../login/index.php';
    </script>";
}
if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Anda bukan admin')
        window.location: '../login/index.php';
    </script>";
}

if(isset($_POST["kirim"])){
    if(tambahProduk($_POST) > 0){
    echo "
    <script type='text/javascript'>
        alert('Produk berhasil di tambahkan');
        window.location = 'produk.php';
    </script>";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Produk gagal di tambahkan');
            window.location = 'produk.php';
        </script>";
    }
}

?>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php include '../layout/sidebar.php'; ?>
    <div class="main">
        <h1>Tambah data produk</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk</label><br>
            <input type="text" name="nama_produk" id="nama_produk"><br>
    
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" id="foto"><br>
    
            <label for="harga">Harga</label><br>
            <input type="text" name="harga" id="harga"><br>
    
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok"><br>
    
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="7"></textarea><br><br>
    
            <button type="submit" name="kirim">Tambah Produk</button>
        </form>
    </div>
</body>
</html>