<?php $__currentLoopData = $audiolanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$audiogenreitems = NULL;
$audiogenreitems = array();
foreach ($menu_data as $key => $item) 
{
$gmovie =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.thumbnail as thumbnail','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','videolinks.iframeurl as iframeurl','movies.slug as slug','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
->where('movies.is_upcoming','!=' ,1)
->where('movies.a_language', 'LIKE', '%' . $lang->id . '%')->where('movies.id',$item->movie_id)->first();
if(isset($gmovie) && $gmovie != NULL){
$audiogenreitems[] = $gmovie;
}
if($section->order == 1){
arsort($audiogenreitems);
}
if(count($audiogenreitems) == $section->item_limit){
break;
exit(1);
}
}
$audiogenreitems = array_values(array_filter($audiogenreitems));
foreach ($menu_data as $key => $item) {
$gtvs = App\Tvseries::
join('seasons','seasons.tv_series_id','=','tv_series.id')
->join('episodes','episodes.seasons_id','=','seasons.id')
->join('videolinks','videolinks.episode_id','=','episodes.id')
->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.trailer_url as trailer_url','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')->where('seasons.a_language', 'LIKE', '%' . $lang->id . '%')
->where('tv_series.id',$item->tv_series_id)->first();
if(isset($gtvs)){
array_push($audiogenreitems, $gtvs);
}
if($section->order == 1){
arsort($audiogenreitems);
}
if(count($audiogenreitems) == $section->item_limit*2){
break;
exit(1);
}
}
$audiogenreitems = array_values(array_filter($audiogenreitems));
?>
<div class="mobile-veiw-all-lang">
    <?php if($audiogenreitems != NULL && count($audiogenreitems)>0): ?>
    <h5 class="section-heading"><?php echo e(ucfirst($lang->language)); ?> </h5>
    <?php endif; ?>   
    <?php if($section->view == 1): ?>
    <div class="genre-prime-slider owl-carousel">
        <?php $__currentLoopData = $audiogenreitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        if(isset($auth) && $auth != NULL){
        if ($item->type == 'M') {
        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
        ['user_id', '=', $auth->id],
        ['movie_id', '=', $item->id],
        ])->first();
        }
        }
        if(isset($auth) && $auth != NULL){
        $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
        if (isset($gets1)) {
        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
        ['user_id', '=', $auth->id],
        ['season_id', '=', $gets1->id],
        ])->first();
        }
        }
        else{
        $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
        }
        ?>
        <!-- List view language movies and tv shows -->
        <?php if($item->status == 1): ?>
        <?php if($item->type == 'M'): ?>
        <?php
        $image = 'images/movies/thumbnails/'.$item->thumbnail;
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(@file_get_contents($image));
        if($imageData){
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        }else{
        $src = url('images/default-thumbnail.jpg');
        }
        ?>
        <div class="genre-prime-slide m-box">
            <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                <?php if($src): ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                <?php else: ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                <?php endif; ?>
                </a>
                <?php else: ?>
                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                <?php if($src): ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                <?php else: ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                <?php endif; ?>
                </a>
                <?php endif; ?>
                <?php if($item->is_custom_label == 1): ?>
                <?php if(isset($item->label_id)): ?>
                <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <!-- overlay -->
            <div class="hidden-content">
                <div class="m-box-details-wrap">
                    <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                        <h4 class="m-box-title ellipsis">
                            <?php echo e($item->title); ?>

                        </h4>
                  <div class="m-box-sub-title">
                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                   </div>
                        <div class="m-box-desc">
                            <?php echo e($item->detail); ?>

                        </div>
                    </a>
                </div>
                
                <div class="action-btn-wrap">
                            
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <?php if($item->is_upcoming == 0): ?>
                            <?php if(checkInMovie($item) == true): ?>
                            <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                            <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            <?php else: ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            <?php endif; ?>
                            <?php else: ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                            </span>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                            </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                            <?php if(isset($wishlist_check->added)): ?>
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                            </span>-->
                            <?php endif; ?>
                            <?php elseif($catlog == 1): ?>
                            <?php if($auth): ?>
                            <?php if(isset($wishlist_check->added)): ?>
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                            </span>-->
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($item->type == 'T'): ?>
        <?php
        $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(@file_get_contents($image));
        if($imageData){
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        }else{
        $src = url('images/default-thumbnail.jpg');
        }
        ?>
        <div class="genre-prime-slide">
            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                <?php if($item->thumbnail != null): ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="ttvseries-image">
                <?php endif; ?>
                </a>
                <?php else: ?>
                <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                <?php if($item->thumbnail != null): ?>
                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="tvseries-image">
                <?php endif; ?>
                </a>
                <?php endif; ?> 
                <?php if($item->is_custom_label == 1): ?>
                <?php if(isset($item->label_id)): ?>
                <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                <?php endif; ?>
                <?php endif; ?>
            </div>
             <div class="hidden-content">
                <div class="m-box-details-wrap">
                    <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                        <h4 class="m-box-title ellipsis">
                            <?php echo e($item->title); ?>

                        </h4>
                  <div class="m-box-sub-title">
                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                   </div>
                        <div class="m-box-desc">
                            <?php echo e($item->detail); ?>

                        </div>
                    </a>
                </div>
                
                <div class="action-btn-wrap">
                            
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <?php if($item->is_upcoming == 0): ?>
                            <?php if(checkInMovie($item) == true): ?>
                            <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                            <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            <?php else: ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            <?php endif; ?>
                            <?php else: ?>
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                            </span>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                            </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                            <?php if(isset($wishlist_check->added)): ?>
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                            </span>-->
                            <?php endif; ?>
                            <?php elseif($catlog == 1): ?>
                            <?php if($auth): ?>
                            <?php if(isset($wishlist_check->added)): ?>
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                            </span>-->
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <!-- end -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- List view movies by language END -->
    <?php endif; ?>
    <?php if($section->view == 0): ?>
    <!-- Grid view language by movies -->
    <div class="row">
        <?php $__currentLoopData = $audiogenreitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        if(isset($auth) && $auth != NULL){
        if ($item->type == 'M') {
        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
        ['user_id', '=', $auth->id],
        ['movie_id', '=', $item->id],
        ])->first();
        }
        }
        $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
        if (isset($gets1) && $auth && $auth != NULL) {
        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
        ['user_id', '=', $auth->id],
        ['season_id', '=', $gets1->id],
        ])->first();
        }
        ?>
        <?php if($item->status == 1): ?>
        <?php if($item->type == 'M'): ?>
        <?php
        $image = 'images/movies/thumbnails/'.$item->thumbnail;
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(@file_get_contents($image));
        if($imageData){
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        }else{
        $src = url('images/default-thumbnail.jpg');
        }
        ?>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
            <div class="cus_img">
                <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                    <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                    <?php if($src): ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                    <?php endif; ?>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                    <?php if($src): ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                    <?php endif; ?>
                    </a>
                    <?php endif; ?>
                    <?php if($item->is_custom_label == 1): ?>
                    <?php if(isset($item->label_id)): ?>
                    <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                
                <!-- OVERLAY -->
                <div class="hidden-content">
                     <div class="m-box-details-wrap">
                         <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                             <h4 class="m-box-title ellipsis">
                                 <?php echo e($item->title); ?>

                             </h4>
                       <div class="m-box-sub-title">
                         <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                        </div>
                             <div class="m-box-desc">
                                 <?php echo e($item->detail); ?>

                             </div>
                         </a>
                     </div>

                     <div class="action-btn-wrap">
                                 
                                 <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                 <?php if($item->is_upcoming == 0): ?>
                                 <?php if(checkInMovie($item) == true): ?>
                                 <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                 <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                                 </a>
                                 </span>
                                 <?php else: ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                                 </a>
                                 </span>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                                 </span>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                 <span class="play-button-wrap">
                                 <a class="iframe btn btn-primary" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                 </span>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                 <span class="play-button-wrap">
                                 <a class="iframe btn btn-primary" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                 </span>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                 <?php if(isset($wishlist_check->added)): ?>
     <!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                 </span>-->
                                 <?php endif; ?>
                                 <?php elseif($catlog == 1): ?>
                                 <?php if($auth): ?>
                                 <?php if(isset($wishlist_check->added)): ?>
     <!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                 </span>-->
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                             </div>
                 </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($item->type == 'T'): ?>
        <?php
        $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(@file_get_contents($image));
        if($imageData){
        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
        }else{
        $src = url('images/default-thumbnail.jpg');
        }
        ?>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
            <div class="cus_img">
                <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                    <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                    <?php if($src): ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="tvseries-image">
                    <?php else: ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="tvseries-image">
                    <?php endif; ?>
                    </a>
                    <?php else: ?>
                    <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                    <?php if($src): ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="tvseries-image">
                    <?php else: ?>
                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="tvseries-image">
                    <?php endif; ?>
                    </a>
                    <?php endif; ?>
                    <?php if($item->is_custom_label == 1): ?>
                    <?php if(isset($item->label_id)): ?>
                    <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="hidden-content">
                     <div class="m-box-details-wrap">
                         <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                             <h4 class="m-box-title ellipsis">
                                 <?php echo e($item->title); ?>

                             </h4>
                       <div class="m-box-sub-title">
                         <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                        </div>
                             <div class="m-box-desc">
                                 <?php echo e($item->detail); ?>

                             </div>
                         </a>
                     </div>

                     <div class="action-btn-wrap">
                                 
                                 <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                 <?php if($item->is_upcoming == 0): ?>
                                 <?php if(checkInMovie($item) == true): ?>
                                 <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                 <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                                 </a>
                                 </span>
                                 <?php else: ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                                 </a>
                                 </span>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                                 </span>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                 <span class="play-button-wrap">
                                 <a class="iframe btn btn-primary" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                 </span>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                 <span class="play-button-wrap">
                                 <a class="iframe btn btn-primary" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                 </span>
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                 <?php if(isset($wishlist_check->added)): ?>
     <!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                 </span>-->
                                 <?php endif; ?>
                                 <?php elseif($catlog == 1): ?>
                                 <?php if($auth): ?>
                                 <?php if(isset($wishlist_check->added)): ?>
     <!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                                 <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                 </span>-->
                                 <?php endif; ?>
                                 <?php endif; ?>
                                 <?php endif; ?>
                             </div>
                 </div>     
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!--end grid view by language-->
    <?php endif; ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
    function myage(age){
      if (age==0) {
      $('#ageModal').modal('show'); 
    }else{
        $('#ageWarningModal').modal('show');
    }
    }
</script>
<script type="text/javascript">
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
    
    function addWish(id, type) {
      app.addToWishList(id, type);
      setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e(__('staticwords.addtowatchlist')); ?>" ? "<?php echo e(__('staticwords.removefromwatchlist')); ?>" : "<?php echo e(__('staticwords.addtowatchlist')); ?>";
        });
      }, 100);
    }
</script>
<?php $__env->stopSection(); ?><?php /**PATH /var/www/html/oovmedia.starpankaj.com/resources/views/lang.blade.php ENDPATH**/ ?>