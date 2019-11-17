//require('./bootstrap');
//product = code, name, line, scale, vendor, descrip, instock, price, msrp
var tableproduct = "<br><br><br>";//All product List in JSON
var tableemployee = "<br><br><br>";
var tableaddress = "";
var tablestock = "";
var tablepromotion = "";
//--------------Show script------------------//
function showCustomerAddress(input) {
    x = JSON.parse(input);
    var tableaddress = "";
    var n = 0;
    x.forEach( function (a) {
        if (n == input.length - 1) {
            tableaddress += `
            <!-- class="radio-container" -->
            <table style="width: 100%">
            <tbody>
            <tr>
            <td style="text-align: left; margin-right: 10px; max-width: 10%; border-bottom: none;">
            <label class="radio-container"> 
            <input type="radio" name="addressSelect" value="${n}">
            <span class="checkmark"></span>
            </label>
            </td>
            <td style="text-align: left; flex: 0 0 100%; width: 90%; max-width: 90%; border-bottom: none">
            <p>${a.addressLine1} ${a.addressLine2}<br>${a.city} ${a.state} ${a.country} ${a.postalCode}</p>                    
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            `;
                        } else {
                            n++;
                            tableaddress += `
                            <table style="width: 100%">
                            <tbody>
                            <tr>
                            <td style="text-align: left; margin-right: 10px; max-width: 10%; border-bottom: none">
                            <label class="radio-container">
                            <input type="radio" name="addressSelect" value="${n}">
                            <span class="checkmark"></span>
                            </label>
                            </td>
                            <td style="text-align: left; flex: 0 0 100%; width: 90%; max-width: 90%;">
                            <p>${a.addressLine1} ${a.addressLine2}<br>${a.city} ${a.state} ${a.country} ${a.postalCode}</p>                    
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            `;
                        }
                    });
                    document.getElementById("addressArea").innerHTML = tableaddress;
                }
                
                function getAddress(customerNumber){
                    //console.log(customerNumber);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'get',
                        url: '/getAddress/' + customerNumber,
                        success: function (data) {
                            console.log(data);
                            showCustomerAddress(data);
                            //var x = JSON.parse(data);
                            //console.log(x[0].customerNumber);
                            // return x[0];
                        }
                    });
                }
                
                var jasonproduct = "";
                //--------------Show script------------------//
