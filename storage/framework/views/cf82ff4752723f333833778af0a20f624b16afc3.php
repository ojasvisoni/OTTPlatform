<div class="admin-table-action-block">
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.edit')): ?>
    <a href="<?php echo e(route('change_subscription_show', $id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.ChangeSubscription')); ?>" class="btn-default btn-floating"><i class="material-icons">compare_arrows</i></a>
    <a href="<?php echo e(route('users.edit', $id)); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.Edit')); ?>" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
  <?php endif; ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.delete')): ?>
    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#deleteModal<?php echo e($id); ?>"><i class="material-icons">delete</i> </button>
  <?php endif; ?>
</div>
  <div id="deleteModal<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="delete-icon"></div>
      </div>
      <div class="modal-body text-center">
        <h4 class="modal-heading"><?php echo e(__('adminstaticwords.AreYouSure')); ?></h4>
        <p><?php echo e(__('adminstaticwords.DeleteWarrning')); ?></p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="<?php echo e(route("users.destroy", $id)); ?>">
          <?php echo method_field("DELETE"); ?>
          <?php echo csrf_field(); ?>                          
          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('adminstaticwords.No')); ?></button>
            <button type="submit" class="btn btn-danger"><?php echo e(__('adminstaticwords.Yes')); ?></button>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH /var/www/html/oovmedia.com/resources/views/admin/users/action.blade.php ENDPATH**/ ?>