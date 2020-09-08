<?php
session_start();

include_once("listFungsi.php");
open_page() ;
open_header();
$link = doConnect();
$id = $_GET['id'];

$rec = mysqli_query($link, "SELECT * FROM lelang WHERE id_lelang=$id");
$record2 = mysqli_fetch_array($rec);
?>
<div class="content">	
		<div class="container">
			<div class=" single">
			<div class="col-md-12 sin">
				  <div class="single_left">	 
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="#">
                                <?php echo ('<img class="etalage_thumb_image" src="FOTO_PADI/'.$record2['foto_padi'].'" class="img-responsive"/>'); ?>
                                <?php echo ('<img class="etalage_source_image" src="FOTO_PADI/'.$record2['foto_padi'].'" class="img-responsive"/>'); ?>
								</a>
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>
				  <div class="desc1 span_3_of_2">
					  <div class="desc">
						<h3><?php echo $record2['nama_lelang']?></h3>
						<p><?php echo $record2['deskripsi']?></p>
						<h5><a>Harga Awal: </a>Rp.<?php echo number_format($record2['harga_awal'],2,",",".")?></h5>
						<?php 
							if($record2['status']==0){
								echo("<a class='get' href='tawar.php?id=".$id. "'>TAWAR</a>&nbsp;");
							}else{
								echo('<br><h4>Lelang sudah ditutup !</h4>');
							}
						?>
						
					</div>
				</div>
						<div class="clearfix"></div>
                    </div>
</br>
					    <!----- tabs-box ---->
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Riwayat Penawaran</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								<div class="facts">
									<div class="hero-unit">
										<table class="table table-hover table-condensed">
											<tr>
												<th><center>No</center></th>
												<th><center>Nama</center></th>
												<th><center>Penawaran</center></th>
											</tr>
											<?php
												$query = "SELECT `harga_penawaran`, user.nama_depan FROM `penawaran` INNER JOIN user ON `user_id_user` = user.id_user WHERE `padi_id_padi` = $id GROUP BY id_penawaran DESC ";
												$data = $link->query($query);
												$no = 1;
												while ($row = $data->fetch_assoc()) {
											?>
											<tr>
												<td><center><?php echo $no ++; ?></center></td>
												<td><center><?php echo $row['nama_depan'] ?></center></td>
												<td><center>Rp. <?php echo number_format($row['harga_penawaran']); ?></center></td>
											</tr>							
											<?php
												}
											?>
										</table>
									</div>         
							    </div>
							</div>
					      </div>
					 </div>
					 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
	</div>
			   	 </div>	
				<div class="clearfix"></div>	
	</div>

				<!---->
				<div class="grid-top-in">
				<div class="grid-top">
					<div class="col-md-4 top-grid">
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