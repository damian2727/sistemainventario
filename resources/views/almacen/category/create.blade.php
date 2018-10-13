@extends('layouts.app')
@section('titulo')

	Almacen
@endsection
@section('titulo2')

	Categoria
@endsection
@section('content')
  <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear Categoria</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
            <div class="form-group">
              {!! Form::label('nombre', 'nombre') !!}
              {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required', 'unique'])!!}
              
            </div>

            <div class="form-group">
              {!! Form::label('descripcion', 'Descripcion') !!}
              {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion'])!!}
              
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