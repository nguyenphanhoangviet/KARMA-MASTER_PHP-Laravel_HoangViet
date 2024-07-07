

 <?php $__env->startSection('tieudetrang'); ?>
<?php echo e($tin->tieuDe); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('noidung'); ?>
<h2><?php echo e($tin->tieuDe); ?></h2>
<h3><?php echo e($tin->tomTat); ?></h3>
<div id="noiDung"> <?php echo $tin->noiDung; ?>

</div> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\lab1\la3\resources\views/chitiet.blade.php ENDPATH**/ ?>