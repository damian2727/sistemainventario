<?php $__env->startSection('titulo'); ?>

	<a href="<?php echo e(route('providers.index')); ?>">Compras</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo2'); ?>

	Lista Proveedores
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $__env->yieldContent('titulo'); ?></h3>  

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a href="<?php echo e(route('providers.create')); ?>" class="btn btn-info">Crear nuevo Usuario</a><br>
          	<table class="table" style="margin-left: 2em;">
          		<thead>
          			<th>Nombre</th>
          			<th>Telefono</th>
                <th>Email</th>
          			<th>Accion</th>    
          		</thead>
          		<tbody>
          			<?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          				<tr>
          					<td><?php echo e($provider->nombre); ?></td>
          					<td><?php echo e($provider->telefono); ?></td>
                    <td>
                     <?php echo e($provider->email); ?>

                    </td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></a></td>
          				</tr>
          			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          		</tbody>      		
          	</table><?php echo $providers->render(); ?>


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