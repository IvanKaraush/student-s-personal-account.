<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function about(Request $req)
   {

     $db = DB::table('contacts')->get();
     foreach($db as $el)
     {
       if($el->email == $_COOKIE["email"])
       {
         DB::table("contacts")->where('id', "=", $el->id)->
         update(['about_me' => $req->input('about_me')]);
         return redirect()->route('profile')->with('Sucsess');
       }
     }
   }

}
