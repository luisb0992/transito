<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<span class="size_letra">{{ $operadora->name }}</span>
		<br>
		<em>RIF {{ $operadora->rif_ope }}</em> - <em>{{ $operadora->nameTipo() }}</em>
	</div>
	<div class="panel-body">
		<div class="col-sm-12">
			<div class="text-uppercase list-group-item list-group-item-heading">
				@if(count($operadora->rutas)>0)
					<div class="dropdown">
						<span class="text-success">RUTAS: </span>
						<span class="badge_personal">{{ count($operadora->rutas) }}</span>
						&nbsp;
						<a href="#" class="dropdown-toggle text-primary" 
						data-toggle="dropdown" aria-haspopup="true" 
						aria-expanded="false">
							VER <span class="caret"></span>
                    	</a>
                    	<div class="dropdown-menu">
							@foreach($operadora->rutas as $rutas)
								<a href="{{ url('/rutas/'.$rutas->id) }}" 
								class="list-group-item list-group-item-heading">
								{{ $rutas->name }}
								</a>
							@endforeach
						</div>
					</div>
				@else
					<span class="text-success">RUTAS: </span>
					<span class="badge_personal">{{ count($operadora->rutas) }}</span>
					&nbsp;
					@if(Auth::user()->perfil_id == 2)
					<a href="{{ url('/rutas/create') }}" 
						class="btn-padding text-primary btn-link">
							<i class="fa fa-bus"></i> Asignar
					</a>
					@endif
				@endif
			</div>
		</div>
		<div class="col-sm-7">
			<p class="text-uppercase list-group-item list-group-item-heading">
				<span class="text-success">Representante: </span> 
				<span>{{ $operadora->representante }}</span>
				<br><br>
				<span class="text-success">CEDULA: </span>
				<span>{{ $operadora->ci_rif }}</span> 
			</p>
		</div>
		<div class="col-sm-5">
			<p class="text-uppercase list-group-item list-group-item-heading">
				<span class="text-success">FECHA DE CREACION: </span>
				<span>{{ $operadora->forCreated() }}</span>
				<br><br>
				<span class="text-success">VEHICULOS ADSCRITOS: </span>
				<span class="badge_personal">{{ count($operadora->vehiculos) }} 
					@if(count($operadora->vehiculos) > 0)
					<span class="pull-right text-primary">
						<a href="{{ url('/operadoras/'.$operadora->id) }}">Vista Detallada</a>
					</span>
					@endif
				</span>
			</p>
		</div>
		<div class="col-sm-12"><p></p></div>
		@if(Auth::user()->perfil_id == 2)
			<div class="col-sm-12">
				<p class="text-uppercase div-footer-botonera div-padding">
					<a href="{{ url('/operadoras/'.$operadora->id.'/edit') }}" class="btn-link text-warning">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						EDITAR
					</a>
				</p>
			</div>
		@endif
	</div>
</div>