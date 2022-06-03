<!DOCTYPE html>
<html lang="en" @if(selected_lang()->rtl == 1) dir="rtl" @endif>
<head>
    <title>{{$w_title}}</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="Description" content="{{$description}}" />
    <meta name="keyword" content="{{$w_title}}, {{$keyword}}">
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/icon" href="{{asset('images/favicon/favicon.png')}}">
    <!-- favicon-icon -->
    <!-- theme style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- google font -->
    <link rel="stylesheet" href="{{url('css/custom_prt.css')}}">
    @if(selected_lang()->rtl == 0)
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap css -->
    @else
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap css -->
    <link href="{{url('css/bootstrap.rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap rtl css -->
    @endif
    <link href="https://vjs.zencdn.net/6.6.0/video-js.css" rel="stylesheet">
    <!-- videojs css -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- fontawsome css -->
    @php
    if(Schema::hasTable('color_schemes')){
    $color = App\ColorScheme::first();
    }
    @endphp
    @if(isset($color))
    @if($color->color_scheme == 'dark')
    <style type="text/css">
        :root {
        --body_bg_color: #111;
        --btn-prime_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --footer_bg_color: {{$color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color }};
        --background_black_bg_color: #111;
        --background_white_bg_color: #FFF;
        --background_dark-black_bg_color: #000;
        --back2top_bg_color: #DDD;
        --bg-success_bg_color: #198754;
        --blue_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --light-blue_bg_color: #90DFFE;
        --watchhistory_remove_bg_color: #D9534F;
        --btn-default_bg_color: #515151;
        --blue_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --light-grey_border_color: #B1B1B1;
        --btn-prime_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --see-more_border_color: #B1B1B1;
        --btn-default_border_color: #515151;
        --text_blue_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --text_black_color: #111;
        --text_light_grey_color: #B1B1B1;
        --text_light_blue_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
        --text_grey_color: #949494;
        --text_white_color: #FFF;
        /*add more */
        --navigation_bg_color: {{$color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color}};
        --back2top_bg_color_on_hover:  {{$color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover}};
        --back2top_color_on_hover: {{$color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover}};
        }
    </style>
    @else
    <style type="text/css">
        :root {
        --body_bg_color: #111;
        --btn-prime_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --footer_bg_color: {{$color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color }};
        --background_black_bg_color: #111;
        --background_white_bg_color: #FFF;
        --background_dark-black_bg_color: #000;
        --back2top_bg_color: #DDD;
        --bg-success_bg_color: #198754;
        --blue_bg_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --light-blue_bg_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
        --watchhistory_remove_bg_color: #D9534F;
        --btn-default_bg_color: #515151;
        --blue_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --light-grey_border_color: #B1B1B1;
        --btn-prime_border_color: {{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --see-more_border_color: #B1B1B1;
        --btn-default_border_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
        --text_blue_color:{{$color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color}};
        --text_black_color: #111;
        --text_light_grey_color: #B1B1B1;
        --text_light_blue_color: {{$color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color}};
        --text_grey_color: #949494;
        --text_white_color: #FFF;
        --white: #FFF;
        --navigation_bg_color: {{$color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color}};
        --back2top_bg_color_on_hover:  {{$color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover}};
        --back2top_color_on_hover: {{$color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover}};
        }
    </style>
    @endif
    @if($color->color_scheme == 'light')
    @if(selected_lang()->rtl == 0)
    <link href="{{url('css/style-light.css')}}" rel="stylesheet" type="text/css"/>
    @else
    <link href="{{url('css/style-light-rtl.css')}}" rel="stylesheet" type="text/css"/>
    @endif
    @else
    @if(selected_lang()->rtl == 0)
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css"/>
    @else
    <link href="{{url('css/style-rtl.css')}}" rel="stylesheet" type="text/css"/>
    @endif
    @endif
    @endif
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="login-body" style="background: url({{url('images/cus-img/sign-in-bg1.jpg')}}) !important; background-size: contain !important; background-position: center !important;">
    <div class="signup__container container sign-in-main-block">
        <div class="sing_page">
            <div class="row">
                
                <div class="col-sm-8">
                    <div class="container__child signup__thumbnail">
                        <div class="thumbnail__logo">
                            @if($logo != null)
                            <!--                        <a href="{{url('/')}}" title="{{$w_title}}"><img src="{{asset('images/logo/'.$logo)}}" class="img-responsive" alt="{{$w_title}}"></a>-->
                            <a href="{{url('/')}}" title="{{$w_title}}"><img src="{{asset('images/logo/logo.png')}}" class="img-responsive" alt="{{$w_title}}"></a>
                            @endif
                        </div>
                        <div class="thumbnail__content">
                            <h1>Join OOV- the Largest Internet TV Provider in India for Hindi and Bhojpuri.</h1>
                            <div class="login_p">
                                <p>OOV Media merges the power of technology and convenience of internet to bring the best of entertainment to your mobile, laptop and PC. Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows &amp; Web Series across multiple languages- English, Filipino, Hindi, Punjabi and Bhojpuri.</p>
                            </div>
                            <h2>Watch from our unified OTT catalog of 2000+ Movies, 50+ Live TV Channels and 200+ TV Shows & Web Series. </h2>
                        </div>
                        <!--          <div class="signup__overlay"></div>-->
                        <div class="social_icons">
                            <div class="footer-widgets social-widgets social-btns">
                              <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>          
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>          
                                <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="signup-thumbnail">
                        @if($logo != null)
                        <a href="{{url('/')}}" title="{{$w_title}}"><img src="{{asset('images/logo/'.$logo)}}" class="img-responsive" alt="{{$w_title}}"></a>
                        @endif  
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="container__child signup__form">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::has('deleted'))
                        <div class="alert alert-danger">
                            {{Session::get('deleted')}}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">{{__('staticwords.email')}}</label>
                                <input id="email" type="text" class="form-control" name="email" placeholder="{{__('staticwords.enteryouremail')}}" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">{{__('staticwords.password')}}</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="{{__('staticwords.enteryourpassword')}}" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="remember form-group{{ $errors->has('remember') ? ' has-error' : '' }}">
                                <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{__('staticwords.rememberme')}}</label>
                            </div>
                            <div class="m-t-lg">
                                <input class="btn btn--form btn--form-login" type="submit" value={{__('staticwords.login')}} />
                                <div class="social-login">
                                    @if($configs->fb_login==1)
                                    <a href="{{ url('/auth/facebook') }}" class="btn btn--form btn--form-login fb-btn" title="{{__('staticwords.loginwithfacebook')}}"><i class="fa fa-facebook-f"></i>{{__('staticwords.loginwithfacebook')}}</a>
                                    @endif
                                    @if($configs->google_login==1)
                                    <a href="{{ url('/auth/google') }}" class="btn btn--form btn--form-login gplus-btn" title="{{__('staticwords.loginwithgoogle')}}"><i class="fa fa-google"></i> {{__('staticwords.loginwithgoogle')}}</a>
                                    @endif
                                    @if($configs->amazon_login==1)
                                    <a href="{{ url('/auth/amazon') }}" class="btn btn--form btn--form-login amazon-btn" title="{{__('staticwords.loginwithamazon')}}"><i class="fa fa-amazon"></i> {{__('staticwords.loginwithamazon')}}</a>
                                    @endif
                                    @if($configs->gitlab_login==1)
                                    <a style="background: linear-gradient(270deg, #48367d 0%, #241842 100%);" href="{{ url('/auth/gitlab') }}" class="btn btn--form btn--form-login" title="{{__('staticwords.loginwithgitlab')}}"><i class="fa fa-gitlab"></i> {{__('staticwords.loginwithgitlab')}}</a>
                                    @endif
                                </div>
                                <a class="signup__link pull-left" href="{{ route('password.request') }}">{{__('staticwords.forgotyourpassword')}}</a>
                                <a class="signup__link pull-right" href="{{url('register')}}">{{__('staticwords.registerhere')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> <!-- bootstrap js -->
    <script type="text/javascript" src="{{asset('js/jquery.popover.js')}}"></script> <!-- bootstrap popover js -->
    <script type="text/javascript" src="{{asset('js/jquery.curtail.min.js')}}"></script> <!-- menumaker js -->
    <script type="text/javascript" src="{{asset('js/jquery.scrollSpeed.js')}}"></script> <!-- owl carousel js -->
    <script type="text/javascript" src="{{asset('js/custom-js.js')}}"></script>
</body>
</html>