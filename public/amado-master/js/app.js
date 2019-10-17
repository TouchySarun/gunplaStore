//require('./bootstrap');
//code, name, line, scale, vendor, descrip, instock, price, msrp
var tableproduct = "<br><br><br>";//All product List in JSON

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
                    <p>In Stock ${a.quantityInStock} </p>
                    <p>price ${a.buyPrice}</p>
                    <h5>${a.productScale}</h5>
                    <h5>${a.productVendor}</h5>
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
    `
    });
    document.getElementById('Scale').innerHTML = mostscale;
    
}




//------------------------------filter----------------------------- //
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
        pdName = a.getElementsByTagName("p")[3];
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
    // var Vendor = "MIN LIN DIECAST";
    filter = Vendor.toUpperCase();
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        // pdDetail = a.getElementsByClassName("pdDetail");
        pdVendor = a.getElementsByTagName("p")[6];
        if (pdVendor) {
            txtValue = pdVendor.textContent || pdVendor.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                single_products_catagory[i].style.display = "";
                // document.getElementById("productArea").insertAdjacentHTML("afterend", filteredList);
            } else {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
}

// filter Scale
function filterScale(Scale) {
    var slot, filter, single_products_catagory, pdScale, i, txtValue, a;

    filter = Scale.toUpperCase();
    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        // pdDetail = a.getElementsByClassName("pdDetail");
        pdScale = a.getElementsByTagName("p")[5];
        if (pdScale) {
            txtValue = pdScale.textContent || pdScale.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                single_products_catagory[i].style.display = "";
                // document.getElementById("productArea").insertAdjacentHTML("afterend", filteredList);
            } else {
                single_products_catagory[i].style.display = "none";
            }
        }
    }
}


//show product detail pop up
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
                                    <p class="product-price">${price}</p>
                                    <a href="product-details.html">
                                        <h6>${name}</h6>
                                        <h6>Scale ${scale}</h6>
                                        <h5>Vendor ${vendor}</h5>
                                    </a>
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
