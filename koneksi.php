<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "carelink";

    $connect = mysqli_connect($host, $username, $password, $db);

	if (mysqli_connect_errno()){
		echo "Error Connection!" . mysqli_connect_error();
	}
?>