
<?php if(isset($blogdetail)): ?>
<?php $__env->startSection('title',"$blogdetail->title"); ?>
<?php endif; ?>
<?php $__env->startSection('main-wrapper'); ?>
<section id="blog-detail" class="blog-detail-main-block">
    <div class="container-fluid">
        <?php
        $uname=App\User::where('id',$blogdetail->user_id)->get();
        foreach($uname as $name)
        {
        $blogUser = $name;
        $user_name = $name->name;
        }
        ?>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="blog-detail-block">
                    <h3 class="blog-detail-heading btm-10"><?php echo e($blogdetail->title); ?></h3>
                    <div class="blog-detail-plan">
                        <ul>
                            <li><i class="fa fa-user"></i> <?php echo e($user_name); ?></li>
                            <li><i class="fa fa-clock-o"></i> <?php echo e(date ('F d,Y',strtotime($blogdetail->created_at))); ?> </li>
                        </ul>
                    </div>
                    <div class="blog-detail-img">
                        <?php if($blogdetail->poster != NULL): ?>
                        <img src="<?php echo e(asset('images/blog/'.$blogdetail->poster)); ?>" class="img-fluid" alt="image">
                        <?php else: ?>
                        <img src="<?php echo e(Avatar::create($blogdetail->title)->toBase64()); ?>" class="img-fluid" alt="image">
                        <?php endif; ?>
                    </div>
