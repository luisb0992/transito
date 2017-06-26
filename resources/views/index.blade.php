@extends('layouts.index')
@section('content')
	<div class="white div-login col-sm-4 col-sm-offset-4 login-centrado col-xs-12" align="left">
		<div class="col-sm-12">
			<img src="{{ asset('img/logo_nav.png') }}" alt="login" width="100%" height="100%" class="img-resposive">
			<h3 class="text-center text-danger"><em>Cagua - Estado Aragua</em></h3>
		</div>
			<div class="panel-body">
					<div class="col-sm-12">
						<form role="form" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="col-md-12">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo.....">
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="col-sm-12">
									<input id="password" type="password" class="form-control" name="password" required placeholder="Clave.....">

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<br><br><br>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-danger btn-block">
										Login
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
@endsection
