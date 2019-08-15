<?php
$conn_str = mysqli_connect("localhost","root","","exam_placement");
if (mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
}
?>