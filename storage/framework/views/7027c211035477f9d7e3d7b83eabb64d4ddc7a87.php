
<?php $__env->startSection('title',__('staticwords.subscribe')); ?>
<?php $__env->startSection('main-wrapper'); ?>
<section id="main-wrapper" class="main-wrapper user-account-section stripe-content">
    <div class="container-fluid">
<!--        <h3 class="payment-title"><?php echo e(__('staticwords.paymentinformation')); ?></h3>
        <br/>-->
        <div class="custom-payment-box">
             <h3 class="payment-title"><?php echo e(__('staticwords.paymentinformation')); ?></h3>
            <div class="row panel-setting-main-block">
                <div class="col-md-6 col-sm-12">
                    <div class="package_information">
                        <div class="panel-default">
                            <div class="panel-heading"><?php echo e(__('staticwords.purchasepackageinformation')); ?></div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <th><?php echo e(__('staticwords.packagename')); ?></th>
                                        <td><?php echo e($plan->name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('staticwords.amount')); ?></th>
                                        <td><i class="<?php echo e($plan->currency_symbol); ?>"></i> <?php echo e(number_format(($plan->amount) / ($plan->interval_count),2)); ?> <?php if(Session::has('current_currency')): ?>(<?php echo e(currency($plan->amount, $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency, $format = true)); ?> <?php echo e(__('equivalent to your currency')); ?>)<?php endif; ?></td>
                                    </tr>
                                    <?php if(Session::has('coupon_applied')): ?>
                                    <tr>
                                        <th><?php echo e(__('Coupon')); ?> - (<b><?php echo e(ucfirst(Session::get('coupon_applied')['code'])); ?></b>)</th>
                                        <td><i class="<?php echo e($plan->currency_symbol); ?>"></i> <?php echo e(Session::get('coupon_applied')['amount']); ?> OFF</td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Total Amount')); ?></th>
                                        <td><i class="<?php echo e($plan->currency_symbol); ?>"></i> <?php echo e($plan->amount - Session::get('coupon_applied')['amount']); ?> /  <?php echo e($plan->interval); ?> <?php if(Session::has('current_currency')): ?>(<?php echo e(currency($plan->amount - Session::get('coupon_applied')['amount'], $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency, $format = true)); ?> <?php echo e(__('equivalent to your currency')); ?>) <?php endif; ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if(!Session::has('coupon_applied')): ?>
                                    <tr>
                                        <th><?php echo e(__('staticwords.duration')); ?></th>
                                        <td>
                                            <i class="<?php echo e($plan->currency_symbol); ?>"></i> <?php echo e(number_format(($plan->amount) / ($plan->interval_count),2)); ?>/
                                            <?php echo e($plan->interval); ?> <?php if(Session::has('current_currency')): ?> (<?php echo e(currency($plan->amount, $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency, $format = true)); ?> <?php echo e(__('equivalent to your currency')); ?>) <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <ul class="nav nav-tabs tabs-left sideways payment-sideways">
                        <!-- stripe tab -->
                        <?php if(isset($stripe_payment) && $stripe_payment == 1 && in_array('stripe',$currency_payments)): ?>
                        <li class="active"><a href="#stripe" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Stripe</a></li>
                        <?php endif; ?>
                        <!-- end stripe -->
                        <!-- paypal tree -->
                        <?php if(isset($paypal_payment) && $paypal_payment == 1 && in_array('paypal',$currency_payments)): ?>
                        <li><a href="#paypal" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Paypal !</a></li>
                        <?php endif; ?>
                        <!-- paypal end -->
                        <!-- braintree tab -->
                        <?php if(isset($braintree) && $braintree==1 && in_array('braintree',$currency_payments)): ?>
                        <li><a href="#braintree" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Braintree</a></li>
                        <?php endif; ?>
                        <!-- end braintree -->
                        <?php if(isset($payhere_payment) && $payhere_payment == 1 && in_array('payhere',$currency_payments)): ?>
                        <!-- payhere tab -->
                        <li><a href="#payhere" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> PayHere</a></li>
                        <!-- payhere end tab -->
                        <?php endif; ?>
                        <!-- coinpayment tab -->
                        <?php if(isset($coin_payment) && $coin_payment == 1 && in_array('coinpay',$currency_payments)): ?>
                        <li><a href="#coinpay" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> CoinPayment</a></li>
                        <?php endif; ?>
                        <!-- end coin payment -->
                        <!-- Mollie tab -->
                        <?php if(isset($mollie_payment) && $mollie_payment == 1 && in_array('mollie',$currency_payments)): ?>
                        <li><a href="#mollie" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Mollie</a></li>
                        <?php endif; ?>
                        <!-- end Mollie -->
                        <!-- Cashfree tab -->
                        <?php if(isset($cashfree_payment) && $cashfree_payment == 1 && in_array('cashfree',$currency_payments)): ?>
                        <li><a href="#cashfree" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Cashfree</a></li>
                        <?php endif; ?>
                        <!-- end cashfree -->
                        <!-- payu tab -->
                        <?php if(isset($payu_payment) && $payu_payment == 1 && in_array('payu',$currency_payments)): ?>
                        <li><a href="#payu" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> PayUmoney !</a></li>
                        <?php endif; ?>
                        <!-- end payu tab -->
                        <!-- Paytm tab-->
                        <?php if(isset($paytm_payment) && $paytm_payment == 1 && in_array('paytm',$currency_payments)): ?>
                        <li><a href="#paytm" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Paytm</a></li>
                        <?php endif; ?>
                        <!-- end paytm-->
                        <!-- Razorpay tab-->
                        <?php if(isset($razorpay_payment) && $razorpay_payment == 1 && in_array('razorpay',$currency_payments)): ?>
                        <!--<li><a href="#razorpay" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Razorpay</a></li>-->
                        <?php endif; ?>
                        <!-- end razorpay-->
                        <!-- Instamojo tab-->
                        <?php if(isset($instamojo_payment) && $instamojo_payment == 1 && in_array('instamojo',$currency_payments)): ?>
                        <li><a href="#instamojo" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Instamojo</a></li>
                        <?php endif; ?>
                        <!-- end instamojo-->
                        <!-- Paystack Tab -->
                        <?php if(isset($paystack) && $paystack == 1 && in_array('paystack',$currency_payments)): ?>
                        <li><a href="#paystack" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Paystack</a></li>
                        <?php endif; ?>
                        <!-- flutterrave tab-->
                        <?php if(isset($flutterrave_payment) && $flutterrave_payment == 1 && in_array('flutterrave',$currency_payments)): ?>
                        <li><a href="#flutterrave" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Flutterrave</a></li>
                        <?php endif; ?>
                        <!-- end flutterrave tab-->
                        <!-- omise tab -->
                        <?php if(isset($omise_payment) && $omise_payment == 1 && in_array('omise',$currency_payments)): ?>
                        <li class=""><a href="#omise" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> Omise</a></li>
                        <?php endif; ?>
                        <!-- end omise -->
                        <?php if(isset($manualpaymentmethod)): ?> 
                        <?php $__currentLoopData = $manualpaymentmethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#<?php echo e(str_slug($mpm->payment_name, '-')); ?>" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> <?php echo e($mpm->payment_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(isset($bankdetails) && $bankdetails == 1 && in_array('bankdetail',$currency_payments)): ?> 
                        <li><a href="#bankdetails" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> <?php echo e(__('staticwords.BankTransfer')); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($walletsetting) && $walletsetting->enable_wallet == 1): ?> 
                        <li><a href="#wallet" data-toggle="tab"><?php echo e(__('staticwords.CheckoutWith')); ?> <?php echo e(__('Wallet')); ?></a></li>
                        <?php endif; ?>
                        <!-- AuthorizeNet tab -->
                        <?php if(config('authorizenet.ENABLE') == 1 && Module::has('AuthorizeNet') && Module::find('AuthorizeNet')->isEnabled()): ?>
                        <?php echo $__env->make("authorizenet::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- end AuthorizeNet -->
                        <!-- Bkash tab -->
                        <?php if(config('bkash.ENABLE') == 1 && Module::has('Bkash') && Module::find('Bkash')->isEnabled()): ?>
                        <?php echo $__env->make("bkash::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- end Bkash -->
                        <!-- DPO tab -->
                        <?php if(config('dpopayment.enable') == 1 && Module::has('DPOPayment') && Module::find('DPOPayment')->isEnabled()): ?>
                        <?php echo $__env->make("dpopayment::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- end DPO -->
                        <!-- Esewa -->
                        <?php if(config('esewa.ENABLE') == 1 && Module::has('Esewa') && Module::find('Esewa')->isEnabled()): ?>
                        <?php echo $__env->make("esewa::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Esewa -->
                        <!-- Midtrains -->
                        <?php if(config('midtrains.ENABLE') == 1 && Module::has('Midtrains') && Module::find('Midtrains')->isEnabled()): ?>
                        <?php echo $__env->make("midtrains::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Midtrains -->
                        <!-- Mpesa -->
                        <?php if(config('mpesa.ENABLE') == 1 && Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>
                        <?php echo $__env->make("mpesa::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Mpesa -->
                        <!-- Paytab -->
                        <?php if(config('paytab.ENABLE') == 1 && Module::has('Paytab') && Module::find('Paytab')->isEnabled()): ?>
                        <?php echo $__env->make("paytab::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Paytab -->
                        <!-- Senangpay -->
                        <?php if(config('senangpay.ENABLE') == 1 && Module::has('Senangpay') && Module::find('Senangpay')->isEnabled()): ?>
                        <?php echo $__env->make("senangpay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Senangpay -->
                        <!-- Smanager -->
                        <?php if(config('smanager.ENABLE') == 1 && Module::has('Smanager') && Module::find('Smanager')->isEnabled()): ?>
                        <?php echo $__env->make("smanager::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Smanager -->
                        <!-- SquarePay -->
                        <?php if(config('squarepay.ENABLE') == 1 && Module::has('SquarePay') && Module::find('SquarePay')->isEnabled()): ?>
                        <?php echo $__env->make("squarepay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End SquarePay -->
                        <!-- Worldpay -->
                        <?php if(config('worldpay.ENABLE') == 1 && Module::has('Worldpay') && Module::find('Worldpay')->isEnabled()): ?>
                        <?php echo $__env->make("worldpay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Worldpay -->
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <!--<h4 class="heading"><a href="<?php echo e(url('account')); ?>"><?php echo e(__('staticwords.Pay')); ?> &nbsp;<i class="<?php echo e($currency_symbol); ?>"></i> <?php echo e($plan->amount); ?> <?php echo e(__('staticwords.pay_method')); ?></a></h4>-->
                    <?php
                    $session_amount = Session::has('coupon_applied') ? Session::get('coupon_applied')['amount'] : 0
                    ?>
                    <div class="row">
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
                    </div>
<!--                    <form action="<?php echo e(route('coupon.apply')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10 col-sm-8 col-xs-10 payment-form-left">
                                    
                                    <input id="coupon" class="form-control" type="text" name="coupon_code" placeholder="Enter Your Coupon Code">
                                    <input id="plan_id" class="form-control" type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>" >
                                    <input id="user_id" class="form-control" type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" >
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-2 payment-form-btn">
                                    <input type="submit" class="btn btn-md btn-info applybutton" value="Apply">
                                </div>
                            </div>
                        </div>
                    </form>-->
                    
                    <div class="tab-content payment-tab-content">
                        <!-- Stript tab -->
                        <?php if(isset($stripe_payment) && $stripe_payment == 1 && in_array('stripe',$currency_payments)): ?>
                        <div class="tab-pane active" id="stripe">
                            <?php if(env('STRIPE_KEY') != NULL && env('STRIPE_SECRET') != NULL): ?>
                            <?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@subscribe', 'id' => 'payment-form']); ?>

                            <?php echo e(csrf_field()); ?>

                            <div class="form-row">
                                <input type="hidden" name="plan" value="<?php echo e($plan->id); ?>">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <button id="card-button" data-secret="<?php echo e($intent->client_secret); ?>" class="payment-btn stripe"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <?php echo Form::close(); ?>

                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Stripe Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end stripe -->
                        <!-- paypal tab -->
                        <?php if(isset($paypal_payment) && $paypal_payment == 1 && in_array('paypal',$currency_payments)): ?>
                        <div class="tab-pane" id="paypal">
                            <?php if(env('PAYPAL_CLIENT_ID') != NULL && env('PAYPAL_SECRET_ID') != NULL && env('PAYPAL_MODE') != NULL): ?>
                            <?php echo Form::open(['method' => 'POST', 'action' => 'PaypalController@postPaymentWithpaypal']); ?>

                            <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                            <input type="hidden" name="amount" value="<?php echo e($plan->amount - $session_amount); ?>">
                            <button class="payment-btn paypal-btn"><i class="fa fa-credit-card"></i> <?php echo e(__('staticwords.payvia')); ?> Paypal</button>
                            <?php echo Form::close(); ?>

                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Paypal Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end paypal -->
                        <!-- Braintree tab -->
                        <?php if(isset($braintree) && $braintree==1 && in_array('braintree',$currency_payments)): ?>
                        <div class="tab-pane" id="braintree">
                            <?php if(env('BTREE_ENVIRONMENT') != NULL && env('BTREE_MERCHANT_ID') !=NULL && env('BTREE_PUBLIC_KEY') !=NULL && env('BTREE_PRIVATE_KEY') != NULL && env('BTREE_MERCHANT_ACCOUNT_ID') != NULL): ?>
                            <div id="paypal-errors" role="alert"></div>
                            <a href="javascript:void(0);" class="payment-btn bt-btn"><i class="fa fa-credit-card"></i> <?php echo e(__('staticwords.payvia')); ?> Card / Paypal</a>
                            <div class="braintree">
                                <form method="POST" id="bt-form" action="<?php echo e(url('payment/braintree')); ?>">
                                    <?php echo e(csrf_field()); ?> 
                                    <div class="form-group">
                                        <label for="amount"><?php echo e(__('staticwords.amount')); ?></label>                       
                                        <input type="text" class="form-control"name="amount" readonly="" value="<?php echo e($plan->amount - $session_amount); ?>">  
                                    </div>
                                    <div class="bt-drop-in-wrapper">
                                        <div id="bt-dropin"></div>
                                    </div>
                                    <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>"/>
                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                    <div id="pay-errors" role="alert"></div>
                                    <button class="payment-btn" type="submit"><span><?php echo e(__('staticwords.paynow')); ?></span></button>
                                </form>
                            </div>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Braintree Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end braintree -->
                        <!-- Mollie tab -->
                        <?php if(isset($mollie_payment) && $mollie_payment == 1 && in_array('mollie',$currency_payments)): ?> 
                        <div class="tab-pane" id="mollie">
                            <?php if(env('MOLLIE_KEY') != NULL): ?>
                            <div class="paymollie">
                                <form method="POST" action="<?php echo e(route('payviamoli_subscription')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="amount" value="<?php echo e($plan->amount - $session_amount); ?>"> 
                                    <input type="hidden" name="currency" value="<?php echo e($plan->currency); ?>"> 
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['plan_id' => $plan->id,])); ?>" > 
                                    <button class="payment-btn paymollie-btn"><i class="fa fa-credit-card"></i> Pay Via Mollie</button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?> 
                        <!-- end Mollie -->
                        <!-- cashfree tab -->
                        <?php if(isset($cashfree_payment) && $cashfree_payment == 1 && in_array('cashfree',$currency_payments)): ?>
                        <div class=" row tab-pane" id="cashfree">
                            <?php if(env('CASHFREE_APP_ID') != NULL && env('CASHFREE_SECRET_ID') != NULL && env('CASHFREE_API_END_URL') != NULL): ?>
                            <?php if(isset(Auth::user()->mobile) && Auth::user()->mobile != NULL): ?>
                            <div class="cashfree">
                                <?php echo Form::open(['method' => 'POST', 'action' => 'PayViaCashFreeController@payment']); ?>

                                <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                                <input type="hidden" name="amount" value="<?php echo e($plan->amount - $session_amount); ?>">
                                <input type="hidden" name="currency" value="<?php echo e($plan->currency); ?>">
                                <button class="payment-btn cashfree-btn"><i class="fa fa-credit-card"></i> Pay Via Cashfree</button>
                                <?php echo Form::close(); ?>

                            </div>
                            <?php else: ?>
                            <p class="text-danger"><?php echo e(__('Please filled your mobile no')); ?>. <a href="<?php echo e(url('/account/profile')); ?>"><?php echo e(__('clickhere')); ?></a></p>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Cashfree
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?> 
                        <!-- end cashfree tab -->
                        <!-- coinpayment tab -->
                        <?php if(isset($coin_payment) && $coin_payment==1 && in_array('coinpay',$currency_payments)): ?>
                        <div class="tab-pane" id="coinpay">
                            <?php if(env('COINPAYMENTS_MERCHANT_ID') != NULL && env('COINPAYMENTS_PUBLIC_KEY') != NULL && env('COINPAYMENTS_PRIVATE_KEY') != NULL): ?>
                            <div class="coinpayment">
                                <form method="POST" id="coinpayment-form" action="<?php echo e(url('payment/coinpayment')); ?>">
                                    <?php echo e(csrf_field()); ?> 
                                    <div class="form-group">
                                        <label for="amount"><?php echo e(__('staticwords.amount')); ?></label>                       
                                        <input type="text" class="form-control"name="amount" readonly="" value="<?php echo e($plan->amount - $session_amount); ?>">
                                        <label for="amount"><?php echo e(__('staticwords.currency')); ?></label> 
                                        <select style="padding: 0px; " class="form-control" name="currency">
                                            <option value="BTC">BTC</option>
                                            <option value="LTC">LTC</option>
                                            <option value="ETH">ETH</option>
                                            <option value="LOKI">LOKI</option>
                                            <option value="XZC">XZC</option>
                                        </select>
                                        <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>"/>
                                    </div>
                                    <button class="payment-btn" type="submit"><span><?php echo e(__('staticwords.paynow')); ?></span></button>
                                </form>
                            </div>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Coin Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end coinpayment -->
                        <!-- Payu tab -->
                        <?php if(isset($payu_payment) && $payu_payment == 1 && in_array('payu',$currency_payments)): ?>
                        <div class="tab-pane" id="payu">
                            <?php if(env('PAYU_METHOD') != NULL && env('PAYU_DEFAULT') != NULL && env('PAYU_MERCHANT_KEY') != NULL && env('PAYU_MERCHANT_SALT') != NULL): ?>
                            <?php echo Form::open(['method' => 'POST', 'action' => 'PayuController@payment']); ?>

                            <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                            <button class="payment-btn payu-btn"><i class="fa fa-credit-card"></i> <?php echo e(__('staticwords.payvia')); ?> Payu</button>
                            <?php echo Form::close(); ?>

                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Payu Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end payu -->
                        <!-- patym tab -->
                        <?php if(isset($paytm_payment) && $paytm_payment == 1 && in_array('paytm',$currency_payments)): ?>
                        <div class="tab-pane" id="paytm">
                            <?php if(env('PAYTM_MID') != NULL && env('PAYTM_MERCHANT_KEY') != NULL): ?>
                            <div class="paytm">
                                <?php echo Form::open(['method' => 'POST', 'action' => 'PaytemController@store']); ?>

                                <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                                <button class="payment-btn paytm-btn"><i class="fa fa-credit-card"></i> <?php echo e(__('staticwords.payvia')); ?> Paytm</button>
                                <?php echo Form::close(); ?>

                            </div>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Paytm Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end paytm -->
                        <!-- razorpay tab -->
                        <?php if(isset($razorpay_payment) && $razorpay_payment == 1 && in_array('razorpay',$currency_payments)): ?>
                        <div class="tab-pane active" id="razorpay">
                            <?php if(env('RAZOR_PAY_KEY') != NULL && env('RAZOR_PAY_SECRET') != NULL): ?>
                            <form action="<?php echo e(route('paysuccess',$plan->id)); ?>" method="POST">
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="<?php echo e(env('RAZOR_PAY_KEY')); ?>"
                                    data-amount="<?php echo e(($plan->amount - $session_amount)*100); ?>"
                                    data-buttontext="Pay Now"
                                    data-name="<?php echo e(config('app.name')); ?>"
                                    data-description="Payment For Order <?php echo e(uniqid()); ?>"
                                    data-image="<?php echo e(url('images/logo/'.$logo)); ?>"
                                    data-prefill.name="<?php echo e(Auth::user()->name); ?>"
                                    data-prefill.email="<?php echo e(Auth::user()->email); ?>"
                                    data-theme.color="#111111"></script>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" custom="Hidden Element" name="hidden">
                            </form>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Razorpay Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end razorpay -->
                        <!-- instamojo tab -->
                        <?php if(isset($instamojo_payment) && $instamojo_payment == 1 && in_array('instamojo',$currency_payments)): ?>
                        <div class="tab-pane" id="instamojo">
                            <?php if(env('IM_API_KEY') != NULL && env('IM_AUTH_TOKEN') != NULL && env('IM_URL') != NULL): ?>
                            <form action="<?php echo e(route('payinstamojo')); ?>" method="POST">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Name</strong>
                                            <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Mobile Number</strong>
                                            <input type="text" name="mobile_number" value="<?php echo e(Auth::user()->mobile ? Auth::user()->mobile:''); ?>" class="form-control" placeholder="Enter Mobile Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Email Id</strong>
                                            <input type="text" name="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" placeholder="Enter Email id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Event Fees</strong>
                                            <input type="text" name="amount" class="form-control" placeholder="" value="<?php echo e($plan->amount - $session_amount); ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="payment-btn instamojo-btn"><?php echo e(__('Submit')); ?></button>
                                    </div>
                                </div>
                            </form>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Instamojo Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end instamojo -->
                        <!-- Paystack Tab -->
                        <?php if(isset($paystack) && $paystack == 1 && in_array('paystack',$currency_payments)): ?>
                        <div class="tab-pane" id="paystack">
                            <?php if(env('PAYSTACK_PUBLIC_KEY') != NULL && env('PAYSTACK_SECRET_KEY') != NULL && env('PAYSTACK_PAYMENT_URL') != NULL): ?>
                            <div class="paystack">
                                <?php
                                $amount = ($plan->amount - $session_amount)*100;
                                ?>
                                <form method="POST" action="<?php echo e(url('payment/paystack')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                    <input type="hidden" name="email" value="<?php echo e($auth->email); ?>"> 
                                    <input type="hidden" name="amount" value="<?php echo e($amount); ?>"> 
                                    <input type="hidden" name="currency" value="<?php echo e($plan->currency); ?>"> 
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['plan_id' => $plan->plan_id,])); ?>" > 
                                    <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">
                                    <input type="hidden" name="key" value="<?php echo e(config('paystack.secretKey')); ?>"> 
                                    <?php echo e(csrf_field()); ?>

                                    <button class="payment-btn paystack-btn"><i class="fa fa-credit-card"></i><?php echo e(__('staticwords.payvia')); ?> Paystack</button>
                                </form>
                            </div>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Paystack Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end paystack -->
                        <?php if(isset($flutterrave_payment) && $flutterrave_payment == 1 && in_array('flutterrave',$currency_payments)): ?>
                        <div class="tab-pane" id="flutterrave">
                            <?php if(env('RAVE_PUBLIC_KEY') != NULL && env('RAVE_SECRET_KEY') != NULL && env('RAVE_COUNTRY') != NULL ): ?>
                            <form method="POST" action="<?php echo e(route('flutterrave.pay')); ?>" id="paymentForm">
                                <?php echo e(csrf_field()); ?>

                                <input class="form-control col-md-6" name="plan_id" type="hidden" value="<?php echo e($plan->id); ?>" placeholder="planid" />
                                <input class="form-control col-md-6" type="hidden"  name="name" value="<?php echo e(auth()->user()->name); ?>" placeholder="Name" />
                                <input class="form-control col-md-6" type="text"  name="amount"  value="<?php echo e($plan->amount - $session_amount); ?>" placeholder="plan amount" readonly/>
                                <input class="form-control col-md-6" name="email" value="<?php echo e(auth()->user()->email); ?>" type="hidden" placeholder="Your Email" />
                                <input class="form-control col-md-6" name="phone" value="<?php echo e(auth()->user()->mobile ? auth()->user()->mobile : '9999999999'); ?>" type="hidden" placeholder="Phone number" />
                                <input type="submit" class="payment-btn" value="<?php echo e(__('staticwords.paynow')); ?>" />
                            </form>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Flutterrave Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- omise tab -->
                        <?php if(isset($omise_payment) && $omise_payment == 1 && in_array('omise',$currency_payments)): ?>
                        <div class="tab-pane" id="omise">
                            <?php if(env('OMISE_PUBLIC_KEY') != NULL && env('OMISE_SECRET_KEY') != NULL && env('OMISE_API_VERSION') != NULL): ?>
                            <form id="checkoutForm" method="POST" action="<?php echo e(route('pay.via.omise')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                                <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                    data-key="<?php echo e(env('OMISE_PUBLIC_KEY')); ?>"
                                    data-amount="<?php echo e(($plan->amount - $session_amount)*100); ?>"
                                    data-frame-label="<?php echo e(config('app.name')); ?>"
                                    data-image="<?php echo e(url('images/logo/'.$configs->logo)); ?>"
                                    data-currency="<?php echo e($currency_code); ?>"
                                    data-default-payment-method="credit_card"></script>
                            </form>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Omise Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- omise tab -->
                        <!-- Payhere tab -->
                        <?php
                        $payhere_order_id = uniqid();
                        ?>
                        <?php if(isset($payhere_payment) && $payhere_payment == 1 && in_array('payhere',$currency_payments)): ?>
                        <div class="tab-pane" id="payhere">
                            <?php if(env('PAYHERE_BUISNESS_APP_CODE') != NULL && env('PAYHERE_APP_SECRET') != NULL && env('PAYHERE_MERCHANT_ID') != NULL && env('PAYHERE_MODE') != NULL): ?>
                            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="merchant_id" value="<?php echo e(env('PAYHERE_MERCHANT_ID')); ?>">
                                <!-- Replace your Merchant ID -->
                                <input type="hidden" name="return_url" value="<?php echo e(url('/payhere/callback')); ?>">
                                <input type="hidden" name="cancel_url" value="<?php echo e(url('/account/purchaseplan')); ?>">
                                <input type="hidden" name="notify_url" value="<?php echo e(url('/notify/payhere')); ?>">
                                <input type="hidden" name="order_id" value="<?php echo e($plan->id); ?>">
                                <input type="hidden" name="items" value="Subscription For Package <?php echo e($plan->name); ?>">
                                <input type="hidden" name="currency" value="<?php echo e(__('LKR')); ?>">
                                <input type="text" name="amount" value="<?php echo e($plan->amount); ?>">
                                <input type="hidden" name="first_name" value="<?php echo e(Auth::user()->name); ?>">
                                <input type="hidden" name="last_name" value="<?php echo e(Auth::user()->name); ?>">
                                <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                <input type="hidden" name="phone" value="<?php echo e(Auth::user()->mobile  ? Auth::user()->mobile : '99999999999'); ?>">
                                <input type="hidden" name="address"
                                    value="<?php echo e(__('No Address')); ?>">
                                <input type="hidden" name="city" value="<?php echo e(__('no')); ?>">
                                <input type="hidden" name="country" value="<?php echo e(__('no')); ?>">
                                <button type="submit" class="btn payment-btn">
                                
                                PayHere Payment
                                </button>
                            </form>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            PayHere Payment
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!-- end payhere -->
                        <!-- Bank detail Tab -->
                        <?php if(isset($bankdetails) && $bankdetails == 1 && in_array('bankdetail',$currency_payments)): ?>
                        <div class="tab-pane" id="bankdetails">
                            <?php if(($account_name != NULL) && ($account_no != NULL) && ($ifsc_code != NULL) && ($bank!= NULL)): ?>
                            <button class="payment-btn" id="bankbutton"><?php echo e(__('staticwords.DirectBankTransfer')); ?></button>
                            <div id="bankdetail" style="display: none;">
                                <br/>
                                <table class="table">
                                    <tr>
                                        <th><?php echo e(__('staticwords.AccountName')); ?></th>
                                        <td><?php echo e($account_name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('staticwords.accountnumber')); ?></th>
                                        <td><?php echo e($account_no); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('staticwords.BankName')); ?></th>
                                        <td><?php echo e($bank); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('staticwords.IFSCCode')); ?></th>
                                        <td><?php echo e($ifsc_code); ?></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="color: #d63031;">* <?php echo e(__('staticwords.BankNote')); ?> <a href="<?php echo e(url('contactus')); ?>" style="color: #00b894;"><?php echo e(__('ContactHere')); ?></a></p>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <form action="<?php echo e(route('manualpayment',$plan->id)); ?>" method="POST" enctype="multipart/form-data" >
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group<?php echo e($errors->has('recipt') ? ' has-error' : ''); ?> input-file-block col-md-12">
                                            <?php echo Form::label('recipt', 'Manual Payment -Slip upload for verification'); ?>

                                            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Manual payment - Slip Upload for verification"></i>
                                            <?php echo Form::file('recipt', ['class' => 'input-file', 'id'=>'recipt']); ?>

                                            <input type="hidden" name="user_id" value="<?php echo e($auth->id); ?>"> 
                                            <input type="hidden" name="user_name" value="<?php echo e($auth->name); ?>">
                                            <input type="hidden" name="price" value="<?php echo e($plan->amount -$session_amount); ?>"> 
                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" name="currency" value="<?php echo e($plan->currency); ?>"> 
                                            <input type="hidden" name="plan_id" value="<?php echo e($plan->plan_id); ?>"> 
                                            <input type="hidden" name="method" value="banktransfer">
                                            <br/>
                                            <button type="submit" class="btn payment-btn ">Proceed</button>
                                            <small class="text-danger"><?php echo e($errors->first('recipt')); ?></small>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php else: ?>
                            <?php $__env->startComponent('components.alert'); ?>
                            Bank Detail
                            <?php echo $__env->renderComponent(); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!--end Bank detail tab -->
                        <?php if(isset($manualpaymentmethod)): ?>
                        <?php $__currentLoopData = $manualpaymentmethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane" id="<?php echo e(str_slug($mpm->payment_name, '-')); ?>">
                            <p><?php echo e($mpm->description); ?></p>
                            <?php if($mpm->thumbnail != NULL): ?>
                            <img src="<?php echo e(url('/images/manualpayment/'.$mpm->thumbnail)); ?>" class="img img-responsive" width="150" height="100">
                            <?php endif; ?>
                            <br>
                            <form action="<?php echo e(route('manualpayment',$plan->id)); ?>" method="POST" enctype="multipart/form-data" >
                                <?php echo csrf_field(); ?>
                                <div class="form-group<?php echo e($errors->has('recipt') ? ' has-error' : ''); ?> input-file-block col-md-12">
                                    <input class="form-control" type="hidden" name="user_id" value="<?php echo e($auth->id); ?>"> 
                                    <input class="form-control" type="hidden" name="user_name" value="<?php echo e($auth->name); ?>">
                                    <input class="form-control" type="hidden" name="price" value="<?php echo e($plan->amount - $session_amount); ?>"> 
                                    <input  class="form-control" type="hidden" name="status" value="0">
                                    <input class="form-control" type="hidden" name="currency" value="<?php echo e($plan->currency); ?>"> 
                                    <input class="form-control" type="hidden" name="plan_id" value="<?php echo e($plan->plan_id); ?>"> 
                                    <input class="form-control" type="hidden" name="method" value="<?php echo e($mpm->payment_name); ?>">
                                    <input class="form-control input-file" type="file" name="recipt" required="">
                                    <button type="submit" class="btn payment-btn "><?php echo e(__('Proceed')); ?></button>
                                </div>
                            </form>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!-- Wallet -->
                        <?php if(isset($walletsetting) && $walletsetting->enable_wallet == 1): ?> 
                        <div class="tab-pane" id="wallet">
                            <?php if(isset(auth()->user()->wallet) && auth()->user()->wallet->balance >= ($plan->amount - $session_amount)): ?>
                            <form method="POST" action="<?php echo e(route('checkout.with.wallet')); ?>">
                                <input class="form-control col-md-6" name="plan_id" type="hidden" value="<?php echo e($plan->id); ?>" placeholder="planid" />
                                <input class="form-control col-md-6" type="hidden"  name="name" value="<?php echo e(auth()->user()->name); ?>" placeholder="Name" />
                                <input class="form-control col-md-6" type="hidden"  name="amount"  value="<?php echo e($plan->amount - $session_amount); ?>" placeholder="plan amount" readonly/>
                                <input class="form-control col-md-6" name="email" value="<?php echo e(auth()->user()->email); ?>" type="hidden" placeholder="Your Email" />
                                <button class="payment-btn"><?php echo e(__('paynow')); ?></button>
                            </form>
                            <?php else: ?>
                            <h4><?php echo e(__('Insufficient amount in the wallet')); ?> <span class="text-red"><?php echo e(__('Please add money in the wallet')); ?></span></h4>
                            <?php endif; ?>
                        </div>
                        
                       
                        <?php endif; ?>
                        <!-- end wallet -->
                        <!-- Authorize Net -->
                        <?php if(config('authorizenet.ENABLE') == 1 && Module::has('AuthorizeNet') && Module::find('AuthorizeNet')->isEnabled()): ?>
                        <?php echo $__env->make("authorizenet::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Authorize Net -->
                        <!-- Bkash -->
                        <?php if(config('bkash.ENABLE') == 1 && Module::has('Bkash') && Module::find('Bkash')->isEnabled()): ?>
                        <?php echo $__env->make("bkash::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Bkash -->
                        <!-- DPO -->
                        <?php if(config('dpopayment.enable') == 1 && Module::has('DPOPayment') && Module::find('DPOPayment')->isEnabled()): ?>
                        <?php echo $__env->make("dpopayment::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End DPO -->
                        <!-- Esewa -->
                        <?php if(config('esewa.ENABLE') == 1 && Module::has('Esewa') && Module::find('Esewa')->isEnabled()): ?>
                        <?php echo $__env->make("esewa::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Esewa -->
                        <!-- Midtrains -->
                        <?php if(config('midtrains.ENABLE') == 1 && Module::has('Midtrains') && Module::find('Midtrains')->isEnabled()): ?>
                        <?php echo $__env->make("midtrains::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Midtrains -->
                        <!-- Mpesa -->
                        <?php if(config('mpesa.ENABLE') == 1 && Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>
                        <?php echo $__env->make("mpesa::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Mpesa -->
                        <!-- Paytab -->
                        <?php if(config('paytab.ENABLE') == 1 && Module::has('Paytab') && Module::find('Paytab')->isEnabled()): ?>
                        <?php echo $__env->make("paytab::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Paytab -->
                        <!-- Senangpay -->
                        <?php if(config('senangpay.ENABLE') == 1 && Module::has('Senangpay') && Module::find('Senangpay')->isEnabled()): ?>
                        <?php echo $__env->make("senangpay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Senangpay -->
                        <!-- Smanager -->
                        <?php if(config('smanager.ENABLE') == 1 && Module::has('Smanager') && Module::find('Smanager')->isEnabled()): ?>
                        <?php echo $__env->make("smanager::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Smanager -->
                        <!-- SquarePay -->
                        <?php if(config('squarepay.ENABLE') == 1 && Module::has('SquarePay') && Module::find('SquarePay')->isEnabled()): ?>
                        <?php echo $__env->make("squarepay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End SquarePay -->
                        <!-- Worldpay -->
                        <?php if(config('worldpay.ENABLE') == 1 && Module::has('Worldpay') && Module::find('Worldpay')->isEnabled()): ?>
                        <?php echo $__env->make("worldpay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Worldpay -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script src="<?php echo e(url('js/stripe_v3.js')); ?>"></script>
<script>
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    
    const stripe = Stripe('<?php echo e(env("STRIPE_KEY")); ?>', { locale: "<?php echo e(app()->getLocale()); ?>" }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    
    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    
    
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
    
    event.preventDefault();
    
    stripe
        .handleCardSetup(clientSecret, cardElement, {
            payment_method_data: {
                //billing_details: { name: cardHolderName.value }
            }
        })
        .then(function(result) {
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                console.log(result);
                // Send the token to your server.
                stripeTokenHandler(result.setupIntent.payment_method);
            }
        });
    });
    
    // Submit the form with the token ID.
    function stripeTokenHandler(paymentMethod) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', paymentMethod);
    
        // hiddenInput.setAttribute('name', 'stripeToken');
        // hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
    
        // Submit the form
        form.submit();
    }
</script>
<script>
    $(function(){
      $('.paypal-btn').on('click', function(){
        $('.paypal-btn').addClass('load');
      });
    
      $('.paystack-btn').on('click', function(){
        $('.paystack-btn').addClass('load');
      });  
      $('.payu-btn').on('click', function(){
        $('.payu-btn').addClass('load');
      }); 
      $('.braintree').hide();
    });
</script>
<script src="<?php echo e(url('js/dropin.min.js')); ?>"></script>
<script>  
    var client_token = null;   
    $(function(){
      $('.bt-btn').on('click', function(){
        $('.bt-btn').addClass('load');
        $.ajax({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          type: "POST",
          
          url: "<?php echo e(url('bttoken')); ?>",
          success: function(t) {   
              if(t.client != null){
                client_token = t.client;
                btform(client_token);
                console.log(client_token);
              }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
            $('.bt-btn').removeClass('load');
            alert('Payment error. Please try again later.');
          }
        });
      });
    });
    function btform(token){
      var payform = document.querySelector('#bt-form'); 
      braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',  
        paypal: {
          flow: 'vault'
        },
      }, function (createErr, instance) {
        if (createErr) {
          console.log('Create Error', createErr);
          alert('Payment error. Please try again later.');
          return;
        }
        else{
          $('.bt-btn').hide();
          $('.braintree').show();
        }
        payform.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            alert('Payment error. Please try again later.');
            return;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          payform.submit();
        });
      });
    });
    }
    $('#bankbutton').click(function () {$('#bankdetail').toggle();});
</script>
<?php echo $__env->yieldPushContent('addon-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/subscribe.blade.php ENDPATH**/ ?>