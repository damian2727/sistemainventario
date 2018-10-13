<?php $__env->startSection('titulo'); ?>

	<a href="<?php echo e(route('purchase.index')); ?>">Compras</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo2'); ?>

	Lista Articulos
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
          <a href="<?php echo e(route('purchase.create')); ?>" class="btn btn-info">Crear nuevo Compra</a><br>
          <?php echo $__env->make('partials.searchart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
          			<?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
          				<tr>
                    <td><?php echo e($pur->id); ?></td>
          					<td><?php echo e($pur->created_at); ?></td>
                    
                    <td><?php echo e($pur->nombre); ?></td>
          					<td><?php echo e($pur->tipofacturta. ': ' .$pur->numerofactura); ?></td>
                  
                  
                   <td><?php echo e($pur->impuesto); ?> </td>
                   <td><?php echo e($pur->total); ?> </td>
                    <td>
                     <?php echo e($pur->estado); ?>


                    </td>
          					<td><a href="" data-target="#modal-delete-<?php echo e($pur->id); ?>" data-toggle="modal" class="btn btn-danger"><button class=""><i class="fas fa-eraser"></i></button></a> <a href="" class="btn btn-warning"><button></button><i class="fas fa-edit"></i></a></td>
          				</tr>
                 
          			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          		</tbody>      		
          	</table><?php echo $purchases->render(); ?>


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