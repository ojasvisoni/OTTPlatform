
<?php $__env->startSection('title','User Dashboard'); ?>
<?php $__env->startSection('main-wrapper'); ?>
<?php

$bfree = null;
$config=App\Config::first();
$auth=Auth::user();
if ($auth->is_admin==1) {
  $bfree=1;
}else{
  $ps=App\PaypalSubscription::where('user_id',$auth->id)->orderBy('id','DESC')->first();
    if (isset($ps)) {
      $current_date = Illuminate\Support\Carbon::now();
      if (date($current_date) <= date($ps->subscription_to)) {
        
        if ($ps->package_id==100 || $ps->package_id == 0) {
            $bfree=1;
        }else{
          $bfree=0;
        }
      }
    }
}
                         
                    
?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper user-account-section">
    
    <div class="container-fluid">

      <div class="row">
        <div class="alert" id="message" style="display: none"></div>
        <div class="col-lg-3 col-md-4 col-sm-4">
          <div class="user-img">
            <?php if(isset($auth->image) && $auth->image != NULL): ?>
              <img src="<?php echo e(url('images/users/'.$auth->image)); ?>">
            <?php else: ?>
              <img src="<?php echo e(url('images/default.jpg')); ?>">
            <?php endif; ?>
            <h4 class="user-img-name"><?php echo e(auth()->user()->name); ?></h4>
            <div class="user-mail"><?php echo e(auth()->user()->email); ?></div>
            <div class="membership-dtl">
              <?php if($auth->is_admin==1): ?>
                <div class="membership-sub"><?php echo e(__('Subscribed to')); ?> : <?php echo e(__('FREE')); ?></div>
              <?php else: ?>
                <?php if($bfree==1 && $ps->method == 'free'): ?>

                  <div class="membership-sub"><?php echo e(__('Subscribed to')); ?> : <?php echo e(__('Trail')); ?></div>

                  <div class="membership-sub-date"><?php echo e(__('Subscription valid till')); ?> : <?php echo e(date('M j, Y  g:i a',strtotime($ps->subscription_to))); ?> </div>

                <?php elseif($bfree==0): ?>
                
                  <?php if(isset($ps) && $current_subscription != NULL &&  $current_subscription->subscription_to < $ps->subscription_to): ?>
                    <?php
                        $psn=App\Package::where('id',$ps->package_id)->first();
                    ?>

                    <div class="membership-sub"><?php echo e(__('Subscribed to')); ?> : <?php echo e($psn != NULL ? ucfirst($psn['name']) : '-'); ?></div>
                    <div class="membership-sub-date"><?php echo e(__('Subscription valid till')); ?> : <?php echo e(date('M j, Y  g:i a',strtotime($psn->subscription_to))); ?> </div>
                  <?php else: ?>
                    <?php if($current_subscription != null): ?>
                      <div class="membership-sub"><?php echo e(__('Subscribed to')); ?> : <?php echo e($method == 'stripe' ? ucfirst($current_subscription->name) : ucfirst($current_subscription->plan->name)); ?></div>
                      <div class="membership-sub-date"><?php echo e(__('Subscription valid till')); ?> : <?php echo e(date('M j, Y  g:i a',strtotime($current_subscription->subscription_to))); ?> </div>
                    <?php endif; ?>
                  <?php endif; ?>
                  
                <?php else: ?>

                  <?php if($current_subscription != null): ?>
                    <div class="membership-sub"><?php echo e(__('Subscribed to')); ?> : <?php echo e($method == 'stripe' ? ucfirst($current_subscription->name) : ucfirst($current_subscription->plan->name)); ?></div>
                    <div class="membership-sub-date"><?php echo e(__('Subscription valid till')); ?> : <?php echo e(date('M j, Y  g:i a',strtotime($current_subscription->subscription_to))); ?> </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            
              <?php if($current_subscription != null && $method == 'stripe'): ?> 
                <?php if(getPlan() == 0): ?>
                  <a href="<?php echo e(route('resumeSub', $current_subscription->stripe_plan)); ?>" class="btn btn-prime"><?php echo e(__('staticwords.resumesubscription')); ?></a>
                <?php else: ?>
                  <a href="<?php echo e(route('cancelSub', $current_subscription->stripe_plan)); ?>" class="btn btn-prime"><?php echo e(__('staticwords.cancelsubscription')); ?></a>
                <?php endif; ?>
              <?php elseif($current_subscription != null && $method == 'paypal'): ?> 
                <?php if($current_subscription->status == 0): ?>
                  <a href="<?php echo e(route('resumeSubPaypal')); ?>" class="btn btn-prime"><?php echo e(__('staticwords.resumesubscription')); ?></a>
                <?php elseif($current_subscription->status == 1): ?>
                  <a href="<?php echo e(route('cancelSubPaypal')); ?>" class="btn btn-prime"><?php echo e(__('staticwords.cancelsubscription')); ?></a>
                <?php endif; ?>
              <?php else: ?> 
                <?php if($auth->is_admin != 1): ?>
                  <a href="<?php echo e(url('account/purchaseplan')); ?>" class="btn btn-prime"><?php echo e(__('staticwords.subscribenow')); ?></a>
                <?php endif; ?>
              <?php endif; ?>
            
            </div>
            <form method="POST"  id="upload_form" accept-charset="UTF-8" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="user-edit-icon">
                <label for="file-input">
                  <i class="fa fa-camera"></i>
                </label>
                <input id="file-input" type="file" name="image" accept=".png, .jpg, .jpeg, .webp, .gif"/>
              </div>
            </form>
          </div>
          
          <div class="user-account-tab">
            <div id="exTab1"> 
              <ul class="nav nav-pills" id="user-tab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#details" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-user"></i> <?php echo e(__('Details')); ?></a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link"  id="pills-contact-tab" data-toggle="pill" href="#paymenthistory" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-credit-card"></i><?php echo e(__('Payment History')); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-history-tab" href="<?php echo e(route('watchhistory')); ?>" role="tab" aria-controls="pills-history" aria-selected="false"><i class="fa fa-history"></i><?php echo e(__('WatchHistory')); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-hidden-tab" href="<?php echo e(route('hidden.videos')); ?>" role="tab" aria-controls="pills-hidden" aria-selected="false"><i class="fa fa-ban"></i><?php echo e(__('Hidden Video')); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-watchlist-tab"  href="<?php echo e(url('account/watchlist')); ?>" role="tab" aria-controls="pills-watchlist" aria-selected="false"><i class="fa fa-heart"></i><?php echo e(__('Watchlist')); ?></a>
                </li>
                <?php if($walletsetting->enable_wallet == 1): ?>
                <li class="nav-item">
                  <a class="nav-link" id="pills-wallet-tab"  href="<?php echo e(route('user.wallet.show')); ?>" role="tab" aria-controls="pills-wallet" aria-selected="false"><i class="fa fa-credit-card"></i><?php echo e(__('Wallet')); ?></a>
                </li>
                <?php endif; ?>
                <?php if($af_system->enable_affilate == 1): ?>
                <li class="nav-item">
                  <a class="nav-link" id="pills-affiliate-tab" data-toggle="pill" href="#affiliate" role="tab" aria-controls="pills-affiliate" aria-selected="false"><i class="fa fa-gift"></i><?php echo e(__('Affiliate Dashboard')); ?></a>
                </li>
                <?php endif; ?>
              </ul>
             
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8">
          <div id="exTab1" class="container"> 
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade active" id="details" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="edit-profile-main-block">
                  <div class="row">
                    <div class="col-lg-6 col-sm-6">
                      <div class="edit-profile-block">
                        <h4 class="panel-setting-heading"><?php echo e(__('Change Email')); ?></h4>
                        <div class="info"><?php echo e(__('staticwords.currentemail')); ?>: <?php echo e(auth()->user()->email); ?></div>
                        <form method="POST" action="<?php echo e(route('user.profile')); ?>" accept-charset="UTF-8">
                          <?php echo csrf_field(); ?>
                          
                          <div class="form-group <?php echo e($errors->has('new_email') ? ' has-error' : ''); ?>">
                            <label for="new_email"><?php echo e(__('staticwords.newemail')); ?></label>
                            <input class="form-control" name="new_email" type="email" id="new_email">
                            <small class="text-danger"><?php echo e($errors->first('new_email')); ?></small>
                          </div>
                          <div class="form-group">
                            <label for="current_password"><?php echo e(__('staticwords.currentpassword')); ?></label>
                            <input class="form-control" name="current_password" type="password" value="" id="current_password">
                            <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>
                          </div>
                          <div class="btn-group">
                            <input class="btn btn-success" type="submit" value="<?php echo e(__('staticwords.update')); ?>">
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <div class="edit-profile-block">
                        <h4 class="panel-setting-heading"><?php echo e(__('staticwords.changepassword')); ?></h4>
                        <div class="info"><?php echo e(__('staticwords.wanttochangeyourpassword')); ?></div>
                        <form method="POST" action="<?php echo e(url('account/profile')); ?>" accept-charset="UTF-8">
                          <?php echo csrf_field(); ?>
                          <div class="form-group <?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
                            <label for="current_password"><?php echo e(__('staticwords.currentpassword')); ?></label>
                            <input class="form-control" name="current_password" type="password" value="" id="current_password">
                            <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>
                          </div>
                          <div class="form-group <?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
                            <label for="new_password"><?php echo e(__('staticwords.newpassword')); ?></label>
                            <input class="form-control" name="new_password" type="password" value="" id="new_password">
                            <small class="text-danger"><?php echo e($errors->first('new_password')); ?></small>
                          </div>
                          <div class="btn-group">
                            <input class="btn btn-success" type="submit" value="<?php echo e(__('staticwords.update')); ?>">
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <div class="edit-profile-block">
                        <h4 class="panel-setting-heading"><?php echo e(__('staticwords.updateageandmobile')); ?></h4>
                        <div class="info"><?php echo e(__('staticwords.wanttochangeageandmobile')); ?></div>
                        <form method="POST" action="<?php echo e(route('user.age')); ?>" accept-charset="UTF-8">
                          <?php echo csrf_field(); ?>
                          <div class="form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                            <label for="dob"><?php echo e(__('staticwords.dateofbirth')); ?></label>
                            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('staticwords.enterdateofbirthuser')); ?>"></i>
                            <input type="date" class="form-control" name="dob" <?php if(isset(Auth::user()->dob)): ?> value="<?php echo e(Auth::user()->dob); ?>" <?php endif; ?> >   
                            <small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
                          </div>
                          <div class="form-group <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                            <label for="mobile"><?php echo e(__('staticwords.mobileno')); ?></label>
                            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('staticwords.enteryourmobileno')); ?>"></i>
                            <input type="number" class="form-control" name="mobile" <?php if(isset(Auth::user()->mobile)): ?> value="<?php echo e(Auth::user()->mobile); ?>"<?php endif; ?>>   
                            <small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
                          </div>
                          <div class="btn-group">
                            <input class="btn btn-success" type="submit" value="<?php echo e(__('staticwords.update')); ?>">
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <div class="edit-profile-block">
                        <h4 class="panel-setting-heading"><?php echo e(__('Other Settings')); ?></h4>
                        
                        <?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@update_otherprofilesetting']); ?>

                        <div class="form-group<?php echo e($errors->has('facebook_url') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('facebook_url',__('Facebook URL')); ?>

                          <?php echo Form::text('facebook_url', isset(auth()->user()->facebook_url) && auth()->user()->facebook_url != NULL ? auth()->user()->facebook_url : NULL, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('facebook_url')); ?></small>
                        </div>
                        <div class="form-group<?php echo e($errors->has('youtube_url') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('youtube_url', __('Youtube URL')); ?>

                          <?php echo Form::text('youtube_url',isset(auth()->user()->youtube_url) && auth()->user()->youtube_url != NULL ? auth()->user()->youtube_url : NULL, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('youtube_url')); ?></small>
                        </div>
                        <div class="form-group<?php echo e($errors->has('twitter_url') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('twitter_url', __('Youtube URL')); ?>

                          <?php echo Form::text('twitter_url',isset(auth()->user()->twitter_url) && auth()->user()->twitter_url != NULL ? auth()->user()->twitter_url : NULL, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('twitter_url')); ?></small>
                        </div>
                        <div class="btn-group pull-right">
                          <?php echo Form::submit(__('staticwords.update'), ['class' => 'btn btn-success']); ?>

                        </div>
                        <?php echo Form::close(); ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

             
              <div class="tab-pane fade" id="paymenthistory" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="panel-setting-main-block billing-history-main-block">
                  <?php if(isset($invoices) && $invoices != null): ?>
                    <div class="container">
                      <h4 class="plan-dtl-heading"><?php echo e(__('staticwords.stripebillinghistory')); ?></h4>
                      <div class="billing-history-block table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th><?php echo e(__('staticwords.date')); ?></th>
                              <th><?php echo e(__('staticwords.package')); ?></th>
                              <th><?php echo e(__('staticwords.serviceperiod')); ?></th>
                              <th><?php echo e(__('staticwords.paymentmethod')); ?></th>
                              <th><?php echo e(__('staticwords.total')); ?></th>
                              <th><?php echo e(__('Actions')); ?></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                              <?php
                                $from = Carbon\Carbon::parse($invoice->subscription_from);
                                $from = $from->toDateString();
                                $to = Carbon\Carbon::parse($invoice->subscription_to);
                                $to = $to->toDateString();
                                 $created = Carbon\Carbon::parse($invoice->subscription_from);
                                $created = $created->toDateString();

                                $plan = App\Package::where('plan_id',$invoice->stripe_plan)->first();
                              ?>
                              <tr>
                                <td><?php echo e($created); ?></td>
                                <td><?php echo e($plan->name); ?></td>
                                <td><?php echo e($from); ?> to <?php echo e($to); ?></td>
                                <td><?php echo e(__('Stripe')); ?></td>
                                <td><i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($invoice->amount); ?> <?php if($invoice->amount != 0): ?> (<?php echo e(currency($invoice->amount, $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency, $format = true)); ?> <?php echo e(__('equivalent to your currency')); ?>) <?php endif; ?>

                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if(isset($paypal_subscriptions) && $paypal_subscriptions != null && count($paypal_subscriptions) > 0): ?>
                    <div class="container">
                      <h4 class="plan-dtl-heading"><?php echo e(__('staticwords.billinghistory')); ?></h4>
                      <div class="billing-history-block table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th><?php echo e(__('staticwords.date')); ?></th>
                              <th><?php echo e(__('staticwords.package')); ?></th>
                              <th><?php echo e(__('staticwords.serviceperiod')); ?></th>
                              <th><?php echo e(__('staticwords.paymentmethod')); ?></th>
                              <th><?php echo e(__('staticwords.total')); ?></th>
                              <th><?php echo e(__('Actions')); ?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $paypal_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                $from = Carbon\Carbon::parse($item->subscription_from);
                                $from = $from->toDateString();
                                $to = Carbon\Carbon::parse($item->subscription_to);
                                $to = $to->toDateString();
                              ?>
                              <tr>
                                <td><?php echo e($item->created_at->toDateString()); ?></td>
                                <td><?php echo e($item->plan ? $item->plan->name : 'N/A'); ?></td>
                                <td><?php echo e($from); ?> to <?php echo e($to); ?></td>
                                <td><?php echo e(ucfirst($item->method)); ?></td>
                                <td><i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($item->price); ?> <?php if($item->price != 0): ?> (<?php echo e(currency($item->price, $from = $item->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $item->currency, $format = true)); ?> <?php echo e(__('equivalent to your currency')); ?>) <?php endif; ?></td>
                                <td><a href="<?php echo e(route('invoice.show',$item->id)); ?>" class="btn watch-trailer btn-default"><?php echo e(__('Invoice')); ?></a></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>


              <div class="tab-pane fade" id="affiliate" role="tabpanel" aria-labelledby="pills-affiliate-tab">
                <div class="bg-white2 " style="color:white">
                  <a href="#howitworks" data-toggle="modal" class="mt-2 h6 pull-right">
                      <?php echo e(__("How it works ?")); ?>

                  </a>
                  
                  <h4 class="user_m2"><?php echo e(__('Affiliate Dashboard')); ?></h4>
                  
                  <hr>
                  <div class="container text-center">
                    <div class="card">
                      <div class="card-body">
                          <h3 class="card-title">
                              <?php echo e(__("Start refering your friends and start earning !!")); ?>

                          </h3><br>
                          <p class="card-text">
                              <?php echo e(__("This is your unique refer link share with your friends and family and start earning !")); ?>

                          </p>
                          <div class="form-group">
                              <input type="text" readonly class="text-dark text-center form-control cptext" value="<?php echo e(route('register',['refercode' => auth()->user()->refer_code ])); ?>">
                          </div>
                        <a href="#" class="copylink btn btn-default">
                            <?php echo e(__("Copy Link")); ?>

                        </a>
                      </div>
                    </div>
                  </div>
        
                  <div id="howitworks" class="comment-modal modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <?php echo $af_settings->about_system; ?>

                            </div>
                          </div>
                      </div>
                  </div>
        
                  <div class="walletlogs">
                
                    <?php if($aff_history->count()): ?>
                  
                    <hr>
                    <h4 class="pull-right"><?php echo e(__('Total earning')); ?>  <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($earning); ?>  
                     
                    </h4>
                    <h4><?php echo e(__('Affiliate history')); ?></h4>
                  
                    <hr>
        
                    <?php $__currentLoopData = $aff_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    <h6>
                      <span
                        class="pull-right text-green""> <?php echo e(__('+')); ?>  <i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e(sprintf("%.2f",$history->amount,2)); ?>

                       
                      </span>
                      <?php echo e($history->log); ?>

                      
                      <small class="text-muted font-size-12 wallet-log-history-block">
                        <?php if($history->procces == 0): ?>
                        
                        <small class="text-white ">
                          (<?php echo e(__("Pending")); ?>)
                        </small>
        
                        <?php else: ?> 
                          <small class="text-white">(<?php echo e(__("Credited to wallet")); ?>)</small>
                        <?php endif; ?>
                        
                      </small>
                    </h6>
                    <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
        
                    <?php if(isset($aff_history)): ?>
                    <div class="mx-auto width200px">
                      <?php echo $aff_history->links(); ?>

                    </div>
                    <?php endif; ?>
                  </div>
        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mobile-tabs" id="mobileTabs">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item active">
            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#details" role="tab" aria-controls="pills-home" aria-selected="true" title="Details"><i class="fa fa-user"></i></a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#paymenthistory" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-file-text"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-history-tab" href="<?php echo e(route('watchhistory')); ?>" role="tab" aria-controls="pills-history" aria-selected="false"><i class="fa fa-history"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-hidden-tab" href="<?php echo e(route('hidden.videos')); ?>" role="tab" aria-controls="pills-hidden" aria-selected="false"><i class="fa fa-ban"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-watchlist-tab" href="<?php echo e(url('account/watchlist')); ?>" role="tab" aria-controls="pills-watchlist" aria-selected="false"><i class="fa fa-heart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-wallet-tab"  href="<?php echo e(route('user.wallet.show')); ?>" role="tab" aria-controls="pills-wallet" aria-selected="false"><i class="fa fa-credit-card"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-affiliate-tab" data-toggle="pill" href="#affiliate" role="tab" aria-controls="pills-affiliate" aria-selected="false"><i class="fa fa-gift"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(document).ready(function(){

  $('#upload_form').on('change', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo e(route('user.uploadImage')); ?>",
      method:"POST",
      data:new FormData(this),
      dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success:function(data)
      {
        if(data.class_name == 'alert-success'){
          setTimeout(function(){// wait for 5 secs(2)
         
            $('#message').css('display', 'block');
            $('#message').html(data.message);
            $('#message').addClass(data.class_name);
              // then reload the page.(3)
            location.reload();
          }, 500); 
        }else{
          $('#message').css('display', 'block');
            $('#message').html(data.message);
            $('#message').addClass(data.class_name);
        }
       
      }
    })
  });

});
</script>
<script>
  $(window).scroll(function() {
      if ($(this).scrollTop() > 850) {

          $('#mobileTabs').addClass('d-none').removeClass('d-flex');
      } else {
          $('#mobileTabs').addClass('d-flex').removeClass('d-none');
      }
  });

  $(function(){
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#user-tab a[href="' + activeTab + '"]').tab('show');
        $('#mobileTabs a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/user/index.blade.php ENDPATH**/ ?>