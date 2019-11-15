<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Data;
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
        DB::insert("
            insert into cart
            values ('$request->orderNumber','$request->productCode','$request->qty')
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
    public function order(Request $request){
        $product = DB::select('select * from cart');
        //$customer = DB::select("select * from customers where customerNumber like '$request->search'");

        return view('cart',['product'=>json_encode($product)]);
    }
    public function getAddress(Request $request){
        $address = DB::select("select * from addresses where customerNumber like '$request->search'");
        return json_encode($address);
    }
    public function successOrder(Request $request){
        DB::delete('delete from cart');
        DB::insert("
            insert into orders(orderNumber, orderDate, status, customerNumber, addressNumber)
            value ($request->orderNumber, $request->orderDate, 'default',$request->customerNumber, $request->addressNumber )
        ");
    }
    public function addOrderDetail(Request $request){
        DB:: insert("
            insert into orderdetails
            value ($request->orderNumber, $request->productCode, $request->qty, $request->price, $request->orderLineNumber)
        ");
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
            return view('/welcome',['userDetail'=>json_encode($employeeDetail)]);
        }
        else
        {
            return redirect ('/')-> with('alert', 'wrong username or password');
        }

    }
    public function insertProduct(Request $request){
        DB::insert("insert into products(productName,productCode,productLine,productScale,productVendor,productDescription,quantityInstock,buyPrice,MSRP)
        values ('$request->pname','$request->pcode','$request->pline','$request->pscale','$request->pvendor','$request->pdes','$request->pnumber','$request->pprice','$request->pmsrp')");
        DB::insert("insert into stock(stockNumber,stockDate,productCode,qty)
        values ('$request->snum',strftime('%Y-%m-%d',date('now')),'$request->pcode','$request->pnumber')");
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

    public function deleteProduct($code){
        $data = DB::select("delete from products where productCode = '$code'");
    }

    public function shipping(){
        $Order = DB::select('select * from orders');
        $jsonOrder = json_encode($Order);
        return view('shipping',['jsonOrder'=>$jsonOrder]);
    }

    public function promotion(){
        $Order = DB::select('select * from orders');
        $jsonOrder = json_encode($Order);
        return view('promotion',['jsonOrder'=>$jsonOrder]);
    }
}

