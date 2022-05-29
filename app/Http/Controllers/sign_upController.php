<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use DB;
use Illuminate\Http\Request;

class sign_upController extends Controller
{

public function Array($email = '', $password = '')
{
  $db = DB::table('contacts')->get();
  if(count($db) == 0){return 'error_email_exist';}
  foreach($db as $el)
  {
  if($email == $el->email)
  {
    if($password == $el->password)
    {
      $cookie_name = 'email';
      $cookie_value = $email;
      setcookie($cookie_name, $cookie_value);

      $cookie_name_2 = 'name';
      $cookiie_value_2 = $el->name;
      setcookie($cookie_name_2, $cookiie_value_2);
      return 'sucsess';
    }
    else
    {
      return 'error_password';
    }
  }

}
}

public function all_data(Request $req)
{
    $valid = $req->validate([
      'email' => 'required',
      'password' => 'required|min:6|max:20'
    ]);

$email = $req->input('email');

$password = md5($req->input('password'));

$data = sign_upController::Array($email, $password);

if($data == 'error_email_exist')
{
  echo "Такого email не существует";
}
else if($data == 'error_password')
{
  echo "Неправильный пароль ";
}
else
{

   return redirect()->route('profile')->with('Sucsess');
}

}


}
