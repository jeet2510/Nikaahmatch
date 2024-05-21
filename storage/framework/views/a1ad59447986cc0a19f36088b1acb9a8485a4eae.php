<div class="modal fade" id="LoginModal">
    <div class="modal-dialog modal-dialog-zoom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600"><?php echo e(translate('Login')); ?></h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="form-label" for="email">
                                <?php echo e(addon_activation('otp_system') ? translate('Email/Phone') : translate('Email')); ?>

                            </label>
                            <?php if(addon_activation('otp_system')): ?>
                                <input type="text" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email Or Phone')); ?>" name="email" id="email">
                            <?php else: ?>
                                <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email" id="email">
                            <?php endif; ?>
                            <?php if(addon_activation('otp_system')): ?>
                                <span class="opacity-60"><?php echo e(translate('Use country code before number')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password"><?php echo e(translate('Password')); ?></label>
                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="********" required>
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

                        <div class="mb-3 text-right">
                            <a class="link-muted text-capitalize font-weight-normal" href="<?php echo e(route('password.request')); ?>"><?php echo e(translate('Forgot Password?')); ?></a>
                        </div>

                        
                            <button type="submit" class="btn btn-block btn-primary"><?php echo e(translate('Login to your Account')); ?></button>
                        
                    </form>
                    <?php if(env("DEMO_MODE") == "On"): ?>
                        <div class="mb-4 mt-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>user2@example.com</td>
                                        <td>12345678</td>
                                        <td><button class="btn btn-outline-primary btn-xs" onclick="autoFill1()"><?php echo e(translate('Copy')); ?></button></td>
                                    </tr>
                                    <tr>
                                        <td>user17@example.com</td>
                                        <td>12345678</td>
                                        <td><button class="btn btn-outline-primary btn-xs" onclick="autoFill2()"><?php echo e(translate('Copy')); ?></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>


                    
                    <?php if(get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1 || get_setting('apple_login_activation') == 1): ?>
                        <div class="separator mb-3 mt-4">
                            <span class="bg-white px-3 opacity-60"><?php echo e(translate('Or Login With')); ?></span>
                        </div>
                        <ul class="list-inline social colored text-center mb-3">
                            <?php if(get_setting('facebook_login_activation') == 1): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="facebook">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(get_setting('google_login_activation') == 1): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="google">
                                        <i class="lab la-google"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(get_setting('twitter_login_activation') == 1): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="twitter">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(get_setting('apple_login_activation') == 1): ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>" class="apple">
                                        <i class="lab la-apple"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="text-center">
                        <p class="text-muted mb-0"><?php echo e(translate("Don't have an account?")); ?></p>
                        <a href="<?php echo e(route('register')); ?>"><?php echo e(translate('Create an account')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/modals/login_modal.blade.php ENDPATH**/ ?>