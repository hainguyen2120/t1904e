<?php
// ket noi den csdl 
$conn = mysqli_connect("localhost", "root","","bai3");

// khai bao ngon ngu trong csdl de khong bi loi phong chu
// mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_set_charset($conn, 'UTF8');
if($conn->connect_error) {
			return false;
		}
?>