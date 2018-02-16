<?php $__env->startSection('body-class', 'profile-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('img/city.jpg')); ?>');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="<?php echo e($product->featured_image_url); ?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title"><?php echo e($product->name); ?></h3>
                        <h6><?php echo e($product->category->name); ?></h6>
                    </div>

                    
                    <?php if(session('notification')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('notification')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="description text-center">
                <p>$ <?php echo e($product->price); ?></p>
                <p><?php echo e($product->long_description); ?></p>
            </div>

            <div class="text-center">
                <?php if(auth()->check()): ?>
                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </button>
                <?php else: ?>
                    <a href="<?php echo e(url('/login?redirect_to='.url()->current())); ?>" class="btn btn-primary btn-round">
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </a>
                <?php endif; ?>
            </div> 

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">

                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php $__currentLoopData = $imagesLeft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e($image->url); ?>" class="img-rounded" />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php $__currentLoopData = $imagesRight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e($image->url); ?>" class="img-rounded" />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="post" action="<?php echo e(url('/cart')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
        <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form>
    </div>
  </div>
</div>         

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>