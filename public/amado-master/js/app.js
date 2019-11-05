//require('./bootstrap');
//product = code, name, line, scale, vendor, descrip, instock, price, msrp
var tableproduct = "<br><br><br>";//All product List in JSON
var tableemployee = "<br><br><br>";
//--------------Show script------------------//
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

function showProductList(json){
    //var i = 0;
    //var json = $jsonProduct;
    //<a href="#" onclick="showProductDetail(${a.productName}, ${a.productScale}, ${a.productVendor}, ${a.productDescription}, ${a.quantityInStock}, ${a.buyPrice})">
    json.forEach( function(a) {
    tableproduct += `
        <div class="single-products-catagory">
                <a href="#" onclick="showProductDetail('${a.productName}', '${a.productScale}', '${a.productVendor}', '${a.productDescription}', '${a.quantityInStock}', '${a.buyPrice}')">
                <img src="./amado-master/img/bg-img/1.jpg" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>In Stock ${a.quantityInStock}</p>
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

//----------Update script----------//
function updateProductList(json){
    json.forEach( function(a) {
    tableproduct += `
        <div class="single-products-catagory">
                <a href="#" onclick="showProductDetail('${a.productName}', '${a.productScale}', '${a.productVendor}', '${a.productDescription}', '${a.quantityInStock}', '${a.buyPrice}')">
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
                <a href="#" onclick="EditProductDetail('${a.productName}', '${a.productScale}', '${a.productVendor}', '${a.productDescription}', '${a.quantityInStock}', '${a.buyPrice}')" class="btn amado-btn">Edit</a>
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
//----------end update script----------//

//add order product
function updateProductOrderList(json){
    json.forEach( function(a) {
    tableproduct += `
        <div class="single-products-catagory">
            <a href="#" onclick="showProductDetail('${a.productName}', '${a.productScale}', '${a.productVendor}', '${a.productDescription}', '${a.quantityInStock}', '${a.buyPrice}')">
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
            <div class="qty-btn d-flex">
                <input style="text-align: center" type="number" class="qty-text" id="qty3" step="1" min="1" max="300" name="quantity" value="1">   
                <a href="#" class="btn amado-btn">Buy</a>
            </div>
        </div>
        `
    });
    document.getElementById("productArea").innerHTML = tableproduct;
}

//show employee
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
                <a href="#" onclick="EditEmployeeDetail('${a.employeeNumber}', '${a.lastName}', '${a.firstName}', '${a.email}', '${a.officeCode}', '${a.reportsTo}', 
                '${a.jobTitle}', '${a.extension}')" class="btn amado-btn">Edit</a>
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

function filterByProductName() {
    // document.getElementById("productArea").innerHTML = tableproduct;
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
function showProductDetail(name, scale, vendor, descrip, instock, price){
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
                                    <p class="product-price">$${price}</p>
                                        <h3>${name}</h6>
                                        <h4>Scale ${scale}</h6>
                                        <h5>Vendor ${vendor}</h5>
                                    <p class="avaibility"><i class="fa fa-circle"></i> ${instock} In Stock</p>
                                </div>
                                <div class="short_overview my-5">
                                    <p>${descrip}</p>
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
function EditProductDetail(name, scale, vendor, descrip, instock, price){
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
                                        <p>Price: <input type="text" name="number" value="${price}"></p>
                                        <p>Name: <input type="text" name="text" value="${name}"></p>
                                        <p>Scale: <input type="text" name="text" value="${scale}"></p>
                                        <p>Vendor: <input type="text" name="text" value="${vendor}"></p>
                                        <p>Instock: <input type="text" name="text" value="${instock}"></p>
                                    </form>
                                </div>
                                <div class="short_overview my-5">
                                    <p>Description: <textarea name="message" style="width:400px; height:250px;">${descrip}</textarea></p>
                                </div>
                                <a href="#" class="btn amado-btn">Delete</a>
                                <a href="#" class="btn amado-btn">Save</a>
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

// edit product detail
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
