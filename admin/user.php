<?php

include 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location= '../login/index.php';
    </script>";
}
if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Anda bukan admin')
        window.location= '../login/index.php';
    </script>";
}

$user = query("SELECT * FROM user");

?>

<?php include '../layout/sidebar.php' ?>
<div class="main">
    <h1>Data User</h1>
    <hr>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Password</th>
            <th>Roles</th>
        </tr>

        <?php $i=1; ?>
        <?php foreach($user as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_lengkap"]; ?></td>
                <td><?= $data["username"]; ?></td>
                <td><?= $data["password"]; ?></td>
                <td><?= $data["roles"]; ?></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</div>
