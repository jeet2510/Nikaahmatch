<div class="rounded border position-relative overflow-hidden">
    <a
        <?php if(!Auth::check()): ?>
            onclick="loginModal()"
        <?php elseif(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1): ?>
            href="javascript:void(0);" onclick="package_update_alert()"
        <?php else: ?>
            href="<?php echo e(route('member_profile', $member->id)); ?>"
        <?php endif; ?>
        class="d-block text-reset c-pointer"
    >
        <?php
            $avatar_image = (optional($member->member)->gender == 1) ? 'assets/img/Male.png' : ((optional($member->member)->gender == 2) ? 'assets/img/female.png' : null);
            $profile_picture_show = show_profile_picture($member);
			$genderText = (optional($member->member)->gender == 1) ? 'M' : ((optional($member->member)->gender == 2) ? 'F' : 'T');
        ?>

        <img
            <?php if(Auth::check()): ?>
                src="<?php echo e(uploaded_asset($member->photo)); ?>"
            <?php else: ?>
                src="<?php echo e(static_asset($avatar_image)); ?>"
            <?php endif; ?>
            onerror="this.onerror=null;this.src='<?php echo e(static_asset($avatar_image)); ?>';"
            class="img-fit mw-100 h-350px"
        >

        <?php if(!$profile_picture_show && !Auth::check()): ?>
            <div class="absolute-full d-flex justify-content-center align-items-center bg-soft-dark text-white"><i class="las la-lock la-3x"></i></div>
        <?php endif; ?>

        <div class="absolute-bottom-left w-100 p-3 z-1">
            <div class="absolute-full bg-white opacity-90 z--1"></div>
            <div class="text-center">
                <div class="text-primary fw-500 mb-1"><?php echo e($member->first_name); ?></div>
                <div class="fs-10">
                    <span class="opacity-60"><?php echo e(translate('Member ID: ')); ?></span>
                    <span class="ml-2 text-primary"> <?php echo e($genderText); ?> <?php echo e($member->code); ?></span>
                </div>
            </div>
        </div>
    </a>
</div><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/inc/member_box_1.blade.php ENDPATH**/ ?>