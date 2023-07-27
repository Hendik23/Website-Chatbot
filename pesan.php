<?php

    $koneksi = mysqli_connect("localhost","root","", "chatbot") or die("Database Error");

    $pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);

    $cek_data = mysqli_query($koneksi, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$pesan%' ");

    if(mysqli_num_rows($cek_data)>0){
        $data = mysqli_fetch_assoc($cek_data);
        $balasan = $data['jawaban'];
        echo $balasan;
    }else{
        echo "Maaf, saya belum menemukan jawaban yang anda maksud, :(";
    }