//require('./bootstrap');
//product = code, name, line, scale, vendor, descrip, instock, price, msrp
var tableproduct = "<br><br><br>";//All product List in JSON
var tableemployee = "<br><br><br>";
var tableaddress = "";
//--------------Show script------------------//
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

var jasonproduct = "";
var jasonemployee = "";
//--------------Show script------------------//
function showProductList(json){
    tableproduct="";
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
    </a>
    </div>
        `
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}
//------------end show script------------//

//----------edit product ----------//
function updateProductList(json){
    tableproduct="";
    jsonproduct = json;
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
                    <div style="display:none">
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
                    <a href="#" onclick="EditProductDetail('${a.productCode}')" class="btn amado-btn">Edit</a>
                </a>
        </div>
        `
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}
//----------end edit product----------//

//add order product
function updateProductOrderList(json){
    tableproduct="";
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
                <div style="display:none">
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
            </a>
            <div class="qty-btn d-flex">
                <input style="text-align: center" type="number" class="qty-text" id="qty3" step="1" min="0" max="300" name="quantity" value="0">   
                <button href="#" class="btn amado-btn" style="margin:0px">Buy</button>
            </div>
        </div>
        `
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}

//show employee
function showEmployeeList(employee){
    tableemployee="";
    jsonemployee = employee;
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
                <a href="#" onclick="EditEmployeeDetail('${a.employeeNumber}', '${a.lastName}', '${a.firstName}', '${a.email}', '${a.officeCode}', '${a.reportsTo}', 
                '${a.jobTitle}', '${a.extension}')" class="btn amado-btn">Edit</a>
            </a>
        </div>
        `
    });
    document.getElementById("employeeArea").innerHTML = tableemployee;
}

//drop-down vendor
function dropdownVender(Vendor){
    var mostvendor = "";
    Vendor.forEach(function(b) {
    mostvendor += `
        <a href="#" class="avaibility" onclick="filterVendor('${b.productVendor}')">
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
        <a href="#"  class="avaibility" onclick="filterScale('${b.productScale}')">
            ${b.productScale}
        </a>
    `;
    });
    document.getElementById('Scale').innerHTML = mostscale;

}

//-----------------------------categorize --------------------------------//

function categorizeVendor(Vendor){
    var textBox = "";
    Vendor.forEach(function(singleVendor) {
        textBox += `<h1>${singleVendor.productVendor}</h1>`;
        textBox += filterVendor(singleVendor.productVendor);
    });
    document.getElementById("productArea").innerHTML = textBox;
}

function categorizeScale(Scale){
    var textBox = "";
    Scale.forEach(function(singleScale) {
        textBox += `<h1>${singleScale.productScale}</h1>`;
        textBox += filterScale(singleScale.productScale);
    });
    document.getElementById("productArea").innerHTML = textBox;
}
//---------------end categorize -----------------------//

//------------------------------filter----------------------------- //
function filterByProductName() {
    var input, filter, slot, single_products_catagory, pdName, i, txtValue, a;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        pdDetail = a.getElementsByClassName("pdDetail");
        pdName = a.getElementsByTagName("p")[5];
        if (pdName) {
            txtValue = pdName.textContent || pdName.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                single_products_catagory[i].style.display = "";
                // document.getElementById("productArea").insertAdjacentHTML("afterend", filteredList);
            } else {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
}

// filter Vender
function filterVendor(Vendor){
    var slot, filter, single_products_catagory, pdVendor, i, txtValue, a;
    var newinnerHtml = "";
    // var Vendor = "MIN LIN DIECAST";
    filter = Vendor.toUpperCase();
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        // pdDetail = a.getElementsByClassName("pdDetail");
        pdVendor = a.getElementsByTagName("p")[8];
        if (pdVendor) {
            txtValue = pdVendor.textContent || pdVendor.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                single_products_catagory[i].style.display = "";
                newinnerHtml += `
                    <div class="single-products-catagory">
                        ${single_products_catagory[i].innerHTML}
                    </div> `;
                // document.getElementById("productArea").insertAdjacentHTML("afterend", filteredList);
            } else {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
    return newinnerHtml;
}
function filterScale(Scale) {
    var slot, filter, single_products_catagory, pdScale, i, txtValue, a;
    var newinnerHtml = "";
    filter = Scale.toUpperCase();
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        // pdDetail = a.getElementsByClassName("pdDetail");
        pdScale = a.getElementsByTagName("p")[7];
        if (pdScale) {
            txtValue = pdScale.textContent || pdScale.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                single_products_catagory[i].style.display = "";
                newinnerHtml += `
                <div class="single-products-catagory">
                    ${single_products_catagory[i].innerHTML}
                </div> `;
                // document.getElementById("productArea").insertAdjacentHTML("afterend", filteredList);
            } else {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
    return newinnerHtml;
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
                                            <p>FirstName: <input type="text" id="efn" name="text" value="${fname}"></p>
                                            <p>LastName: <input type="text" id="eln" name="text" value="${lname}"></p>
                                            <p>Email: <input type="text" id="eem" name="text" value="${email}"></p>
                                            <p>JobTitle: <input type="text" id="ej" name="text" value="${job}"></p>
                                            <p>OfficeCode: <input type="text" id="eof" name="text" value="${office}"></p>
                                            <p>ReportTo: <input type="text" id="er" name="text" value="${report}"></p>
                                            <p>Extension: <input type="text" id="ee" name="text" value="${exetension}"></p>
                                        </form>
                                    </div>
                                    <a href="#" class="btn amado-btn" onclick="deleteem('${number}')">Delete</a>
                                    <a href="#" class="btn amado-btn" onclick="updateem('${number}')">Save</a>
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

// ---------------------Insert-------------------------------//
//Product
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
            document.getElementById('id04').style.display='none';
            updateProductList(data);
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
            document.getElementById('id04').style.display='none';
            showEmployeeList(data);
        }
    });
}
// -----------------------End Insert-------------------------//

// ----------------------Update-------------------------------//
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
            updateProductList(data);
        }
    });
}

// Employee
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
        url: '/updateEm/'+a,
        data: product,
        dataType: "json",
        success: function (data) {
            document.getElementById('id03').style.display='none';
            showEmployeeList(data);
        }
    });
}
// ---------------------End Update---------------------------//

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
            updateProductList(data);
        }
    });
}

// Employee
function deleteem(a){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url: '/deleteEm/'+a,
        success: function (data) {   
            document.getElementById('id03').style.display='none';
            showEmployeeList(data);
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

