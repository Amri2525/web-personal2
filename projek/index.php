<?php
    include "koneksi.php";

    $login_message = "";
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password']; 

        $hash_password  =   hash("sha256", $password);

        $sql = "SELECT*FROM tbl_ultah WHERE username='$username'
        AND password='$hash_password'";

        $result = $db->query($sql);

        if($result->num_rows > 0){  
            $data = $result->fetch_assoc();
           
            header("location: ultah.html");

        }else {
            $login_message = "akun tidak ditemukan";
        }
     }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href = "style.css">
</head>
<body>
   

    <form action="ultah.html" method="POST">
        <h3>Selamat Mencoba Buk Silva akwokaokw</h3>
        <hr>
        <h3>MASUKAN AKUN nya Dil</h3>
     
            <input type="text" placeholder="username" name="username"/>
            <input type="password" placeholder="password" name="password"/>
            <button type="submit" name="login">Masuk Sekarang</button>
    </form>

</body>
</html>
