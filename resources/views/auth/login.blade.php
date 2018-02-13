<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="{{route('login')}}" >
      {{csrf_field()}}
      <input name="email" type="text" placeholder="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"  autofocus >
      @if ($errors->has('email'))
              {{ $errors->first('email') }}
      @endif
      <input name="password" placeholder="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >
      @if ($errors->has('password'))
              {{ $errors->first('password') }}
      @endif
      <button>login</button>
      <p class="message">Not registered? <a href="{{ route('register') }}">Create an account</a></p>
    </form>
  </div>
</div>
  </body>
</html>
