@if($config->blog == '1')
@if(isset($menu->getblogs) && count($menu->getblogs)>0)
<div class="genre-prime-block blogs-page">
    <div class="container-fluid">
        <h5 class="section-heading">{{__('staticwords.recentlyblog')}}</h5>
        <div class="genre-prime-blog-slider owl-carousel">
            @foreach($menu->getblogs as $blog)
            @if($blog->blogs['is_active'] == 1)
            <div class="genre-prime-blog-slide">
                <div class="genre-slide-blog-image protip blog-image-thumb" data-pt-placement="outside"
                    data-pt-title="#prime-mix-description-block-blog{{$blog->id}}">
                    <a href="{{url('account/blog/'.$blog->blogs['slug'])}}">
                    @if($blog->blogs->image != null)
                    <img data-src="{{ asset('images/blog/'.$blog->blogs['image']) }}" class="img-responsive owl-lazy"
                         alt="blog-image">
                    @else
                    <img data-src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive owl-lazy" alt="blog-image">
                    @endif
                    </a>
                </div>
                <!-- OVERLAY -->
                <div class="hidden-content blog-content">
                    <div class="m-box-details-wrap">
                        <a href="{{url('account/blog/'.$blog->blogs['slug'])}}">
                            <h4 class="m-box-title ellipsis">
                                {{$blog->blogs['title']}}
                            </h4>
<!--                            <div class="m-box-sub-title">
                                 {{date ('d.m.Y',strtotime($blog->blogs['created_at']))}} <span class="pipe">|</span> {{$blog->blogs->users['name']}}
                            </div>-->
                            <div class="m-box-desc">
                                {!! str_limit($blog->blogs->detail, 215) !!}
                            </div>
                        </a>
                    </div>
<!--                    <div class="action-btn-wrap">
                        <span class="play-button-wrap">
                            <a class="iframe btn btn-primary cboxElement" href="{{url('account/blog/'.$blog->blogs['slug'])}}">{{__('staticwords.readmore')}}</a>
                        </span>
                    </div>-->
                </div>
                
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endif
@endif