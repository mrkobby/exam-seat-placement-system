<?php
session_start();
if (!isset($_SESSION["ademail"])) {
    header("location: admin-login.php"); 
    exit();
}
include_once("parsers/db_connection.php");
?><?php
if (isset($_POST["delete"]) && $_POST["studentid"] != "" && $_POST['delete'] == "student"){
	$stud_id = preg_replace('#[^0-9]#', '', $_POST["studentid"]);

	$sql0 = "DELETE FROM students WHERE id='$stud_id' LIMIT 1";
	$query0 = mysqli_query($conn_str, $sql0);
	mysqli_close($conn_str);
	echo "deleted_ok";
	exit();
}
?><?php
if (isset($_POST["remove"]) && $_POST["courseid"] != "" && $_POST['remove'] == "course"){
	$cou_id = $_POST["courseid"];

	$sql0 = "DELETE FROM timetable WHERE course_id='$cou_id' LIMIT 1";
	$query0 = mysqli_query($conn_str, $sql0);
	$sql1 = "DELETE FROM placement WHERE course_code='$cou_id'";
	$query1 = mysqli_query($conn_str, $sql1);
	mysqli_close($conn_str);
	echo "remove_ok";
	exit();
}
?><?php
if (isset($_POST["eliminate"]) && $_POST["hallid"] != "" && $_POST['eliminate'] == "hall"){
	$ha_id = $_POST["hallid"];

	$sql0 = "DELETE FROM hall WHERE hall_name='$ha_id' LIMIT 1";
	$query0 = mysqli_query($conn_str, $sql0);
	$sql1 = "DELETE FROM placement WHERE hall='$ha_id'";
	$query1 = mysqli_query($conn_str, $sql1);
	mysqli_close($conn_str);
	echo "remove_ok";
	exit();
}
?><?php
$sqlX = mysqli_query($conn_str, "SELECT id FROM students");
$xCount = mysqli_num_rows($sqlX);
$sqlY = mysqli_query($conn_str, "SELECT id FROM hall");
$yCount = mysqli_num_rows($sqlY);
$sqlZ = mysqli_query($conn_str, "SELECT id FROM timetable");
$zCount = mysqli_num_rows($sqlZ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="assets/img/gtuc.jpg" rel="icon">

    <title>Exam Placement</title>
   
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
            <section id="services">
				<div class="container">
					<div class="row">
					  <a class="col-lg-12 text-center">
						<h2 class="section-heading text-uppercase"></h2>
						<h1 class="section-subheading text-white" style="font-weight: 600;">ADMINISTRATOR</h1>
						  <br><br>
						</a>
					</div>
					<div class="row text-center">
					  <div class="col-md-4">
						<a href="#student-modal" data-toggle="modal" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-white"></i>
						  <span class="fa-stack-1x text-warning" style="font-size: 40px;"><?php echo $xCount?></span>
						</a>    
						<h4 class="service-heading text-white">Students</h4>
					  </div>
					  <div class="col-md-4">
						<a href="#course-modal" data-toggle="modal" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-white"></i>
						  <span class="fa-stack-1x text-warning" style="font-size: 40px;"><?php echo $zCount?></span>
						</a>
						<h4 class="service-heading text-white">Courses</h4>
					  </div>
					  <div class="col-md-4">
						<a href="#hall-modal" data-toggle="modal" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-white"></i>
						  <span class="fa-stack-1x text-warning" style="font-size: 40px;"><?php echo $yCount?></span>
						</a>
						<h4 class="service-heading text-white">Halls</h4>
						</div>
					</div>
					
					<br /><br />
					
					<div class="row text-center">
					  <div class="col-md-3">
						<a href="addstudent.php" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-warning"></i>
						  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
						</a>    
						<h4 class="service-heading text-white">Add Student</h4>
					  </div>
					  <div class="col-md-3">
						<a href="timetable.php" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-warning"></i>
						  <i class="fa fa-table fa-stack-1x fa-inverse"></i>
						</a>
						<h4 class="service-heading text-white">Add course</h4>
					  </div>
					  <div class="col-md-3">
						<a href="hall.php" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-warning"></i>
						  <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
						</a>
						<h4 class="service-heading text-white">Add Hall</h4>
						</div>
					  <div class="col-md-3">
						<a href="allocate.php" class="fa-stack fa-4x">
						  <i class="fa fa-circle fa-stack-2x text-warning"></i>
						  <i class="fa fa-send fa-stack-1x fa-inverse"></i>
						</a>
						<h4 class="service-heading text-white">Allocate halls</h4>
					  </div>
					</div>
				</div>
			</section>
		</div>
    </div>
 </div>
 <!--------------------------------------------------------------------------------------------------------->
	<div class="portfolio-modal modal fade" id="student-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" style="width: 925px;">
        <div class="modal-content">
            <div class ="modal-header">
                <h2 style="text-align:center">List of Students</h2>
            </div>
		<div class="container">
            <div class="row">
              <div class="">
                <div class="">
                    <div class="">
                        <div class="">
							 <?php
								$sql="SELECT * FROM students";
								if (mysqli_connect_errno($conn_str))
								{
									die("Oops couldn't connect to server");
								}
								$res=mysqli_query($conn_str,$sql);
							?>
							<table class= "table table-striped" style="width: 495px;">
								<tr>
									<td>STUDENT NAME</td>
									<td>STUDENT ID</td>
									<td>PROGRAMME</td>
								</tr>
							<?php
								while ($row = mysqli_fetch_array($res))
								{
									$studid=$row['id'];
									$studentID=$row['studentID'];
									$firstname=$row['firstname'];
									$lastname=$row['lastname'];
									$programme=$row['programme'];
								
									echo '<tr id="s_'.$studid.'"><td>
								   '.$firstname.' '.$lastname.'</td><td>'.$studentID.'</td><td>'.$programme.'</td>
								   <td><button onmousedown="deleteStudent(\''.$studid.'\',\'s_'.$studid.'\');" style="margin: 0;" class="btn btn-sm btn-danger btn-block"><span class="fa fa-trash"></span></button></td><tr>';
								}	
							?>
							 </table>
						</div>              
                     </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="">
                <div class="modal-body" style="padding: 0 0 10px;">
				<button class="btn btn-default btn-sm" data-dismiss="modal" style="margin-top: 0px;" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
 <!--------------------------------------------------------------------------------------------------------->	
	<div class="portfolio-modal modal fade" id="course-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 930px;">
        <div class="modal-content">
            <div class ="modal-header">
                <h2 style="text-align:center">List of Courses</h2>
            </div>
		<div class="container">
            <div class="row">
              <div class="">
                <div class="">
                    <div class="">
                        <div class="">
							 <?php
								$sql="SELECT * FROM timetable";
								if (mysqli_connect_errno($conn_str))
								{
									die("Oops couldn't connect to server");
								}
								$res=mysqli_query($conn_str,$sql);
							?>
							<table class= "table table-striped" style="width: 925px;">
								<tr>
									<td>COURSE ID</td>
									<td>COURSE NAME</td>
									<td>PROGRAMME</td>
									<td>DATE</td>
									<td>TIME</td>
								</tr>
							<?php
								while ($row2 = mysqli_fetch_array($res))
								{
									$c_id=$row2['id'];
									$course_id=$row2['course_id'];
									$course_name=$row2['course_name'];
									$programme=$row2['programme'];
									$exam_date=$row2['exam_date'];
									$exam_time=$row2['exam_time'];
								
									echo '<tr id="c_'.$course_id.'"><td>
								   '.$course_id.'</td><td>'.$course_name.'</td><td>'.$programme.'</td><td>'.$exam_date.'</td><td>'.$exam_time.'</td>
								   <td><button onmousedown="deleteCourse(\''.$course_id.'\',\'c_'.$course_id.'\');" style="margin: 0;" class="btn btn-sm btn-danger btn-block"><span class="fa fa-trash"></span></button></td><tr>';
								}	
							?>
							 </table>
						</div>              
                     </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="">
                <div class="modal-body" style="padding: 0 0 10px;">
				<button class="btn btn-default btn-sm" data-dismiss="modal" style="margin-top: 0px;" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 <!--------------------------------------------------------------------------------------------------------->	
	<div class="portfolio-modal modal fade" id="hall-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" style="max-width: ;">
        <div class="modal-content">
            <div class ="modal-header">
                <h2 style="text-align:center">List of Halls</h2>
            </div>
		<div class="container">
            <div class="row">
              <div class="">
                <div class="">
                    <div class="">
                        <div class="">
							 <?php
								$sql="SELECT * FROM hall";
								if (mysqli_connect_errno($conn_str))
								{
									die("Oops couldn't connect to server");
								}
								$res=mysqli_query($conn_str,$sql);
							?>
							<table class="table table-striped" style="width: 496px;">
								<tr>
									<td>HALL NAME</td>
									<td>ROWS</td>
									<td>COLUMNS</td>
									<td>SEATS AVAILABLE</td>
								</tr>
							<?php
								while ($row3 = mysqli_fetch_array($res))
								{
									$hall_name=$row3['hall_name'];
									$rows=$row3['rows'];
									$cols=$row3['cols'];
									$seats=$row3['seats'];
								
									echo '<tr id="h_'.$hall_name.'"><td>
								   '.$hall_name.'</td><td>'.$rows.'</td><td>'.$cols.'</td><td>'.$seats.'</td>
								   <td><button onmousedown="deleteHall(\''.$hall_name.'\',\'h_'.$hall_name.'\');" style="margin: 0;" class="btn btn-sm btn-danger btn-block"><span class="fa fa-trash"></span> '.$hall_name.'</button></td><tr>';
								}	
							?>
							 </table>
						</div>              
                     </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="">
                <div class="modal-body" style="padding: 0 0 10px;">
				<button class="btn btn-default btn-sm" data-dismiss="modal" style="margin-top: 0px;" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="parsers/mtc.js"></script>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
function deleteStudent(studentid,student){
	var conf = confirm("Press OK to confirm the delete action on this student.");
	if(conf != true){
		return false;
	}else{
	var ajax = ajaxObj("POST", "admin.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "deleted_ok"){
				alert("Student has been remove successfully.");
				get(student).style.display = "none";
			}
		}
	}
	ajax.send("delete=student&studentid="+studentid);
	}
}
function deleteCourse(courseid,course){
	var conf = confirm("Press OK to confirm the removal action on this course.");
	if(conf != true){
		return false;
	}else{
	var ajax = ajaxObj("POST", "admin.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "remove_ok"){
				alert("Course has been remove successfully.");
				get(course).style.display = "none";
			}
		}
	}
	ajax.send("remove=course&courseid="+courseid);
	}
}
function deleteHall(hallid,hall){
	var conf = confirm("Press OK to confirm the removal action on this hall.");
	if(conf != true){
		return false;
	}else{
	var ajax = ajaxObj("POST", "admin.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "remove_ok"){
				alert("Hall has been remove successfully.");
				get(hall).style.display = "none";
			}
		}
	}
	ajax.send("eliminate=hall&hallid="+hallid);
	}
}
</script>
</body>
</html>
