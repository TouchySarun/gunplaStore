//require('./bootstrap');
//product = code, name, line, scale, vendor, descrip, instock, price, msrp
var tableproduct = "<br><br><br>";//All product List in JSON
var tableemployee = "<br><br><br>";
var jasonproduct = "";
var tableaddress = "";
//--------------Show script------------------//
function filter(input, type){
    //name 5 / id 4 / scale 7 / vendor 8
    console.log(input||type);
    var filter, product_area, single, value, i, txtValue, a, returnValue="";
    filter = input.toUpperCase();
    product_area = document.getElementById("productArea");
    single = product_area.getElementsByClassName("single-products-catagory");
    for (i=0; i<single.length; i++){
        a = single[i].getElementsByTagName("a")[0];
        value = a.getElementsByTagName("p")[type];
        console.log(value.innerHTML);
        if(value){
            txtValue = value.textContent || value.innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
                returnValue += `<div class="single-products-catagory">${single[i].innerHTML}</div>`;
                single[i].style.display = '';
            }else{
                single[i].style.display = 'none';
            }
        }
    }
    //document.getElementById("productArea").innerHTML = returnValue;
    return returnValue;
}

function showProduct(json,editable,orderable){
    //updateProductList = showProduct(json,true,false)
    //updateProductOrderList = showProduct(json,false,true)
    tableproduct = '<br><br><br>';
    json.forEach( function(a) {
    tableproduct += `
        <div class="single-products-catagory">
            <a href="#" onclick="showProductDetail('${a.productCode}')">
                <img src="./amado-master/img/bg-img/1.jpg" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>EmployeeNumber ${a.quantityInStock}</p>
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
    if(editable === true){
        tableproduct += `<button href="#" onclick="EditProductDetail('${a.productCode}')" class="btn amado-btn qty-btn">Edit</button>`;
    }
    if(orderable === true){
        tableproduct += `
        <div class="qty-btn d-flex">
            <input style="text-align: center" type="number" class="qty-text" id="qty3" step="1" min="0" max="300" name="quantity" value="0">
            <button href="#" class="btn amado-btn" style="margin:0px">Buy</button>
        </div>`;
    }
    tableproduct += `</div>`;
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}

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

function showEmployeeList(employee){
    employee.forEach( function(a) {
    tableemployee += `
        <div class="single-products-catagory">
                <a href="#" onclick="showEmployeeDetail('${a.employeeNumber}', '${a.lastName}', '${a.firstName}', '${a.email}', '${a.officeCode}', '${a.reportsTo}',
                '${a.jobTitle}', '${a.extension}')">
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
            </a>
        </div>
        `
    });
    document.getElementById("employeeArea").innerHTML = tableemployee;
}
//------------end show script------------//

//drop-down vendor
function dropdownVender(Vendor){
    var mostvendor = "";
    Vendor.forEach(function(b) {
    mostvendor += `
        <a href="#" class="avaibility" onclick="filter('${b.productVendor}',8)">
            ${b.productVendor}
        </a>
    `
    });
    document.getElementById('Vendor').innerHTML = mostvendor;
}

function dropdownScale(Scale){
    var mostscale = "";
    Scale.forEach(function(b) {
    mostscale += `
        <a href="#"  class="avaibility" onclick="filter('${b.productScale}',7)">
            ${b.productScale}
        </a>
    `;
    });
    document.getElementById('Scale').innerHTML = mostscale;

}

//-----------------------------categorize --------------------------------//

function categorize(input,type){
    var textBox = "";
    input.forEach(function(a) {
        if(type == 'Vendor'){
            textBox += `<h1>${a.productVendor}</h1>`;
            textBox += filter(a.productVendor,8);
        }
        if(type == 'Scale'){
            textBox += `<h1>${a.productScale}</h1>`;
            textBox += filter(a.productScale,7);
        }
        if(type == 'Name'){
            textBox += `<h1>${a.productScale}</h1>`;
            textBox += filter(a.productScale,5);
        }

    });
    document.getElementById("productArea").innerHTML = textBox;
}
//---------------end categorize -----------------------//

//------------------------------filter----------------------------- //

// use when delete product
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

//------------------------------Pop-Up----------------------------- //
function showProductDetail(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/editproduct/'+a,
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
                            <div class="single_product_desc">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `;
    document.getElementById("id02").innerHTML = box;
    document.getElementById("id02").style.display = 'block';
        }
    });
}

