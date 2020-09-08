<?php
session_start();
include_once("listFungsi.php");
open_page();
open_header();
    include_once('listFungsi.php');
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_GET['id'];
    $rec2 = mysqli_query($link, "SELECT * FROM penawaran WHERE padi_id_padi=$id GROUP BY harga_penawaran DESC limit 1");
    $record = mysqli_fetch_array($rec2);
    if(!$_SESSION['id']==$record['user_id_user']){
        echo "Maaf anda bukan pemenang lelangan ini ! semoga beruntung dilain kesempatan";
    }
    $harga = $record['harga_penawaran'];?>
    <br><br><br>
<div class="container">
    <div class="facts col-md-12">
		<div class="hero-unit">
            <form action="bayar_proses.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <section class="col-md-12">
                    <div class="table-responsive">
                        <div class="page-header">
                            <h3>Bayar</h3>
                        </div>
                        <table class="table table-bordered ">
                            <tr>
                                <td>Harga yang harus anda bayar</td>
                                <td>:</td>
                                <td><?php echo $harga ?></td>
                            </tr>
                            <tr>
                                <td>Masukkan bukti pembayaran</td>
                                <td>:</td>
                                <td>
                                    <input type="file" name="gambar">    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary" name="action">Saya sudah membayar</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>