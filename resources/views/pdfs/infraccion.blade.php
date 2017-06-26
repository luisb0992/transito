@include('layouts.pdf')

<!--........ div principal de contenido.......-->		
<div class="text-center" style="font-size: 12px;">

		<!--......... Membrete o header ............-->
		<div class="row">
			 <div class="col-xs-2">
				<!-- <img src="{{ asset('img/principal.png') }}" alt="logo" width="140" height="150" class="pull-left"> -->
			</div> 
			<div class="col-xs-6 text-center">
				<p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
				<p>ALCALDIA BOLIVARIANA DEL MUNICIPIO SUCRE</p>
				<p>CAGUA ESTADO ARAGUA</p>
				<p>DIRECION DE TRANSITO Y VIALIDAD</p>
				<p><b>REGISTRO DE OPERADORAS DE TRANSPORTE (MODALIDAD URBANA)</b></p>
			</div>
			<div class="col-xs-2">
				<img src="{{ asset('img/principal.png') }}" alt="logo" width="140" height="150" class="pull-right">
			</div>
			<div class="col-xs-2"></div>
		</div>

		<!--..... cabecera secundaria de info de operadora-->
		<table class="table table-bordered">
			<tr>
				<td>
					<span><b>OPERADORA: </b></span>
					<span>{{ $infraccion->vehiculo->operadora->name }}</span>
					<br>
					<span><b>RIF: </b></span>
					<span>{{ $infraccion->vehiculo->operadora->rif_ope }}</span>
				</td>
				<td>
					<span><b>REPRESENTANTE: </b></span>
					<span>{{ $infraccion->vehiculo->operadora->representante }}</span>
					<br>
					<span><b>C.I/RIF: </b></span>
					<span>{{ $infraccion->vehiculo->operadora->ci_rif }}</span>
				</td>
				<td>
					<span><b>PROPIETARIO: </b></span>
					<span>
						{{ $infraccion->vehiculo->propietarios->persona->name}}
						{{ $infraccion->vehiculo->propietarios->persona->ape}}
					</span>
					<br>
					<span><b>C.I/RIF: </b></span>
					<span>{{ $infraccion->vehiculo->propietarios->persona->ci_rif}}</span>
				</td> 
			</tr>
		</table>

		<table class="table table-bordered">
			<tr>
				<td>
					<p class="text-center h1_padding fondo_gris"><b>CONDUCTOR(ES)</b></p>
						@if(count($infraccion->vehiculo->conductores) > 0)
						@foreach($infraccion->vehiculo->conductores as $conductores)
							<div>
								<span>
									{{ $conductores->persona->name}}
									{{ $conductores->persona->ape}}
								</span>&nbsp;
								<span><b>C.I/RIF: </b></span>
								<span>{{ $conductores->persona->ci_rif}}</span>
								@if($conductores->statusActual($conductores->pivot->conductor_id, $conductores->pivot->vehiculo_id) == 1)
								<span class="text-right text-primary text-capitalize">Conductor Actual</span>
								@endif
						@endforeach
						</div>
						@else
						<div class="text-center">
							<span class="text-danger text-capitalize text-center">ninguno asignado</span>
						</div>
						@endif
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>PLACA</b></p>
					<span>{{ $infraccion->vehiculo->placa }}</span>
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>SERIAL</b></p>
					<span>{{ $infraccion->vehiculo->serial }}</span>
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>MARCA</b></p>
					<span>{{ $infraccion->vehiculo->nameMarca() }}</span>
				</td>
			</tr>
			<tr>
				<td>
					<p class="h1_padding fondo_gris text-center"><b>COLOR</b></p>
					<span>{{ $infraccion->vehiculo->nameColor() }}</span>
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>AÑO</b></p>
					<span>{{ $infraccion->vehiculo->año }}</span>
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>CAPACIDAD</b></p>
					<span>{{ $infraccion->vehiculo->capacidad }} Pasajeros</span>
				</td>
				<td class="text-center">
					<p class="h1_padding fondo_gris"><b>STATUS</b></p>
					<span>{{ $infraccion->vehiculo->nameStatus() }}</span>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p class="fondo_gris text-center text-danger h1_padding"><b>INFRACCION</b></p>
					<p class="text-justify">{{ $infraccion->razon }}</p>
				</td>
				<td colspan="1">
					<p class="fondo_gris text-center text-danger h1_padding">FECHA INFRACCION</p>
					<p class="text-center">{{ $infraccion->forCreated() }}</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p></p><br>
					<p></p><br>
					<p></p><br>
					<p></p><br>
					<p class="text-center h1_padding_inverse">SELLO</p>
				</td>
				<td colspan="2">
					<p></p><br>
					<p></p><br>
					<p></p><br>
					<p></p><br>
					<p class="text-center h1_padding_inverse">DIRECTOR(A) TRANSITO Y VIALIDAD</p>
				</td>
			</tr>
		</table> 
</div>
<!-- Cierre del contenido -->	


<!-- Footer con copyright y code Qr -->
<footer class="margin-abajo">
	<div class="row">
		<div class="col-xs-12 text-center">
			<p></p><br>
			<b>¡CHAVEZ VIVE! LA LUCHA SIGUE.</b>
		</div>
	</div>
	<div class="row padding-top-footer">
		<div class="col-xs-3 pull-left">
			<span><b>FECHA: </b></span>
			<span>{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</span>
		</div>
		<div class="col-xs-8 pull-right text-right">
			<span>
				<b>DIRECCION:</b> Calle Bolivar, C.C Stapleton nivel messanina, 
				frente a la Plaza Sucre, Cagua Estado Aragua
			</span> 
		</div>
		<div class="col-xs-1"></div>
	</div>
</footer>
<!-- Fin del Footer -->

</body>
</html>

