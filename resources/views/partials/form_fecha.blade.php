{!! Form::open(['url' => $url, 'method' => $method,'class' => 'form-inline']) !!}
		<div class="div-padding text-left">
			<label class="" for=""><span class="white-text">Operadora</span></label>
			<select name="operadora" class="text-negrita input-sm" required style="background-color: #fff;">
				<option value="">Seleccione una Operadora...</option>
				@foreach($operadoras as $operadora)
					<option value="{{ $operadora->id }}">{{ $operadora->name }}</option>
				@endforeach
			</select>

			<label class="" for="from"><span class="white-text">Desde</span></label>
			<input type="text" class="material-input text-negrita" id="from" name="from" required>

			<label class="" for="to"><span class="white-text">Hasta</span></label>
			<input type="text"  class="material-input text-negrita" id="to" name="to" required>

			<button type="submit" class="btn btn-primary btn-raised"><span class="white-text">Buscar</span></button>
		</div>
{!! Form::close() !!}