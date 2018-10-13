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
          <h3 class="card-title"><a href="{{ route('purchase.index') }}">Compra</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => 'purchase.store', 'method' => 'POST', 'autocomplete'=>'off']) !!}
          {{ csrf_field() }}
           <div class="row">
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          	     <div class="form-group">
          		      {!! Form::label('provider_id', 'Proveedor') !!}
          		      {!! Form::select('provider_id',  $providers->pluck('nombre', 'id')->all(), '1', ['id'=>'provider_id','class' => 'form-control selectpicker', 'data-live-search' =>'true', 'required']) !!}
          	     </div>
              </div>
           
              
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                  {!! Form::label('tipofacturta', 'Tipo de Factura') !!}
                  {!! Form::select('tipofacturta', ['' => 'Seleccionar', 'factura' => 'Factura', 'credito' => 'Credito'], null , ['class' => 'form-control', 'required'])!!}
                </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                  {!! Form::label('numerofactura', 'Numero Factura') !!}
                  {!! Form::number('numerofactura', null, ['class' => 'form-control', 'placeholder' => 'Numero', 'required'])!!}
              
                </div>
              </div>
          </div>
          	<div class="row" style="margin-top: 1em;">
              <div class="panel panel-primary" id="de" style="border: all; border-radius: 1em;">
                <div class="panel-body" style="border-color: red; border-radius: 1em;">
                  <div class="row" style=" border-top: dotted; border-radius: 1px;">
                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                       {!! Form::label('article_id', 'Articulos') !!}
                       {!! Form::select('article_id',  $articles->pluck('article','id')->all(), '$value',['class' => 'form-control selectpicker','id'=> 'article_id',  'data-live-search' =>'true', 'required']) !!}
                    </div>
                   
                    
                  </div>
                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      {!! Form::label('cantidad', 'Cantidad') !!}
                      {!! Form::number('pcantidad', null, ['class' => 'form-control','id'=>'pcantidad',  'placeholder' => 'Cantidad'])!!}
                    </div>
                  
                  </div>
                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      {!! Form::label('preciocompra', 'Precio Compra') !!}
                      {!! Form::number('pcompra',null,['class' => 'form-control', 'id'=>'pcompra',  'placeholder' => 'Precio Compra'])!!}
                    </div>
                  
                  </div>
                   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      {!! Form::label('precioventa', 'Precio Venta') !!}
                      {!! Form::number('pventa', null, ['class' => 'form-control','id'=>'pventa', 'placeholder' => 'Precio venta'])!!}
                    </div>
                  
                  </div>
                   <div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
                    <div class="form-group" style="margin-top: 2.5em;">
                 
                     <button type="button" name="agregar" id="btadd" class="btn btn-primary">agregar</button> 

                    
                      

                    </div>
                  
                   </div>
                  
                    <div class="card col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="card-body">

                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        
                        <thead style="background-color: #A9D0F5">
                          <th>Opciones</th>
                          <th>Articulo</th>
                          <th>cantidad</th>
                          <th>Precio Compra</th>
                          <th>Precio Venta</th>
                          <th>subtotal</th>
                        </thead>
                        <tfoot>
                          <th>TOTAL</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><h4 id="total">$ 0.00</h4></th>
                        </tfoot>
                        <tbody>
                          
                        </tbody>
                        
                      </table>
                      </div>
                      
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
              <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6" >
                <div class="form-group">
                 
                   {!! Form::submit('Guardar', ['id'=> 'guardar', 'class' => 'btn btn-primary']) !!}
              
                </div>
            </div>
          </div>
          
          {!! Form::close() !!}

 @push('scripts')
      <script>
        $(document).ready(function(){
          $('#btadd').click(function(){
            agregar();
          });
        });

        var cont=0;
        total=0;
        subtotal=[];
        $("#guardar").hide();

        function agregar(){
          article_id = $("#article_id").val();
          articulo  = $("#article_id option:selected").text();
          cantidad = $("#pcantidad").val();
          precioventa = $("#pventa").val();
          preciocompra = $("#pcompra").val();

          

          if(article_id !=" " && cantidad != "" && cantidad > 0 && precioventa != " " && preciocompra != " " )
          {
            subtotal[cont] = (cantidad * preciocompra);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="article_id[]" value="'+article_id+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="preciocompra[]" value="'+preciocompra+'"></td><td><input type="number" name="precioventa[]" value="'+precioventa+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#total").html("$ "+ total);
            evaluar();
            $('#detalles').append(fila);

          }else{
             alert("Error alingresar el detalle de la compra");
          }
        }

        function limpiar(){
          $("#pcantidad").val("");
          $("#pventa").val("");
          $("#pcompra").val("");
        }
        function evaluar(){
          if(total>0){
            $("#guardar").show();
          }else{
            $("#guardar").hide();
          }

        }
        function eliminar(index){
          total = total-subtotal[index];
          $("#total").html("$ " + total);
          $("#fila" + index).remove();
          evaluar();
        }
      </script>
    @endpush
          		
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
