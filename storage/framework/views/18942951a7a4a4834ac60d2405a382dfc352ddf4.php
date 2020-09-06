<?php $__env->startSection('page_title'); ?>
    RBTs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Update RBT Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '<?php echo url("rbt"); ?>/<?php echo $rbt->id; ?>/update' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '<?php echo e(Session::token()); ?>'>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Title *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="track_title_en" name = "track_title_en" value="<?php echo e($rbt->track_title_en); ?>" type="text" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="code" name = "code" type="text" value="<?php echo e($rbt->code); ?>" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="social_media_code">Social Media Code</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="social_media_code" name = "social_media_code" value="<?php echo e($rbt->social_media_code); ?>" type="text" class="form-control input-lg">
                            </div>
                        </div>



                        <?php if($rbt->track_file): ?>
                            <?php if(file_exists($rbt->track_file)): ?>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <audio controls>
                                            <source src="<?php echo e(url($rbt->track_file)); ?>" type="audio/ogg">
                                        </audio>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>



                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Track file</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-group">
                                   <div class="form-control uneditable-input">
                                      <i class="fa fa-file fileupload-exists"></i>
                                      <span class="fileupload-preview"></span>
                                   </div>
                                   <div class="input-group-btn">
                                       <a class="btn bun-default btn-file">
                                           <span class="fileupload-new">Select file</span>
                                           <span class="fileupload-exists">Change</span>
                                           <input type="file" name="track_file" accept="audio/*" class="file-input">
                                       </a>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                   </div>
                                </div>
                             </div>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                                <option value=""></option>
                               <?php $__currentLoopData = $operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($rbt->operator_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Occasions Select </label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Occasions" name="occasion_id" tabindex="1" >
                                <option value=""></option>
                                <?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($rbt->occasion_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose an aggregator" name="aggregator_id" tabindex="1" >
                                <option value=""></option>
                                <?php $__currentLoopData = $aggregators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($rbt->aggregator_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Providers Select</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a provider" name="provider_id" tabindex="1" >
                                    <option value=""></option>
                                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(($rbt->provider_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Master Content Select</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a Content" name="content_id" tabindex="1" >
                                    <option value=""></option>
                                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(($rbt->content_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

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
        $('#rbt').addClass('active');
        $('#rbt-create').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>