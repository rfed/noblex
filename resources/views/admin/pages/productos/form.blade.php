@extends('admin.layouts.app')
	
@section('content')
	
	<div class="tab-pane">
		<div class="portlet box {{ isset($producto) ? 'yellow' : 'blue' }}">

			<div class="portlet-title">
				<div class="caption">
					@isset($producto)
						<i class="fa fa-edit"></i> Editar Producto
					@else
						<i class="fa fa-plus"></i> Agregar Producto
					@endisset
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				<form action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}" method="POST" class="form-horizontal form-row-seperated">
					@csrf

					@isset($producto)
						{{ method_field('PUT') }}
					@endisset

					<div class="form-body">

						<div class="form-group" {{ $errors->first('sku') ? 'has-error' : '' }}>
							<label class="control-label col-md-3">SKU </label>
							<div class="col-md-9">
								<input type="text" name="sku" placeholder="SKU" class="form-control" value="{{ $producto->sku or '' }}" />
								{!! $errors->first('sku', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

						<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
							<label class="control-label col-md-3">Nombre</label>
							<div class="col-md-9">
								<input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ $producto->name or '' }}" />
								{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Marca</label>
							<div class="col-md-9">
								<select name="brand_id" id="brand_id">
									<option value="">Seleccione una marca</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Categoría</label>
							<div class="col-md-9">
								<select name="category_id" id="category_id">
									<option value="">Seleccione una categoría</option>
								</select>
							</div>
						</div>

						<div class="form-group" {{ $errors->first('short_description') ? 'has-error' : '' }}>
							<label class="control-label col-md-3">Descripción corta</label>
							<div class="col-md-9">
								<input type="text" name="short_description" placeholder="Descripción corta" class="form-control" 
								value="{{ $producto->short_description or '' }}" />
								{!! $errors->first('short_description', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

						<div class="form-group" {{ $errors->first('description') ? 'has-error' : '' }}>
							<label class="control-label col-md-3">Descripción</label>
							<div class="col-md-9">
								<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $producto->short_description or '' }}</textarea>
								{!! $errors->first('description', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Activo</label>
							<div class="col-md-9">
								<input type="checkbox" checked class="make-switch" id="test" data-size="small">
								{!! $errors->first('active', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Archivos: </label>
							<div class="col-md-9">
								<input type="file" class="form-control" id="file" multiple>
								{!! $errors->first('file', '<span class="help-block"> :message </span>') !!}
							</div>
						</div>

					</div>

					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn {{ isset($producto) ? 'yellow' : 'blue' }}">
                                    <i class="fa fa-check"></i> {{ isset($producto) ? 'Editar' : 'Agregar' }}
                                </button>

								<a href="{{ route('productos.index') }}" type="button" class="btn default">Volver</a>

							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection