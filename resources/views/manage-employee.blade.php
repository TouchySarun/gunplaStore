<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div style="display:none" id="Key">
        <p>username</p>
        <p>jobTitle</p>
        <p>employeeNumber</p>
    </div>
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
                <a><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>

            </div>

            <!-- <li class="active"><a href="index.html">Home</a></li>
            <li><a href="shop">Shop</a></li>
            <li><a href="product-details.html">Product</a></li>
            <li><a href="cart.html">Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li> -->

            <!-- <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> </a> -->

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
                <a href="index.html"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-30">
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>
            </div>

            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" onclick="document.getElementById('id04').style.display='block'"  class="btn amado-btn" >AddEmployee +</a>
                <br>
                <a href="welcome" class="btn amado-btn">Back</a>
                <br>
                <a href="/" class="btn amado-btn">Logout</a>
            </div>
            <!-- Pop up -->
                <!--Login pop up-->
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'"
                        class="close" title="Close Modal">&times;
                    </span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="/action_page.php">
                        <div class="container">
                            <label for="uname"><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="uname" required>
                            <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required>
                                <button type="submit">Login</button>
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Remember me
                            </label>
                            <span class="psw"><a href="#">Forgot password?</a></span>
                        </div>
                        <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- product pop up -->
                <div id="id02" class="modal" style="display:none">
                    <!-- showProductDetail() -->
                </div>
                <div id="id03" class="modal" style="display:none">
                    <!-- showProductDetail() -->
                </div>
                <!-- popup add new employee -->
                <div id="id04" class="modal">
                    <span onclick="document.getElementById('id04').style.display='none'"
                        class="close" title="Close Modal">&times;
                    </span>
                    <!-- product-order -->
                    <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="cart-title mt-50">
                                    <h2>New Product-Order</h2>
                                </div>
                                <div class="product-meta-data">
                                    <form>
                                        <p>EmployeeNumber: <input type="text" id="enumber" name="enumber" placeholder="1002"></p>
                                        <p>FirstName: <input type="text" id="efname" name="efname" placeholder="Diane"></p>
                                        <p>LastName: <input type="text" id="elname" name="elname" placeholder="Murphy"></p>
                                        <p>Extension: <input type="text" id="eex" name="eex" placeholder="x5800"></p>
                                        <p>Email: <input type="text" id="eemail" name="eemail" placeholder=".....@classicmodelcars.com"></p>
                                        <p>OfficeCode: <input type="text" id="ecode" name="ecode" placeholder="1"></p>
                                        <p>ReportsTo: <input type="text" id="ere" name="ere" placeholder="1002"></p>
                                        <p>JobTitle: <input type="text" id="ejob" name="ejob" placeholder="VP Sales"></p>
                                        <a href="#" onclick="insertem()" class="btn amado-btn" type="submit">OK</a>
                                        <br><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
        </header>
        <!-- Header Area End -->
        
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix" id="employeeArea"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            var Employee = <?php echo $jsonEmployee?>;
            showEmployeeList(Employee);
        </script>
        <!-- Product Catagories Area End -->

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="./amado-master/img/core-img/logoDarkBG.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.html">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.html">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.html">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.html">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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