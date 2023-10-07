<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    //product list
    public function productList(){
        $products = products::when(request('key'),function($query){
                                $query->orWhere('name','like','%'.request('key').'%')
                                      ->orWhere('category_name','like','%'.request('key').'%');
                                })
                                ->orderBy('id','desc')->paginate(5);
        return view('admin.product.list',compact('products'));
    }

    //product create page
    public function createPage(){
        $categories = category::select('name')->get();
        return view('admin.product.create',compact('categories'));
    }

    //product create
    public function productCreate(Request $request){
        $this->productValidationCheck($request,"create");
        $data = $this->getProductData($request);

        $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public',$fileName);
        $data['image'] = $fileName;

        products::create($data);
        return redirect()->route('product#list');
    }

    //product view
    public function productView($id){
        $products = products::where('id', $id)->first();
        return view('admin.product.view', compact('products'));
    }

    //product edit page
    public function productEdit($id){
        $products = products::select('products.*')
                            ->leftJoin('categories','products.category_name','categories.id')
                            ->where('products.id',$id)->first();
        $categories = category::get();
        return view('admin.product.edit',compact('products','categories'));
    }

    //product update
    public function productUpdate(Request $request){
        $this->productValidationCheck($request,"update");
        $data = $this->getProductData($request);

        if($request->hasFile('productImage')){
            $oldImage = products::where('id',$request->productId)->first();
            $oldImage = $oldImage->image;

            $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($oldImage != null){
                Storage::delete('public/',$oldImage);
            }
        }

        products::where('id',$request->productId)->update($data);
        return back()->with(['updateSuccess'=>'Updated product info successfully ...']);
    }

    //product delete
    public function productDelete($id, Request $request){
        $data = $this->getProductData($request);
        products::where('id',$id)->delete($data);
        return back()->with(['deleteSuccess'=>'Deleted product successfully ...']);
    }

    //get product data
    private function getProductData($request){
        return [
            'category_name' => $request->productCategory,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
            'waiting_time' => $request->productWaitingTime
        ];
    }

    //product validation check
    private function productValidationCheck($request,$action){
        $validationRules = [
            'productName' => 'required|unique:products,name,'.$request->productId,
            'productCategory' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required',
            'productWaitingTime' => 'required'
        ];

        $validationRules['productImage'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,avif,webp|file' : 'mimes:png,jpg,jpeg,avif,webp|file';

        Validator::make($request->all(),$validationRules)->validate();
    }
}
