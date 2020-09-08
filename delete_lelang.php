<?php
    session_start();
    include_once('listFungsi.php');
    include_once("listFungsi.php");
    open_page();
    open_header();
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_GET['id'];

    $query = mysqli_query($link,"DELETE FROM lelang WHERE id_lelang = $id");
    echo '<script language="javascript">alert("Delete sukses !"); document.location="my_lelang.php";</script>';
?>