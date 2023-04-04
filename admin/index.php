<?php

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location= '../login/index.php';
    </script>
";
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

<?php include '../layout/sidebar.php'; ?>
<div class="main">
    <h1>
        Haloo <?= $_SESSION["nama_lengkap"]; ?> selamat datang di halaman admin
    </h1>
</div>