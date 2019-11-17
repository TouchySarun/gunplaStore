<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Data;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = DB::select('select * from products');
        $distinctvendor = DB::select('select distinct productVendor from products');
        $distinctscale = DB::select('select distinct productScale from products');
        $jsonProduct = json_encode($data);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);
        return view('index',['jsonProduct'=>$jsonProduct, 'jsonVendor'=>$jsonVendor, 'jsonScale'=>$jsonScale]);
    }
    public function mnproduct(){
        $data = DB::select('select * from products');
        $datastock = DB::select('select * from stock');
        $jsonProduct = json_encode($data);
        $jsonstock = json_encode($datastock);
        return view('manage-product',['jsonProduct'=>$jsonProduct, 'jsonstock'=>$jsonstock]);
    }
    public function mnorder(){
        $data = DB::select('select * from products');
        $distinctvendor = DB::select('select distinct productVendor from products');
        $distinctscale = DB::select('select distinct productScale from products');
        $jsonProduct = json_encode($data);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);

        return view('manage-order',['jsonProduct'=>$jsonProduct, 'jsonVendor'=>$jsonVendor, 'jsonScale'=>$jsonScale]);
    }
    public function mnemployee(){
        $employee = DB::select('select * from employees');
        $jsonEmployee = json_encode($employee);

        return view('manage-employee',['jsonEmployee'=>$jsonEmployee]);
    }
    public function insertToCart(Request $request){
        $x = DB::select("select qty from cart where productCode ='$request->productCode'");
        if($x != null){
            $y = $x[0]->qty+$request->qty;
            DB::update("update cart set qty = $y where productCode = '$request->productCode'");
            // return json_encode($y);
        }else{
            DB::insert("
                insert into cart(orderNumber,orderLineNumber,productCode,priceEach,qty)
                values ('$request->orderNumber','$request->Name','$request->productCode','$request->price','$request->qty')
            ");
        }
        $data = DB::select('select * from cart');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }
    public function deleteCart(){
        DB::delete('delete from cart');
    }
    public function editProduct($code){
        $jdata = DB::select("select * from products where productCode = '$code'");
        $jsoneditProduct = json_encode($jdata);
        return $jsoneditProduct;
    }
    public function editstatus($code){
        $jdata = DB::select("select * from orders where orderNumber = '$code'");
        $jsoneditstatus = json_encode($jdata);
        return $jsoneditstatus;
    }
    public function order(Request $request){
        $product = DB::select('select * from cart');
        return view('cart',['product'=>json_encode($product),'jsonCustomer'=> '']);
    }

    public function getAddress($code){
        $address = DB::select("select * from addresses where customerNumber like '$code'");
        $point = DB::select("select point from customers where customerNumber like '$code'");
        return [json_encode($address),json_encode($point)];
    }
    public function successOrder(Request $request){
        $OrderNumber = DB::select('select distinct orderNumber from cart ');
        $ProductCode = DB :: select('select distinct productCode from cart ');
        $x = $OrderNumber[0];
        $date = date('Y-m-d',time());
        // $reqdate = $date;
        // date_add(date_interval_create_from_date_string("7 days"),$reqdate);
        // date_modify("+7 days",$reqdate);
        // date_add($redate,date_interval_create_from_date_string("7 days"));
        // $date->modify('+7 day');
         
        DB::insert("
            insert into orders(orderNumber,orderDate,requiredDate, status, customerNumber)
            values ('$x->orderNumber','$date','$request->shippingDate','in progress','$request->customerNumber')
        ");

        $i = 1;
        $j = 1;
        foreach($ProductCode as $P){
            $p = $P->productCode ;
            $Qty = DB::select("select sum(qty) as QTY from cart where productCode like '$p' Group by productCode");
            $pricEach = DB::select("select buyPrice from products where productCode like '$p'");
            // echo $i . " ";   
            // echo $P->productCode . " ";
            $qty = $Qty[0];
            $price = $pricEach[0];
            DB:: insert("
                insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)
                values ('$x->orderNumber','$P->productCode', '$qty->QTY', '$price->buyPrice', '$i')
            ");
            $i = $i + $j;
        }        
        $z = (int)$request->Point;
        
        $Point = DB::select("select point from customers where customerNumber like '$request->customerNumber'");
        $x = $Point[0];
        $y = $x->point;
        $x = $z+$y;

        DB::update("update customers set point =$x where customerNumber like '$request->customerNumber'");
        return $z;
        DB::delete('delete from cart');
        
        // return $jsonProduct;
        return view('welcome');
        // return $ProductCode;
        // return null;
    }
    public function addOrderDetail(Request $request){
        
        
    }

    // public function checkout(){
    //     $data = DB::select("select * from customers");
    //     $jsonCustomer = json_encode($data);

    public function login(Request $request)
    {
        $x = sha1($request->psw);
        $employeekey = DB::select("select * from passwords where employeeNumber like '$request->uname' and password like '$x'");
        if($employeekey != null)
        {
            $employeeDetail = DB::select("select * from employees where employeeNumber = '$request->uname' ");
            $pro = DB::select('select * from promotion');
            $jsonpro = json_encode($pro);
            // $sale = DB::select("select * from employees ");
            return view('/welcome',['userDetail'=>json_encode($employeeDetail),'jsonpro'=>$jsonpro]);
        }
        else
        {
            return redirect ('/')-> with('alert', 'wrong username or password');
        }
        // $data = DB::select("select employeeNumber from employees");
        // $ans= '';
        // foreach($data as $a){
        //     $x = sha1($a->employeeNumber);
        //     DB::insert("insert into passwords values ($a->employeeNumber, '$x')");
        //     $ans ++;
        // }
        // return redirect ('/')-> with('alert', success);
    }
    public function insertProduct(Request $request){
        DB::insert("insert into products(productName,productCode,productLine,productScale,productVendor,productDescription,quantityInstock,buyPrice,MSRP)
        values ('$request->pname','$request->pcode','$request->pline','$request->pscale','$request->pvendor','$request->pdes','$request->pnumber','$request->pprice','$request->pmsrp')");
        DB::insert("insert into stock(stockNumber,stockDate,productCode,qty)
        values ('$request->snum',strftime('%Y-%m-%d',date('now')),'$request->pcode','$request->pnumber')");
        $productl = DB::select("select * from productlines where productLine = $request->pline");
        $data = DB::select('select * from products');
        $datastock = DB::select('select * from stock');
        $jsonProduct = json_encode(array($data,$datastock));
        return $jsonProduct;
    }

    public function insertEm(Request $request){
        DB::insert("insert into employees(employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle)
        values ('$request->enumber','$request->elname','$request->efname','$request->eex','$request->eemail','$request->ecode','$request->ere','$request->ejob')");
        $data = DB::select('select * from employees');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }

    
    public function updatePayment(Request $request){
        DB::insert("
                insert into payments(customerNumber,checkNumber,paymentDate,amount)
                values ('$request->customerNumber','$request->checkNumber','$request->paymentDate','$request->amount')
        ");
        return $request ; 
    }
    
    public function insertpromotion(Request $request){
        DB::insert("insert into promotion(promotionId,promotionCode,qty,detail,expairDate)
        values ('$request->promid','$request->promcode','$request->promnum','$request->promdetail','$request->promdate')");
        $data = DB::select('select * from promotion');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }

    public function updateProduct(Request $request,$code){
        DB::update("update products set productName = ?,productScale = ?,productVendor = ?,productDescription = ?,quantityInstock = ?,buyPrice = ? where productCode = ?",
        [$request->pname,$request->pscale,$request->pvendor,$request->pdes,$request->pnumber,$request->pprice,$code]);
        $data = DB::select('select * from products');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }
    public function updateEm(Request $request,$code){
        DB::update("update employees set lastName = ?,firstName = ?,extension = ?,email = ?,officeCode = ?,reportsTo = ?,jobTitle = ? where employeeNumber = ?",
        [$request->eln,$request->efn,$request->ee,$request->eem,$request->eof,$request->er,$request->ej,$code]);
        $data = DB::select('select * from employees');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }
    public function updateship(Request $request,$code){
        DB::update("update orders set shippedDate = ?,status = ?,comments = ? where orderNumber = ?",
        [$request->shipdate,$request->odstatus,$request->shipcom,$code]);
        $data = DB::select('select * from orders');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }

    public function shipping(){
        $Order = DB::select('select * from orders');
        $jsonOrder = json_encode($Order);
        return view('shipping',['jsonOrder'=>$jsonOrder]);
    }

    public function payment(){
        $Payment = DB::select('select * from payments');
        $jsonPayment = json_encode($Payment);
        return view('payment',['jsonPayment'=>$jsonPayment]);
    }

    public function promotion(){
        $pro = DB::select('select * from promotion');
        $jsonpro = json_encode($pro);
        return view('welcome',['jsonpro'=>$jsonpro]);
    }

    public function deleteProduct($code){
        $data = DB::select("delete from products where productCode = '$code'");
        $data2 = DB::select('select * from products');
        return $data2;
    }

    public function deleteEm($code){
        $data = DB::select("delete from employees where employeeNumber = '$code'");
        $data2 = DB::select('select * from employees');
        return $data2;
    }

    public function Subtotal(){
        
    }
}

