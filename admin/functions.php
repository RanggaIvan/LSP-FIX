<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '','penjualan_printer');

//data produk
function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//tambahProduk
function tambahProduk($data){
    global $conn;

    $nama = $data["nama_produk"];
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO produk VALUES(NULL, '$nama', '$foto', '$harga', '$stok', '$deskripsi')";

    move_uploaded_file($files, "../image/".$foto);
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//hapusProduk
function hapusProduk($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");
    return mysqli_affected_rows($conn);
}

//editProduk
function editProduk($data){
    global $conn;

    $id = $data["id_produk"];
    $nama = $data["nama_produk"];
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $deskripsi = $data["deskripsi"];

    if(empty($foto)){
        $query = "UPDATE produk SET
        nama_produk = '$nama',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi' WHERE id_produk = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE produk SET
        nama_produk = '$nama',
        foto = '$foto',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi' WHERE id_produk = '$id'";

        move_uploaded_file($files, "../image/".$foto);
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

//register

function register($data){
    global $conn;

    $nama = $data["nama_lengkap"];
    $username = $data["username"];
    $password = $data["password"];
    $roles = $data["roles"];

    $query = "INSERT INTO user VALUES(NULL, '$nama', '$username', '$password', '$roles')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//checkout
function checkout($data){
    global $conn;

    foreach ($_SESSION['cart'] as $id_produk => $result) :
?>
        <?php
        $barang = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
        $totalHarga = $result * $barang["harga"];

        $tanggal = $data["tanggal_transaksi"];
        $alamat = $data["alamat"];
        $nomor_whatsapp = $data["nomor_whatsapp"];
        $nama_lengkap = $_SESSION["nama_lengkap"];
        $nama_produk = $data["nama_produk"];
        $harga = $data["harga"];
        $price = $totalHarga;
        $foto = $barang["foto"];
        $st = 'proses';

        // masukan ke database
        $queryCheckout = "INSERT INTO transaksi VALUES(
            NULL,
            '$tanggal',
            '$nama_lengkap',
            '$alamat',
            '$nomor_whatsapp',
            '$nama_produk',
            '$harga',
            '$price',
            '$foto',
            '$st')";
        // masukan ke database

        mysqli_query($conn, $queryCheckout);
        ?>
        <?php
    endforeach;
    return mysqli_affected_rows($conn);
}

//verifikasi
function ditolak($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'ditolak' WHERE id_transaksi = '$id' ");
}

function terverifikasi($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'terverifikasi' WHERE id_transaksi = '$id' ");
}

?>