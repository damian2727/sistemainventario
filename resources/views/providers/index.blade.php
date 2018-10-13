@extends('layouts.app')
@section('titulo')

	<a href="{{ route('providers.index') }}">Compras</a>
@endsection
@section('titulo2')

	Lista Proveedores
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
          <a href="{{ route('providers.create') }}" class="btn btn-info">Crear nuevo Usuario</a><br>
          	<table class="table" style="margin-left: 2em;">
          		<thead>
          			<th>Nombre</th>
          			<th>Telefono</th>
                <th>Email</th>
          			<th>Accion</th>    
          		</thead>
          		<tbody>
          			@foreach($providers as $provider)
          				<tr>
          					<td>{{ $provider->nombre }}</td>
          					<td>{{ $provider->telefono }}</td>
                    <td>
                     {{ $provider->email }}
                    </td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></a></td>
          				</tr>
          			@endforeach
          		</tbody>      		
          	</table>{!! $providers->render() !!}

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