@extends('layouts.app')
@section('titulo')

	<a href="{{ route('articles.index') }}">Articulos</a>
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
          <a href="{{ route('articles.create') }}" class="btn btn-info">Crear nuevo Usuario</a><br>
          @include('partials.searchart')
          	<table class="table" style="margin-left: 2em;">
          		<thead class="thead-light">
          			<th>Codigo Barras</th>
          			<th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>categoria</th>
          			<th>estado</th>    
          		</thead>
          		<tbody>
          			@foreach($articles as $article)
                 
          				<tr>
                    <td>{{ $article->codigobar }}</td>
          					<td>{{ $article->nombre }}</td>
                    
                    <td>{{ $article->descripcion }}</td>
          					<td>{{ $article->stock }}</td>
                  
                   <td>{{ $article->categories }} </td>

                    <td>
                     {{ $article->estado }}

                    </td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></a></td>
          				</tr>
                 
          			@endforeach

          		</tbody>      		
          	</table>{!! $articles->render() !!}

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