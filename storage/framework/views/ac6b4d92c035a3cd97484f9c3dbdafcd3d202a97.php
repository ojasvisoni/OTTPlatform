
<?php $__env->startSection('title',__('staticwords.watchhistory')); ?>
<?php $__env->startSection('main-wrapper'); ?>
<br>
<?php
  $withlogin= App\Config::findOrFail(1)->withlogin;
  $catlog= App\Config::findOrFail(1)->catlog;
  $auth=Auth::user();
  
?>
  <?php if(isset($pusheditems) && count($pusheditems) > 0 ): ?>
          <div class="genre-prime-block view-all-block">
           
            
            <div class="container-fluid">
              <h5 class="watchlist-heading"><?php echo e(__('staticwords.watchhistory')); ?> </h5>
              <a href="<?php echo e(url('account/watchhistory/delete')); ?>"><button class=" btn btn-danger"><?php echo e(__('staticwords.clearall')); ?></button></a>
              <div class="">
                <?php if(isset($pusheditems)): ?>

                  <?php $__currentLoopData = $pusheditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                   <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                  
                    <?php
                     if (isset($item->type) && $item->type == 'M') {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['movie_id', '=', $item->id],
                                                                         ])->first();
                     }

                    if (isset($item->type) && $item->type == 'S') {
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                      ])->first();
                    }
                    ?>
                      <?php endif; ?>
                    
                  
                  <?php if(isset($item->type) && $item->type == "M"): ?>
                   <?php if($item->status == 1): ?>
                   <?php
                      $is_play = 0;
                      if(getSubscription()->getData()->subscribed == true){
                        foreach($item->menus as $moviemenu){
                          if(array_search($moviemenu->menu_id, array_column(getSubscription()->getData()->nav_menus, 'id')) !== false)
                          {
                              $is_play = 1;
                          }
                        }
                      }
                   ?>
                     <?php if(hidedata($item->id,$item->type) != 1): ?>
                      <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                              
                            
                          <div class="genre-slide-image home-prime-slider protip progress-movie" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->id); ?>">
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                              <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                                <img data-src="<?php echo e(url('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive lazy" alt="genre-image">
                              <?php else: ?>

                                <img data-src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-responsive lazy" alt="genre-image">
                              <?php endif; ?>

                            </a>
                          
                            <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                              </div>
                            </div>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                              <?php if(isset($item->label_id)): ?>
                                <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                              <?php endif; ?>
                            <?php else: ?>

                              <?php if(isset($item->is_upcoming) && $item->is_upcoming == 1): ?>
                                <?php if($item->upcoming_date != NULL): ?>
                                  <span class="badge bg-success"><?php echo e(date('M jS Y',strtotime($item->upcoming_date))); ?></span>
                                <?php else: ?>
                                  <span class="badge bg-danger"><?php echo e(__('Coming Soon')); ?></span>
                                <?php endif; ?>
                            
                              <?php endif; ?>
                            <?php endif; ?>
                          
                          </div>
                          <?php echo Form::open(['method' => 'DELETE', 'action' => ['WatchController@moviedestroy', $item->id]]); ?>

                        
                            <button type="submit" class="watchhistory_remove"><i class="flaticon-cancel"></i></button><br/>
                          <?php echo Form::close(); ?>

                          <?php if(isset($protip) && $protip == 1): ?>
                          <div id="prime-next-item-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                            <div class="prime-description-under-block">
                              <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                            
                              <ul class="description-list">
                                <li><?php echo e(__('staticwords.rating')); ?> <?php echo e($item->rating); ?></li>
                                <li><?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?></li>
                                <li><?php echo e($item->publish_year); ?></li>
                                <li><?php echo e($item->maturity_rating); ?></li>
                                <?php if($item->subtitle == 1): ?>
                                  <li>
                                  <?php echo e(__('staticwords.subtitles')); ?>

                                  </li>
                                <?php endif; ?>
                              </ul>
                              <div class="main-des">
                                <p><?php echo e($item->detail); ?></p>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                              </div>
                              
                              <div class="des-btn-block">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                  <?php if($item->is_upcoming != 1): ?>
                                    <?php if(checkInMovie($item) == true): ?>
                                      <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                        <?php if($item->video_link['iframeurl'] != null): ?>
                                      
                                          <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                          </a>

                                        <?php else: ?> 
                                          <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span></a>
                                        <?php endif; ?>
                                      <?php else: ?>
                                        <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                        </a>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                    <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                  <?php endif; ?>
                                <?php else: ?>
                                  <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                    <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                  <?php endif; ?>
                                <?php endif; ?>
                              
                                <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                  <?php if(isset($wishlist_check->added)): ?>
                                    <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                  <?php else: ?>
                                    <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?></a>
                                  <?php endif; ?>
                                <?php elseif($catlog ==1 && $auth): ?>
                                  <?php if(isset($wishlist_check->added)): ?>
                                    <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                  <?php else: ?>
                                    <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?></a>
                                  <?php endif; ?>
                                <?php endif; ?>
                              </div>
                            
                            </div>
                          </div>
                          <?php endif; ?>
                        </div>
                          
                      </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php elseif(isset($item->type) && $item->type == "S"): ?>
                      <?php if($item->tvseries->status == 1): ?>
                        <?php if(hidedata($item->id,$item->type) != 1): ?>
                          <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                              <div class="cus_img">
                                
                              
                              <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>">
                                  <?php if($item->tvseries->thumbnail != null || $item->tvseries->thumbnail != ''): ?>
                                    <img data-src="<?php echo e(url('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive lazy" alt="genre-image">
                                  <?php else: ?>

                                    <img data-src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-responsive lazy" alt="genre-image">
                                  <?php endif; ?>
                                </a>
                            
                                <?php if($item->tvseries->is_custom_label == 1): ?>
                                  <?php if(isset($item->tvseries->label_id)): ?>
                                    <span class="badge bg-info"><?php echo e($item->tvseries->label->name); ?></span>
                                  <?php endif; ?>
                                <?php endif; ?>
                              

                              </div>
                            <?php echo Form::open(['method' => 'DELETE', 'action' => ['WatchController@showdestroy', $item->tvseries->id]]); ?>

                             
                                <button type="submit" class="watchhistory_remove"><i class="flaticon-cancel"></i></button><br/>
                            <?php echo Form::close(); ?>

                            <?php if(isset($protip) && $protip == 1): ?>
                            <div id="prime-next-item-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                                <div class="movie-rating"><?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->tvseries->rating); ?></div>
                                <ul class="description-list">
                                  <li><?php echo e(__('staticwords.season')); ?><?php echo e($item->season_no); ?></li>
                                  <li><?php echo e($item->publish_year); ?></li>
                                  <li><?php echo e($item->tvseries->age_req); ?></li>
                                  <?php if($item->subtitle == 1): ?>
                                    <li>
                                      <?php echo e(__('staticwords.subtitles')); ?>

                                    </li>
                                  <?php endif; ?>
                                </ul>
                                <div class="main-des">
                                  <?php if($item->detail != null || $item->detail != ''): ?>
                                    <p><?php echo e($item->detail); ?></p>
                                  <?php else: ?>
                                    <p><?php echo e($item->tvseries->detail); ?></p>
                                  <?php endif; ?>
                                  <a href="#"></a>
                                </div>
                                
                                <div class="des-btn-block">
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($item->episodes[0]) && checkInTvseries($item->tvseries) == true): ?>
                                      <?php if($item->tvseries['age_req'] == 'all age' || $age>=str_replace('+', '', $item->tvseries['age_req'])): ?>
                                        <?php if($item->episodes[0]->video_link['iframeurl'] !=""): ?>
                                          <a href="#" onclick="playoniframe('<?php echo e($item->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($item->tvseries->id); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                        </a>

                                        <?php else: ?>
                                          <a href="<?php echo e(route('watchTvShow',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span></a>
                                        <?php endif; ?>
                                      <?php else: ?>
                                        <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                        </a>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                      <a href="<?php echo e(route('watchtvTrailer',$item->id)); ?>" class="iframe btn btn-default"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                      <a href="<?php echo e(route('guestwatchtvtrailer',$item->id)); ?>" class="iframe btn btn-default"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                      <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                    <?php else: ?>
                                      <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?>

                                      </a>
                                    <?php endif; ?>
                                  <?php elseif($catlog ==1 && $auth): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                      <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                    <?php else: ?>
                                      <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?>

                                      </a>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <?php endif; ?>
                            </div>
                          
                            
                          </div>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
                
              </div>
             <div class="col-md-12">
                <div align="center">
                   <?php echo $pusheditems->links(); ?>

                </div>
             </div>


            </div>
           
          </div>
          
        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>