function showProduct(json, editable, orderable) {
//updateProductList = showProduct(json,true,false)
                //updateProductOrderList = showProduct(json,false,true)
                    var i = 0;
                    tableproduct = '<br><br><br>';
                    json.forEach(function (a) {
        tableproduct += `
        <div class="single-products-catagory">
        <a href="#" onclick="PopUpProduct('${a.productCode}', '${editable}')">
        <img src="./amado-master/img/bg-img/1.jpg" alt="">
        <!-- Hover Content -->
                <div class="hover-content">
                <div class="line"></div>
                <p>Stock ${a.quantityInStock}</p>
                    <p>$${a.buyPrice}</p>
                    <p>${a.productScale}</p>
                    <p>${a.productVendor}</p>
                    <h4>${a.productName}</h4>
                    </div>
                <div class="pdDetail" style= "display:none">
                    <p>${a.productCode}</p>
                    <p>${a.productName}</p>
                    <p>${a.productLine}</p>
                    <p>${a.productScale}</p>
                    <p>${a.productVendor}</p>
                    <p>${a.productDescription}</p>
                    <p>${a.quantityInStock}</p>
                    <p>${a.buyPrice}</p>
                    <p>${a.MSRP}</p>
                </div>
            </a>`;
        if (editable === true) {
            tableproduct += `<button href="#" onclick="PopUpProduct('${a.productCode}',true)" class="btn amado-btn qty-btn">Edit</button>`;
        }
        if (orderable === true) {

            tableproduct += `
        <div class="d-flex" class="btn amado-btn">
            <div style="width:20%;margin:15px 0px">
                <span class="qty-minus" onclick="var effect = document.getElementById('qty${i}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                <input class="setZero" style="width:20%" id="qty${i}" step="1" min="0" max="300" name="quantity" value="0">
                <span class="qty-plus" onclick="var effect = document.getElementById('qty${i}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            <button href="#" onclick="AddToOrder(document.getElementById('orderId').value,'${a.productName}','${a.buyPrice}', '${a.productCode}', document.getElementById('qty${i}').value,'qty${i}')" class="btn amado-btn" style="margin:0px">Buy</button>
        </div>`;
            i++;
        }
        tableproduct += `</div>`;
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}

//Customer Address
function showCustomerAddress(json) {
    var n = 0;
    json.forEach( function(a) {
        if(n == json.length - 1) {
            tableaddress += `
            <!-- class="radio-container" -->
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="text-align: left; max-width: 10%; border-bottom: none">
                            <label class="radio-container">
                                <input type="radio" name="addressSelect" value="${n}">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td style="border-bottom: none">
                            <h5>${a.contactFirstName} ${a.contactLastName}</h5>
                            <p>${a.addressLine1} ${a.addressLine2}<br>${a.city} ${a.state} ${a.country} ${a.postalCode}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        `
        } else {
            n++;
            tableaddress += `
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="text-align: left; max-width: 10%; border-bottom: none">
                            <label class="radio-container">
                                <input type="radio" name="addressSelect" value="${n}">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <h5>${a.contactFirstName} ${a.contactLastName}</h5>
                            <p>${a.addressLine1} ${a.addressLine2}<br>${a.city} ${a.state} ${a.country} ${a.postalCode}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        `
        }
    });
    document.getElementById("addressArea").innerHTML = tableaddress;
}

function showCart(product){
    tableCart = '';
    product.forEach(function (a){
        tableCart += `<tr>
        <td class="cart_product_img">
            <a href="#"><img src="./amado-master/img/bg-img/cart1.jpg" alt="Product"></a>
        </td>
        <td class="cart_product_desc">
            <h5>${a.orderLineNumber}</h5>
        </td>
        <td class="price">
            <span>${a.priceEach}</span>
        </td>
        <td class="qty">
            <div class="qty-btn d-flex">
                <p>Qty</p>
                <div class="quantity">
                    <span class="qty-minus" onclick="var effect = document.getElementById('qty0'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) effect.value--;order_calculator();return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                    <input type="number" class="qty-text" id="qty0" step="1" min="0" max="300" name="quantity" value="${a.qty}">
                    <span class="qty-plus" onclick="var effect = document.getElementById('qty0'); var qty = effect.value; if( !isNaN( qty )) effect.value++;order_calculator();return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
            </div>
        </td>
    </tr>`
    });
    document.getElementById('order_table_body').innerHTML = tableCart;
}

function showEmployee(employee) {
    tableemployee = "<br><br><br>";
    jsonemployee = employee;
    employee.forEach(function (a) {
        tableemployee += `
        <div class="single-products-catagory">
                <a href="#" onclick="PopUpEmployee('${a.employeeNumber}', '${a.lastName}', '${a.firstName}', '${a.email}', '${a.officeCode}', '${a.reportsTo}',
                '${a.jobTitle}', '${a.extension}', true)">
                <img src="./amado-master/img/core-img/employeeM.png" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Number ${a.employeeNumber}</p>
                    <h5>${a.jobTitle}</h5>
                    <h4>${a.firstName} ${a.lastName}</h4>
                </div>
                <div class="pdDetail" style= "display:none">
                    <p>${a.employeeNumber}</p>
                    <p>${a.lastName}</p>
                    <p>${a.firstName}</p>
                    <p>${a.extension}</p>
                    <p>${a.email}</p>
                    <p>${a.officeCode}</p>
                    <p>${a.reportsTo}</p>
                    <p>${a.jobTitle}</p>
                </div>
                <a href="#" onclick="PopUpEmployee('${a.employeeNumber}', '${a.lastName}', '${a.firstName}', '${a.email}', '${a.officeCode}', '${a.reportsTo}',
                '${a.jobTitle}', '${a.extension}', true)" class="btn amado-btn">Edit</a>
            </a>
        </div>
        `
    });
    document.getElementById("employeeArea").innerHTML = tableemployee;
}

//stockin
function stockin(stock){
    tablestock = "";
    stock.forEach( function(a) {
    tablestock += `
        <tr>
            <td><h5>${a.stockNumber}</h5></td>
            <td><h5>${a.productCode}</h5></td>
            <td class="cart_product_desc">
                <h5>${a.qty}</h5>
            </td>
            <td><h5>${a.stockDate}</h5></td>
        </tr>
        `
    });
    document.getElementById("stock").innerHTML = tablestock;
}

//promotion
function promotion(promo){
    tablepromotion = "";
    console.log(promo);
    promo.forEach( function(a) {
    tablepromotion += `
        <tr>
            <td><h5>${a.promotionId}</h5></td>
            <td><h5>${a.promotionCode}</h5></td>
            <td class="cart_product_desc">
                <h5>${a.qty}</h5>
            </td>
            <td><h5>${a.stockDate}</h5></td>
            <td><h5>${a.expairDate}</h5></td>
        </tr>
        `
    });
    document.getElementById("promotion").innerHTML = tablepromotion;
}
//---------------Pop Up ----------------//
//Employee
function PopUpEmployee(number, lname, fname, email, office, report, job, exetension, editAble){
    //showEmployeeDetail(a) = PopUpProduct(a, false)
    //EditEmployeeDetail(a) = PopUpProduct(a, true)
    var box = `
            <span onclick="document.getElementById('id03').style.display='none'"
                class="close" title="Close Modal">&times;
            </span>
            <form class="modal-content animate" action="/action_page.php">
                <div class="container">
                    <div class="single-product-area section-padding-100 clearfix" >
                        <div class="container-fluid" >
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="single_product_thumb">
                                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                    <a class="gallery_img" href="./amado-master/img/core-img/employeeM.png">
                                                        <img class="d-block w-100" src="./amado-master/img/core-img/employeeM.png" alt="First slide">
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="single_product_desc">
                                        <div class="product-meta-data">
                                            <div class="line"></div>
                                                <form>
                                                    <p>FirstName: <input type="text" id="efn" name="text" value="${fname}"></p>
                                                    <p>LastName: <input type="text" id="eln" name="text" value="${lname}"></p>
                                                    <p>Email: <input type="text" id="eem" name="text" value="${email}"></p>
                                                    <p>JobTitle: <input type="text" id="ej" name="text" value="${job}"></p>
                                                    <p>OfficeCode: <input type="text" id="eof" name="text" value="${office}"></p>
                                                    <p>ReportTo: <input type="text" id="er" name="text" value="${report}"></p>
                                                    <p>Extension: <input type="text" id="ee" name="text" value="${exetension}"></p>
                                                </form>
                                            </div>`;
    if (editAble === true) {
        box += `<a href="#" class="btn amado-btn" onclick="deleteem('${number}')">Delete</a>
                <a href="#" class="btn amado-btn" onclick="updateem('${number}')">Save</a>`;
    }
    box += `</div></div></div></div></div></div></div></form>`;
    document.getElementById("id03").innerHTML = box;
    document.getElementById("id03").style.display = 'block';
}


function PopUpodstatus(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/editstatus/' + a,
        success: function (data) {
            var b = JSON.parse(data)[0];
            console.log(b);
    var status = `
        <span onclick="document.getElementById('id08').style.display='none'"
            class="close" title="Close Modal">&times;
        </span>
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
                            <p>ShippedDate: 
                            <br><input id="shipdate" type="date" name="shipdate" value="${b.shippedDate}"></p>
                            <p>Status: 
                            <div>
                                <select class="w-100" id="order_status" value="${b.status}">
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Disputed">Disputed</option>
                                    <option value="In process">In process</option>
                                    <option value="On hold">On hold</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Shipped">Shipped</option>
                                </select>
                            </div></p>
                            <p>Comments: <br><textarea id="shipcom" name="message" style="width:400px; height:150px;">${b.comments}</textarea></p>
                            <br>
                        </form>
                        <br>
                        <a href="#" onclick="updateship(${b.orderNumber})" class="btn amado-btn">SAVE</a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>`;
    document.getElementById("id08").innerHTML = status;
    document.getElementById("id08").style.display = 'block';
    }
    });
}
//Product
function PopUpProduct(a, editAble){
    //showProductDetail(a) = PopUpProduct(a, false)
    //EditProductDetail(a) = PopUpProduct(a, true)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/editproduct/' + a,
        success: function (data) {
            var b = JSON.parse(data)[0];
            var box = `
    <span onclick="document.getElementById('id02').style.display='none'"
        class="close" title="Close Modal">&times;
    </span>
    <form class="modal-content animate" action="/action_page.php">
        <div class="container">
            <div class="single-product-area section-padding-100 clearfix" >
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(./amado-master/img/product-img/pro-big-1.jpg);"></li>
                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(./amado-master/img/product-img/pro-big-2.jpg);"></li>
                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(./amado-master/img/product-img/pro-big-3.jpg);"></li>
                                <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(./amado-master/img/product-img/pro-big-4.jpg);"></li>
                            </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a class="gallery_img" href="./amado-master/img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="./amado-master/img/product-img/pro-big-1.jpg" alt="First slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="./amado-master/img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="./amado-master/img/product-img/pro-big-2.jpg" alt="Second slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="./amado-master/img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="./amado-master/img/product-img/pro-big-3.jpg" alt="Third slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="./amado-master/img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="./amado-master/img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="single_product_desc">`;
            if (editAble === true) {
                box += `<div class="product-meta-data">
                <div class="line"></div>
                <form>
                    <p>Price: <input type="text" id="price" name="number" value="${b.buyPrice}"></p>
                    <p>Name: <input type="text" id="name" name="text" value="${b.productName}"></p>
                    <p>Scale: <input type="text" id="scale" name="text" value="${b.productScale}"></p>
                    <p>Vendor: <input type="text" id="vendor" name="text" value="${b.productVendor}"></p>
                    <p>Instock: <input type="text" id="stock" name="text" value="${b.quantityInStock}"></p>
                </form>
            </div>
            <div class="short_overview my-5">
                <p>Description: <textarea id="des" name="message" style="width:400px; height:250px;">${b.productDescription}</textarea></p>
            </div>
            <a href="#" class="btn amado-btn" onclick="deleteitem('${b.productCode}')">Delete</a>
            <a href="#" class="btn amado-btn" onclick="updateitem('${b.productCode}')">Save</a>

            </div></div></div></div></div></div></form>`;
            } else {
                box += `
        <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price">$${b.buyPrice}</p>
                <h3>${b.productName}</h6>
                <h4>Scale ${b.productScale}</h6>
                <h5>Vendor ${b.productVendor}</h5>
            <p class="avaibility"><i class="fa fa-circle"></i> ${b.quantityInStock} In Stock</p>
        </div>
        <div class="short_overview my-5">
            <p>${b.productDescription}</p>
        </div>
        </div></div></div></div></div></div></form>`
            }
            document.getElementById("id02").innerHTML = box;
            document.getElementById("id02").style.display = 'block';
        }
    });
}

