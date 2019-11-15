<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Order</title>

    <!-- Favicon  -->
    <link rel="icon" href="./amado-master/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="./amado-master/css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <script src="./amado-master/js/app.js"></script>

</head>

<body>
    <div style="display:none" id="key">
        <p>username</p>
        <p>jobTitle</p>
        <p>employeeNumber</p>
    </div>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="./amado-master/img/core-img/search.png" alt=""></button>
                        </form>
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

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-30">
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>
                <a href="cart.html" class="cart-nav"><img src="./amado-master/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="./amado-master/img/core-img/favorites.png" alt=""> Favourite</a>
            </div>

            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                <div class="amado-nav">
                    <!--Scale bar-->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#footerNavContent"
                        aria-controls="footerNavContent"
                        aria-expanded="false"
                        >SCALE
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="footerNavContent">
                        <ul>
                            <li class="nav-item" id="Scale">
                            </li>
                        </ul>
                    </div>
                    <!--Vendor bar-->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#footer"
                        aria-controls="footerNavContent"
                        aria-expanded="false"
                        >VENDOR
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
                <a href="/welcome" class="btn amado-btn">Back</a>
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
        </header>
        <!-- Header Area End -->

        <!-- pop up shipping details -->
                
                    <!-- product-order -->
                    <form class="modal-content animate" style="padding-top:5%">
                    <!-- cart-table-area  -->
                        <div class="section-padding-60">
                            <div class="row">
                                <div>
                                    <div class="cart-head mt-50 mb-10">
                                        <h2>Order Status Of Customer</h2>
                                    </div>
                                    <div class="table">
                                        <table>
                                            <thead>
                                                <tr style="background-color:#fbb710">
                                                    <th >OrderNumber</th>
                                                    <th style="width:20%">OrderDate</th>
                                                    <th style="width:20%">RequiredDate</th>
                                                    <th style="width:20%">ShippedDate</th>
                                                    <th >Status</th>
                                                    <th style="width:25%">Comments</th>
                                                    <th >CustomerNumber</th>
                                                    <th > </th>
                                                </tr>
                                                
                                            </thead>
                                            <tbody id="order_table_body">
                                            </tbody>
                                            <script>$data = <?php echo $jsonOrder?>; ShowShipping($data);</script>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                
            <!-- pop-up add order to shipping -->
            <div id="id04" class="modal">
                    <span onclick="document.getElementById('id04').style.display='none'"
                        class="close" title="Close Modal">&times;
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
                                        <p>ShippedDate: <input type="text" name="shipdate"></p>
                                        <p>Status: <input type="text" name="status"></p>
                                        <p>Comments: <input type="text" name="comments"></p>
                                        <!-- <div class="dropdown">
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
                                        </div> -->
                                        <div>
                                            <select class="w-100" id="order_status">
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Disputed">Disputed</option>
                                                <option value="In process">In process</option>
                                                <option value="On hold">On hold</option>
                                                <option value="Resolved">Resolved</option>
                                                <option value="Shipped">Shipped</option>
                                            </select>
                                        </div>
                                        <br><br>
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

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <br>
    <footer class="footer_area">
        <div >
        <!-- Logo -->
        <a href="/welcome" style="padding:0px 0px 0px 50px"><img src="./amado-master/img/core-img/logoDarkBG.png" alt=""></a>  
        </div>
    </footer>

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