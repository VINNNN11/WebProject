<?php
    include "Service/conect.php";
    $regis_massage = '';
    if(isset($_POST['reg'])){
        $username = $_POST['nama'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM user WHERE Username='$username'";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){ 
            $regis_massage = "Data Nama Sudah Digunakan Silakan coba nama lain";
        }
        else{
            $insert = "INSERT INTO user(Username, Password) VALUES ('$username', '$password')";
            if($conn->query($insert)) {
                $regis_massage = "Data Berhasil Masuk";
            }else{
                $regis_massage = "Data Gagal Masuk";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Regis</title>
</head>
<body>
    <?php include "layout/navbar.html"?>
    <main>
        <section class="welcome">
            <div class="parent"></div>
            <div class="img">
                <img src="Desain_tanpa_judul__5_-removebg-preview.png" alt="">
            </div>
        </section>
        <section>
            <h1>Silakan Buat Akun</h1>
            <i><?= $regis_massage?></i>
            <form action="regis.php" method="post">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" placeholder="Masukan Nama Anda" required>
                <label for="pass">Password:</label>
                <input type="text" name="pass" placeholder="Buatlah Password" required>
                <button type="submit" name="reg">regis now</button>
            </form>
        </section>
    </main>
    
</body>
</html>