//------------end show script------------//

//------------drop-down------------//
//Vendor
function dropdownVender(Vendor){
    var mostvendor = "";
    Vendor.forEach(function (b) {
        mostvendor += `
        <a href="#" class="avaibility" onclick="filter('${b.productVendor}',8)">
            ${b.productVendor}
        </a>
    `
    });
    document.getElementById('Vendor').innerHTML = mostvendor;
}

//Scale
function dropdownScale(Scale){
    var mostscale = "";
    Scale.forEach(function (b) {
        mostscale += `
        <a href="#"  class="avaibility" onclick="filter('${b.productScale}',7)">
            ${b.productScale}
        </a>
    `;
    });
    document.getElementById('Scale').innerHTML = mostscale;

}

//-----------------------------categorize --------------------------------//
function categorize(input, type) {
    var textBox = "";
    input.forEach(function (a) {
        if (type == 'Vendor') {
            textBox += `<h1>${a.productVendor}</h1>`;
            textBox += filter(a.productVendor, 8);
        }
        if (type == 'Scale') {
            textBox += `<h1>${a.productScale}</h1>`;
            textBox += filter(a.productScale, 7);
        }
        if (type == 'Name') {
            textBox += `<h1>${a.productCode}</h1>`;
            textBox += filter(a.productCode, 5);
        }

    });
    document.getElementById("productArea").innerHTML = textBox;
}
//---------------end categorize -----------------------//

