<?php
/*!
 * Developer (mtc) : Kwabena A. Dougan
 *
 *
 * Copyright Luci Foundation and other contributors
 * Released under the MIT license
 *
 * Date: 2018-06-05T19:26TM
 */
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
$change_pass_btn = "";
$sql = "SELECT * FROM students WHERE studentID='$sid' LIMIT 1";
$_query = mysqli_query($conn_str, $sql);
while ($row = mysqli_fetch_array($_query, MYSQLI_ASSOC)) {
	$s_id = $row["id"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$spassword = $row["spassword"];
	$studentID = $row["studentID"];
	$programme = $row["programme"];
	$timetable = $row["timetable"];
	if($spassword == "123456789"){
		$change_pass_btn .= '<a href="password.php?id='.$sid.'" class="btn btn-danger btn-fill btn-lg ">Change Password  </a>';
	}
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
  <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="0">
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
                    
                    <!--<li class="dropdown">
                        <a style="text-transform: initial;" class="">You are logged in as <?php echo $firstname.' '.$lastname; ?> </a>
                    </li>-->
                    <li><a href="index.php" class="btn btn-danger btn-fill"><span class="fa fa-home"></span> Home</a></li>
                    <li><a href="https://erp.gtuc.edu.gh/sip/" class="btn btn-info btn-fill" target="_blank"><span class="fa fa-file"></span> Check results</a></li>
                    <li><a href="logout.php" class="btn btn-danger btn-fill"><span class="fa fa-power-off"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section section-header">
        <div class="parallax filter filter-color-red">
            <div class="image"
                style="background-image: url('assets/img/login-background.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h2 class="title-modern"><span>Welcome <?php echo $firstname.' '.$lastname; ?></span></h2>
                        <!--<h3>EXAM PLACEMENT CENTER</h2>-->
                        <h3>Click the buttom below to view examination details</h2>
                        <div class="separator line-separator">♦</div>
                    </div>

                    <div class="button-get-started">
                        <a href="placement.php?id=<?php echo $sid;?>" class="btn btn-white btn-fill btn-lg ">Check Placement  </a>
						<?php echo $change_pass_btn;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="title-area">
                    <h2>Examination Timetable</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description">To view your specific timetable schedule as well as examination venue details,</br> Select the button below.</p>
					<a href="#timetable-modal" data-toggle="modal" class="btn btn-primary btn-fill btn-lg ">View Timetable  </a>
                </div>
            </div>
		</div>
	</div>

 <?php include_once("parsers/footer_stuff.php");?>      
	<div class="portfolio-modal modal fade" id="timetable-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" style="width: 925px;">
        <div class="modal-content">
            <div class ="modal-header">
                <button class ="close" data-dismiss ="modal">&times</button>
                <h2><?php echo $timetable?></h2>
            </div>
		<div class="container">
            <div class="row">
              <div class="">
                <div class="">
                    <div class="">
                        <div class="">
							 <?php
								$sql="SELECT * FROM $timetable";
								if (mysqli_connect_errno($conn_str))
								{
									die("Oops couldn't connect to server");
								}
								$res=mysqli_query($conn_str,$sql);
							?>
							<table class= "table table-striped" style="width: 923px;">
								<tr>
									<td>COURSE ID</td>
									<td>COURSE NAME</td>
									<td>DATE</td>
									<td>TIME</td>
									<td>LECTURER</td>
									<td>VENUE</td>
								</tr>
							<?php
								while ($row = mysqli_fetch_array($res))
								{
									$courseid=$row['Course_ID'];
									$coursename=$row['Course_Name'];
									$date=$row['Date'];
									$stime=$row['Time'];
									$lecturer=$row['Lecturer'];
									$venue=$row['Venue'];
								
									echo "<tr><td>
								   $courseid</a></td><td>$coursename</td><td>$date</td><td>$stime</td><td>$lecturer</td><td>$venue</td><tr>";
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
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
				<button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/modernizr.js"></script>
<script type="text/javascript" src="assets/js/gaia.js"></script>
<script src="dropdown.js" type="text/javascript"></script>

</body>
</html>