<?php
    session_start();
    include_once('listFungsi.php');
    include_once("listFungsi.php");
    open_page();
    open_header();
    if(!$_SESSION['is_logged_in']){
    header("Location: login.php");
    }
    $id = $_GET['id'];
    $link = doConnect();
    $query = mysqli_query($link,"SELECT * FROM `riwayatlelang` WHERE `id_lelang` = $id GROUP BY id_riwayatLelang DESC");
    $record = mysqli_fetch_array($query);
    $foto = $record['foto_bukti_pembayaran'];
?>
    <br><br><br>
<div class="container">
    <div class="facts col-md-12">
		<div class="hero-unit">
            <form method="post">
                <section class="col-md-12">
                    <div class="table-responsive">
                        <div class="page-header">
                            <h3>Falidasi Pembayaran</h3>
                        </div>
                        <table class="table table-bordered ">
                        <tr>
                            <td>Foto bukti pembayaran</td>
                            <td>:</td>
                            <td>
                            <?php echo('<img src="Bukti_pembayaran/'.$foto.'"/>'); ?>   
                            </td>
                        </tr>
                            <tr>
                            <td></td>
                            <td></td>
                                <td colspan="2">
                                <a class="btn btn-primary" href='validasi_pembayaran_true.php?id=<?php echo $id;?>'>BENAR</a>
                                <a class="btn btn-danger" href='validasi_pembayaran_false.php?id=<?php echo $id;?>'>SALAH</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-info">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>                        
                    </div>
                    <div class="modal-body modal-spa">
                        <div class="login-grids">
                            <h3>Masukkan Pesan </h3>    
                            <div class="single_left_contact">
                                <form action="validasi_false.php" method="post">
                                    <div class="form-group">
                                    <textarea class="form-control" row="5" name="alasan"></textarea>
                                    </div>
                                    <div class="center-content">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="submit" value="Kirim" name="login" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
