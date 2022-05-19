
<?php $__env->startSection('title',__("FAQ's")); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid faq-main-block">
      <h4 class="heading"><?php echo e(__('staticwords.frequentlyaskedquestions')); ?></h4>
      <ul class="bradcump">
        <li><a href="<?php echo e(url('account')); ?>"><?php echo e(__('staticwords.dashboard')); ?></a></li>
        <li>/</li>
        <li><?php echo e(__('staticwords.faq')); ?></li>
      </ul>
      <div class="panel-setting-main-block">
        <div id="accordion" class="myaccordion">
          <?php if(isset($faqs)): ?>
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <div class="mb-0">
                    <button class="accordion-button btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo e($faq->id); ?>" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-plus"></i><i class="fa fa-minus"></i> <?php echo e($faq->question); ?>

                    </button>
                  </div>
                </div>
                <div id="collapse<?php echo e($faq->id); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <?php echo e($faq->answer); ?>

                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/faq.blade.php ENDPATH**/ ?>