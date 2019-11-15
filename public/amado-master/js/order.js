var Order = new Array();
var orderIndex = 0;
function AddToOrder(orderNumber, pdCode, num){
    console.log(pdCode);
    console.log(num);
    var product = {
        "orderNumber": orderNumber,
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
        dataType: "json"
    });
}

function GetOrder(){
    return JSON.parse(Order);
}
