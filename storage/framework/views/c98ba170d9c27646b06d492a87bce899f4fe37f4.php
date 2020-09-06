<?php $__env->startSection('page_title'); ?>
Operator
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Operator Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

                <?php echo Form::open(["url"=>"operator","class"=>"form-horizontal","method"=>"POST","files"=>"True"]); ?>

                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Operator Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <?php echo Form::text('title',null,['placeholder'=>'Operator Name','class'=>'form-control btn-lg','required']); ?>

                    </div>
                </div>

                <?php if(isset($_REQUEST['country_id'])): ?>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Country <span class="text-danger">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <?php echo Form::select('country_id',array($_REQUEST['country_id'] => $_REQUEST['title']),null,['class'=>'form-control chosen-rtl btn-lg','required' => true,'style'=>'height: 48px;']); ?>

                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $('#operator').addClass('active');
    $('#operator_create').addClass('active');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>