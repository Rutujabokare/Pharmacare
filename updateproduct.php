<?php
include("db.php");
$idd = $_GET['id'];

$query = "SELECT * FROM products where id='$idd'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_array($data);
$total = mysqli_num_rows($data);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

	<title>Pharma Care</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
		rel="stylesheet">

	<link href="../../../../../cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css"
		rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Ekka CSS -->
	<link id="ekka-css" href="assets/css/ekka.css" rel="stylesheet" />

	<!-- FAVICON -->
	<link href="assets/img/favicon.png" rel="shortcut icon" />

    <!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
    <style>
    body {
        background-color: #f0f0f0;
        padding-top: 50px;
    }
</style>
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">z
	<!--  WRAPPER  -->
	<div class="wrapper">


		<?php
		include "assets/include/sidebar.php";
		?>



		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<?php
			include "assets/include/header.php";
			?>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<!-- Top Statistics -->
					<div class="row">
						

                        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="category-name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $result['product_name']; ?>" required>
                            </div>
							<div class="form-group">
                                <label for="category-name">Product Quentity</label>
                                <input type="text" class="form-control" id="pro_qty" name="pro_qty" value="<?php echo $result['pro_qty']; ?>" required>
                            </div>
							<div class="form-group">
							<label class="form-label">Select Categories</label>
														<select id="Categories" class="form-select" name="category_name" value="<?php echo $result['category_name'] ?>">
                                                        <option value="<?php echo $result['category_name'] ?>">
																<?php echo $result['category_name'] ?>
															</option>
															<?php
															$quey = "SELECT * FROM `addcategory` ORDER BY id DESC";
															$qu_run = mysqli_query($conn, $quey);
															while ($row = mysqli_fetch_assoc($qu_run)) {
																?>
																<option value="<?php echo $row['category_name'] ?>">
																	<?php echo $row['category_name'] ?>
																</option>
															<?php } ?>
														</select>
                            </div>
							<div class="form-group">
                                <label for="category-name">Product price</label>
                                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $result['product_price']; ?>" required>
                            </div>
							<div class="form-group">
                                <label for="category-name">Product Desc</label>
								<textarea class="form-control" rows="3"
								name="pro_desc" ><?php echo $result['pro_desc']; ?></textarea>
                            </div>
							<div class="form-group">
							<label class="form-label">Thumb-1</label>
                                            <input name="product_image" class="form-control" type="file">
                                            <input name="oldImg" class="form-control" type="hidden"
                                                value="<?php echo $product['product_image']; ?>">
                                            <img src="<?php echo $product['product_image']; ?>" width=150 height="120">
							</div>
                            
                            <button type="submit" name="save"
															class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

						
						
						
						
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

			<!-- Footer -->
			<?php
			include "assets/include/footer.php";
			?>


		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	<!-- Common Javascript -->
	<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="assets/plugins/slick/slick.min.js"></script>

	<!-- Chart -->
	<script src="assets/plugins/charts/Chart.min.js"></script>
	<script src="assets/js/chart.js"></script>

	<!-- Google map chart -->
	<script src="assets/plugins/charts/google-map-loader.js"></script>
	<script src="assets/plugins/charts/google-map.js"></script>

	<!-- Date Range Picker -->
	<script src="assets/plugins/daterangepicker/moment.min.js"></script>
	<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="assets/js/date-range.js"></script>

	<!-- Option Switcher -->
	<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="assets/js/ekka.js"></script>

    <?php
if (isset($_POST['save'])) {

	$cat_name = $_POST['product_name'];
	$qty = $_POST['pro_qty'];
	$cat = $_POST['category_name'];
	$price = $_POST['product_price'];
	$desc = $_POST['pro_desc'];

	
    // Function to delete old image file
	function deleteOldImage($oldImage) {
		if (!empty($oldImage) && file_exists($oldImage)) {
		  unlink($oldImage);
		}
	  }

	  // Update folder1 Image
  $filename1 = $_FILES["product_image"]["name"];
  $image1 = $_POST['oldImg'];
  if ($filename1 != '') {
    deleteOldImage($image1);
    $tempname1 = $_FILES["product_image"]["tmp_name"];
    $folder1 = "assets/products/" . $filename1;
    move_uploaded_file($tempname1, $folder1);
  } else {
    $folder1 = $image1;
  }
	
    $query="UPDATE products set product_name ='$cat_name',pro_qty='$qty',category_name='$cat',product_price='$price',pro_desc='$desc',product_image='$folder1' WHERE id='$idd'";

    $data = mysqli_query($conn,$query);

  if($data){
    echo 
"<script type='text/javascript'>
Swal.fire({
title:'Update details Successful',
icon:'success',
showConfirmButton: false,
timer:2000
}).then(function() {
window.location.replace('productlist.php');
});
</script>";

    

 
 } 
 else{
 
   echo "update failed";
 
}
  }
?>
</body>




</html>