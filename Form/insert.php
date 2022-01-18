<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Form Data</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins&family=Roboto:wght@100&family=Yeseva+One&display=swap" rel="stylesheet">
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Poppins', sans-serif;
			background: #11101D;
		}

		.submited-data {
			width: 500px;
			background: white;
			padding: 40px;
			border-radius: 5px;
		}

		h1 {
			color: green;
		}
	</style>
</head>

<body>



	<?php

	//database details
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "school-college management system";

	//database connection query
	$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failded");

	$student_name = $_POST['sname'];
	$student_class = $_POST['sclass'];
	$father_name = $_POST['fname'];
	$father_nid = $_POST['fnid'];
	$father_contact = $_POST['fcontact'];
	$mother_name = $_POST['mname'];
	$mother_nid = $_POST['mnid'];
	$mother_contact = $_POST['mcontact'];
	$gurdian_name = $_POST['sgname'];
	$gurdian_nid = $_POST['sgnid'];
	$gurdian_contact = $_POST['sgcontact'];
	$birth_date = $_POST['dob'];
	$birth_cirtificate_no = $_POST['brn'];
	$blood_group = $_POST['bloodgrp'];
	$emergency_contact = $_POST['econtact'];
	$present_address = $_POST['address'];
	?>

	<div class="submited-data">

		<?php
		echo "<b>Student Name: </b>" . $student_name . "<br>";
		echo "<b>Student Class: </b>" . $student_class . "<br>";
		echo "<b>Father's Name: </b>" . $father_name . "<br>";
		echo "<b>Father's NID: </b>" . $father_nid . "<br>";
		echo "<b>Father's Contact: </b>" . $father_contact . "<br>";
		echo "<b>Mother's Name: </b>" . $mother_name . "<br>";
		echo "<b>Mother's NID: </b>" . $mother_nid . "<br>";
		echo "<b>Mother's Contact: </b>" . $mother_contact . "<br>";
		echo "<b>Special Gurdian's Name: </b>" . $gurdian_name . "<br>";
		echo "<b>Special Gurdian's NID: </b>" . $gurdian_nid . "<br>";
		echo "<b>Special Gurdian's Contact: </b>" . $gurdian_contact . "<br>";
		echo "<b>Date of Birth: </b>" . $birth_date . "<br>";
		echo "<b>Birth Cirtificate No: </b>" . $birth_cirtificate_no . "<br>";
		echo "<b>Blood Group: </b>" . $blood_group . "<br>";
		echo "<b>Emergency Contact: </b>" . $emergency_contact . "<br>";
		echo "<b>Present Address: </b>" . $present_address . "<br>";
		?>

	</div>

	<?php
	$sql = "INSERT INTO student_info (student_name, student_class, father_name, father_nid, father_contact, mother_name, mother_nid, mother_contact, gurdian_name, gurdian_nid, gurdian_contact, date_of_birth, birth_cirtificate_no, blood_group, address, emergency_contact,status) VALUES ('$student_name', '$student_class', '$father_name', '$father_nid', '$father_contact','$mother_name', '$mother_nid', '$mother_contact', '$gurdian_name', '$gurdian_nid', '$gurdian_contact', '$birth_date', '$birth_cirtificate_no', '$blood_group', '$present_address', '$emergency_contact','')";


	mysqli_query($conn, $sql);

	echo "<h1>" . "Registration Successful!!!" . "</h1>";

	?>

</body>

</html>