<?php $__env->startSection('page_title'); ?>
	RoadMap
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <link rel='stylesheet' href='<?php echo e(url('assets/fullcalendar/theme/sunny.css')); ?>' />
    <link href="<?php echo e(url('assets/fullcalendar/fullcalendar/fullcalendar.css')); ?>" rel='stylesheet' />
    <link href="<?php echo e(url('assets/fullcalendar/fullcalendar/fullcalendar.print.css')); ?>" rel='stylesheet' media='print' />

	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> RoadMap Calendar</h3>
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">
                    <?php echo $calendar->calendar(); ?>


				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
		$('#roadmap').addClass('active');
		$('#roadmap-calendar').addClass('active');
    </script>
        <script src="<?php echo e(url('assets/fullcalendar/lib/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(url('assets/fullcalendar/lib/jquery-ui.custom.min.js')); ?>"></script>
        <script src="<?php echo e(url('assets/fullcalendar/fullcalendar/fullcalendar.min.js')); ?>"></script>
    <?php echo $calendar->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>