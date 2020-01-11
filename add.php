<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $nis = mysqli_real_escape_string($mysqli, $_POST['nis']);
	// checking empty fields
	if(empty($name)   || empty($age)  || empty($email) || empty($alamat) || empty($nis)) {

		 if(empty($name)) {
		 	echo "<font color= 'red'>name field is empty.</font><br/>";
		 }

		 if(empty($age)) {
		 	echo "<font color= 'red'>age field is empty.</font><br/>";
		 }

		 if(empty($email)) {
		 	echo "<font color= 'red'>Email field is empty.</font><br/>";
		 }

         if(empty($alamat)) {
		 	echo "<font color= 'red'>alamat field is empty.</font><br/>";
		 }

         if(empty($nis)) {
		 	echo "<font color= 'red'>nis field is empty.</font><br/>";
		 }

		 //link to the previous page
		 echo "br/><a href='javascript:self.history.Back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		// insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email,alamat,nis) VALUES('$name','$age','$email','alamat','nis')");

		//display success massage
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='home.php'>view Result</a>";
	}
}
?>
</body>
</html>
