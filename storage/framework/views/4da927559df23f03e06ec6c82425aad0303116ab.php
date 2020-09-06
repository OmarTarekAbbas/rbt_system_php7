<?php $__env->startSection('page_title'); ?>
    Report
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Edit report form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '<?php echo url("report/".$report->id.'/update'); ?>' enctype="multipart/form-data">
                        <?php 
                            $months = months();
                            $years = years();
                        ?>
                        <input type = 'hidden' name = '_token' value = '<?php echo e(Session::token()); ?>'>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Years Select </label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Years" name="year" tabindex="1" >
                                <option value=""></option>
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($year); ?>" <?php echo e(($report->year == $year) ? ' selected' : ''); ?>><?php echo e($year); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Months Select </label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Months" name="month" tabindex="1" >
                                <option value=""></option>
                                <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index+1); ?>" <?php echo e(($report->month == $index+1) ? ' selected' : ''); ?>><?php echo e($month); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="code" name = "code" type="text" value="<?php echo e($report->code); ?>" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="classification">Classification *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="classification" name = "classification" value="<?php echo e($report->classification); ?>" type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="rbt_name">Rbt Name *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="rbt_name" name = "rbt_name" type="text" value="<?php echo e($report->rbt_name); ?>" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="download_no">Download Number</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="download_no" name = "download_no" value="<?php echo e($report->download_no); ?>" type="number" class="form-control input-lg" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="total_revenue">Total Revenue *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="total_revenue" name = "total_revenue" value="<?php echo e($report->total_revenue); ?>" type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="revenue_share">Revenue Share *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="revenue_share" name = "revenue_share" value="<?php echo e($report->revenue_share); ?>"  type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label" >Providers Select *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <select name = 'provider_id' class = 'form-control chosen' ata-placeholder="Providers a Operators" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <option value="<?php echo e($key); ?>" <?php echo e(($report->provider_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                            </div>
                        </div>
                        
                       <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                                <option value=""></option>
                               <?php $__currentLoopData = $operators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($key); ?>" <?php echo e(($report->operator_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Aggregators" name="aggregator_id" tabindex="1" >
                                <option value=""></option>
                                <?php $__currentLoopData = $aggregators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($key); ?>" <?php echo e(($report->aggregator_id == $key) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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
        $('#report').addClass('active');
        $('#report-index').addClass('active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>