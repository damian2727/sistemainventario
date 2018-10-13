<?php $__env->startSection('titulo'); ?>

	Almacen
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo2'); ?>

	Categoria
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear Categoria</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route' => 'category.store', 'method' => 'POST']); ?>

            <div class="form-group">
              <?php echo Form::label('nombre', 'nombre'); ?>

              <?php echo Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required', 'unique']); ?>

              
            </div>

            <div class="form-group">
              <?php echo Form::label('descripcion', 'Descripcion'); ?>

              <?php echo Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion']); ?>

              
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