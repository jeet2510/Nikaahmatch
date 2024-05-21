<footer class="aiz-footer fs-13 mt-auto text-white fw-400 pt-5">
    <div class="container">

        <div class="row mb-4">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 text-center mx-auto">
                <div class="logo mb-4">
                    <a href="<?php echo e(route('home')); ?>" class="d-inline-block py-15px">
                        <?php if(get_setting('footer_logo') != null): ?>
                            <img src="<?php echo e(uploaded_asset(get_setting('footer_logo'))); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-30px h-md-40px" height="40">
                        <?php else: ?>
                            <img src="<?php echo e(static_asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-30px h-md-40px" height="40">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="opacity-60">
                    <?php echo get_setting('about_us_description'); ?>

                </div>
            </div>
        </div>

        <?php if(get_setting('footer_address') != null || get_setting('footer_website') != null || get_setting('footer_email') != null || get_setting('footer_phones') != null): ?>
        <div class="mb-4">
            <h4 class="text-uppercase text-primary fs-14 border-bottom border-primary pb-4 mb-4"><?php echo e(translate('Contacts')); ?></h4>
            <div class="row opacity-60 no-gutters">
                <div class="col-xl col-md-6 mb-4">
                    <div class="mb-3 opacity-60">
                        <i class="las la-home mr-2"></i>
                        <span><?php echo e(translate('Address')); ?></span>
                    </div>
                    <div><?php echo get_setting('footer_address'); ?></div>
                </div>
                <div class="col-xl col-md-6 mb-4">
                    <div class="mb-3 opacity-60">
                        <i class="las la-globe mr-2"></i>
                        <span><?php echo e(translate('Website')); ?></span>
                    </div>
                    <div><?php echo e(get_setting('footer_website')); ?></div>
                </div>
                <div class="col-xl col-md-6 mb-4">
                    <div class="mb-3 opacity-60">
                        <i class="las la-envelope mr-2"></i>
                        <span><?php echo e(translate('Email')); ?></span>
                    </div>
                    <div><?php echo e(get_setting('footer_email')); ?></div>
                </div>
                <div class="col-xl col-md-6 mb-4">
                    <div class="mb-3 opacity-60">
                        <i class="las la-phone mr-2"></i>
                        <span><?php echo e(translate('Phone')); ?></span>
                    </div>
                    <?php if(get_setting('footer_phones') != null): ?>
                        <?php $__currentLoopData = json_decode(get_setting('footer_phones'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($value); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row no-gutters">
            <?php if( !empty(get_setting('widget_one_labels')) ): ?>
            <div class="col-xl col-md-6 mb-4">
                <h4 class="text-uppercase text-primary fs-14 border-bottom border-primary pb-4 mb-4"><?php echo e(get_setting('widget_one_title')); ?></h4>
                <div>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = json_decode( get_setting('widget_one_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="my-3">
                                <a href="<?php echo e(json_decode( get_setting('widget_one_links'), true)[$key]); ?>" class="text-reset opacity-60"><?php echo e($value); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <?php if( !empty(get_setting('widget_two_labels')) ): ?>
            <div class="col-xl col-md-6 mb-4">
                <h4 class="text-uppercase text-primary fs-14 border-bottom border-primary pb-4 mb-4"><?php echo e(get_setting('widget_two_title')); ?></h4>
                <div>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = json_decode( get_setting('widget_two_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="my-3">
                                <a href="<?php echo e(json_decode( get_setting('widget_two_links'), true)[$key]); ?>" class="text-reset opacity-60"><?php echo e($value); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <?php if( !empty(get_setting('widget_three_labels')) ): ?>
            <div class="col-xl col-md-6 mb-4">
                <h4 class="text-uppercase text-primary fs-14 border-bottom border-primary pb-4 mb-4"><?php echo e(get_setting('widget_three_title')); ?></h4>
                <div>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = json_decode( get_setting('widget_three_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="my-3">
                                <a href="<?php echo e(json_decode( get_setting('widget_three_links'), true)[$key]); ?>" class="text-reset opacity-60"><?php echo e($value); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <?php if( !empty(get_setting('widget_mobile_app_title')) ): ?>
            <div class="col-xl col-md-6 mb-4">
                <h4 class="text-uppercase text-primary fs-14 border-bottom border-primary pb-4 mb-4"><?php echo e(get_setting('widget_mobile_app_title')); ?></h4>
                <div class="mb-3">
                    <a href="<?php echo e(get_setting('footer_play_store_link')); ?>">
                        <img src="<?php echo e(uploaded_asset(get_setting('footer_play_store_img'))); ?>" height="50">
                    </a>
                </div>
                <div class="mb-3">
                    <a href="<?php echo e(get_setting('footer_app_store_link')); ?>">
                        <img src="<?php echo e(uploaded_asset(get_setting('footer_app_store_img'))); ?>" height="50">
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="border-top border-primary pt-4 pb-7 pb-xl-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="lh-1" current-verison="<?php echo e(get_setting("current_version")); ?>">
                        <?php echo get_setting('footer_copyright_text'); ?>

                    </div>
                </div>
                <?php if(get_setting('show_social_links') == 'on'): ?>
                <div class="col-lg-6">
                    <div class="text-left text-lg-right">
                        <ul class="list-inline social colored mb-0">
                            <?php if( !empty(get_setting('facebook_link')) ): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo e(get_setting('facebook_link')); ?>" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if( !empty(get_setting('twitter_link')) ): ?>
                            <li class="list-inline-item">
                                <a href="<?php echo e(get_setting('twitter_link')); ?>" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                            </li>
                            <?php endif; ?>
                            <?php if( !empty(get_setting('instagram_link')) ): ?>
                            <li class="list-inline-item">
                                <a href="<?php echo e(get_setting('instagram_link')); ?>" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                            </li>
                            <?php endif; ?>
                            <?php if( !empty(get_setting('youtube_link')) ): ?>
                            <li class="list-inline-item">
                                <a href="<?php echo e(get_setting('youtube_link')); ?>" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                            </li>
                            <?php endif; ?>
                            <?php if( !empty(get_setting('linkedin_link')) ): ?>
                            <li class="list-inline-item">
                                <a href="<?php echo e(get_setting('linkedin_link')); ?>" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</footer>

<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5 text-center">
        <div class="col">
            <a href="<?php echo e(route('home')); ?>" class="text-reset d-block flex-grow-1 text-center py-2">
                <i class="las la-home fs-18 opacity-60 <?php echo e(areActiveRoutes(['home'],'opacity-100')); ?>"></i>
                <span class="d-block fs-10 opacity-60 <?php echo e(areActiveRoutes(['home'],'opacity-100 fw-600')); ?>"><?php echo e(translate('Home')); ?></span>
            </a>
        </div>
        <div class="col">
            <a href="<?php echo e(route('frontend.notifications')); ?>" class="text-reset d-block flex-grow-1 text-center py-2">
                <span class="d-inline-block position-relative px-2">
                    <i class="las la-bell fs-18 opacity-60 <?php echo e(areActiveRoutes(['frontend.notifications'],'opacity-100')); ?>"></i>
                    <?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
                        <?php
                            $unseen_notification = \App\Models\Notification::where('notifiable_id',Auth()->user()->id)->where('read_at',null)->count();
                        ?>
                        <?php if($unseen_notification > 0): ?>
                            <span class="badge badge-sm badge-circle badge-primary position-absolute absolute-top-right"><?php echo e($unseen_notification); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </span>
                <span class="d-block fs-10 opacity-60 <?php echo e(areActiveRoutes(['frontend.notifications'],'opacity-100 fw-600')); ?>"><?php echo e(translate('Notifications')); ?></span>
            </a>
        </div>
        <div class="col">
          <a href="<?php echo e(route('all.messages')); ?>" class="text-reset d-block flex-grow-1 text-center py-2 <?php echo e(areActiveRoutes(['all.messages'],'opacity-100')); ?>">
              <span class="d-inline-block position-relative px-2">
                  <i class="las la-comment-dots fs-18 opacity-60 <?php echo e(areActiveRoutes(['all.messages'],'opacity-100')); ?>"></i>
                    <?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
                        <?php
                            $unseen_chat_thread_count = count(chat_threads());
                        ?>
                        <?php if($unseen_chat_thread_count > 0): ?>
                            <span class="badge badge-sm badge-circle badge-primary position-absolute absolute-top-right"><?php echo e($unseen_chat_thread_count); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
              </span>
              <span class="d-block fs-10 opacity-60 <?php echo e(areActiveRoutes(['all.messages'],'opacity-100 fw-600')); ?>"><?php echo e(translate('Messages')); ?></span>
          </a>
        </div>
        <?php if(Auth::check()): ?>
            <?php if(Auth::user()->user_type == 'member'): ?>
                <div class="col">
                    <a href="javascript:void(0)" class="text-reset d-block flex-grow-1 text-center py-2 mobile-side-nav-thumb" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                        <span class="d-block mx-auto mb-1 opacity-60">
                            <img src="<?php echo e(uploaded_asset(Auth::user()->photo)); ?>" class="rounded-circle size-20px" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                        </span>
                        <span class="d-block fs-10 opacity-60"><?php echo e(translate('Account')); ?></span>
                    </a>
                </div>
            <?php else: ?>
                <div class="col">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-reset d-block flex-grow-1 text-center py-2">
                        <span class="d-block mx-auto mb-1 opacity-60">
                            <img src="<?php echo e(uploaded_asset(Auth::user()->photo)); ?>" class="rounded-circle size-20px" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                        </span>
                        <span class="d-block fs-10 opacity-60"><?php echo e(translate('Account')); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="col">
                <a href="<?php echo e(route('login')); ?>" class="text-reset d-block flex-grow-1 text-center py-2">
                    <span class="d-block mx-auto mb-1 opacity-60 <?php echo e(areActiveRoutes(['login'],'opacity-100')); ?>">
                        <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="rounded-circle size-20px">
                    </span>
                    <span class="d-block fs-10 opacity-60 <?php echo e(areActiveRoutes(['login'],'opacity-100 fw-600')); ?>"><?php echo e(translate('Account')); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            <?php echo $__env->make('frontend.member.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/inc/footer.blade.php ENDPATH**/ ?>