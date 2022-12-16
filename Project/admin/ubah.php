<?php
require '../functions.php'; 

    // ambil data di URL
    $id = $_GET["id"];
    // query data user berdasarkan id
    $siswa = query("SELECT * FROM users_data WHERE user_id = $id")[0]; // query array numerik
    

   // cek tombol
    if( isset($_POST["submit"])){
    
        // cek data berhasil ubah atau tidak
        if(ubah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
            
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add data</title>
    <link rel="stylesheet" href="ubah.css"/>
    <link rel="stylesheet" href="registration.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
			rel="stylesheet"
		/>
</head>
<body>
    <div class="center">
    <h1>Update data user</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa["user_id"]?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa["gambar"]?>">
        <div class="txt_field">
            <label for="uname"></label>
            <input placeholder="Username" type="text" name="username" id="uname" value="<?= $siswa["username"]?>" required>
        </div>
        <div class="txt_field">
            <label for="email"></label>
            <input placeholder="Email" type="email" name="email" id="email"  value="<?= $siswa["email"]?>"required>
        </div>
        <div class="txt_field">
            <label for="jk"></label>
            <input placeholder="Jenis Kelamin" type="text" name="jk" id="jk" value="<?= $siswa["jk"]?>" required>
        </div>
        <div class="txt_field">
            <label for="kls"></label>
            <input placeholder="Kelas" type="text" name="kelas" id="kls"  value="<?= $siswa["kelas"]?>" required>
        </div>
        <div class="txt_field">
            <label for="gambar"></label> <br>
            <img src="../img/<?= $siswa["gambar"];?>" width="50"> <br>
            <input placeholder="Gambar" type="file" name="gambar" id="gambar">
        </div>
            <button type="submit" name="submit">Ubah data!</button>
    </form>
</div>
</body>
</html>