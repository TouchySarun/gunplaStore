<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Checkout | Gunpla Store Plastic Model Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="./amado-master/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="./amado-master/css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- DB function -->
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
                <a href="/"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="./amado-master/img/core-img/logoGunpla1.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="product-details.html">Product</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li class="active"><a href="checkout.html">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="./amado-master/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="./amado-master/img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="./amado-master/img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="checkout-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area clearfix">
                            <div class="cart-title mt-50">
                                <h2>Checkout</h2>
                            </div>
                            <form>
                                <div class="form-control" id="addressArea" style="padding: 15px 20px 10px">
                    
                                </div>
                                
                                <script>
                                    var customer = <?php echo $jsonCustomer?>;
                                    showCustomerAddress(customer);
                                </script>
                                
                                <div class="confirm-control">
                                    <!-- Add Address Button -->
                                    <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn amado-btn w-100">
                                        Add Address
                                    </a>
                                </div>
                            </form>
                        
                            

                            <!-- PopUp Modal -->
                            <div id="id01" class="modal">
                                <span onclick="document.getElementById('id01').style.display='none'"
                                    class="close" title="Close Modal">&times;
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
                                            <!-- <select class="w-100" id="country">
                                                <option value="usa">United States</option>
                                                <option value="uk">United Kingdom</option>
                                                <option value="ger">Germany</option>
                                                <option value="fra">France</option>
                                                <option value="ind">India</option>
                                                <option value="aus">Australia</option>
                                                <option value="bra">Brazil</option>
                                                <option value="cana">Canada</option>
                                            </select> -->
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
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                            class="cancelbtn">Cancel</button>
                                    </div>
                                </form>
                            </div>    
                                <!-- Remark Area -->
                                <!-- <div class="col-12 mb-3">
                                    <b>Remark</b>
                                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                </div> -->
                        </div>        
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>

                            <div class="payment-method">
                                <label for="payment">Select payment type</label>
                                    <select class="w-100" id="payment">
                                        <option value="cod">Cash On Delivery</option>
                                        <option value="creditcard">Credit Card</option>
                                        <option value="paypal">Paypal</option>
                                    </select>
                                <label></label>
                                    <img class="ml-15" src="./amado-master/img/core-img/paypal.png" alt="">
                                    <img class="ml-15" src="./amado-master/img/core-img/paypal2.png" alt="" height="21" width="30">
                            
                            
                            
                            
                            
                                <!-- Cash on delivery
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="cod">
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div> -->
                                <!-- Credit Card -->
                                <!-- <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="creditcard">
                                    <label class="custom-control-label" for="creditcard">Credit card <img class="ml-15" src="./amado-master/img/core-img/paypal.png" alt="" ></label>
                                </div> -->
                                <!-- Paypal -->
                                <!-- <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="paypal" style="cursor: pointer">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="./amado-master/img/core-img/paypal2.png" alt="" height="21" width="66"></label>
                                </div> -->
                            </div>

                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body>

</html>