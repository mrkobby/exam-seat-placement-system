<?php
session_start();
if (!isset($_SESSION["ademail"])) {
    header("location: admin-login.php"); 
    exit();
}
include_once("parsers/db_connection.php");
?><?php
if(isset($_POST["firstname"])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$studentID = $_POST['studentID'];
	$programme = $_POST['programme'];
	$level = $_POST['level'];
	
	
	$sql = "SELECT id FROM students WHERE studentID='$studentID'";
    $query = mysqli_query($conn_str, $sql); 
	$sid_check = mysqli_num_rows($query);
	
	if($firstname == "" || $lastname == "" || $studentID == ""){
		echo "error_occurred";
        exit();
	} else if ($sid_check > 0) {
	    echo "error_occurred";
	    exit();
    } else {
		$programme_comb = $programme.' '.$level;
		$programme_timetable = $programme.''.$level.'_timetable';
		$sql1="INSERT INTO students(studentID,firstname,lastname,spassword,programme,timetable) VALUES ('$studentID','$firstname','$lastname','123456789','$programme_comb','$programme_timetable')";
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
				<h3 style="color: white;text-align: center;font-weight: 700;">Add Student</h3><br />
                <div class="student-container" style="height: auto;text-align: center;">
                    <div class="form-input" style="margin-left: 0px;margin-right: 0px;">
						<form method="post" onSubmit="return false;">
							<input type="text" name="firstname" id="firstname" placeholder="First Name" style="width: 100%;margin-bottom: 15px;"/>
							<input type="text" name="lastname" id="lastname" placeholder="Last Name" style="width: 100%;margin-bottom: 15px;"/>
							<input type="text" name="studentID" id="studentID" placeholder="Student ID" style="width: 100%;margin-bottom: 15px;"/>
							<br />
							<span>Please select programme and level</span>
							<br />
							<select name="programme" id="programme" style="display: ;margin-top: 12px;width: 100%;height: 40px;">
								<option value="" selected disabled>Programme</option>
								<option value="" disabled>------------------------</option>
								<option value="BIT">BIT </option>
								<option value="DIT">DIT</option>
								<option value="" disabled>-------------------------</option>
								<option value="BTE">BTE </option>
								<option value="DTE">DTE </option>
								<option value="" disabled>------------------------</option>
								<option value="BBA">BBA </option>
								<option value="" disabled>------------------------</option>
							</select>  
							<select name="level" id="level" style="display: ;margin-top: 12px;width: 100%;height: 40px;">
								<option value="" selected disabled>Level</option>
								<option value="L100"> L100</option>
								<option value="L200"> L200</option>
								<option value="L300"> L300</option>
								<option value="L400"> L400</option>
							</select>                                         
												 
							<button style="width: 100%;margin: 20px 0 0 0;" onclick="addStudent()" type="submit" value="submit">Submit</button>
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
function addStudent(){
	var fname = get("firstname").value;
	var lname = get("lastname").value;
	var firstname = fname.toUpperCase();
	var lastname = lname.toUpperCase();
	var studentID = get("studentID").value;
	var programme = get("programme").value;
	var level = get("level").value;
	if(fname == "" || lname == "" || studentID == "" || programme == ""|| level == ""){
		alert("Please fill form");
	}else if(programme == "DIT" && level == "L300"){
		alert("Incorrect programme and level selection");
	}else if(programme == "DIT" && level == "L400"){
		alert("Incorrect programme and level selection");
	}else if(programme == "DTE" && level == "L300"){
		alert("Incorrect programme and level selection");
	}else if(programme == "DTE" && level == "L400"){
		alert("Incorrect programme and level selection");
	} else {
		var ajax = ajaxObj("POST", "addstudent.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("Student ID Number already exists");
				}else{
					alert("Student added successfully");
					window.location = "addstudent.php";
				}
	        }
        }
        ajax.send("firstname="+firstname+"&lastname="+lastname+"&studentID="+studentID+"&programme="+programme+"&level="+level);
	}
}
</script>
</body>
</html>
