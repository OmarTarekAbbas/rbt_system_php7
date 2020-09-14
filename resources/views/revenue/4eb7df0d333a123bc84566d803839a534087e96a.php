<?php $__env->startSection('page_title'); ?>
    Contents
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Update Content Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '<?php echo url("content"); ?>/<?php echo $content->id; ?>/update' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '<?php echo e(Session::token()); ?>'>
                        <input type = 'hidden' name = '_method' value = 'patch'>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Content Title *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="content_title" name = "content_title" value="<?php echo e($content->content_title); ?>" type="text" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">content Type *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                                 <?php echo Form::select('content_type', ['image'=>'image','video' =>'video','audio' => 'audio'], $content->content_type, ['class' => 'form-control input-lg' , 'required' => 'required']); ?>

                            </div>
                        </div>
                        <?php if($content->path): ?>
                            <?php if(file_exists($content->path)): ?>
                                <?php if(!strcmp($content->content_type,'audio')): ?>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <audio controls>
                                            <source src="<?php echo e($content->path); ?>" width="100%" type="audio/ogg">
                                        </audio>
                                    </div>
                                </div>
                                <?php elseif(!strcmp($content->content_type,'video')): ?>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <video controls>
                                            <source src="<?php echo e($content->path); ?>" width="100%" type="audio/ogg">
                                        </video>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <img src="<?php echo e($content->path); ?>" width="100%" controls>
                                    </div>
                                </div>
                                <?php endif; ?>
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
                                           <input type="file" name="path" class="file-input">
                                       </a>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                   </div>
                                </div>
                             </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Occasion Select *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a Occasion" name="occasion_id" tabindex="1" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($content->occasion_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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
                                        <option value="<?php echo e($key); ?>" <?php echo e(($content->provider_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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
        $('#content').addClass('active');
        $('#content-create').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>