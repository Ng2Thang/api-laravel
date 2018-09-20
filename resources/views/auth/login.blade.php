<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login - CodeComplete</title>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>CodeComplete</h1>
    </div>
    <div class="login-box">
      
      <form class="login-form" action="{{ route('login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        
        <div class="form-group">

          <label class="control-label">EMAIL ADDRESS</label>
          
          <input placeholder="Enter your email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('email') }}</strong>
         </span>
         @endif
       </div>
       <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input placeholder="Enter your passwords" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('password') }}</strong>
       </span>
       @endif
     </div>
     <div class="form-group">
      <div class="utility">
        <div class="animated-checkbox">
          <label>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Remember Me</span>
          </label>
        </div>
        <p class="semibold-text mb-2"><a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Password ?') }}
        </a></p>
      </div>
    </div>
    <div class="form-group btn-container">
      <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
    </div>
  </form>
  
</div>
</section>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>

</body>
</html>