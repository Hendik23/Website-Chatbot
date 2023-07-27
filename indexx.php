<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Service Laptop</title>
    <link rel="stylesheet" href="stylee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body><a href="logout.php" class="tombol_login" >LOGOUT</a>
    <div class="wrapper">
        <div class="title">Chatbot Service Laptop </div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Halo, ada yang bisa saya bantu? </p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="text-pesan" type="text" placeholder="Ketikkan sesuatu disini..." required>
                <button id="send-btn">Kirim</button>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        
        $("#send-btn").on("click",function(){

            $pesan = $("#text-pesan").val();

            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $pesan +'</p></div></div>';

            $(".form").append($msg);

            $("#text-pesan").val('');

            $.ajax({
                url :'pesan.php',
                type :'POST',
                data :'isi_pesan='+ $pesan, 
                success : function(result){
                    $balasan ='<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+result+'</p></div></div>';

                    $(".form").append($balasan);

                    $(".form").scrollTop($(".form")[0].scrollHeight);

                }

            })
        });
    })

</script>