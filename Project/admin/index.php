<?php
    require '../functions.php';
    $siswa = query("SELECT * FROM users_data");

    // tombol cari diklik
    if( isset($_POST["cari"]) ){
        $siswa = cari($_POST["keyword"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"/>
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
			rel="stylesheet"
		/>
</head>
<body>
    <h1>Users Data</h1>
    <a class="tambah" href="tambah.php">Tambah data user</a>
    <br><br/>

    <form action="" method="post">
        <div class="search">
            <input type="text" name="keyword" size="30" autofocus placeholder="Ketik nama..."
            autocomplete="off">
            <button class="cari" type="submit" name="cari">Cari</button>
        </div>

    </form>

    <table border="1" cellpadding="10" cellspacing="0" class="">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Email</th>
            <th>Username</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
        </tr>
        <?php $i = 1;?>
        <?php
            foreach($siswa as $row) :    
        ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a class="ubah" href="ubah.php?id=<?= $row["user_id"];?>">Ubah</a> |
                <a class="hapus" href="hapus.php?id=<?= $row["user_id"];?>" onClick="
                return confirm('Yakin?')">Hapus</a>
            </td>
            <td><img src="../img/<?= $row['gambar'];?>" width="60"></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["username"];?></td>
            <td><?= $row["jk"];?></td>
            <td><?= $row["kelas"];?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach?>
  </table>
</body>
</html>