//------------------------------filter----------------------------- //
function filter(input, type) {
    //name 5 / id 4 / scale 7 / vendor 8
    var filter, product_area, single, value, i, txtValue, a, returnValue = "";
    filter = input.toUpperCase();
    product_area = document.getElementById("productArea");
    single = product_area.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single.length; i++) {
        a = single[i].getElementsByTagName("a")[0];
        value = a.getElementsByTagName("p")[type];
        if (value) {
            txtValue = value.textContent || value.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                returnValue += `<div class="single-products-catagory">${single[i].innerHTML}</div>`;
                single[i].style.display = '';
            } else {
                single[i].style.display = 'none';
            }
        }
    }
    return returnValue;
}

function findProductCode(input) {
    var slot, single_products_catagory, pdName, i, txtValue, a;
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        pdName = a.getElementsByTagName("p")[4];
        if (pdName) {
            txtValue = pdName.textContent || pdName.innerText;
            if (txtValue.indexOf(input) > -1) {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
}
//-----------------------------end filter ------------------//

// ---------------------Insert-------------------------------//
//Product
function insertitem(){
    var product = { "snum": document.getElementById("snumber").value.toString(),
                    "pname": document.getElementById("name").value.toString(),
                    "pcode": document.getElementById("code").value.toString(),
                    "pline": document.getElementById("line").value.toString(),
                    "pscale": document.getElementById("scale").value.toString(),
                    "pvendor": document.getElementById("vendor").value.toString(),
                    "pnumber": document.getElementById("number").value.toString(),
                    "pprice": document.getElementById("price").value.toString(),
                    "pmsrp": document.getElementById("msrp").value.toString(),
                    "pdes": document.getElementById("pdes").value.toString()};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/insertProduct',
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id04').style.display='none';
            showProduct(data[0],true,false);
            stockin(data[1]);
        }
    });
}

