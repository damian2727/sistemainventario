@extends('layouts.app')
@section('titulo')

Ventas


@endsection
@section('content')
  <section class="content">
  		 \
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="{{ route('sales.index') }}">venta</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-sm" style="width: 25%;">
              {!! Form::label('numerofactura', 'Factura') !!}
              {!! Form::text('numerofactura', null, ['class' => 'form-control', 'placeholder' => 'Factura numero', 'required'])!!}
              
            </div>

            <div class="col-sm" style="width: 20%;">
          
                {!! Form::label('impuesto', 'impuesto', ['class' => '', 'for' => 'inlineFormInputGroup']) !!}
                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">%</div>
        </div>
              {!! Form::text('impuesto', null, ['class' => 'form-control', 'placeholder' => 'impuesto', 'required'])!!}
        
           </div> 
              
            </div>


             <div class="col-sm" style="width: 20%;">
          
                {!! Form::label('totalventa', 'total', ['class' => '', 'for' => 'inlineFormInputGroup']) !!}
                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
              {!! Form::text('totalventa', null, ['class' => 'form-control', 'placeholder' => 'Total Venta', 'required'])!!}
        
           </div> 
              
            </div>
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