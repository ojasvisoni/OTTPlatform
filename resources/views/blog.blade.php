@extends('layouts.theme')
@section('title',__('staticwords.ourblog'))
@section('main-wrapper')
<div class="genre-prime-block blog-page">
    <div class="container-fluid">
        <h5 class="section-heading">{{__('All Blogs')}}</h5>
        <div class="">
            @if(isset($blogs))
            @foreach($blogs as $item)
            @php
            if($item->image != NULL){
            $image = 'images/blog/'.$item->image;
            }else{
            $image = 'images/default-thumbnail.jpg';
            }
            // Read image path, convert to base64 encoding
            $imageData = base64_encode(@file_get_contents($image));
            if($imageData){
            // Format the image SRC: data:{mime};base64,{data};
            $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
            }
            @endphp
            <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                <div class="cus_img m-box">
                    <div class="genre-slide-image home-prime-slider protip m-box-content" data-pt-placement="outside"
                        data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$item->id}}">
                        <a href="{{url('account/blog/'.$item->slug)}}">
                        @if(isset($src))
                        <img data-src="{{ $src}}" class="img-responsive lazy" alt="genre-image">
                        @endif
                        </a>
                    </div>
                    <div class="hidden-content">
                        <div class="m-box-details-wrap">
                            <a href="https://oovmedia.starpankaj.com/movie/guest/detail/the_fallout">
                                <h4 class="m-box-title ellipsis">
                                    {{$item->title}}
                                </h4>
                                <div class="m-box-sub-title">
                                    Rating 10 <span class="pipe">|</span> 85 mins <span class="pipe">|</span>
                                    2022 <span class="pipe">|</span> all age
                                </div>
                                <div class="m-box-desc">
                                    {!! str_limit($item->detail,'150') !!}
                                </div>
                            </a>
                        </div>
                        <div class="action-btn-wrap">
                            <span class="play-button-wrap">
                            <a class="iframe btn btn-primary cboxElement" href="{{url('account/blog/',$item->slug)}}">{{__('staticwords.readmore')}}</a>
                            </span>
                        </div>
                    </div>
                    @if(isset($protip) && $protip == 1)
                    <div id="prime-next-item-description-block{{$item->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{$item->title}}</h5>
                            <ul class="description-list">
                            </ul>
                            <div class="main-des">
                                <p>{!! str_limit($item->detail,'150') !!}</p>
                                <a href="{{url('account/blog/',$item->slug)}}">{{__('staticwords.readmore')}}</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection