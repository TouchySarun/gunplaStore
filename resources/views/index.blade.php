<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="./amado-master/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="./amado-master/css/core-style.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
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
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
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
                <a><img src="./amado-master/img/core-img/logo.png" alt=""></a>

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
                <a href="index.html"><img src="./amado-master/img/core-img/logo.png" alt=""></a>
            </div>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>
                <a href="cart.html" class="cart-nav"><img src="./amado-master/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="./amado-master/img/core-img/favorites.png" alt=""> Favourite</a>
            </div>

            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                <div class="amado-nav">
                    <!-- <button class="dropdown-btn">SCALE
                        <i class="fa fa-caret-down"></i>
                    </button> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" >SCALE
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="footerNavContent">
                        <ul>
                            <li class="nav-item active" id="Scale">
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footer" aria-controls="footerNavContent" aria-expanded="false" >Vendor
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="footer">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active" id="Vendor">   
                            </li>
                        </ul>
                    </div>
                </div>
                </ul>
            </nav>
            
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">Discount</a>
                <a href="#" onclick="document.getElementById('id01').style.display='block'"
                    class="btn amado-btn active">Login</a>
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'"
                            class="close" title="Close Modal">&times;</span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="/action_page.php">
                        <div class="container">
                            <label for="uname"><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="uname" required>
                            <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required>
                            <button type="submit">Login</button>
                            <label>
                                <input type="checkbox" checked="unchecked" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="container" style="background-color:#f1f1f1">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <span class="psw">Forgot <a href="#">password?</a></span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="./amado-master/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="./amado-master/img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>

            </div>
            <!-- Social Button -->

        </header>
        <!-- Header Area End -->

        <!--?php echo $jsonProduct; ?>;-->
        <div id="tablelist">
        <li id="tablelist">


        </div>
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix" id="productArea">
            </div>
        </div>
        <!-- Product Catagories Area End -->

    </div>
    <script>
            var tableproduct = "";
            //var i = 0;
            var json = <?php echo $jsonProduct; ?> ;
            json.forEach(function(a) {
            tableproduct += `
                <div class="single-products-catagory">
                    <a href="shop.html">
                        <img src="./amado-master/img/bg-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>In Stock ${a.quantityInStock} </p>
                            <p>price ${a.MSRP}</p>
                            <h4>${a.productName}</h4>
                        </div>
                    </a>
                </div>
                `
            });
            document.getElementById("productArea").innerHTML = tableproduct;

            function filterByProductName() {
                var input, filter, slot, howercontent, vendor, i, txtValue, a;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                slot = document.getElementById("productArea");
                howercontent = slot.getElementsByClassName("single-products-catagory");
                for (i = 0; i < howercontent.length; i++) {
                    a = howercontent[i].getElementsByTagName("a")[0];
                    pdName = a.getElementsByTagName("h4")[0];
                    if (pdName) {
                        txtValue = pdName.textContent || pdName.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            howercontent[i].style.display = "";
                        } else {
                            howercontent[i].style.display = "none";
                        }
                    }
                }
            }

            var mostvendor = "";
            var json = <?php echo $jsonVendor; ?> ;
            json.forEach(function(b) {
            mostvendor += `
                <a class="nav-link">
                    <h5>${b.productVendor}</h5>
                </a>
            `
            });
            document.getElementById("Vendor").innerHTML = mostvendor;
            
            var mostscale = "";
            var json = <?php echo $jsonScale; ?> ;
            json.forEach(function(b) {
            mostscale += `
                <a class="nav-link">
                    <h5>${b.productScale}</h5>
                </a>
            `
            });
            document.getElementById("Scale").innerHTML = mostscale;

            function filterVendor(){
                var slot, slot2, howercontent, howercontent2, vendor, i, txtValue, a;
                slot = document.getElementById("productArea");
                slot2 = document.getElementById("Vendor");
                howercontent = slot.getElementsBy("single-products-catagory");
                howercontent2 = slot2.getElementsBy("single-products-catagory");
                for (i = 0; i < howercontent2.length; i++) {
                    a = howercontent[i].getElementsByTagName("a")[0];
                    vendor = a.getElementsByTagName("h4")[0];
                    if (vendor) {
                        txtValue = vendor.textContent || vendor.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            howercontent[i].style.display = ``;
                        } else {
                            howercontent[i].style.display = "none";
                        }
                    }
                }
            }
         </script>


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
                            <a href="index.html"><img src="./amado-master/img/core-img/logo2.png" alt=""></a>
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

</body>

</html>