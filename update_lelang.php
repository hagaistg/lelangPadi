<?php
session_start();
include_once("listFungsi.php");
open_page();
open_header();

if(!$_SESSION['is_logged_in']){
    header("Location: login.php");
}

$link = doConnect();
$id = $_GET['id'];
$query = "SELECT * FROM `padi`";
$result_set = $link->query($query);
$rec = mysqli_query($link, "SELECT * FROM lelang WHERE id_lelang=$id");
$record2 = mysqli_fetch_array($rec);

?>
<br><br><br>
<div class="container">
    <div class="facts col-md-8">
		<div class="hero-unit">
            <div class="contact_content">
            <h3>Update Lelangan</h3><br>
            <div class="single_left_contact ">
                <form action="update_lelang_proses.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_lelang" value="<?php echo $id;?>">                    
                    <div class="form-group">
                        <h4>Nama Lelang : </h4><br>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama" id="focusedInput" style="font-size: 25px" value = "<?php echo $record2['nama_lelang'];?>">             
                        </div>
                         
                    </div>
                    <div class="form-group">
                        <h4>Jenis Padi : </h4><br>
                        <div class="form-group">
                        <label for="sel1">Select list:</label>
                        <select class="form-control" name="sel1">
                        <?php $no = 1;
                        while($row = $result_set->fetch_assoc()){
                            echo "<option value=".$row['id_padi'].">".$no++ ." ". $row['jenis_padi']."</option>";
                            }
                            ?>
                        </select>
                        </div>
                         
                    </div>
                    <div class="form-group">
                        <h4>Berat Padi : </h4><br>
                        <div class="input-group">
                            <input type="number" class="form-control" name="kuantitas" id="focusedInput" min="5" max="1000" required="" style="font-size: 25px"  value = "<?php echo $record2['berat'];?>">
                            <span class="input-group-addon">Kilogram</span>             
                        </div>
                         
                    </div>

                    <div class="form-group">
                        <h4>Harga Awal Lelang :</h4><br>
                        <div class="input-group">
                            <span class="input-group-addon">Rp. </span>
                            <input type="text" class="form-control" name="harga" id="focusedInput" onkeydown="return numbersonly(this, event);"  required=""  value = "<?php echo $record2['harga_awal'];?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>Lama Pelelangan :</h4><br>
                        <div class="input-group col-md-12">
                            <h5>Waktu Mulai :</h5><br>
                        </div>
                            <input type="date" class="form-control" name="tAwal" id="focusedInput" min="5" max="1000" required="" style="font-size: 25px">
                        </div>
                        <br><br>
                        <div class="input-group col-md-12">
                            <h5>Waktu Berakhir :</h5><br>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="tAkhir" id="focusedInput" min="5" max="1000" required="" style="font-size: 25px"> 
                        </div><br>
                    </div>

                    <div class="form-group">
                        <br><h4>Foto Padi :</h4><br>
                        <div class="input-group">
                            <input type="file" name="gambar">
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>Deskripsi Tambahan</h4>
                        <textarea class="form-control" rows="6" name="deskripsi"></textarea>
                    </div>
                <tr>
                    <td colspan="3">
                        <div class="center-content">
                        <center>
                        <input type="submit" value="Daftarkan Lelang" class="btn btn-default">
                        <input type="reset" value="Atur Ulang" class="btn btn-default">
                        </center>
                        </div>         
                    </td>
                </tr>
        </form>
        </div>
        </div>
    	</div>         
    </div>
</div>