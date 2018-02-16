<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido!</p>
	<p>Estos son los datos del cliente que realizó el pedido:</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			<?php echo e($user->name); ?>

		</li>
		<li>
			<strong>Username:</strong>
			<?php echo e($user->username); ?>

		</li>
		<li>
			<strong>E-mail:</strong>
			<?php echo e($user->email); ?>

		</li>
		<li>
			<strong>Teléfono:</strong>
			<?php echo e($user->phone); ?>

		</li>
		<li>
			<strong>Dirección:</strong>
			<?php echo e($user->address); ?>

		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			<?php echo e($cart->order_date); ?>

		</li>
	</ul>

	<p>Y estos son los detalles del pedido:</p>
	<ul>
		<?php $__currentLoopData = $cart->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<?php echo e($detail->product->name); ?> x<?php echo e($detail->quantity); ?> 
			($ <?php echo e($detail->quantity * $detail->product->price); ?>)
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
	<p>
		<strong>Importe que el cliente debe pagar:</strong> <?php echo e($cart->total); ?>

	</p>
	<hr>
	<p>
		<a href="<?php echo e(url('/admin/orders/'.$cart->id)); ?>">Haz clic aquí</a>
		para ver más información sobre este pedido.
	</p>
</body>
</html>