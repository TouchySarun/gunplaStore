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

    public function editProduct($code){
        $jdata = DB::select("select * from products where productCode = '$code'");
        $jsoneditProduct = json_encode($jdata);
        return $jsoneditProduct;
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

    public function order(){
        $data = DB::select('select * from products');
        $distinctvendor = DB::select('select distinct productVendor from products');
        $distinctscale = DB::select('select distinct productScale from products');
        $jsonProduct = json_encode($data);
        $jsonVendor = json_encode($distinctvendor);
        $jsonScale = json_encode($distinctscale);

        return view('cart',['jsonProduct'=>$jsonProduct]);
    }

    public function checkout(){
        $data = DB::select('select * from customers');
        $jsonCustomer = json_encode($data);

        return view('checkout', ['jsonCustomer' => $jsonCustomer]);
    }

    public function viewTest(){
        $data = DB::select('select * from products where productCode = "S10_1768"');
        $jsonProduct = json_encode($data);

        return $jsonProduct;
    }

    public function login(Request $request)
    {
        // $a = '';
        // foreach ($data as $a) {
        //     # code...
        //     $x = sha1($a->employeeNumber);
        //     DB::insert("insert into passwords(employeeNumber, password)
        //     values ('$a->employeeNumber','$x')");
        // }
        // $data = DB::select("select *from passwords");
        // $jdata = json_encode($data);
        // return redirect ('/')-> with('alert',$jdata);
        $x = sha1($request->psw);
        $employeekey = DB::select("select * from passwords where employeeNumber like '$request->uname' and password like '$x'");
        if($employeekey != null)
        {
            // return redirect ('/welcome');
            return redirect ('/welcome');
        }
        else
        {
            return redirect ('/')-> with('alert', 'wrong username or password');
        }

    }

    public function insertProduct(Request $request){
        DB::insert("insert into products(productName,productCode,productLine,productScale,productVendor,productDescription,quantityInstock,buyPrice,MSRP)
        values ('$request->pname','$request->pcode','$request->pline','$request->pscale','$request->pvendor','$request->pnumber','$request->pprice','$request->pmsrp','$request->pdes')");
        return 0;
    }

    public function updateProduct(Request $request,$code){
        DB::update("update products set productName = ?,productScale = ?,productVendor = ?,productDescription = ?,quantityInstock = ?,buyPrice = ? where productCode = ?",
        [$request->pname,$request->pscale,$request->pvendor,$request->pdes,$request->pnumber,$request->pprice,$code]);
        return 0;
    }

    public function deleteProduct($code){
        $data = DB::select("delete from products where productCode = '$code'");
        return 'success';
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

