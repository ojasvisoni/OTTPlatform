<?php $__env->startSection('title',__('staticwords.welcome')); ?>
<?php $__env->startSection('main-wrapper'); ?>
<!-- main wrapper -->
<section id="main-wrapper" class="main-wrapper home-page">
    <div id="home-out-section-slider" class="home-out-section-slider home-out-section owl-carousel">
        <?php if(isset($blocks) && count($blocks) > 0): ?>
        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slider-block">
            <div class="home-out-section-img">
                <img src="<?php echo e(url('images/main-home/'.$block->image)); ?>" class="img-fluid" alt="">
                <div class="overlay-bg <?php echo e($block->left == 1 ? 'gredient-overlay-left' : 'gredient-overlay-right'); ?> "></div>
                <div class="home-out-section-dtl">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-7 <?php echo e($block->left == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''); ?>">
                                <h2 class="section-heading"><?php echo e($block->heading); ?></h2>
                                <p class="section-dtl <?php echo e($block->left == 1 ? 'pad-lt-100' : ''); ?>"><?php echo e($block->detail); ?></p>
                                <?php if($block->button == 1): ?>
                                <?php if($block->button_link == 'login'): ?>
                                <a href="<?php echo e(url('login')); ?>" class="btn btn-prime"><?php echo e($block->button_text); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(url('register')); ?>" class="btn btn-prime"><?php echo e($block->button_text); ?></a>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    

    <!-- Pricing plan main block -->
    <?php if(isset($remove_subscription) && $remove_subscription == 0): ?> 
    <?php if(isset($plans) && count($plans) > 0): ?>
<!--    <div class="purchase-plan-main-block main-home-section-plans">
        <div class="panel-setting-main-block panel-subscribe">
            <div class="container-fluid">
                <div class="plan-block-dtl">
                    <h3 class="plan-dtl-heading"><?php echo e(__('staticwords.membershipplans')); ?></h3>
                    <div class="plan-dtl-list">
                        <ul>
                            <li><?php echo e(__('staticwords.membershiplines1')); ?>

                            </li>
                            <li><?php echo e(__('staticwords.membershiplines2')); ?> 
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if(Auth::check()): ?>
                <?php  
                $id = Auth::user()->id;
                $getuserplan = App\PaypalSubscription::where('status','=','1')->where('user_id',$id)->first();
                ?>
                <?php endif; ?>
                <?php
                    $today =  date('Y-m-d h:i:s');
                    ?>
                <div class="snip1404 row">
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($plan->delete_status ==1 ): ?>
                    <?php if($plan->status != 'inactive'): ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="main-plan-section">
                            <header>
                                <h4 class="plan-home-title">
                                    <?php echo e($plan->name); ?>

                                </h4>
                                <div class="plan-cost"><span class="plan-price">
                                    <?php if(Session::has('current_currency')): ?>
                                    <?php echo e(currency($plan->amount, $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency_symbol, $format = true)); ?></span><span class="plan-type">
                                    <?php echo e(currency($plan->amount, $from = $plan->currency, $to = Session::has('current_currency') ? ucfirst(Session::get('current_currency')) : $plan->currency_symbol, $format = true)); ?>/
                                    <?php echo e($plan->interval); ?>

                                    <?php else: ?>
                                    <i class="<?php echo e($plan->currency_symbol); ?>"></i><?php echo e($plan->amount); ?></span><span class="plan-type">
                                    <i class="<?php echo e($plan->currency_symbol); ?>"></i> <?php echo e(number_format(($plan->amount) / ($plan->interval_count),2)); ?>/
                                    <?php echo e($plan->interval); ?>

                                    <?php endif; ?>
                                    </span>
                                </div>
                            </header>
                            <?php
                            $pricingTexts = App\PricingText::where('package_id',$plan->id)->get();
                            ?>
                            <?php if(isset($package_feature)): ?>
                            <?php $__currentLoopData = $package_feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($plan['feature'])): ?>
                            <ul class="plan-features">
                                <li><?php if(in_array($pf->id, $plan['feature'])): ?><i class="fa fa-check "> </i> <?php else: ?> <i class="fa fa-close"></i> <?php endif; ?> <?php echo e($pf->name); ?></li>
                            </ul>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(isset($getuserplan['package_id']) && $getuserplan['package_id'] == $plan->id && $getuserplan->status == "1" && $today <= $getuserplan->subscription_to ): ?>
                            <div class="plan-select"><a class="btn btn-prime"><?php echo e(__('staticwords.alreadysubscribe')); ?></a></div>
                            <?php else: ?>
                            <?php if($plan->free == 1 && $plan->status == 'upcoming'): ?>
                            <div class="plan-select"><a href="#"><?php echo e(__('COMING SOON!')); ?></a></div>
                            <?php elseif($plan->free == 1 && $plan->status == 'status'): ?>
                            <form action="<?php echo e(route('free.package.subscription',$plan->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="plan-select btn-prime-subs"><a  class="btn btn-prime"><input type="submit" class="btn-subscribe" value="<?php echo e(__('staticwords.subscribe')); ?>"></a></div>
                            </form>
                            <?php elseif($plan->status == 'upcoming'): ?>
                            <div class="plan-select"><a href="#"><?php echo e(__('COMING SOON!')); ?></a></div>
                            <?php else: ?>
                            <div class="plan-select"><a href="<?php echo e(route('get_payment', $plan->id)); ?>" class="btn btn-prime"><?php echo e(__('staticwords.subscribe')); ?></a></div>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if($plan->status == 'upcoming'): ?>
                            <div class="plan-select"><a href="#"><?php echo e(__('COMING SOON!')); ?></a></div>
                            <?php else: ?>
                            <div class="plan-select"><a href="<?php echo e(route('register')); ?>"><?php echo e(__('staticwords.registernow')); ?></a></div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>-->
    <?php endif; ?>
    <?php endif; ?>
    <!-- end featured main block -->
    <!-- end out section -->
