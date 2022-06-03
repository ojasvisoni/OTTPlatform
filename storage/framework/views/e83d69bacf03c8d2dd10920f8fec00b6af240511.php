<!DOCTYPE html>
<html lang="en" <?php if(selected_lang()->rtl == 1): ?> dir="rtl" <?php endif; ?>>
<head>
    <title><?php echo e($w_title); ?></title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="Description" content="<?php echo e($description); ?>" />
    <meta name="keyword" content="<?php echo e($w_title); ?>, <?php echo e($keyword); ?>">
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.png')); ?>">
    <!-- favicon-icon -->
    <!-- theme style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- google font -->
    <link rel="stylesheet" href="<?php echo e(url('css/custom_prt.css')); ?>">
    <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- bootstrap css -->
    <?php else: ?>
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- bootstrap css -->
    <link href="<?php echo e(url('css/bootstrap.rtl.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- bootstrap rtl css -->
    <?php endif; ?>
    <link href="https://vjs.zencdn.net/6.6.0/video-js.css" rel="stylesheet">
    <!-- videojs css -->
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- fontawsome css -->
    <?php
    if(Schema::hasTable('color_schemes')){
    $color = App\ColorScheme::first();
    }
    ?>
    <?php if(isset($color)): ?>
    <?php if($color->color_scheme == 'dark'): ?>
    <style type="text/css">
        :root {
        --body_bg_color: #111;
        --btn-prime_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --footer_bg_color: <?php echo e($color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color); ?>;
        --background_black_bg_color: #111;
        --background_white_bg_color: #FFF;
        --background_dark-black_bg_color: #000;
        --back2top_bg_color: #DDD;
        --bg-success_bg_color: #198754;
        --blue_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --light-blue_bg_color: #90DFFE;
        --watchhistory_remove_bg_color: #D9534F;
        --btn-default_bg_color: #515151;
        --blue_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --light-grey_border_color: #B1B1B1;
        --btn-prime_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --see-more_border_color: #B1B1B1;
        --btn-default_border_color: #515151;
        --text_blue_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --text_black_color: #111;
        --text_light_grey_color: #B1B1B1;
        --text_light_blue_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
        --text_grey_color: #949494;
        --text_white_color: #FFF;
        /*add more */
        --navigation_bg_color: <?php echo e($color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color); ?>;
        --back2top_bg_color_on_hover:  <?php echo e($color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover); ?>;
        --back2top_color_on_hover: <?php echo e($color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover); ?>;
        }
    </style>
    <?php else: ?>
    <style type="text/css">
        :root {
        --body_bg_color: #111;
        --btn-prime_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --footer_bg_color: <?php echo e($color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color); ?>;
        --background_black_bg_color: #111;
        --background_white_bg_color: #FFF;
        --background_dark-black_bg_color: #000;
        --back2top_bg_color: #DDD;
        --bg-success_bg_color: #198754;
        --blue_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --light-blue_bg_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
        --watchhistory_remove_bg_color: #D9534F;
        --btn-default_bg_color: #515151;
        --blue_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --light-grey_border_color: #B1B1B1;
        --btn-prime_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --see-more_border_color: #B1B1B1;
        --btn-default_border_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
        --text_blue_color:<?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
        --text_black_color: #111;
        --text_light_grey_color: #B1B1B1;
        --text_light_blue_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
        --text_grey_color: #949494;
        --text_white_color: #FFF;
        --white: #FFF;
        --navigation_bg_color: <?php echo e($color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color); ?>;
        --back2top_bg_color_on_hover:  <?php echo e($color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover); ?>;
        --back2top_color_on_hover: <?php echo e($color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover); ?>;
        }
    </style>
    <?php endif; ?>
    <?php if($color->color_scheme == 'light'): ?>
    <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/style-light.css')); ?>" rel="stylesheet" type="text/css"/>
    <?php else: ?>
    <link href="<?php echo e(url('css/style-light-rtl.css')); ?>" rel="stylesheet" type="text/css"/>
    <?php endif; ?>
    <?php else: ?>
    <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/>
    <?php else: ?>
    <link href="<?php echo e(url('css/style-rtl.css')); ?>" rel="stylesheet" type="text/css"/>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <link href="<?php echo e(asset('css/custom-style.css')); ?>" rel="stylesheet" type="text/css"/>
