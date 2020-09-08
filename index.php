<?php
session_start();
include_once("listFungsi.php");
open_page() ;
open_header();
carousel();
$link = doConnect();
$query = 'SELECT * FROM `lelang` GROUP BY `id_lelang` DESC LIMIT 3';
$result_set = $link->query($query);

$query2 = mysqli_query($link, "SELECT * FROM `lelang` WHERE status = 0  GROUP by `waktu_berakhir` ASC LIMIT 1 ");
$record2 = mysqli_fetch_array($query2);

$waktu = $record2['waktu_berakhir'];
$sekarang = date('Y-m-d H:i:s');

?>
<div class="content">	
		
		<div class="container">
		<?php if(strtotime($waktu)>strtotime($sekarang)){?>
			<div class="content-top">
				<h5 class="welcome">Segera Berakhir !!!</h5>
				<div class="clearfix"> </div>
			</div>	
            <!---->
            <!--Segera Berakhir-->
			
				<div class="content-middle">
				<div class="middle-content">
					<div class="middle">
						<h3><?php echo $record2['nama_lelang']?></h3>
						<p class="from"><p id="demo"></p></p>
					</div>
					<a class="btn btn-success" href="detail_lelang.php?id='<?php echo $record2['id_lelang']?>'">DETAIL</a>
				</div>
					<div class="clearfix"> </div>
            </div>

			<?php }?>
			            <!--end of segera berakhir-->
                <!--NeW-->
            <div class="content-top">
				<h5 class="welcome">NEW !!!</h5>
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
										
										if(($tanggal < $tanggal2) and ($tanggal > $tanggal3) ){
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
					<div class="col-md-12 top-grid ">
						<h5><center>Tentang Lelang padi</center></h5>
						<p class="sed"><center>Lelang Padi adalah website lelang dengan padi sebagai objek lelang. Anda dapat melelang dan menawar padi secara mudah dengan website Lelang Padi. Selamat bertransaksi di Lelang padi</center></p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<script>
            var countDownDate = new Date("<?php echo $waktu?>").getTime();
            var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("demo").innerHTML = days + " hari " + hours + " jam "
            + minutes + " menit " + seconds + " detik ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "LELANG SUDAH BERAKHIR";
                }
            }, 1000);
        </script>
	<!---->
<?php
footer();
close_page();