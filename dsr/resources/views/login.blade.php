<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


<link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
<link rel="manifest" href="/fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <title>PHP Workshop - Daily Status Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       <form method="POST" action="{{ route('login') }}">
                       @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" id="email" name="email" type="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" value="Remember Me"> {{ __('Remember Me') }}
                                        
                                        
                                    </label>
                                </div>

<!--
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
-->                                                        
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit"  class="btn btn-lg btn-success btn-block">
                                    {{ __('Login') }}
                                </button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
