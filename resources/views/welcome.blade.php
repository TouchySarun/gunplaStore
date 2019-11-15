<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Gunpla Store | Plastic Model Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="./amado-master/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="./amado-master/css/core-style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./amado-master/js/app.js"></script>
</head>

<body>
    <!-- <script>
        
        sessionStorage.getItem("empNum", user[0].employeeNumber);
        sessionStorage.getItem("empFname", user[0].firstName);
        sessionStorage.getItem("empLname", user[0].lastName);
        sessionStorage.getItem("empTitle", user[0].jobTitle);

    </script> -->
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-50">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="" method="get">
                            <!-- <input type="search" name="search" id="search" placeholder="Type your keyword..."> -->
                            <input type="text" id="myInput" onkeyup="filterByProductName()" placeholder="Search for names..">
                            <button type="submit"><img src="./amado-master/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">

                <a href="/welcome"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>

            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">

            <!-- Close Icon -->
            <!-- <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div> -->
            <!-- Logo -->
            <div class="logo">
                <a href="/welcome"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>
            
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <div class="amado-nav">
                        <img src="./amado-master/img/core-img/employeeM.png">
                        <div id="employeeInfo"></div>
                        <!-- <script>
                            var employeeTitle = sessionStorage.getItem("")
                        </script> -->
                        <!-- Button Group -->
                        <div class="amado-btn-group mt-30 mb-100">
                            <a href="/" class="btn amado-btn">Logout</a>
                        </div>
                    </div>
                </ul>
            </nav>

            <!-- PopUp Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;
                </span>
                <!-- Form inside popup -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="container">
                        <h4>New Customer</h4>
                        <br>
                        <label for="customerName"><b>Customer Name</b></label>
                        <input type="text" placeholder="Your Company" name="customerName" required>
                        <label for="firstName"><b>First Name</b></label>
                        <input type="text" placeholder="" name="firstName" required>
                        <label for="lastName"><b>Last Name</b></label>
                        <input type="text" placeholder="" name="lastName" required>
                        <label for="phoneNum"><b>Phone number</b></label>
                        <input type="text" placeholder="Ex. 088xxxxxx" name="phoneNum" required>
                        <label for="addrline1"><b>Address Line 1</b></label>
                        <input type="text" placeholder="" name="addrline1" required>
                        <label for="addrline2"><b>Address Line 2</b></label>
                        <input type="text" placeholder="" name="addrline2">
                        <label for="saleRepEmNum"><b>SaleRepEmployeeNumber</b></label>
                        <input type="text" placeholder="4-digit code" name="saleRepEmNum" required>
                        <button type="submit">Confirm</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="id04" class="modal">
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;
                </span>
                <!-- order-status -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="cart-title mt-50">
                                        <h2>New Order Status</h2>
                                    </div>
                                    <div class="product-meta-data">
                                        <form>
                                            <p>Firstname: <input type="text" name="text"></p>
                                            <p>Lastname: <input type="text" name="text"></p>
                                            <p>Order ID: <input type="text" name="number"></p>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="order_status">STATUS
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='Cancelled'">Cancelled</a></li>
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='Disputed'">Disputed</a></li>
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='In process'">In process</a></li>
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='On hold'">On hold</a></li>
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='Resolved'">Resolved</a></li>
                                                    <li><a class="btn btn-primary" href="#" onclick="document.getElementById('order_status').innerHTML='Shipped'">Shipped</a></li>
                                                </ul>
                                            </div>
                                        </form>
                                        <br>
                                        <a href="#" class="btn amado-btn">SAVE</a>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- pop up shipping -->
            <div id="id05" class="modal">
                <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;
                </span>
                <!-- product-order -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="cart-head mt-50">
                                    <h2>Promotion Management</h2>
                                </div>
                                <div class="table tbody">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>ProductName</th>
                                                <th>Number</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5>55555</h5>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <h5>setrabus</h5>
                                                </td>
                                                <td>
                                                    <h5>100</h5>
                                                </td>
                                                <td>
                                                    <h5>-</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <a href="#" onclick="document.getElementById('id06').style.display='block'" class="btn amado-btn">Add +</a>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- pop-up add order to shipping -->
            <div id="id06" class="modal">
                <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;
                </span>
                <!-- product-order -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="cart-title mt-50">
                                        <h2>Promotion Management</h2>
                                    </div>
                                    <div class="product-meta-data">
                                        <form>
                                            <p>Code: <input type="text" name="number"></p>
                                            <p>Product Name: <input type="text" name="text"></p>
                                            <p>Number: <input type="text" name="number"></p>
                                            <p>Detail: <input type="text" name="text"></p>
                                        </form>
                                        <br>
                                        <a href="#" class="btn amado-btn">SAVE</a>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </header>
    <!-- Header Area End -->

    <!-- Hyperlink Navigation Area -->
    <!-- <div class="amado-big-button-group clearfix"> -->
    <div class="welcome-area clearfix mt-70">
        <a href="/mnod" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/shopping_cart.png"><br><br>
            Order & Stock
        </a>
        <!-- order-status.blade.php -->
        <a href="/mnpd" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/shipping_details.png"><br><br>
            Product Management
        </a>
        <a href="/mnem" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/employee.png"><br><br>
            Employee
        </a>
        <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/customers.png"><br><br>
            Customers
        </a>
        <a href="/promotion" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/promotion.png"><br><br>
            Promotion
        </a>
    </div>

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="/welcome"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>
    </div>
    <br>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area">
        <div>
            <!-- Logo -->
            <a href="/welcome" style="padding:0px 0px 0px 50px"><img src="./amado-master/img/core-img/logoDarkBG.png" alt=""></a>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="./amado-master/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="./amado-master/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="./amado-master/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="./amado-master/js/plugins.js"></script>
    <!-- Active js -->
    <script src="./amado-master/js/active.js"></script>
    <!-- DB function -->
    <script src="./amado-master/js/app.js"></script>

</body>

</html>