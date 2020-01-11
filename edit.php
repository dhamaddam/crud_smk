<?php
//including the database connection file 
include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli,$_POST['id']);

	$name = mysqli_real_escape_string($mysqli,$_POST['name']);
	$age = mysqli_real_escape_string($mysqli,$_POST['age']);
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);

	//checking empty fields
	if(empty($name) || empty($age) || empty($email)) {

		if(empty($name)) {
			echo"<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($age)) {
			echo"<font color='red'>age field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo"<font color='red'email field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$result =mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id==$id");

		//rediretig to the display page.In our case,it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting is from url
$id = $_GET['id'];

//selecting data associated with this particular is
$result = mysqli_query($mysqli,"SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name= $res['name'];
	$age=$res['age'];
	$email=$res['email'];
	$alamat=$res['alamat'];
	$Nis=$res['nis'];
}
?>
<html>
<head>
	<title>edit data</title>
</head>

<body>

   <a href="index.php">home</a>
   <br/><br/>

   <form name="form1" method="post" action="edit.php">
   	<table border="0">
   		<tr>
   			<td>name</td>
   			<td><input type="text" name="name" value="<?php echo $name;?>">
   			</td>
   		</tr>
   		<tr>
   		    <td>Age</td>
   		    <td><input type="text" name="age" value="<?php echo $age;?>">
   		    </td>
   		</tr>
   		<tr>
   		    <td>Email</td>
   		    <td><input type="text" name="email" value="<?php echo $email;?>">
   		    </td>
   		</tr>
   		<tr>
   			<td>alamat</td>
   			<td><input type="text" name="alamat" value="<?php echo $email;?>">
   			</td>
   		</tr>
   		<tr>
   			<td>Nis</td>
   			<td><input type="text" name="nis" value="<?php echo $nis;?>">
   			</td>
   		</tr>
   		<tr>
   		    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
   		    <td><input type="submit" name="update" value="update"></td>
   		</tr>
    </table>
</form>
</body>
</html>       	
