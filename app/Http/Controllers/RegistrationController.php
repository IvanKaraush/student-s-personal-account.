<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Contact;

class RegistrationController extends Controller
{


public function Array($email = '')
{
  $db = DB::table('contacts')->get();

  foreach($db as $el)
  {
     if($email == $el->email)
     {

       return "exist";
     }

   }
}

public function send_to_db(Request $req)
{

          $validate = $req->validate([
          'email' => 'required',
          'password' => 'required|min:6|max:20',
          'FIO' => 'required',
          'date' => 'required'
        ]);
$email = $req->input('email');
  $db = DB::table('contacts')->get();
        if(count($db) == 0)
        {
          $contact = new Contact();

          $contact->email = $req->input('email');
          $contact->name = $req->input('FIO');
          $password = md5($req->input('password'));

          $contact->password = $password;

          $contact->about_me = 'Ничего не указано';
          if($req->input('male'))
          {
            $contact->orient = 'Мужчина';
          }
          if($req->input('female'))
          {
            $contact->orient = 'Женщина';
          }

          $contact->date = $req->input('date');
          $contact->from = $req->input('from');
          $contact->save();

          $cookie_name = 'email';
          $cookie_value = $email;
          setcookie($cookie_name, $cookie_value);

          $cookie_name_2 = 'name';
          $cookie_value_2 = $req->input('FIO');
          setcookie($cookie_name_2, $cookie_value_2);

          return redirect()->route('profile')->with('Sucsess');
        }



$data = RegistrationController::Array($email);

  if($data == 'exist')
  {
    echo "Такой email уже существует";
  }
  else
  {
    $contact = new Contact();

    $contact->email = $req->input('email');
    $contact->name = $req->input('FIO');
    $password = md5($req->input('password'));

    $contact->password = $password;

    $contact->about_me = 'Ничего не указано';
    if($req->input('male'))
    {
      $contact->orient = 'Мужчина';
    }
    if($req->input('female'))
    {
      $contact->orient = 'Женщина';
    }

    $contact->date = $req->input('date');
    $contact->from = $req->input('from');
    $contact->save();

    $cookie_name = 'email';
    $cookie_value = $email;
    setcookie($cookie_name, $cookie_value);

    $cookie_name_2 = 'name';
    $cookie_value_2 = $req->input('FIO');
    setcookie($cookie_name_2, $cookie_value_2);

    return redirect()->route('profile')->with('Sucsess');

  }

    }

}
