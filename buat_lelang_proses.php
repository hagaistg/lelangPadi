<?php
session_start();
include_once("listFungsi.php");
$id = $_SESSION['id'];
date_default_timezone_set('Asia/Jakarta');
$nama_lelang = $_POST['nama'];
$jenis = $_POST['sel1'];
$berat = $_POST['kuantitas'];
$harga_awal = $_POST['harga'];
$now = date(' H:i:s');
$tanggal_lelang = $_POST['tAwal'] . $now;
$waktu_akhir = $_POST['tAkhir'] . $now;

$deskripsi = $_POST['deskripsi'];
$database = doConnect();

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path = "FOTO_PADI/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){
    if($ukuran_file <= 100000000){
        if(move_uploaded_file($tmp_file, $path)){
            if(date('Y-m-d')>$tanggal_lelang || date('Y-m-d')>$waktu_akhir){
                echo "<script>alert('Tanggal tidak boleh kurang dari hari ini');</script>";
                header('Refresh:0 url=lelang.php');
                
            }
            else if($waktu_akhir>date('Y-m-d',strtotime('+5 days',strtotime($tanggal_lelang))) || $waktu_akhir<date('Y-m-d',strtotime('+3 days',strtotime($tanggal_lelang)))){
                echo "<script>alert('Tanggal minimal 3 hari maksimal 5 hari dari tanggal lelang');</script>";
                header('Refresh:0 url=add_lelang.php');
            }
            else{
                $query = "INSERT INTO lelang(padi_id_padi,user_id_user,nama_lelang,deskripsi,tanggal_lelang,waktu_berakhir,harga_awal,berat,foto_padi) VALUES ($jenis,$id,'$nama_lelang','$deskripsi','$tanggal_lelang', '$waktu_akhir','$harga_awal','$berat' , '$nama_file')";
             
                $q = mysqli_query($database, $query);
            
                if(!$q){
                    echo $jenis .mysqli_connect_error();
                }
                else{
                    echo "<script>alert('Berhasil Memasukkan Lelang');</script>";
                header('Refresh:0 url=my_lelang.php');
                }
            }
        }else{
            echo '<script language="javascript">alert("Terjadi Kesalahan saat mengupload"); document.location="add_lelang.php";</script>';        
        }
    }else{
        echo '<script language="javascript">alert("Ukuran gambar terlalu besar"); document.location="add_lelang.php";</script>';
    }
}else{
    echo '<script language="javascript">alert("Tipe gambar harus Jpg/png"); document.location="add_lelang.php";</script>';
}

?>   