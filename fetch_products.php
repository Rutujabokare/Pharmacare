<?php
session_start();

include("db.php"); // Ensure this file contains your database connection
$userprofile = $_SESSION['$user_name'];

if (!$userprofile) {
    header('location:login.php');
    exit(); // Ensure to stop further execution
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    
    // Prepare and execute SQL query
    $query = "SELECT product_name, pro_qty, category_name, product_price, pro_desc, product_image FROM products WHERE category_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    echo json_encode($products);
} else {
    echo json_encode([]); // Return empty array if category parameter is not set
}
?>
