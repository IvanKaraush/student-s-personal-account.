<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

public function Array($new_email = '')
{
  $db = DB::table('contacts')->get();
  foreach ($db as $el)
  {
     if($el->email == $new_email)
     {
       return 'error';
     }
  }
}

  public function update(Request $req)
  {


    $db = DB::table('contacts')->get();
    $new_email = $req->input('new_email');
    $data = SettingsController::Array($new_email);
    if($data == 'error')
    {
      echo "Такой email уже существует";
    }
    else
    {
    foreach ($db as $el)
    {
          if($el->email == $_COOKIE["email"])
          {
            DB::table('contacts')->where('id', '=', $el->id)->
            update(['email' => $req->input('new_email')]);

            $cookie_name = 'email';
            $cookie_value = $req->input('new_email');
            setcookie($cookie_name, $cookie_value);

            $cookie_name_2 = 'name';
            $cookie_value_2 = $req->input('FIO');
            setcookie($cookie_name_2, $cookie_value_2);

            DB::table('contacts')->where('id', '=', $el->id)->
            update(['name' => $req->input('FIO')]);

            $password = md5($req->input('password'));

            DB::table('contacts')->where('id', '=', $el->id)->
            update(['password' => $password]);

            if($req->input('male'))
            {
              DB::table('contacts')->where('id', '=', $el->id)->
              update(['orient' => 'Мужчина']);
            }

            if($req->input('female'))
            {
              DB::table('contacts')->where('id', '=', $el->id)->
              update(['orient' => 'Женщина']);
            }

            return redirect()->route('settings')->with('Sucsess');
          }
          else
          {
            // $data = $_COOKIE['email'];
            // echo "$data";
          }
}
}

  }
}
