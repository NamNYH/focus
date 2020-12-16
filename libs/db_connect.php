<?php 
$severname="localhost";
$username="root";
$password="";
$database="busbooking";
$con = mysqli_connect($severname,$username,$password,$database);
if(!$con){
	echo("Kết nối không thành công");
}
