	@if (Session::has('message'))
		<div class="alert alert-success">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('message') }}
		</div>
	@elseif (Session::has('error'))
		<div class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('error') }}
		</div>
	@elseif (Session::has('warning'))
		<div class="alert alert-warning">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    {{ Session::get('warning') }}
		</div>	
	@elseif($errors->any())
		<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>Verifique los siguientes campos:</p>
		<br>
		    <ul>
		    	@foreach($errors->all() as $error)
		    	<li>{{$error}}</li>
		    	@endforeach
		    </ul>
		</div>
	@elseif(Session::get('message_modal'))
		<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header jumbotron-purple div-padding">
						<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
						<h1 class="modal-title text-uppercase text-warning">ALerta!</h1>
						<p><small></small></p>
					</div> 
					<div class="modal-body">
						<h3>{{ Session::get('message_modal') }}</h3>
					</div>
					<div class="modal-footer">
						<table class="table table-bordered">
						<tr>
							<td>
							<div class="col-sm-2"><buttton class="btn btn-success btn-raised" data-dismiss="modal" type="button">ACEPTAR</buttton></div>
							</td>
						</tr>
						</table>
					</div>
				</div>
			</div>
		</div>		
	@endif