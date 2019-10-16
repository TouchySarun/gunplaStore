//require('./bootstrap');
var tableproduct = "";//All product List in JSON

function showProductList(json){
    //var i = 0;
    //var json = $jsonProduct;
    json.forEach( function(a) {
    tableproduct += `
        <div class="single-products-catagory">
            <a href="shop.html">
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
    //return tableproduct;
    document.getElementById("productArea").innerHTML = tableproduct;
}


function filterByProductName() {
    document.getElementById("productArea").innerHTML = tableproduct;

    var input, filter, slot, single_products_catagory, pdName, i, txtValue, a;

    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();

    slot = document.getElementById("productArea");
    single_products_catagory = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < single_products_catagory.length; i++) {
        //single_products_catagory[i].style.position="absolute";
        a = single_products_catagory[i].getElementsByTagName("a")[0];
        pdDetail = a.getElementsByClassName("pdDetail");
        pdName = a.getElementsByTagName("h4")[0];
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



function dropdownVender(jsonVendor){
    // dropdown Vender
    var mostvendor = "";
    var json = jsonVendor ;
    json.forEach(function(b) {
    mostvendor += `
        <a class="nav-link">
            <h5>${b.productVendor}</h5>
        </a>
    `
    });
    document.getElementById("Vendor").innerHTML = mostvendor;
}

function dropdownScale(jsonScale){
    // dropdown Scale
    var mostscale = "";
    var json = jsonScale;
    json.forEach(function(b) {
    mostscale += `
        <a class="nav-link">
            <h5>${b.productScale}</h5>
        </a>
    `
    });
    document.getElementById("Scale").innerHTML = mostscale;
}

// filter Vender
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

// filter Scale
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
