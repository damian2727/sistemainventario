@extends('layouts.app')
@section('titulo')

	<a href="{{ route('purchase.index') }}">Compras</a>
@endsection
@section('titulo2')

	Lista Articulos
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
          <a href="{{ route('purchase.create') }}" class="btn btn-info">Crear nuevo Compra</a><br>
          @include('partials.searchart')
          	<table class="table" style="margin-left: 2em;">
          		<thead class="thead-light">
          			<th>Id</th>
          			<th>Fecha</th>
                <th>Proveedor</th>
                <th>Factura</th>
                <th>Impuesto</th>
                <th>Total</th>
          			<th>Estado</th> 
                <th>Opciones</th>   
          		</thead>
          		<tbody>
          			@foreach($purchases as $pur)
                 
          				<tr>
                    <td>{{ $pur->id }}</td>
          					<td>{{ $pur->created_at }}</td>
                    
                    <td>{{ $pur->nombre }}</td>
          					<td>{{ $pur->tipofacturta. ': ' .$pur->numerofactura }}</td>
                  
                  
                   <td>{{ $pur->impuesto }} </td>
                   <td>{{ $pur->total }} </td>
                    <td>
                     {{ $pur->estado }}

                    </td>
          					<td><a href="" data-target="#modal-delete-{{$pur->id}}" data-toggle="modal" class="btn btn-danger"><button class=""><i class="fas fa-eraser"></i></button></a> <a href="" class="btn btn-warning"><button></button><i class="fas fa-edit"></i></a></td>
          				</tr>
                 
          			@endforeach

          		</tbody>      		
          	</table>{!! $purchases->render() !!}

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