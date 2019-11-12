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
        // DB::insert('insert into products (productCode,productName) values (?,?)',[5555,"Touchy"]);
        //DB::delete('delete from products where productName = ?',["Touchy"]);
        $jsonProduct = json_encode($data);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);
        return view('index',['jsonProduct'=>$jsonProduct, 'jsonVendor'=>$jsonVendor, 'jsonScale'=>$jsonScale]);
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

    public function order(Request $request){
        $data = DB::select('select * from products');
        $data2 = DB::select("select * from customers where customerNumber like '$request->search'");
        $distinctvendor = DB::select('select distinct productVendor from products');
        $distinctscale = DB::select('select distinct productScale from products');
        $jsonProduct = json_encode($data);
        $jsonCustomer = json_encode($data2);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);

        return view('cart',['jsonProduct'=>$jsonProduct, 'jsonCustomer'=>$jsonCustomer]);
    }

    // public function checkout(){
    //     $data = DB::select("select * from customers");
    //     $jsonCustomer = json_encode($data);

    //     return view('checkout', ['jsonCustomer' => $jsonCustomer]);
    // }

    public function viewTest(){
        $data = DB::select('select * from products where productCode = "S10_1768"');
        $jsonProduct = json_encode($data);

        return $jsonProduct;
    }

    public function login(Request $request)
    {
        $x = sha1($request->psw);
        $employeekey = DB::select("select * from passwords where employeeNumber like '$request->uname' and password like '$x'");
        $employeeDetail = DB::select("select * from employees where employeeNumber = '$request->uname' ");
        if($employeekey != null)
        {
<<<<<<< HEAD
            return view('/welcome',['userDetail'=>json_encode($employeeDetail)]);
=======
            return redirect ('/welcome');
>>>>>>> 4471b21efff154c635463391bde7275d8417da9f
        }
        else
        {
            return redirect ('/')-> with('alert', 'wrong username or password');
        }

    }

    public function stock(Request $request)
    {
        $employeejob = DB::select("select employeeNumber from employees where jobTitle like '%Sales%'");
        $jsonem = json_encode($employeejob);

        return $jsonem;
    }

<<<<<<< HEAD
    public function insertProduct(Request $request){
        DB::insert("insert into products(productName,productCode,productLine,productScale,productVendor,productDescription,quantityInstock,buyPrice,MSRP)
        values ('$request->pname','$request->pcode','$request->pline','$request->pscale','$request->pvendor','$request->pnumber','$request->pprice','$request->pmsrp','$request->pdes')");
        $data = DB::select('select * from products');
        $jsonProduct = json_encode($data);
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

=======
>>>>>>> 4471b21efff154c635463391bde7275d8417da9f
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

