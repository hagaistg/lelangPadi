<?php
    session_start();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
      header("Location: login.php");
    }
    $link = doConnect();
    $id = $_SESSION['id'];
    $query = "SELECT * FROM padi";
    $result_set = $link->query($query);
    open_page() ;
    open_header();
    ?>
<br><br><br>
<div class="container">
    <h3>Jenis - Jenis Padi</h3>
    <div class="facts">
		<div class="hero-unit">
            <div class="row">
            <table class="table table-hover table-condensed">
            <tr>
                <th><center>No</center></th>
                <th><center>Nama Jenis Padi</center></th>
                <th><center>Deskripsi</center></th>
            </tr>
            <?php
                $no = 1;
                while ($row = $result_set->fetch_assoc()) {
                    echo '<tr>';
                    echo ('<td><center>'.$no++.'</center></td>');
                    echo ('<td><center>'.$row['jenis_padi'].'</center></td>');
                    echo ('<td>'.$row['deskripsi'].'</td>');  
                }
            ?>
	    	</table>
            </div>
    	</div>         
    </div>
</div>

