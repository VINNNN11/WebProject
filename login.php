<?php
    include "Service/conect.php";
    session_start();
    if(isset($_POST['log'])){
        $regis_massage = '';
        $username = $_POST['nama'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){ 
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["Username"];
            $_SESSION["is_login"] = true;
            header("location: dashboard.php");
        }
        else{
            $regis_massage = "data tidak ditemukan";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            outline: 0;
        }
        body{
            font-family: Arial, sans-serif;
            height: 100vh;
        }
        main{
            width: 100%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
        }
        .hero{
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
        .hello{
            margin-bottom: 20px;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input{
            margin-bottom: 10px;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid black;
        }
        button{
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid black;
            background-color: green;
            color: white;
            cursor: pointer;
        }
        button:hover{
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <?php include"layout/navbar.html"?>
    <main>
        <section class="hero"> 
            <div class="hello">
                <h2>Selamat Datang Di <span>Shield Guard</span></h2>
            </div>
            <form action="login.php" method="POST">
                <h3>Silakan Masukkan Akun Anda</h3>
                <?php $regis_massage ?>
                <label for="nama">Username:</label>
                <input type="text" name="nama" placeholder="Masukkan Username Anda">
                <label for="pass">Password:</label>
                <input type="text" name="pass" placeholder="Masukkan Password">
                <button type="submit" name="log">login now</button>
            </form>
        </section>
    </main>
</body>
</html>