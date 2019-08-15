<?php 
session_start();
if (isset($_SESSION["ID"])) {
    header("location: home.php"); 
    exit();
}
?><?php
if(isset($_POST["ID"])){
	$ID = $_POST['ID'];
	$studentpassword = $_POST['studentpassword'];
	if($ID == "" || $studentpassword == ""){
		echo "error_occurred";
        exit();
	} else {
		include_once("parsers/db_connection.php");
		 $sql = mysqli_query($conn_str, "SELECT id FROM students WHERE studentID='$ID' AND spassword='$studentpassword' LIMIT 1"); 
		$existCount = mysqli_num_rows($sql);
		if ($existCount == 1) { 
			 while($row = mysqli_fetch_array($sql)){ 
				 $id = $row["id"];
			 }
			 $_SESSION["sid"] = $id;
			 $_SESSION["ID"] = $ID;
			 $_SESSION["pass"] = $studentpassword;
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
    <title>Login</title>
</head>
<body>
<div class="login-screen">
  <div class="left-item">
    <div class="login-panel">
      <div class="inner-login-panel">
        <div class="content-panel">
          <h3 class="title">Sign In</h3>
            
          <form method="post" onSubmit="return false;">
            <input type="text" placeholder="STUDENT ID" name="ID" id="ID" />
            <input type="password" placeholder="PASSWORD" name="studentpassword" id="studentpassword" />
            <button type="submit" value="LOGIN" onclick="studentLogin()">LOGIN</button>
          </form>
            <h6>Click <a href="admin-login.php">here</a> to login as Administrator</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="right-item">
    <div class="slider-panel">
      <div class="inner-slider-panel">
        <a href="index.php"><img class="logo" src="assets/img/GTUC-Logo-with-bar-CPD.png" alt="GTUC"></a>
          <h6 style="font-size: 16px;margin: 10px 0 20px 0;">Sign in to acess your account.</h6>
          <p>First time here? Use the default 
              password of 123456789 to login</p>
      </div>
    </div>
  </div>
</div> 
<script src="parsers/mtc.js"></script>
<script type="text/javascript">
function studentLogin(){
	var ID = get("ID").value;
	var studentpassword = get("studentpassword").value;
	if(ID == "" || studentpassword == ""){
		alert("Please enter your ID and password");
	} else {
		var ajax = ajaxObj("POST", "index.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("Login was unsuccessful");
				}else{
					window.location = "home.php";
				}
	        }
        }
        ajax.send("ID="+ID+"&studentpassword="+encodeURIComponent(studentpassword));
	}
}
/*!
 * Developer (mtc) : Kwabena A. Dougan
 *
 *
 * Copyright Luci Foundation and other contributors
 * Released under the MIT license
 *
 * Date: 2018-06-05T19:26TM
 */
</script>
 
</body>
</html>