//Employee
function insertem(){
    var product = { "enumber": document.getElementById("enumber").value.toString(),
                    "efname": document.getElementById("efname").value.toString(),
                    "elname": document.getElementById("elname").value.toString(),
                    "eex": document.getElementById("eex").value.toString(),
                    "eemail": document.getElementById("eemail").value.toString(),
                    "ecode": document.getElementById("ecode").value.toString(),
                    "ere": document.getElementById("ere").value.toString(),
                    "ejob": document.getElementById("ejob").value.toString()};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/insertEm',
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id04').style.display = 'none';
            showEmployee(data);
        }
    });
}

//Promotion
function insertpromotion(){
    var pro = {"promid": document.getElementById("promid").value.toString(),
                     "promcode": document.getElementById("promcode").value.toString(),
                     "promnum": document.getElementById("promnum").value.toString(),
                     "promdetail": document.getElementById("promdetail").value.toString(),
                     "promdate": document.getElementById("promdate").value.toString()};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/insertpromotion',
        data: pro,
        dataType: "json",
        success: function (data) {
            document.getElementById('id05').style.display='none';
            promotion(data);
        }
    });
}
// -----------------------End Insert-------------------------//

// ----------------------Update-------------------------------//
// Product
function updateitem(a) {
    var product = {
        "pname": document.getElementById("name").value.toString(),
        // "pcode": document.getElementById("code").value.toString(),
        // "pline": document.getElementById("line").value.toString(),
        "pscale": document.getElementById("scale").value.toString(),
        "pvendor": document.getElementById("vendor").value.toString(),
        "pnumber": document.getElementById("stock").value.toString(),
        "pprice": document.getElementById("price").value.toString(),
        // "pmsrp": document.getElementById("msrp").value.toString(),
        "pdes": document.getElementById("des").value.toString()
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/updateProduct/' + a,
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id03').style.display = 'none';
            document.getElementById('id02').style.display = 'none';
            showProduct(data, true, false);
        }
    });
}

