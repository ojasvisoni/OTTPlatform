
<?php $__env->startSection('title',__('staticwords.viewall')); ?>
<?php $__env->startSection('main-wrapper'); ?>
<!-- main wrapper -->
<?php
$withlogin= $configs->withlogin;
$catlog= $configs->catlog;
$auth=Auth::user();
$subscribed = null;
$all_genre = \App\Genre::get();
$a_lang = \APP\AudioLanguage::get();
$menus = \APP\Menu::get();
?>
<section class="main-wrapper main-wrapper-single-movie-prime search-section movie-series-filter-section ">
    <div class="container-fluid">
        <div class="showalllangs">
            <div class="row">
                <div class="col-lg-3 col-sm-4">
                    <form action="" method="get" class="filterForm">
                        <div class="movie-series-sidebar">
                            <div class="movie-series-filter-block language">
                                <label for="type" class="filter-header"><?php echo e(__('staticwords.title')); ?></label>
                                <select class="form-select select2" aria-label="Default select example " name="title">
                                    <option value=""><?php echo e(__('staticwords.SelectTitle')); ?></option>
                                    <option value="ASC" <?php echo e((app('request')->input('title') == 'ASC')  ? 'selected' : ''); ?>><?php echo e(__('A to Z')); ?></option>
                                    <option value="DESC" <?php echo e((app('request')->input('title') == 'DESC')  ? 'selected' : ''); ?>><?php echo e(__('Z to A')); ?></option>
                                </select>
                            </div>
                            <div class="movie-series-filter-block toggle-switch">
                                <label class="switch">
                                <input type="checkbox" name="feature" <?php if(app('request')->input('feature')): ?> checked  <?php else: ?> <?php endif; ?>>
                                <span class="slider round"></span>
                                </label>
                                <label class="form-check-label" for="flexSwitchCheckDefault"><?php echo e(__('staticwords.OnlyFeatured')); ?></label>
                            </div>
                            <div class="movie-series-filter-block genre-filter">
                                <label for="type" class="filter-header"><?php echo e(__('staticwords.SelectedGenres')); ?></label>
                                <div class="form-check">
                                    <?php $__currentLoopData = $all_genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input class="form-check-input" name="genre[]" id="<?php echo e($genre->id); ?>" type="checkbox" <?php if(app('request')->input('genre') != NULL): ?> <?php $__currentLoopData = app('request')->input('genre'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($request_genre == $genre->id): ?>  checked <?php else: ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> value="<?php echo e($genre->id); ?>">
                                    <label for="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></label><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="movie-series-filter-block language">
                                <label for="type" class="filter-header"><?php echo e(__('staticwords.AgeRatings')); ?></label>
                                <select class="form-select select2" aria-label="Default select example " name="age_rating">
                                    <option value="">Select Age</option>
                                    <option value="all" <?php echo e((app('request')->input('age_rating') == 'all')  ? 'selected' : ''); ?>><?php echo e(__('All Age')); ?></option>
                                    <option value="13" <?php echo e((app('request')->input('age_rating') == '13') ? 'selected' : ''); ?>><?php echo e(__('13+')); ?></option>
                                    <option value="16" <?php echo e((app('request')->input('age_rating') == '16') ? 'selected' : ''); ?>><?php echo e(__('16+')); ?></option>
                                    <option value="18" <?php echo e((app('request')->input('age_rating') == '18') ? 'selected' : ''); ?>><?php echo e(__('18+')); ?></option>
                                </select>
                            </div>
                            <div class="reset-filter-block">
                                <button type="submit" class="btn btn-primary btn-default green-bg"><i class="fa fa-sync"></i><?php echo e(__('staticwords.ApplyFilters')); ?></button> 
                            </div>
                        </div>
                    </form>
                    <div class="small-screen-sidebar">
                        <div id="mySidebar" class="sidebar">
                            <a href="javascript:void(0)" class="closebtn" onclick="closebar()">×</a>
                            <form action="" method="get">
                                <div class="movie-series-sidebar">
                                    <div class="movie-series-filter-block language">
                                        <label for="type" class="filter-header"><?php echo e(__('staticwords.title')); ?></label>
                                        <select class="form-select select2" aria-label="Default select example " name="title">
                                            <option value=""><?php echo e(__('staticwords.SelectTitle')); ?></option>
                                            <option value="ASC" <?php echo e((app('request')->input('title') == 'ASC')  ? 'selected' : ''); ?>><?php echo e(__('A to Z')); ?></option>
                                            <option value="DESC" <?php echo e((app('request')->input('title') == 'DESC')  ? 'selected' : ''); ?>><?php echo e(__('Z to A')); ?></option>
                                        </select>
                                    </div>
                                    <div class="movie-series-filter-block toggle-switch">
                                        <label class="switch">
                                        <input type="checkbox" name="tmdb" <?php if(app('request')->input('tmdb')): ?> checked  <?php else: ?> <?php endif; ?>>
                                        <span class="slider round"></span>
                                        </label>
                                        <label class="form-check-label" for="flexSwitchCheckDefault"><?php echo e(__('staticwords.OnlyTMDB')); ?></label>
                                    </div>
                                    <div class="movie-series-filter-block toggle-switch">
                                        <label class="switch">
                                        <input type="checkbox" name="feature" <?php if(app('request')->input('feature')): ?> checked  <?php else: ?> <?php endif; ?>>
                                        <span class="slider round"></span>
                                        </label>
                                        <label class="form-check-label" for="flexSwitchCheckDefault"><?php echo e(__('staticwords.OnlyFeatured')); ?></label>
                                    </div>
                                    <div class="movie-series-filter-block genre-filter">
                                        <label for="type" class="filter-header"><?php echo e(__('staticwords.SelectedGenres')); ?></label>
                                        <div class="form-check">
                                            <?php $__currentLoopData = $all_genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input class="form-check-input" name="genre[]" id="<?php echo e($genre->id); ?>" type="checkbox" <?php if(app('request')->input('genre') != NULL): ?> <?php $__currentLoopData = app('request')->input('genre'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($request_genre == $genre->id): ?>  checked <?php else: ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> value="<?php echo e($genre->id); ?>">
                                            <label for="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></label><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="movie-series-filter-block language">
                                        <label for="type" class="filter-header"><?php echo e(__('staticwords.AgeRatings')); ?></label>
                                        <select class="form-select select2" aria-label="Default select example " name="age_rating">
                                            <option value=""><?php echo e(__('staticwords.SelectAge')); ?></option>
                                            <option value="all" <?php echo e((app('request')->input('age_rating') == 'all')  ? 'selected' : ''); ?>><?php echo e(__('All Age')); ?></option>
                                            <option value="13" <?php echo e((app('request')->input('age_rating') == '13') ? 'selected' : ''); ?>><?php echo e(__('13+')); ?></option>
                                            <option value="16" <?php echo e((app('request')->input('age_rating') == '16') ? 'selected' : ''); ?>><?php echo e(__('16+')); ?></option>
                                            <option value="18" <?php echo e((app('request')->input('age_rating') == '18') ? 'selected' : ''); ?>><?php echo e(__('18+')); ?></option>
                                        </select>
                                    </div>
                                    <div class="reset-filter-block">
                                        <button type="submit" class="btn btn-primary btn-default"><i class="fa fa-sync"></i><?php echo e(__('staticwords.ApplyFilters')); ?></button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="main">
                            <button class="openbtn" onclick="openbar()">☰</button>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-8">
                    <?php if(isset($pusheditems) && count($pusheditems) > 0 ): ?>
                    <div class="movie-series-header-block">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <h3 class="movie-series-heading"><?php echo e(__('Browse')); ?></h3>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-right">
                                <button type="reset" class="btn btn-primary reset-btn red-bg" onclick="resetForm();" style="border: 0px;">Reset Filters<i class="flaticon-cancel"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($pusheditems)): ?>
                    <div class="row viewallmoive">
                        <?php $__currentLoopData = $pusheditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <?php
                        if (isset($item['type']) && $item['type'] == 'M') {
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                        ['user_id', '=', $auth->id],
                        ['movie_id', '=', $item['id'],
                        ]])->first();
                        }
                        if (isset($item['type']) && $item['type'] == 'S') {
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                        ['user_id', '=', $auth->id],
                        ['season_id', '=', $item['id']],
                        ])->first();
                        }
                        ?>
                        <?php endif; ?>
                        <?php if(isset($item['type']) && $item['type'] == "M"): ?>
                        <?php if(hidedata($item['id'],$item['type']) != 1): ?>
                        <div class="col-lg-2 col-md-4 col-sm-3 col-xs-3">
                            <div class="movie-series-image protip progress-movie" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item['id']); ?>">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('movie/detail',$item['slug'])); ?>">
                                <?php if($item['thumbnail'] != null || $item['thumbnail'] != ''): ?>
                                <img data-src="<?php echo e(url('images/movies/thumbnails/'.$item['thumbnail'])); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php else: ?>
                                <img data-src="<?php echo e(Avatar::create($item['title'])->toBase64()); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php endif; ?>
                                </a>
                                <div class="hide-icon hide-icon-two">
                                    <a onclick="hideforme('<?php echo e($item['id']); ?>','<?php echo e($item['type']); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-ban"></i></a>
                                </div>
                                <?php if(timecalcuate($auth->id,$item['id'],$item['type']) != 0): ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item['id'],$item['type'])); ?>%">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item['slug'])); ?>">
                                <?php if($item['thumbnail'] != null || $item['thumbnail'] != ''): ?>
                                <img data-src="<?php echo e(url('images/movies/thumbnails/'.$item['thumbnail'])); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php else: ?>
                                <img data-src="<?php echo e(Avatar::create($item['title'])->toBase64()); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php endif; ?>
                                </a>
                                <?php endif; ?>
                                <?php if($item['is_custom_label'] == 1): ?>
                                <?php if(isset($item['label_id']) && $item['label_id'] != NULL): ?>
                                <?php
                                $label = App\Label::find($item['label_id']);
                                ?>
                                <span class="badge bg-info"><?php echo e($label->name); ?></span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?php if(isset($protip) && $protip == 1): ?>
                            <div id="prime-next-item-description-block<?php echo e($item['id']); ?>" class="prime-description-block">
                                <div class="prime-description-under-block">
                                    <h5 class="description-heading"><?php echo e($item['title']); ?></h5>
                                    <ul class="description-list">
                                        <li><?php echo e(__('staticwords.rating')); ?> <?php echo e($item['rating']); ?></li>
                                        <li><?php echo e($item['duration']); ?> <?php echo e(__('staticwords.mins')); ?></li>
                                        <li><?php echo e($item['publish_year']); ?></li>
                                        <li><?php echo e($item['maturity_rating']); ?></li>
                                        <?php if($item['subtitle'] == 1): ?>
                                        <li>
                                            <?php echo e(__('staticwords.subtitles')); ?>

                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="main-des">
                                        <p><?php echo e(str_limit($item['detail'],150,'...')); ?></p>
                                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('movie/detail',$item['slug'])); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('movie/guest/detail',$item['slug'])); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="des-btn-block">
                                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <?php if($item['is_upcoming'] != 1): ?>
                                        <?php if(checkInViewAllMovie($item) == true && isset($item['video_link'])): ?>
                                        <?php if($item['maturity_rating'] =='all age' || $age>=str_replace('+', '', $item['maturity_rating'])): ?>
                                        <?php if(isset($item['video_link']['iframeurl']) && $item['video_link']['iframeurl'] != null): ?>
                                        <a href="<?php echo e(route('watchmovieiframe',$item['id'])); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                        </a>
                                        <?php else: ?> 
                                        <a href="<?php echo e(route('watchmovie',$item['id'])); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span></a>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                        </a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($item['trailer_url'] != null || $item['trailer_url'] != ''): ?>
                                        <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item['id'])); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php if($item['trailer_url'] != null || $item['trailer_url'] != ''): ?>
                                        <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item['id'])); ?>"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                        <a onclick="addWish(<?php echo e($item['id']); ?>,'<?php echo e($item['type']); ?>')" class="addwishlistbtn<?php echo e($item['id']); ?><?php echo e($item['type']); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                        <?php else: ?>
                                        <a onclick="addWish(<?php echo e($item['id']); ?>,'<?php echo e($item['type']); ?>')" class="addwishlistbtn<?php echo e($item['id']); ?><?php echo e($item['type']); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?></a>
                                        <?php endif; ?>
                                        <?php elseif($catlog ==1 && $auth): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                        <a onclick="addWish(<?php echo e($item['id']); ?>,'<?php echo e($item['type']); ?>')" class="addwishlistbtn<?php echo e($item['id']); ?><?php echo e($item['type']); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                        <?php else: ?>
                                        <a onclick="addWish(<?php echo e($item['id']); ?>,'<?php echo e($item['type']); ?>')" class="addwishlistbtn<?php echo e($item['id']); ?><?php echo e($item['type']); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php elseif(isset($item['type']) && $item['type'] == "T"): ?>
                        <?php if(hidedata($item['seasons_first']['id'],$item['seasons_first']['type']) != 1): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                            <div class="movie-series-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?>">
                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('show/detail',$item['seasons_first']['season_slug'])); ?>">
                                <?php if($item['thumbnail'] != null || $item['thumbnail'] != ''): ?>
                                <img data-src="<?php echo e(url('images/tvseries/thumbnails/'.$item['thumbnail'])); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php else: ?>
                                <img data-src="<?php echo e(Avatar::create($item['title'])->toBase64()); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php endif; ?>
                                </a>
                                <div class="hide-icon hide-icon-two">
                                    <a onclick="hideforme('<?php echo e($item['seasons_first']['id']); ?>','<?php echo e($item['seasons_first']['type']); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-ban"></i></a>
                                </div>
                                <?php else: ?>
                                <a href="<?php echo e(url('show/guest/detail',$item['seasons_first']['season_slug'])); ?>">
                                <?php if($item['thumbnail'] != null || $item['thumbnail'] != ''): ?>
                                <img data-src="<?php echo e(url('images/tvseries/thumbnails/'.$item['thumbnail'])); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php else: ?>
                                <img data-src="<?php echo e(Avatar::create($item['title'])->toBase64()); ?>" class="img-fluid lazy" alt="genre-image">
                                <?php endif; ?>
                                </a>
                                <?php endif; ?>
                                <?php if($item['is_custom_label'] == 1): ?>
                                <?php if(isset($item['label_id'])): ?>
                                <?php
                                $label = App\Label::find($item['label_id']);
                                ?>
                                <span class="badge bg-info"><?php echo e($label->name); ?></span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?php if(isset($protip) && $protip == 1): ?>
                            <div id="prime-next-item-description-block<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?>" class="prime-description-block">
                                <h5 class="description-heading"><?php echo e($item['title']); ?></h5>
                                <div class="movie-rating"><?php echo e(__('staticwords.tmdbrating')); ?> <?php echo e($item['rating']); ?></div>
                                <ul class="description-list">
                                    <li><?php echo e(__('staticwords.season')); ?><?php echo e($item['seasons_first']['season_no']); ?></li>
                                    <li><?php echo e($item['seasons_first']['publish_year']); ?></li>
                                    <li><?php echo e($item['maturity_rating']); ?></li>
                                </ul>
                                <div class="main-des">
                                    <?php if($item['detail'] != null || $item['detail'] != ''): ?>
                                    <p><?php echo e(str_limit($item['detail'],150,'...')); ?></p>
                                    <?php else: ?>
                                    <p><?php echo e(str_limit($item['seasons_first']['detail'],150,'...')); ?></p>
                                    <?php endif; ?>
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <a href="<?php echo e(url('show/detail',$item['seasons_first']['season_slug'])); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('show/guest/detail',$item['seasons_first']['season_slug'])); ?>"><?php echo e(__('staticwords.readmore')); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="des-btn-block">
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($item['seasons_first']['first_episode']) && checkInViewAllTv($item) == true && isset($item['seasons_first']['first_episode']['video_link'])): ?>
                                    <?php if( $item['maturity_rating'] =='all age' ||$age>=str_replace('+', '', $item['maturity_rating'])): ?>
                                    <?php if($item['seasons_first']['first_episode']['video_link']['iframeurl'] !=""): ?>
                                    <a href="#" onclick="playoniframe('<?php echo e($item['seasons_first']['first_episode']['video_link']['iframeurl']); ?>','<?php echo e($item['id']); ?>','tv')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('watchTvShow',$item['seasons_first']['id'])); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span></a>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <a onclick="myage(<?php echo e($age); ?>)" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('staticwords.playnow')); ?></span>
                                    </a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($item['seasons_first']['trailer_url'] != null || $item['seasons_first']['trailer_url'] != ''): ?>
                                    <a href="<?php echo e(route('watchtvTrailer',$item['id'])); ?>" class="iframe btn btn-default"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if($item['seasons_first']['trailer_url'] != null || $item['seasons_first']['trailer_url'] != ''): ?>
                                    <a href="<?php echo e(route('guestwatchtvtrailer',$item['id'])); ?>" class="iframe btn btn-default"><?php echo e(__('staticwords.watchtrailer')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                    <a onclick="addWish(<?php echo e($item['seasons_first']['id']); ?>,'<?php echo e($item['seasons_first']['type']); ?>')" class="addwishlistbtn<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                    <?php else: ?>
                                    <a onclick="addWish(<?php echo e($item['seasons_first']['id']); ?>,'<?php echo e($item['seasons_first']['type']); ?>')" class="addwishlistbtn<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php elseif($catlog ==1 && $auth): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                    <a onclick="addWish(<?php echo e($item['seasons_first']['id']); ?>,'<?php echo e($item['seasons_first']['type']); ?>')" class="addwishlistbtn<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')); ?></a>
                                    <?php else: ?>
                                    <a onclick="addWish(<?php echo e($item['seasons_first']['id']); ?>,'<?php echo e($item['seasons_first']['type']); ?>')" class="addwishlistbtn<?php echo e($item['seasons_first']['id']); ?><?php echo e($item['seasons_first']['type']); ?> btn-default"><?php echo e(__('staticwords.addtowatchlist')); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php else: ?>
                        <div class="view-all-search">
                            <h5 class="text-center" style="top:25%;"><?php echo e(__('Sorry, that filter combination has no result')); ?></h5>
                            <p class="text-center"><?php echo e(__('Please try another filter combination.')); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
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
    
      
    
      
      function playTrailer(url) {
        $('.video-player').css({
          "visibility" : "visible",
          "z-index" : "99999",
        });
        $('body').css({
          "overflow": "hidden"
        });
        $('#my_video').show();
        $('.vjs-control-bar').removeClass('hide-visible');
        let str = url;
        let youtube_slice_1 = str.slice(0, 14);
        let youtube_slice_2 = str.slice(0, 20);
        if (youtube_slice_1 == "https://youtu." || youtube_slice_2 == "https://www.youtube.")
        {
          $('.vjs-control-bar').addClass('hide-visible');
          player.src({ type: "video/youtube", src: url});
        } else {
          player.src({ type: "video/mp4", src: url});
        }
    
        setTimeout(function(){
          player.play();
        }, 300);
      }
    
      
    
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
<script>
    function openbar() {
      document.getElementById("mySidebar").style.width = "300px";
    }
    
    function closebar() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
</script>
<script>
    $(document).ready(function(){
        $(".reset-btn").click(function(){
           var uri = window.location.toString();
    
            if (uri.indexOf("?") > 0) {
    
                var clean_uri = uri.substring(0, uri.indexOf("?"));
    
                window.history.replaceState({}, document.title, clean_uri);
    
            }
    
            location.reload();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/viewall.blade.php ENDPATH**/ ?>