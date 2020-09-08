<?php
include_once("listFungsi.php");
open_page('Login');
session_start();
?>
<br><br><br><br><br>
<form class="form-signin" action="login_proses.php" method="post">
    <h4 class="row-md-offset-5 col-md-offset-5">FORM LOGIN</h4><br>
    <div class="input-group col-md-offset-4 col-md-3">
        <span class="input-group-addon" id="basic-addon1">
            <span class="glyphicon glyphicon-user" ></span>
        </span>
        <input type="text" class="form-control" placeholder='Username' name="username" value="">
        </div>
        <br/>
        <div class="input-group col-md-offset-4 col-md-3">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
            <input class="form-control" type="password" placeholder='Password' name="password" value="">
        </div>
        </br>
        <div class="input-group col-md-offset-4 col-md-3">
        <button class="btn btn-lg btn-primary btn-block " type="submit" name="login">LOGIN</button>
        </div><br>
        <div class="input-group col-md-offset-4 col-md-3">
        <h5>Belum punya akun ?<a href='register.php'>Daftar disini</a></h5>
        </div>
    </div>
</form>
<?php
   close_page();
?>