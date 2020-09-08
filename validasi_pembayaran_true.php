<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_GET['id'];
    $rec2 = mysqli_query($link, "UPDATE `riwayatlelang` SET `status_pelelang`='1' WHERE `id_lelang` = $id");
    echo '<script language="javascript">alert("Validasi sukses !"); document.location="my_lelang.php";</script>';