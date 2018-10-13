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
          <h3 class="card-title"><a href="{{ route('sale.index') }}">venta</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          {!! Form::open(['route' => 'sale.store', 'method' => 'POST']) !!}
          {{ csrf_field() }}
            <div class="row">
                <div class="col-sm" style="width: 25%;">
              {!! Form::label('numerofactura', 'Factura') !!}
              {!! Form::text('numerofactura', null, ['class' => 'form-control', 'placeholder' => 'Factura numero', 'required'])!!}
              
            </div>
             
          </div>


             
          <div class="row" style="margin-top: 1em;">
              <div class="panel panel-primary" id="de" style="border: all; border-radius: 1em;">
                <div class="panel-body" style="border-color: red; border-radius: 1em;">
                  <div class="row" style=" border-top: dotted; border-radius: 1px;">
                     <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">

                      <label name="article_id" >Articulos</label>
                      <select name="article_id" class="form-control selectpicker" id="article_id" data-live-search="true">
                         @foreach($articles as $article)
                         <option value="{{ $article->id }}_{{ $article->stock }}_{{ $article->preciopromedio }}">{{ $article->article }}</option>
                         @endforeach
                      </select>
                     
                     
                    </div>
                   
                    
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-2 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      <label for="cantidad">Cantidad</label>
                      <input type="number" name="pcantidad" id="pcantidad" class="form-control">
                     
                    </div>
                  
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-2 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      <label for="stock">stock</label>
                      <input type="number" name="pstock" id="pstock" class="form-control">
                    </div>
                  
                  </div>
                 
                   <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group" style="margin-top: 0.5em;">
                      {!! Form::label('precioventa', 'Precio Venta') !!}
                      {!! Form::number('pventa', null, ['class' => 'form-control','id'=>'pventa', 'step'=>'0.01', 'placeholder' => 'Precio venta'])!!}
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
                          
                          <th>Precio Venta</th>
                          <th>subtotal</th>
                        </thead>
                        <tfoot>
                          <th>TOTAL</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><h4 id="total">$ 0.00</h4><input type="hidden" name="totalventa" id="totalventa"></th>
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

          	<div class="form-group">
              <input name="_token" type="hidden" value="{{ csrf_token() }}">
              <button type="submit" name="guardar" id="guardar" class="btn btn-primary">guardar</button> 
          		
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
        $("#article_id").change(mostrarvalores);
        function mostrarvalores (){
          datosarticulo = document.getElementById('article_id').value.split('_');
          $("#pventa").val(datosarticulo[2]);
          $("#pstock").val(datosarticulo[1]);
        }
        function agregar(){
          datosarticulo = document.getElementById('article_id').value.split('_');
          article_id = datosarticulo[0];
          articulo  = $("#article_id option:selected").text();
          cantidads = $("#pcantidad").val();
          cantidad = parseInt(cantidads);
          precioventa = $("#pventa").val();
          stock = $("#pstock").val();

          

          if(article_id !=" " && cantidad != "" && cantidad > 0 && precioventa != "" )
          {
           if(stock>=cantidad){
              subtotal[cont] = (cantidad * precioventa);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="article_id[]" value="'+article_id+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precioventa[]" value="'+precioventa+'" step="0.01"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#total").html("$ "+ total);
            $("#totalventa").val(total);
            evaluar();
            $('#detalles').append(fila);
            }else{
              alert('cantidad supera stock');
            }
            

          }else{
             alert("Error alingresar el detalle de la compra");
          }
        }

        function limpiar(){
          $("#pcantidad").val("");
          $("#pventa").val("");
          $("#pstock").val("");
         
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
           $("#totalventa").val(total);
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