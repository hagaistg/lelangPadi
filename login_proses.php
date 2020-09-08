<?php
    include_once('listFungsi.php');
    session_start();
    $db = doConnect();
if(isset($_POST['login'])){
    $username =$_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($db,"SELECT * FROM user WHERE username='$username'");
    $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql) == 0){
        echo '<script language="javascript">alert("user tidak ditemukan"); document.location="login.php";</script>';
    }
    else{
      if(($username == $row['username']) and ($password == $row['password'])){
            $_SESSION['user']=$username;
            $_SESSION['id']=$row['id_user'];
            $_SESSION['is_logged_in'] = TRUE;   
            header("Location: index.php");
        }
      else{
        echo '<script language="javascript">alert("username atau password salah"); document.location="login.php";</script>';
      }
    }

}
?>
