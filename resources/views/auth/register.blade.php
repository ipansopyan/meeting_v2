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
    <form method="POST" action="{{ route('register') }}">
      @csrf
        <input placeholder="name" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>
        @if ($errors->has('name'))
                {{ $errors->first('name') }}
        @endif

        <input placeholder="email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
        @if ($errors->has('email'))
                {{ $errors->first('email') }}
        @endif

      <input placeholder="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
      @if ($errors->has('password'))
              {{ $errors->first('password') }}
      @endif
      <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" >

      <button>login</button>
      <p class="message">alredy account? <a href="{{ url('/') }}">login</a></p>
    </form>
  </div>
</div>
  </body>
</html>
