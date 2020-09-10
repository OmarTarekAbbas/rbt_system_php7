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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered ">
                        <tbody>
                            <tr>
                                <td width='30%' class='label-view text-right'>ID</td>
                                <td><?php echo e($contract->id); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Code</td>
                                <td><a href="#0"><?php echo e($contract->contract_code); ?> </a> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Service Type </td>
                                <td><?php echo e($contract->service_type->service_type_title); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Label </td>
                                <td><?php echo e($contract->contract_label); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party Id </td>
                                <td><?php echo e($contract->first_party_id); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party Select </td>
                                <td><?php echo e($contract->first_party_select ? 'Yes' : 'No'); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party Id </td>
                                <td><?php echo e($contract->second_party_id); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party </td>
                                <td><?php echo e($contract->first_party); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party </td>
                                <td><?php echo e($contract->second_party); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party (%) </td>
                                <td><?php echo e($contract->first_party_percentage); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party (%) </td>
                                <td><?php echo e($contract->second_party_percentage); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Date </td>
                                <td><?php echo e(date('F j, Y',strtotime($contract->contract_date))); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Duration </td>
                                <td><?php echo e($contract->contract_duration_id); ?> Year </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Renewal Status </td>
                                <?php if($contract->renewal_status == 0): ?>
                                <td> <button class="btn btn-danger">No</button></td>
                                <?php elseif($contract->renewal_status == 1): ?>
                                <td> <button class="btn btn-success">AR</button></td>
                                <?php else: ?>
                                <td> <button class="btn btn-primary">RBAO</button></td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Status </td>
                                <?php if($contract->contract_status == 0): ?>
                                <td> <button class="btn btn-danger">Not Active</button></td>
                                <?php else: ?>
                                <td> <button class="btn btn-success">Active</button></td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Expiry Date </td>
                                <td><?php echo e(date('F j, Y',strtotime($contract->contract_expiry_date))); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Countries </td>
                                <td><?php echo e($contract->country_title); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Operators </td>
                                <td><?php echo e($contract->operator_title); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Copies </td>
                                <td><?php echo e($contract->copies); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Pages </td>
                                <td><?php echo e($contract->pages); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Notes </td>
                                <?php if($contract->contract_notes): ?>
                                <td><?php echo e($contract->contract_notes); ?> </td>
                                <?php else: ?>
                                <td>---</td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Entry By </td>
                                <td><?php echo e($contract->entry_by_details); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Created At </td>
                                <td><?php echo e(date('F j, Y, g:i a',strtotime($contract->updated_at))); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Updated At </td>
                                <td><?php echo e(date('F j, Y, g:i a',strtotime($contract->updated_at))); ?> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party Type </td>
                                <td><?php echo e($contract->second_party_type_id); ?></td>
                            </tr>

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