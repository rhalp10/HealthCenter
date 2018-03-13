<?php 
require_once('../dbconfig.php');

if (isset($_POST['Submit_drug'])) {
	echo $Name = $_POST['Name'];
	echo $descr = $_POST['descr'];
	echo $unit = $_POST['unit'];
	echo $Quantity = $_POST['Quantity'];

	mysqli_query($conn,"INSERT INTO `inventory_drugs` 
		(`drug_ID`, `drug_Name`, `unit_ID`, `drug_Qnty`, `drug_Description`) 
		VALUES 
		(NULL, '$Name' , '$unit', '$Quantity', '$descr')");

// $stmt = $db->prepare("INSERT INTO `inventory_drugs` 
// 		(`drug_ID`, `drug_Name`, `unit_ID`, `drug_Qnty`, `drug_Description`) 
// 		VALUES 
// 		(NULL, ':Name' , ':unit', ':Quantity', ':descr')");
//   $stmt->execute(array(':Name' => $Name, ':descr' => $descr, ':unit' => $unit, ':Quantity' => $Quantity));


	echo "<script>alert('Successfully Added!');
			window.location='admin_inventory';
			</script>";
}


if (isset($_POST['edit_drug'])) {
	$id = $_REQUEST['id'];
	echo $Name = $_POST['Name'];
	echo $descr = $_POST['descr'];
	echo $unit = $_POST['unit'];
	echo $Quantity = $_POST['Quantity'];

	mysqli_query($conn,"UPDATE `inventory_drugs` SET `drug_Name` = '$Name',`unit_ID`  = '$unit', `drug_Qnty`  = '$Quantity',`drug_Description` = '$descr' WHERE `inventory_drugs`.`drug_ID` = $id ");

// $stmt = $db->prepare("INSERT INTO `inventory_drugs` 
// 		(`drug_ID`, `drug_Name`, `unit_ID`, `drug_Qnty`, `drug_Description`) 
// 		VALUES 
// 		(NULL, ':Name' , ':unit', ':Quantity', ':descr')");
//   $stmt->execute(array(':Name' => $Name, ':descr' => $descr, ':unit' => $unit, ':Quantity' => $Quantity));


	echo "<script>alert('Successfully Added!');
			window.location='admin_inventory';
			</script>";
}

if (isset($_POST['Delete_drug'])) {
	 $drugID = $_POST['drugID'];
	 
	 mysqli_query($conn,"DELETE FROM `inventory_drugs` WHERE `inventory_drugs`.`drug_ID` = $drugID");
	 echo "<script>alert('Successfully Deleted!');
			window.location='admin_inventory';
			</script>";

}

if (isset($_POST['submit_patient'])) {
	
	$imagename = mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
	$imagedata = mysqli_real_escape_string($conn,file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType = mysqli_real_escape_string($conn,$_FILES["image"]["type"]);



$fName = $_POST['fName'];
$mName = $_POST['mName'];
$lName = $_POST['lName'];
$bday= $_POST['bday'];
$gender = $_POST['gender'];
$citizenship = $_POST['citizenship'];
$marital_status = $_POST['marital_status'];
$contact = $_POST['contact'];
$address = $_POST['address'];

	if (substr($imageType, 0,5) == "image") {

		mysqli_query($conn,"INSERT INTO `patient_detail` (`p_ID`, `p_Img`, `p_fName`, `p_mName`, `p_lName`, `p_Bday`, `marital_ID`, `citizenship_ID`, `gender_ID`, `p_Date_Record`, `p_Contact`,`p_address`) VALUES (NULL, '$imagedata', '$fName', '$mName', '$lName', '$bday', '$marital_status', '$citizenship', '$gender', CURRENT_TIMESTAMP, '$contact','$address')");
	}
}
	
	if (isset($_POST['submit_dailylog'])) {

		$Name = $_POST['Name'];
		$stage = $_POST['stage'];
		
		mysqli_query($conn,"INSERT INTO `daily_log` (`log_ID`, `log_Name`, `stage_ID`, `log_Date`) VALUES (NULL, '$Name' , '$stage', CURRENT_TIMESTAMP)");
	echo "<script>alert('Log Added!');
			window.location='admin_dailylog';
			</script>";


	}
if (isset($_POST['edit_dailylog'])) {
		$id = $_REQUEST['id'];
		$Name = $_POST['Name'];
		$stage = $_POST['stage'];
		mysqli_query($conn,"UPDATE `daily_log` SET `stage_ID` = '$stage',`log_Name`='$Name' WHERE `daily_log`.`log_ID` = $id ");
		echo "<script>alert('Successfully Update!');
			window.location='admin_dailylog';
			</script>";
	}
if (isset($_POST['Delete_log'])) {
		$id = $_REQUEST['id'];

	mysqli_query($conn,"DELETE FROM `daily_log` WHERE `daily_log`.`log_ID` = $id");
	echo "<script>alert('Successfully Deleted!');
			window.location='admin_dailylog';
			</script>";
	}

if (isset($_POST['submit_acc'])) {

	$imagename = mysqli_real_escape_string($conn,$_FILES["imagex"]["name"]);
	$imagedata = mysqli_real_escape_string($conn,file_get_contents($_FILES["imagex"]["tmp_name"]));
	$imageType = mysqli_real_escape_string($conn,$_FILES["imagex"]["type"]);

	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$bday = $_POST['bday'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$Email = $_POST['Email'];
	$username = $_POST['username'];
	$Password = $_POST['Password'];
	$rePassword = $_POST['rePassword'];
	$userlevel = $_POST['userlevel'];
	//if password submit is equal the verify query perform
	if ($Password == $rePassword)
	{
		$sql = mysqli_query($conn,"SELECT * FROM `user_account` WHERE username ='$username'");
		$row = mysqli_num_rows($sql);
		if ($row == 1) 
		{
			echo "<script>alert('Username is already Taken!');
												window.location='admin_account.php';
											</script>";
		}
		else
		{
			if (substr($imageType, 0,5) == "image") 
			{
				 $sql = mysqli_query($conn,"INSERT INTO `user_account` (`user_ID`, `username`, `password`, `user_created`, `level_ID`) VALUES (NULL, '$username', '$Password', CURRENT_TIMESTAMP, '$userlevel')");
				 $last_id = mysqli_insert_id($conn);
				 mysqli_query($conn,"INSERT INTO `user_detail` (`detail_ID`, `user_ID`, `detail_img`, `detail_Fname`, `detail_Mname`, `detail_Lname`, `gender_ID`, `detail_email`, `detail_address`, `detail_dob`) VALUES (NULL, '$last_id', '$imagedata', '$fName', '$mName', '$lName', '$gender', '$Email', '$address', '$bday')");
				 mysqli_close($conn);
				 echo "<script>alert('Successfully Add New Account!');
												window.location='admin_account.php';
											</script>";

			}
         
		}
	}
	else{
     
		echo "<script>alert('Password not match!');
												window.location='admin_account.php';
											</script>";
	}

}



if (isset($_POST['Delete_Acc'])) {
	$accID = $_POST['accID'];
	mysqli_query($conn,"DELETE FROM `user_detail` WHERE `user_detail`.`user_ID` = $accID");
	mysqli_query($conn,"DELETE FROM `user_account` WHERE `user_account`.`user_ID` = $accID");
	echo "<script>alert('Successfully Deleted!');
			window.location='admin_account';
			</script>";
}

?>