<!--                    <div class="user-detail">
                        <img src="<?php echo e(isset($blogdetail->users->image) ? asset('images/users/'.$blogdetail->users->image)  : Avatar::create($blogdetail->users->name)->toBase64()); ?>" class="img-fluid btm-20" alt="">
                        <div class="user-names">
                        <h3 class=""><?php echo e($blogdetail->users->name); ?></h3>
                        <p class=""><?php echo e($blogdetail->users->email); ?></p>
                        </div>
                    </div>-->
                    
                    <p><?php echo $blogdetail->detail; ?></p>
                    
                </div>
                <br>
                <div class="social-like">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widgets social-widgets social-btns">
                                <div class="footer-widgets social-widgets social-btns">
                                    <ul>
                                      <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li> 

                                      <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                      <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>

                                    </ul>
                                </div>
                                <ul>
                                    <?php if(isset($blogdetail->users->facebook_url) && $blogdetail->users->facebook_url != NULL): ?>
                                    <li><a href="<?php echo e($blogdetail->users->facebook_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if(isset($blogdetail->users->twitter_url) && $blogdetail->users->twitter_url != NULL): ?>
                                    <li><a href="<?php echo e($blogdetail->users->twitter_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>       
                                    <?php if(isset($blogdetail->users->youtube_url) && $blogdetail->users->youtube_url != NULL): ?>
                                    <li><a href="<?php echo e($blogdetail->users->youtube_url); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <?php endif; ?>     
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if(Auth::check() && Auth::user() != NULL): ?>
                            <div class="liked-icn pull-right">
                                <?php
                                $like=App\Like::orderBy('created_at','desc')->where('added','1')->where('blog_id',$blogdetail->id)->count();
                                $unlike=App\Like::orderBy('created_at','desc')->where('added','-1')->where('blog_id',$blogdetail->id)->count();
                                ?>
                                <a id="<?php echo e($blogdetail->id); ?>" class="like_list"><i class="fa fa-thumbs-o-up" style="font-size:22px;">
                                <?php echo e($like); ?></i></a>
                                <a data-id="<?php echo e($blogdetail->id); ?>" class="unlike"><i class="fa fa-thumbs-o-down"
                                    style="font-size:22px;"> <?php echo e($unlike); ?></i></a>
                                <br />
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
                <?php if(isset($exceptblog) && $exceptblog != NULL && count($exceptblog) > 0): ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog-scrollbar">
                        <div class="blog-recent-detail">
                            <div class="plan-recent-title">
                                <h4 class="recent-heading"><?php echo e(__('staticwords.recentpost')); ?></h4>
                            </div>
                            <?php $__currentLoopData = $exceptblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="main-plan-section">
                                <ul>
                                    <li>
                                        <span>
                                        <a href="<?php echo e(url('account/blog/'.$eblog->slug)); ?>"> 
                                        <img src="<?php echo e(asset('images/blog/'.$eblog->image)); ?>" class="img-responsive recent-img " style="float:left;" alt="image">
                                        </a>
                                        </span>
                                        <span>
                                            <a href="<?php echo e(url('account/blog/'.$eblog->slug)); ?>">
                                                <p class="main-plan-text"><?php echo e($eblog->title); ?></p>
                                            </a>
                                            <small class="blog-side-para"> <?php echo str_limit($eblog->detail, 150); ?></small>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <br/>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
        </div>
    </div>
    <br>
    <?php if(Auth::check() && Auth::user() != NULL): ?>
    <!--  <div class="container-fluid movie-series-section comment-nav-tabs">
        Nav tabs 
        <ul class="nav nav-tabs" role="tablist">
         <li role="presentation" class="active"><a href="#showcomment" aria-controls="showcomment" role="tab"
             data-toggle="tab"><?php echo e(__('staticwords.comment')); ?></a></li>
         <li role="presentation"><a href="#postcomment" aria-controls="postcomment" role="tab"
             data-toggle="tab"><?php echo e(__('staticwords.postcomment')); ?></a></li>
        </ul>
        <br />
        Tab panes 
        <div class="tab-content">
         <div role="tabpanel" class="tab-pane fade in active" id="showcomment">
           <h4 class="title" style="color:#B1B1B1;"><span class="glyphicon glyphicon-comment"></span>
             <?php echo e($blogdetail->comments->count()); ?> <?php echo e(__('staticwords.comment')); ?></h4> <br />
           <?php $__currentLoopData = $blogdetail->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="comment">
             <div class="author-info">
               <img src="<?php echo e(Avatar::create($comment->name )->toBase64()); ?>" class="author-image">
               <div class="author-name">
                 <h4><?php echo e(ucfirst($comment->name)); ?> </h4>
                 <p class="author-time"><?php echo e(date('F jS, Y - g:i a',strtotime($comment->created_at))); ?></p>
               </div>
               <?php if(Auth::user()->is_admin == 1 || $comment->user_id == Auth::user()->id): ?>
               <a title="Delete?" type="button" class="pull-right btn btn-danger btn-floating" data-toggle="modal"
                 data-target="#deleteModal<?php echo e($comment->id); ?>" style="    position: relative;left: 8px;"><i
                   class="fa fa-trash-o"></i></a>
               <?php endif; ?>
               <a title="Reply" type="button" class="btn btn-primary btn-floating pull-right" data-toggle="modal"
                 data-target="#<?php echo e($comment->id); ?>deleteModal"><i class="fa fa-reply"></i></a> &nbsp;&nbsp;
             </div>
             <div class="comment-content">
               <?php echo e($comment->comment); ?>

             </div>
           </div>
        
           <div id="deleteModal<?php echo e($comment->id); ?>" class="delete-modal modal fade" role="dialog">
             <div class="modal-dialog modal-sm">
                Modal content
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <div class="delete-icon"></div>
                 </div>
                 <div class="modal-body text-center">
                   <h4 class="modal-heading comment-delete-heading"><?php echo e(__('staticwords.areyousure')); ?></h4>
                   <p class="comment-delete-detail"><?php echo e(__('staticwords.modelmessage')); ?></p>
                 </div>
                 <div class="modal-footer">
                   <?php echo Form::open(['method' => 'DELETE', 'action' => ['CommentController@deletecomment', $comment->id]]); ?>

                   <button type="reset" class="btn btn-gray translate-y-3"
                     data-dismiss="modal"><?php echo e(__('staticwords.no')); ?></button>
                   <button type="submit" class="btn btn-danger"><?php echo e(__('staticwords.yes')); ?></button>
                   <?php echo Form::close(); ?>

                 </div>
               </div>
             </div>
           </div>
            Modal 
           <br />
           <div id="<?php echo e($comment->id); ?>deleteModal" class="delete-modal comment-modal modal fade" role="dialog">
             <div class="modal-dialog modal-md" style="margin-top:70px;">
                Modal content
               <div class="modal-content">
                 <div class="modal-header">
        
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <div class="delete-icon"></div>
                   <h4 style="color:#B1B1B1;"> <?php echo e(__('staticwords.replyfor')); ?> <?php echo e($comment->name); ?></h4>
                 </div>
                 <div class="modal-body text-center">
        
                   <form action="<?php echo e(route('comment.reply', ['cid' =>$comment->id,'bid'=> $blogdetail->id])); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <?php echo e(Form::label('reply','Your Reply:')); ?>

                     <?php echo e(Form::textarea('reply', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?>

                     <br />
                     <button type="submit" class="btn btn-danger"><?php echo e(__('staticwords.submit')); ?></button>
                   </form>
                 </div>
                 <div class="modal-footer">
        
                 </div>
               </div>
             </div>
           </div>
           <?php $__currentLoopData = $comment->subcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
           <div class="comment" style="margin-left:50px;">
             <div class="author-info">
               <?php
               $name=App\User::where('id',$subcomment->user_id)->first();
               ?>
               <img src="<?php echo e(Avatar::create($name->name )->toBase64()); ?>" class="author-image">
               <div class="author-name">
        
                 <h5><?php echo e(ucfirst($name->name)); ?></h5>
        
                 <p class="author-time"><?php echo e(date('F jS, Y - g:i a',strtotime($subcomment->created_at))); ?></p>
               </div>
               <?php if(Auth::user()->is_admin == 1 || $subcomment->user_id == Auth::user()->id): ?>
               <a title="Delete" type="button" class="btn btn-danger btn-floating pull-right" data-toggle="modal"
                 data-target="#deleteModal<?php echo e($subcomment->id); ?>"><i class="fa fa-trash-o"></i></a>
               <?php endif; ?>
             </div>
        
             <div class="comment-content">
               <?php echo e($subcomment->reply); ?>

             </div>
             <div>
               <div id="deleteModal<?php echo e($subcomment->id); ?>" class="delete-modal modal fade" role="dialog">
                 <div class="modal-dialog modal-sm">
                    Modal content
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <div class="delete-icon"></div>
                     </div>
                     <div class="modal-body text-center">
                       <h4 class="modal-heading comment-delete-heading"><?php echo e(__('staticwords.areyousure')); ?></h4>
                       <p class="comment-delete-detail"><?php echo e(__('staticwords.modelmessage')); ?></p>
                     </div>
                     <div class="modal-footer">
                       <?php echo Form::open(['method' => 'DELETE', 'action' => ['CommentController@deletesubcomment',
                       $subcomment->id]]); ?>

                       <button type="reset" class="btn btn-gray translate-y-3"
                         data-dismiss="modal"><?php echo e(__('staticwords.no')); ?></button>
                       <button type="submit" class="btn btn-danger"><?php echo e(__('staticwords.yes')); ?></button>
                       <?php echo Form::close(); ?>

                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
         <?php if(auth()->guard()->check()): ?>
         <div role="tabpanel" class="tab-pane fade" id="postcomment">
           <div style="width: 90%;color:#B1B1B1;" class=" ">
             <h3><?php echo e(__('staticwords.postcomment')); ?>:</h3><br />
             <?php echo e(Form::open( ['route' => ['comment.store', $blogdetail->id], 'method' => 'POST'])); ?>

             <?php echo e(Form::label('name', __('staticwords.name'))); ?>

             <?php echo e(Form::text('name', null, ['class' => 'form-control',])); ?>

             <br />
             <?php echo e(Form::label('email', __('staticwords.email'))); ?>

             <?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>

             <br />
             <?php echo e(Form::label('comment',__('staticwords.comment'))); ?>

             <?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows'=> '5','cols' => '10'])); ?>

             <br />
             <?php echo e(Form::submit(__('staticwords.addcomment'), ['class' => 'btn btn-md btn-primary'])); ?>

           </div>
        
         </div>
         <?php endif; ?>
        </div>
        </div>-->
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
    $(document).ready(function () {
      $(".like_list").click(function () {
        var item = $(this).attr('id');
    
        $.ajax({
          url: '<?php echo e(route('addtolike')); ?>',
          type: 'GET',
          data: {
            item: item
          },
          success: function (data) {
            //console.log(data);
            if (data == 'exist') {
              swal({
                title: "Oops !",
                text: "This post is already liked",
                icon: 'warning'
              });
             
              console.log('Already liked');
            } else {
              swal({
                title: "Success !",
                text: "Post Liked successfully!",
                icon: 'success'
              });
            }
    
          }
    
        });
      });
    
      $(".unlike").click(function () {
        var item = $(this).attr('data-id');
        //alert(item);
        $.ajax({
          url: '<?php echo e(route('unlike')); ?>',
          type: 'GET',
          data: {
            item: item
          },
    
          success: function (data) {
            if (data == 'exist') {
              swal({
                title: "Oops !",
                text: "This post is already unliked",
                icon: 'warning'
              });
            
              console.log('Already liked');
            } else {
              swal({
                title: "Success !",
                text: "Post UnLiked successfully!",
                icon: 'success'
              });
             
            }
            location.reload();
    
          }
    
        });
      });
    
    
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/blogdetail.blade.php ENDPATH**/ ?>