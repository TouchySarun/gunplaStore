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
    
    public function employeeInfo(Request $request){
        $data = DB::select("select * from employees where employeeNumber = '$request->showUser'");
        $jsonEmployee = json_encode($data);
        return view('welcome',['jsonEmployee'=>$jsonEmployee]);
    }
    
    public function mnproduct(){
        $data = DB::select('select * from products');
        $distinctvendor = DB::select('select distinct productVendor from products');
        $distinctscale = DB::select('select distinct productScale from products');
        $jsonProduct = json_encode($data);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);

        return view('manage-product',['jsonProduct'=>$jsonProduct, 'jsonVendor'=>$jsonVendor, 'jsonScale'=>$jsonScale]);
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
            insert into cart(orderNumber,orderLineNumber,productCode,priceEach,qty)
            values ('$request->orderNumber','$request->Name','$request->productCode','$request->price','$request->qty')
        ");
        $data = DB::select('select * from cart');
        $jsonProduct = json_encode($data);
        return $jsonProduct;
    }
    public function order(Request $request){
        $product = DB::select('select * from cart');
        return view('cart',['product'=>json_encode($product),'jsonCustomer'=> '']);
    }
    public function getAddress($code){
        $address = DB::select("select * from addresses where customerNumber like '$code'");
        return json_encode($address);
    }
    public function successOrder(){
        DB::delete('delete from cart');
        // DB::insert("
        //     insert into orders(orderNumber, orderDate, status, customerNumber, addressNumber)
        //     value ($request->orderNumber, $request->orderDate, 'default',$request->customerNumber, $request->addressNumber )
        // ");
        return view('welcome');
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
    //     return view('checkout', ['jsonCustomer' => $jsonCustomer]);
    // }
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
        // $data = DB::select("select employeeNumber from employees");
        // $ans= '';
        // foreach($data as $a){
        //     $x = sha1($a->employeeNumber);
        //     DB::insert("insert into passwords values ($a->employeeNumber, '$x')");
        //     $ans ++;
        // }
        // return redirect ('/')-> with('alert', success);

    }
    
    // public function insertProduct(Request $request){
    //     DB::insert("insert into products(productName,productCode,productLine,productScale,productVendor,productDescription,quantityInstock,buyPrice,MSRP)
    //     values ('$request->pname','$request->pcode','$request->pline','$request->pscale','$request->pvendor','$request->pnumber','$request->pprice','$request->pmsrp','$request->pdes')");
    //     $data = DB::select('select * from products');
    //     $jsonProduct = json_encode($data);
    //     return $jsonProduct;
    // }

    // public function insertEm(Request $request){
    //     DB::insert("insert into employees(employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle)
    //     values ('$request->enumber','$request->elname','$request->efname','$request->eex','$request->eemail','$request->ecode','$request->ere','$request->ejob')");
    //     $data = DB::select('select * from employees');
    //     $jsonProduct = json_encode($data);
    //     return $jsonProduct;
    // }
    // public function editProduct($code){
    //     $jdata = DB::select("select * from products where productCode = '$code'");
    //     $jsoneditProduct = json_encode($jdata);
    //     return $jsoneditProduct;
    // }
    // public function updateProduct(Request $request,$code){
    //     DB::update("update products set productName = ?,productScale = ?,productVendor = ?,productDescription = ?,quantityInstock = ?,buyPrice = ? where productCode = ?",
    //     [$request->pname,$request->pscale,$request->pvendor,$request->pdes,$request->pnumber,$request->pprice,$code]);
    //     $data = DB::select('select * from products');
    //     $jsonProduct = json_encode($data);
    //     return $jsonProduct;
    // }
    // public function updateEm(Request $request,$code){
    //     DB::update("update employees set lastName = ?,firstName = ?,extension = ?,email = ?,officeCode = ?,reportsTo = ?,jobTitle = ? where employeeNumber = ?",
    //     [$request->eln,$request->efn,$request->ee,$request->eem,$request->eof,$request->er,$request->ej,$code]);
    //     $data = DB::select('select * from employees');
    //     $jsonProduct = json_encode($data);
    //     return $jsonProduct;
    // }

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

    public function stock(Request $request){
        $employeejob = DB::select("select employeeNumber from employees where jobTitle like '%Sales%'");
        $jsonem = json_encode($employeejob);
        return $jsonem;
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
}

