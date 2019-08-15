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
$plcaement_content = '';
$_sql = "SELECT * FROM placement WHERE studentID='$sid' ORDER BY exam_date DESC";
$query = mysqli_query($conn_str, $_sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$programme = $row["programme"];
	$course_code = $row["course_code"];
	$course_name = $row["course_name"];
	$hall = $row["hall"];
	$seat = $row["seat"];
	$exam_date = $row["exam_date"];
	$exam_date = date("D - d - M - Y", strtotime($exam_date));
	$exam_time = $row["exam_time"];
	
	$plcaement_content .= '
						<tr>  
							<td>'.$course_code.'</td> 
							 <td>'.$course_name.'</td> 
							 <td>'.$hall.'</td> 
							 <td>'.$seat.'</td> 
							 <td>'.$exam_date.'</td> 
							 <td>'.$exam_time.'</td> 
						  </tr> 
	';				
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link href="assets/img/gtuc.jpg" rel="icon">

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
                <div class="title-area" style="max-width: 1028px;">
                    <h2>Examination Hall Placement</h2>
                    <div class="separator separator-danger">✻</div>
					<table class="table" style="text-align: left;"> 
					   <thead> 
						  <tr> 
							 <th>Course Code</th> 
							 <th>Course Title</th> 
							 <th>Hall</th> 
							 <th>Table Number</th> 
							 <th>Date</th> 
							 <th>Time</th> 
						  </tr> 
						  </thead> 
					   <tbody> 
						  <?php echo $plcaement_content;?>
					   </tbody> 
					</table> 
                </div>
            </div>
		</div>
	</div>


<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/modernizr.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="assets/js/gaia.js"></script>
<script src="dropdown.js" type="text/javascript"></script>

</body>
</html>