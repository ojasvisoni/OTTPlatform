
<?php $__env->startSection('title',__('adminstaticwords.Edit')." ". $user->name); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block">
    <h4 class="admin-form-text">
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
      <a href="<?php echo e(url('admin/users')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.GoBack')); ?>" class="btn-floating"><i class="material-icons">reply</i></a> 
      <?php endif; ?>
      <?php echo e(__('adminstaticwords.EditUser')); ?></h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">       
          <?php echo Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id], 'files' => true]); ?>

            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
              <?php echo Form::label('name', __('adminstaticwords.EnterName')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterYourName')); ?>"></i>
              <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required',]); ?>

              <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::label('email',__('adminstaticwords.EmailAddress')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterYourEmail')); ?>"></i>
              <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']); ?>

              <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
            </div>
           <div class="search form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('password', __('adminstaticwords.Password')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterYourPassword')); ?>"></i>
              <?php echo Form::password('password', ['id' => 'password',' class' => 'form-control', 'placeholder' => __('adminstaticwords.PleaseEnterYourPassword')]); ?>

               <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
              <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
            </div>
            <div class="search form-group<?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('confirm_password', __('adminstaticwords.ConfirmPassword')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterYourPasswordAgain')); ?>"></i>
              <?php echo Form::password('confirm_password', ['id' => 'confirm_password','class' => 'form-control', 'placeholder' => __('adminstaticwords.PleaseEnterYourPasswordAgain') ]); ?>

               <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
              <small class="text-danger"><?php echo e($errors->first('confirm_password')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
              <?php echo Form::label('role',__('Role')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Please Select Your Role')); ?>"></i>
              <select class="select2" name="role" id="">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option <?php echo e($user->getRoleNames()->contains($role->name) ? 'selected' : ""); ?>  value="<?php echo e($role->name); ?>"><?php echo e(ucfirst($role->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <small class="text-danger"><?php echo e($errors->first('role')); ?></small>
            </div>
            <div class="search form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
              <?php echo Form::label('dob', __('adminstaticwords.DateOfBirth')); ?>

              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterDateOfBirthOfUser')); ?>"></i>
             <input type="date" class="form-control" value="<?php echo e($user->dob); ?>" name="dob"  />
            
              <small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
            </div>
           
            
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><?php echo e(__('adminstaticwords.Update')); ?></button>
            </div>
          <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>  
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function(){
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });


  $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>