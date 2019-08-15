<?php
session_start();
if (!isset($_SESSION["ademail"])) {
    header("location: admin-login.php"); 
    exit();
}
include_once("parsers/db_connection.php");
?><?php
if(isset($_POST["coursecode"])){
	$coursecode = $_POST['coursecode'];
	$coursename = $_POST['coursename'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$programme = $_POST['programme'];
	$level = $_POST['level'];
	$lecturer = $_POST['lecturer'];
	
	$sql = "SELECT id FROM timetable WHERE course_id='$coursecode'";
    $query = mysqli_query($conn_str, $sql); 
	$cid_check = mysqli_num_rows($query);
	
	if($coursecode == "" || $coursename == "" || $time == "" || $date == ""){
		echo "error_occurred";
        exit();
	} else if ($cid_check > 0) {
	    echo "error_occurred";
	    exit();
    } else {
		$programme_comb = $programme.' '.$level;
		$sql1="INSERT INTO timetable(course_id,course_name,programme,exam_date,exam_time) VALUES ('$coursecode','$coursename','$programme_comb','$date','$time')";
        if(mysqli_query($conn_str, $sql1)){
			$programme_timetable = $programme.''.$level.'_timetable';
			$sql2=mysqli_query($conn_str, "INSERT INTO $programme_timetable(Course_ID,Course_Name,Date,Time,Lecturer,Venue) VALUES ('$coursecode','$coursename','$date','$time','$lecturer','C1, C4, C5, C9, C10, B4, AUD')");
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
	
    <title>Timetable</title>
   
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
				<h3 style="color: white;text-align: center;font-weight: 700;">Add to exams timetable</h3><br/>
                <div class="student-container" style="height: auto;text-align: center;">
                    <div class="form-input" style="margin-left: 0px;margin-right: 0px;">
						<form method="post" onSubmit="return false;">
							<input type="text" name="coursecode" id="coursecode" placeholder="Course Code" style="width: 100%;margin-bottom: 15px;"/>
							<input type="text" name="coursename" id="coursename" placeholder="Course Name" style="width: 100%;margin-bottom: 15px;"/>
							<br />
							<select name="programme" id="programme" style="display: ;margin-top: 12px;width: 100%;height: 40px;">
								<option value="" selected disabled>Programme</option>
								<option value="BIT">BIT </option>
								<option value="DIT">DIT</option>
								<option value="" disabled>-----------------</option>
								<option value="BTE">BTE </option>
								<option value="DTE">DTE </option>
								<option value="" disabled>-----------------</option>
								<option value="BBA">BBA </option>
							</select>  
							<select name="level" id="level" style="display: ;margin-top: 12px;width: 100%;height: 40px;">
								<option value="" selected disabled>Level</option>
								<option value="L100"> L100</option>
								<option value="L200"> L200</option>
								<option value="L300"> L300</option>
								<option value="L400"> L400</option>
							</select>  
							<input type="date" name="date" id="date" placeholder="Date" style="width: 100%;margin-bottom: 15px;margin-top: 15px;"/>
							<select name="time" id="time" style="display: ;margin-top: 12px;width: 100%;height: 40px;">
								<option value="" selected disabled>Time</option>
								<option value="Morning | 9:00AM"> Morning | 9:00AM</option>
								<option value="Afternoon | 02:00PM"> Afternoon | 02:00PM</option>
							</select> 
							<input type="text" name="lecturer" id="lecturer" placeholder="LECTURER Name" style="width: 100%;margin:15px 0px 15px 0;"/>							
							<button style="width: 100%;margin: 20px 0 0 0;" onclick="addTimetable()" type="submit" value="submit">Submit</button>
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
function addTimetable(){
	var ccode = get("coursecode").value;
	var cname = get("coursename").value;
	var coursecode = ccode.toUpperCase();
	var coursename = cname.toUpperCase();
	var date = get("date").value;
	var time = get("time").value;
	var programme = get("programme").value;
	var lec = get("lecturer").value;
	var lecturer = lec.toUpperCase();
	var level = get("level").value;
	if(ccode == "" || cname == "" || time == "" || date == "" || programme == "" || level == "" || lec == ""){
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
		var ajax = ajaxObj("POST", "timetable.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "error_occurred"){
					alert("This course code has already been entered");
				}else{
					alert("Course was added successfully!");
					window.location = "timetable.php";
				}
	        }
        }
        ajax.send("coursecode="+coursecode+"&coursename="+coursename+"&time="+time+"&date="+date+"&programme="+programme+"&level="+level+"&lecturer="+lecturer);
	}
}
</script>
</body>
</html>
