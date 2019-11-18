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
    <!-- Search Wrapper Area Start -->
    <!-- @if(session()->has('success')) -->
    <!-- @endif -->
    <script>
        var user = <?php echo $userDetail?>;
        sessionStorage.setItem('employeeNumber',user[0].employeeNumber);
        sessionStorage.setItem('title',user[0].jobTitle);
    </script>
    
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
            <div class="amado-navbar-toggler" >
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

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-30">
                <p>EmployeeID:</p>
                <p id="showUser"></p>
                <script>document.getElementById('showUser').innerHTML=sessionStorage.getItem('employeeNumber')</script>
                <a href="cart.html" class="cart-nav"><img src="./amado-master/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="./amado-master/img/core-img/favorites.png" alt=""> Favourite</a>
            </div>

            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <div class="amado-nav">
                        <!--Scale bar-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false">SCALE
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="footerNavContent">
                            <ul>
                                <li class="nav-item" id="Scale">
                                </li>
                            </ul>
                        </div>
                        <!--Vendor bar-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footer" aria-controls="footerNavContent" aria-expanded="false">VENDOR
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="footer">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item" id="Vendor">
                                </li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </nav>

            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn">Discount</a>
                <br>
                <a href="/" class="btn amado-btn">
                    Logout
                </a>

            </div>

            <!-- pop-up add order to shipping -->
            <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'"
                        class="close" title="Close Modal">&times;
                    </span>
                    <!-- order-status -->
                    <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                    <div class="container-fluid">
                        <div class="row">
                                <div class="cart-head mt-50 mb-10">
                                    <h2>Promotion Management</h2>
                                </div>
                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr style="background-color:#fbb710">
                                                <th style="width:20%">Promotion ID</th>
                                                <th style="width:20%">Code</th>
                                                <th>Number</th>
                                                <th style="width:20%">Details</th>
                                                <th >Expired Date</th>
                                            </tr>                                            
                                        </thead>
                                        <tbody id="promotion"></tbody>
                                    </table>
                                </div>
                                <a href="#" onclick="document.getElementById('id05').style.display='block'" class="btn amado-btn">Add +</a>
                        </div>
                    </div>
                    </div>
                    </form>
            </div>

            <div id="id05" class="modal">
                    <span onclick="document.getElementById('id05').style.display='none'"
                        class="close" title="Close Modal">&times;
                    </span>
                    <!-- order-status -->
                    <form class="modal-content animate" action="/action_page.php">
                    <div class="cart-table-area section-padding-60">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="cart-title mt-50">
                                    <h2>New Promotion</h2>
                                </div>
                                <div class="product-meta-data">
                                    <form>
                                        <p>Promotion ID : <input id="promid" type="text" name="promotionID"></p>
                                        <p>Code : <input id="promcode" type="text" name="code"></p>
                                        <p>Number : <br><input id="promnum" type="number" style="width:100%"  name="number"></p>
                                        <p>Details : <input id="promdetail" type="text" name="details"></p>
                                        <p>Expair Date : <input id="promdate" type="date" style="width:100%" name="expairDate"></p>
                                    </form>
                                    <br>
                                    <a href="#" onclick="insertpromotion()" class="btn amado-btn">SAVE</a>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Hyperlink Navigation Area -->
    <!-- <div class="amado-big-button-group clearfix"> -->
    <div class="welcome-area clearfix mt-70">
        <a href="/mnod" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/shopping_cart.png"><br><br>
            Order
        </a>
        <!-- order-status.blade.php -->
        <a href="/mnpd" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/stock.png"><br><br>
            Product & Stock
        </a>
        <a href="/shipping" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/shipping_details.png"><br><br>
            Shipping Details
        </a>
        <a href="/mnem" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/employee.png"><br><br>
            Employee
        </a>
        <a href="/mncus" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/customers.png"><br><br>
            Customers
        </a>
        <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn amado-big-btn">
            <br><br><br>
            <img src="./amado-master/img/core-img/promotion.png"><br><br>
            Promotion
        </a>
    </div>

    <script>
        $data = <?php echo $jsonpro ?? ''?>; 
        promotion($data);
    </script>
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
        <div >
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
