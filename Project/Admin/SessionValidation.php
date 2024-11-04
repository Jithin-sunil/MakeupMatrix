<?php
session_start();
if($_SESSION['adid']==""){
    header('location:../Guest/Login.php');
}
?>