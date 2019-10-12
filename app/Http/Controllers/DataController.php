<?php
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