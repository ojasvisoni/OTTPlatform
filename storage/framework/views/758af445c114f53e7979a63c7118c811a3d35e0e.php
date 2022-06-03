<?php if($config->blog == '1'): ?>
<?php if(isset($menu->getblogs) && count($menu->getblogs)>0): ?>
<div class="genre-prime-block blogs-page">
    <div class="container-fluid">
        <h5 class="section-heading"><?php echo e(__('staticwords.recentlyblog')); ?></h5>
        <div class="genre-prime-blog-slider owl-carousel">
            <?php $__currentLoopData = $menu->getblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($blog->blogs['is_active'] == 1): ?>
            <div class="genre-prime-blog-slide">
                <div class="genre-slide-blog-image protip blog-image-thumb" data-pt-placement="outside"
                    data-pt-title="#prime-mix-description-block-blog<?php echo e($blog->id); ?>">
                    <a href="<?php echo e(url('account/blog/'.$blog->blogs['slug'])); ?>">
                    <?php if($blog->blogs->image != null): ?>
                    <img data-src="<?php echo e(asset('images/blog/'.$blog->blogs['image'])); ?>" class="img-responsive owl-lazy"
                         alt="blog-image">
                    <?php else: ?>
                    <img data-src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive owl-lazy" alt="blog-image">
                    <?php endif; ?>
                    </a>
                </div>
                <!-- OVERLAY -->
                <div class="hidden-content blog-content">
                    <div class="m-box-details-wrap">
                        <a href="<?php echo e(url('account/blog/'.$blog->blogs['slug'])); ?>">
                            <h4 class="m-box-title ellipsis">
                                <?php echo e($blog->blogs['title']); ?>

                            </h4>
<!--                            <div class="m-box-sub-title">
                                 <?php echo e(date ('d.m.Y',strtotime($blog->blogs['created_at']))); ?> <span class="pipe">|</span> <?php echo e($blog->blogs->users['name']); ?>

                            </div>-->
                            <div class="m-box-desc">
                                <?php echo str_limit($blog->blogs->detail, 215); ?>

                            </div>
                        </a>
                    </div>
<!--                    <div class="action-btn-wrap">
                        <span class="play-button-wrap">
                            <a class="iframe btn btn-primary cboxElement" href="<?php echo e(url('account/blog/'.$blog->blogs['slug'])); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                        </span>
                    </div>-->
                </div>
                
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/bloghome.blade.php ENDPATH**/ ?>