<script>

  function playoniframe(url,id,type){
      
 
   $(document).ready(function(){
    var SITEURL = '<?php echo e(URL::to('')); ?>';
       $.ajax({
            type: "get",
            url: SITEURL + "/user/watchhistory/"+id+'/'+type,
            success: function (data) {
             console.log(data);
            },
            error: function (data) {
               console.log(data)
            }
        });
       
   
         
  
  });       
    $.colorbox({ href: url, width: '100%', height: '100%', iframe: true });
  }
  
</script>
<script>
    var app = new Vue({
      el: '.des-btn-block',
      data: {
        result: {
          id: '',
          type: '',
        },
      },
      methods: {
        addToWishList(id, type) {
          this.result.id = id;
          this.result.type = type;
          this.$http.post('<?php echo e(route('addtowishlist')); ?>', this.result).then((response) => {
          }).catch((e) => {
            console.log(e);
          });
          this.result.item_id = '';
          this.result.item_type = '';
        }
      }
    });

</script>

 <script>
     function addWish(id, type) {
      app.addToWishList(id, type);
      setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e(__('staticwords.addtowatchlist')); ?>" ? "<?php echo e(__('staticwords.removefromwatchlist')); ?>" : "<?php echo e(__('staticwords.addtowatchlist')); ?>";
        });
      }, 100);
    }

  </script>
  <script>

      function myage(age){
        if (age==0) {
        $('#ageModal').modal('show'); 
      }else{
          $('#ageWarningModal').modal('show');
      }
    }
      
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/watchhistory.blade.php ENDPATH**/ ?>