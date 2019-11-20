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
    public function mncus(){
        $customer = DB::select('select * from customers');
        $jsoncustomer = json_encode($customer);
        return view('manage-customer',['jsoncustomer'=>$jsoncustomer]);
    }
    public function insertToCart(Request $request){
        DB::insert("
            insert into cart(orderNumber,orderLineNumber,productCode,priceEach,qty)
            values ('$request->orderNumber','$request->Name','$request->productCode','$request->price','$request->qty')
        ");
        $data = DB::select('select * from cart');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }
    public function editProduct($code){
        $jdata = DB::select("select * from products where productCode = '$code'");
        $jsoneditProduct = json_encode($jdata);
        return $jsoneditProduct;
    }

    public function editcus($code){
        $customer = DB::select("select * from customers where customerNumber = '$code'");
        $jsoneditcus = json_encode($customer);
        return $jsoneditcus;
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
        return json_encode($address);
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
            values ('$x->orderNumber','$date','','default','$request->customerNumber')
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
        DB::delete('delete from cart');
        
        // return $jsonProduct;
        return view('welcome');
        // return $ProductCode;
        // return null;
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
        values ('$request->snum',date('now','localtime'),'$request->pcode','$request->pnumber')");
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

    public function insertcus(Request $request){
        DB::insert("insert into customers(customerNumber,customerName,contactLastName,contactFirstName,phone,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit)
        values ('$request->wcusnum','$request->wcompany','$request->wlname','$request->wfname','$request->wphone','$request->wcity','$request->wstate','$request->wpos','$request->wcoun','$request->wsale','$request->wcredit')");
        $data = DB::select('select * from customers');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
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
    public function updatecus(Request $request,$code){
        DB::update("update customers set customerNumber = ?,customerName = ?,contactLastName = ?,contactFirstName = ?,phone = ?,salesRepEmployeeNumber = ?,creditLimit = ?,point = ? where customerNumber = ?",
        [$request->cusnum,$request->cusname,$request->cusfname,$request->cuslname,$request->cusphone,$request->salerep,$request->cuslimit,$request->cuspoint,$code]);
        $data = DB::select('select * from customers');
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

    public function promotion(){
        $data = DB::select("delete from promotion where expairDate = date('now','localtime')");
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

    public function deletecus($code){
        $data = DB::select("delete from customers where customerNumber = '$code'");
        $data2 = DB::select('select * from customers');
        return $data2;
    }

    public function deletepromotion(){
        $data = DB::select("delete from promotion where expairDate = date('now','localtime')");
        // // $data = DB::select("delete from promotion where expairDate = strftime('%Y-%m-%d',date('now'))");
        $data2 = DB::select('select * from promotion');
        return $data2;
    }
}

