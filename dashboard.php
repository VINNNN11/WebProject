<?php
    include "Service/conect.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            outline: 0;
        }
        body{
            font-family: Arial, sans-serif;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            height: 100vh;
            background-color: #f1f1f1;
        }
        main{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;

        }
        table{
            width: 50%;
            border-collapse: collapse;
            background-color: white;

        }
        table, th, td{
            border: 1px solid black;

        }
        th, td{
            padding: 10px;
            text-align: left;

        }
        th{
            background-color: #f1f1f1;

        }
    </style>
</head>
<body>
    <?php include "layout/navbar.html"?>
    <main>
        <h3>hello <?= $_SESSION["username"] ?></h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=form","root","");
                $sql ="SELECT * FROM user";
                $query = $conn->prepare($sql);
                $query->execute();
                while($data = $query->fetch()) {
                    echo "<tr>";
                    echo "<td>".htmlentities($data['No'])."</td>";
                    echo "<td>".htmlentities($data['Username'])."</td>";
                    echo "<td>".htmlentities($data['Password'])."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>