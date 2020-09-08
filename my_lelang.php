<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
      header("Location: login.php");
    }
    $link = doConnect();
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `lelang` WHERE user_id_user = $id";
    $result_set = $link->query($query);
    open_page() ;
    open_header();
    ?>
<br><br><br>
<div class="container">
    <h3>Lelangan saya</h3>
    <div class="facts">
		<div class="hero-unit">
            <div class="row">
                <div class = "col-md-offset-10">
                    <a class='btn btn-warning' href='add_lelang.php?'>Add Lelang</a><br><br>
                </div>
            <table class="table table-hover table-condensed">
            <tr>
                <th><center>No</center></th>
                <th><center>Nama lelang</center></th>
                <th><center>Harga Awal</center></th>
                <th><center>waktu berakhir</center></th>
                <th><center>Penawar tertinggi</center></th>
                <th><center>Harga Penawaran</center></th>
                <th><center>Review User</center></th>
                <th colspan="3"><center>Action</center></th>
            </tr>
            <?php
                $no = 1;
                while ($row = $result_set->fetch_assoc()) {
                    $id_lelang=$row['id_lelang'];
                    $rec2 = mysqli_query($link, "SELECT * FROM penawaran WHERE padi_id_padi= $id_lelang GROUP BY harga_penawaran DESC limit 1");
                    $row2 = mysqli_fetch_array($rec2);
                    $nama = $row2['user_id_user'];
                    if($row2){
                        $rec3 = mysqli_query($link, "SELECT * FROM user WHERE id_user = $nama");
                        $row3 = mysqli_fetch_array($rec3);
                        $nama_depan = $row3['nama_depan'];
                    }else{
                        $nama_depan = '';
                    }
                    $query2 =mysqli_query($link, "SELECT * From riwayatlelang where id_lelang = $id_lelang GROUP BY id_riwayatLelang Desc");
                    $rec4 = mysqli_fetch_array($query2);
                    
                    echo '<tr>';
                    echo ('<td><center>'.$no++.'</center></td>');
                    echo ('<td><center>'.$row['nama_lelang'].'</center></td>');
                    echo ('<td><center>'.$row['harga_awal'].'</center></td>');
                    echo ('<td><center>'.$row['waktu_berakhir'].'</center></td>');
                        echo ('<td><center>'.$nama_depan.'</center></td>');
                        echo ('<td><center>'.$row2['harga_penawaran'].'</center></td>');
                        echo ('<td><center>'.$rec4['review'].'</center></td>');
                        if(($rec4['status_pelelang'])==1){
                            echo ("<td><center>Accepted</center></td>");
                        }else if (($rec4['status_pemenang'])==1){
                            echo ("<td><center><a class='btn btn-warning' href='validasi_pembayaran.php?id=" . $row['id_lelang'] . "'>Cek Pembayaran</a></center></td>");
                        }else{
                            echo ("<td><center>Pembayaran belum dilakukan</center></td>");
                        }
                        
                    $now = date('Y-m-d H:i:s');
                    $awal = $row['tanggal_lelang'];
                    $tanggal = strtotime($now);
                    $tanggal2 = strtotime($awal);
                    if ($tanggal2>$tanggal){
                        echo("<td><center><a class='btn btn-warning' href='update_lelang.php?id=" . $row['id_lelang'] . "'>Update</a></center></td>");
                        echo("<td><center><a class='btn btn-danger' href='delete_lelang.php?id=" . $row['id_lelang'] . "'>Delete</a></center></td>");
                    }    
                        echo '</tr>';
                }
            ?>
	    	</table>
            </div>
    	</div>         
    </div>
</div>

