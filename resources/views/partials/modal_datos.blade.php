<div class="modal" tabindex="-1" role="dialog" id="personas_edit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase text-warning">Coordenadas</h1>
				<p><small></small></p>
			</div> 
			<div class="modal-body text-left">
				{!! Form::open(['url' => '/coordenadas_rutas/'.$ruta->id, 'method' => 'PUT'])!!}
					<div class="form-group">
						<input type="hidden" name="ruta_id" value="{{ $ruta->id }}">
						<blockquote>
							{{ $ruta->name }}
						</blockquote>
					</div>
					<div class="form-group">
						<label for="">Longitud:</label>
						{!! Form::text('longitud',null, ['class' => 'form-control text-uppercase', 'placeholder' => 'Indique Longitud...']) !!}
					</div>
					<div class="form-group">
						<label for="">Latitud</label>
						{!! Form::text('latitud',null, ['class' => 'form-control text-uppercase', 'placeholder' => 'Indique Latitud...']) !!}
					</div>
					<div class="form-group">
						<div class="pull-right">
							<input class="btn btn-primary btn-raised" type="submit" value="Agregar">
							<buttton class="btn btn-danger btn-raised" data-dismiss="modal" type="button">Cerrar</buttton>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>