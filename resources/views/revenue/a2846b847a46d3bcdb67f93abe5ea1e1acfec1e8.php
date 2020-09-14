<?php $__env->startSection('page_title'); ?>
    Roles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Add Role Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="<?php echo e(url('roles/'.$role->id.'/update')); ?>" method="post">
                    	<?php echo e(csrf_field()); ?>

                    	<div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Role</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                
                                <input type="text" name="name" placeholder="Role Name" value="<?php echo e($role->name); ?>" class="form-control input-lg" required>
                                <input type="hidden"  name="role_id" value="<?php echo e($role->id); ?>">
                                <span class="help-inline">Enter a new Role name</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#role').addClass('active');
        $('#role-index').addClass('active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>