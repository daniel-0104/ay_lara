<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //contact page
    public function contactPage(){
        return view('user.contact.contact');
    }
}