</section>
<section id="wishlistelement" class="main-wrapper">
    <div>
    <!-- age modal -->
    <?php echo $__env->make('modal.agemodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--- end age modal -->
    <!-- age warning modal -->
    <?php echo $__env->make('modal.agewarning', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end age warning modal -->
    <?php if(count($menu->menusections)>0): ?>
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $recentlyadded = [];
    foreach ($recent_data as $key => $item) {
    $rm =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
    ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.thumbnail as thumbnail','movies.live as live','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','videolinks.iframeurl as iframeurl','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
    ->where('movies.is_upcoming','!=' ,1)
    ->where('movies.id',$item->movie_id)->first();
    $recentlyadded[] = $rm;
    if($section->order == 1){
    arsort($recentlyadded);
    }
    if(count($recentlyadded) == $section->item_limit){
    break;
    exit(1);
    }
    }
    foreach ($recent_data as $key => $item) {
    $rectvs =  App\TvSeries::
    join('seasons','seasons.tv_series_id','=','tv_series.id')
    ->join('episodes','episodes.seasons_id','=','seasons.id')
    ->join('videolinks','videolinks.episode_id','=','episodes.id')
    ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.season_slug as season_slug','seasons.trailer_url as trailer_url','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
    ->where('tv_series.id',$item->tv_series_id)->first();
    $recentlyadded[] = $rectvs;
    if($section->order == 1){
    arsort($recentlyadded);
    }
    if(count($recentlyadded) == $section->item_limit){
    break;
    exit(1);
    }
    }
    $recentlyadded = array_values(array_filter($recentlyadded));
    ?>
    <?php if($section->section_id == 1 && $recentlyadded != NULL && count($recentlyadded) >0): ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-top-slider">
        <div class="container-fluid">
            <h5 class="section-heading"><?php echo e(__('staticwords.RecentlyAddedIn')); ?> </h5>
            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
            <a href="<?php echo e(route('showall',['menuid' => $menu->id, 'menuname' => $menu->name])); ?>" class="see-more"> <b><?php echo e(__('staticwords.viewall')); ?></b></a>
            <?php else: ?>
            <a href="<?php echo e(route('guestshowall',['menuid' => $menu->id, 'menuname' => $menu->name])); ?>" class="see-more"> <b><?php echo e(__('staticwords.viewall')); ?></b></a>
            <?php endif; ?>
            <!-- Recently added movies and tv shows in list view End-->
            <?php if($section->view == 1): ?>
            <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $recentlyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php if($item->status == 1): ?>
                <?php if($item->type == 'M'): ?>
                <?php
                $image = 'images/movies/thumbnails/'.$item->thumbnail;
                // Read image path, convert to base64 encoding
                $imageData = base64_encode(@file_get_contents($image));
                if($imageData){
                $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                }else{
                $src = url('images/default-thumbnail.jpg');
                }
                ?>
                <div class="genre-prime-slide m-box">
                    <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>" data-pt-interactive="false">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>" class="">
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                    <!-- MOIVE OVERLAY SECTION -->
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php elseif($item->type == 'T'): ?>
                <?php
                $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                // Read image path, convert to base64 encoding
                $imageData = base64_encode(@file_get_contents($image));
                if($imageData){
                $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                }else{
                $src = url('images/default-thumbnail.jpg');
                }
                ?>
                <div class="genre-prime-slide">
                    <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                        <?php if($src != null): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                        <?php if($item->thumbnail != null): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            <?php endif; ?>
            <!-- Recently added movies and tv shows in list view End-->
            <!-- Recently Tvshows and movies in Grid view -->
            <?php if($section->view == 0): ?>
            <div class="genre-prime-block">
                <?php $__currentLoopData = $recentlyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($item->type == 'T'): ?>
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
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
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
            <?php endif; ?>
            <!-- Recently Tvshows and movies in Grid view END-->
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Featured Movies and TvShows -->
    <?php
    $featuresitems = [];
    foreach ($menu_data as $key => $item) {
    $fmovie =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
    ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.thumbnail as thumbnail','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
    ->where('movies.is_upcoming','!=' ,1)
    ->where('movies.id',$item->movie_id)->where('movies.featured', '1')->first();
    if($fmovie != NULL){
    $featuresitems[] = $fmovie;
    }
    if($section->order == 1){
    arsort($featuresitems);
    }
    if(count($featuresitems) == $section->item_limit){
    break;
    exit();
    }
    }
    foreach ($menu_data as $key => $item) {
    $ftvs = App\TvSeries::
    join('seasons','seasons.tv_series_id','=','tv_series.id')
    ->join('episodes','episodes.seasons_id','=','seasons.id')
    ->join('videolinks','videolinks.episode_id','=','episodes.id')
    ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.season_slug as season_slug','seasons.trailer_url as trailer_url','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
    ->where('tv_series.id',$item->tv_series_id)->where('tv_series.featured','1')->first();
    if($ftvs != NULL){
    $featuresitems[] = $ftvs;
    }
    if($section->order == 1){
    arsort($featuresitems);
    }
    if(count($featuresitems) == $section->item_limit+1){
    break;
    exit();
    }
    }
    $featuresitems = array_values(array_filter($featuresitems));
    ?>
    <?php if($section->section_id == 3 && $featuresitems != NULL && count($featuresitems)>0): ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid">
            <h5 class="section-heading"><?php echo e(__('staticwords.FeaturedIn')); ?> </h5>
            <!-- Featured Tvshows and movies in List view -->
            <?php if($section->view == 1): ?>
            <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $featuresitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php elseif($item->type == 'T'): ?>
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
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php else: ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php else: ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            <?php endif; ?>
            <!-- Featured Tvshows and movies in List view END -->
            <!-- Featured Tvshows and movies in Grid view -->
            <?php if($section->view == 0): ?>
            <div class="genre-prime-block">
                <?php $__currentLoopData = $featuresitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="genre-slide-image home-prime-slider protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($item->type == 'T'): ?>
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
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
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
            <?php endif; ?>
            <!-- Featured Tvshows and movies in Grid view END-->
        </div>
    </div>
    <?php endif; ?>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Featured Tv Shows and Movies end-->
    <!------------- because you watched ------------------->
    <?php if(Auth::user() && $auth != NULL && getSubscription()->getData()->subscribed == true): ?>
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $watchistory_last_movie=App\WatchHistory::where('user_id',$auth->id)->orderBy('id','DESC')->where('movie_id','!=',NULL)->take(3)->get();
    $watchistory_last_tv=App\WatchHistory::where('user_id',$auth->id)->orderBy('id','DESC')->where('tv_id','!=',NULL)->take(3)->get();
    $customGenreMovie = [];
    $customGenreTv = [];
    foreach ($watchistory_last_movie as $key => $w) {
    $movie_find_last = App\Movie::where('id','=',$w->movie_id)->first();
    if(isset($movie_find_last)){
    $customGenreMovie[] = $movie_find_last->genre_id;
    }
    }
    foreach ($watchistory_last_tv as $key => $k) {
    $tv_show = App\TvSeries::where('id','=',$k->tv_id)->first();
    if(isset($tv_show)){
    $customGenreTv[] = $tv_show->genre_id;
    }
    }
    $customGenreMovie =  array_unique($customGenreMovie);
    $customGenreTv =  array_unique($customGenreTv);
    $recom_block = collect();
    $customGenreMovie =  array_unique($customGenreMovie);
    $customGenreTv =  array_unique($customGenreTv);
    //Getting Recommnaded Movies based on genre
    foreach ($customGenreMovie as $key => $g) {
    $x = App\Movie::orderBy('id','DESC')->where('genre_id', 'LIKE', '%' . $g . '%')->take(50)->get();
    $recom_block->push($x);
    }
    //Getting Recommnaded Tv Series based on genre
    foreach ($customGenreTv as $key => $g) {
    $y =App\TvSeries::orderBy('id','DESC')->where('genre_id', 'LIKE', '%' . $g . '%')->take(50)->get();
    $recom_block->push($y);
    }
    //$recom_movies = array_values(array_filter($recom_movies));
    $recom_block = $recom_block->flatten();
    //dd($recom_block);
    ?>
    <?php if($section->section_id == 4 && $recom_block != NULL && count($recom_block)>0): ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid">
            <?php
            $watch = App\WatchHistory::OrderBy('id','DESC')->first();
            $movie = App\Movie::where('id',$watch->movie_id)->first();
            $tv = App\TvSeries::where('id',$watch->tv_id)->first();
            ?>
            <?php if(isset($movie)): ?>
            <h5 class="section-heading"><?php echo e(__('staticwords.Becauseyouwatched')); ?>: <?php echo e(isset($movie->title) ? ucfirst($movie->title) : ''); ?></h5>
            <?php else: ?>
            <h5 class="section-heading"><?php echo e(__('staticwords.Becauseyouwatched')); ?> : <?php echo e(isset($tv->title) ? ucfirst($tv->title) : ''); ?></h5>
            <?php endif; ?>
            <!-- best in intrest  added movies and tv shows in list view End-->
            <?php if($section->view == 1): ?>
            <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $recom_block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php if($item->status == 1): ?>
                <?php if($item->type == 'M'): ?>
                <?php
                $image = 'images/movies/thumbnails/'.$item->thumbnail;
                // Read image path, convert to base64 encoding
                $imageData = base64_encode(@file_get_contents($image));
                if($imageData){
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
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                        <?php if($src): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php elseif($item->type == 'T'): ?>
                <?php
                $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                // Read image path, convert to base64 encoding
                $imageData = base64_encode(@file_get_contents($image));
                if($imageData){
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
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php else: ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                        <?php if($item->thumbnail != null): ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php else: ?>
                        <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                        <?php endif; ?>
                        </a>
                        <?php endif; ?>  
                        <?php if($item->is_custom_label == 1): ?>
                        <?php if(isset($item->label_id)): ?>
                        <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- MOIVE OVERLAY SECTION -->
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    <?php echo e($item->title); ?>

                                </h4>
                                <div class="m-box-sub-title">
                                    <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                    <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                </div>
                                <div class="m-box-desc">
                                    <?php echo e(str_limit($item->detail,100,'...')); ?>

                                </div>
                            </a>
                            <?php endif; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            <?php endif; ?>
            <!-- best in intrest added movies and tv shows in list view End-->
            <!-- best in intrest Tvshows and movies in Grid view -->
            <?php if($section->view == 0): ?>
            <div class="genre-prime-block">
                <?php $__currentLoopData = $recom_block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($item->type == 'T'): ?>
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
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php else: ?>
                            <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                            <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php else: ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                            </a>
                            <?php endif; ?>
                            <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-success"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- MOIVE OVERLAY SECTION -->
                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span> <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                    <h4 class="m-box-title ellipsis">
                                        <?php echo e($item->title); ?>

                                    </h4>
                                    <div class="m-box-sub-title">
                                        <?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item->rating); ?> <span class="pipe">|</span> <?php echo e($item->duration); ?> <?php echo e(__('staticwords.mins')); ?> <span class="pipe">|</span>
                                        <?php echo e($item->publish_year); ?> <span class="pipe">|</span> <?php echo e($item->maturity_rating); ?>

                                    </div>
                                    <div class="m-box-desc">
                                        <?php echo e(str_limit($item->detail,100,'...')); ?>

                                    </div>
                                </a>
                                <?php endif; ?>
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
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn btn-primary btn-bordered addto-watchlist"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></button>
                                </span>-->
                                <?php endif; ?>
                                <?php elseif($catlog == 1): ?>
                                <?php if($auth): ?>
                                <?php if(isset($wishlist_check->added)): ?>
<!--                                <span asset-type="MOVIE" class="watchlist-button-wrap">
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
            <?php endif; ?>
            <!-- best in intrest Tvshows and movies in Grid view END-->
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!----------- because you watched end ----------------->
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 12  && $top_data != NULL): ?>
    <div class="top-ten-main-block">
        <div class="container-fluid">
            <?php if(isset($top_data->menu_data)): ?>
            <h5 class="section-heading"><?php echo e(__('Toprated')); ?>  </h5>
            <div class="genre-prime-slider owl-carousel">
                <?php
                $i = 0;
                ?>
                <?php $__currentLoopData = $top_data->menu_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->movie) && $item->movie != NULL && views($item->movie)->unique()->count() <= $button->toprated_count ): ?> 
                <div class="genre-prime-slide m-box">
                    <div class="genre-slide-image m-box-content">
                        <a href="<?php echo e(url('movie/detail',$item->movie->slug)); ?>">
                        <?php if(isset($item->movie->thumbnail)): ?>
                        <img src="<?php echo e(url('images/movies/thumbnails/'.$item->movie->thumbnail)); ?>" class="img-fluid" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                        <?php endif; ?>
                        </a>
                        <div class="top-ten-heading"><?php echo e(++$i); ?>

                        </div>
                    </div>
                    
                    <div class="hidden-content">
                        <div class="m-box-details-wrap"> 
                            <a href="<?php echo e(url('movie/detail',$item->movie->slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    The Notebook
                                </h4>
                                <div class="m-box-sub-title">
                                    Rating 2 <span class="pipe">|</span> 200 mins <span class="pipe">|</span> 2020 <span class="pipe">|</span> 13+
                                </div>
                                <div class="m-box-desc">
                                    The Indian remake is beautiful and has great music. There are many Thai movies that convey the emoti...
                                </div>
                            </a>
                        </div>
                        <div class="action-btn-wrap">
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary cboxElement" href="">Watch Trailer</a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php elseif(isset($item->tvseries) && $item->tvseries != NULL && isset($item->tvseries->seasons[0]) && views($item->tvseries->seasons[0])->unique()->count() <= $button->toprated_count): ?>
                <div class="genre-prime-slide m-box">
                    <div class="genre-slide-image m-box-content">
                        <a href="<?php echo e(url('show/detail',$item->tvseries->seasons[0]->season_slug)); ?>">
                        <?php if(isset($item->tvseries->thumbnail)): ?>
                        <img src="<?php echo e(url('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-fluid" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                        <?php endif; ?>
                        </a>
                        <div class="top-ten-heading"><?php echo e(++$i); ?>

                        </div>
                    </div>
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <a href="<?php echo e(url('show/detail',$item->tvseries->seasons[0]->season_slug)); ?>">
                                <h4 class="m-box-title ellipsis">
                                    The Notebook
                                </h4>
                                <div class="m-box-sub-title">
                                    Rating 2 <span class="pipe">|</span> 200 mins <span class="pipe">|</span> 2020 <span class="pipe">|</span> 13+
                                </div>
                                <div class="m-box-desc">
                                    The Indian remake is beautiful and has great music. There are many Thai movies that convey the emoti...
                                </div>
                            </a>
                        </div>
                        <div class="action-btn-wrap">
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary cboxElement" href="">Watch Trailer</a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--------- upcoming Movie -------------->
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 9 && isset($menu->menu_data) && $menu->menu_data != NULL && isset($upcomingitems->menu_data)): ?>
    <?php echo $__env->make('upcoming', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--------- end upcoming Movie ----------->
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 6): ?>
    <?php if(count($getallaudiolanguage) > 0): ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-view-all">
        <div class="container-fluid">
            <h5 class="section-heading"><?php echo e(__('View All languages')); ?> </h5>
            <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $getallaudiolanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="genre-prime-slide owls-item">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?> 
                        <a href="<?php echo e(route('show.in.alang',$alang->id)); ?>">
                            <div class="protip text-center" data-pt-placement="outside">
                                <?php if($alang->image != NULL): ?>
                                <img data-src="<?php echo e(url('images/audiolanguage/'.$alang->image)); ?>" class="img img-responsive genreview owl-lazy">
                                <?php else: ?>
                                <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <h1 class="content-heading"><?php echo e(ucfirst($alang->language)); ?></h1>
                            </div>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('show.in.guest.alang',$alang->id)); ?>">
                            <div class="protip text-center" data-pt-placement="outside">
                                <?php if($alang->image != NULL): ?>
                                <img data-src="<?php echo e(url('images/audiolanguage/'.$alang->image)); ?>" class="img img-responsive genreview owl-lazy">
                                <?php else: ?>
                                <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <h1 class="content-heading"><?php echo e(ucfirst($alang->language)); ?></h1>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid" id="post-data">
            <?php echo $__env->make('lang', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 2): ?>
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid" id="post-data">
            <?php if(count($menu->menugenreshow) > 0): ?>
            <?php echo $__env->make('selectgenre', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(count($getallgenre) > 0): ?>
            <div class="genre-view-all">
                <div class="">
                    <h5 class="section-heading"><?php echo e(__('staticwords.viewallgenre')); ?></h5>
                    <div class="genre-prime-slider owl-carousel">
                        <?php $__currentLoopData = $getallgenre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="genre-prime-slide owls-item">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?> 
                                <a href="<?php echo e(route('show.in.genre',$genre->id)); ?>">
                                    <div class="protip text-center" data-pt-placement="outside">
                                        <?php if($genre->image != NULL): ?>
                                        <img data-src="<?php echo e(url('images/genre/'.$genre->image)); ?>" class="img img-responsive genreview owl-lazy">
                                        <?php else: ?>
                                        <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <h1 class="content-heading"><?php echo e($genre->name); ?></h1>
                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(route('show.in.guest.genre',$genre->id)); ?>">
                                    <div class="protip text-center" data-pt-placement="outside">
                                        <?php if($genre->image != NULL): ?>
                                        <img data-src="<?php echo e(url('images/genre/'.$genre->image)); ?>" class="img img-responsive genreview owl-lazy">
                                        <?php else: ?>
                                        <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <h1 class="content-heading"><?php echo e($genre->name); ?></h1>
                                    </div>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- Blog Section -->
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 10): ?>
    <?php echo $__env->make('event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--------------------- Audio ------------------------->
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 11): ?>
    <?php echo $__env->make('audio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-------------------- end audio ---------------------->
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        <?php
        if (isset($ad) ) {
        if ($ad->ishome==1 && $ad->status==1) {
        $code=  $ad->code;
        echo html_entity_decode($code);
        }
        }
        ?>
    </div>
</section>
<!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    <?php if(isset(Auth::user()->multiplescreen)): ?>
    <?php if((Auth::user()->multiplescreen->activescreen!= NULL)): ?>
     $(document).ready(function(){
    
       $('#showM').hide();
    
       });
      <?php else: ?>
       $(document).ready(function(){
    
        $('#showM').modal();
    
       });
      <?php endif; ?>
      <?php endif; ?>
    
    
    
</script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/main.blade.php ENDPATH**/ ?>