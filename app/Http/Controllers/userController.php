<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //user website home page
    public function userHomePage(){
        return view('user.website.home');
    }

    //user account page
    public function userAcc(){
        return view('user.website.account');
    }

    //user account pfp update
    public function userpfpUpdate($id,Request $request){
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        //for image
        if($request->hasFile('image')){
            $dbImage = User::where('id',$id)->first();
            $dbImage = $dbImage->image;

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($dbImage != null){
                Storage::delete('public/',$dbImage);
            }
        }

        User::where('id',$id)->update($data);
        return back()->with(['updateSuccess' => 'Your account was updated successfully.']);
    }

    // user account password change page
    public function changePassPage(){
        return view('user.website.changePass');
    }

    //password change
    public function changePass(Request $request){
        $this->passValidationCheck($request);

        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHashValue = $user->password;

        if(Hash::check($request->oldPassword, $dbHashValue)){
            $data = ['password'=>Hash::make($request->newPassword)];
            User::where('id',$currentUserId)->update($data);
            return back()->with(['changeSuccess'=>'You updated your password successfully']);
        }
        return back()->with(['notMatch'=>'The oldPassword is not match. Try again!']);
    }

    //about us page
    public function aboutPage(){
        return view('user.aboutUs.about');
    }

    //product list page
    public function productList(){
        $products = products::orderBy('id','asc')->get();
        $category = category::get();
        return view('user.product.list',compact('products','category'));
    }

    //product fliter
    public function productFliter($categoryId){
        $products = products::where('category_name',$categoryId)->orderBy('created_at','desc')->get();
        $category = category::get();
        return view('user.product.list',compact('products','category'));
    }

    //cart list
    public function cartList(){
        return view('user.cart.list');
    }

    //deatail view
    public function detailView($id){
        $products = products::where('id',$id)->first();
        $productList = products::get();

        // Get the viewed products from the session or initialize an empty array
        $viewProduct = session()->get('viewProduct', []);

        // Initialize an empty array if it's not already an array
        if (!is_array($viewProduct)) {
            $viewProduct = [];
        }

        // Check if the post ID exists in the viewProduct array
        if (!in_array($products->id, $viewProduct)) {
            // Increment the view count only if the product hasn't been viewed in this session
            $products->increment('view_count');

            // Add the post ID to the list of vieweProduct in the current session
            $viewProduct[] = $products->id;

            // Update the session data with the new viewProduct array
            session(['viewProduct' => $viewProduct]);
        }

        return view('user.product.view',compact('products','productList'));
    }

    //request user data
    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }

    //account validation check
    private function accountValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required' ,
            'email' => 'required' ,
            'phone' => 'required' ,
            'gender' => 'required' ,
            'image' => 'mimes:png,jpg,jpeg,webp,avif|file' ,
            'address' => 'required' ,
        ])->validate();
    }

    //password validation check
    private function passValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6|max:10',
            'newPassword' => 'required|min:6|max:10',
            'confirmPassword' => 'required|min:6|max:10|same:newPassword'
        ])->validate();
    }
}
