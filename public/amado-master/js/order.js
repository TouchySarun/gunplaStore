var Order = new Array();
var orderIndex = 0;
function AddToOrder(pdCode, price, num){
    console.log(pdCode);
    console.log(num);
    Order[orderIndex] = `{"productCode":${pdCode},"price":${price},"qty":${num}}`;
}

function GetOrder(){
    return JSON.parse(Order);
}
