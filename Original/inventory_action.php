<?php 
include('dbconfig.php');
if (isset($_POST['Submit_drug'])) {
	echo $Name = $_POST['Name'];
	echo $descr = $_POST['descr'];
	echo $unit = $_POST['unit'];
	echo $Quantity = $_POST['Quantity'];

	mysqli_query($connection,"INSERT INTO `inventory_drugs` 
		(`drug_ID`, `drug_Name`, `unit_ID`, `drug_Qnty`, `drug_Description`) 
		VALUES 
		(NULL, '$Name' , '$unit', '$Quantity', '$descr');");


	echo "<script>alert('Successfully Added!');
			window.location='admin_inventory';
			</script>";
}


if (isset($_POST['Delete_drug'])) {
	 $drugID = $_POST['drugID'];
	 mysqli_query($connection,"DELETE FROM `inventory_drugs` WHERE `inventory_drugs`.`drug_ID` = $drugID");
	 echo "<script>alert('Successfully Deleted!');
			window.location='admin_inventory';
			</script>";

}

?>