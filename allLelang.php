<?php
session_start();
include_once("listFungsi.php");
open_page() ;
open_header();
$link = doConnect();
$query = 'SELECT * FROM `lelang` GROUP BY `id_lelang` DESC';
$result_set = $link->query($query);

?>
<div class="content">	
		<div class="container">
			<!--NeW-->
            <div class="content-top">
				<h5 class="welcome">ALL LELANG </h5>
				<div class="clearfix"> </div>
            </div>
				<div class="content-bottom">
				<?php while ($row = $result_set->fetch_assoc()) {
                    date_default_timezone_set('Asia/Jakarta');
                    $id_lelang = $row['id_lelang'];
                    $lama = $row['waktu_berakhir'];
                    $mulai = $row['tanggal_lelang'];
                    $now = date('Y-m-d H:i:s');
                    $rec2 = mysqli_query($link, "SELECT * FROM penawaran WHERE padi_id_padi=$id_lelang GROUP BY harga_penawaran DESC limit 1");
                    $record = mysqli_fetch_array($rec2);    
                    $tanggal2 = strtotime($lama);
                    $tanggal = strtotime($now);
                    $tanggal3 = strtotime($mulai);
                echo('
					<div class="col-md-4 bottom-content">
                        <a  href="detail_padi.php?id=" . $row["id_lelang"] . ""><img src="FOTO_PADI/'.$row['foto_padi'].'" height="350" width="365" ></a>
                            <p class="tun">'.$row['nama_lelang'].'</p>
                            <p class="best">Penawaran Tertinggi <span>Rp.'.number_format($record['harga_penawaran'],2,",","."). '</span></p>
							<p class="number">Harga Awal<span>Rp.'.number_format($row['harga_awal'],2,",","."). '</span></p>
							<div class="pro-grid">
								<b>'.$row['nama_lelang'].'</b>
                                    <div class="pro-btns">');
                                    if ($tanggal3>$tanggal){
                                        echo ("<b>Lelang Belum Dimulai</b>");
                                    }
                                    if(($tanggal == $tanggal2) or ($tanggal > $tanggal2)){
										echo "<b>Lelang sudah ditutup</b></br>";
										if($record){
											$penawar_tertinggi = $record['user_id_user'];
											$update = 'UPDATE `lelang` SET `pemenang`= '.$penawar_tertinggi.', status = 1 WHERE `id_lelang` = '.$id_lelang.'';
                                        if ($link->query($update) === TRUE) {
                                        } else {
                                            echo "Error updating record: " . $link->error;
                                        }
										}
                                        
									}
									if(isset($_SESSION['is_logged_in'])){
										if(($tanggal < $tanggal2) and ($tanggal > $tanggal3)){
											echo ("<a class='btn btn-warning' href='tawar.php?id=" . $id_lelang . "'>TAWAR</a>&nbsp;");
										}
									}
                                    echo('
                                    <a class="btn btn-success" href="detail_lelang.php?id=' . $row["id_lelang"] . '">DETAIL</a>
									</div>
							</div>			
                    </div>');    
                    }?>
					<div class="clearfix"> </div>
				</div>
				<!---->
				<div class="grid-top-in">
				<div class="grid-top">
					<div class="col-md-4 top-grid ">
						<h5>ABOUT MOOROODOOL INC.</h5>
						<p class="sed">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
					</div>
					<div class="col-md-4 top-grid">
						<h5>RETAIL AND WORKSHOP</h5>
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
	</div>
	<!---->
<?php
footer();
close_page();