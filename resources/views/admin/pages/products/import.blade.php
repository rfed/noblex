@extends('admin.layouts.app')

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Importar productos desde archivo Excel
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['url' => 'panel/productos/importar', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

						<div class="form-body">

							<div class="note note-info">
			                    <p> Verifique que el archivo posea las columnas y formato aceptados. <a href="{{ url('panel/productos/modelo') }}">Descargue el modelo de importación haciendo click aquí</a> o la <a href="{{ url('panel/productos/guia') }}">guía de importación haciendo click aquí</a>.</p>
			                </div>

							<div class="form-group">
								{!! Form::label('file', 'Archivo Excel', ['class' => 'control-label col-md-3']) !!}
								<div class="col-md-9">
									{!! Form::file('file', ['class' => 'form-control', 'accept' => '.xlsx']) !!}
								</div>
							</div>
							
							<div class="form-actions">
								<div class="row">
									<div class="col-md-12 text-center">
										{!! Form::button('Importar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue']) !!}
										
										<a href="{{ route('admin.productos.index') }}" type="button" class="btn default">Cancelar</a>

									</div>
								</div>
							</div>	

						
						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection