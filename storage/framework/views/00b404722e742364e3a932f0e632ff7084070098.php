<?php $__env->startSection('page_title'); ?>
Contents
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Content Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="btn-group">
                    <?php if(Auth::user()->hasRole(['super_admin','admin'])): ?>
                    <a class="btn btn-circle btn-success show-tooltip" href="<?php echo e(url('content/create')); ?>"
                        title="Create New content" href="#"><i class="fa fa-plus"></i></a>
                    <a id="delete_button" onclick="delete_selected('contents')"
                        class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i
                            class="fa fa-trash-o"></i></a>
                    <?php endif; ?>
                </div><br><br>
                <div class="table-responsive" style="border:0">
                    <table class="table table-advance" id="example">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Content Title</th>
                                <th>Content Type</th>
                                <th>Internal Coding</th>
                                <th>content File</th>
                                <th>Occasion Title</th>
                                <th>Provider</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 0; ?>
                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="selected_rows[]" value="<?php echo e($content->id); ?>"
                                        onclick="collect_selected(this)"></td>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($content->content_title); ?></td>
                                <td><?php echo e($content->content_type); ?></td>
                                <td><?php echo e($content->internal_coding); ?></td>
                                <?php if($content->path): ?>
                                <?php if(!strcmp($content->content_type,'image')): ?>
                                <td>
                                    <img src="<?php echo e($content->path); ?>" alt="<?php echo e($content->content_title); ?>" style="width: 50%">
                                </td>
                                <?php elseif(!strcmp($content->content_type,'video')): ?>
                                <td>
                                    <video class="content_audios" controls>
                                        <source src="<?php echo e($content->path); ?>">
                                        </audio>
                                </td>
                                <?php else: ?>
                                <td>
                                    <audio class="content_audios" controls style="width: 50%">
                                        <source src="<?php echo e($content->path); ?>">
                                    </audio>
                                </td>
                                <?php endif; ?>
                                <?php else: ?>
                                <td>--</td>
                                <?php endif; ?>
                                <?php if($content->occasion): ?>
                                <td><?php echo $content->occasion->title; ?></td>
                                <?php else: ?>
                                <td>--</td>
                                <?php endif; ?>
                                <?php if($content->provider): ?>
                                <td><?php echo $content->provider->title; ?></td>
                                <?php else: ?>
                                <td>--</td>
                                <?php endif; ?>
                                <td class="visible-md visible-lg">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-success show-tooltip" title=""
                                            href="<?php echo e(url('rbt/excel?content_id='.$content->id)); ?>"
                                            data-original-title="Add Rbt"><i class="fa fa-plus"></i></a>
                                        <a class="btn btn-sm show-tooltip" title=""
                                            href="<?php echo e(url('content/'.$content->id.'/edit')); ?>"
                                            data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger show-tooltip" title=""
                                            onclick="return confirm('Are you sure you want to delete this ?');"
                                            href="<?php echo e(url('content/'.$content->id.'/delete')); ?>"
                                            data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $x++; ?>
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
$('#content').addClass('active');
$('#content-index').addClass('active');
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>