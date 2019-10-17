//require('./bootstrap');

function showProductList(json){
    var tableproduct = "";
    //var i = 0;
    //var json = $jsonProduct;
    json.forEach( function(a) {
    //     document.getElementById("productArea").insertAdjacentHTML("afterend",`
    //         <div class="single-products-catagory">
    //             <a href="shop.html">
    //                 <img src="./amado-master/img/bg-img/1.jpg" alt="">
    //                 <!-- Hover Content -->
    //                 <div class="hover-content">
    //                     <div class="line"></div>
    //                     <p>In Stock ${a.quantityInStock} </p>
    //                     <p>price ${a.MSRP}</p>
    //                     <h4>${a.productName}</h4>
    //                 </div>
    //              </a>
    //         </div>
    //         `);
    // });
    tableproduct += `
        <div class="single-products-catagory">
            <a href="#" onclick=document.getElementById('id02').style.display='block'>
                <img src="./amado-master/img/bg-img/1.jpg" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                        <p>In Stock ${a.quantityInStock} </p>
                        <p>price ${a.MSRP}</p>
                        <h4>${a.productName}</h4>
                </div>
            </a>
        </div>
        `
    });
    //return tableproduct;
    document.getElementById("productArea").innerHTML = tableproduct;
}

function filterByProductName() {
    //document.getElementById("productArea").innerHTML = tableproduct;
    var input, filter, slot, howercontent, pdName, i, txtValue, a
    var newTableList = "", instock, price;
    input = document.getElementById("myInput");

    filter = input.value.toUpperCase();
    slot = document.getElementById("productArea");
    howercontent = slot.getElementsByClassName("single-products-catagory");
    for (i = 0; i < howercontent.length; i++) {
         a = howercontent[i].getElementsByTagName("a")[0];
        pdName = a.getElementsByTagName("h4")[0];
        //instock = a.getElementsByTagName("p")[0].innerText;
        //price = a.getElementsByTagName("p")[1].innerText;
        if (pdName) {
            txtValue = pdName.textContent || pdName.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                howercontent[i].style.display = "";
                            // newTableList += `
                            //     <div class="single-products-catagory">
                            //         <a href="shop.html">
                            //             <img src="./amado-master/img/bg-img/1.jpg" alt="">
                            //             <div class="hover-content">
                            //                 <div class="line"></div>
                            //                 <p>${instock} </p>
                            //                 <p>${price}</p>
                            //                 <h4>${txtValue}</h4>
                            //             </div>
                            //         </a>
                            //     </div>
                            // `
            } else {
                howercontent[i].style.display = "none";
            }
        }
    }
    //document.getElementById("productArea2").innerHTML = newTableList;

}
