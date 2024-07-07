 <?php $__env->startSection('tieudetrang'); ?>
Tin trong loại <?php echo e($idLT); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('noidung'); ?>
<h1>Các tin trong loại <?php echo e($idLT); ?></h1> <?php $__currentLoopData = $listtin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
<h3><?php echo e($t->tieuDe); ?></h3> <p><?php echo e($t->tomTat); ?></p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Lập trình PHP3\lab\lab3\la3\resources\views/tintrongloai.blade.php ENDPATH**/ ?>