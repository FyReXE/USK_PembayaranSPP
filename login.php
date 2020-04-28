<!DOCTYPE html>
<html>
<head>
	<title>Login SPPKU</title>
	<link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
<h3>Silahkan Login</h3>
<hr/>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="./assets/img/ava1.png" alt="Avatar" class="avatar">
  </div>

 <center><div class="container">
    <label for="uname"><b>Username</b></label>
 <input type="text" name="username" /><br>

    <label for="psw"><b>Password</b></label>
   <input type="password" name="password" /></center>

   <center><button type="submit">Login</button></center>
  </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "silahkan lengkapi form";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['username']=$d['username'];
			
			header('location:./index.php');
		}else{
			echo "username dan password anda salah";
		}
	}
}
?>
</body>
</html>