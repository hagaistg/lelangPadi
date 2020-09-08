<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_POST['id'];
    $review = $_POST['review'];
    $rec2 = mysqli_query($link, "UPDATE `riwayatlelang` SET `review`='$review' WHERE id_riwayatLelang = $id");
    echo '<script language="javascript">alert("Review sukses !"); document.location="cart.php";</script>';