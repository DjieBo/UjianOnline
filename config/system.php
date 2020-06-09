<?php
	function login(){
        
        if(isset($_POST['login'])){
            $nik = $_POST['nisn'];
            $prog = $_POST['program'];
            $pass = $_POST['password'];
    
            $username = mysql_real_escape_string($nik);
            $program = mysql_real_escape_string($prog);
            $password = md5(mysql_real_escape_string($pass));

            function getUserIpAddr(){
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                return $ip;
            }
            $getIP = getUserIpAddr();
            //===========================================================

            if(empty($username) or empty($password)){
                echo "<script>alert('Silahkan isi Email dan Password terlebih dahulu');</script>";
            }else{
                $sql = mysql_query("SELECT * FROM siswa where nik='$nik' and pass='$password'"); //Cek Data Siswa
                if (mysql_num_rows($sql) == 1){

                    $end = mysql_fetch_array($sql);
                    if($end['activacy'] == null){ //when user disactive
                        //=========================================
                        $post = "nisn=".$username."&ip=".$getIP;
                         
                        $curlHandle = curl_init();
                        curl_setopt($curlHandle, CURLOPT_URL, $url);
                        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $post);
                        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                        curl_setopt($curlHandle, CURLOPT_POST, 1);
                        curl_exec($curlHandle);
                        curl_close($curlHandle);
                        //==========================================
                        $r = str_replace(" ","",$end['sekolah']);
                        $t = strtolower($r);
                        $s = str_replace("-", "", $t);

                        if(is_dir("d://../")){
                            if(is_dir("d://../".$end['sekolah']."_".$username."")){}
                            else{mkdir("d://../".$end['sekolah']."_".$username."");}
                        }else{
                            mkdir("d://../");
                            mkdir("d://../".$end['sekolah']."_".$username."");
                        }
                        //==============================================
                        $g = mysql_query("select * from ".$s." where nik='".$end['nik']."'");
                        if(mysql_num_rows($g) == 1){
                            $f = mysql_fetch_array($g);
                            $k = mysql_query("update siswa set activacy='".$getIP."' where nik='$username'");
                            $_SESSION['siswa'] = mysql_real_escape_string($f['name']);
                            $_SESSION['nisn'] = $f['nik'];
                            $_SESSION['sekolah'] = $f['sekolah'];
                        }
                    }elseif($end['activacy'] == $getIP){//when user active same IP
                        if(is_dir("d://../".$end['sekolah']."_".$username."")){
                            $r = str_replace(" ","",$end['sekolah']);
                            $t = strtolower($r);
                            $s = str_replace("-", "", $t);

                            $g = mysql_query("select * from ".$s." where nik='".$end['nik']."'");
                            if(mysql_num_rows($g) == 1){
                                $f = mysql_fetch_array($g);
                                $_SESSION['siswa'] = mysql_real_escape_string($f['name']);
                                $_SESSION['nisn'] = $f['nik'];
                                $_SESSION['sekolah'] = $f['sekolah'];
                            }
                            echo "<script>window.location = '/ujianonline/unbk/';</script>";
                        }
                    }elseif($end['activacy'] != $getIP){//when user active
                        echo "<script>alert('Maaf akun ini berstatus Login silahkan hubungi admin sekolah untuk aktivasi! ');</script>";
                    }
                    if($program == 'unbk'){
                        echo "<script>window.location = '/ujianonline/unbk/';</script>";
                    }else{
                    	echo "<script>alert('Maaf anda belum terdaftar');</script>";
                    }
                }else{
                    echo "<script>alert('Email atau password anda salah !');</script>";
                }
            }
        }
    }
?>