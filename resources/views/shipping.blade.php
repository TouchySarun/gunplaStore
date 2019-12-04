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
    <title>Shipping | Gunpla Store Plastic Model Shop</title>

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
            <!-- <p id="showUser"></p>
            <script>
                var x = sessionStorage.getItem('employeeNumber');
                if(x != null ){
                    document.getElementById('showUser').innerHTML="EmployeeID:" +x;
                }else{
                    window.location.href = "/";
                }
            </script> -->

            <div class="amado-nav" style="cursor: default">
                <img src="./amado-master/img/core-img/employeeM.png">
                <h5 class="mt-30"><span id="showUserFName"></span> <span id="showUserLName"></span></h5>
                    <p id="showUserTitle" style="margin-bottom: 5px"></p>
                    <p><span>Employee ID: </span><span id="showUserID"></span></p>
                <script>
                    document.getElementById('showUserID').innerHTML=sessionStorage.getItem('employeeNumber');
                    document.getElementById('showUserTitle').innerHTML=sessionStorage.getItem('title');
                    document.getElementById('showUserFName').innerHTML=sessionStorage.getItem('employeeFName');
                    document.getElementById('showUserLName').innerHTML=sessionStorage.getItem('employeeLName');
                </script>

            <!-- Button Group -->
                <div class="amado-btn-group mt-20 mb-100">
                    <a href="/payment" class="btn amado-btn-plus">Payments</a>
                <br><br>
                    <a href="/welcome" class="btn amado-btn">Back</a>
                <br>
                    <a href="/" class="btn amado-btn">Logout</a>
                </div>
            </div>

            <!-- edit pop up -->
                <div id="id02" class="modal" style="display:none">
                    <!-- showProductDetail() -->
                </div>
        </header>
        <!-- Header Area End -->

        <div id="id08" class="modal" style="display:none"></div>

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
                                                    <th style="width: 150px">OrderDate</th>
                                                    <th style="width: 150px">RequiredDate</th>
                                                    <th style="width: 150px">ShippedDate    </th>
                                                    <th >Status</th>
                                                    <th >Comments</th>
                                                    <th >CustomerNumber</th>
                                                    <th > </th>
                                                </tr>

                                            </thead>
                                            <tbody id="order_table_body">
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        var data = <?php echo $jsonOrder?>;
                                        ShowShipping(data);
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>


            <!-- pop-up add order to shipping -->


    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
