<?php $__env->startSection('page_title'); ?>
    RBTs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Add RBT</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '<?php echo url("rbt/excel"); ?>' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '<?php echo e(Session::token()); ?>'>
                        <?php if(isset($_REQUEST['content_id'])): ?>
                        <input type = 'hidden' name = 'content_id' value = '<?php echo e($_REQUEST['content_id']); ?>'>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Excel Type Select *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" name="type" tabindex="1" required onchange="change_sample_link(this)">
                                    <option value="0">Old Excel</option>
                                    <option value="1">New Excel</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Excel file</label>
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
                                           <input type="file" name="fileToUpload" required class="file-input">
                                       </a>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                   </div>
                                </div>
                                <span id="sample_link"><a href="<?php echo e(url('rbt/downloadSample')); ?>">Download Sample</a></span>
                             </div>
                          </div>
                        </div>

                       <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                                <option value=""></option>
                               <?php $__currentLoopData = $operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
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
        function change_sample_link(element) {
            var link ;
            $('#sample_link').html('');
            if(element.value==0)
            {
                link = '<a href="<?php echo e(url('rbt/downloadSample')); ?>">Download Sample</a>' ;
            }
            else {
                link = '<a href="<?php echo e(url('rbt/downloadSampleNew')); ?>">Download Sample (New)</a>' ;
            }
            $('#sample_link').append(link).hide().fadeIn(600) ;
        }
    </script>
    <script>
        $('#rbt').addClass('active');
        $('#rbt-excel').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>