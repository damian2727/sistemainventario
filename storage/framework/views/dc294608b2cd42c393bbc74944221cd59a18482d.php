<?php $__env->startSection('titulo'); ?>

	Usuarios


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">
  		 \
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="<?php echo e(route('users.index')); ?>"><?php echo $__env->yieldContent('titulo'); ?></a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
          <?php echo Form::open(['route' => 'users.store', 'method' => 'POST']); ?>

          	<div class="form-group">
          		<?php echo Form::label('name', 'nombre'); ?>

          		<?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']); ?>

          		
          	</div>

          	<div class="form-group">
          		<?php echo Form::label('email', 'Email'); ?>

          		<?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']); ?>

          		
          	</div>
          	<div class="form-group">
          		<?php echo Form::label('password', 'Contraseña'); ?>

          		<?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => '***********', 'required']); ?>

          		
          	</div>
          	<div class="form-group">
          		<?php echo Form::label('permiso', 'Tipo Usuario'); ?>

          		<?php echo Form::select('permiso', ['' => 'Seleccionar', 'admin' => 'Administrador', 'trabajador' => 'Trabajador'], null , ['class' => 'form-control', 'required']); ?>

          		
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