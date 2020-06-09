<?php
    include "config/connect.php";
    include "config/require.php";
    
    session_start();
    if(!isset($_SESSION['name'])){
        header('location:http://unbk.adhytracourseinstitute.com');
    }else{?>
        
    <?php    
    }
?>
