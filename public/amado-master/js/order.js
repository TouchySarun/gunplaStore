var Order = new Array();
var orderIndex = 0;
function AddToOrder(orderNumber, pdCode, num ,n){
    console.log(pdCode);
    console.log(orderNumber);
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

    var i = Number(document.getElementById('NumberCart').innerText)
    i = i+Number(num);
    // var b = 'qty'+n;
    console.log(n);
    document.getElementById(n).value = 0;

    document.getElementById('NumberCart').innerText = (i);
}

function GetOrder(){
    return JSON.parse(Order);
}
