<?php
    include "config/connect.php";
    include "config/require.php";
    include "config/configuration.php";
    $ubk = "/ujian online/";
    
    session_start();
    if($_SESSION['siswa'] == false){
        header('location:/ujian online/');
    }else{?>
        <html>
        <head>
            <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
            <meta name="keyword" content="unbk, ujian nasional, try out, ujian sekolah, contoh ujian">
            <meta name="description" content="">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="shortcut icon" href="img/icon.png">
            <link rel="stylesheet" href="css/styleUNBK.css">
            <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
            <script src="js/jquery-1.9.1.min.js"></script> 
            <style type="text/css">
                @font-face {font-family: Convergence;src: url(font/Convergence-Regular.ttf);}
                @font-face {font-family: Gloria Hallelujah;src: url(font/gloriahallelujah.ttf);}
            </style>
        </head>
        <body>
            <header>
                <div class="container">
                    <div class="grid-2">
                        <div class="col-logo"><img src="" style="width:40%" alt=" "></div>
                    </div>
                    <div class="grid-10">
                        <ul class="wrap-con">
                            <?php
                            error_reporting(0);
                                if($_GET['page'] == 'Selesai'){?>
                                    <div class="user-expt" style="display:none">Selamat Datang, <b><?php echo $_SESSION['siswa'];?></b></div>
                                <?php
                                }elseif($_GET['page'] == 'Bahasa Indonesia' or $_GET['page'] == 'Bahasa Inggris' or $_GET['page'] == 'Matematika IPA' or $_GET['page'] == 'Kimia' or $_GET['page'] == 'Fisika' & $_GET['page'] == 'Biologi' or $_GET['page'] == 'Ekonomi' & $_GET['page'] == 'Sosiologi' or $_GET['page'] == 'Geografi' or $_GET['page'] == 'Matematika IPS'){?>
                                    <div class="user-expt">Selamat Bekerja, <b><?php echo stripcslashes($_SESSION['siswa']);?></b></div>
                                <?php
                                }else{?>
                                    <div class="user-expt">Selamat Datang, <b><?php echo stripcslashes($_SESSION['siswa']);?></b></div>
                                <?php
                                }
                            ?>
                            <div class="user-btn"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><div style="font-size:10pt;">Logout</div></a></div>
                        </ul>
                    </div>
                </div>
            </header>
            <?php
                error_reporting(0);
                if($_SESSION['siswa']){
                    $sql = mysql_query("select * from updateujian where nik='".$_SESSION['nisn']."' order by id desc limit 1 ");
                    $r = mysql_fetch_array($sql);
                    if($_GET['page'] == $r['pelajaran']){soal();}
                }
                    else*/if($_GET['page'] == 'KonfirmasiData'){ KnfirmsiData();}
                    elseif($_GET['page'] == 'Info'){infoProfile();}
                    elseif($_GET['page'] == 'Selesai'){finish();}
                    elseif($_GET['page'] == null){KnfirmsiData();}
                
            ?>
            
        </body>
        </html>
    <?php    
    }
?>

