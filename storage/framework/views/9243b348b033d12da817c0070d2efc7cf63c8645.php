<?php $__env->startSection('page_title'); ?>
Contract
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Contract Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="btn-group">
                    <a class="btn btn-circle btn-success show-tooltip" href="<?php echo e(url('rbt/create')); ?>" title="Create New Rbt" href="#"><i class="fa fa-plus"></i></a>
                    <a id="delete_button" onclick="delete_selected('rbts')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
                </div>
                <br>
                <br>
                <div class="table-responsive" style="border:0">
                    <table class="table table-advance data_rbt">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Code</th>
                                <th>Service Type</th>
                                <th>Label</th>
                                <th>Contract Date</th>
                                <th>Contract Status</th>
                                <th>Expiry Date</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-flag-blue">
                                <td><input type="checkbox"></td>
                                <td><?php echo e($contract->id); ?></td>
                                <td><?php echo e($contract->contract_code); ?></td>
                                <td><?php echo e($contract->service_type->service_type_title); ?></td>
                                <td><?php echo e($contract->contract_label); ?></td>
                                <td> <?php echo e(date('F j, Y',strtotime($contract->contract_date))); ?></td>
                                <td>
                                    <div class="btn btn-outline-success"><?php echo e($contract->contract_status ? 'Active' : 'Not Active'); ?></div>
                                </td>
                                <td><?php echo e(date('F j, Y',strtotime($contract->contract_expiry_date))); ?></td>
                                <td class="visible-md visible-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-primary show-tooltip " title="" href="<?php echo e(url('fullcontracts/'.$contract->id)); ?>" data-original-title="Show"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm show-tooltip teet" title="" href="<?php echo e(url('fullcontracts/'.$contract->id.'/edit')); ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo e(url('fullcontracts/'.$contract->id.'/delete')); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
		$('#contract').addClass('active');
		$('#contract-index').addClass('active');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>