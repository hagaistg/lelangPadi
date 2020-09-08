<?php
    include_once('listFungsi.php');
    session_start();
    error_reporting(0);
    $db = doConnect();

    $pemenang = $_SESSION['id'];
    $id = $_POST['id'];
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "Bukti_pembayaran/".$nama_file;

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){
        if($ukuran_file <= 100000000){
            if(move_uploaded_file($tmp_file, $path)){
                $query = "INSERT INTO riwayatlelang(pemenang_lelang,id_lelang,foto_bukti_pembayaran,status_pemenang, status_pelelang)
                VALUES('".$pemenang."','".$id."','".$nama_file."','1', '2')";      
                $sql = mysqli_query($db, $query);
                echo '<script language="javascript">alert("Suksess !"); document.location="cart.php";</script>';
                if($sql){
                    header("location: cart.php");
                }else{
                    echo '<script language="javascript">alert("Terjadi Kesalahan saat mengupload"); document.location="cart.php";</script>';
                }
            }else{
                echo '<script language="javascript">alert("Terjadi Kesalahan saat mengupload"); document.location="cart.php";</script>';        
            }
        }else{
            echo '<script language="javascript">alert("Ukuran gambar terlalu besar"); document.location="cart.php";</script>';
        }
    }else{
        echo '<script language="javascript">alert("Tipe gambar harus Jpg/png"); document.location="cart.php";</script>';
    }