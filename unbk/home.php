<?php
    include "config/connect.php";
    include "config/require.php";
    include "config/configuration.php";
    
    session_start();
    if(!isset($_SESSION['name'])){
        header('location:http://ubk.adhytracourseinstitute.com');
    }else{?>
        <html>
        <head>
            <title>Selamat Datang di Program UNBK Adhytra Course Institute Padang</title>
            <meta name="keyword" content="unbk, ujian nasional, try out, ujian sekolah, contoh ujian">
            <meta name="description" content="">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Convergence" />
            <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Gloria+Hallelujah" />
            <link rel="shortcut icon" href="img/icon.png">
            <link rel="stylesheet" href="css/styleUNBK.css">
            <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> 
        </head>
        <body>
            <header>
                <div class="container">
                    <div class="grid-2">
                        <div class="col-logo"><img src="img/adci.logo.png"></div>
                    </div>
                    <div class="grid-10">
                        <ul class="wrap-con">
                            <?php
                            error_reporting(0);
                                if($_GET['page'] == 'Selesai'){?>
                                    <div class="user-expt" style="display:none">Selamat Datang, <b><?php echo $_SESSION['name'];?></b></div>
                                <?php
                                }elseif($_GET['page'] == 'Bahasa Indonesia' or $_GET['page'] == 'Bahasa Inggris' or $_GET['page'] == 'Matematika' or $_GET['page'] == 'Kimia' or $_GET['page'] == 'Fisika' & $_GET['page'] == 'Biologi' or $_GET['page'] == 'Ekonomi' & $_GET['page'] == 'Sosiologi' or $_GET['page'] == 'Geografi'){?>
                                    <div class="user-expt">Selamat Bekerja, <b><?php echo $_SESSION['name'];?></b></div>
                                <?php
                                }else{?>
                                    <div class="user-expt">Selamat Datang, <b><?php echo $_SESSION['name'];?></b></div>
                                <?php
                                }
                            ?>
                            <div class="user-btn"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><div style="font-size:10pt;">Logout</div></a></div>
                        </ul>
                    </div>
                </div>
            </header>
            
            <?php
                /*
                $sq = mysql_query("select * from mataUjian");
                $get = mysql_fetch_array($sq);
                $un = str_replace(" ","",$get['Ujian']);
                echo $un;
                */
            ?>
            <?php
                error_reporting(0);
                if($_SESSION['name']){
                    $sql = mysql_query("select * from updateujian order by id desc limit 1 ");
                    $r = mysql_fetch_array($sql);
                    if($_GET['page'] == $r['pelajaran']){soal();}
                }
                    if($_GET['page'] == 'term'){term();}
                    elseif($_GET['page'] == 'Execute'){ execute();}
                    elseif($_GET['page'] == 'KonfirmasiData'){ KnfirmsiData();}
                    elseif($_GET['page'] == 'Info'){infoProfile();}
                    elseif($_GET['page'] == 'Selesai'){finish();}
                    elseif($_GET['page'] == null){term();}
                
            ?>
            
        </body>
        </html>
    <?php    
    }
?>

