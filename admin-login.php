<?php 
session_start();
if (isset($_SESSION["ademail"])) {
    header("location: admin.php"); 
    exit();
}
?><?php
if(isset($_POST["adminemail"])){
	$email = $_POST['adminemail'];
	$password = $_POST['password'];
	if($email == "" || $password == ""){
		echo "error_occurred";
        exit();
	} else {
		include_once("parsers/db_connection.php");
		 $sql = mysqli_query($conn_str, "SELECT email,password FROM admin WHERE email='$email' AND password='$password'"); 
		$existCount = mysqli_num_rows($sql);
		if ($existCount == 1) { 
			 while($row = mysqli_fetch_array($sql)){ 
				 $ademail = $row["email"];
				 $adpass = $row["password"];
			 }
			 $_SESSION["ademail"] = $ademail;
			 $_SESSION["password"] = $adpass;
			 echo 'done';
			 exit();
		} else {
			echo 'error_occurred';
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="assets/css/login.css" rel="stylesheet"/>
	<link href="assets/img/gtuc.jpg" rel="icon">
    <title>Admin Login</title>
</head>
<body style="background-color: #323232;">
<div class="login-screen">
  <div class="left-item">
    <div class="login-panel">
      <div class="inner-login-panel">
        <div class="content-panel">
          <h3 class="title">Administrator</h3>
            
          <form method="post" onSubmit="return false;">
            <input type="text" placeholder="EMAIL" name="email" id="email" style="text-transform: initial;" />
            <input type="password" placeholder="PASSWORD" name="pass" id="pass" style="text-transform: initial;" />
            <button type="submit" value="LOGIN" onclick="adminLogin()">SIGN IN</button>
          </form>
            <h6>Click <a href="index.php">here</a> to return to first page</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="right-item">
    <div class="slider-panel">
      <div class="inner-slider-panel">
        <a href="index.php"><img class="logo" src="assets/img/GTUC-Logo-with-bar-CPD.png" alt="GTUC"></a>
          <h6 style="font-size: 16px;margin: 10px 0 20px 0;">Sign in to acess your account.</h6>
      </div>
    </div>
  </div>
</div> 
<script src="parsers/mtc.js"></script>
<script type="text/javascript">
function adminLogin(){
	var adminemail = get("email").value;
	var password = get("pass").value;
	if(adminemail == "" || password == ""){
		alert("Please enter your email and password");
	} else {
		var ajax = ajaxObj("POST", "admin-login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("Login was unsuccessful");
				}else{
					window.location = "admin.php";
				}
	        }
        }
        ajax.send("adminemail="+adminemail+"&password="+encodeURIComponent(password));
	}
}
</script>
</body>
</html>




