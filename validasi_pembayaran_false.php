<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_GET['id'];
    $rec2 ="UPDATE `riwayatlelang` SET `status_pemenang`='2' WHERE `id_lelang` = $id";
    if ($link->query($rec2) === TRUE) {
        echo '<script language="javascript">alert("Validasi sukses !"); document.location="my_lelang.php";</script>';
    } else {
        echo "Error updating record: " . $link->error;
    }