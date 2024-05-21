<style>
    .input-group {
        display: flex;
        position: relative;
    }

    .input-group .form-control {
        flex: 1;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
<?php if(isset($validator)): ?>
    ;
    <?php
    
    print_r($validator);
    ?>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
    <div class="py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-5 text-center">
                                <h1 class="h3 text-primary mb-0"><?php echo e(translate('Create Your Account')); ?></h1>
                                <p><?php echo e(translate('Fill out the form to get started')); ?>.</p>
                            </div>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form class="form-default" id="reg-form" role="form" action="<?php echo e(route('register')); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="on_behalf"><?php echo e(translate('Created By')); ?></label>
                                            <?php $on_behalves = \App\Models\OnBehalf::all();
											 ?>
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
                                                    <option value="<?php echo e($on_behalf->id); ?>"><?php echo e($on_behalf->name); ?></option>
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
                                            <label class="form-label" for="name"><?php echo e(translate('First Name')); ?></label>

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
                                                placeholder="<?php echo e(translate('First Name')); ?>"
                                                value="<?php echo e(old('first_name')); ?>" onchange="validation();" required>
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
                                            <label class="form-label" for="name"><?php echo e(translate('Middle Name')); ?></label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="middle_name" id="middle_name"
                                                placeholder="<?php echo e(translate('Middle Name')); ?>"
                                                value="<?php echo e(old('middle_name')); ?>">
                                            <?php $__errorArgs = ['middle_name'];
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
									 <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="name"><?php echo e(translate('Last Name')); ?></label>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="last_name" id="last_name" placeholder="<?php echo e(translate('Last Name')); ?>"
                                                value="<?php echo e(old('last_name')); ?>">
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
                             <div class="col-lg-3">
									 
                                        <div class="form-group mb-3 ">
										      <?php 
											$countries = \App\Models\CountryCode::all();
											?>
                                              <label class="form-label"
                                                for="country_code"><?php echo e(translate('Country Code')); ?></label>
                                          
                                             
                                            <select name="country_code" id="country_code"class="form-control aiz-selectpicker"  >
                                                         
                                           <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($code->phonecode); ?>" <?php if($code->phonecode=='971'): ?>selected <?php endif; ?> >+<?php echo e($code->phonecode); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
										 
                                        </div>
                                    </div>
								 
                                    <div class="col-lg-5">
									 
                                        <div class="form-group mb-3">
										     
                                              <label class="form-label"
                                                for="phone"><?php echo e(translate('Mobile Number')); ?></label>
                                             
											<input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                onchange="validation();" name="phone" value="<?php echo e(old('phone')); ?>"
                                                id="phone" placeholder="<?php echo e(translate('Mobile Number')); ?>">
                                            <?php $__errorArgs = ['phone'];
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
                                            <label class="form-label" for="gender"><?php echo e(translate('Gender')); ?></label>
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
                                            <input type="text" onchange="validation();"
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
                                                autocomplete="off" value="<?php echo e(old('date_of_birth')); ?>" required>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label"
                                                for="email"><?php echo e(translate('Email address')); ?></label>
                                            <input type="email" onchange="validation();"
                                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                                id="signinSrEmail" value="<?php echo e(old('email')); ?>"
                                                placeholder="<?php echo e(translate('Email Address')); ?>">
                                            <?php $__errorArgs = ['email'];
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
                                        <div class="form-group">
                                            <label class="form-label" for="password"><?php echo e(translate('Password')); ?></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                    onchange="validation();" id="password"
                                                    value="<?php echo e(old('password')); ?>" placeholder="********"
                                                    aria-label="********" required>
                                                <div class="password-toggle">
                                                    <span class="input-group-text">
                                                        <i class="toggle-password fas fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small><?php echo e(translate('Minimum 8 characters')); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label"
                                                for="password-confirm"><?php echo e(translate('Confirm password')); ?></label>
                                            <input type="password" class="form-control" value="<?php echo e(old('first_name')); ?>"
                                                id="password_confirmation" onchange="validation();"
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
                                                    placeholder="<?php echo e(translate('Referral Code')); ?>" name="referral_code">
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

                                <div class="mb-5">
                                    <button type="submit" class="btn btn-block btn-primary"
                                        id="submitBtn"><?php echo e(translate('Create Account')); ?></button>
                                    <button type="button" class="btn btn-block btn-primary" id="disable"
                                        disable><?php echo e(translate('Fill Required Details')); ?></button>
                                    <div id="errorMsg" class="text-danger mt-2" style="display: none;"></div>
                                </div>
                                <?php if(get_setting('google_login_activation') == 1 ||
                                        get_setting('facebook_login_activation') == 1 ||
                                        get_setting('twitter_login_activation') == 1 ||
                                        get_setting('apple_login_activation') == 1): ?>
                                    <div class="mb-5">
                                        <div class="separator mb-3">
                                            <span class="bg-white px-3"><?php echo e(translate('Or Join With')); ?></span>
                                        </div>
                                        <ul class="list-inline social colored text-center">
                                            <?php if(get_setting('facebook_login_activation') == 1): ?>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>"
                                                        class="facebook" title="<?php echo e(translate('Facebook')); ?>"><i
                                                            class="lab la-facebook-f"></i></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(get_setting('google_login_activation') == 1): ?>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>"
                                                        class="google" title="<?php echo e(translate('Google')); ?>"><i
                                                            class="lab la-google"></i></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(get_setting('twitter_login_activation') == 1): ?>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>"
                                                        class="twitter" title="<?php echo e(translate('Twitter')); ?>"><i
                                                            class="lab la-twitter"></i></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(get_setting('apple_login_activation') == 1): ?>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>"
                                                        class="apple" title="<?php echo e(translate('Apple')); ?>"><i
                                                            class="lab la-apple"></i></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <div class="text-center">
                                    <p class="text-muted mb-0"><?php echo e(translate('Already have an account?')); ?></p>
                                    <a href="<?php echo e(route('login')); ?>"><?php echo e(translate('Login to your account')); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade interest_reject_modal" id="updateMassageModal" tabindex="-1" role="dialog"
        aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Complete your profile !')); ?></h4>
                </div>
                <div class="modal-body">
                    <p class="mt-1">Your account is not yet approved by admin. Please wait for approval.</p>
                    <button type="button" class="btn btn-info mt-2 action-btn"
                        data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add Font Awesome for eye icon (if not already added) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            validation();
        });

        function validation() {
            var inputValue = document.getElementById('first_name').value;
            var phone = document.getElementById('phone').value;
            var date_of_birth = document.getElementById('date_of_birth').value;
            var email = document.getElementById('signinSrEmail').value;
            var password = document.getElementById('password').value;
            var password_confirmation = document.getElementById('password_confirmation').value;

            var submitBtn = document.getElementById('submitBtn');
            var disable = document.getElementById('disable');

            if (inputValue === '' || phone === '' || date_of_birth === '' || email === '' || password === '' ||
                password_confirmation === '') {
                submitBtn.style.display = 'none';
                disable.style.display = 'block';
            } else {
                disable.style.display = 'none';
                submitBtn.style.display = 'block';
            }

        }
    </script>
    <script>
        $(document).ready(function() {
            $('.password-toggle').each(function() {
                let input = $(this).prev('.form-control');
                let eye = $(this);

                eye.on('click', function() {
                    if (input.attr('type') === 'password') {
                        input.attr('type', 'text');
                        // eye.removeClass('.fa-eye-slash').addClass('.fa-eye');
                    } else {
                        input.attr('type', 'password');
                        // eye.removeClass('fa-eye').addClass('fa-eye-slash');
                    }
                });
            });
        });
    </script>

    <script>
        /* document.addEventListener('DOMContentLoaded', function () {
            var form = $("#reg-form");
            var submitBtn = $("#submitBtn");
            var errorMsg = $("#errorMsg");

            // Initialize jQuery Validation
            form.validate({
                rules: {
                    first_name: "required",
                    phone: "required",
                    date_of_birth: "required",
                    email: {
                        required: true,
                        email: true
                    },
    				password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    checkbox_example_1: "required"
                },
                messages: {
                    first_name: "Please enter your First Name.",
                    phone: "Please enter your Mobile Number.",
                    date_of_birth: "Please enter your Date of Birth.",
                    email: "Please enter a valid email address.",
                    password: {
                        required: "",
                        minlength: "",
                    },
                    password_confirmation: {
                        required: "Please confirm your password.",
                        !equalTo: "Password and Confirm Password must match."
                    },
                    checkbox_example_1: "Please agree to the terms and conditions."
                },
                errorPlacement: function (error, element) {
            // Check if the element has a specific ID for error placement
            var errorElementId = element.attr('id') + '_error';
            var errorElement = $("#" + errorElementId);

            if (errorElement.length) {
                // If the error element exists, display the error message in it
                errorElement.html(error);
            } else {
                // Otherwise, display the error message after the input element
                error.insertAfter(element);
            }
        },
                submitHandler: function (form) {
                    // Log the form data
                    console.log($(form).serializeArray());
                    // Your existing submit handler code...
                }
            });

        });*/
    </script>

<script>
    $(document).ready(function () {
        // Target the form by its ID
        var form = $('#reg-form');

        // Show loader on form submission
        form.on('submit', function () {
            $('.loader-wrapper').show();
        });
    });
</script>

    <?php if(get_setting('google_recaptcha_activation') == 1): ?>
        <?php echo $__env->make('partials.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(addon_activation('otp_system')): ?>
        <?php echo $__env->make('partials.emailOrPhone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/user_registration.blade.php ENDPATH**/ ?>