<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(__('adminstaticwords.Admin')); ?> - <?php echo e($w_title); ?></title>
  <!-- favicon-icon -->
  <link rel="icon" type="image/icon" href="<?php echo e(url('images/favicon/favicon.png')); ?>" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" />
  <!-- Material Icons -->
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/button.datatable.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/datatable.min.css')); ?>" />

  <link href="<?php echo e(url('css/datatable_material.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(url('css/dataTables.material.min.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(url('css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
  

  <link rel="stylesheet" href="<?php echo e(url('css/maincss.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/smoothness_jquery-ui.css')); ?>" type="text/css" />


  <!-- Jquery Ui Css -->
  <link rel="stylesheet" href="<?php echo e(url('css/jquery-ui.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/jquery-jvectormap.css')); ?>" />
  <!-- Admin (main) Style Sheet -->
  <link rel="stylesheet" href="<?php echo e(url('css/admin.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/bootstrap-tagsinput.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/custom-style.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/star-rating.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(url('css/bootstrap-colorpicker.min.css')); ?>" />

  <!-- select 2 -->

  <link href="<?php echo e(url('css/select2.min.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/daterangepicker.css')); ?>" />



  <?php echo midia_css(); ?>


  <script>
    window.Laravel = '<?php echo json_encode(['csrfToken' => csrf_token()]); ?>';
  </script>
  <style media="screen">
    .ht::first-letter {
      text-transform: uppercase;
    }
  </style>

  <?php echo $__env->yieldContent('stylesheet'); ?>
</head>

