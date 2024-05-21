
<?php $__env->startSection('content'); ?>
<style>
/* .slick-slide.slick-current.slick-active{
  width: 0px !important;
  position: relative !important;
  left: 0px !important;
  top: 0px !important;
  z-index: 999 !important;
  opacity: 1 !important;
  transition: width 500ms ease 4s !important; 
}

.slick-slide:hover {
  width: 100% !important;
  display: inline-block !important;
}

.slick-current.slick-active {
  animation: slideShow 8s infinite !important; 
}

@keyframes slideShow {
   0%, 100% {
    opacity: 0;
  }

  25%, 50%, 75% {
    opacity: 1;
  }
}*/
</style>
    <!-- Homepage Slider Section -->
    <?php if(get_setting('show_homepage_slider') == 'on' && get_setting('home_slider_images') != null): ?>
        <section class="position-relative overflow-hidden min-vh-100 d-flex home-slider-area">
            <?php 
                $slider_images = json_decode(get_setting('home_slider_images'), true);  
                $slider_images_small = json_decode(get_setting('home_slider_images_small'), true);  
            ?>
            <div class="absolute-full">
                <div class="aiz-carousel aiz-carousel-full h-100 d-none denis-1 <?php echo e(get_setting('home_slider_images_small') != null ? 'd-md-block' : 'd-block'); ?>" data-fade='true' data-infinite='true' data-autoplay='true'>
                    <?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img class="img-fit" src="<?php echo e(uploaded_asset($slider_image)); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if(get_setting('home_slider_images_small') != null): ?>
                    <div class="aiz-carousel aiz-carousel-full h-100 denis-2 d-md-none" data-fade='true' data-infinite='true' data-autoplay='true'>
                        <?php $__currentLoopData = $slider_images_small; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="img-fit" src="<?php echo e(uploaded_asset($slider_image)); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="absolute-full bg-white opacity-0 d-md-none"></div>
            </div>
            <div class="container position-relative d-flex flex-column">
                <div class="row pt-11 pb-8 my-auto align-items-center">
                    <div class="col-xl-5 col-lg-6 my-4">
                        <div class="text-dark home-slider-text">
                            <?php echo get_setting('home_slider_text'); ?>

                        </div>
                    </div>
                    <?php if(!Auth::check() && get_setting('show_homepage_slider_registration') == 'on'): ?>
                        <div class="offset-xxl-2 offset-xl-1 col-lg-6 col-xxl-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4 text-center">
                                        <h2 class="h3 text-primary mb-0"><?php echo e(translate('Create Your Account')); ?></h2>
                                        <p><?php echo e(translate('Fill out the form to get started')); ?>.</p>
                                    </div>
                                    <form class="form-default" id="reg-form" role="form"
                                        action="<?php echo e(route('register')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="on_behalf"><?php echo e(translate('On Behalf')); ?></label>
                                                    <?php $on_behalves = \App\Models\OnBehalf::all(); ?>
                                                    <select
                                                        class="form-control aiz-selectpicker <?php $__errorArgs = ['on_behalf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="on_behalf" required>
                                                        <?php $__currentLoopData = $on_behalves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $on_behalf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($on_behalf->id); ?>"><?php echo e($on_behalf->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['on_behalf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="name"><?php echo e(translate('First Name')); ?></label>
                                                    <input type="text"
                                                        class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="first_name" id="first_name"
                                                        placeholder="<?php echo e(translate('First Name')); ?>" required>
                                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="name"><?php echo e(translate('Last Name')); ?></label>
                                                    <input type="text"
                                                        class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="last_name" id="last_name"
                                                        placeholder="<?php echo e(translate('Last Name')); ?>" required>
                                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="gender"><?php echo e(translate('Gender')); ?></label>
                                                    <select
                                                        class="form-control aiz-selectpicker <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="gender" required>
                                                        <option value="1"><?php echo e(translate('Male')); ?></option>
                                                        <option value="2"><?php echo e(translate('Female')); ?></option>
                                                    </select>
                                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="name"><?php echo e(translate('Date Of Birth')); ?></label>
                                                    <input type="text"
                                                        class="form-control aiz-date-range <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="date_of_birth" id="date_of_birth"
                                                        placeholder="<?php echo e(translate('Date Of Birth')); ?>" data-single="true"
                                                        data-show-dropdown="true" data-max-date="<?php echo e(get_max_date()); ?>"
                                                        autocomplete="off" required>
                                                    <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(addon_activation('otp_system')): ?>
                                            <div>
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <label class="form-label"
                                                        for="email"><?php echo e(translate('Email / Phone')); ?></label>
                                                    <button class="btn btn-link p-0 opacity-50 text-reset fs-12"
                                                        type="button"
                                                        onclick="toggleEmailPhone(this)"><?php echo e(translate('Use Email Instead')); ?></button>
                                                </div>
                                                <div class="form-group phone-form-group mb-1">
                                                    <input type="number" id="phone-code"
                                                        class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                        value="<?php echo e(old('phone')); ?>" placeholder="" name="phone"
                                                        autocomplete="off">
                                                </div>

                                                <input type="hidden" name="country_code" value="">

                                                <div class="form-group email-form-group mb-1 d-none">
                                                    <input type="email"
                                                        class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                        value="<?php echo e(old('email')); ?>"
                                                        placeholder="<?php echo e(translate('Email')); ?>" name="email"
                                                        autocomplete="off">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"
                                                            for="email"><?php echo e(translate('Email address')); ?></label>
                                                        <input type="email"
                                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="email" id="signinSrEmail"
                                                            placeholder="<?php echo e(translate('Email Address')); ?>">
                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback"
                                                                role="alert"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="password"><?php echo e(translate('Password')); ?></label>
                                                    <input type="password"
                                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="password" placeholder="********" aria-label="********"
                                                        required>
                                                    <small><?php echo e(translate('Minimun 8 characters')); ?></small>
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"
                                                        for="password-confirm"><?php echo e(translate('Confirm password')); ?></label>
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation" placeholder="********" required>
                                                    <small><?php echo e(translate('Minimun 8 characters')); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(addon_activation('referral_system')): ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label"
                                                            for="email"><?php echo e(translate('Referral Code')); ?></label>
                                                        <input type="text"
                                                            class="form-control<?php echo e($errors->has('referral_code') ? ' is-invalid' : ''); ?>"
                                                            value="<?php echo e(old('referral_code')); ?>"
                                                            placeholder="<?php echo e(translate('Referral Code')); ?>"
                                                            name="referral_code">
                                                        <?php if($errors->has('referral_code')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('referral_code')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('google_recaptcha_activation') == 1): ?>
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                                <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60><?php echo e(translate('By signing up you agree to our')); ?>

                                                    <a href="<?php echo e(env('APP_URL') . '/terms-conditions'); ?>"
                                                        target="_blank"><?php echo e(translate('terms and conditions')); ?>.</a>
                                                </span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['checkbox_example_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <div class="">
                                            <button type="submit"
                                                class="btn btn-block btn-primary"><?php echo e(translate('Create Account')); ?></button>
                                        </div>
                                        <?php if(get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1 || get_setting('apple_login_activation') == 1): ?>
                                            <div class="mt-4">
                                                <div class="separator mb-3">
                                                    <span class="bg-white px-3"><?php echo e(translate('Or Join With')); ?></span>
                                                </div>
                                                <ul class="list-inline social colored text-center">
                                                    <?php if(get_setting('facebook_login_activation') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>"
                                                                class="facebook"
                                                                title="<?php echo e(translate('Facebook')); ?>"><i
                                                                    class="lab la-facebook-f"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('google_login_activation') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>"
                                                                class="google"
                                                                title="<?php echo e(translate('Google')); ?>"><i
                                                                    class="lab la-google"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('twitter_login_activation') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>"
                                                                class="twitter"
                                                                title="<?php echo e(translate('Twitter')); ?>"><i
                                                                    class="lab la-twitter"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('apple_login_activation') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>"
                                                                class="apple"
                                                                title="<?php echo e(translate('Apple')); ?>"><i
                                                                    class="lab la-apple"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- search  -->
                <?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
                    <div class="p-4 bg-white rounded-top border-bottom"
                        style="box-shadow: 0 -25px 50px -12px rgb(0 0 0 / 25%);">
                        <div class="row">
                            <div class="col-xl-10 mx-auto">
                                <form action="<?php echo e(route('member.listing')); ?>" method="get">
                                    <div class="row gutters-5">
                                        <div class="col-lg">
                                            <div class="form-group mb-3">
                                                <label class="form-label"
                                                    for="name"><?php echo e(translate('Age From')); ?></label>
                                                <input type="number" name="age_from" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name"><?php echo e(translate('To')); ?></label>
                                                <input type="number" name="age_to" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group mb-3">
                                                <label class="form-label"
                                                    for="name"><?php echo e(translate('Religion')); ?></label>
                                                <?php $religions = \App\Models\Religion::all(); ?>
                                                <select name="religion_id" id="religion_id"
                                                    class="form-control aiz-selectpicker" data-live-search="true"
                                                    data-container="body">
                                                    <option value=""><?php echo e(translate('Choose One')); ?></option>
                                                    <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($religion->id); ?>"> <?php echo e($religion->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-group mb-3">
                                                <label class="form-label"
                                                    for="name"><?php echo e(translate('Mother Tongue')); ?></label>
                                                <?php $mother_tongues = \App\Models\MemberLanguage::all(); ?>
                                                <select name="mother_tongue" class="form-control aiz-selectpicker"
                                                    data-live-search="true" data-container="body">
                                                    <option value=""><?php echo e(translate('Select One')); ?></option>
                                                    <?php $__currentLoopData = $mother_tongues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mother_tongue_select): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($mother_tongue_select->id); ?>">
                                                            <?php echo e($mother_tongue_select->name); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <button type="submit"
                                                class="btn btn-block btn-primary mt-4"><?php echo e(translate('Search')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    <?php endif; ?>



    <!-- premium member Section -->
    <?php if(get_setting('show_premium_member_section') == 'on'): ?>
        <section class="pt-7 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3 text-dark"><?php echo e(get_setting('premium_member_section_title')); ?></h2>
                            <p class="fw-400 fs-16 opacity-60"><?php echo e(get_setting('premium_member_section_sub_title')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4"
                    data-md-items="3" data-sm-items="2" data-xs-items="1" data-dots='true' data-infinite='true'>
                    <?php $__currentLoopData = $premium_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box">
                            <?php echo $__env->make('frontend.inc.member_box_1',['member'=>$member], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- Banner section 1 -->
    <?php if(get_setting('show_home_banner1_section') == 'on' && get_setting('home_banner1_images') != null): ?>
        <section class="pt-7 bg-white">
            <div class="container">
                <div class="row gutters-10">
                    <?php $banner_1_imags = json_decode(get_setting('home_banner1_images')); ?>
                    <?php $__currentLoopData = $banner_1_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl col-md-6">
                            <div class="mb-3">
                                <a href="<?php echo e(json_decode(get_setting('home_banner1_links'), true)[$key]); ?>"
                                    class="d-block text-reset">
                                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                        data-src="<?php echo e(uploaded_asset($banner_1_imags[$key])); ?>"
                                        alt="<?php echo e(env('APP_NAME')); ?>" class="img-fluid lazyload w-100">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- How It Works Section -->
    <?php if(get_setting('show_how_it_works_section') == 'on' && get_setting('how_it_works_steps_titles') != null): ?>
        <section class="py-7 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3"><?php echo e(get_setting('how_it_works_title')); ?></h2>
                            <p class="fw-400 fs-16 opacity-60"><?php echo e(get_setting('how_it_works_sub_title')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row gutters-10">
                    <?php
                        $how_it_works_steps_titles = json_decode(get_setting('how_it_works_steps_titles'));
                        $step = 1;
                    ?>
                    <?php $__currentLoopData = $how_it_works_steps_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $how_it_works_steps_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg">
                            <div class="border p-3 mb-3">
                                <div class=" row align-items-center">
                                    <div class="col-7">
                                        <div class="text-primary fw-600 h1"><?php echo e($step++); ?></div>
                                        <div class="text-secondary fs-20 mb-2 fw-600"><?php echo e($how_it_works_steps_title); ?>

                                        </div>
                                        <div class="fs-15 opacity-60">
                                            <?php echo e(json_decode(get_setting('how_it_works_steps_sub_titles'), true)[$key]); ?>

                                        </div>
                                    </div>
                                    <div class="mt-3 col-5 text-right">
                                        <img src="<?php echo e(uploaded_asset(json_decode(get_setting('how_it_works_steps_icons'), true)[$key])); ?>"
                                            class="img-fluid h-80px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Trusted by Millions Section -->
    <?php if(get_setting('show_trusted_by_millions_section') == 'on'): ?>
        <section class="bg-center bg-cover min-vh-100 py-7 text-white d-flex align-items-center bg-fixed"
            style="background-image: url('<?php echo e(uploaded_asset(get_setting('trusted_by_millions_background_image'))); ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="text-center pb-12">
                            <h2 class="fw-600"><?php echo e(get_setting('trusted_by_millions_title')); ?></h2>
                            <div class="fs-16 fw-400"><?php echo e(get_setting('trusted_by_millions_sub_title')); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $homepage_best_features = json_decode(get_setting('homepage_best_features'));
                    ?>
                    <?php if(!empty($homepage_best_features)): ?>
                        <?php $__currentLoopData = $homepage_best_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $homepage_best_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg">
                                <div class="border rounded position-relative z-1 border-gray-600 overflow-hidden mt-4">
                                    <div class="absolute-full bg-dark opacity-60 z--1"></div>
                                    <div class="px-4 py-5 d-flex align-items-center justify-content-center">
                                        <img src="<?php echo e(uploaded_asset(json_decode(get_setting('homepage_best_features_icons'), true)[$key])); ?>"
                                            class="img-fluid h-20px">
                                        <span class="fs-17 ml-2"><?php echo e($homepage_best_feature); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- New Member Section -->
    <?php if(get_setting('show_new_member_section') == 'on'): ?>
        <section class="py-7 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3 text-dark"><?php echo e(get_setting('new_member_section_title')); ?></h2>
                            <p class="fw-400 fs-16 opacity-60"><?php echo e(get_setting('new_member_section_sub_title')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4"
                    data-md-items="3" data-sm-items="2" data-xs-items="1" data-dots='true' data-infinite='true'>
                    <?php $__currentLoopData = $new_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box">
                            <?php echo $__env->make('frontend.inc.member_box_1',['member'=>$member], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- happy Story Section -->
    <?php if(get_setting('show_happy_story_section') == 'on'): ?>
        <section class="py-7 bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3">Happy Stories</h2>
                        </div>
                    </div>
                </div>
                <div
                    class="card-columns column-gap-10 card-columns-xxl-4 card-columns-lg-3 card-columns-md-2 card-columns-1">
                    <?php
                        $happy_stories = \App\Models\HappyStory::where('approved', '1')
                            ->latest()
                            ->limit(get_setting('max_happy_story_show_homepage'))
                            ->get();
                    ?>
                    <?php $__currentLoopData = $happy_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $happy_story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $photo = explode(',', $happy_story->photos);
                        ?>
                        <div class="card border-gray-800 overflow-hidden mb-2">
                            <a href="<?php echo e(route('story_details', $happy_story->id)); ?>"
                                class="text-reset d-block position-relative">
                                <img src="<?php echo e(uploaded_asset($photo[0])); ?>" class="img-fluid">
                                <div class="absolute-bottom-left p-3">
                                    <div class="position-relative z-1 p-3">
                                        <div class="absolute-full z--1 bg-dark opacity-60"></div>
                                        <div class="text-primary text-truncate">
                                            <?php echo e($happy_story->user->first_name . ' & ' . $happy_story->partner_name); ?></div>
                                        <h2 class="h5 mb-0 fs-14 fw-400 lh-1-5 text-truncate-3">
                                            <?php echo e($happy_story->title); ?>

                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('happy_stories')); ?>" class="btn btn-primary"><?php echo e(translate('View More')); ?></a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(get_setting('show_homapege_package_section') == 'on'): ?>
        <section class="py-7 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center pb-6">
                            <h2 class="fw-600 text-dark"><?php echo e(get_setting('homepage_package_section_title')); ?></h2>
                            <div class="fs-16 fw-400"><?php echo e(get_setting('homepage_package_section_sub_title')); ?></div>
                        </div>
                    </div>
                </div>
                <div class="aiz-carousel" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1"
                    data-dots='true' data-infinite='true' data-autoplay='true'>
                    <?php $__currentLoopData = \App\Models\Package::where('active', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box">
                            <div class="overflow-hidden shadow-none mb-3 border-right">
                                <div class="card-body">
                                    <div class="text-center mb-4 mt-3">
                                        <img class="mw-100 mx-auto mb-4" src="<?php echo e(uploaded_asset($package->image)); ?>"
                                            height="130">
                                        <h5 class="mb-3 h5 fw-600"><?php echo e($package->name); ?></h5>
                                    </div>
                                    <ul class="list-group list-group-raw fs-15 mb-5">
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            <?php echo e($package->express_interest); ?> <?php echo e(translate('Express Interests')); ?>

                                        </li>
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            <?php echo e($package->photo_gallery); ?> <?php echo e(translate('Gallery Photo Upload')); ?>

                                        </li>
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            <?php echo e($package->contact); ?> <?php echo e(translate('Contact Info View')); ?>

                                        </li>
                                        <li class="list-group-item py-2 text-line-through">
                                            <?php if($package->auto_profile_match == 0): ?>
                                                <i class="las la-times text-danger mr-2"></i>
                                                <del
                                                    class="opacity-60"><?php echo e(translate('Show Auto Profile Match')); ?></del>
                                            <?php else: ?>
                                                <i class="las la-check text-success mr-2"></i>
                                                <?php echo e(translate('Show Auto Profile Match')); ?>

                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                    <div class="mb-5 text-dark text-center">
                                        <?php if($package->id == 1): ?>
                                            <span class="display-4 fw-600 lh-1 mb-0"><?php echo e(translate('Free')); ?></span>
                                        <?php else: ?>
                                            <span
                                                class="display-4 fw-600 lh-1 mb-0"><?php echo e(single_price($package->price)); ?></span>
                                        <?php endif; ?>
                                        <span class="text-secondary d-block"><?php echo e($package->validity); ?>

                                            <?php echo e(translate('Days')); ?></span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <?php if($package->id != 1): ?>
                                            <?php if(Auth::check()): ?>
                                                <a href="<?php echo e(route('package_payment_methods', encrypt($package->id))); ?>"
                                                    type="submit"
                                                    class="btn btn-primary"><?php echo e(translate('Purchase This Package')); ?></a>
                                            <?php else: ?>
                                                <button type="submit" onclick="loginModal()"
                                                    class="btn btn-primary"><?php echo e(translate('Purchase This Package')); ?></button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="javascript:void(0);"
                                                class="btn btn-light"><del><?php echo e(translate('Purchase This Package')); ?></del></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if(get_setting('show_homepage_review_section') == 'on' && get_setting('homepage_reviews') != null): ?>
        <section class="py-7 bg-cover bg-center text-white"
            style="background-image: url('<?php echo e(uploaded_asset(get_setting('homepage_review_section_background_image'))); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3"><?php echo e(get_setting('homepage_review_section_title')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-10 mx-auto">
                        <div class="aiz-carousel large-arrow" data-items="1" data-arrows='true' data-infinite='true'
                            data-autoplay='true'>
                            <?php $__currentLoopData = json_decode(get_setting('homepage_reviews')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-box">
                                    <div class="text-center px-lg-9">
                                        <img src="<?php echo e(uploaded_asset(json_decode(get_setting('homepage_reviewers_images'), true)[$key])); ?>"
                                            class="size-180px img-fit mx-auto rounded-circle border border-white border-width-5 shadow-lg mb-5">
                                        <div class="fs-18 fw-300 font-italic"><?php echo e($review); ?></div>
                                        <i class="las la-quote-right la-10x text-dark opacity-30"></i>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(get_setting('show_blog_section') == 'on'): ?>
        <section class="py-7 bg-white text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h2 class="fw-600 mb-3 text-dark"><?php echo e(get_setting('blog_section_title')); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="aiz-carousel gutters-10" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1"
                    data-arrows='true'>
                    <?php
                        $blogs = \App\Models\Blog::query()
                            ->where('status', 1)
                            ->latest()
                            ->limit(get_setting('max_blog_show_homepage'))
                            ->get();
                    ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="caorusel-box p-1">
                            <div class="card mb-3 overflow-hidden shadow-sm text-dark">
                                <a href="<?php echo e(route('blog.details', $blog->slug)); ?>" class="text-reset d-block">
                                    <img src="<?php echo e(uploaded_asset($blog->banner)); ?>" alt="<?php echo e($blog->title); ?>"
                                        class="h-200px img-fit">
                                </a>
                                <div class="p-4">
                                    <h2 class="fs-18 fw-600 mb-1">
                                        <a href="<?php echo e(route('blog.details', $blog->slug)); ?>" class="text-reset">
                                            <?php echo e($blog->title); ?>

                                        </a>
                                    </h2>
                                    <?php if($blog->category != null): ?>
                                        <div class="mb-2 opacity-50">
                                            <i><?php echo e($blog->category->category_name); ?></i>
                                        </div>
                                    <?php endif; ?>
                                    <p class="opacity-70 mb-4"><?php echo e($blog->short_description); ?></p>
                                    <a href="<?php echo e(route('blog.details', $blog->slug)); ?>"
                                        class="btn btn-soft-primary"><?php echo e(translate('View More')); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('blog')); ?>" class="btn btn-primary"><?php echo e(translate('View More')); ?></a>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.login_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.package_update_alert_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function loginModal() {
            $('#LoginModal').modal();
        }

        function package_update_alert() {
            $('.package_update_alert_modal').modal('show');
        }
    </script>
    <?php if(get_setting('google_recaptcha_activation') == 1): ?>
        <?php echo $__env->make('partials.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(addon_activation('otp_system')): ?>
        <?php echo $__env->make('partials.emailOrPhone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/index.blade.php ENDPATH**/ ?>