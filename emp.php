
<?php
session_start();
include("db.php");

// Check if user is logged in
$userprofile = $_SESSION['$user_name'];
if (!$userprofile) {
    header('location: login.php');
    exit; // Stop further execution
}


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

                        <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="">Employee Registration</h5>
                            <hr>
                            <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                <!-- Employee Information -->
                                <div class="col-md-6">
                                    <label for="employeeID" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeID" name="empid"
                                        placeholder="Enter employee ID" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="employeeName" class="form-label">Employee Name</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeName"
                                        name="fname" placeholder="Enter name" required autocomplete="off">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        placeholder="Enter email" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control form-control-sm" id="phone" name="phno"
                                        placeholder="Enter phone number" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="employeeUserName" class="form-label">UserName</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeUserName"
                                        name="username" placeholder="Enter employee UserName" required
                                        autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="employeepass" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="employeepass"
                                        name="pass" placeholder="Enter employee Password" required autocomplete="off">
                                </div>

                                <!-- Employment Information -->
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control form-control-sm" id="department"
                                        name="department" placeholder="Enter department" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control form-control-sm" id="position"
                                        name="position" placeholder="Enter position" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Joining</label>
                                    <input type="date" class="form-control form-control-sm" name="jdate" id="dob"
                                        required autocomplete="off">


                                </div>

                                <!-- Additional Information -->
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control form-control-sm" name="bdate" id="dob"
                                        placeholder required autocomplete="off">
                                </div>


                                <!-- Education and Skills -->
                                <div class="col-md-6">
                                    <label for="education" class="form-label">Education</label>
                                    <input type="text" class="form-control form-control-sm" id="education" name="edu"
                                        placeholder="Enter education" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="skills" class="form-label">Skills</label>
                                    <input type="text" class="form-control form-control-sm" id="skills" name="skills"
                                        placeholder="Enter skills" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control form-control-sm" id="address" name="add" rows="4"
                                        placeholder="Enter address" required autocomplete="off"></textarea>
                                </div>

                                <!-- Submit Button -->

                                <div class="col-md-12">
                                    <center><button type="submit" class="btn btn-success" name="submit"
                                            onclick="return validateForm()">Submit</button></center>
                                </div>
                            </form>
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

	

	
	<!-- Ekka Custom -->
    <script src="assets/js/ekka.js"></script>

	

</body>

</html>