<body class="hold-transition skin-blue" onload="display_ct()">
  <div class="loading-block">
    <div class="loading z-depth-4"></div>
  </div>
  <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/admin')); ?>" class="logo" title="<?php echo e($w_title); ?>">
        <?php if(isset($logo)): ?>
        <img src="<?php echo e(url('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
        <?php endif; ?>
      </a>
      <?php
      $nav_menus=App\Menu::all();
      ?>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only"><?php echo e(__('adminstaticwords.ToggleNavgation')); ?></span>
        </a>
        <?php if(isset($nav_menus) && count($nav_menus) > 0): ?>
        <a href="<?php echo e(isset($nav_menus[0]) ? route('home', $nav_menus[0]->slug) : '#'); ?>" target="_blank"
          class="visit-site-btn btn" title="<?php echo e(__('adminstaticwords.VisitSite')); ?>"><?php echo e(__('adminstaticwords.VisitSite')); ?>

          <i class="material-icons right">keyboard_arrow_right</i></a>
        <?php else: ?>
        <a href="#" data-toggle="tooltip" data-placement="bottom"
          data-original-title="<?php echo e(__('adminstaticwords.Pleasecreateatleastonemenutovisitthesite')); ?>"
          class="visit-site-btn btn"><?php echo e(__('adminstaticwords.VisitSite')); ?> <i
            class="material-icons right">keyboard_arrow_right</i></a>
        <?php endif; ?>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="nav-time animated flipInX">
              <i class="fa fa-clock-o mr-1"></i> <?php echo e(__('Your Time is :')); ?> <b id='ct1'></b>
            </li>
            <li class="dropdown admin-nav add-icon">
              <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i
                  class="material-icons">add</i></a>
              <ul class="dropdown-menu animated flipInX">
                <li><a href="<?php echo e(route('movies.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('Add Movie')); ?> </a></li>
                <li><a href="<?php echo e(route('tvseries.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('Add Tvseries')); ?> </a>
                </li>
                <li><a href="<?php echo e(route('livetv.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('Add Livetv')); ?> </a>
                </li>
                <li><a href="<?php echo e(route('liveevent.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('Add Liveevent')); ?>

                  </a></li>
                <li><a href="<?php echo e(route('blog.create')); ?>"><i class="material-icons">add</i> <?php echo e(__('Add Blog')); ?> </a></li>

              </ul>
            </li>
            <li class="dropdown admin-nav lang-nav">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i
                  class="material-icons">translate</i>
                <?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></button>
              <ul class="dropdown-menu animated flipInX">
                <?php if(isset($lang) && count($lang) > 0): ?>
                <?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('languageSwitch', $langitem->local)); ?>"><?php echo e($langitem->name); ?> (<?php echo e($langitem->local); ?>)
                  </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </li>
            <li class="admin-nav animated flipInX" id="fullscreen">
              <a onclick="openFullscreen();" class="fullscreen"> <i class="material-icons arrow">fullscreen</i></a>
            </li>
            <li class="dropdown admin-nav">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i
                  class="material-icons">account_circle</i></button>
              <ul class="dropdown-menu animated flipInX">
                <li><a href="<?php echo e(url('admin/profile')); ?>" title="My Profile"><?php echo e(__('adminstaticwords.MyProfile')); ?></a></li>
                <li>
                  <a href="<?php echo e(route('custom.logout')); ?>" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" title="<?php echo e(__('logout')); ?>">
                    <?php echo e(__('adminstaticwords.Logout')); ?>

                  </a>
                  <form id="logout-form" action="<?php echo e(route('custom.logout')); ?>" method="GET">
                    <?php echo e(csrf_field()); ?>

                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="background-image: url(<?php echo e(url('images/sidebar-7.jpg')); ?>);">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <i class="material-icons">account_circle</i>
          </div>
          <div class="pull-left info">
            <h4 class="user-name"><?php echo e(ucfirst(Auth::user()->name)); ?></h4>
            <?php if(Auth::user()->is_admin == 1): ?>
            <p><?php echo e(auth()->user()->getRoleNames()[0]); ?></p>
            <?php else: ?>
            <p><?php echo e(__('adminstaticwords.Producer')); ?></p>
            <?php endif; ?>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <?php if(Auth::user()->is_assistant != 1): ?>
          <li><a class="<?php echo e(Nav::isRoute('dashboard')); ?>" href="<?php echo e(url('/admin')); ?>"
              title="<?php echo e(__('adminstaticwords.Dashboard')); ?>" id="dashboard"><i class="material-icons">dashboard</i>
              <span><?php echo e(__('adminstaticwords.Dashboard')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.view','roles.view'])): ?>
          <li class="treeview">
            <a href="#" class="<?php echo e(Nav::isResource('users')); ?><?php echo e(Nav::isResource('roles')); ?> " title="Users">
              <i class="material-icons">people</i> <span><?php echo e(__('adminstaticwords.Users')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('users')); ?>" href="<?php echo e(url('/admin/users')); ?>" title="<?php echo e(__('Packages')); ?>"><i
                    class="fa fa-circle-o"></i> <span><?php echo e(__('adminstaticwords.Users')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('roles')); ?>" href="<?php echo e(route('roles.index')); ?>"
                  title="<?php echo e(__('Roles & Permissions')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('Roles & Permissions')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['menu.view','menu.create','menu.edit','menu.delete'])): ?>
          <li><a class="<?php echo e(Nav::isResource('menu')); ?>" class="<?php echo e(Nav::isResource('menu')); ?>"
              href="<?php echo e(url('/admin/menu')); ?>" title="<?php echo e(__('adminstaticwords.Menu')); ?>" id="menu"><i
                class="material-icons">menu</i> <span><?php echo e(__('adminstaticwords.MenuNavigation')); ?></span></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['package.view','package-feature.view'])): ?>
          <li class="treeview">
            <a href="#" class="<?php echo e(Nav::isResource('packages')); ?><?php echo e(Nav::isResource('package_feature')); ?> "
              title="Producer Settings">
              <i class="material-icons">poll</i> <span><?php echo e(__('adminstaticwords.PackageSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('packages')); ?>" href="<?php echo e(url('/admin/packages')); ?>"
                  title="<?php echo e(__('Packages')); ?>" id="package"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Packages')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package-feature.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('package_feature')); ?>" href="<?php echo e(url('/admin/package_feature')); ?>"
                  title="<?php echo e(__('Packages Feature')); ?>" id="package"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('Package Feature')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.view')): ?>
          <li><a class="<?php echo e(Nav::isResource('movies')); ?>" href="<?php echo e(url('/admin/movies')); ?>"
              title="<?php echo e(__('adminstaticwords.Movies')); ?>" id="movies"><i class="material-icons">ondemand_video</i>
              <span><?php echo e(__('adminstaticwords.Movies')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tvseries.view')): ?>
          <li><a class="<?php echo e(Nav::isResource('tvseries')); ?>" href="<?php echo e(url('/admin/tvseries')); ?>"
              title="<?php echo e(__('adminstaticwords.TVSeries')); ?>" id="tvseries"><i class="material-icons">movie_filter</i>
              <span><?php echo e(__('adminstaticwords.TVSeries')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('livetv.view')): ?>
          <li><a class="<?php echo e(Nav::isResource('livetv')); ?>" href="<?php echo e(url('/admin/livetv')); ?>"
              title="<?php echo e(__('adminstaticwords.LiveTV')); ?>" id="livetv"><i class="material-icons">shop_two</i>
              <span><?php echo e(__('adminstaticwords.LiveTV')); ?></span></a></li>
          <?php endif; ?>
          <?php if(Auth::user()->is_assistant != 1): ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liveevent.view')): ?>
          <li><a class="<?php echo e(Nav::isResource('liveevent')); ?>" href="<?php echo e(url('/admin/liveevent')); ?>"
              title="<?php echo e(__('adminstaticwords.LiveEvent')); ?>" id="liveevent"><i class="material-icons">event</i>
              <span><?php echo e(__('adminstaticwords.LiveEvent')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audio.view')): ?>
          <li><a class="<?php echo e(Nav::hasSegment('audio')); ?>" href="<?php echo e(url('admin/audio')); ?>"
              title="<?php echo e(__('adminstaticwords.Audio')); ?>"><i class="material-icons">audiotrack</i>
              <span><?php echo e(__('adminstaticwords.Audio')); ?></span></a></li>
          <?php endif; ?>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['genre.view','actor.view','director.view','audiolanguage.view','label.view'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isResource('genres')); ?> <?php echo e(Nav::isResource('directors')); ?> <?php echo e(Nav::isResource('actors')); ?> <?php echo e(Nav::isResource('audio_language')); ?> <?php echo e(Nav::isResource('label')); ?> "
              title="<?php echo e(__('adminstaticwords.Content')); ?>">
              <i class="material-icons">filter_list</i> <span><?php echo e(__('adminstaticwords.Content')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('genre.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('genres')); ?>" href="<?php echo e(url('/admin/genres')); ?>"
                  title="<?php echo e(__('adminstaticwords.Genres')); ?>" id="genre"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Genres')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('director.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('directors')); ?>" href="<?php echo e(url('/admin/directors')); ?>"
                  title="<?php echo e(__('adminstaticwords.Directors')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Directors')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('actor.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('actors')); ?>" href="<?php echo e(url('/admin/actors')); ?>"
                  title="<?php echo e(__('adminstaticwords.Actors')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Actors')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audiolanguage.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('audio_language')); ?>" href="<?php echo e(url('admin/audio_language')); ?>"
                  title="<?php echo e(__('adminstaticwords.AudioLanguages')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.AudioLanguages')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('label.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('label')); ?>" href="<?php echo e(url('/admin/label')); ?>" title="<?php echo e(__('Label')); ?>"><i
                    class="fa fa-circle-o"></i> <span><?php echo e(__('Label')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(Auth::user()->is_assistant != 1): ?>
          <?php
          $config = App\Config::first();
          ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog.view')): ?>
          <?php if($config->blog == 1): ?>
          <li><a class="<?php echo e(Nav::isResource('blog')); ?>" href="<?php echo e(route('blog.index')); ?>"
              title="<?php echo e(__('adminstaticwords.Blog')); ?>"><i class="material-icons">pages</i>
              <span><?php echo e(__('adminstaticwords.Blog')); ?></span></a></li>
          <?php endif; ?>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification.manage')): ?>
          <li><a class="<?php echo e(Nav::isResource('notification')); ?>" href="<?php echo e(route('notification.create')); ?>"
              title="<?php echo e(__('adminstaticwords.Notification')); ?>"><i class="material-icons">notifications_active</i>
              <span><?php echo e(__('adminstaticwords.Notification')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producer-content.manage')): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isRoute('addedmovies')); ?> <?php echo e(Nav::isRoute('addedTvSeries')); ?> <?php echo e(Nav::isRoute('addedLiveTv')); ?>"
              title="<?php echo e(__('adminstaticwords.ProducerSettings')); ?>">
              <i class="material-icons">ondemand_video</i> <span><?php echo e(__('adminstaticwords.ProducerSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a class="<?php echo e(Nav::isRoute('addedmovies')); ?>" href="<?php echo e(route('addedmovies')); ?>"
                  title="<?php echo e(__('adminstaticwords.AddedMovies')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.AddedMovies')); ?></span></a></li>
              <li><a class="<?php echo e(Nav::isRoute('addedTvSeries')); ?>" href="<?php echo e(route('addedTvSeries')); ?>"
                  title="<?php echo e(__('adminstaticwords.AddedTVSeries')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.AddedTVSeries')); ?></span></a></li>
              <li><a class="<?php echo e(Nav::isRoute('addedLiveTv')); ?>" href="<?php echo e(route('addedLiveTv')); ?>"
                  title="<?php echo e(__('adminstaticwords.AddedLiveTv')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.AddedLiveTv')); ?></span></a></li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(Module::find('oxxo') && Module::find('oxxo')->isEnabled()): ?>
          <?php echo $__env->make('oxxo::admin.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon.view')): ?>
          <li><a class="<?php echo e(Nav::isResource('coupons')); ?>" href="<?php echo e(url('/admin/coupons')); ?>"
              title="<?php echo e(__('adminstaticwords.StripeCoupons')); ?>"><i class="material-icons">assignment</i>
              <span><?php echo e(__('adminstaticwords.AllCoupons')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addon-manager.manage')): ?>
          <li><a class="<?php echo e(Nav::isRoute('addonmanger.index')); ?>" href="<?php echo e(route('addonmanger.index')); ?>"
              title="<?php echo e(__('adminstaticwords.Add-On')); ?>"><i class="material-icons">extension</i>
              <span><?php echo e(__('adminstaticwords.Add-On')); ?></span></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['comment-settings.comments','comment-settings.subcomments'])): ?>
          <li class="treeview">
            <a href="#" class="<?php echo e(Nav::isRoute('admin.comment.index')); ?> <?php echo e(Nav::isRoute('admin.subcomment.index')); ?> "
              title="<?php echo e(__('adminstaticwords.CommentSettings')); ?>">
              <i class="material-icons">comment</i> <span><?php echo e(__('adminstaticwords.CommentSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comment-settings.comments')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.comment.index')); ?>" href="<?php echo e(url('/admin/comments')); ?>"
                  title="<?php echo e(__('adminstaticwords.Comments')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Comments')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comment-settings.subcomments')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.subcomment.index')); ?>" href="<?php echo e(url('/admin/subcomments')); ?>"
                  title="<?php echo e(__('adminstaticwords.Comments')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.SubComments')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['front-settings.sliders','front-settings.landing-page','front-settings.auth-customization','pages.view','front-settings.short-promo','front-settings.social-icon','faq.view'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isResource('home_slider')); ?> <?php echo e(Nav::isResource('landing-page')); ?> <?php echo e(Nav::isResource('auth-page-customize')); ?> <?php echo e(Nav::isRoute('social.ico')); ?> <?php echo e(Nav::isResource('home-block')); ?> <?php echo e(Nav::isResource('custom_page')); ?> <?php echo e(Nav::isResource('faqs')); ?>"
              title="<?php echo e(__('adminstaticwords.SiteCustomization')); ?>" id="sitecustomization">
              <i class="material-icons">view_quilt</i> <span><?php echo e(__('adminstaticwords.SiteCustomization')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders')): ?>
              <li><a class="<?php echo e(Nav::isResource('home_slider')); ?>" href="<?php echo e(url('/admin/home_slider')); ?>"
                  title="<?php echo e(__('adminstaticwords.SliderSettings')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.SliderSettings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.landing-page')): ?>
              <li><a class="<?php echo e(Nav::isResource('landing-page')); ?>" href="<?php echo e(url('admin/customize/landing-page')); ?>"
                  title="<?php echo e(__('adminstaticwords.LandingPage')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.LandingPage')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('custom_page')); ?>" href="<?php echo e(url('/admin/custom_page')); ?>"
                  title="<?php echo e(__('adminstaticwords.CustomPages')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.CustomPages')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.auth-customization')): ?>
              <li><a class="<?php echo e(Nav::isResource('auth-page-customize')); ?>"
                  href="<?php echo e(url('admin/customize/auth-page-customize')); ?>"
                  title="<?php echo e(__('adminstaticwords.SignInSignUp')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.SignInSignUp')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.social-icon')): ?>
              <li><a class="<?php echo e(Nav::isRoute('social.ico')); ?>" href="<?php echo e(route('social.ico')); ?>"
                  title="<?php echo e(__('adminstaticwords.SocialIconSetting')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.SocialIconSetting')); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.short-promo')): ?>
              <li><a class="<?php echo e(Nav::isResource('home-block')); ?>" href="<?php echo e(url('/admin/home-block')); ?>"
                  title="<?php echo e(__('adminstaticwords.PromotionSettings')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.PromotionSettings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.view')): ?>
              <li><a class="<?php echo e(Nav::isResource('faqs')); ?>" href="<?php echo e(url('/admin/faqs')); ?>"
                  title="<?php echo e(__('adminstaticwords.Faq')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.Faq')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>


          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.genral-settings','site-settings.seo','site-settings.api-settings','site-settings.social-login-settings','site-settings.chat-setting','site-settings.pwa','site-settings.color-option','manual-payment.view','pushnotification.settings','site-settings.manualpayment','site-settings.player-setting','ads.view','googleads.view','site-settings.adsense','site-settings.termsandcondition','site-settings.privacy-policy','site-settings.refund-policy','site-settings.style-settings','site-settings.copyrights','site-settings.language'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isResource('settings')); ?> <?php echo e(Nav::isRoute('chat.index')); ?> <?php echo e(Nav::isRoute('sociallogin')); ?> <?php echo e(Nav::isRoute('term_con')); ?><?php echo e(Nav::isRoute('manual.payment.gateway')); ?> <?php echo e(Nav::isRoute('pri_pol')); ?> <?php echo e(Nav::isRoute('refund_pol')); ?><?php echo e(Nav::isRoute('adsense')); ?> <?php echo e(Nav::isRoute('copyright')); ?> <?php echo e(Nav::isRoute('term_con')); ?> <?php echo e(Nav::isRoute('pwa.setting.index')); ?> <?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?>  <?php echo e(Nav::isResource('manual-payment')); ?> <?php echo e(Nav::hasSegment('blocker')); ?> <?php echo e(Nav::isResource('languages')); ?> <?php echo e(Nav::isRoute('google.ads')); ?> <?php echo e(Nav::isRoute('admin.color.scheme')); ?>"
              title="<?php echo e(__('adminstaticwords.SiteSettings')); ?>" id="sitesettings">
              <i class="material-icons">settings</i> <span><?php echo e(__('adminstaticwords.SiteSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.genral-settings','site-settings.seo','site-settings.api-settings'])): ?>
              <li><a class="<?php echo e(Nav::isResource('settings')); ?>" href="<?php echo e(url('admin/settings')); ?>"
                  title="<?php echo e(__('adminstaticwords.Settings')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.Settings')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.social-login-settings')): ?>
              <li><a class="<?php echo e(Nav::isRoute('sociallogin')); ?>" href="<?php echo e(url('/admin/social-login')); ?>"
                  title="<?php echo e(__('adminstaticswords.SocialLoginSettings')); ?>"><i class="fa fa-circle-o"></i><span>
                    <?php echo e(__('adminstaticwords.SocialLoginSettings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.chat-setting')): ?>
              <li><a class="<?php echo e(Nav::isRoute('chat.index')); ?>" href="<?php echo e(route('chat.index')); ?>"
                  title="<?php echo e(__('adminstaticwords.ChatSettings')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.ChatSettings')); ?></span></a>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.pwa')): ?>
              <li><a class="<?php echo e(Nav::isRoute('pwa.setting.index')); ?>" href="<?php echo e(route('pwa.setting.index')); ?>"
                  title="<?php echo e(__('adminstaticwords.PWASettings')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.PWASettings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.color-option')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.color.scheme')); ?>" href="<?php echo e(route('admin.color.scheme')); ?>"
                  title="<?php echo e(__('adminstaticwords.ColorSchemes')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('Color Option')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.view')): ?>
              <li><a class="<?php echo e(Nav::isRoute('manual.payment.gateway')); ?>" href="<?php echo e(route('manual.payment.gateway')); ?>"
                  title="<?php echo e(__('adminstaticwords.ManualPaymentGateway')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.ManualPaymentGateway')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pushnotification.settings')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.push.noti.settings')); ?>" href="<?php echo e(route('admin.push.noti.settings')); ?>"
                  title="<?php echo e(__('adminstaticwords.PushNotification')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.PushNotification')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.player-settings','ads.view','googlead.view'])): ?>
              <li class="treeview">
                <a href="#"
                  class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('google.ads')); ?>"
                  title="<?php echo e(__('adminstaticwords.PlayerSetting')); ?> " id="player">
                  <i class="fa fa-circle-o"></i> <span><?php echo e(__('adminstaticwords.PlayerSetting')); ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.player-setting')): ?>
                  <li><a class="<?php echo e(Nav::isRoute('player.set')); ?>" href="<?php echo e(route('player.set')); ?>"
                      title="<?php echo e(__('adminstaticwords.PlayerCustomization')); ?>"><i
                        class="fa fa-circle-o"></i><?php echo e(__('adminstaticwords.PlayerCustomization')); ?></a></li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ads.view')): ?>
                  <li><a class="<?php echo e(Nav::isRoute('ads')); ?>" href="<?php echo e(url('admin/ads')); ?>"
                      title="<?php echo e(__('adminstaticwords.Advertise')); ?>"><i
                        class="fa fa-circle-o"></i><?php echo e(__('adminstaticwords.Advertise')); ?></a></li>
                  <?php endif; ?>
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('googleads.view')): ?>
                  <li><a class="<?php echo e(Nav::isRoute('google.ads')); ?>" href="<?php echo e(route('google.ads')); ?>"
                      title="<?php echo e(__('adminstaticwords.GoogleAdvertise')); ?>"><i
                        class="fa fa-circle-o"></i><?php echo e(__('adminstaticwords.GoogleAdvertise')); ?></a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.manualpayment')): ?>
              <li><a class="<?php echo e(Nav::isResource('manual-payment')); ?>" href="<?php echo e(url('/admin/manual-payment')); ?>"
                  title="<?php echo e(__('adminstaticwords.ManualPaymentTransaction')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.ManualPayments')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.adsense')): ?>
              <li><a class="<?php echo e(Nav::isRoute('adsense')); ?>" href="<?php echo e(url('/admin/adsensesetting')); ?>"
                  title="<?php echo e(__('adminstaticwords.AdsenseSettings')); ?>"><span><i class="fa fa-circle-o"></i>
                    &nbsp;&nbsp;<?php echo e(__('adminstaticwords.AdsenseSettings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.termsandcondition')): ?>
              <li><a class="<?php echo e(Nav::isRoute('term_con')); ?>" href="<?php echo e(url('admin/term&con')); ?>"
                  title="<?php echo e(__('adminstaticwords.TermsCondition')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.TermsCondition')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.privacy-policy')): ?>
              <li><a class="<?php echo e(Nav::isRoute('pri_pol')); ?>" href="<?php echo e(url('admin/pri_pol')); ?>"
                  title="<?php echo e(__('adminstaticwords.PrivacyPolicy')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.PrivacyPolicy')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.refund-policy')): ?>
              <li><a class="<?php echo e(Nav::isRoute('refund_pol')); ?>" href="<?php echo e(url('admin/refund_pol')); ?>"
                  title="<?php echo e(__('adminstaticwords.RefundPolicy')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.RefundPolicy')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.copyrights')): ?>
              <li><a class="<?php echo e(Nav::isRoute('copyright')); ?>" href="<?php echo e(url('admin/copyright')); ?>"
                  title="<?php echo e(__('adminstaticwords.Copyright')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.Copyright')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.style-settings')): ?>
              <li><a class="<?php echo e(Nav::isRoute('customstyle')); ?>" href="<?php echo e(url('admin/custom-style-settings')); ?>"
                  title="<?php echo e(__('adminstaticwords.CustomStyle')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.CustomStyle')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.language')): ?>
              <li><a class="<?php echo e(Nav::isResource('languages')); ?>" href="<?php echo e(url('/admin/languages')); ?>"
                  title="<?php echo e(__('adminstaticwords.Languages')); ?>"><i
                    class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticwords.Languages')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.currency')): ?>
              <li><a class="<?php echo e(Nav::isResource('currency')); ?>" href="<?php echo e(route('currency.index')); ?>"
                  title="<?php echo e(__('Currency')); ?>" id="menu"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('Currency')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['affiliate.settings','affiliate.history'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isRoute('admin.affilate.settings')); ?> <?php echo e(Nav::isRoute('admin.affilate.dashboard')); ?>">
              <i class="material-icons">military_tech</i> <span><?php echo e(__('Affiliate Manager')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.settings')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.affilate.settings')); ?>" href="<?php echo e(route('admin.affilate.settings')); ?>"
                  title="<?php echo e(__('Affiliate Settings')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('Affiliate Settings')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.history')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.affilate.dashboard')); ?>" href="<?php echo e(route('admin.affilate.dashboard')); ?>"
                  title="<?php echo e(__('Affiliate Reports')); ?>"><span><i class="fa fa-circle-o"></i>
                    &nbsp;&nbsp;<?php echo e(__('Affiliate Reports')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['wallet.settings','wallet.history'])): ?>
          <li><a class="<?php echo e(Nav::isRoute('admin.wallet.settings')); ?>" href="<?php echo e(route('admin.wallet.settings')); ?>"><i
                class="material-icons" aria-hidden="true">payment</i>&nbsp;&nbsp;<?php echo e(__('Wallet')); ?></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['media-manager.manage'])): ?>
          <li><a class="<?php echo e(Nav::isRoute('media.manager')); ?>" href="<?php echo e(route('media.manager')); ?>"><i
                class="material-icons" aria-hidden="true">perm_media</i>&nbsp;&nbsp;<?php echo e(__('Media Manager')); ?></a></li>
          <?php endif; ?>


          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['app-settings.setting','app-settings.slider'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isResource('appsettings')); ?> <?php echo e(Nav::isRoute('admob')); ?> <?php echo e(Nav::isResource('appslider')); ?>"
              title="<?php echo e(__('adminstaticwords.MobileAppSettings')); ?>" id="mobilesettings">
              <i class="material-icons">phonelink_setup</i> <span><?php echo e(__('adminstaticwords.AppSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings.setting')): ?>
              <li><a class="<?php echo e(Nav::isResource('appsettings')); ?>" href="<?php echo e(url('admin/appsettings')); ?>"
                  title="<?php echo e(__('adminstaticwords.Settings')); ?>"><i class="fa fa-circle-o"></i>
                  <?php echo e(__('adminstaticwords.Settings')); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings.slider')): ?>
              <li><a class="<?php echo e(Nav::isResource('appslider')); ?>" href="<?php echo e(url('admin/appslider')); ?>"
                  title="<?php echo e(__('adminstaticwords.AppSliderSettings')); ?>"><span><i class="fa fa-circle-o"></i>
                    &nbsp;&nbsp;<?php echo e(__('adminstaticwords.AppSliderSettings')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('reports.device-history','reports.revenue','reports.user-subscription','reports.viewtraker','reports.stripe-report')): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isRoute('device_history')); ?> <?php echo e(Nav::hasSegment('report')); ?> <?php echo e(Nav::isRoute('revenue.report')); ?> <?php echo e(Nav::isRoute('view.track')); ?>"
              title="<?php echo e(__('adminstaticwords.Reports')); ?>" id="sitesettings">
              <i class="material-icons">trending_up</i> <span><?php echo e(__('adminstaticwords.Reports')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(Auth::user()->is_assistant != 1 && App\PaypalSubscription::count()>0): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.user-subscription')): ?>
              <li><a class="<?php echo e(Nav::isResource('plan')); ?>" href="<?php echo e(url('/admin/plan')); ?>"
                  title="<?php echo e(__('adminstaticwords.ActivePlan')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.UsersSubscription')); ?></span></a>
              </li>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(env('STRIPE_SECRET') != ""): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.stripe-report')): ?>
              <li><a class="<?php echo e(Nav::hasSegment('report')); ?>" href="<?php echo e(url('admin/report')); ?>"
                  title="<?php echo e(__('adminstaticwords.StripeReports')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.StripeReports')); ?></span></a></li>
              <?php endif; ?>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.device-history')): ?>
              <li><a class="<?php echo e(Nav::isRoute('device_history')); ?>" href="<?php echo e(route('device_history')); ?>"
                  title="<?php echo e(__('adminstaticwords.DeviceHistory')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.DeviceHistory')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.revenue')): ?>
              <li><a class="<?php echo e(Nav::isRoute('revenue.report')); ?>" href="<?php echo e(url('admin/report_revenue')); ?>"
                  title="<?php echo e(__('adminstaticwords.RevenueReport')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.RevenueReport')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.viewtraker')): ?>
              <li><a class="<?php echo e(Nav::isRoute('view.track')); ?>" href="<?php echo e(route('view.track')); ?>"
                  title="<?php echo e(__('adminstaticwords.ViewTracker')); ?>"><i
                    class="fa fa-circle-o"></i><span><?php echo e(__('adminstaticwords.ViewTracker')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['help.import-demo','help.db-backup','help.system-status','help.remove-public','help.clear-cache'])): ?>
          <li class="treeview">
            <a href="#"
              class="<?php echo e(Nav::isRoute('admin.import.demo')); ?> <?php echo e(Nav::isRoute('admin.backup.settings')); ?> <?php echo e(Nav::isRoute('system.status')); ?> <?php echo e(Nav::isRoute('clear_cache')); ?> <?php echo e(Nav::isRoute('get.remove.public')); ?>"
              title="<?php echo e(__('adminstaticwords.HelpAndSupport')); ?>" id="HelpAndSupport">
              <i class="material-icons">help_outline</i> <span><?php echo e(__('adminstaticwords.HelpAndSupport')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.import-demo')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.import.demo')); ?>" href="<?php echo e(route('admin.import.demo')); ?>"
                  title="<?php echo e(__('Import Demo')); ?>"><i class="fa fa-circle-o"></i> <span><?php echo e(__('Import Demo')); ?></span></a>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.db-backup')): ?>
              <li><a class="<?php echo e(Nav::isRoute('admin.backup.settings')); ?>" href="<?php echo e(route('admin.backup.settings')); ?>"
                  title="<?php echo e(__('adminstaticwords.DatabaseBackup')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.DatabaseBackup')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.system-status')): ?>
              <li><a class="<?php echo e(Nav::isRoute('system.status')); ?>" href="<?php echo e(route('system.status')); ?>"
                  title="<?php echo e(__('adminstaticwords.SystemStatus')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.SystemStatus')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.remove-public')): ?>
              <li><a class="<?php echo e(Nav::isRoute('get.remove.public')); ?>" href="<?php echo e(route('get.remove.public')); ?>"
                  title="<?php echo e(__('adminstaticwords.RemovePublic')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.RemovePublic')); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.clear-cache')): ?>
              <li><a class="<?php echo e(Nav::isRoute('clear_cache')); ?>" href="<?php echo e(route('clear.cache')); ?>"
                  title="<?php echo e(__('adminstaticwords.ClearCache')); ?>"><i class="fa fa-circle-o"></i>
                  <span><?php echo e(__('adminstaticwords.ClearCache')); ?></span></a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php endif; ?>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php if(Session::has('added')): ?>
      <div id="sessionModal" class="sessionmodal rgba-green-strong z-depth-2">
        <i class="fa fa-check-circle"></i>
        <p><?php echo e(session('added')); ?></p>
      </div>
      <?php elseif(Session::has('updated')): ?>
      <div id="sessionModal"
        class="sessionmodal rgba-cyan-strong z-depth-2 animate__animated animate__lightSpeedInRight">
        <i class="fa fa-check-circle"></i>
        <p><?php echo e(session('updated')); ?></p>
      </div>
      <?php elseif(Session::has('warning')): ?>
      <div id="sessionModal" class="sessionmodal  rgba-orange-strong z-depth-2 ">
        <i class="fa fa-warning-circle"></i>
        <p><?php echo e(session('updated')); ?></p>
      </div>
      <?php elseif(Session::has('deleted')): ?>
      <div id="sessionModal" class="sessionmodal rgba-red-strong z-depth-2">
        <i class="fa fa-window-close"></i>
        <p><?php echo e(session('deleted')); ?></p>
      </div>
      <?php endif; ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>
      <!-- Main content -->
      <section class="content container-fluid">
        <?php echo $__env->yieldContent('content'); ?>

      </section>

      <!-- /.content -->
    </div>



    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      &copy; <?php echo e(date('Y')); ?> | <?php echo e(config('app.name')); ?> | <?php echo e(__('All Rights Reserved.')); ?></strong>
      <span class="pull-right"><b><?php echo e(__("adminstaticwords.Version")); ?> <?php echo e(config('app.version')); ?>

          <?php echo e(get_release()); ?></b>
    </footer>
  </div>
  <!-- ./wrapper -->
  <!-- Admin Js -->
  <script>
    var baseurl = <?php echo json_encode(url('/'), 15, 512) ?>;
  </script>
  <script type="text/javascript" src="<?php echo e(url('js/jquery.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/jquery-ui.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/admin.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/app.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/updater.js')); ?>"></script>
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo e(url('js/datatables.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/buttons.colVis.js')); ?>"></script>

  <script type="text/javascript" src="<?php echo e(url('js/jquery-ui.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/chart.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/utils.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/dataTables.pageLoadMore.min.js')); ?>"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo e(url('js/jquery.dataTables.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/bootstrap-tagsinput.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/star-rating.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/select2.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/jquery.validate.js')); ?>"></script>

  
  <script type="text/javascript" src="<?php echo e(url('js/dataTables.responsive.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/dataTables.material.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/dataTables.buttons.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/buttons.flash.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/jszip.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/pdfmake.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/vfs_fonts.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/buttons.html5.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/buttons.print.min.js')); ?>"></script>

  

  <?php echo midia_js(); ?>


  <!------- datepicker ------------------------->
  <script type="text/javascript" src="<?php echo e(url('js/moment.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/daterangepicker.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/custom-js.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(url('js/bootstrap-colorpicker.min.js')); ?>"></script>
  <?php echo $__env->yieldContent('custom-script'); ?>
  <script>
    var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
  </script>
  <script>
    $('#fullscreen').on('click', function () {
      if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement ||
        document.msFullscreenElement) { //in fullscreen, so exit it
        $('.arrow').text('fullscreen');
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        }
      } else { //not fullscreen, so enter it
        $('.arrow').text('fullscreen_exit');

        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      }
    });
  </script>
  <script>
    $(function () {
      // DataTables
      $('#movies_table').DataTable({

        responsive: true,
        "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
        "language": {
          "paginate": {
            "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
            "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
          }
        },
        buttons: [{
            extend: 'print',
            exportOptions: {
              columns: ':visible'
            }
          },
          'csvHtml5',
          'excelHtml5',
        ]
      });

      $('#full_detail_table').DataTable({
        responsive: true,
        "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
        "language": {
          "paginate": {
            "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
            "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
          }
        },
        buttons: [{
            extend: 'print',
            exportOptions: {
              columns: ':visible'
            }
          },
          'csvHtml5',
          'excelHtml5',
          'colvis',
        ]
      });

      $(".js-select2").select2({
        placeholder: "Pick states",
        theme: "material"
      });

      $(".select2-selection__arrow")
        .addClass("material-icons")
        .html("arrow_drop_down");
    });
  </script>


  <script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    });

    $('.my-colorpicker2').colorpicker()
  </script>


  <script>
    var day_name = new Array(7);
    day_name[0] = 'Sunday'
    day_name[1] = ' Monday'
    day_name[2] = 'Tuesday'
    day_name[3] = 'Wednesday'
    day_name[4] = 'Thursday'
    day_name[5] = 'Friday'
    day_name[6] = 'Saturday'

    var month_name = new Array(12);
    month_name[0] = 'January'
    month_name[1] = 'Feburary'
    month_name[2] = 'March'
    month_name[3] = 'April'
    month_name[4] = 'May'
    month_name[5] = 'June'
    month_name[6] = 'July'
    month_name[7] = ' Auguest'
    month_name[8] = 'September'
    month_name[9] = 'October'
    month_name[10] = 'November'
    month_name[11] = 'December'

    function display_c() {
      var refresh = 1000; // Refresh rate in milli seconds
      mytime = setTimeout('display_ct()', refresh)
    }


    function display_ct() {

      var gmt = new Date();

      var ampm = gmt.getHours() >= 12 ? ' PM' : ' AM';
      hours = gmt.getHours() % 12;
      hours = hours ? hours : 12;
      document.getElementById('ct1').innerHTML = day_name[gmt.getDay()] + " " + "." + month_name[gmt.getMonth()] + " " +
        gmt.getDate() + "," + " " + gmt.getFullYear() + "." + " " + hours + ":" + gmt.getMinutes() + ":" + gmt
        .getSeconds() + ampm;

      tt = display_c();
    }
    display_c();
  </script>

 
</body>

</html><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/layouts/admin.blade.php ENDPATH**/ ?>