</head>
<body class="login-body" style="background: url(<?php echo e(url('images/cus-img/sign-in-bg1.jpg')); ?>) !important; background-size: contain !important; background-position: center !important;">
    <div class="signup__container container sign-in-main-block">
        <div class="sing_page">
            <div class="row">
                
                <div class="col-sm-8">
                    <div class="container__child signup__thumbnail">
                        <div class="thumbnail__logo">
                            <?php if($logo != null): ?>
                            <!--                        <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>-->
                            <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/logo.png')); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
                            <?php endif; ?>
                        </div>
                        <div class="thumbnail__content">
                            <h1>Join OOV- the Largest Internet TV Provider in India for Hindi and Bhojpuri.</h1>
                            <div class="login_p">
                                <p>OOV Media merges the power of technology and convenience of internet to bring the best of entertainment to your mobile, laptop and PC. Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows &amp; Web Series across multiple languages- English, Filipino, Hindi, Punjabi and Bhojpuri.</p>
                            </div>
                            <h2>Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows & Web Series. </h2>
                        </div>
                        <!--          <div class="signup__overlay"></div>-->
                        <div class="social_icons">
                            <div class="footer-widgets social-widgets social-btns">
                              <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>          
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>          
                                <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="signup-thumbnail">
                        <?php if($logo != null): ?>
                        <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
                        <?php endif; ?>  
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="container__child signup__form">
                        <?php if(Session::has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                        <?php endif; ?>
                        <?php if(Session::has('deleted')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('deleted')); ?>

                        </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email"><?php echo e(__('staticwords.email')); ?></label>
                                <input id="email" type="text" class="form-control" name="email" placeholder="<?php echo e(__('staticwords.enteryouremail')); ?>" value="<?php echo e(old('email')); ?>" required autofocus>
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password"><?php echo e(__('staticwords.password')); ?></label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(__('staticwords.enteryourpassword')); ?>" value="<?php echo e(old('password')); ?>">
                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="remember form-group<?php echo e($errors->has('remember') ? ' has-error' : ''); ?>">
                                <label><input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><?php echo e(__('staticwords.rememberme')); ?></label>
                            </div>
                            <div class="m-t-lg">
                                <input class="btn btn--form btn--form-login" type="submit" value=<?php echo e(__('staticwords.login')); ?> />
                                <div class="social-login">
                                    <?php if($configs->fb_login==1): ?>
                                    <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn--form btn--form-login fb-btn" title="<?php echo e(__('staticwords.loginwithfacebook')); ?>"><i class="fa fa-facebook-f"></i><?php echo e(__('staticwords.loginwithfacebook')); ?></a>
                                    <?php endif; ?>
                                    <?php if($configs->google_login==1): ?>
                                    <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn--form btn--form-login gplus-btn" title="<?php echo e(__('staticwords.loginwithgoogle')); ?>"><i class="fa fa-google"></i> <?php echo e(__('staticwords.loginwithgoogle')); ?></a>
                                    <?php endif; ?>
                                    <?php if($configs->amazon_login==1): ?>
                                    <a href="<?php echo e(url('/auth/amazon')); ?>" class="btn btn--form btn--form-login amazon-btn" title="<?php echo e(__('staticwords.loginwithamazon')); ?>"><i class="fa fa-amazon"></i> <?php echo e(__('staticwords.loginwithamazon')); ?></a>
                                    <?php endif; ?>
                                    <?php if($configs->gitlab_login==1): ?>
                                    <a style="background: linear-gradient(270deg, #48367d 0%, #241842 100%);" href="<?php echo e(url('/auth/gitlab')); ?>" class="btn btn--form btn--form-login" title="<?php echo e(__('staticwords.loginwithgitlab')); ?>"><i class="fa fa-gitlab"></i> <?php echo e(__('staticwords.loginwithgitlab')); ?></a>
                                    <?php endif; ?>
                                </div>
                                <a class="signup__link pull-left" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('staticwords.forgotyourpassword')); ?></a>
                                <a class="signup__link pull-right" href="<?php echo e(url('register')); ?>"><?php echo e(__('staticwords.registerhere')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.popover.js')); ?>"></script> <!-- bootstrap popover js -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.curtail.min.js')); ?>"></script> <!-- menumaker js -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.scrollSpeed.js')); ?>"></script> <!-- owl carousel js -->
    <script type="text/javascript" src="<?php echo e(asset('js/custom-js.js')); ?>"></script>
</body>
</html><?php /**PATH /var/www/html/oovmedia.com/resources/views/auth/login.blade.php ENDPATH**/ ?>