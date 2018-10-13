<?php $__env->startSection('titulo'); ?>

Compras


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">
  		 \
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="<?php echo e(route('articles.index')); ?>">Articulos</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          <?php echo Form::open(['route' => ['articles.store'] ,'method' => 'POST']); ?>

          	<div class="form-group">
          		<?php echo Form::label('codigobar', 'Codigo de Barras'); ?>

          		<?php echo Form::text('codigobar', null, ['class' => 'form-control', 'placeholder' => 'Codigo de Barras', 'required']); ?>

          		
          	</div>

            <div class="form-group">
              <?php echo Form::label('referencia', 'Referencia'); ?>

              <?php echo Form::text('referencia', null, ['class' => 'form-control', 'placeholder' => 'Referencia', 'required']); ?>

              
            </div>

            <div class="form-group">
              <?php echo Form::label('nombre', 'Nombre'); ?>

              <?php echo Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']); ?>

              
            </div>

          	<div class="form-group">
          		<?php echo Form::label('descripcion', 'Descripcion'); ?>

          		<?php echo Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'required']); ?>

          		
          	</div>
          <div class="form-group">
              <?php echo Form::label('stock', 'Stock'); ?>

              <?php echo Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock', 'required']); ?>

              
            </div>

            <div class="form-group">
              <?php echo Form::label('estado', 'Estado'); ?>

              <?php echo Form::select('estado', ['' => 'Seleccionar', 'activo' => 'Activo', 'inactivo' => 'iInactivo'], ['class' => 'form-control', 'required']); ?>

              
            </div>

            <div class="form-group">
              <?php echo Form::label('category_id', 'Estado'); ?>

              
              <?php echo Form::select('category_id',  $category->pluck('nombre', 'id')->all(), 1, ['class' => 'form-control']); ?>

            </div>

          
          	<div class="form-group">
          		<?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

          		
          		
          	</div>
          <?php echo Form::close(); ?>

          		
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>