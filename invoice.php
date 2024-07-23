<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Pharma Care">

    <title>Pharma Care</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />
    <link id="ekka-css" href="assets/css/ekka.css" rel="stylesheet">

    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .product-list-container {
            display: flex;
            width: 100%;
        }

        .product-list {
            width: 60%;
            padding: 20px;
        }

        .search-bar {
            margin-bottom: 20px;
            border:none;
            color:#fff;
            width: 60%;
            box-shadow: 0 4px 8px rgba(0.1, 0.5, 0.1, 0.5);
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .category-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .category-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: green;
            border: 1px solid #ccc;
            outline-color:green;
            color:#fff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
            text-align:center;
           
            
        }

        .product-card {
            /* border: 1px solid #ccc; */
            overflow: hidden;
            background-color: #fff;
            padding: 10px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0.5, 0.5, 0.1, 0.5); /* Add shadow on hover */
        }

        .product-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0.5, 0, 0.1); /* Add shadow on hover */
        }

        .product-card img {
            width: 110px;
            height: 110px;
            border-radius: 50%; 
            padding:2px;
           
            
            
           
        }
        .product-card h6{
          color:#000
         
          
          
        }
        .product-card p{
         
          color:#000
         
        }

        .billing-invoice {
            width: 40%;
            padding: 20px;
            background-color: #fff;
            
           
        }

        .billing-invoice-content {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0.5, 0.5, 0.5, 0.1);
        }

        h4 {
            margin-bottom: 20px;
            color:black;
        }

        .invoice-summary {
            margin-top: 20px;
            border-top: 1px solid #fff;
            padding-top: 10px;
        }

        .invoice-summary div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .invoice-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .proceed {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: green;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0.5, 0.5, 0.5, 0.1);
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            
        }


        table th {
            background-color: #fff;
        }

        .invoice-total {
            font-weight: bold;
        }
        .invoice-actions button{
          background-color:green;
          width: 60px;
          color:white;
          padding: 3px;

        }

        @media print {
            body * {
                visibility: hidden;
            }
            .billing-invoice, .billing-invoice * {
                visibility: visible;
            }
            .billing-invoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 20px;
            }
            .invoice-form {
                width: 100%;
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!-- WRAPPER -->
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "assets/include/sidebar.php"; ?>

        <!-- PAGE WRAPPER -->
        <div class="ec-page-wrapper">
            <!-- Header -->
            <?php include "assets/include/header.php"; ?>

            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <div class="row">
                        <div class="product-list-container">
                            <div class="product-list">
                                <div class="search-bar">
                                    <input type="text" placeholder="Search products...">
                                </div>
                                <div class="category-buttons">
                                    <button class="category-button" data-category="Tablet">Tablet</button>
                                    <button class="category-button" data-category="Capsule">Capsule</button>
                                    <button class="category-button" data-category="Syrup">Syrup</button>
                                    <button class="category-button" data-category="Test">Test</button>
                                    <button class="category-button" data-category="Electronic Toys">Electronic Toys</button>
                                    <button class="category-button" data-category="Soft Toys">Soft Toys</button>
                                </div>
                                <div class="product-grid" id="product-grid">
                                    <!-- Products will be dynamically loaded here -->
                                </div>
                            </div>
                            <div class="billing-invoice">
                                <div class="billing-invoice-content">
                                    <h4>Billing Invoice</h4>
                                    <div class="invoice-form">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-items">
                                                <!-- Items will be dynamically added here -->
                                            </tbody>
                                        </table>
                                        <div class="invoice-summary ">
                                            <div class="invoice-actions  ">
                                                <button class="print-button   " onclick="window.print()">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Content -->
                </div> <!-- End Content Wrapper -->

                <!-- Footer -->
                <?php include "assets/include/footer.php"; ?>

            </div> <!-- End Page Wrapper -->
        </div> <!-- End Wrapper -->

        <!-- Common Javascript -->
        <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function() {
                var invoiceItems = []; // Array to store selected items

                // Function to update invoice items and summary
                function updateInvoice() {
                    var subtotal = 0;
                    var tax = 0;
                    var total = 0;

                    // Clear existing items
                    $('#invoice-items').empty();

                    // Loop through invoice items
                    invoiceItems.forEach(function(item) {
                        var itemTotal = item.quantity * item.price;
                        subtotal += itemTotal;
                       

                        // Build HTML for each item row in the table
                        var itemRow = `
                            <tr>
                                <td>${item.name}</td>
                                <td>${item.quantity}</td>
                               
                                <td>$${item.price.toFixed(2)}</td>
                                <td>$${itemTotal.toFixed(2)}</td>
                                
                            </tr>

                            
                            
                        `;
                        $('#invoice-items').append(itemRow);
                    });

                    // Calculate tax and total
                    tax = subtotal * 0.1; // Assuming 10% tax rate
                    total = subtotal + tax;

                    // Update summary
                    $('#invoice-items').append(`
                        <tr class="invoice-total">
                            <td colspan="3">Subtotal:</td>
                            <td>$${subtotal.toFixed(2)}</td>
                        </tr>
                        <tr class="invoice-total">
                            <td colspan="3">Tax:</td>
                            <td>$${tax.toFixed(2)}</td>
                        </tr>
                        <tr class="invoice-total">
                            <td colspan="3">Total:</td>
                            <td>$${total.toFixed(2)}</td>
                        </tr>
                        <tr>discount</tr>

                    `);
                }

                // Click event handler for category buttons
                $('.category-button').click(function() {
                    var category = $(this).data('category');
                    $.ajax({
                        url: 'fetch_products.php',
                        type: 'GET',
                        data: {
                            category: category
                        },
                        success: function(response) {
                            var products = JSON.parse(response);
                            var productGrid = $('#product-grid');
                            productGrid.empty();
                            products.forEach(function(product) {
                                var productCard = `
                                    <div class="product-card" data-name="${product.product_name}" data-price="${product.product_price}">
                                        <img src="${product.product_image}" alt="${product.product_name}">
                                        <h4>${product.product_name}</h4>
                                        <p>Price: $${product.product_price}</p>
                                    </div>
                                `;
                                productGrid.append(productCard);
                            });

                            // Click event handler for product cards
                            $('.product-card').click(function() {
                                var productName = $(this).data('name');
                                var productPrice = parseFloat($(this).data('price'));
                                var found = false;

                                // Check if item already in invoiceItems
                                for (var i = 0; i < invoiceItems.length; i++) {
                                    if (invoiceItems[i].name === productName) {
                                        invoiceItems[i].quantity++;
                                        found = true;
                                        break;
                                    }
                                }

                                // If item not found, add to invoiceItems
                                if (!found) {
                                    invoiceItems.push({
                                        name: productName,
                                        price: productPrice,
                                        quantity: 1
                                    });
                                }

                                // Update invoice and summary
                                updateInvoice();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error); // Log any errors to the console
                        }
                    });
                });

                // Click event handler for Proceed button
                $('.proceed').click(function() {
                    // Generate invoice in form format
                    var invoiceHTML = `
                        <div class="invoice-form">
                            <h2>Invoice</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>discount</th>
                                    </tr>
                                </thead>
                                <tbody id="invoice-items">
                                    <!-- Items will be dynamically added here -->
                                </tbody>
                            </table>
                            <div class="invoice-summary">
                                <div class="invoice-actions">
                                    <button class="print-button" onclick="window.print()">Print</button>
                                </div>
                            </div>
                        </div>
                    `;

                    // Replace existing content with invoice form
                    $('.billing-invoice-content').html(invoiceHTML);

                    // Update invoice and summary in the form
                    updateInvoice();
                });
            });
        </script>
    </div>
</body>

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

</html>
