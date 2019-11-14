<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Order | Gunpla Store - Plastic Model Shop</title>

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
            <!-- After Login interface -->
            <!-- <div class="amado-navbar-user" id="uname">
                <p>Welcome {username}</p>
            </div> -->
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
                <a href="/checkout" class="btn amado-btn">Checkout</a>
                <br>
                <a href="/mnod" class="btn amado-btn">Back</a>
                <br>
                <a href="/" class="btn amado-btn">Logout</a>
            </div>
            <!-- Pop up -->
            <!-- PopUp Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;
                </span>
                <!-- Form inside popup -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="container">
                        <h4>Adding Address</h4><br>
                        <label for="contactFirstName"><b>First Name</b></label>
                            <input type="text" placeholder="" name="contactFirstName" required>
                        <label for="contactLastName"><b>Last Name</b></label>
                            <input type="text" placeholder="" name="contactLastName" required>
                        <label for="customerName"><b>Company Name</b></label>
                            <input type="text" placeholder="" name="customerName" required>
                        <label for="country"><b>Country</b></label>
                            <input type="text" placeholder="" name="country" required>
                        <label for="addressLine1"><b>Address Line 1</b></label>
                            <input type="text" placeholder="" name="addressLine1" required>
                        <label for="addressLine2"><b>Address Line 2</b></label>
                            <input type="text" placeholder="" name="addressLine2" required>
                        <label for="city"><b>City</b></label>
                            <input type="text" placeholder="" name="city" required>
                        <label for="state"><b>State</b></label>
                            <input type="text" placeholder="" name="state" required>
                        <label for="postalCode"><b>Postal Code</b></label>
                            <input type="text" placeholder="" name="postalCode" required>
                        <button type="submit">Confirm</button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- product pop up -->
            <div id="id02" class="modal" style="display:none">
                <!-- showProductDetail() -->
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-order-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Order</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive" id="order_table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price ($)</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="order_table_body">
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="./amado-master/img/bg-img/cart1.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>White Modern Chair</h5>
                                        </td>
                                        <td class="price">
                                            <span>130</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty0'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) effect.value--;order_calculator();return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty0" step="1" min="0" max="300" name="quantity" value="0">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty0'); var qty = effect.value; if( !isNaN( qty )) effect.value++;order_calculator();return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="./amado-master/img/bg-img/cart2.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>10</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty1'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input vbtype="number" class="qty-text" id="qty1" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty1'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="./amado-master/img/bg-img/cart3.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>10</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>Subtotal:</span> <span id="sumprice">$ </span></li>
                                <li><span>Promotion Code:</span>
                                    <div class="col-10">
                                        <input type="text" class="form-control" style="padding: 5px 10px" id="code" placeholder="Code">
                                    </div>
                                </li>
                                <li><span>Discount:</span> <span>-</span></li>
                                <li><span>Total:</span> <span id="sumprice">$ </span></li>
                            </ul>
                            <div class="payment-method">
                                <label for="payment">Select payment type</label>
                                    <img class="ml-30" src="./amado-master/img/core-img/paypal.png" alt="">
                                    <img class="ml-5" src="./amado-master/img/core-img/paypal2.png" alt="" height="50" width="50">
                                    <div>
                                        <select class="mb-30 w-100" id="payment">
                                            <option value="cod">Cash On Delivery</option>
                                            <option value="creditcard">Credit Card</option>
                                            <option value="paypal">Paypal</option>
                                        </select>
                                    </div>
                            </div>
                            <h5>Select Shipping Address</h5>
                            <div class="col-12" style="padding: 0px">
                                <div class="search-content">
                                    <form action="#" method="get" style="border: none">
                                        <input class="w-75" type="text" name="search" id="search" placeholder="Type Customer Number">
                                        <button style="max-width: 22%" type="submit"><img src="./amado-master/img/core-img/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div><br>
                            <div class="checkout_details_area clearfix col-12" style="padding: 0px">
                                    <form style="border: none">
                                        <div class="form-control" id="addressArea" style="padding: 15px 20px 10px"></div>
                                            <script>
                                                var customer = <?php echo $jsonCustomer ?>;
                                                showCustomerAddress(customer);
                                            </script>
                                        <div class="confirm-control">
                                            <!-- Add Address Button -->
                                            <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn amado-btn w-100">
                                                Add Address
                                            </a>
                                        </div>
                                    </form>
                            </div>
                            <div class="cart-btn">
                                <a href="/checkout" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <br>
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