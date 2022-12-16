<?php
require '../functions.php'; 
   // cek tombol
    if( isset($_POST["submit"])){
        

        // cek data berhasil tambah atau tidak
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
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
    <link rel="stylesheet" href="tambah.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
			rel="stylesheet"
		/>
    <title>Add data</title>
</head>
<body>
    <div class="center">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Tambah data user</h1>
            <div class="txt_field">
                <label for="uname"></label>
                <input placeholder="Username" type="text" name="username" id="uname" required>
            </div>
            <div class="txt_field">
                <label for="email"></label>
                <input placeholder="Email" type="email" name="email" id="email" required>
            </div>
            <div class="txt_field1">
                <label for="jk">Jenis Kelamin : </label>
                <input type="radio" name="jk" id="jk" value="Pria" required>Pria
                <input type="radio" name="jk" id="jk" value="Wanita" required>Wanita
            </div>
            <div class="txt_field">
                <label for="kls"> </label>
                <input placeholder="Kelas" type="text" name="kelas" id="kls" required>
            </div>
            <div class="txt_field2">
                <label for="gambar"></label>
                <input value="Gambar" type="file" name="gambar" id="gambar">
            </div>
                <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>