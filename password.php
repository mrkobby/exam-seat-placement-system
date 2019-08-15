<?php
session_start();
if (!isset($_SESSION["ID"])) {
    header("location: index.php"); 
    exit();
}
include_once("parsers/db_connection.php");
$sid = preg_replace('#[^0-9]#i', '', $_SESSION["ID"]);
$session_pass = $_SESSION["pass"];
$sql = mysqli_query($conn_str, "SELECT * FROM students WHERE studentID='$sid' AND spassword='$session_pass' LIMIT 1");
$existCount = mysqli_num_rows($sql);
if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
	 header("location: index.php"); 
     exit();
}
?><?php
if(isset($_POST["pass1"])){
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	
	include_once("parsers/db_connection.php");

	if($pass1 == "" || $pass2 == ""){
		echo "error_occurred";
        exit();
	} else if ($pass1 != $pass2) {
	    echo "error_occurred";
	    exit();
    } else {
		$sql1="UPDATE students SET spassword='$pass1' WHERE studentID='$sid' LIMIT 1";
        if(mysqli_query($conn_str, $sql1)){
			echo 'done';
		}else{
			echo "error_occurred";
		}
	}
}
?><?php
$sql = "SELECT * FROM students WHERE studentID='$sid' LIMIT 1";
$_query = mysqli_query($conn_str, $sql);
while ($row = mysqli_fetch_array($_query, MYSQLI_ASSOC)) {
	$s_id = $row["id"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$studentID = $row["studentID"];
	$programme = $row["programme"];
}
?><?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<link href="assets/img/gtuc.jpg" rel="icon">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/GTUC_logo.jpg">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>GTUC exam placement</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/gaia.css" rel="stylesheet"/>
    
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
</head>
<body>
     <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" style="background-color: #424040;padding-top: 0px;">
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="index.php" class="navbar-brand" style="font-weight: 800;">GTUC</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    
                    <li class="dropdown">
                        <a style="text-transform: initial;font-size: 16px;" class=""><?php echo $firstname.' '.$lastname; ?> </a>
                    </li>
                    <li><a href="index.php" class="btn btn-danger btn-fill"><span class="fa fa-home"></span> Home</a></li>
                    <li><a href="https://erp.gtuc.edu.gh/sip/" class="btn btn-info btn-fill" target="_blank"><span class="fa fa-file"></span> Check results</a></li>
                    <li><a href="logout.php" class="btn btn-danger btn-fill"><span class="fa fa-power-off"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<br /><br /><br /><br />

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="title-area" style="max-width: 400px;">
                    <h2>Change Password</h2>
                    <div class="separator separator-danger">✻</div>
					 <h4>This system will automatically sign you out after changing your password.</h4>
					<form method="post" onSubmit="return false;"> 
					   <div class="form-group" style="text-align: left;"> 
						  <label for="name">New password</label> 
						  <input type="password" class="form-control" id="pass1"  placeholder="New password"> 
					   </div> 
					   <div class="form-group" style="text-align: left;"> 
						  <label for="name">Confirm password</label> 
						  <input type="password" class="form-control" id="pass2"  placeholder="Confirm password"> 
					   </div> 
					   <button type="submit" class="btn btn-primary" onclick="updatePass()">Submit</button> 
					</form>
                </div>
            </div>
		</div>
	</div>

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/modernizr.js"></script>
<script type="text/javascript" src="assets/js/gaia.js"></script>
<script src="dropdown.js" type="text/javascript"></script>
<script src="parsers/mtc.js"></script>
<script>
function updatePass(){
	var pass1 = get("pass1").value;
	var pass2 = get("pass2").value;
	if(pass1 == "" || pass2 == ""){
		alert("Please fill form");
	}else if(pass1 != pass2){
		alert("Passwords do not match");
	} else {
		var ajax = ajaxObj("POST", "password.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("Password update failed!");
					window.location = "password.php";
				}else{
					alert("Student added successfully");
					window.location = "logout.php";
				}
	        }
        }
        ajax.send("pass1="+pass1+"&pass2="+pass2);
	}
}
</script>
</body>
</html>