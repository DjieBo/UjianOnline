<?php
    include 'connect.php';
    session_start();
    $mysql = mysql_query("select * from updateujian order by id desc limit 1");
        while($t = mysql_fetch_array($mysql)){
        if(isset($_POST['selesaiUjian'])){
            $sql = mysql_query("select * from soalujian where pelajaran = '".$t['pelajaran']."' and paket = '".$t['paket']."' order by nosoal asc");
            $con = mysql_num_rows($sql);
            $last = $con-1;
            $benar = 0;
            $salah = 0;
            while ($j = mysql_fetch_array($sql)){
                if($j['nosoal'] <= $last){
                    $cod = $j['nosoal'];
                    $name = 'jawaban'.$cod;
                    $jwb = $_POST[$name];
                    echo "<p>Isian = $jwb<br>";
                    echo "Jawaban = ".$j['jawaban']."</p>";
                    if($jwb == $j['jawaban']){
                        $benar++;
                    }elseif($jwb != $j['jawaban']){
                        $salah++;
                    }
                }
                
            }
            $jwbBenar = $benar;
            $jwbSalah = $salah;
            $cek = mysql_query("select * from data where email = '".$_SESSION['email']."'");
            if(mysql_num_rows($cek)){
                $h = mysql_fetch_array($cek);
                if($_SESSION['name'] == $h['name']){
                    $in = mysql_query("update updateujian set jawabanBenar='$jwbBenar', jawabanSalah='$jwbSalah' where nik = '".$h['nik']."' order by id desc limit 1");
                    if($in){
                        echo "<script>window.location = '?page=Selesai';</script>";
                    }
                }
            }
            
        }
    }
?>