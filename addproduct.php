<?php
session_start();

include("db.php");
$userprofile = $_SESSION['$user_name'];
if ($userprofile == true) {

} else {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

    <title>Pharma Care - Add Product</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css"
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
            background-color: #fff;
            padding-top: 30px;
        }
        .card{
		box-shadow: 0 0 10px rgba(0.5, 0.5, 0.5, 0.1);
	}

        .float-end {
            position: absolute;
            top: 70px;
            right: 30px;
        }
    </style>
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">
    <a href="productlist.php"><button type="button" class="btn btn-success float-end mt-3 mr-3"> List</button></a>
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
                                        <div class="card-header bg-white">
                                            Add Product
                                        </div>
                                        <div class="card-body">
                                            <form method="post" class="row  m-1 p-2"
                                                enctype="multipart/form-data">
                                                <div class="col-md-6 p-3 ">
                                                    <label for="product_name">Product Name</label>
                                                    <input type="text" class="form-control" id="product_name"
                                                        name="product_name" required>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <label for="pro_qty">Product Quantity</label>
                                                    <input type="text" class="form-control" id="pro_qty"
                                                        name="pro_qty" required>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <label class="form-label">Select Category</label>
                                                    <select id="category_name" class="form-select"
                                                        name="category_name">
                                                        <option value="Choose">Choose Category</option>
                                                        <?php
                                                        $query = "SELECT * FROM addcategory ORDER BY id DESC";
                                                        $query_run = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                                        ?>
                                                        <option value="<?php echo $row['category_name'] ?>">
                                                            <?php echo $row['category_name'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <label for="product_price">Product Price</label>
                                                    <input type="text" class="form-control" id="product_price"
                                                        name="product_price" required>
                                                </div>
                                                <div class="col-md-12 p-3">
                                                    <label for="pro_desc">Product Description</label>
                                                    <textarea class="form-control" rows="3" id="pro_desc"
                                                        name="pro_desc"></textarea>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <label class="form-label">Product Image</label>
                                                    <input type="file" class="form-control" name="product_image"
                                                        required>
                                                </div>
                                                <div class="col-md-12 p-3">
                                                    <button type="submit" class="btn btn-success" name="save">Save</button>
                                                </div>
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

    <!-- Ekka Custom -->
    <script src="assets/js/ekka.js"></script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
        // Validate and process form data
        $product_name = $_POST['product_name'];
        $pro_qty = $_POST['pro_qty'];
        $category_name = $_POST['category_name'];
        $product_price = $_POST['product_price'];
        $pro_desc = $_POST['pro_desc'];

        // Check if file is selected
        if (!empty($_FILES['product_image']['name'])) {
            $filename = $_FILES['product_image']['name'];
            $tempname = $_FILES['product_image']['tmp_name'];
            $folder1 = "assets/products/" . $filename;

            // Move uploaded file to destination folder
            if (move_uploaded_file($tempname, $folder1)) {
                // Insert data into database after successful upload
                $sql = "INSERT INTO products(product_name, pro_qty, category_name, product_price, pro_desc, product_image) 
                        VALUES ('$product_name','$pro_qty','$category_name','$product_price','$pro_desc','$folder1')";
                $query_run = mysqli_query($conn, $sql);
                if ($query_run) {
                    echo "<script type='text/javascript'>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Added Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            </script>";
                } else {
                    echo "<script type='text/javascript'>alert('Failed to add product!');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Error uploading file!');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Please select an image file!');</script>";
        }
    }
    ?>
</body>

</html>
