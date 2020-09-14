<?php $__env->startSection('page_title'); ?>
    File System
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>File System for RBTs</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo e(url('elFinder/elfinder')); ?>"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>
    <script>
        $('#rbt').addClass('active');
        $('#rbt-list-tracks').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>