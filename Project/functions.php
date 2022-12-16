<?php
    // Create connection
    $conn = mysqli_connect("localhost", "sasa", "raihanasasa","admindata");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result) ){
            $rows[]=$row;
        };
        return $rows;
    };
    // ambil data (fetch) user dari object result
    // mysqli_fetch_row() //mengembalikan array numerik
    // mysqli_fetch_assoc() //mengembalikan array asosiatif
    // mysqli_fetch_array() //mengembalikan keduanya
    // mysqli_fetch_object() //mengembalikan object 

    function tambah($data){
        global $conn;


        $username = htmlspecialchars($data["username"]);
        $email =htmlspecialchars($data["email"]);
        $jk =htmlspecialchars($data["jk"]);
        $kelas =htmlspecialchars($data["kelas"]);
        
    //  upload gambar
        $gambar = upload();
        if( !$gambar  ){
            return false;
        }

         // query insert data
         $query = "INSERT INTO users_data(username, email, gambar, jk, kelas)
         VALUES('$username','$email', 
         '$gambar','$jk','$kelas')"; 
         mysqli_query($conn, $query);

         return mysqli_affected_rows($conn);
        }

        function upload(){
            // gambar dari source
            $namafile = $_FILES['gambar']['name'];
            $ukuran = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            // cek upload gambar
            if( $error === 4  ){
                echo "<script>
                    alert('Pilih gambar terlebih dahulu');
                </script>";
                return false;
            }
            
            // cek upload gambar atau bukan
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'svg'];
            $ekstensiGambar = explode('.',$namafile); //pecah jadi string
            $ekstensiGambar = strtolower(end($ekstensiGambar)); //ambil jpg doang dan lowercase
            
            if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "<script>
                    alert('Yang Anda upload bukan gambar!');
                </script>";
                return false;
            }
            
            // cek size terlalu besar
            if( $ukuran > 2000000 ){
                echo "<script>
                    alert('Ukuran upload terlalu besar!');
                </script>";
                return false;
            }

            // lolos pengecekan, gambar siap di upload
            // generate nama gambar

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpName, 'C:/laragon/www/Project/img/' . $namaFileBaru);

            return $namaFileBaru;
        }
        
        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM users_data WHERE user_id = $id");
            return mysqli_affected_rows($conn);
        }
        
        function ubah($data){
        global $conn;

        $id = $data["id"];
        $username = htmlspecialchars($data["username"]);
        $email =htmlspecialchars($data["email"]);
        $gambar =htmlspecialchars($data["gambar"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        $jk =htmlspecialchars($data["jk"]);
        $kelas =htmlspecialchars($data["kelas"]);
        // cek user pilih gambar baru atau tidak

        if( $_FILES['gambar']['error'] === 4  ){
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

         // query update data
         $query = "UPDATE users_data SET
                username = '$username',
                email = '$email',
                gambar = '$gambar',
                jk = '$jk',
                kelas = '$kelas'
            WHERE user_id = $id
         "; 
         mysqli_query($conn, $query);

         return mysqli_affected_rows($conn);
        
    }

    function cari($keyword){
        $query = "SELECT * FROM users_data WHERE 
                    username LIKE '%$keyword%' OR
                    kelas LIKE '%$keyword%' OR
                    email LIKE '%$keyword%'
                    ";
        return query($query);
    }

    function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $email = stripslashes($data["email"]);
        $passwords = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // username udh masuk atau blm 
        $result = mysqli_query($conn, "SELECT username FROM users WHERE
                    username = '$username'");
        if( mysqli_fetch_assoc($result) ){
            echo "<script>
                alert('Username sudah terdaftar');
                </script>";
            return false;
        }

        // cek konfirmasi password
        if($passwords !== $password2){
            echo "<script>
            alert('Konfirmasi password tidak sama');
            </script>";
            return false;
        } 
        // enkripsi password
        $passwords = password_hash($passwords, PASSWORD_DEFAULT);
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO users(username, email, passwords)
         VALUES('$username','$email' ,'$passwords')");
        return mysqli_affected_rows($conn);
    }
?>
