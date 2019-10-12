<?php
<<<<<<< HEAD
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Data;
use Illuminate\Http\Request;
class DataController extends Controller
{
    public function product(){
        $data = DB::select('select * from products ');
        $jsonProduct = json_encode($data);
        return view('product-details',['jsonProduct'=> $jsonProduct]);
    }
}
=======

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = DB::select('select * from products ');
        $jsonProduct = json_encode($data);

        return view('index',['jsonProduct'=> $jsonProduct]);
    }

    public function viewTest(){
        $data = DB::select('select * from products where productCode = "S10_1768"');
        $jsonProduct = json_encode($data);

        return $jsonProduct;
    }

}
>>>>>>> ac887219a65dc49225bc855a8c262eef4d09ef79
