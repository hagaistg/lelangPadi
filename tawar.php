<?php
session_start();
if(!$_SESSION['is_logged_in']){
    header("Location: login.php");
}
include_once("listFungsi.php");
open_page();
open_header();


$link = doConnect();
$id = $_GET['id'];
$rec = mysqli_query($link, "SELECT lelang.*,user.nama_depan,user.email FROM lelang INNER JOIN user WHERE id_lelang = $id AND user_id_user = user.id_user");
$record2 = mysqli_fetch_array($rec);

$rec2 = mysqli_query($link, "SELECT * FROM penawaran WHERE padi_id_padi=$id GROUP BY harga_penawaran DESC limit 1");
$record = mysqli_fetch_array($rec2);
$penawar = 'Tidak ada Penawar';
if($record){
    $penawar_tertinggi = $record['user_id_user'];
    $rec3 = mysqli_query($link, "SELECT * FROM user WHERE id_user = $penawar_tertinggi ");
    $record3 = mysqli_fetch_assoc($rec3);
    $penawar = $record3['nama_depan'];
}
$email = $record2['email'];
$beratawal = $record2['berat'];
$namaPelelang = $record2['nama_depan'];
$foto = $record2['foto_padi'];
$idpenawar = $record2['id_lelang'];
$namaLelang = $record2['nama_lelang'];
$penawaran = $record['harga_penawaran'];
$hargawaal = $record2['harga_awal'];

$berat = $record2['berat'] * 100;

if(mysqli_num_rows($rec2) == 0){
    $harga = $hargawaal + $berat;
}else{
    $harga = $penawaran + $berat;
}

?>
<div class="container">
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<h4>TAWAR</h4>
					<form action="tawar_proses.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php 
                        if($_SESSION['id']==$record2['user_id_user'])
                        {
                            echo '<h3>Anda Tidak dapat menawar lelangan anda sendiri</h3>';
                        }else{
                            if($_SESSION['id']==$record['user_id_user']){
                                echo ('<p>Anda Masih menjadi penawar yang tertinggi !</br>Silahkan Tunggu penawar lain untuk menawar</p>');
                            }else{
                                ?>
                                <p class="your-para">Minimal Penawaran : </p></br>
                                <h3>Rp.<?php echo number_format($harga,2,",",".")?></h3><br>
                                <p class="your-para">Penawaran : </p></br>
                                <div class="input-group col-sm-12">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="number" class="form-control" name="penawaran" id="focusedInput" min="<?php echo $harga ?>" required="" style="font-size: 25px">
                                </div></br></br>
                                    <div class="send">
                                    <button type="submit" class="btn btn-primary" name="action">TAWAR</button>
                                    </div>
                            <?php }
                        }
                            ?>     
					</form>
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

				<!---->
				<div class="grid-top-in">
				<div class="grid-top">
					<div class="col-md-4 top-grid">
						<h5>RETAIL AND WORKSHOP</h5>
						<p class="sed">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
					</div>
					<div class="col-md-4 top-grid">
						<h5>ABOUT MOOROODOOL INC.</h5>
							<div class="house">
								<i class="in-house"> </i>
								<div class="add">
								<p>Somewherearoundhere Street no 69</p>
									<p>Town, City</p>
									<p>Country</p>
									<p>12345</p>
								</div>
							<div class="clearfix"> </div>
							</div>
							<div class="house">
								<i class="in-house in-on"> </i>
								<div class="add">
									<p>+6281312015169</p>
								</div>
							<div class="clearfix"> </div>
							</div>
					</div>
					<div class="col-md-4 top-grid">
						<h5>GET SOCIAL WITH US!</h5>
							<ul class="social-in">
								<li><a href="#"><i> </i></a></li>						
								<li><a href="#"><i class="thumblr"> </i></a></li>
								<li><a href="#"><i class="pin"> </i></a></li>
								
							</ul>
							<ul class="social-in">
								<li><a href="#"><i class="twitter"> </i></a></li>
								<li><a href="#"><i class="dot"> </i></a></li>
							</ul>
							<div class="clearfix"> </div>
				</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>