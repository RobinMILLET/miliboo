<?php $__env->startSection('title', 'Miliboo'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/acceuil.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="contentAcceuil">
    <h1 class="titreCollection">Collections tendances</h1>
    <div class="grilleCategorie">
        <a class="elementGrille" href="<?php echo e(route('produits.parCategorieMere', 1)); ?>">
            <img src="<?php echo e(asset('/img/grilleCollections1.jpg')); ?>" alt="">
        </a>
        <a class="elementGrille" href="<?php echo e(route('produits.parCategorieMere', 5)); ?>">
            <img src="<?php echo e(asset('/img/grilleCollections2.jpg')); ?>" alt="">
        </a>
        <a class="elementGrille" href="<?php echo e(route('produits.parCategorieMere', 2)); ?>">
            <img src="<?php echo e(asset('/img/grilleCollections3.jpg')); ?>" alt="">
        </a>
        <a class="elementGrille" href="<?php echo e(route('produits.parCategorieMere', 10)); ?>">
            <img src="<?php echo e(asset('/img/grilleCollections4.jpg')); ?>" alt="">
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s234/miliboo/resources/views/miliboo.blade.php ENDPATH**/ ?>