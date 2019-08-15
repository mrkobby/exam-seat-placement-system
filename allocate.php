<?php
session_start();
if (!isset($_SESSION["ademail"])) {
    header("location: admin-login.php"); 
    exit();
}
include_once("parsers/db_connection.php");
?><?php
if (isset($_POST["room"])){
	$room = $_POST["room"];
	$courseid = $_POST["courseid"];
	$studentCount = $_POST["studentCount"];
	
	$array_1 = array();

	$queryx = mysqli_query($conn_str, "SELECT seats FROM hall WHERE hall_name='$room' LIMIT 1");
	$rowx = mysqli_fetch_row($queryx);
	$seats0 = $rowx[0];
	
	if($studentCount > $seats0){
		echo "allocate_failed";
		exit();
	}
	
	$_query = mysqli_query($conn_str, "SELECT * FROM timetable WHERE course_id='$courseid' LIMIT 1");
	$_rows = mysqli_num_rows($_query);
	if ($_rows > 0) { 
		while ($row = mysqli_fetch_array($_query, MYSQLI_ASSOC)) {
			$course_name0 = $row["course_name"];
			$programme0 = $row["programme"];
			$exam_date0 = $row["exam_date"];
			$exam_time0 = $row["exam_time"];
			
			$_query2 = mysqli_query($conn_str, "SELECT studentID FROM students WHERE programme='$programme0'");
			while ($row2 = mysqli_fetch_array($_query2, MYSQLI_ASSOC)) {
				array_push($array_1, $row2["studentID"]);
			}
			//mysqli_query($db_connection, "DELETE FROM placement WHERE course_code='$courseid'");
			foreach($array_1 as $key => $student){
				$rand_seat= $courseid."-".rand(0,$seats0)."";
				 $sql = "INSERT INTO placement (studentID,programme,course_code,course_name,hall,seat,exam_date,exam_time)
						VALUES('$student','$programme0','$courseid','$course_name0','$room','$rand_seat','$exam_date0','$exam_time0')";
				$query = mysqli_query($conn_str, $sql);	
			}
				$seat_reduction = $seats0 - $studentCount;
				$queryY = mysqli_query($conn_str, "UPDATE hall SET seats='$seat_reduction' WHERE hall_name='$room'");
		}
		echo "allocate_ok";
		exit();
	}else{
		echo "allocate_failed";
		exit();
	}
}
?><?php
$allocation_content = '';$halls = '';
$_sql2 = "SELECT * FROM hall";
$query2 = mysqli_query($conn_str, $_sql2);
while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
	$hall_name = $row2["hall_name"];
	$rows = $row2["rows"];
	$rows = $row2["rows"];
	$cols = $row2["cols"];
	$seats = $row2["seats"];
	
	$halls .= '<option value="'.$hall_name.'">'.$hall_name.' | '.$seats.' seats</option>';
}
$_sql = "SELECT * FROM timetable ORDER BY exam_date ASC";
$query = mysqli_query($conn_str, $_sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$programme = $row["programme"];
	$course_id = $row["course_id"];
	$course_name = $row["course_name"];
	$exam_date = $row["exam_date"];
	$exam_date = date("D - d - M - Y", strtotime($exam_date));
	$exam_time = $row["exam_time"];
	
	$_sql1 = "SELECT id FROM students WHERE programme='$programme'";
	$query1 = mysqli_query($conn_str, $_sql1);
	$sCount = mysqli_num_rows($query1);
	
	$_query3 = mysqli_query($conn_str, "SELECT * FROM placement WHERE course_code='$course_id' AND programme='$programme'");
	$_rows = mysqli_num_rows($_query3);
	if ($_rows > 0) { 
		while ($row = mysqli_fetch_array($_query3, MYSQLI_ASSOC)) {
			$hall0 = $row["hall"];
		}
		$allocation_content .= '
							<tr>  
								<td>'.$programme.'</td> 
								 <td>'.$course_id.'</td> 
								 <td>'.$course_name.'</td> 
								 <td>'.$exam_date.'</td> 
								 <td>'.$sCount.'</td> 
								 <td>'.$hall0.' </td> 
								 <td>Allocated!</td> 
							  </tr>';	
	}else{
		$allocation_content .= '
							<tr>  
								<td>'.$programme.'</td> 
								 <td>'.$course_id.'</td> 
								 <td>'.$course_name.'</td> 
								 <td>'.$exam_date.'</td> 
								 <td>'.$sCount.'</td> 
								 <td>
									<select name="hall'.$course_id.'" id="hall'.$course_id.'" style="width: 120px;height: 30px;">
										<option selected disabled value="">Select Hall:</option>'.$halls.'
									</select> 
								 </td> 
								 <td><a onclick="allocateStudents(\''.$course_id.'\',\''.$sCount.'\',\'hall'.$course_id.'\');" class="btn btn-danger btn-sm">Allocate</a></td> 
							  </tr>';	
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
	
    <title>Allocate Halls</title>
   
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
				<h3 style="color: white;text-align: center;font-weight: 700;">Allocate Halls</h3><br />
                <table class="table" style="text-align: center;color:white;"> 
					   <thead> 
						  <tr> 
							 <th>Programme</th> 
							 <th>Course Code</th> 
							 <th>Course Title</th> 
							 <th>Date</th> 
							 <th>Students</th> 
							 <th>Hall</th> 
							 <th></th> 
						  </tr> 
						  </thead> 
					   <tbody> 
						 <?php echo $allocation_content;?> 
					   </tbody> 
					</table> 
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
function allocateStudents(courseid,studentCount,hall){
	var room = get(hall).value;
	if(room == ""){
		alert("Please select hall");
	}else{
		var ajax = ajaxObj("POST", "allocate.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				if(ajax.responseText == "allocate_failed"){
					alert("An error occured! Allocation was unsuccessful");
				}else{
					alert("Students were allocated to this hall successfully!");
					window.location = "allocate.php";
				}
			}
		}
		ajax.send("room="+room+"&courseid="+courseid+"&studentCount="+studentCount);
	}
}
</script>
</body>
</html>
