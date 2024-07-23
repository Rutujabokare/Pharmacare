<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    
</body>
</html>
<?php
include "db.php";
$id = $_GET['id'];

$sql = "DELETE FROM `products` WHERE `id`= '$id' ";
$execute = mysqli_query($conn, $sql);

if ($execute) {
    echo "<script type='text/javascript'>
			Swal.fire({
			position: 'center',
			icon: 'success',
			title: 'Product Deleted Successfully!',
			showConfirmButton: false,
			timer: 1500
			})
	
			</script>";
header("location:productlist.php");
} else {
    echo "Unable to Delete";
}
?>
