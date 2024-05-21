

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="contact-us">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="contact-us my-5">
                        <h2 class="text-center mb-4"><?php echo e(translate('Can we help you?')); ?></h2>
                        <div class="card">
                            <div class="card-body">
                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="text-danger my-2 font-weight-bold"><?php echo e($error); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <form action="<?php echo e(route('contact-us.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label class="form-label text-primary-grad"> <?php echo e(translate('Name')); ?> <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="<?php echo e(translate('Enter your full name')); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-primary-grad"> <?php echo e(translate('Email')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="<?php echo e(translate('Enter Your E-mail')); ?>" required>
                                        <div class="form-text">
                                            <?php echo e(translate('Please, enter the email address where you wish to receive our
                                                                                                                                    answer.')); ?>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-primary-grad"> <?php echo e(translate('Subject')); ?> <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="<?php echo e(translate('Write the subject here')); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-primary-grad"> <?php echo e(translate('Description')); ?> <span
                                                class="text-danger">*</span> </label>
                                        <textarea class="form-control" rows="8" placeholder=" <?php echo e(translate('Write your description here')); ?>"
                                            name="description" required style="resize: none;"></textarea>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-block btn-primary"><?php echo e(translate('Send')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/contact_us.blade.php ENDPATH**/ ?>