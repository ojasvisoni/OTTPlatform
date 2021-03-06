
<?php $__env->startSection('title',__('staticwords.refundpolicy')); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper  user-account-section">
    <div class="container-fluid faq-main-block terms-main-block">
      <h4 class="heading"><?php echo e(__('staticwords.refundpolicy')); ?></h4>
      <ul class="bradcump">
        <li><a href="<?php echo e(url('account')); ?>"><?php echo e(__('staticwords.dashboard')); ?></a></li>
        <li>/</li>
        <li><?php echo e(__('staticwords.refundpolicy')); ?></li>
      </ul>
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-9">
              <?php if(isset($refund_pol)): ?>
                <div class="info"><?php echo $refund_pol; ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/refund_pol.blade.php ENDPATH**/ ?>