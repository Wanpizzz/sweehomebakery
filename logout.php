<?php
    session_start();

    session_unset();

    session_destroy();
    if(isset($_SESSION['custID'])){
        header('Location: login.php');
        echo "<script>window.location.href = 'login.php';</script>";
        exit();
    }
    else{
        header('Location: home.html');
        echo "<script>window.location.href = 'home.html';</script>";
        exit();
    }
?>