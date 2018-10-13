<?php $__env->startSection('titulo'); ?>

	<a href="<?php echo e(route('articles.index')); ?>">Articulos</a>
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
          <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-info">Crear nuevo Usuario</a><br>
          <?php echo $__env->make('partials.searchart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
          			<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
          				<tr>
                    <td><?php echo e($article->codigobar); ?></td>
          					<td><?php echo e($article->nombre); ?></td>
                    
                    <td><?php echo e($article->descripcion); ?></td>
          					<td><?php echo e($article->stock); ?></td>
                  
                   <td><?php echo e($article->categories); ?> </td>

                    <td>
                     <?php echo e($article->estado); ?>


                    </td>
          					<td><a href="" class="btn btn-danger"><i class="fas fa-eraser"></i></a> <a href="" class="btn btn-warning"><i class="fas fa-edit"></a></td>
          				</tr>
                 
          			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          		</tbody>      		
          	</table><?php echo $articles->render(); ?>


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