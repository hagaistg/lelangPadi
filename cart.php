<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
      header("Location: login.php");
    }
    $link = doConnect();
    $id = $_SESSION['id'];
    $query = "SELECT lelang.* FROM lelang INNER join penawaran on lelang.id_lelang = penawaran.padi_id_padi WHERE penawaran.user_id_user = $id GROUP by id_lelang";
    $result_set = $link->query($query);
    open_page() ;
    open_header();
    ?>
<br><br><br>
<div class="container">
    <h3>Cart</h3>
    <div class="facts">
		<div class="hero-unit">
            <div class="row">
            <table class="table table-hover table-condensed">
            <tr>
                <th><center>No</center></th>
                <th><center>Nama lelang</center></th>
                <th><center>waktu berakhir</center></th>
                <th colspan="5"><center>Action</center></th>
            </tr>
            <?php
                $no = 1;
                while ($row = $result_set->fetch_assoc()) {
                    $id_lelang = $row['id_lelang'];
                    $query2 =mysqli_query($link, "SELECT * From riwayatlelang where id_lelang = $id_lelang GROUP BY id_riwayatlelang DESC");
                    $rec2 = mysqli_fetch_array($query2);
                    echo '<tr>';
                    echo ('<td><center>'.$no++.'</center></td>');
                    echo ('<td><center>'.$row['nama_lelang'].'</center></td>');
                    echo ('<td><center>'.$row['waktu_berakhir'].'</center></td>');
                    if($row['pemenang']==NULL){
                        echo ('<td colspan ="2"><center>Pemenang belum ditentukan</center></td>');
                    }else if($row['pemenang']==$id && $rec2['status_pemenang']==0){
                        echo("<td colspan ='2'><center><a class='btn btn-warning' href='bayar.php?id=" . $row['id_lelang'] . "'>BAYAR</a></center></td>");
                    }else if($row['pemenang']==$id && ($rec2['status_pemenang']==1) && ($rec2['status_pelelang']==2)){
                        echo("<td><center>Silahkan tunggu validasi pembayaran</center></td><br>");
                    }else if($row['pemenang']==$id && $rec2['status_pelelang']!=1){
                        echo("<td colspan ='2'><center>Pembayaran yang anda lakukan salah !<br><br>");
                        echo("<center><a class='btn btn-danger' href='bayar_ulang.php?id=" . $row['id_lelang'] . "'>VALIDASI ULANG</a></center></td>");
                    }else if($row['pemenang']==$id && ($rec2['status_pemenang']==1) && ($rec2['status_pelelang']==1)){
                        echo("<td colspan='5'><center>Pembayaran Sukses</center></td><br>");
                    }else{
                        echo ('<td colspan="2"><center>Maaf anda bukan pemenang lelang</center></td>');
                    }

                    if($rec2['review']==NULL && !$rec2['id_riwayatLelang']==NULL && $rec2['pemenang_lelang']== $id){
                        echo("<td><center><a class='btn btn-primary' href='review.php?id=" . $rec2['id_riwayatLelang'] . "'>Review</a></center></td>");
                    }
                }
            ?>
	    	</table>
            </div>
    	</div>         
    </div>
</div>

