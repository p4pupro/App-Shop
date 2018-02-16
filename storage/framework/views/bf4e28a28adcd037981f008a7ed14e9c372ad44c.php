<?php $__env->startSection('title', 'Bienvenido a ' . config('app.name')); ?>

<?php $__env->startSection('body-class', 'landing-page'); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }

        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('/img/city.jpg')); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo e(asset('/img/logo.png')); ?>" alt="Distribuidora Necochea Día" width="300">
                <h1 class="title">Bienvenido a <?php echo e(config('app.name')); ?>.</h1>
                <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega.</h4>
                
                
                    
                
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        
            
                
                    
                    
                
            

            
                
                    
                        
                            
                                
                            
                            
                            
                        
                    
                    
                        
                            
                                
                            
                            
                            
                        
                    
                    
                        
                            
                                
                            
                            
                            
                        
                    
                
            
        

        <div class="section text-center">
            <h2 class="title">Nuestros productos</h2>

            <form class="form-inline" method="get" action="<?php echo e(url('/search')); ?>">
                <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="<?php echo e($category->featured_image_url); ?>" alt="Imagen representativa de la categoría <?php echo e($category->name); ?>" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="<?php echo e(url('/categories/'.$category->id)); ?>"><?php echo e($category->name); ?></a>
                            </h4>
                            <p class="description"><?php echo e($category->description); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aún no te has registrado?</h2>
                    <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
                    <form class="contact-form" method="get" action="<?php echo e(url('/register')); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>

                        
                            
                            
                        

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Iniciar registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('/js/typeahead.bundle.min.js')); ?>"></script>
    <script>
        $(function () {
            // 
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              prefetch: '<?php echo e(url("/products/json")); ?>'
            });            

            // inicializar typeahead sobre nuestro input de búsqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>