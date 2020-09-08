<?php
session_start();
include_once("listFungsi.php");
open_page() ;
open_header();?>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register_proses.php">
  <link rel="stylesheet" type="text/css" href="css/styleku.css">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Re-Type Password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <label>Nama Depan</label>
      <input type="text" name="nama_depan">
    </div>
    <div class="input-group">
      <label>Nama Belakang</label>
      <input type="text" name="nama_belakang">
    </div>
    <div class="input-group">
      <label>Tanggal Lahir</label>
       <input name="tgl_lahir" type="text">
    </div>
    <div class="input-group">
      <label>Kartu Kredit</label>
      <input type="text" placeholder='xxxx-xxxx-xxxx-xxxx' name="kartukredit">
    </div>
    <div class="input-group">
      <label>Alamat</label>
      <input type="text" name="alamat">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email">
    </div>
    <div class="input-group">
      <label>Jenis Kelamin</label>
      <select name="Jenis_kelamin">
          <option value="Select" selected>Select</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="perempuan">Perempuan</option>
      </select>
    </div>
    <div class="input-group">
      <label>Foto</label>
      <input type="file" name="foto" onchange="fileSelected();"/>
    </div>
    <div class="input-group">
      <label>No Telepon</label>
      <input type="telepon" name="no_telepon">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>