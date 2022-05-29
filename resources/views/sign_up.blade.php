<html  lang="ru">
<head>
  <meta name="viewport" content="width=device-width, initial-scale-1.0">
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/app.css">
  <meta name="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
  <body>

    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a  class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="480" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
            </svg>
            <strong>Авторизация</strong>
          </a>
        </div>
      </div>
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
<li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{ route('sign') }}" method="post">
  @csrf
    <div class="input_1"><input name="email" class="form-control me-2"  placeholder="Введите email" aria-label="Search"></div>
    <div class="input_2"><input name="password"class="form-control me-2" type="password" placeholder="Введите пароль" aria-label="Search"></div>
    <div class="sign_up"><button href="/profile" class="btn btn-primary" >Войти</button></div>
</form>
    <div class="sign_in"><a href="/registration">Зарегистрироваться</a></div>
  </body>
</head>
</html>
