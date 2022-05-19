
<?php $__env->startSection('title',__('adminstaticwords.AllCoupons')); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon.create')): ?>
        <a href="<?php echo e(route('coupons.create')); ?>" class="btn btn-danger btn-md"><i class="material-icons left">add</i><?php echo e(__('adminstaticwords.CreateCoupon')); ?></a>
      <?php endif; ?>
      <!-- Delete Modal -->
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon.delete')): ?>
        <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> <?php echo e(__('adminstaticwords.DeleteSelected')); ?></a>   
      <?php endif; ?>
      <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading"><?php echo e(__('adminstaticwords.AreYouSure')); ?> ?</h4>
              <p><?php echo e(__('adminstaticwords.DeleeWarrning')); ?></p>
            </div>
            <div class="modal-footer">
              <?php echo Form::open(['method' => 'POST', 'action' => 'CouponController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('adminstaticwords.No')); ?></button>
                <button type="submit" class="btn btn-danger"><?php echo e(__('adminstaticwords.Yes')); ?></button>
              <?php echo Form::close(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body table-responsive content-block-two">
      <table id="full_detail_table" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
              #
            </th>
            <th><?php echo e(__('adminstaticwords.CouponCode')); ?></th>
            <th><?php echo e(__('adminstaticwords.PercentOff')); ?></th>
            <th><?php echo e(__('adminstaticwords.AmountOff')); ?></th>
            <th><?php echo e(__('adminstaticwords.Duration')); ?></th>
            <th><?php echo e(__('adminstaticwords.DurationInMonths')); ?></th>
            <th><?php echo e(__('adminstaticwords.MaxRedm')); ?>..</th>
            <th><?php echo e(__('adminstaticwords.RedeemBy')); ?></th>
            <th><?php echo e(__('adminstaticwords.Actions')); ?></th>
          </tr>
        </thead>
        <?php if($coupons): ?>
          <tbody>
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($coupon->id); ?>" id="checkbox<?php echo e($coupon->id); ?>">
                    <label for="checkbox<?php echo e($coupon->id); ?>" class="material-checkbox"></label>
                  </div>
                  <?php echo e($key+1); ?>

                </td>
                <td><?php echo e($coupon->coupon_code); ?></td>
                <td><?php echo e($coupon->percent_off ? $coupon->percent_off.'%' : '-'); ?></td>
                <td>
                  <?php if($coupon->amount_off): ?>
                    <i class="<?php echo e($currency_symbol); ?> main-curr"></i><?php echo e($coupon->amount_off); ?>

                  <?php endif; ?>
                </td>
                <td><?php echo e($coupon->duration); ?></td>
                <td><?php echo e($coupon->duration_in_months); ?></td>
                <td><?php echo e($coupon->max_redemptions); ?></td>
                <td><?php echo e(date('F d, Y',strtotime($coupon->redeem_by))); ?></td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon.delete')): ?>
                <td>
                  <?php if($coupon->in_stripe != 1): ?>
                  <div class="admin-table-action-block">
                    <a href="<?php echo e(route('coupons.edit', $coupon->id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.Edit')); ?>" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>

                  </div>
                  <?php endif; ?>
                  <div class="admin-table-action-block">
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#<?php echo e($coupon->id); ?>deleteModal"><i class="material-icons">delete</i> </button>
                  </div>
                </td>
                <?php endif; ?>
              </tr>
              <!-- Delete Modal -->
              <div id="<?php echo e($coupon->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('adminstaticwords.AreYouSure')); ?> ?</h4>
                      <p><?php echo e(__('adminstaticwords.DeleteWarrning')); ?></p>
                    </div>
                    <div class="modal-footer">
                      <?php echo Form::open(['method' => 'DELETE', 'action' => ['CouponController@destroy', $coupon->id]]); ?>

                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('adminstaticwords.No')); ?></button>
                          <button type="submit" class="btn btn-danger"><?php echo e(__('adminstaticwords.Yes')); ?></button>
                      <?php echo Form::close(); ?>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        <?php endif; ?>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('custom-script'); ?>
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/admin/coupon/index.blade.php ENDPATH**/ ?>