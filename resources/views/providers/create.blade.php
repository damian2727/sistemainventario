@extends('layouts.app')
@section('titulo')

Compras


@endsection
@section('content')
  <section class="content">
  		 \
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="{{ route('providers.index') }}">Proveedores</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => 'providers.store', 'method' => 'POST']) !!}
          	<div class="form-group">
          		{!! Form::label('nombre', 'nombre') !!}
          		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required'])!!}
          		
          	</div>

            <div class="form-group">
              {!! Form::label('documento', 'Documento') !!}
              {!! Form::text('documento', null, ['class' => 'form-control', 'placeholder' => 'Documento', 'required'])!!}
              
            </div>

            <div class="form-group">
              {!! Form::label('direccion', 'Direccion') !!}
              {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Direccion', 'required'])!!}
              
            </div>

          	<div class="form-group">
          		{!! Form::label('email', 'Email') !!}
          		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required'])!!}
          		
          	</div>
          <div class="form-group">
              {!! Form::label('telefono', 'Telefono') !!}
              {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Telefono', 'required'])!!}
              
            </div>
          
          	<div class="form-group">
          		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
          		
          		
          	</div>
          {!! Form::close() !!}
          		
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
@endsection