//Employee
function updateem(a){
    var product = { "efn": document.getElementById("efn").value.toString(),
                    "eln": document.getElementById("eln").value.toString(),
                    "ee": document.getElementById("ee").value.toString(),
                    "eem": document.getElementById("eem").value.toString(),
                    "eof": document.getElementById("eof").value.toString(),
                    "er": document.getElementById("er").value.toString(),
                    "ej": document.getElementById("ej").value.toString()};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/updateEm/' + a,
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id03').style.display = 'none';
            showEmployee(data);
        }
    });
}

//Shipping
function updateship(a){
    var product = { "shipdate": document.getElementById("shipdate").value.toString(),
                    "odstatus": document.getElementById("order_status").value.toString(),
                    "shipcom": document.getElementById("shipcom").value.toString(),};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/updateship/' + a,
        data: product,
        dataType: "json",
        success: function (data) {
            console.log(data);
            document.getElementById('id08').style.display = 'none';
            ShowShipping(data);
        }
    });
}


// ---------------------End Update---------------------------//

// -----------------------Delete-----------------------------//
//Product
function deleteitem(a) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url: '/deleteProduct/' + a,
        success: function (data) {
            document.getElementById('id03').style.display = 'none';
            showProduct(data, true, false);
        }
    });
}

//Employee
function deleteem(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url: '/deleteEm/' + a,
        success: function (data) {
            document.getElementById('id03').style.display = 'none';
            showEmployee(data);
        }
    });
}
// ----------------------End Delete-----------------------------//

// ----------------------Calculate-----------------------------//
function order_calculator(){
    //var table = document.getElementById("order_table");
    var body = document.getElementById("order_table_body");
    var tr = body.getElementsByTagName("tr");
    var sum = 0;
    var mempoint = 0;
    for (var i = 0; i < tr.length; i++) {
        var price = tr[i].getElementsByTagName("td")[2].innerText;

        var num = document.getElementById(`qty${i}`).value;

        sum += price * num;
        mempoint = Math.floor(sum / 100) * 3;
    }
    document.getElementById("sumprice").innerHTML = '$' + sum;
    document.getElementById("mempoint").innerHTML = mempoint + ' Points';
}


function ShowShipping(input){
    var shipping_table="";
    input.forEach(function(a){
        shipping_table+=`
        <tr>
            <td><h5>${a.orderNumber}</h5></td>
            <td><h5>${a.orderDate}</h5></td>
            <td><h5>${a.requiredDate}</h5></td>
            <td><h5>${a.shippedDate}</h5></td>
            <td><h5>${a.status}</h5></td>
            <td><h5>${a.comments}</h5></td>
            <td><h5>${a.customerNumber}</h5></td>
            <td><a href="#" onclick="PopUpodstatus(${a.orderNumber})" class="btn amado-btn" style="min-width:50px">Edit</a></td>
        </tr>
        `;
    });
    document.getElementById('order_table_body').innerHTML = shipping_table;

}

function stock(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/stock',
        success: function (data) {
            console.log(data);
        }
    });
}
function AddToOrder(orderNumber,Name,price, pdCode, num ,n){

    var i = Number(document.getElementById('NumberCart').innerText)
    i = i+Number(num);
    document.getElementById(n).value = 0;

    document.getElementById('NumberCart').innerText = (i);
    var product = {
        "orderNumber": orderNumber,
        "Name" : Name,
        "price" : price,
        "productCode": pdCode,
        "qty": num
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/insertToCart',
        data: product,
        success: function (data){
            console.log(data);
        }
    });
}