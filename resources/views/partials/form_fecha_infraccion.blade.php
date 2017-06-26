<div class="text-peque text-left header-principal">
{!! Form::open(['url' => $url, 'method' => $method,'class' => 'form-inline']) !!}
		<div class="div-padding">
			<label for="from"><span class="white-text">Desde</span></label>
			<input type="text" class="input-sm text-negrita" id="from" name="from" required>

			<label for="to"><span class="white-text">Hasta</span></label>
			<input type="text"  class="input-sm text-negrita" id="to" name="to" required>

			<button type="submit" class="btn btn-primary btn-raised"><span>Buscar</span></button>
		</div>
{!! Form::close() !!}
</div>