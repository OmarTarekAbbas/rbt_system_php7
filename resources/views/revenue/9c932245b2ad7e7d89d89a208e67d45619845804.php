<?php $__env->startSection('page_title'); ?>
    RBTs
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Report Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>Rbt Id</th>
                                <th>Rbt Title</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Code</th>
                                <th>Classification</th>
                                <th>Download Number</th>
                                <th>Total Revenue</th>
                                <th>Revenue Share</th>
                                <th>Provider Title</th>
                                <th>Operator Title</th>
                                <?php if(Auth::user()->hasRole(['super_admin','admin'])): ?>
                                <th>Aggregator Title</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo e($report->rbt_id); ?></td>
                                    <td><?php echo $report->rbt_name; ?></td>
                                    <td><?php echo $report->year; ?></td>
                                    <td><?php echo $report->month; ?></td>
                                    <td><?php echo $report->code; ?></td>
                                    <td><?php echo ($report->classification) ? $report->classification : '--'; ?></td>
                                    <td><?php echo ($report->download_no) ? $report->download_no : '--'; ?></td>
                                    <td><?php echo ($report->total_revenue); ?></td>
                                    <td><?php echo $report->revenue_share; ?></td>
                                    <td><?php echo ($report->provider_id) ? $report->provider->title : '--'; ?></td>
                                    <td><?php echo ($report->operator_id) ? $report->operator->title : '--'; ?></td>
                                    <?php if(Auth::user()->hasRole(['super_admin','admin'])): ?>
                                    <td><?php echo ($report->aggregator_id) ? $report->aggregator->title : '--'; ?></td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <a class="btn btn-sm show-tooltip" title="" href="<?php echo e(url('report/'.$report->id.'/edit')); ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo e(url('report/'.$report->id.'/delete')); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                                    <?php endif; ?>
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
        $('#report').addClass('active');
        $('#report-index').addClass('active');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>