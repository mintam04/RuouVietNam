<?php
    session_start();
    echo "<pre>";
    print_r($_SESSION['mycart']);
    echo "</pre>";
    // $id=$_SESSION['mycart'][0];
    // echo $id;
    if(isset($_GET['idcart'])){
       
        unset($_SESSION['mycart'][$_GET['idcart']]);      
    }
    else{
        $_SESSION['mycart']=[];
    }
    header("Location:viewcart.php");
?>