<?php
	function examSMP(){
		$cek = mysql_query("select * from soalsmp where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."'");
		while($t = mysql_fetch_array($cek)){
			echo $t['nosoal'];
			echo "SMP";
		}
	}
	function examSD(){
		$cek = mysql_query("select * from soalsd where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."'");
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
	                                    <source src="audio/<?php echo $soal['audio']; ?>" type="audio/mpeg">
	                                </audio>
	                            </div>
	                        <?php
	                        }else{
	                        }
	                    ?>
	                    <div class="exam-text"><?php echo $soal['soal']; ?></div>
	               </div>
	                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
	                    <li><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">A. <font><?php echo $soal['a']?></font></li>
	                    <li><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">B. <font><?php echo $soal['b']?></font></li>
	                    <li><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">C. <font><?php echo $soal['c']?></font></li>
	                    <li><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">D. <font><?php echo $soal['d']?></font></li>
	                    <li><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">E. <font><?php echo $soal['e']?></font></li>
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
	                                    <source src="audio/<?php echo $soal['audio']; ?>" type="audio/mpeg">
	                                </audio>
	                            </div>
	                        <?php
	                        }else{
	                        }
	                    ?>
	                    <div class="exam-text"><?php echo $soal['soal']; ?></div>
	               </div>
	                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
	                    <li><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">A. <font><?php echo $soal['a']?></font></li>
	                    <li><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">B. <font><?php echo $soal['b']?></font></li>
	                    <li><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">C. <font><?php echo $soal['c']?></font></li>
	                    <li><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">D. <font><?php echo $soal['d']?></font></li>
	                    <li><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">E. <font><?php echo $soal['e']?></font></li>
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
	                        }else{
	                        }
	                    ?>
	                    <div class="exam-text"><?php echo $soal['soal']; ?></div>
	               </div>
	                <div class="main-exam-awnr" id="element<?php echo $soal['nosoal']; ?>">
	                    <li><input type="radio" id="radio_button_a_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="A">A. <font><?php echo $soal['a']?></font></li>
	                    <li><input type="radio" id="radio_button_b_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="B">B. <font><?php echo $soal['b']?></font></li>
	                    <li><input type="radio" id="radio_button_c_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="C">C. <font><?php echo $soal['c']?></font></li>
	                    <li><input type="radio" id="radio_button_d_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="D">D. <font><?php echo $soal['d']?></font></li>
	                    <li><input type="radio" id="radio_button_e_<?php echo $soal['nosoal']; ?>" name="jawaban<?php echo $soal['nosoal']; ?>" value="E">E. <font><?php echo $soal['e']?></font></li>
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
	                    <div class="btn next-term next-exam-btn" id="selesai" style="background:#013A8B;">Selesai</a></div>
	                    <div class="btn next-term next-exam-btn" style="background:#013A8B;padding:0;visibility: hidden;">
	                        <input type="submit" id="submitExam" name="juniorexam" value="Selesai" style="background:#013A8B;">
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php
	        }
	    // penutup soal
	    }   

	        {?>
	            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	                        $sql = mysql_query("select * from soalsd where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
	                        $row = mysql_num_rows($sql);
	                        while ($o = mysql_fetch_array($sql))
	                            { 
	                            $n = $o['nosoal'];
	                            echo "<li id='".$o['nosoal']."' style='cursor:pointer'><div class='point-awsr' id='poinAwsr".$o['nosoal']."'></div>".$o['nosoal']."</li>";
	                            echo " 
	                            <script type='text/javascript'>
	                                $('#".$o['nosoal']."').click(function(){
	                            ";
	                                    $sql2 = mysql_query("select * from soalsd where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
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

	        $mysql = mysql_query("select * from soalsd where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
	        while ($f = mysql_fetch_array($mysql)) {
	            $no = $f['nosoal'];
	            $ragu = 'raguragu'.$no;
	        }
	        echo "
	            <script>
	                $('#selesai').click(function(){
	                    if(document.getElementById('".$ragu."').checked == false){
	                        document.getElementById('submitExam').click();
	                    }
	                    if (document.getElementById('".$ragu."').checked == true ){
	                        var corm = confirm('Anda memiliki jawaban ragu-ragu, Apakah anda yakin untuk selesai ujian..??');
	                        if(corm == true){
	                        document.getElementById('submitExam').click();
	                        }else{
	                        }
	                    }
	                });
	            </script>
	        ";
	        if(isset($_POST['juniorexam'])){                                        
	        $sql = mysql_query("select * from soalsd where pelajaran = '".$ex['pelajaran']."' and paket = '".$ex['paket']."' order by nosoal asc");
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