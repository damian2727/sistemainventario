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
          <h3 class="card-title"><a href="{{ route('articles.index') }}">Articulos</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => ['articles.store'] ,'method' => 'POST']) !!}
          	<div class="form-group">
          		{!! Form::label('codigobar', 'Codigo de Barras') !!}
          		{!! Form::text('codigobar', null, ['class' => 'form-control', 'placeholder' => 'Codigo de Barras', 'required'])!!}
          		
          	</div>

            <div class="form-group">
              {!! Form::label('referencia', 'Referencia') !!}
              {!! Form::text('referencia', null, ['class' => 'form-control', 'placeholder' => 'Referencia', 'required'])!!}
              
            </div>

            <div class="form-group">
              {!! Form::label('nombre', 'Nombre') !!}
              {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required'])!!}
              
            </div>

          	<div class="form-group">
          		{!! Form::label('descripcion', 'Descripcion') !!}
          		{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'required'])!!}
          		
          	</div>
          <div class="form-group">
              {!! Form::label('stock', 'Stock') !!}
              {!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock', 'required'])!!}
              
            </div>

            <div class="form-group">
              {!! Form::label('estado', 'Estado') !!}
              {!! Form::select('estado', ['' => 'Seleccionar', 'activo' => 'Activo', 'inactivo' => 'iInactivo'], ['class' => 'form-control', 'required'])!!}
              
            </div>

            <div class="form-group">
              {!! Form::label('category_id', 'Estado') !!}
              
              {!! Form::select('category_id',  $category->pluck('nombre', 'id')->all(), 1, ['class' => 'form-control']) !!}
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
