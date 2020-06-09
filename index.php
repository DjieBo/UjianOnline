<?php
    include "config/connect.php";
    include "config/system.php";
    include "unbk/config/configuration.php";
    include "ipaddress.php";
    session_start();
echo'  
<html>
<head>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/icon.png">
    <link rel="stylesheet" href="css/styleStarting.css">
    <script>
    function showpass() {
        var x = document.getElementById("mypass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    ';
    ?>
     <script>
        $(function() {
          $('#nisn').on('keydown', '#nosn', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
        })
    </script>
    <style type="text/css">
        @font-face {
           font-family: Convergence;
           src: url(font/Convergence-Regular.ttf);
        }
        body{font-family: Convergence;}
    </style>
</head>
    <?php
echo'
<body
    <div class="wrap-page">
        <div class="container">
            <div class="info-page">
                <div class="media-info">
                    <h1>SELAMAT DATANG SISTEM UJIAN ONLINEI</h1>
                    <h2>Kenapa HARUS persiapan</h2>
                    <div class="info-left">
                        <li>
                            <div class="info-img-left"><img src="img/aplikasi.png"></div>
                            <div class="text-left">Sitem Ini Berbasiskan Web Based</div>
                        </li>
                        <li>
                            <div class="info-img-left"><img src="img/garansi.png"></div>
                            <div class="text-left">Sistem ini hanya Prototipe</div>
                        </li>
                        <li>
                            <div class="info-img-left"><img src="img/bebas.png"></div>
                            <div class="text-left">Penggunaan dapat mencapai 1000 Client</div>
                        </li>
                    </div>
                    <div class="info-right"><img src="img/diskon.png"></div>
                </div>
                <div class="row-info">
                    <div class="info-left">
                        Program Kami :<br>
                        1. Reguler SBMPTN (Kurang Lebih 3 bulan)<br>
                        2. Intensive SBMPTN (1 bulan)
                        </div>
                    <div class="info-right bottom-support">
                        <h4>Supported by:</h4>
                        <li><img src="img/Ataque logo.png"></li>
                        <li><img src="img/logo_pelajar_sumbar_vertical_original_size.png"></li>
                    </div>
                </div>
                <h1 style="text-align:center;color:#f00">HUBUNGI SEKARANG: 081166-5187</h1>
            </div>
            <div class="log-page">
                <div class="title-head">
                    <div class="title-head-text">Selamat Datang di Sistem Ujian Berbasis Komputer</div>
                </div>
                <div class="form-page">
                    <form action="" method="post">
                        <p id="nisn">
                            <label> NISN :</label><br>
                            <input type="text" name="nisn" id="nosn" autocomplete="off">
                        </p>
                        <p>
                            <label> Program :</label><br>
                            <select name="program">
                                <option> </option>
                                <option value="unbk"> UNBK </option>
                                <option value="sbmptn"> SBMPTN </option>
                            </select>
                        </p>
                        <p>
                            <label> Password :</label><br>
                            <input type="password" name="password" id="mypass" autocomplete="off"> <i class="fa fa-eye" aria-hidden="true" onclick="showpass()"></i>
                        </p>
                        <p><input type="submit" name="login" value="Login"></p>
                    </form>
                    <div class="form-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
';
login();
?>
