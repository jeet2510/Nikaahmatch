
<?php $__env->startSection('content'); ?>
<section class="pt-6 pb-4 bg-white text-center">
    <div class="container">
        <h1 class="fw-600 text-dark"><?php echo e(translate('Happy Stories')); ?></h1>
    </div>
</section>
<section class="pt-5 pb-4 bg-white">
    <div class="container">
        <div class="card-columns column-gap-10 card-columns-xl-3 card-columns-md-2 card-columns-1">
            <?php $__currentLoopData = $happy_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $happy_story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $photo = explode(',',$happy_story->photos);
                ?>
    			<div class="card mb-3 shadow-none">
    				<a href="<?php echo e(route('story_details', $happy_story->id)); ?>" class="text-reset d-block mb-4">
    					<img src="<?php echo e(uploaded_asset($photo[0])); ?>" class="img-fluid">
    				</a>
                    <div class="p-3">
        				<h2 class="h5">
        					<a href="<?php echo e(route('story_details', $happy_story->id)); ?>" class="text-dark"><?php echo e($happy_story->title); ?></a>
        				</h2>
                        <div class="mb-3">
                            <span class="opacity-40"><?php echo e(translate('Posted By')); ?>:</span>
                            <a
                                <?php if(!Auth::check()): ?>
                                    onclick="loginModal()"
                                <?php elseif(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1): ?>
                                    href="javascript:void(0);" onclick="package_update_alert()"
                                <?php else: ?>
                                    href="<?php echo e(route('member_profile', $happy_story->user_id)); ?>"
                                <?php endif; ?>
                                class="c-pointer text-primary" >
                                <?php echo e($happy_story->user->first_name.' '.$happy_story->user->last_name.''); ?>

                            </a>
                            <span class="opacity-40"><?php echo e(translate('On')); ?>:</span>
                            <span class="opacity-70"><?php echo e($happy_story->created_at->format('d F, Y')); ?></span>
                        </div>
        				<a href="<?php echo e(route('story_details', $happy_story->id)); ?>" class="btn btn-primary mt-2"><?php echo e(translate('View Details')); ?></a>
        			</div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="aiz-pagination aiz-pagination-center mt-4">
            <?php echo e($happy_stories->appends(request()->input())->links()); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.login_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.package_update_alert_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

	// Login alert
    function loginModal(){
        $('#LoginModal').modal();
    }

    // Package update alert
    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/happy_stories/index.blade.php ENDPATH**/ ?>