// popup employee detail
function showEmployeeDetail(number, lname, fname, email, office, report, job, exetension){
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
                                        <p class="product-price">Number ${number}</p>
                                            <h4>${fname} ${lname}</h6>
                                            <p class="avaibility"><i class="fa fa-circle"></i> ${email}</p><br>
                                            <h5>Job: ${job}</h5>
                                            <h5>OfficeCode ${office}</h5>
                                            <h5>Report To ${report}</h5>
                                        <p>extension ${exetension}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `;
    document.getElementById("id02").innerHTML = box;
    document.getElementById("id02").style.display = 'block';
}

// edit product detail
function EditProductDetail(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: '/editproduct/'+a,
        success: function (data) {
            var b = JSON.parse(data)[0];
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
                                <div class="single_product_desc">
                                    <div class="product-meta-data">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        `;
    document.getElementById("id03").innerHTML = box;
    document.getElementById("id03").style.display = 'block';
    }
    });
}

// edit employee detail
function EditEmployeeDetail(number, lname, fname, email, office, report, job, exetension){
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
                                            <p>Number: <input type="text" name="number" value="${number}"></p>
                                            <p>FirstName: <input type="text" name="text" value="${fname}"></p>
                                            <p>LastName: <input type="text" name="text" value="${lname}"></p>
                                            <p>Email: <input type="text" name="text" value="${email}"></p>
                                            <p>JobTitle: <input type="text" name="text" value="${job}"></p>
                                            <p>OfficeCode: <input type="text" name="text" value="${office}"></p>
                                            <p>ReportTo: <input type="text" name="text" value="${report}"></p>
                                            <p>Extension: <input type="text" name="text" value="${exetension}"></p>
                                        </form>
                                    </div>
                                    <a href="#" class="btn amado-btn">Delete</a>
                                    <a href="#" class="btn amado-btn">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `;
    document.getElementById("id03").innerHTML = box;
    document.getElementById("id03").style.display = 'block';

}
//------------------------End Pop-up--------------------------//

// ----------------------Insert-------------------------------//
// Product
function updateitem(a){
    var product = { "pname": document.getElementById("name").value.toString(),
                    // "pcode": document.getElementById("code").value.toString(),
                    // "pline": document.getElementById("line").value.toString(),
                    "pscale": document.getElementById("scale").value.toString(),
                    "pvendor": document.getElementById("vendor").value.toString(),
                    "pnumber": document.getElementById("stock").value.toString(),
                    "pprice": document.getElementById("price").value.toString(),
                    // "pmsrp": document.getElementById("msrp").value.toString(),
                    "pdes": document.getElementById("d").value.toString()};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/updateProduct/'+a,
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id03').style.display='none';
            // updateProductList();
        }
    });
}
// ---------------------End Insert---------------------------//

// ---------------------Update-------------------------------//
function insertitem(){
    var product = { "pname": document.getElementById("name").value.toString(),
                    "pcode": document.getElementById("code").value.toString(),
                    "pline": document.getElementById("line").value.toString(),
                    "pscale": document.getElementById("scale").value.toString(),
                    "pvendor": document.getElementById("vendor").value.toString(),
                    "pnumber": document.getElementById("number").value.toString(),
                    "pprice": document.getElementById("price").value.toString(),
                    "pmsrp": document.getElementById("msrp").value.toString(),
                    "pdes": document.getElementById("d").value.toString()};
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
            console.log(data);
            document.getElementById('id04').style.display='none';
            // updateProductList();
        }
    });
}
// -----------------------End Update-------------------------//

// -----------------------Delete-----------------------------//
//Product
function deleteitem(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url: '/deleteProduct/'+a,
        success: function (data) {
            document.getElementById('id03').style.display='none';
            const index = jsonproduct.findIndex(function(x, a){
                return x.productCode == a;
            });
            if (index !== undefined) {
                findProductCode(a);
                // delete jsonproduct[index];
                // updateProductList(jsonproduct);
            }
        }
    });
}
// ----------------------End Delete-----------------------------//
function order_calculator(){
    //var table = document.getElementById("order_table");
    var body = document.getElementById("order_table_body");
    var tr = body.getElementsByTagName("tr");
    console.log(tr);
    var sum = 0;
    for(var i=0; i<tr.length; i++){
        var price = tr[i].getElementsByTagName("td")[2].innerText;
        console.log(price);
        var num = document.getElementById(`qty${i}`).value;
        console.log(num);
        sum += price*num;
    }
    document.getElementById("sumprice").innerHTML = sum;
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
            <td><a href="#" onclick="document.getElementById('id04').style.display='block'" class="btn amado-btn" style="min-width:50px">Edit</a></td>
        </tr>
        `;
    });
    document.getElementById('order_table_body').innerHTML = shipping_table;

}
