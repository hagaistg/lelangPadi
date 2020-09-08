<?php
    session_start();
    include_once('listFungsi.php');
    include_once("listFungsi.php");
    open_page();
    open_header();
    if(!$_SESSION['is_logged_in']){
        header("Location: login.php");
    }
    $link = doConnect();
    $id = $_GET['id'];
?>
<br><br><br>
<div class="container">
    <div class="facts col-md-12">
		<div class="hero-unit">
            <form action="review_proses.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <section class="col-md-12">
                    <div class="table-responsive">
                        <div class="page-header">
                            <h3>Review</h3>
                        </div>
                        <table class="table table-bordered ">
                            <h5>Kami mengharapkan review dari anda tentang lelangan kami</h5><br>
                            <tr>
                                <td>
                                    <textarea class="form-control" rows="6" placeholder="Review Anda" name="review"></textarea>   
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary" name="action">Review</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>