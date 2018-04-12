@extends('layouts.app')
	
@section('content')
	
	<div class="tab-pane">
		<div class="portlet box {{ isset($categoria) ? 'yellow' : 'blue' }}">

			<div class="portlet-title">
				<div class="caption">
					@isset($categoria)
						<i class="fa fa-edit"></i> Editar Categoria
					@else
						<i class="fa fa-plus"></i> Agregar Categoria
					@endisset
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				<form action="{{ isset($categoria) ? route('categorias.update', $categoria->id) : route('categorias.store') }}" method="POST" class="form-horizontal form-row-seperated">
					@csrf

					@isset($categoria)
						{{ method_field('PUT') }}
					@endisset

					<div class="form-body">

						<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
							<label class="control-label col-md-3">Nombre</label>
							<div class="col-md-9">
								<input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ $categoria->name or '' }}" />
								{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">URL <small> (Opcional)</small></label>
							<div class="col-md-9">
								<input type="text" name="url" placeholder="URL" class="form-control" value="{{ $categoria->url or '' }}" />
							</div>
						</div>

					</div>

					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn {{ isset($categoria) ? 'yellow' : 'blue' }}">
                                    <i class="fa fa-check"></i> {{ isset($categoria) ? 'Editar' : 'Agregar' }}
                                </button>

								<a href="{{ route('categorias.index') }}" type="button" class="btn default">Volver</a>

							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection