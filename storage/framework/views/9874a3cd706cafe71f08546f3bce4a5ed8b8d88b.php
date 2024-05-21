<?php
    if (Session::has('locale')) {
        $locale = Session::get('locale', Config::get('app.locale'));
    } else {
        $locale = env('DEFAULT_LANGUAGE');
    }
    $lang = \App\Models\Language::where('code', $locale)->first();
?>

<!DOCTYPE html>
<?php if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
    <html dir="rtl" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php else: ?>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php endif; ?>

<head>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="app-url" content="<?php echo e(getBaseURL()); ?>">
    <meta name="file-base-url" content="<?php echo e(getFileBaseURL()); ?>">
    <!-- Title -->
    <title><?php echo $__env->yieldContent('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto')); ?></title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', get_setting('meta_description')); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', get_setting('meta_keywords')); ?>">

    <?php echo $__env->yieldContent('meta'); ?>

    <?php if(!isset($page)): ?>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo e(config('app.name', env('APP_NAME'))); ?>">
        <meta itemprop="description" content="<?php echo e(get_setting('meta_description')); ?>">
        <meta itemprop="image" content="<?php echo e(uploaded_asset(get_setting('meta_image'))); ?>">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="<?php echo e(config('app.name', env('APP_NAME'))); ?>">
        <meta name="twitter:description" content="<?php echo e(get_setting('meta_description')); ?>">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="<?php echo e(uploaded_asset(get_setting('meta_image'))); ?>">

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo e(config('app.name', env('APP_NAME'))); ?>" />
        <meta property="og:type" content="Business Site" />
        <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>" />
        <meta property="og:image" content="<?php echo e(uploaded_asset(get_setting('meta_image'))); ?>" />
        <meta property="og:description" content="<?php echo e(get_setting('meta_description')); ?>" />
        <meta property="og:site_name" content="<?php echo e(get_setting('website_name')); ?>" />
        <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(uploaded_asset(get_setting('site_icon'))); ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">
    <link rel="stylesheet" href="/assets/css/vendors.css">
<link rel="stylesheet" href="/assets/css/aiz-core.css?v=<?php echo e(rand(1000, 9999)); ?>">

<?php if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
    <link rel="stylesheet" href="/assets/css/bootstrap-rtl.min.css">
<?php endif; ?>

    <script>
        var AIZ = AIZ || {};
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #6d6e6f;
        }

        :root {
            --primary: <?php echo e(get_setting('base_color', '#FD2C79')); ?>;
            --hov-primary: <?php echo e(get_setting('base_hov_color', '#0069d9')); ?>;
            --soft-primary: <?php echo e(hex2rgba(get_setting('base_hov_color', '#377dff'), 0.15)); ?>;
            --secondary: <?php echo e(get_setting('secondary_color', '#FD655B')); ?>;
            --soft-secondary: <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 0.15)); ?>;
        }

        .text-primary-grad {
            background: rgb(253, 41, 123);
            background: -moz-linear-gradient(0deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
            background: -webkit-linear-gradient(0deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
            background: linear-gradient(0deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary,
        .bg-primary-grad {
            background: rgb(253, 41, 123);
            background: -moz-linear-gradient(225deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
            background: -webkit-linear-gradient(225deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
            background: linear-gradient(225deg, <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?> 0%, <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?> 100%);
        }

        .fill-dark {
            fill: #4d4d4d;
        }

        .fill-primary-grad stop:nth-child(1) {
            stop-color: <?php echo e(hex2rgba(get_setting('secondary_color', '#FD655B'), 1)); ?>;
        }

        .fill-primary-grad stop:nth-child(2) {
            stop-color: <?php echo e(hex2rgba(get_setting('base_color', '#FD2C79'), 1)); ?>;
        }
    </style>

    <?php if(get_setting('google_analytics_activation') == 1): ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(env('GOOGLE_ANALYTICS_TRACKING_ID')); ?>"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '<?php echo e(env('GOOGLE_ANALYTICS_TRACKING_ID')); ?>');
        </script>
    <?php endif; ?>

    <?php if(get_setting('facebook_pixel_activation') == 1): ?>
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', <?php echo e(env('FACEBOOK_PIXEL_ID')); ?>);
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>/&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>

    <?php echo get_setting('header_script'); ?>


</head>



<body class="text-left">
 <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
.loader-wrapper {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loader {
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
<script>
$(document).ready(function () {
    $(".loader-wrapper").show();

    setTimeout(function () {
        $(".loader-wrapper").hide();
    }, 2000);
});

</script>
    <div
        class="aiz-main-wrapper d-flex flex-column position-relative <?php if(Route::currentRouteName() != 'home'): ?> pt-8 pt-lg-10 <?php endif; ?> bg-white">

        <?php echo $__env->make('frontend.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <?php if(get_setting('show_cookies_agreement') == 'on'): ?>
        <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    <?php echo e(strip_tags(get_setting('cookies_agreement_text'))); ?>

                </div>
                <button class="btn btn-primary aiz-cookie-accepet">
                    <?php echo e(translate('Ok. I Understood')); ?>

                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('modal'); ?>

    <div class="modal fade account_status_change_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="<?php echo e(route('member.account_deactivation')); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="deacticvation_status" id="deacticvation_status" value="">
                        <h4 class="modal-title h6 mb-3" id="confirmation_note" value=""></h4>
                        <hr>
                        <button type="submit" class="btn btn-primary mt-2"><?php echo e(translate('Yes')); ?></button>
                        <button type="button" class="btn btn-danger mt-2"
                            data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade account_delete_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="<?php echo e(route('member.account_delete')); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <h4 class="modal-title h6 mb-3" id="delete_confirmation_note" value=""></h4>
                        <hr>
                        <button type="submit" class="btn btn-primary mt-2"><?php echo e(translate('Yes')); ?></button>
                        <button type="button" class="btn btn-danger mt-2"
                            data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(get_setting('facebook_chat_activation') == 1): ?>
        <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v3.3'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="<?php echo e(env('FACEBOOK_PAGE_ID')); ?>">
        </div>
    <?php endif; ?>

    <script src="/assets/js/vendors.js"></script>
<script src="/assets/js/aiz-core.js"></script>

    <?php if(get_setting('firebase_push_notification') == 1): ?>
        
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->

        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "<?php echo e(env('FCM_API_KEY')); ?>",
                authDomain: "<?php echo e(env('FCM_AUTH_DOMAIN')); ?>",
                projectId: "<?php echo e(env('FCM_PROJECT_ID')); ?>",
                storageBucket: "<?php echo e(env('FCM_STORAGE_BUCKET')); ?>",
                messagingSenderId: "<?php echo e(env('FCM_MESSAGING_SENDER_ID')); ?>",
                appId: "<?php echo e(env('FCM_APP_ID')); ?>",
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                messaging.requestPermission()
                .then(function() {
                    return messaging.getToken()
                }).then(function(token) {

                    $.ajax({
                        url: '<?php echo e(route('fcmToken')); ?>',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            fcm_token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {

                        },
                        error: function (err) {
                            console.log(" Can't do because: " + err);
                        },
                    });

                }).catch(function(err) {
                    console.log(`Token Error :: ${err}`);
                });
            }

            initFirebaseMessagingRegistration();

            messaging.onMessage(function({
                data: {
                    body,
                    title
                }
            }) {
                new Notification(title, {
                    body
                });
            });
        </script>
        
    <?php endif; ?>

    <?php echo $__env->yieldContent('script'); ?>

    <script type="text/javascript">
        <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            AIZ.plugins.notify('<?php echo e($message['level']); ?>', '<?php echo e($message['message']); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
            function account_deactivation() {
                var status = <?php echo e(Auth::user()->deactivated); ?>

                $('.account_status_change_modal').modal('show');
                if (status == 0) {
                    $('#deacticvation_status').val(1);
                    $('#confirmation_note').html('<?php echo e(translate('Do You Realy Want To Deactive Your Account')); ?>');
                } else {
                    $('#deacticvation_status').val(0);
                    $('#confirmation_note').html('<?php echo e(translate('Are You Sure To Reactive Your Account')); ?>');
                }
            }
        <?php endif; ?>
        <?php if(Auth::check() && Auth::user()->user_type == 'member'): ?>
            function account_delete() {
                var status = <?php echo e(Auth::user()->deactivated); ?>

                $('.account_delete_modal').modal('show');
                    $('#delete_confirmation_note').html('<?php echo e(translate('Do You Really Want To Delete Your Account')); ?>');
            }
        <?php endif; ?>
    </script>


    <?php if(env('DEMO_MODE') == 'On'): ?>
        <script type="text/javascript">
            // Login credentials autoFill for demo
            function autoFill1() {
                $('#email').val('user2@example.com');
                $('#password').val('12345678');
            }

            function autoFill2() {
                $('#email').val('user17@example.com');
                $('#password').val('12345678');
            }
        </script> <?php endif; ?>

    <?php echo get_setting('footer_script'); ?>


</body>

</html>
<?php /**PATH /Users/jeetpandya/Desktop/workspace/MySmartSolution/nikaah/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>