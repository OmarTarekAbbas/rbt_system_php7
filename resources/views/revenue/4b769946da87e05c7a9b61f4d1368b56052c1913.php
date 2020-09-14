<?php $__env->startSection('page_title'); ?>
    Users
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Edit User Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="<?php echo e(url('users/'.$user->id.'/update')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <?php if($user->aggregator_id): ?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Name *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                
                                <input type="text" name="name" placeholder="User Name" value="<?php echo e($user->name); ?>" class="form-control input-lg" readonly required>
                                <span class="help-inline">Enter a new User name</span>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Name *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                
                                <input type="text" name="name" placeholder="User Name" value="<?php echo e($user->name); ?>" class="form-control input-lg" required>
                                <span class="help-inline">Enter a new User name</span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Email *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                
                                <input type="email" name="email" placeholder="Email" value="<?php echo e($user->email); ?>" class="form-control input-lg" required>
                                <span class="help-inline">Enter a new Email</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Password (optional)</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                
                                <input type="password" name="password" placeholder="Change Password" class="form-control input-lg" >
                                <span class="help-inline">Enter a new Password</span>
                            </div>
                        </div>

                        <?php if($user->aggregator_id): ?>
                        <div class="form-group">
                              <label class="col-sm-3 col-lg-2 control-label">aggregator *</label>
                              <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control input-lg" name="aggregator_id">
                                  <option value="<?php echo e($user->aggregator_id); ?>" selected><?php echo e($user->aggregator->title); ?></option>
                                </select>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if($user->aggregator_id): ?>
                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Role *</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Role" name="role" tabindex="1" required>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($role->name == 'account'): ?>
                                    <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                          </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Role *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a Role" name="role" tabindex="1">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->name); ?>" <?php if($user->roles()->first()->name==$role->name): ?> selected="selected" <?php endif; ?>><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <input type="submit" class="btn btn-primary" value="Submit">
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
        $('#user').addClass('active');
        $('#user-index').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>