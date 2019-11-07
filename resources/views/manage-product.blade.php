<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a  href="/welcome"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Logo -->
            <div class="logo">
                <a  href="/welcome"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-30">
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>
            </div>

            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn amado-btn">Product-Order</a>
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
                    <!-- product-order -->
                    <form class="modal-content animate" action="/action_page.php">
                        <div class="cart-table-area section-padding-60">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="cart-head mt-50">
                                        <h2>Product-Order</h2>
                                    </div>
                                    <div class="table tbody">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>OrderNumber</th>
                                                    <th>ProductCode</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><h5>55555</h5></td>
                                                    <td><h5>11111</h5></td>
                                                    <td class="cart_product_desc">
                                                        <h5>White Modern Chair</h5>
                                                    </td>
                                                    <td><h5>20</h5></td>
                                                    <td><h5>10/05/52</h5></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                        <a href="#" onclick="document.getElementById('id04').style.display='block'" class="btn amado-btn">Add +</a>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
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
                <!-- pop-up add order to mnpd -->
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
                                        <p>OrderNumber: <input type="text" name="number"></p>
                                        <p>ProductCode: <input type="text" name="text"></p>
                                        <p>Name: <input type="text" name="text"></p>
                                        <p>Number: <input type="text" name="text"></p>
                                    </form>
                                    <br>
                                    <a href="#" class="btn amado-btn">OK</a>
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
        
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix" id="productArea"></div>
        <script>
            var json = <?php echo $jsonProduct?>;
            updateProductList(json);
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