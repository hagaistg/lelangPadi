<?php
session_start();
if(!$_SESSION['is_logged_in']){
    header("Location: login.php");
}
include_once("listFungsi.php");
open_page();
open_header();

$link = doConnect();
$id = $_SESSION['id'];
$rec = mysqli_query($link, "SELECT * from user where id_user = $id");
$record2 = mysqli_fetch_array($rec);

?>
<div class="container">
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<h3>Nama depan    :<td><?php echo $record2['nama_depan']?></td></h3><br>
                    <h3>Nama belakang :<?php echo $record2['nama_belakang']?></h3><br>
                    <h3>Alamat :<?php echo $record2['alamat']?></h3><br>
                    <h3>Email :<?php echo $record2['email']?></h3>
				</div>
				<div class="col-md-6 contact-in">
					
					<div class="map">
                    <?php echo ('<img src="FOTO_PADI/'.$record2['foto_padi'].'"/>'); ?>
			</div>
                    <h4>Informasi Lelang <?php echo $namaLelang; ?></h4>
					<div class="more-address"> 
						<div class="address-more">
                            <p>Pelelang : <?php echo $namaPelelang; ?>,</p>
							<p>Berat :<?php echo $beratawal;?>Kg,</p></br>
						</div>
						<div class="address-left">
                        <p>Waktu Berakhir <h5><?php echo $record2['waktu_berakhir']; ?></h5></p>
							<p>Email: <?php echo $email; ?></p>
						</div>
						<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

				
			</div>
		</div>