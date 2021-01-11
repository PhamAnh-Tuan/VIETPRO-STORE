<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<base href="{{asset('')}}backend/">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form action="{{route('login.post')}}" role="form" method="POST">
						@csrf
						<fieldset>
							
							@if(session('error'))
								<div class="alert alert-danger">
									{{session('error')}}
								</div>
							@endif

							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="text" autofocus="">
							</div>
							{!!showError($errors, 'email')!!}
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="form-group">
								<a href="{{route('login.fb')}}" >Login with Facebook</a>
							   </div>
							{!!showError($errors,'password')!!}
							<div class="checkbox">
								<label>
									<input id="remember" name="remember" value="1" type="checkbox">Remember Me
								</label>
							</div>
							<button class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>