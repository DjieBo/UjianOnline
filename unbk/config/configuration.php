<?php
    include "connect.php";
    include "exam.php";
    include "backup.php";
    function logout(){
        session_start();
        session_destroy();
        header('location:/..');
    } 
    function term(){?>
        <section>
            <div class="container">
                <div class="term-condtn">
                    <div class="term-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> <strong>Harap di Baca dulu Bro..!!</strong></div>
                    <div class="term-art">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Sebelum masuk ke halaman soal silahkan lengkapi terlebih dahulu data diri anda pada halaman selanjutnya</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Login hanya bisa di lakukan 1x saja, Jika anda sudah logout, maka tidak akan dapat login kembali</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Jika terjadi kendala teknis selama ujian, harap laporkan ke pengawas</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Dahulukan Soal-soal yang lebih mudah</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Jika anda telah selesai ujian, anda tidak bisa kembali ke halaman soal</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Berdoa lah sebelum ujian, dan gunakan waktu sebaik mungkin</li>
                        <li class="list-end">
                            <div class="term-ttd">
                                <div class="term-ttd-title">Tertanda</div>
                                <div class="term-ttd-stamp"><img src="img/adci.logo.png"></div>
                                <div class="term-ttd-name">Adhytra Course Institute</div>
                            </div>
                        </li>
                    </div>
                </div>
                <div class="term-btn">
                    <!--<div class="btn previous-term"><a href="#">Kembali</a></div>-->
                    <div class="btn next-term"><a href="?page=KonfirmasiData">Lanjut</a></div>
                </div>
            </div>
        </section>
    <?php
    }
    function KnfirmsiData(){?>
        <section>
            <div class="container">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script>
                    $(function() {
                      $('#nikfield').on('keydown', '#nikin', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
                      $('#tokenfield').on('keydown', '#tokenin', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
                      $('#phonefield').on('keydown', '#phonein', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
                    })
                </script>
                <form action="" method="post">
                <?php
                    $r = str_replace(" ","",$_SESSION['sekolah']);
                    $t = strtolower($r);
                    $s = str_replace("-", "", $t);
                    $sql = mysql_query("select * from ".$s." where nik='".$_SESSION['nisn']."'");
                    if(mysql_num_rows($sql) == 1){
                        $see = mysql_fetch_array($sql);
                        $nik = $see['nik'];
                        $phone = $see['phone'];
                        $jk = $see['gender'];
                        $name = $see['name'];
                        $tingkt = $see['tingkat'];
                        $skolah = $see['sekolah'];
                        if(empty($phone)){?>
                            <div class="pp-page">
                                <div class="pp-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> <strong>Konfirmasi Data Peserta</strong></div>
                                <div class="pp-form">
                                    <li id="nikfield"><div class="pp-form-label">NISN</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $_SESSION['nisn']; ?></label></div></li>
                                    <li><div class="pp-form-label">Nama Peserta</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $name; ?></label></div></li>
                                    <li id="phonefield"><div class="pp-form-label">No. Hp</div> <span>:</span><div class="pp-form-inpt"><input type="text" name="phone" class="nik" id="phonein" autocomplete="off" required></div></li>
                                    <li><div class="pp-form-label">Jenis Kelamin</div> <span>:</span><div class="pp-form-inpt">
                                        <div><input type="radio" name="gender" value="Pria" required> Laki-Laki</div> 
                                        <div><input type="radio" name="gender" value="Wanita"> Perempuan</div></div>
                                    </li>
                                    <li><div class="pp-form-label">Sekolah</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $_SESSION['sekolah']; ?></label></div></li>
                                    <li id="tokenfield"><div class="pp-form-label">Kode Ujian</div> <span>:</span><div class="pp-form-inpt"><input type="text" id="tokenin" name="kodeuji" autocomplete="off" class="kodeuji" required></div></li>
                                </div>
                            </div>
                            
                        <?php
                        }elseif(!empty($phone)){?>
                            <div class="pp-page">
                                <div class="pp-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> <strong>Konfirmasi Data Peserta</strong></div>
                                <div class="pp-form">
                                    <li><div class="pp-form-label">NISN</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $_SESSION['nisn']; ?></label></div></li>
                                    <li><div class="pp-form-label">Nama Peserta</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $name; ?></label></div></li>
                                    <li><div class="pp-form-label">No. Hp</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $phone; ?></label></div></li>
                                    <li><div class="pp-form-label">Jenis Kelamin</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $jk; ?></label></div></li>
                                    <li><div class="pp-form-label">Tingkat</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $tingkt; ?></label></div></li>
                                    <li><div class="pp-form-label">Sekolah</div> <span>:</span><div class="pp-form-inpt"><label><?php echo $_SESSION['sekolah']; ?></label></div></li>
                                    <li id="tokenfield"><div class="pp-form-label">Kode Ujian</div> <span>:</span><div class="pp-form-inpt"><input type="text" name="kodeuji" id="tokenin" class="kodeuji" autocomplete="off" required></div></li>
                                </div>
                            </div>
                        <?php    
                        }
                    }
                ?>
                <div class="pp-page-btn">
                    <div class="next-term"><input type="submit" name="next" value="Lanjut" style="border:none"></div>
                </div>
                </form>
                
                <?php
                    if(isset($_POST['next'])){
                        $nik = $_POST['nik'];
                        $jk  = $_POST['gender'];
                        $skolh = $_POST['sklh'];
                        $phone = $_POST['phone'];
                        $token = $_POST['kodeuji'];
                        $code = $_POST['kodeuji'];
                        $tngkt = substr($code,0,3);
                        $mtk   = substr($code,3,3);
                        $space = '';
                        $tingkat = $tngkt.$space;
                        $ujian = $mtk.$space;
                        
                        $r = str_replace(" ","",$_SESSION['sekolah']);
                        $t = strtolower($r);
                        $s = str_replace("-", "", $t);
                        
                        $t = mysql_query("select * from kodeujian where token = '".$code."'");
                        if(mysql_num_rows($t) == 0){
                            echo "<script>alert('Kode Token Anda Belum Terdaftar');</script>";
                        }else{
                            $first = mysql_query("select * from ".$s." where nik='".$_SESSION['nisn']."'");
                            if(mysql_num_rows($first) == 1){
                                $pgt = mysql_fetch_array($first);
                                $a = $pgt['phone'];
                                $b = $pgt['gender'];
                                $c = $pgt['tingkat'];
                                $ninsput = $pgt['nik'];
                                $sekolahput = $_SESSION['sekolah'];
                                
                                if(!empty($a) and !empty($b) and !empty($c)){
                                    $nd = mysql_query("select * from mataujian where kode='$mtk'");
                                    if(mysql_num_rows($nd) == 1){
                                        $r = mysql_fetch_array($nd);
                                        $sql = mysql_query("select * from updateujian where nik = '".$_SESSION['nisn']."' and pelajaran = '".$r['Ujian']."'");
                                        if(mysql_num_rows($sql) == 1){
                                            $g = mysql_fetch_array($sql);
                                            date_default_timezone_set("Asia/Jakarta");
                                            $time = date("Y-m-d H:i:s");
                                            if($time > $g['selesai']){
                                                echo "<script>alert('Waktu Ujian ".$r['Ujian']." Anda Telah Habis');</script>";
                                            }elseif($time < $g['selesai']){
                                                session_start();
                                                $now = new DateTime($time);
                                                $to = new DateTime($g['selesai']);
                                                $interval = $to->diff($now);
                                                $j = $interval->format('%H:%I:%S');
                                                
                                                $_SESSION['waktu'] = $j;
                                                $_SESSION['Relogin'] = $time;
                                                echo "<script>window.location = '?page=Info';</script>";
                                            }else{
                                                echo "<script>alert('Data anda bermasalah harap lapor pengawas!!');</script>";
                                            }
                                        }else{
                                            date_default_timezone_set("Asia/Jakarta");
                                                $waktu = date("Y-m-d H:i:s");
                            
                                                $date = date_create($waktu);
                                                date_modify($date, '+120 minutes');
                                                $finish = date_format($date, 'Y-m-d H:i:s');
                                                
                                                $xo = $r['Ujian'];
                                                $pkt = rand(1, 20);
                                                $cookie = mysql_query("insert into updateujian (nik, nama, sekolah, tingkat, pelajaran, paket, waktu, selesai)values('".$_SESSION['nisn']."','".$pgt['name']."', '".$_SESSION['sekolah']."', '$c', '$xo', '$pkt', '$waktu', '$finish')");
                                                
                                                $namaput2 = $pgt['name'];
                                                $ninsput2 = $_SESSION['nisn'];
                                                $skolhput2 = $_SESSION['sekolah'];
                                                //===============================
                                                $post2 = "nama2=".$namaput2."&nisn2=".$ninsput2."&sekolah2=".$skolhput2."&tingkat2=".$c."&ujian2=".$xo."&paket2=".$pkt."&mulai2=".$waktu."&selesai2=".$finish;


                                                $url2 = "https://...com/config/getdata2.php";
                                                 
                                                $curlHandle2 = curl_init();
                                                curl_setopt($curlHandle2, CURLOPT_URL, $url2);
                                                curl_setopt($curlHandle2, CURLOPT_POSTFIELDS, $post2);
                                                curl_setopt($curlHandle2, CURLOPT_HEADER, 0);
                                                curl_setopt($curlHandle2, CURLOPT_RETURNTRANSFER, 1);
                                                curl_setopt($curlHandle2, CURLOPT_TIMEOUT,30);
                                                curl_setopt($curlHandle2, CURLOPT_POST, 1);
                                                curl_exec($curlHandle2);
                                                curl_close($curlHandle2);
                                                //===============================
                                                $un = str_replace(" ","",$xo);
                                                if($un == 'BahasaIndonesia'){
                                                    $ren = mysql_query("update ".$s." set BahasaIndonesia='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'BahasaInggris'){
                                                    $ren = mysql_query("update ".$s." set BahasaInggris='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Fisika'){
                                                    $ren = mysql_query("update ".$s." set Fisika='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Biologi'){
                                                    $ren = mysql_query("update ".$s." set Biologi='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Kimia'){
                                                    $ren = mysql_query("update ".$s." set Kimia='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Ekonomi'){
                                                    $ren = mysql_query("update ".$s." set Ekonomi='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Sosiologi'){
                                                    $ren = mysql_query("update ".$s." set Sosiologi='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'Geografi'){
                                                    $ren = mysql_query("update ".$s." set Geografi='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'MatematikaIPA'){
                                                    $ren = mysql_query("update ".$s." set MatematikaIPA='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }elseif($un == 'MatematikaIPS'){
                                                    $ren = mysql_query("update ".$s." set MatematikaIPS='$un' where nik='".$_SESSION['nisn']."'");
                                                    if($ren){
                                                        echo "<script>window.location = '?page=Info';</script>";
                                                    }
                                                }

                                        }
                                    }
                                }else{
                                    $rowmysql = mysql_query("select * from pendidikan where kode='$tngkt' ");
                                    if(mysql_num_rows($rowmysql) == 1){
                                        $giv = mysql_fetch_array($rowmysql);
                                        $pddk = $giv['tingkat'];
                                        $tkrow = mysql_query("update ".$s." set tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                        
                                        $mysql = mysql_query("select * from mataujian where kode='$mtk' ");
                                        if(mysql_num_rows($mysql) == 1){
                                            $send = mysql_fetch_array($mysql);
                                            
                                            date_default_timezone_set("Asia/Jakarta");
                                            $date = date("Y-m-d H:i:s");
                                            
                                            $time = date_create($date);
                                            date_modify($time, '+120 minutes');
                                            $done = date_format($time, 'Y-m-d H:i:s');
                                            
                                            $uj = $send['Ujian'];
                                            $pkt = rand(1, 20);
                                            $poin = mysql_query("insert into updateujian (nik, nama, sekolah, tingkat, pelajaran, paket, waktu, selesai)values('".$_SESSION['nisn']."','".$_SESSION['siswa']."', '".$_SESSION['sekolah']."', '$pddk','$uj', '$pkt', '$date', '$done')");
                                            
                                            $materi = str_replace(" ","",$send['Ujian']);
                                            $namaput = $_SESSION['siswa'];
                                            //===========================================
                                            $post = "nama=".$namaput."&sekolah=".$sekolahput."&ujian=".$uj."&nisn=".$ninsput."&phone=".$phone."&gender=".$jk."&tingkat=".$pddk."&paket=".$pkt."&mulai=".$date."&selesai=".$done;
                                            $url = "https://...com/config/getdata.php";
                                             
                                            $curlHandle = curl_init();
                                            curl_setopt($curlHandle, CURLOPT_URL, $url);
                                            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $post);
                                            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                                            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                                            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                                            curl_setopt($curlHandle, CURLOPT_POST, 1);
                                            curl_exec($curlHandle);
                                            curl_close($curlHandle);
                                            //===========================================
                                            if($materi == 'BahasaIndonesia'){
                                                $row = mysql_query("update ".$s." set BahasaIndonesia='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'BahasaInggris'){
                                                $row = mysql_query("update ".$s." set BahasaInggris='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Biologi'){
                                                $row = mysql_query("update ".$s." set Biologi='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Kimia'){
                                                $row = mysql_query("update ".$s." set Kimia='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Fisika'){
                                                $row = mysql_query("update ".$s." set Fisika='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Ekonomi'){
                                                $row = mysql_query("update ".$s." set Ekonomi='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Sosiologi'){
                                                $row = mysql_query("update ".$s." set Sosiologi='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'Geografi'){
                                                $row = mysql_query("update ".$s." set Geografi='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'MatematikaIPA'){
                                                $row = mysql_query("update ".$s." set MatematikaIPA='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }elseif($materi == 'MatematikaIPS'){
                                                $row = mysql_query("update ".$s." set MatematikaIPS='$materi' where nik='".$_SESSION['nisn']."'");
                                                $sql = mysql_query("update ".$s." set phone='$phone', gender='$jk', tingkat='$pddk' where nik='".$_SESSION['nisn']."'");
                                                if($row or $sql){
                                                    echo "<script>window.location = '?page=Info';</script>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
        </section>
    <?php
    }
    function infoProfile(){
        $r = a;
        {?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="wrap-main col-left">
                        <div class="info-form-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> Informasi Peserta</div>
                        <div class="info-form">
                            <?php
                                session_start();
                                $r = str_replace(" ","",$_SESSION['sekolah']);
                                $t = strtolower($r);
                                $s = str_replace("-", "", $t);
                                $div = mysql_query("select * from ".$s." where nik = '".$_SESSION['nisn']."'");
                                if(mysql_num_rows($div) == 1){
                                    $res = mysql_fetch_array($div);{
                                        
                                        echo "
                                            <li>
                                                <label>NIK</label><br>
                                                <font>".$_SESSION['nisn']."</font>
                                            </li>
                                            <li>
                                                <label>Nama Lengkap</label><br>
                                                <font>".$res['name']."</font>
                                            </li>
                                            <li>
                                                <label>Tingkat Pendidikan</label><br>
                                                <font>".$res['tingkat']."</font>
                                            </li>
                                            <li>
                                                <label>Sekolah</label><br>
                                                <font>".$res['sekolah']."</font>
                                            </li>
                                            <li>
                                                <label>Kelas</label><br>
                                                <font>".$res['kelas']."</font>
                                            </li>
                                        ";
                                        $nms = mysql_real_escape_string($res['nama']);
                                        if($nms = $_SESSION['siswa']){
                                            $ses = mysql_query("select * from updateujian order by id desc limit 1");
                                            $tiv = mysql_fetch_array($ses);
                                            $get = $tiv['pelajaran'];
                                            echo "
                                                <li>
                                                    <label>Sub Tes Ujian</label><br>
                                                    <font>".$tiv['pelajaran']."</font>
                                                </li>
                                            ";
                                            $stud = str_replace(" ","",$get);
                                        }
                                        if($_SESSION['waktu'] == true){
                                            echo'<li>
                                                    <label>Sisa Waktu</label><br>
                                                    <font>'.$_SESSION['waktu'].'</font>
                                                </li>';
                                        }else{
                                            echo'
                                            <li>
                                                    <label>Waktu</label><br>
                                                    <font>120 Menit</font>
                                                </li>
                                            ';
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="wrap-main col-right">
                        <div class="r-warning">
                            <div class="title-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Peringatan</div>
                            <div class="art-warning">
                                Silahkan klik Tombol <b>Mulai</b> saat pengawas menyatakan <b>Mulai</b>, dan apabila anda sudah <b>Mulai</b> <i>anda tidak dapat kembali kehalaman sebelumnya</i> serta tidak dapat <i>login ulang</i>. Jika terjadi permasalahan laporkan kepada pengawas. 
                            </div>
                        </div>
                        <div class="btn-start">
                            <div class="btn-start-ex"><a href="?page=<?php echo $tiv['pelajaran'];?>">Mulai</a></div>
                        </div>
                    </div>
                </div>
                <div class="wrap-bttn">
                    <div class="pp-page-btn confm-btn">
                        <div class="btn previous-term"><a href="?page=KonfirmasiData">Kembali</a></div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    }
    
    function soal(){?>
        <head>
        </head>
        <?php
        $r = str_replace(" ","",$_SESSION['sekolah']);
        $t = strtolower($r);
        $s = str_replace("-", "", $t);

        $siswa = mysql_real_escape_string($_SESSION['siswa']);

        $sql = mysql_query("select * from ".$s." where name = '".$_SESSION['siswa']."' and nik = '".$_SESSION['nisn']."'");
        if(mysql_num_rows($sql) == 1){
            $row = mysql_fetch_array($sql);
            $mysql = mysql_query("select * from updateujian where nik = '".$row['nik']."' and nama = '".$_SESSION['siswa']."' order by id desc limit 1");
            while ($ex = mysql_fetch_array($mysql)){?>
            <section class="ex-page">
                <div class="container">
                    <div class="wrap-exam">
                        <div class="row-title-exam">
                            <?php
                            session_start();
                            if($_SESSION['Relogin'] == true){
                                $datetime1 = new DateTime($_SESSION['Relogin']);
                                $datetime2 = new DateTime($ex['selesai']);
                                $interval = $datetime1->diff($datetime2);
                                $getTime1 = $interval->format("%H");
                                $ttH = $getTime1 * 60;
                                $getTime = $interval->format("%I");
                                $endTime = $ttH + $getTime;
                                
                                $ta = '+';
                                $m = ' minutes';
                                $cal = $ta.$endTime.$m;
                                
                                $date = date_create($_SESSION['Relogin']);
                                date_modify($date, $cal);
                                $timeSes = date_format($date, 'Y-m-d H:i:s');
                                
                                echo '
                                    <script language="JavaScript">
                                    TargetDate = "'.$timeSes.'";
                                    ForeColor = "black";
                                    CountActive = true;
                                    CountStepper = -1;
                                    LeadingZero = true;
                                    DisplayFormat = "%%H%% Jam, %%M%% Menit, %%S%% Detik.";
                                    </script>
                                    
                                ';
                            }else{
                                $date = date_create($ex['waktu']);
                                date_modify($date, '+120 minutes');
                                $dateSes = date_format($date, 'Y-m-d H:i:s');

                                echo '
                                    <script language="JavaScript">
                                    TargetDate = "'.$dateSes.'";
                                    ForeColor = "black";
                                    CountActive = true;
                                    CountStepper = -1;
                                    LeadingZero = true;
                                    DisplayFormat = "%%H%% Jam, %%M%% Menit, %%S%% Detik.";
                                    </script>
                                    
                                ';
                            }
                            ?>
                            <div class="col-left-exam">Sisa Waktu : <span id="cntdwn"><script src="js/timer.js"></script></span></div>
                        </div>
                        <div class="wrap-main-exam">
                            <form action="" method="post" id="examForm">
                                <script>
                                    var slideIndex = 1;
                                    showSlides(slideIndex);
                                    function plusSlides(n) {showSlides(slideIndex += n);}
                                    function currentSlide(n) {showSlides(slideIndex = n);}
                                    function showSlides(n) {
                                        var i;
                                        var exam = document.getElementsByClassName("exam");
                                        if (n > exam.length) {slideIndex = 1}    
                                        if (n < 1) {slideIndex = exam.length}
                                        for (i = 0; i < exam.length; i++) {
                                            exam[i].style.display = "none";  
                                        }
                                        exam[slideIndex-1].style.display = "block";  
                                      }
                                </script>
                                <?php
                                if($ex['tingkat'] == 'SMA'){
                                    $cek = mysql_query("select * from soalsma where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."'");
                                    $ttl = mysql_num_rows($cek);
                                    $end = $ttl;
                                    for ($x = 1; $x < $n; $x++) {
                                          echo "
                                            <script>
                                                $('#element$x').click(function() {
                                                   if($('#radio_button_a_$x').is(':checked')) { 
                                                    document.getElementById('$x').style.background = '#333';
                                                    document.getElementById('$x').style.color = '#f0f0f0';
                                                    }
                                                    if($('#radio_button_b_$x').is(':checked')) { 
                                                    document.getElementById('$x').style.background = '#333';
                                                    document.getElementById('$x').style.color = '#f0f0f0';
                                                    }
                                                    if($('#radio_button_c_$x').is(':checked')) { 
                                                    document.getElementById('$x').style.background = '#333';
                                                    document.getElementById('$x').style.color = '#f0f0f0';
                                                    }
                                                    if($('#radio_button_d_$x').is(':checked')) { 
                                                    document.getElementById('$x').style.background = '#333';
                                                    document.getElementById('$x').style.color = '#f0f0f0';
                                                    }
                                                    if($('#radio_button_e_$x').is(':checked')) { 
                                                    document.getElementById('$x').style.background = '#333';
                                                    document.getElementById('$x').style.color = '#f0f0f0';
                                                    }
                                                });
                                              </script>
                                          ";
                                        }
                                    while ($soal = mysql_fetch_array($cek)){
                                    // Soal no. 1
                                        if( $soal['nosoal'] == 1){?>
                                        <div class="row-main-all exam" id="no<?php echo $soal['nosoal'];?>">
                                            <div class="row-main-exam">
                                                <div class="col-no-soal">No. Soal : <?php echo $soal['nosoal']; ?></div>
                                                <div class="main-exam-soal">
                                                    <?php
                                                        if(!empty($soal['audio'])){?>
                                                            <div class="exam-audio">
                                                                <audio controls>
                                                                    <source src="item/<?php echo $soal['audio']; ?>" type="audio/mpeg">
                                                                </audio>
                                                            </div>
                                                        <?php
                                                        }elseif(!empty($soal['gambar'])){?>
                                                            <div class="exam-audio">
                                                                <img src="item/<?php echo $soal['gambar']; ?>" width="30%" style="width:65%">
                                                            </div>
                                                        <?php
                                                        }else{
                                                        }
                                                    ?>
                                                    <div class="exam-text">
                                                        <?php
                                                        $a = str_replace("Â", "", $soal['soal']);
                                                        $b = str_replace("â€™", "'", $a);
                                                        $c = str_replace("â€œ", '"', $b);
                                                        $d = str_replace('â€“', '-', $c);
                                                        $text = str_replace('â€', '"', $d);
                                                        echo $text; 
                                                        ?>
                                                    </div>
                                               </div>
                                                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
                                                    <li style="width:100%"><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">
                                                        A. <?php if(!empty($soal['agmbar'])){
                                                            echo "<img src='item/".$soal['agmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['a']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                           
                                                    <li style="width:100%"><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">
                                                        B. <?php if(!empty($soal['bgmbar'])){
                                                            echo "<img src='item/".$soal['bgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['b']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">
                                                        C. <?php if(!empty($soal['cgmbar'])){
                                                            echo "<img src='item/".$soal['cgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['c']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">
                                                        D. <?php if(!empty($soal['dgmbar'])){
                                                            echo "<img src='item/".$soal['dgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['d']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">
                                                        E. <?php if(!empty($soal['egmbar'])){
                                                            echo "<img src='item/".$soal['egmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['e']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                </div>
                                                <script>
                                                    $('#element<?php echo $soal['nosoal']; ?>').click(function() {
                                                       if($('#radio_button_a_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'A';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                        
                                                        }
                                                        if($('#radio_button_b_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'B';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_c_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'C';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_d_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'D';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';

                                                        }
                                                        if($('#radio_button_e_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'E';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                    });
                                                </script>

                                                
                                            </div>
                                            <div class="main-exam-btn">
                                                <div class="col-btn">
                                                    <div class="btn previous-term back-exam-btn" onclick="plusSlides(-1)" style="visibility: hidden;">Kembali</div>
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn-confu"><input type="checkbox" name="ragu<?php echo $soal['nosoal']?>" onclick="checkkRagu()" value="1" id="raguragu<?php echo $soal['nosoal']?>">Ragu-ragu</div>
                                                    <?php
                                                        echo "
                                                            <script>
                                                                $('#raguragu".$soal['nosoal']."').click(function(){
                                                                    var checkBox = document.getElementById('raguragu".$soal['nosoal']."');
                                                                    var text = document.getElementById('".$soal['nosoal']."');
                                                                    if (checkBox.checked == true){
                                                                        text.style.background = '#E0D100';
                                                                        text.style.color = '#333';
                                                                    } else {
                                                                        text.style.background = '#333';
                                                                        text.style.color = '#f0f0f0';
                                                                    }
                                                                });
                                                            </script>
                                                        ";
                                                    ?>
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn next-term next-exam-btn" onclick="plusSlides(1)">Lanjut</a></div>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <?php
                                        }elseif($soal['nosoal'] < $end){?>
                                        <div class="row-main-all exam" id="no<?php echo $soal['nosoal'];?>" style="display: none">
                                            <div class="row-main-exam">
                                                <div class="col-no-soal">No. Soal : <?php echo $soal['nosoal']; ?></div>
                                                <div class="main-exam-soal">
                                                    <?php
                                                        if(!empty($soal['audio'])){?>
                                                            <div class="exam-audio">
                                                                <audio controls>
                                                                    <source src="item/<?php echo $soal['audio']; ?>" type="audio/mpeg">
                                                                </audio>
                                                            </div>
                                                        <?php
                                                        }elseif(!empty($soal['gambar'])){?>
                                                            <div class="exam-audio">
                                                                <img src="item/<?php echo $soal['gambar']; ?>" width="30%" style="width:65%">
                                                            </div>
                                                        <?php
                                                        }else{
                                                        }
                                                    ?>
                                                    <div class="exam-text"><?php echo $soal['soal']; ?></div>
                                               </div>
                                                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
                                                    <li style="width:100%"><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">
                                                        A. <?php if(!empty($soal['agmbar'])){
                                                            echo "<img src='item/".$soal['agmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['a']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                           
                                                    <li style="width:100%"><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">
                                                        B. <?php if(!empty($soal['bgmbar'])){
                                                            echo "<img src='item/".$soal['bgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['b']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">
                                                        C. <?php if(!empty($soal['cgmbar'])){
                                                            echo "<img src='item/".$soal['cgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['c']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">
                                                        D. <?php if(!empty($soal['dgmbar'])){
                                                            echo "<img src='item/".$soal['dgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['d']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">
                                                        E. <?php if(!empty($soal['egmbar'])){
                                                            echo "<img src='item/".$soal['egmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['e']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                </div>
                                                <script>
                                                    $('#element<?php echo $soal['nosoal']; ?>').click(function() {
                                                       if($('#radio_button_a_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'A';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_b_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'B';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_c_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'C';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_d_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'D';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_e_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'E';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="main-exam-btn">
                                                <div class="col-btn">
                                                    <div class="btn previous-term back-exam-btn" onclick="plusSlides(-1)" style="visibility: visible;">Kembali</div>
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn-confu"><input type="checkbox" name="ragu<?php echo $soal['nosoal']?>" onclick="checkRagu()" value="1" id="raguragu<?php echo $soal['nosoal']?>">Ragu-ragu</div>
                                                    <?php
                                                        echo "
                                                            <script>
                                                                $('#raguragu".$soal['nosoal']."').click(function(){
                                                                    var checkBox = document.getElementById('raguragu".$soal['nosoal']."');
                                                                    var text = document.getElementById('".$soal['nosoal']."');
                                                                    if (checkBox.checked == true){
                                                                        text.style.background = '#E0D100';
                                                                        text.style.color = '#333';
                                                                    } else {
                                                                        text.style.background = '#333';
                                                                        text.style.color = '#f0f0f0';
                                                                    }
                                                                });
                                                            </script>
                                                        ";
                                                    ?>
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn next-term next-exam-btn" onclick="plusSlides(1)">Lanjut</a></div>
                                                </div>  
                                            </div>
                                        </div>

                                        <?php
                                        }elseif($soal['nosoal'] == $end){?>
                                        <div class="row-main-all exam" id="no<?php echo $soal['nosoal'];?>" style="display: none">
                                            <div class="row-main-exam">
                                                <div class="col-no-soal">No. Soal : <?php echo $soal['nosoal']; ?></div>
                                                <div class="main-exam-soal">
                                                    <?php
                                                        if(!empty($soal['audio'])){?>
                                                            <div class="exam-audio">
                                                                <audio controls>
                                                                    <source src="audio/<?php echo $soal['audio']; ?>" type="audio/mpeg">
                                                                </audio>
                                                            </div>
                                                        <?php
                                                        }elseif(!empty($soal['gambar'])){?>
                                                            <div class="exam-audio">
                                                                <img src="item/<?php echo $soal['gambar']; ?>" width="30%" style="width:65%">
                                                            </div>
                                                        <?php
                                                        }else{
                                                        }
                                                    ?>
                                                    <div class="exam-text"><?php echo $soal['soal']; ?></div>
                                               </div>
                                                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
                                                    <li style="width:100%"><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">
                                                        A. <?php if(!empty($soal['agmbar'])){
                                                            echo "<img src='item/".$soal['agmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['a']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                           
                                                    <li style="width:100%"><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">
                                                        B. <?php if(!empty($soal['bgmbar'])){
                                                            echo "<img src='item/".$soal['bgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['b']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">
                                                        C. <?php if(!empty($soal['cgmbar'])){
                                                            echo "<img src='item/".$soal['cgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['c']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">
                                                        D. <?php if(!empty($soal['dgmbar'])){
                                                            echo "<img src='item/".$soal['dgmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['d']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                    <li style="width:100%"><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">
                                                        E. <?php if(!empty($soal['egmbar'])){
                                                            echo "<img src='item/".$soal['egmbar']."' style='position: absolute;max-height: 100px;min-width:15%'>";
                                                            }else{
                                                            $a = str_replace("Â", "", $soal['e']);
                                                            $b = str_replace("â€™", "'", $a);
                                                            $c = str_replace("â€œ", '"', $b);
                                                            $d = str_replace('â€“', '-', $c);
                                                            $text = str_replace('â€', '"', $d);
                                                            echo "<font>".$text."</font>";}?></li>
                                                </div>
                                                <script>
                                                    $('#element<?php echo $soal['nosoal']; ?>').click(function() {
                                                       if($('#radio_button_a_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'A';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_b_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'B';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_c_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'C';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_d_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'D';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                        if($('#radio_button_e_<?php echo $soal['nosoal']; ?>').is(':checked')) { 
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#333';
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.color = '#f0f0f0';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').innerHTML = 'E';
                                                        document.getElementById('poinAwsr<?php echo $soal['nosoal']; ?>').style.color = '#333';
                                                        }
                                                    });
                                                </script>
                                                <script type="text/javascript">
                                                    if(document.getElementById('raguragu<?php echo $soal['nosoal']?>').checked) {
                                                        document.getElementById('<?php echo $soal['nosoal']; ?>').style.background = '#EDDD00';
                                                    } else {
                                                    }
                                                </script>
                                            </div>
                                            <div class="main-exam-btn">
                                                <div class="col-btn">
                                                    <div class="btn previous-term back-exam-btn" onclick="plusSlides(-1)" style="visibility: visible;">Kembali</div>
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn-confu"><input type="checkbox" name="ragu<?php echo $soal['nosoal']?>" onclick="checkkRagu()" value="1" id="raguragu<?php echo $soal['nosoal']?>">Ragu-ragu</div>
                                                    <?php
                                                        echo "
                                                            <script>
                                                                $('#raguragu".$soal['nosoal']."').click(function(){
                                                                    var checkBox = document.getElementById('raguragu".$soal['nosoal']."');
                                                                    var text = document.getElementById('".$soal['nosoal']."');
                                                                    if (checkBox.checked == true){
                                                                        text.style.background = '#E0D100';
                                                                        text.style.color = '#333';
                                                                    } else {
                                                                        text.style.background = '#333';
                                                                        text.style.color = '#f0f0f0';
                                                                    }
                                                                });
                                                            </script>
                                                        ";
                                                    ?>  
                                                </div>
                                                <div class="col-btn">
                                                    <div class="btn next-term next-exam-btn" style="background:#013A8B;padding:0;">
                                                        <div onclick="postConfirm();" style="background:#013A8B;border: none;padding: 10px 20px;font-size: 16pt;text-align: center;transition: box-shadow 0.2s;cursor: pointer;border-radius: 5px;color: #fff;">Selesai</div>
                                                        <input type="submit" id="submitExam" name="highexam" value="Selesai" style="background:#013A8B;display: none">
                                                    </div>
                                                </div>
                                                <div id="atten" style="position: fixed;display:none;width: 100%;height:150%;top:0;left:0;z-index: 9999;background: rgba(0,0,0,0.5);">
                                                    <div style="width: 50%;min-height:200px;margin:100px auto;background: #fff;border-radius: 20px;box-shadow: 3px 4px 10px #333;padding:10px">
                                                        <h1 style="text-align: center;margin-bottom: 100px">Apakah Kamu Yakin Selesai?</h1>

                                                        <div style="width:50%;float: left;"><div onclick="ConfirmYes();" style="float: left;background:#013A8B;border: none;padding: 10px 20px;font-size: 16pt;background: #DB7E0D;text-align: center;transition: box-shadow 0.2s;cursor: pointer;border-radius: 5px;color: #fff;">Ya</div></div>

                                                        <div style="width:50%;float: left;"><div onclick="ConfirmNo();" style="float: right;background:#013A8B;border: none;padding: 10px 20px;font-size: 16pt;background: #DB7E0D;text-align: center;transition: box-shadow 0.2s;cursor: pointer;border-radius: 5px;color: #fff;">Tidak</div></div>
                                                    </div>
                                                </div>
                                                <script>
                                                function postConfirm() {
                                                    document.getElementById('atten').style.display='block';
                                                }
                                                function ConfirmNo() {
                                                    setTimeout(function() {
                                                        $('#atten').fadeOut('slow');
                                                    }, 500);
                                                }
                                                function ConfirmYes() {
                                                    document.getElementById("submitExam").click();
                                                }
                                                </script>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    // penutup soal
                                    } 
                                        {?>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                            <script src="js/jquery-3.2.1.min.js"></script>
                                            <script>
                                                $(document).ready(function (){
                                                    $('#showFilePanel').click(function(event) {
                                                      if ($('.mapping-exam-view').hasClass('dismiss')) {
                                                        $('.mapping-exam-view').removeClass('dismiss').addClass('selected').show();
                                                        document.getElementById("showFilePanel").style.display = "none";
                                                        document.getElementById("closeFilePanel").style.display = "block";
                                                      }
                                                      event.preventDefault();
                                                    });

                                                    $('#closeFilePanel').click(function(event) {
                                                      if ($('.mapping-exam-view').hasClass('selected')) {
                                                        $('.mapping-exam-view').removeClass('selected').addClass('dismiss');
                                                        document.getElementById("closeFilePanel").style.display = "none";
                                                        document.getElementById("showFilePanel").style.display = "block";
                                                      }
                                                      event.preventDefault();
                                                    });
                                                  });
                                            </script>
                                            <div class="mapping-exam " id="mapping">
                                                <div class="mapping-exam-symbol mappingBtn" id="showFilePanel" style="display: block;"><img src="img/cek.png" width="100%"></div>
                                                <div class="mapping-exam-symbol mappingBtn" id="closeFilePanel" style="display: none;"><img src="img/tutup.png" width="100%"></div>
                                                <div class="mapping-exam-view dismiss">
                                                    <div class="point-exam-check">
                                                        <?php
                                                        $sql = mysql_query("select * from soalsma where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
                                                        $row = mysql_num_rows($sql);
                                                        while ($o = mysql_fetch_array($sql))
                                                            { 
                                                            $n = $o['nosoal'];
                                                            echo "<li id='".$o['nosoal']."' style='cursor:pointer'><div class='point-awsr' id='poinAwsr".$o['nosoal']."'></div>".$o['nosoal']."</li>";
                                                            echo " 
                                                            <script type='text/javascript'>
                                                                $('#".$o['nosoal']."').click(function(){
                                                            ";
                                                                    $sql2 = mysql_query("select * from soalsma where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
                                                                    while($r = mysql_fetch_array($sql2)){
                                                                    echo "document.getElementById('no".$r['nosoal']."').style.display = 'none';";
                                                                    }
                                                            echo "
                                                                document.getElementById('no".$o['nosoal']."').style.display = 'block';
                                                                });
                                                            </script>
                                                            ";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        if(isset($_POST['highexam'])){
                                        /*echo "<script>alert('".$ex['pelajaran']."| ".$ex['paket']." |".$_SESSION['nisn']."')</script>";*/
                                                                            
                                        $sql = mysql_query("select * from soalsma where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
                                        $con = mysql_num_rows($sql);
                                        $last = $con-1;
                                        $benar = 0;
                                        $salah = 0;
                                        while ($j = mysql_fetch_array($sql)){
                                            $cod = $j['nosoal'];
                                            $ragu = 'ragu'.$cod;
                                            $name = 'jawaban'.$cod;
                                            $jwb = $_POST[$name];
                                            if($jwb == $j['jawaban']){
                                                $benar++;
                                            }elseif($jwb != $j['jawaban']){
                                                $salah++;
                                            }
                                        }
                                        $jwbBenar = $benar;
                                        $jwbSalah = $salah;
                                        
                                        $cek = mysql_query("select * from ".$s." where nik = '".$_SESSION['nisn']."'");
                                        if(mysql_num_rows($cek) == 1){
                                            $h = mysql_fetch_array($cek);
                                            if($_SESSION['siswa'] == $h['name']){
                                                //===========================================
                                                $post3 = "benar=".$jwbBenar."&salah=".$jwbSalah."&nins3=".$_SESSION['nisn']."&sekolah3=".$_SESSION['sekolah'];
                                                $url3 = "https://...com/config/getfinish.php";
                                                 
                                                $curlHandle3 = curl_init();
                                                curl_setopt($curlHandle3, CURLOPT_URL, $url3);
                                                curl_setopt($curlHandle3, CURLOPT_POSTFIELDS, $post3); 
                                                curl_setopt($curlHandle3, CURLOPT_HEADER, 0);
                                                curl_setopt($curlHandle3, CURLOPT_RETURNTRANSFER, 1);
                                                curl_setopt($curlHandle3, CURLOPT_TIMEOUT,30);
                                                curl_setopt($curlHandle3, CURLOPT_POST, 1);
                                                curl_exec($curlHandle3);
                                                curl_close($curlHandle3);
                                                //===========================================
                                                $r = str_replace(" ","",$_SESSION['sekolah']);
                                                $t = strtolower($r);
                                                $s = str_replace("-", "", $t);
                                                $in = mysql_query("update updateujian set jawabanBenar='$jwbBenar', jawabanSalah='$jwbSalah' where nik = '".$h['nik']."' order by id desc limit 1");
                                                $h = mysql_query("update siswa set activacy='' where nik='".$h['nik']."'");
                                                if($in and $h){
                                                    echo "<script>window.location = '?page=Selesai';</script>";
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            }
        }
        ?>
    <?php
    }
    function finish(){?>
        <section class="finish">
            <div class="container">
                <div class="wp-main">
                    <div class="report-main">
                        <h2>Terima kasih..!! </h2>
                        <h3><?php echo $_SESSION['siswa']; ?></h3>
                        <?php
                            $cek = mysql_query("select * from siswa where nik = '".$_SESSION['nisn']."'");
                            if(mysql_num_rows($cek)){
                                $h = mysql_fetch_array($cek);
                                if($h['name'] == $_SESSION['siswa']){
                                    $in = mysql_query("select * from updateujian where nik = '".$h['nik']."' order by id desc limit 1");
                                    if(mysql_num_rows($in)){
                                        $f = mysql_fetch_array($in);
                                        echo "<div class='row-awnsr'>Jawaban Benar anda = ".$f['jawabanBenar']."</div>";
                                        echo "<div class='row-awnsr'>Jawaban Salah anda = ".$f['jawabanSalah']."</div>";
                                        session_destroy();
                                    }
                                }
                            }
                        ?>
                        <div class="">
                            <?php
                                if($_GET['page'] == 'Selesai'){?>
                                    <script type="text/javascript">
                                        function startTimer(duration, display) {
                                        var timer = duration, minutes, seconds;
                                        setInterval(function () {
                                            minutes = parseInt(timer / 60, 10)
                                            seconds = parseInt(timer % 60, 10);

                                            minutes = minutes < 10 ? "0" + minutes : minutes;
                                            seconds = seconds < 10 ? "0" + seconds : seconds;

                                            display.textContent = minutes + " " +":"+ " " + seconds + " " + "Detik" + " " + "Untuk" + " " + "Otomatis" + " " + "Logout";
                                            document.cookie = display.textContent;  

                                            if (--timer < 0) {
                                                    window.location = 'logout.php';
                                            }
                                        }, 1000);
                                    }
                                    window.onload = function () {
                                        var sixSecond = 60 * 1,
                                            display = document.querySelector('#timeLogout');
                                        startTimer(sixSecond, display);
                                    };
                                    </script>
                                    <span class="time-logout" id='timeLogout'>01 : 00 Detik Untuk Otomatis Logout</span>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
?>