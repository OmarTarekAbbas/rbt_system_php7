<?php $__env->startSection('page_title'); ?>
	RoadMap
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> RoadMap Table</h3>
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
								<th>Event Title</th>
								<th>Event Color</th>
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $__currentLoopData = $roadmaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roadmap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="table-flag-blue">
										<td><input type="checkbox"></td>
										<td><?php echo e($roadmap->event_title); ?></td>
										<td> <span style="color:<?php echo e($roadmap->event_color); ?>">color</span></td>
										<td class="visible-md visible-lg">
											<div class="btn-group">
												<a class="btn btn-sm show-tooltip" title="" href="<?php echo e(url('roadmaps/'.$roadmap->id.'/edit')); ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
												<a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo e(url('roadmaps/'.$roadmap->id.'/delete')); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
		$('#roadmap').addClass('active');
		$('#roadmap-index').addClass('active');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>