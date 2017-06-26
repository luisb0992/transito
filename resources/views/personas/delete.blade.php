<button type="submit" value="" class="btn btn-danger" data-toggle="modal" data-target="#mymodal">
		<i class="fa fa-trash" aria-hidden="true"></i>
		ELIMINAR
</button>
{!! Form::open(['url' => '/propietarios/'.$propietario->id, 'method' => 'DELETE']) !!}
	<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<p class="text-warning text-center">
						<i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i>
					</p>
					<h3>
						<p class="text-warning text-center">
						SI ELIMINA ESTE PROPIETARIO TODOS SUS VEHICULOS ASIGNADOS TAMBIEN SERAN ELIMINADOS
						</p>
					</h3>
					<br>
					<h4>	
						SEGURO DESEA ALIMINAR?
					</h4>
				</div>
				<div class="modal-footer">
					<buttton class="btn btn-danger" data-dismiss="modal" type="button">NO</buttton>
					<input class="btn btn-primary" type="submit" value="ELIMINAR">
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}