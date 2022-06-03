@extends('layouts.theme')
@section('title',"$menu->name")
@section('main-wrapper')
@php
$age=0;
$config=App\Config::first();
if ($config->age_restriction==1) {
if(Auth::user()){
$user_id=Auth::user()->id;
$user=App\User::findOrfail($user_id);
$age=$user->age;
}
}else{
$age=100;
}
@endphp
{{-- code to get age for age restriction end --}}
<!-- main wrapper  slider -->
<section id="wishlistelement" class="main-wrapper">
    <div>
        <div id="home-main-block" class="home-main-block">
            <div id="home-slider-one" class="home-slider-one owl-carousel">
                @if(isset($home_slides) && count($home_slides) > 0)
                @foreach($home_slides as $slide)
                @if($slide->active == 1)
                <div class="slider-block">
                    <div class="slider-image">
                        @if(isset($slide->slide_image))  
                        @if($slide->movie_id != null)
                        @if(isset($auth) && getSubscription()->getData()->subscribed == true)
                        <a href="{{isset($slide->movie) && $slide->movie != NULL ? url('movie/detail', $slide->movie->slug) : '#'}}">
                        @if ($slide->slide_image != null)
                        @php
                        $image = 'images/home_slider/movies/'. $slide->slide_image;
                        // Read image path, convert to base64 encoding
                        $imageData = base64_encode(@file_get_contents($image));
                        if($imageData){
                        // Format the image SRC:  data:{mime};base64,{data};
                        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                        }else{
                        $src = '';
                        }
                        @endphp
                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="slider-image">
                        @elseif ($slide->movie->poster != null)
                        @php
                        $image = 'images/movies/posters/'. $slide->movie->poster;
                        // Read image path, convert to base64 encoding
                        $imageData = base64_encode(@file_get_contents($image));
                        if($src){
                        // Format the image SRC:  data:{mime};base64,{data};
                        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                        }else{
                        $src = '';
                        }
                        @endphp
                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="slider-image">
                        @endif
                        </a>
                        @else
                        <a href="{{isset($slide->movie) && $slide->movie != NULL ? url('movie/guest/detail', $slide->movie->slug) : '#'}}">
                        @if ($slide->slide_image != null)
                        @php
                        $image = 'images/home_slider/movies/'. $slide->slide_image;
                        // Read image path, convert to base64 encoding
                        $imageData = base64_encode(@file_get_contents($image));
                        if($imageData){
                        // Format the image SRC:  data:{mime};base64,{data};
                        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                        }else{
                        $src = '';
                        }
                        @endphp
                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="slider-image">
                        @elseif ($slide->movie->poster != null)
                        @php
                        $image = 'images/movies/posters/'. $slide->movie->poster;
                        // Read image path, convert to base64 encoding
                        $imageData = base64_encode(@file_get_contents($image));
                        if($src){
                        // Format the image SRC:  data:{mime};base64,{data};
                        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                        }else{
                        $src = '';
                        }
                        @endphp
                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="slider-image">
                        @endif
                        </a>
                        @endif
                        @elseif($slide->tv_series_id != null)
                        @if($auth && getSubscription()->getData()->subscribed == true)
                        <a href="{{isset($slide->tvseries->seasons[0]) && $slide->tvseries->seasons[0] != NULL ? url('show/detail', $slide->tvseries->seasons[0]->season_slug) : '#'}}">
                        @if ($slide->slide_image != null)
                        <img data-src="{{url('images/home_slider/shows/'. $slide->slide_image)}}" class="img-responsive owl-lazy" alt="slider-image">
                        @elseif ($slide->tvseries->poster != null)
                        <img data-src="{{url('images/tvseries/posters/'. $slide->tvseries->poster)}}" class="img-responsive owl-lazy" alt="slider-image">
                        @endif
                        </a>
                        @else
                        <a href="{{isset($slide->tvseries->seasons[0]) && $slide->tvseries->seasons[0] != NULL ? url('show/guest/detail', $slide->tvseries->seasons[0]->season_slug) : '#'}}">
                        @if ($slide->slide_image != null)
                        <img data-src="{{url('images/home_slider/shows/'. $slide->slide_image)}}" class="img-responsive owl-lazy" alt="slider-image">
                        @elseif ($slide->tvseries->poster != null)
                        <img data-src="{{url('images/tvseries/posters/'. $slide->tvseries->poster)}}" class="img-responsive owl-lazy" alt="slider-image">
                        @endif
                        </a>
                        @endif
                        @else
                        <a href="#">
                        @if ($slide->slide_image != null)
                        <img data-src="{{url('images/home_slider/'. $slide->slide_image)}}" class="img-responsive owl-lazy" alt="slider-image">
                        @endif
                        </a>
                        @endif
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <!-- age modal -->
        @include('modal.agemodal')
        <!--- end age modal -->
        <!-- age warning modal -->
        @include('modal.agewarning')
        <!-- end age warning modal -->
        @if(count($menu->menusections)>0)
        @foreach($menu->menusections as $section)
        @php
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
        @endphp
        @if($section->section_id == 1 && $recentlyadded != NULL && count($recentlyadded) >0)
        <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-top-slider">
            <div class="container-fluid">
                <h5 class="section-heading">{{__('staticwords.RecentlyAddedIn')}} </h5>
                @if($auth && getSubscription()->getData()->subscribed == true)
                <a href="{{ route('showall',['menuid' => $menu->id, 'menuname' => $menu->name]) }}" class="see-more"> <b>{{ __('staticwords.viewall')}}</b></a>
                @else
                <a href="{{ route('guestshowall',['menuid' => $menu->id, 'menuname' => $menu->name]) }}" class="see-more"> <b>{{ __('staticwords.viewall')}}</b></a>
                @endif
                <!-- Recently added movies and tv shows in list view End-->
                @if($section->view == 1)
                <div class="genre-prime-slider owl-carousel">
                    @foreach($recentlyadded as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}" data-pt-interactive="false">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                        <!--overlay-->
                            <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                      
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                            @if($src != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                            @if($item->thumbnail != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                        <!--overlay-->
                        <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    
                    </div>
                    @endif
                    @endif
                    @endforeach 
                </div>
                @endif
                <!-- Recently added movies and tv shows in list view End-->
                <!-- Recently Tvshows and movies in Grid view -->
                @if($section->view == 0)
                <div class="genre-prime-block">
                    @foreach($recentlyadded as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('movie/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{$src}}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                              <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                             <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>   
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
                @endif
                <!-- Recently Tvshows and movies in Grid view END-->
            </div>
        </div>
        @endif
        @endforeach
        @foreach($menu->menusections as $section)
        <!-- Featured Movies and TvShows -->
        @php
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
        @endphp
        @if($section->section_id == 3 && $featuresitems != NULL && count($featuresitems)>0)
        <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
            <div class="container-fluid">
                <h5 class="section-heading">{{__('staticwords.FeaturedIn')}} </h5>
                <!-- Featured Tvshows and movies in List view -->
                @if($section->view == 1)
                <div class="genre-prime-slider owl-carousel">
                    @foreach($featuresitems as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                        <!--overlay-->
<!--                        <div class="hidden-content">
                            <div class="m-box-details-wrap">
                                <a href="https://oovmedia.starpankaj.com/movie/detail/Ghosts%20of%20the%20Ozarks">
                                    <h4 class="m-box-title ellipsis">
                                        {{$item->title}}
                                    </h4>
                                    <div class="m-box-sub-title">
                                        {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                    </div>
                                    <div class="m-box-desc">
                                        {{str_limit($item->detail,100,'...')}}
                                    </div>
                                </a>
                            </div>
                            <div class="action-btn-wrap">
                                <span asset-type="MOVIE" class="watchlist-button-wrap">
                                <a href="" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                                </a>
                                </span>
                                <span class="play-button-wrap">
                                <a class="iframe btn btn-primary cboxElement" href="">Watch Trailer</a>
                                </span>
                            </div>
                        </div>-->
                       <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide">
                        <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @else
                            <img data-src="{{$src}}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                          <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @endif
                    @endif
                    @endforeach 
                </div>
                @endif
                <!-- Featured Tvshows and movies in List view END -->
                <!-- Featured Tvshows and movies in Grid view -->
                @if($section->view == 0)
                <div class="genre-prime-block">
                    @foreach($featuresitems as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('movie/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                             <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                               <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
                @endif
                <!-- Featured Tvshows and movies in Grid view END-->
            </div>
        </div>
        @endif  
        @endforeach
        <!-- Featured Tv Shows and Movies end-->
        <!------------- because you watched ------------------->
        @if(Auth::user() && $auth != NULL && getSubscription()->getData()->subscribed == true)
        @foreach($menu->menusections as $section)
        @php
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
        @endphp
        @if($section->section_id == 4 && $recom_block != NULL && count($recom_block)>0)
        <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
            <div class="container-fluid">
                @php
                $watch = App\WatchHistory::OrderBy('id','DESC')->first();
                $movie = App\Movie::where('id',$watch->movie_id)->first();
                $tv = App\TvSeries::where('id',$watch->tv_id)->first();
                @endphp
                @if(isset($movie))
                <h5 class="section-heading">{{__('staticwords.Becauseyouwatched')}}: {{isset($movie->title) ? ucfirst($movie->title) : ''}}</h5>
                @else
                <h5 class="section-heading">{{__('staticwords.Becauseyouwatched')}} : {{isset($tv->title) ? ucfirst($tv->title) : ''}}</h5>
                @endif
                <!-- best in intrest  added movies and tv shows in list view End-->
                @if($section->view == 1)
                <div class="genre-prime-slider owl-carousel">
                    @foreach($recom_block as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                          <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide">
                        <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                            @if($item->thumbnail != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @else
                            <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                            @if($item->thumbnail != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif  
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                         <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @endif
                    @endif
                    @endforeach 
                </div>
                @endif
                <!-- best in intrest added movies and tv shows in list view End-->
                <!-- best in intrest Tvshows and movies in Grid view -->
                @if($section->view == 0)
                <div class="genre-prime-block">
                    @foreach($recom_block as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('movie/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{$src}}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                               <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                         <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
                @endif
                <!-- best in intrest Tvshows and movies in Grid view END-->
            </div>
        </div>
        @endif
        @endforeach
        @endif
        <!----------- because you watched end ----------------->
        @foreach($menu->menusections as $section)
        @if($section->section_id == 12  && $top_data != NULL)
        <div class="top-ten-main-block">
            <div class="container-fluid">
                @if(isset($top_data->menu_data))
                <h5 class="section-heading">{{__('Toprated')}} </h5>
                <div class="genre-prime-slider owl-carousel">
                    @php
                    $i = 0;
                    @endphp
                    @foreach($top_data->menu_data  as $key => $item)
                    @if(isset($item->movie) && $item->movie != NULL && views($item->movie)->unique()->count() >= $button->toprated_count ) 
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image m-box-content">
                            <a href="{{url('movie/detail',$item->movie->slug)}}">
                            @if(isset($item->movie->thumbnail))
                            <img src="{{url('images/movies/thumbnails/'.$item->movie->thumbnail)}}" class="img-fluid" alt="">
                            @else
                            <img src="{{url('images/default-thumbnail.jpg')}}" class="img-fluid" alt="">
                            @endif
                            </a>
                            <div class="top-ten-heading">{{++$i}}
                            </div>
                        </div>

                    </div>
                    @elseif(isset($item->tvseries) && $item->tvseries != NULL && isset($item->tvseries->seasons[0]) && views($item->tvseries->seasons[0])->unique()->count() >= $button->toprated_count)
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image m-box-content">
                            <a href="{{url('show/detail',$item->tvseries->seasons[0]->season_slug)}}">
                            @if(isset($item->tvseries->thumbnail))
                            <img src="{{url('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)}}" class="img-fluid" alt="">
                            @else
                            <img src="{{url('images/default-thumbnail.jpg')}}" class="img-fluid" alt="">
                            @endif
                            </a>
                            <div class="top-ten-heading">{{++$i}}
                            </div>
                        </div>

                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endif
        @endforeach
        <!------------- Continue Watch ------------------->
        @if(Auth::user() && getSubscription()->getData()->subscribed == true)
        @foreach($menu->menusections as $section)
        @php
        $historyadded = [];
        foreach ($watchistory as $key => $item) {
        $rm =  App\Movie::
        join('watch_histories','movies.id','=','watch_histories.movie_id')
        ->join('menu_videos','menu_videos.movie_id','=','movies.id')
        ->join('videolinks','videolinks.movie_id','=','movies.id')
        ->select('movies.id as id','watch_histories.movie_id as movie_id','movies.title as title','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','videolinks.iframeurl as iframeurl','movies.status as status','movies.type as type','movies.thumbnail as thumbnail','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
        ->where('movies.is_upcoming','!=' ,1)
        ->where('watch_histories.id',$item->id)->where('menu_videos.menu_id',$menu->id)->first();
        $historyadded[] = $rm;
        if($section->order == 1){
        arsort($historyadded);
        }
        if(count($historyadded) == $section->item_limit){
        break;
        exit(1);
        }
        }
        foreach ($watchistory as $key => $item) {
        $rectvs =  App\TvSeries::
        join('watch_histories','tv_series.id','=','watch_histories.tv_id')
        ->join('seasons','seasons.tv_series_id','=','tv_series.id')
        ->join('episodes','episodes.seasons_id','=','seasons.id')
        ->join('videolinks','videolinks.episode_id','=','episodes.id')
        ->join('menu_videos','menu_videos.tv_series_id','=','tv_series.id')
        ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
        ->where('watch_histories.id',$item->id)->where('menu_videos.menu_id',$menu->id)->first();
        $historyadded[] = $rectvs;
        if($section->order == 1){
        arsort($historyadded);
        }
        if(count($historyadded) == $section->item_limit){
        break;
        exit(1);
        }
        }
        $historyadded = array_values(array_filter($historyadded));
        @endphp
        @if($section->section_id == 5 && $historyadded != NULL && count($historyadded) >0)
        <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
            <div class="container-fluid">
                <h5 class="section-heading">{{__('staticwords.ContinueWatchingFor')}} {{Auth::user()->name}}</h5>
                <!-- Continue Watch  added movies and tv shows in list view End-->
                @if($section->view == 1)
                <div class="genre-prime-slider owl-carousel">
                    @foreach($historyadded as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="movie-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="movie-image">
                            @endif
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                            @if($src)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="movie-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="movie-image">
                            @endif
                            </a>
                            @endif
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                       <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="genre-prime-slide m-box">
                        <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                            @if($item->thumbnail != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="tvseries-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="tvseries-image">
                            @endif
                            </a>
                            @else
                            <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                            @if($item->thumbnail != null)
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @else
                            <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                            @endif
                            </a>
                            @endif 
                            @if($item->is_custom_label == 1)
                            @if(isset($item->label_id))
                            <span class="badge bg-success">{{$item->label->name}}</span>
                            @endif
                            @endif
                        </div>
                      <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    @endif
                    @endif
                    @endforeach 
                </div>
                @endif
                <!-- continue Watch added movies and tv shows in list view End-->
                <!-- continue Watch Tvshows and movies in Grid view -->
                @if($section->view == 0)
                <div class="genre-prime-block">
                    @foreach($historyadded as $item)
                    @php
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
                    @endphp
                    @if($item->status == 1)
                    @if($item->type == 'M')
                    @php
                    $image = 'images/movies/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('movie/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="movie-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="movie-image">
                                @endif
                                </a>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{$src}}" class="img-responsive lazy" alt="movie-image">
                                @else
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="movie-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                            <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @elseif($item->type == 'T')
                    @php
                    $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(@file_get_contents($image));
                    if($imageData){
                    // Format the image SRC:  data:{mime};base64,{data};
                    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                    }else{
                    $src = url('images/default-thumbnail.jpg');
                    }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                @endif
                                </a>
                                @else
                                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="tseries-image">
                                @endif
                                </a>
                                @endif
                                @if($item->is_custom_label == 1)
                                @if(isset($item->label_id))
                                <span class="badge bg-success">{{$item->label->name}}</span>
                                @endif
                                @endif
                            </div>
                             <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            <a href="{{url('movie/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @else
                            <a href="{{url('movie/guest/detail',$item->slug)}}">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span>
                                    {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                                </div>
                                <div class="m-box-desc">
                                    {{str_limit($item->detail,100,'...')}}
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="action-btn-wrap">
                            {{-- <a href="{{route('hide.for.me',['id'=>$item->id , 'type'=>$item->type])}}" class="pull-right" style="margin-top: 20px;"><i class="fa fa-ban"></i></a> --}}
                            @if($auth && getSubscription()->getData()->subscribed == true)
                            @if($item->is_upcoming == 0)
                            @if(checkInMovie($item) == true)
                            @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                            @if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null)
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a href="{{route('watchmovie',$item->id)}}" class="btn btn-primary btn-bordered addto-watchlist">Play Now
                            </a>
                            </span>
                            @endif
                            @else
                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <a onclick="myage({{$age}})" class=" btn btn-primary btn-bordered addto-watchlist">Play Now </a>
                            </span>
                            @endif
                            @endif
                            @endif
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('watchTrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @else
                            @if($item->trailer_url != null || $item->trailer_url != '')
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary" href="{{ route('guestwatchtrailer',$item->id) }}">{{__('staticwords.watchtrailer')}}</a>
                            </span>
                            @endif
                            @endif
                            @if($catlog == 0 && getSubscription()->getData()->subscribed == true)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @elseif($catlog == 1)
                            @if($auth)
                            @if (isset($wishlist_check->added))
<!--                            <span asset-type="MOVIE" class="watchlist-button-wrap">
                            <button onclick="addWish({{$item->id}},'{{$item->type}}')" class="addwishlistbtn{{$item->id}}{{$item->type}} btn btn-primary btn-bordered addto-watchlist">{{$wishlist_check->added == 1 ? __('staticwords.removefromwatchlist') : __('staticwords.addtowatchlist')}}</button>
                            </span>-->
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
                @endif
                <!-- Continue watch Tvshows and movies in Grid view END-->
            </div>
        </div>
        @endif
        @endforeach
        @endif
        <!----------- Continue watch end ----------------->
        <!------------- Movie Pormotion ------------------->
        @foreach($menu->menusections as $section)
        <div class="container-fluid" >
            @if($section->section_id == 7 && $short_promo != NULL && count($short_promo)>0)
            <div id="myCarousel" class="carousel slide home-dtl-slider news-section" data-ride="carousel" style="background-image: url('{{ asset('/imgaes/default-poster.jpg') }}')">
                <div class="overlay-bg"></div>
                <!-- Indicators -->
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @php
                    $homeblocks = [];
                    foreach ($short_promo as $key => $item) {
                    $home_movie =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
                    ->join('home_blocks','home_blocks.movie_id','=','movies.id')
                    ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.poster as poster','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','movies.slug as slug','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
                    ->where('movies.is_upcoming','!=' ,1)
                    ->where('movies.id',$item->movie_id)->first();
                    $homeblocks[] = $home_movie;
                    }
                    foreach ($short_promo as $key => $item) {
                    $home_tvs = App\TvSeries::
                    join('seasons','seasons.tv_series_id','=','tv_series.id')
                    ->join('episodes','episodes.seasons_id','=','seasons.id')
                    ->join('videolinks','videolinks.episode_id','=','episodes.id')
                    ->join('home_blocks','home_blocks.tv_series_id','=','tv_series.id')
                    ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','tv_series.poster as poster','seasons.trailer_url as trailer_url')
                    ->where('tv_series.id',$item->tv_series_id)->first();
                    $homeblocks[] = $home_tvs;
                    }
                    $homeblocks = array_values(array_filter($homeblocks));
                    @endphp
                    @foreach($homeblocks as $ki => $item)
                    @php
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
                    @endphp
                    <div class="item {{ $ki==0 ? "active" : "" }}">
                    <div class="row">
                        <div class="col-md-6">
                            @if($item->status == 1)
                            @if($item->type == 'M')
                            @php
                            $image = 'images/movies/posters/'.$item->poster;
                            // Read image path, convert to base64 encoding
                            $imageData = base64_encode(@file_get_contents($image));
                            if($imageData){
                            // Format the image SRC:  data:{mime};base64,{data};
                            $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                            }else{
                            $src = 'images/default-poster.jpg';
                            }
                            @endphp
                            <div class="slider-height">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                @if($item->trailer_url != null || $item->trailer_url != '')
                                @php
                                $url = str_replace("https://youtu.be/", "https://youtube.com/embed/", $item->trailer_url)
                                @endphp
                                <iframe src="{{$url}}" height="350" width="100%"></iframe>
                                @else
                                <a href="{{url('movie/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="movie-image" style="width:100%">
                                @endif
                                </a>
                                @endif              
                                @else
                                @if($item->trailer_url != null || $item->trailer_url != '')
                                @php
                                $url = str_replace("https://youtu.be/", "https://youtube.com/embed/", $item->trailer_url)
                                @endphp
                                <iframe src="{{$url}}" height="215" width="100%"></iframe>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">
                                @if($src)
                                <img data-src="{{ $src }}" class="img-responsive lazy" alt="movie-image" style="width:100%">
                                @endif
                                </a>
                                @endif             
                                @endif
                            </div>
                            @elseif($item->type === 'T')
                            <div class="slider-height">
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif>
                                @if($item->pster)
                                <img src="{{ url('images/tvseries/posters/'.$item->poster) }}" class="img-responsive" alt="tvseries-image" style="width:100%">
                                @else
                                <img src="{{url('images/default-poster.jpg') }}" class="img-responsive" alt="tvseries-image" style="width:100%">
                                @endif
                                </a>
                                @else
                                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                                @if($src)
                                <img src="{{ url('images/tvseries/posters/'.$item->poster) }}" class="img-responsive" alt="tvseries-image" style="width:100%">
                                @else
                                <img src="{{url('images/default-poster.jpg') }}" class="img-responsive" alt="tvseries-image" style="width:100%">
                                @endif
                                </a>                
                                @endif
                            </div>
                            @endif
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($item->status == 1)
                            @if($item->type == 'M')
                            <div class="slider-height-dtl">
                                <img src="{{url('images/logo/logo.png')}}" class="img-responsive" alt="{{$w_title}}">
                                <h1>{{$item->title}}</h1>
                                <br/>
                                <div class="row">
                                    <div class="des-btn-block des-in-list">
                                        @if($auth && getSubscription()->getData()->subscribed == true)
                                        @if(checkInMovie($item) == true)
                                        @if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating))
                                        @if($item->video_link['iframeurl'] != null)
                                        <a href="{{route('watchmovieiframe',$item->id)}}"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span>
                                        </a>
                                        @else
                                        <a href="{{route('watchmovie',$item->id)}}" class="iframe btn btn-play"> <span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span>
                                        </a>
                                        @endif
                                        @else
                                        <a onclick="myage({{$age}})" class=" iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span>
                                        </a>
                                        @endif
                                        @endif
                                        @endif
                                        @if($auth && getSubscription()->getData()->subscribed == true)
                                        <a class="btn btn-default" href="{{url('movie/detail',$item->slug)}}"><i class="fa fa-info-circle"></i> {{__('staticwords.moreinfo')}}</a>
                                        @else
                                        <a class="btn btn-default" href="{{url('movie/guest/detail',$item->slug)}}"><i class="fa fa-info-circle"></i> {{__('staticwords.moreinfo')}}</a>
                                        @endif
                                    </div>
                                </div>
                                <br/>
                                <p>{{str_limit($item->detail,150,'...')}}</p>
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('movie/detail',$item->slug)}}">{{__('staticwords.readmore')}}</a>
                                @else
                                <a href="{{url('movie/guest/detail',$item->slug)}}">{{__('staticwords.readmore')}}</a>
                                @endif
                                <br/>
                                <p class="promotion"># {{count($homeblocks)}}  {{__('staticwords.topin')}} {{$menu->name}}</p>
                            </div>
                            @elseif($item->type === 'T')
                            <div class="slider-height-dtl">
                                <img data-src="{{url('images/logo/logo.png')}}" class="img-responsive lazy" alt="{{$w_title}}">
                                <h1>{{$item->title}}</h1>
                                <br/>
                                <div>
                                    <div class="des-btn-block des-in-list des-in-list-one">
                                        @if (isset($gets1->episodes[0]) &&  getSubscription()->getData()->subscribed == true && $auth && checkInTvseries($item) == true)
                                        @if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req))
                                        @if($gets1->episodes[0]->video_link['iframeurl'] !="")
                                        <a href="#" onclick="playoniframe('{{ $gets1->episodes[0]->video_link['iframeurl'] }}','{{ $gets1->episodes[0]->seasons->tvseries->id }}','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span>
                                        </a>
                                        @else
                                        <a href="{{ route('watchTvShow',$gets1->id) }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span></a>
                                        @endif
                                        @else
                                        <a onclick="myage({{$age}})" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('staticwords.playnow')}}</span></a>
                                        @endif
                                        @endif
                                        @if($auth && getSubscription()->getData()->subscribed == true)
                                        <a class="btn btn-default" @if(isset($gets1)) href="{{url('show/detail',$gets1->season_slug)}}" @endif><i class="fa fa-info-circle"></i> {{__('staticwords.moreinfo')}}</a>
                                        @else
                                        <a class="btn btn-default" @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif><i class="fa fa-info-circle"></i> {{__('staticwords.moreinfo')}}</a>
                                        @endif
                                    </div>
                                </div>
                                <br/>
                                <p>{{str_limit($item->detail,150,'...')}}</p>
                                @if($auth && getSubscription()->getData()->subscribed == true)
                                <a href="{{url('show/detail',$gets1->season_slug)}}">{{__('staticwords.readmore')}}</a>
                                @else
                                <a href="{{url('show/guest/detail',$gets1->season_slug)}}">{{__('staticwords.readmore')}}</a>
                                @endif
                                <br/>
                                <p class="promotion"># {{count($homeblocks)}}  {{__('staticwords.topin')}} {{$menu->name}}</p>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
    </div>
    @endforeach
    <!----------- Movie Pormotion end ----------------->
    <!--------- upcoming Movie -------------->
    @foreach($menu->menusections as $section)
    @if($section->section_id == 9 && isset($menu->menu_data) && $menu->menu_data != NULL && isset($upcomingitems->menu_data))
    @include('upcoming')
    @endif  
    @endforeach
    <!--------- end upcoming Movie ----------->
    @foreach($menu->menusections as $section)
    @if($section->section_id == 6)
    @if(count($getallaudiolanguage) > 0)
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-view-all">
        <div class="container-fluid">
            <h5 class="section-heading">{{__('View All languages')}}</h5>
            <div class="genre-prime-slider owl-carousel">
                @foreach($getallaudiolanguage as $alang)
                <div class="item">
                    <div class="genre-prime-slide owls-item">
                        @if($auth && getSubscription()->getData()->subscribed == true) 
                        <a href="{{ route('show.in.alang',$alang->id) }}">
                            <div class="protip text-center" data-pt-placement="outside">
                                @if($alang->image != NULL)
                                <img data-src="{{url('images/audiolanguage/'.$alang->image)}}" class="img img-responsive genreview owl-lazy">
                                @else
                                <img data-src="{{url('/images/default-thumbnail.jpg')}}" class="img img-responsive genreview owl-lazy">
                                @endif
                            </div>
                            <div class="content">
                                <h1 class="content-heading">{{ucfirst($alang->language)}}</h1>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('show.in.guest.alang',$alang->id) }}">
                            <div class="protip text-center" data-pt-placement="outside">
                                @if($alang->image != NULL)
                                <img data-src="{{url('images/audiolanguage/'.$alang->image)}}" class="img img-responsive genreview owl-lazy">
                                @else
                                <img data-src="{{url('/images/default-thumbnail.jpg')}}" class="img img-responsive genreview owl-lazy">
                                @endif
                            </div>
                            <div class="content">
                                <h1 class="content-heading">{{ucfirst($alang->language)}}</h1>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid" id="post-data">
            @include('lang')
        </div>
    </div>
    @endif
    @endforeach
    @foreach($menu->menusections as $section)
    @if($section->section_id == 2)
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid" id="post-data">
            @if(count($menu->menugenreshow) > 0)
            @include('selectgenre')
            @endif
            @if(count($getallgenre) > 0)
            <div class="genre-view-all">
                <div class="">
                    <h5 class="section-heading">{{__('staticwords.viewallgenre')}}</h5>
                    <div class="genre-prime-slider owl-carousel">
                        @foreach($getallgenre as $genre)
                        <div class="item">
                            <div class="genre-prime-slide owls-item">
                                @if($auth && getSubscription()->getData()->subscribed == true) 
                                <a href="{{ route('show.in.genre',$genre->id) }}">
                                    <div class="protip text-center" data-pt-placement="outside">
                                        @if($genre->image != NULL)
                                        <img data-src="{{url('images/genre/'.$genre->image)}}" class="img img-responsive genreview owl-lazy">
                                        @else
                                        <img data-src="{{url('/images/default-thumbnail.jpg')}}" class="img img-responsive genreview owl-lazy">
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h1 class="content-heading">{{$genre->name}}</h1>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('show.in.guest.genre',$genre->id) }}">
                                    <div class="protip text-center" data-pt-placement="outside">
                                        @if($genre->image != NULL)
                                        <img data-src="{{url('images/genre/'.$genre->image)}}" class="img img-responsive genreview owl-lazy">
                                        @else
                                        <img data-src="{{url('/images/default-thumbnail.jpg')}}" class="img img-responsive genreview owl-lazy">
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h1 class="content-heading">{{$genre->name}}</h1>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
    @endforeach
    @endif
    <!-- Blog Section -->
    @foreach($menu->menusections as $section)
    @if($section->section_id == 8)
    @include('bloghome')
    @endif
    @endforeach
    @foreach($menu->menusections as $section)
    @if($section->section_id == 10)
    @include('event')
    @endif
    @endforeach
    <!--------------------- Audio ------------------------->
    @foreach($menu->menusections as $section)
    @if($section->section_id == 11)
    @include('audio')
    @endif
    @endforeach
    <!-------------------- end audio ---------------------->
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        @php
        if (isset($ad) ) {
        if ($ad->ishome==1 && $ad->status==1) {
        $code=  $ad->code;
        echo html_entity_decode($code);
        }
        }
        @endphp
    </div>
</section>
@endsection
@section('custom-script')
<script>
    function playoniframe(url,id,type){
      $(document).ready(function(){
       var SITEURL = '{{URL::to('')}}';
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
          this.$http.post('{{route('addtowishlist')}}', this.result).then((response) => {
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
          return text == "{{__('staticwords.addtowatchlist')}}" ? "{{ __('staticwords.removefromwatchlist') }}" : "{{__('staticwords.addtowatchlist')}}";
        });
      }, 100);
    }
</script> 
@endsection