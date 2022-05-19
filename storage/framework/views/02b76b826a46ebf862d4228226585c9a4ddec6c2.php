
<?php $__env->startSection('title',__('adminstaticwords.Dashboard')); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
   
    <h4 class="admin-form-text"><?php echo e(__('adminstaticwords.Dashboard')); ?></h4><br/>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.states')): ?>
    <div class="alert alert-warning alert-dismissible update-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <form action="<?php echo e(url("/admin/merge-quick-update")); ?>" method="POST" class="float-right display-none updaterform">
        <?php echo csrf_field(); ?>
        <input required type="hidden" value="" name="filename">
        <input required type="hidden" value="" name="version">
        <button class="btn btn-sm bg-primary pull-right">
          <?php echo e(__("Update Now")); ?>

        </button>
      </form>
      <span id="update_text">
        
      </span>
    </div>
   
    <div class="row">
      <div class="col-md-12">
        <div class="dashboard-header">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-lg-8">
                  <h5 class="box-title"><?php echo e(__('Welcome back, your dashboard is ready!')); ?></h5>
                  <p><?php echo e(Artisan::output()); ?></p>
                </div>
                <div class="col-lg-4">
                  <div class="box-btn text-right">
                    <a href="<?php echo e(url('admin/settings')); ?>" class="btn btn-primary"><?php echo e(__('Setup Your Site')); ?> <i class="material-icons right">arrow_forward</i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
      
    </div>
   
    <br/>
    
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/users')); ?>" class="small-box z-depth-1 hoverable bg-aqua default-color">
          <div class="inner">
            <h3><?php echo e($users_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalUsers')); ?></p>
          </div>
          <div class="icon">
           <i class="fa fa-users" aria-hidden="true"></i>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/users')); ?>" class="small-box z-depth-1 hoverable bg-olive">
          <div class="inner">
            <h3><?php echo e($activeusers); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalActiveUsers')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/movies')); ?>" class="small-box z-depth-1 hoverable bg-red danger-color">
          <div class="inner">
            <h3><?php echo e($movies_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalMovies')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-film" aria-hidden="true"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/tvseries')); ?>" class="small-box z-depth-1 hoverable bg-green success-color">
          <div class="inner">
            <h3><?php echo e($tvseries_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalTvSerieses')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-file-video-o" aria-hidden="true"></i>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/livetv')); ?>" class="small-box z-depth-1 hoverable bg-yellow pink darken-4">
          <div class="inner">
            <h3><?php echo e($livetv_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalLiveTv')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-tv" aria-hidden="true"></i>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/packages')); ?>" class="small-box z-depth-1 hoverable bg-yellow secondary-color">
          <div class="inner">
            <h3><?php echo e($package_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalPackages')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-sticky-note" aria-hidden="true"></i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/coupons')); ?>" class="small-box z-depth-1 hoverable bg-green warning-color">
          <div class="inner">
            <h3><?php echo e($coupon_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalCoupons')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-ticket" aria-hidden="true"></i>
          </div>
        </a>
      </div>
     
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/genres')); ?>" class="small-box z-depth-1 hoverable bg-aqua  grey darken-2">
          <div class="inner">
            <h3><?php echo e($genres_count); ?></h3>
            <p><?php echo e(__('adminstaticwords.TotalGenres')); ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-filter" aria-hidden="true"></i>
          </div>
        </a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-7">
        <div class="box box-seconday-header">
          <div class="box-header">
            <h3 class="box-title"><?php echo e(__('Active Subscribed Users in ' . date('Y'))); ?></h3>
          </div>
          <div class="box-body no-padding">
            <?php echo $activesubsriber->container(); ?>

          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('User Distribution')); ?></h3>
          </div>
          <div class="box-body">
            <?php echo $piechart->container(); ?>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Revenue Report')); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table id="full_detail_table" class="table table-hover db" style="width: 100%">
              <thead>
                <tr class="table-heading-row">
                  <th>
                    #
                  </th>
                  <th><?php echo e(__('Payment ID')); ?></th>
                  <th><?php echo e(__('adminstaticwords.UserName')); ?></th>
                  
                  <th><?php echo e(__('adminstaticwords.PaymentMethod')); ?></th>
                  <th><?php echo e(__('adminstaticwords.PaidAmount')); ?></th>
                  <th><?php echo e(__('adminstaticwords.SubscriptionFrom')); ?></th>
                  <th><?php echo e(__('adminstaticwords.SubscriptionTo')); ?></th>
                </tr>
              </thead>
              <?php if($revenue_report): ?>

                <tbody>
                  <?php $__currentLoopData = $revenue_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($report->id); ?>">
                      <td>
                        <?php echo e($key+1); ?>

                      </td>
                      <td><?php echo e($report->payment_id); ?></td>
                      <td><?php echo e(ucfirst($report->user_name)); ?></td>
                      <td><?php echo e($report->method); ?></td>
                      <td><i class="<?php echo e($currency_symbol); ?>" aria-hidden="true"></i><?php echo e($report->price); ?></td>
                      <td><?php echo e($report->subscription_from); ?></td>
                      <td><?php echo e($report->subscription_to); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
     
    </div>
    <br/>
    <div class="row">
      <div class="col-md-5">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Video Distributions')); ?></h3>
          </div>
         <div class="box-body">
          <?php echo $doughnutchart->container(); ?>

         </div>
       </div>
      </div>
      <div class="col-md-7">
       <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(__('Monthly Registered Users in ' . date('Y'))); ?></h3>
        </div>
         <div class="box-body">
           <?php echo $userchart->container(); ?>

         </div>
       </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-7">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <?php echo $revenue_chart->container(); ?>

          </div>
        </div>
       
      </div>
      <div class="col-md-5">
        <!-- USERS LIST -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Recently Register Users')); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              <?php $__currentLoopData = $latest_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <img src="<?php echo e(Avatar::create($user->name)->toBase64()); ?>" alt="User Image" width="50">
                <a class="users-list-name" href="#"><?php echo e($user->name); ?></a>
                <span class="users-list-date"><?php echo e(date('M d, Y',strtotime($user->created_at))); ?></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="<?php echo e(url('admin/users')); ?>" class="uppercase">View All Users</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>

      
    </div>
  <?php else: ?>
  <div class="row">
    <div class="col-md-12">
      <div class="dashboard-header">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="box-title"><?php echo e(__('Welcome back, your dashboard is ready!')); ?></h5>
                <p><?php echo e(Artisan::output()); ?></p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
     
    </div>
    
  </div>
  <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<?php echo $userchart->script(); ?>

<?php echo $activesubsriber->script(); ?>

<?php echo $piechart->script(); ?>

<?php echo $doughnutchart->script(); ?>

<?php echo $revenue_chart->script(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/admin/index.blade.php ENDPATH**/ ?>