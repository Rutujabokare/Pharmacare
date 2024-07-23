<?php
session_start();
include("db.php");

// Check if user is logged in
$userprofile = $_SESSION['$user_name'];
if (!$userprofile) {
    header('location: login.php');
    exit; // Stop further execution
}

// Pagination variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1
$start = ($page - 1) * $limit; // Calculate starting point for fetching records

// Fetch records from database
$query = "SELECT * FROM `products`";
$search = isset($_GET['search']) ? $_GET['search'] : '';

// If search term is provided, modify the query
if (!empty($search)) {
    $query .= " WHERE `product_name` LIKE '%$search%'";
}

// Add pagination to the query
$query .= " LIMIT $start, $limit";

// Execute query
$qury_run = mysqli_query($conn, $query);

// Count total records
$count_query = "SELECT COUNT(*) as total FROM `products`";
if (!empty($search)) {
    $count_query .= " WHERE `product_name` LIKE '%$search%'";
}
$count_result = mysqli_query($conn, $count_query);
$count_data = mysqli_fetch_assoc($count_result);
$total_records = $count_data['total'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Pharma Care Admin Panel">
    <title>Pharma Care - Product List</title>
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />
    <!-- External CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <!-- Ekka CSS -->
    <link href="assets/css/ekka.css" rel="stylesheet" />
    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .search-form {
            width: 30%; /* Half width of its container */
        }
        .float-end {
        position: absolute;
        top: 70px;
        right: 30px;
	}
   

    </style>
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">
<a href="addproduct.php"><button type="button" class="btn btn-success float-end mt-3 mr-3">+Add Product</button></a>
    <div class="wrapper">
        <?php include "assets/include/sidebar.php"; ?>
        <div class="ec-page-wrapper">
            <?php include "assets/include/header.php"; ?>
            <div class="ec-content-wrapper">
                <div class="content">
                    <h4 class="mb-5">Product List</h4>
                    <!-- Search Form -->
                    <form class="mb-3 search-form" id="searchForm" method="GET" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search by product name" value="<?php echo htmlspecialchars($search); ?>">
                        </div>
                    </form>
                    <!-- Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="responsive-data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Product img</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                <?php
                                                $i = $start + 1;
                                                while ($row = mysqli_fetch_assoc($qury_run)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['pro_qty']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['product_price']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['pro_desc']); ?></td>
                                                        <td >
                                                        <img src="<?php echo $row['product_image'] ?>" width='100' height="100"
                                                            style="border-radius:50%">
                                                    </td>
                                                        <td>
                                                            <a href='updateproduct.php?id=<?php echo $row['id']; ?>'><i class='fa fa-edit text-warning'></i></a>
                                                            <a href='productdel.php?id=<?php echo $row['id']; ?>'><i class='fa fa-trash text-danger'></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            $total_pages = ceil($total_records / $limit); // Calculate total pages
                                            $previous_page = $page > 1 ? $page - 1 : 1;
                                            $next_page = $page < $total_pages ? $page + 1 : $total_pages;

                                            if ($total_pages > 1) {
                                                // Previous page link
                                                echo "<li class='page-item " . ($page == 1 ? 'disabled' : '') . "'><a class='page-link' href='?page=$previous_page" . (!empty($search) ? "&search=$search" : "") . "'>Previous</a></li>";

                                                // Page links
                                                for ($i = 1; $i <= $total_pages; $i++) {
                                                    echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i" . (!empty($search) ? "&search=$search" : "") . "'>$i</a></li>";
                                                }

                                                // Next page link
                                                echo "<li class='page-item " . ($page == $total_pages ? 'disabled' : '') . "'><a class='page-link' href='?page=$next_page" . (!empty($search) ? "&search=$search" : "") . "'>Next</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "assets/include/footer.php"; ?>
        </div>
    </div>
    <!-- JavaScript Includes -->
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/ekka.js"></script>
    <script>
        // JavaScript for handling search input change
        $(document).ready(function() {
            var timer;
            $('#searchInput').on('input', function() {
                clearTimeout(timer); // Clear previous timer
                timer = setTimeout(function() {
                    $('#searchForm').submit(); // Submit form after a brief delay (e.g., 500ms)
                }, 500); // Adjust delay as needed
            });
        });
    </script>
</body>

</html>
