<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //product sorting
    public function ajaxSorting(Request $request){
        if ($request->status == 'asc') {
            $data = products::orderBy('id','asc')->get();
        } else {
            $data = products::orderBy('id','desc')->get();
        }
        return $data;
    }
}
