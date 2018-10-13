@extends('layouts.app')
@section('titulo')

	<a href="{{ route('users.index') }}">Usuarios</a>
@endsection
@section('titulo2')

	Lista Ususarios
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
          <a href="{{ route('sale.create') }}" class="btn btn-info">Crear nuevo Ventas</a><br>
          	<table class="table" style="margin-left: 2em;">
          		<thead>
          			<th>numerofactura</th>
          			<th>Impuesto %</th>
                <th>Total Venta $</th>
          			<th>Accion</th>    
          		</thead>
          		<tbody>
          			@foreach($sales as $sale)
          				<tr>
          					<td>{{ $sale->numerofactura }}</td>
          					<td>{{ $sale->impuesto }}</td>
                    <td>
                        {{ $sale->totalventa }}
                    </td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></a></td>
          				</tr>
          			@endforeach
          		</tbody>      		
          	</table>{!! $sales->render() !!}

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