@extends('layouts.app')
@section('titulo')

	Usuarios


@endsection
@section('content')
  <section class="content">
  		 \
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="{{ route('users.index') }}">@yield('titulo')</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
          	<div class="form-group">
          		{!! Form::label('name', 'nombre') !!}
          		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required'])!!}
          		
          	</div>

          	<div class="form-group">
          		{!! Form::label('email', 'Email') !!}
          		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required'])!!}
          		
          	</div>
          	<div class="form-group">
          		{!! Form::label('password', 'Contraseña') !!}
          		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***********', 'required'])!!}
          		
          	</div>
          	<div class="form-group">
          		{!! Form::label('permiso', 'Tipo Usuario') !!}
          		{!! Form::select('permiso', ['' => 'Seleccionar', 'admin' => 'Administrador', 'trabajador' => 'Trabajador'], null , ['class' => 'form-control', 'required'])!!}
          		
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
