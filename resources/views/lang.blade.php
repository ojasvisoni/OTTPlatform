@foreach($audiolanguages as $lang)
@php
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
@endphp
<div class="mobile-veiw-all-lang">
    @if($audiogenreitems != NULL && count($audiogenreitems)>0)
    <h5 class="section-heading">{{  ucfirst($lang->language) }} </h5>
    @endif   
    @if($section->view == 1)
    <div class="genre-prime-slider owl-carousel">
        @foreach($audiogenreitems as $item)
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
        <!-- List view language movies and tv shows -->
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
            <!-- overlay -->
            <div class="hidden-content">
                <div class="m-box-details-wrap">
                    <a href="{{url('movie/guest/detail',$item->slug)}}">
                        <h4 class="m-box-title ellipsis">
                            {{$item->title}}
                        </h4>
                  <div class="m-box-sub-title">
                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                   </div>
                        <div class="m-box-desc">
                            {{$item->detail}}
                        </div>
                    </a>
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
        @if($item->type == 'T')
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
                @if($item->thumbnail != null)
                <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="ttvseries-image">
                @endif
                </a>
                @else
                <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                @if($item->thumbnail != null)
                <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="tvseries-image">
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
                    <a href="{{url('movie/guest/detail',$item->slug)}}">
                        <h4 class="m-box-title ellipsis">
                            {{$item->title}}
                        </h4>
                  <div class="m-box-sub-title">
                    {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                   </div>
                        <div class="m-box-desc">
                            {{$item->detail}}
                        </div>
                    </a>
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
        <!-- end -->
        @endforeach
    </div>
    <!-- List view movies by language END -->
    @endif
    @if($section->view == 0)
    <!-- Grid view language by movies -->
    <div class="row">
        @foreach($audiogenreitems as $item)
        @php
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
                    @endif
                    </a>
                    @else
                    <a href="{{url('movie/guest/detail',$item->slug)}}">
                    @if($src)
                    <img data-src="{{$src}}" class="img-responsive lazy" alt="movie-image">
                    @endif
                    </a>
                    @endif
                    @if($item->is_custom_label == 1)
                    @if(isset($item->label_id))
                    <span class="badge bg-success">{{$item->label->name}}</span>
                    @endif
                    @endif
                </div>
                
                <!-- OVERLAY -->
                <div class="hidden-content">
                     <div class="m-box-details-wrap">
                         <a href="{{url('movie/guest/detail',$item->slug)}}">
                             <h4 class="m-box-title ellipsis">
                                 {{$item->title}}
                             </h4>
                       <div class="m-box-sub-title">
                         {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                        </div>
                             <div class="m-box-desc">
                                 {{$item->detail}}
                             </div>
                         </a>
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
        @if($item->type == 'T')
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
                    <img data-src="{{ $src }}" class="img-responsive lazy" alt="tvseries-image">
                    @else
                    <img data-src="{{ $src }}" class="img-responsive lazy" alt="tvseries-image">
                    @endif
                    </a>
                    @else
                    <a @if(isset($gets1)) href="{{url('show/guest/detail',$gets1->season_slug)}}" @endif>
                    @if($src)
                    <img data-src="{{ $src }}" class="img-responsive lazy" alt="tvseries-image">
                    @else
                    <img data-src="{{ $src }}" class="img-responsive lazy" alt="tvseries-image">
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
                         <a href="{{url('movie/guest/detail',$item->slug)}}">
                             <h4 class="m-box-title ellipsis">
                                 {{$item->title}}
                             </h4>
                       <div class="m-box-sub-title">
                         {{__('staticwords.tmdbrating')}} {{$item->rating}} <span class="pipe">|</span> {{$item->duration}} {{__('staticwords.mins')}} <span class="pipe">|</span> {{$item->publish_year}} <span class="pipe">|</span> {{$item->maturity_rating}}
                        </div>
                             <div class="m-box-desc">
                                 {{$item->detail}}
                             </div>
                         </a>
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
    <!--end grid view by language-->
    @endif
</div>
@endforeach
@section('custom-script')
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