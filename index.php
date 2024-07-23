
<?php
session_start();
include("db.php");

// Check if user is logged in
$userprofile = $_SESSION['$user_name'];
if (!$userprofile) {
    header('location: login.php');
    exit; // Stop further execution
}

// Fetch all product records from the database
$query = "SELECT * FROM `products`";
$qury_run = mysqli_query($conn, $query);
$low_stock_products = [];

while ($row = mysqli_fetch_assoc($qury_run)) {
    if ($row['pro_qty'] < 10) { // Assuming threshold is 10
        $low_stock_products[] = $row['product_name'];
    }
}

// Query to get counts for each service
$sql_product = "SELECT COUNT(*) as product_count FROM products";
$sql_cat = "SELECT COUNT(*) as cat_count FROM addcategory";

$result_product = $conn->query($sql_product);
$result_cat = $conn->query($sql_cat);

// Fetch counts
$row_product = $result_product->fetch_assoc();
$row_cat = $result_cat->fetch_assoc();
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
	<style>
		.modal-content{
			box-shadow: 0 0 10px rgba(0.5, 0.5, 0.5, 0.1);
		}
	</style>

	

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

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
  <h2 class="mb-5"> Admin Panel</h2>

  <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
    <div class="card card-mini dash-card card-1">
      <div class="card-body">
        <h2 class="mb-1">150</h2>
        <p>Total Employees</p>
        <span class="fa fa-users" style="background-color: green; padding: 10px; border-radius: 50%; color: #fff;"></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
    <div class="card card-mini dash-card card-2">
      <div class="card-body">
	  <h3 class="mb-1">
                                                <?php echo $row_product['product_count']; ?>
                                            </h3>
        <p>Total Products</p>
        <span class="fa fa-box" style="background-color: green; padding: 10px; border-radius: 50%; color: #fff;"></span>
      </div>
	 
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
    <div class="card card-mini dash-card card-2">
      <div class="card-body">
	  <h3 class="mb-1">
                                                <?php echo $row_cat['cat_count']; ?>
                                            </h3>
        <p>Total Categories</p>
        <span class="fa fa-list" style="background-color: green; padding: 10px; border-radius: 50%; color: #fff;"></span>

      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
    <div class="card card-mini dash-card card-3">
      <div class="card-body">
        <h2 class="mb-1">1000</h2>
        <p>Total Orders</p>
        <span class="fa fa-shopping-cart" style="background-color: green; padding: 10px; border-radius: 50%; color: #fff;"></span>
      </div>
    </div>
  </div>

</div>
<div class="modal fade" id="lowStockModal" tabindex="-1" aria-labelledby="lowStockModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="lowStockModalLabel">Low Stock Alert</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>The following products have low stock:</p>
                                    <ul id="lowStockList">
                                        <?php foreach ($low_stock_products as $product) : ?>
                                            <li><?php echo htmlspecialchars($product); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
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
	<script>
        $(document).ready(function() {
            // Show the modal if there are low stock products
            var lowStockProducts = <?php echo json_encode($low_stock_products); ?>;
            if (lowStockProducts.length > 0) {
                $('#lowStockModal').modal('show');
            }
        });
    </script>

</body>

</html>