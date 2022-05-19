<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo e(__('Warning !')); ?></title>
	<link rel="stylesheet" href="<?php echo e(url('installer/css/bootstrap.min.css')); ?>" crossorigin="anonymous">
   
    <link rel="stylesheet" href="<?php echo e(url('installer/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('installer/css/shards.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(url('css/font-awesome.min.css')); ?>">
</head>
<body>
<br/>
	<div class="container">
		<div class="card">
           <div class="card-header">
              <h3 class="m-3 text-center text-danger">
                  <?php echo e(__('Warning')); ?>

              </h3>
           </div>
          	<div class="card-body">
          		<div class="card-body" id="stepbox">
               			<strong class="text-black"><?php echo e(__('You tried to update the domain which is invalid !')); ?> 
               			<hr>
               			<h4><?php echo e(__('You can use this project only in single domain for multiple domain please check License standard')); ?> <a target="_blank" href="https://codecanyon.net/licenses/standard"><?php echo e(__('here')); ?></a>.</h4>
                    <hr>
                    <form class="needs-validation" action="<?php echo e(url('/change-domain')); ?>" method="POST" novalidate>
                      <?php echo csrf_field(); ?>

                      <div class="form-group">
                        <label>
                          <?php echo e(__('Enter the new domain where you want to move the license')); ?> : <span class="text-danger">*</span>
                        </label>
                        <input required class="form-control <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="domain" value="<?php echo e(old('domain')); ?>" placeholder="eg:example.com"/>

                        <?php if($errors->has('domain')): ?>
                          <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('domain')); ?></strong>
                          </span>
                        <?php endif; ?>

                        <small class="text-muted">
                          <i class="fa fa-question-circle"></i> <?php echo e(__('IF in some cases on current domain if you face the error you can re-update the domain by entering here')); ?>.
                        </small>

                        <br>

                        <small class="text-muted">
                          <i class="fa fa-question-circle"></i> <?php echo e(__('IF still facing the access denied error please con')); ?> <a target="_blank" href="https://codecanyon.net/item/emart-laravel-multivendor-ecommerce-advanced-cms/25300293/support"><?php echo e(__('Support')); ?></a> <?php echo e(__('for updation in domain.')); ?>.
                        </small>

                      </div>
                      

                      <div class="form-group">
                        <button type="submit" class="btn btn-md btn-default">
                         <?php echo e(__(' Change domain')); ?>

                        </button>
                      </div>
                    </form>
                  <hr>  
   				</div>
   			</div>
        <p class="text-center m-3 text-white">&copy;<?php echo e(date('Y')); ?> | <?php echo e(__('Next Hour - Movie Tv Show & Video Subscription Portal Cms Web And App')); ?> | <a class="text-white" href="http://mediacity.co.in"><?php echo e(__('Media City')); ?></a></p>
      </div>
      <div class="corner-ribbon bottom-right sticky green shadow"><?php echo e(__('Warning')); ?> </div>
	
	</div>

</body>
    <script type="text/javascript" src="<?php echo e(url('installer/js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
    <script type="text/javascript" src="<?php echo e(url('installer/js/popper.min.js')); ?>"></script> 
    <script src="<?php echo e(url('installer/js/shards.min.js')); ?>"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
      });
      }, false);
    })();
  </script>
</html><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/accessdenied.blade.php ENDPATH**/ ?>