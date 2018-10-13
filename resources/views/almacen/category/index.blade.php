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
          <h3 class="card-title">@yield('titulo')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

        	<a href="{{ route('users.create') }}" class="btn btn-info">Crear nueva Categoria</a><br>

           @include('partials.search')
          
          	<table class="table" style="margin-left: 2em;">
          		<thead>
          			<th>Nombre</th>
          			<th>Descripcion</th>
          			<th>Accion</th>    
          		</thead>
          		<tbody>
          			@foreach($categories as $category)
          				<tr>
          					<td>{{ $category->nombre }}</td>
          					<td>{{ $category->descripcion }}</td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
          				</tr>
          			@endforeach
          		</tbody>      		
          	</table>
         	{!! $categories->render() !!}			
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