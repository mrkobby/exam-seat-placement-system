<?php
session_start();
if (!isset($_SESSION["ademail"])) {
    header("location: admin-login.php"); 
    exit();
}
include_once("parsers/db_connection.php");
?><?php
if(isset($_POST["hallname"])){
	$hallname = $_POST['hallname'];
	$rows = $_POST['rows'];
	$cols = $_POST['cols'];
	
	$sql = "SELECT id FROM hall WHERE hall_name='$hallname'";
    $query = mysqli_query($conn_str, $sql); 
	$hid_check = mysqli_num_rows($query);
	
	if($hallname == "" || $rows == "" || $cols == ""){
		echo "error_occurred";
        exit();
	} else if ($hid_check > 0) {
	    echo "error_occurred";
	    exit();
    } else {
		$seats = $cols * $rows;
		$sql1="INSERT INTO hall(hall_name,rows,cols,seats) VALUES ('$hallname','$rows','$cols','$seats')";
        if(mysqli_query($conn_str, $sql1)){
			echo 'done';
		}else{
			echo "error_occurred";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="assets/img/gtuc.jpg" rel="icon">
	
    <title>Add Student</title>
   
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
 <div id="wrapper">
	 <?php include_once("parsers/sidebar.php");?>   
        
		<div id="page-content-wrapper">
			
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
				<h3 style="color: white;text-align: center;font-weight: 700;">Add Exams Hall</h3><br />
                <div class="student-container" style="height: auto;text-align: center;">
                    <div class="form-input" style="margin-left: 0px;margin-right: 0px;">
						<form method="post" onSubmit="return false;">
							<input type="text" name="hallname"  list="halls" id="hallname" placeholder="Hall name" style="width: 100%;margin-bottom: 15px;"/>
							<datalist id="halls">
								<option value="AUD">
								<option value="B1">
								<option value="B2">
								<option value="B3">
								<option value="C1">
								<option value="C4">
								<option value="C5">
								<option value="C10">
								<option value="C12">
								<option value="G6">
							</datalist>
							<input type="text" name="rows" id="rows" placeholder="Rows" style="width: 100%;margin-bottom: 15px;"/>
							<input type="text" name="cols" id="cols" placeholder="Columns" style="width: 100%;margin-bottom: 15px;"/>                              
												 
							<button style="width: 100%;margin: 20px 0 0 0;" onclick="addHall()" type="submit" value="submit">Submit</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
 });
</script>
<script src="parsers/mtc.js"></script>
<script>
$('#rows').keyup(function () {
    if (!this.value.match(/[0-9]/)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#cols').keyup(function () {
    if (!this.value.match(/[0-9]/)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
function addHall(){
	var hname = get("hallname").value;
	var hallname = hname.toUpperCase();
	var rows = get("rows").value;
	var cols = get("cols").value;
	if(hname == "" || rows == "" || cols == ""){
		alert("Please fill form");
	} else {
		var ajax = ajaxObj("POST", "hall.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("Hall is already in database");
				}else{
					alert("Submission was successfully");
					window.location = "hall.php";
				}
	        }
        }
        ajax.send("hallname="+hallname+"&rows="+rows+"&cols="+cols);
	}
}
</script>
</body>
</html>
