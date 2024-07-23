<?php
include("db.php");
$idd = $_GET['id'];

$query = "SELECT * FROM addcategory where id='$idd'";
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
                        Update Category
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" >
                            <div class="form-group">
                                <label for="category-name">Category Name:</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $result['category_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status-active" value="active" <?php if($result['status']=='active'){echo "checked";}?>>
                                    <label class="form-check-label" for="status-active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status-inactive" value="inactive" <?php if($result['status']=='inactive'){echo "checked";}?> >
                                    <label class="form-check-label" for="status-inactive">Inactive</label>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-primary " name="update" value="update">Update</button>
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

    
</body>




</html>
<?php

  if (isset($_POST['update']))
  {

    
  
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];
    
    

    $query="UPDATE addcategory set category_name ='$category_name',status='$status' WHERE id='$idd'";

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
window.location.replace('listcat.php');
});
</script>";

    

 
 } 
 else{
 
   echo "update failed";
 
}
  }

?>