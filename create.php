<!DOCTYPE html>
<html>
<head>
    <title>Form Penambahan Responses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksii.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $pertanyaan=input($_POST["pertanyaan"]);
        $jawaban=input($_POST["jawaban"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into chatbot (pertanyaan,jawaban) values
		('$pertanyaan','$jawaban')";

        //Mengeksekusi/menjalankan query diatas
        $cek_data=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($cek_data) {
            header("Location:iindex.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Responses</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>pertanyaan:</label>
            <input type="text" name="pertanyaan" class="form-control" placeholder="Masukan pertanyaan" required />

        </div>
        <div class="form-group">
            <label>jawaban:</label>
            <input type="text" name="jawaban" class="form-control" placeholder="Masukan jawaban" required/>
        </div>   

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>