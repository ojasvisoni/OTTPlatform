@extends('layouts.admin')
@section('title', __('adminstaticwords.Settings'))

@section('content')
<div class="admin-form-main-block mrg-t-40">
  <!-- Tab buttons for site settings -->
  <div class="tabsetting">
    <a href="#" style="color: #7f8c8d;" ><button class="tablinks active">{{__('adminstaticwords.GenralSetting')}}</button></a>

    <a href="{{url('admin/seo')}}" style="color: #7f8c8d;" ><button class="tablinks">{{__('adminstaticwords.SEOSetting')}}</button></a>

    <a href="{{url('admin/api-settings')}}" style="color: #7f8c8d;"><button class="tablinks">{{__('adminstaticwords.APISetting')}}</button></a>
    <a href="{{url('admin/mail-setting')}}" style="color: #7f8c8d;"><button class="tablinks">{{__('adminstaticwords.MailSettings')}}</button></a>
   

  </div>

  <!-- update general settings -->
  
  @if ($config)
  {!! Form::model($config, ['method' => 'PATCH', 'action' => ['ConfigController@update', $config->id], 'files' => true]) !!}
  <div class="row admin-form-block z-depth-1">
    <div class="row">
      <h6 class="form-block-heading apipadding">{{__('General Site Setting')}}</h6>
    <br>
    </div>
     

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          {!! Form::label('title', __('adminstaticwords.ProjectTitle')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourProjectTitle')}}"></i>
          {!! Form::text('title', null, ['id' => 'pr', 'onkeyup' => 'sync()', 'class' => 'form-control']) !!}
          <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-7">
          <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('logo', __('adminstaticwords.ProjectLogo')) !!} - <p class="inline info">{{__('adminstaticwords.Size')}}: 200x63</p>
            <div class="input-group">
              <input type="text" class="form-control" id="logo" name="logo">
              <span class="input-group-addon midia-toggle" data-input="logo">{{__('adminstaticwords.ChooseAFile')}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="image-block">
            <img src="{{asset('images/logo/' . $config->logo)}}" class="img-responsive" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('APP_URL') ? ' has-error' : '' }}">
          {!! Form::label('APP_URL', __('adminstaticwords.WebsiteURL')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourWebsiteUrl')}}"></i>
          <input type="text" name="APP_URL" value="{{ $env_files['APP_URL'] }}" class="form-control"/>
          <small class="text-danger">{{ $errors->first('w_name') }}</small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-7">
          <div class="form-group{{ $errors->has('favicon') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('favicon',__('adminstaticwords.ProjectFaviconIcon')) !!} - <p class="inline info"></p>
            
            <div class="input-group">
              <input type="text" class="form-control" id="favicon" name="favicon">
              <span class="input-group-addon midia-toggle-favicon" data-input="favicon">{{__('adminstaticwords.ChooseAFile')}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="image-block">
            <img src="{{asset('images/favicon/' . $config->favicon)}}" class="img-responsive" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('w_email') ? ' has-error' : '' }}">
          {!! Form::label('w_email', __('adminstaticwords.DefaultEmail')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourDefaultEmail')}}"></i>
          {!! Form::email('w_email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
          <small class="text-danger">{{ $errors->first('w_email') }}</small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-7">
          <div class="form-group{{ $errors->has('livetvicon') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('livetvicon', __('adminstaticwords.ProjectLiveTvIcon')) !!} - <p class="inline info"></p>
            <div class="input-group">
              <input type="text" class="form-control" id="livetvicon" name="livetvicon" >
              <span class="input-group-addon midia-toggle-livetv" data-input="livetvicon">{{__('adminstaticwords.ChooseAFile')}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="image-block">
            <img src="{{asset('images/livetvicon/' . $config->livetvicon)}}" class="img-responsive" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('currency_code') ? ' has-error' : '' }}">
          {!! Form::label('currency_code', __('adminstaticwords.CurrencyCode')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourCurrenyCode')}} eg:USD"></i>
          {!! Form::text('currency_code', null, ['class' => 'form-control']) !!}
          <small class="text-danger">{{ $errors->first('currency_code') }}</small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-7">
          <div class="form-group{{ $errors->has('preloader_img') ? ' has-error' : '' }} input-file-block">
            {!! Form::label('preloader_img',__('Project Proloader Icon')) !!} - <p class="inline info"></p>
          
            <div class="input-group">
              <input type="text" class="form-control" id="preloder" name="preloader_img">
              <span class="input-group-addon midia-toggle-preloder" data-input="preloder">{{__('adminstaticwords.ChooseAFile')}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="image-block">
            <img src="{{url('images/' . $config->preloader_img)}}" class="img-responsive" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('currency_symbol') ? ' has-error' : '' }} currency-symbol-block">
          {!! Form::label('currency_symbol', __('adminstaticwords.CurrencySymbol')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseSelectYourCurrencySymbol')}}"></i>
          <div class="input-group">
            {!! Form::text('currency_symbol', null, ['class' => 'form-control currency-icon-picker']) !!}
            <span class="input-group-addon simple-input"><i class="glyphicon glyphicon-user"></i></span>
          </div>
          <small class="text-danger">{{ $errors->first('currency_symbol') }}</small>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('invoice_add') ? ' has-error' : '' }}">
          {!! Form::label('invoice_add', __('adminstaticwords.InvoiceAddress')) !!}
          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourInvoiceAddress')}}"></i>
          {!! Form::text('invoice_add', null, ['class' => 'form-control']) !!}
         
          <small class="text-danger">{{ $errors->first('invoice_add') }}</small>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="bootstrap-checkbox form-group{{ $errors->has('is_appstore') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.AppStoreDownload')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('is_appstore', 1, ($config->is_appstore == '1' ? 1 : 0), ['class' => 'bootswitch appstore', 'onChange' =>'isappstore()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div id="appstore_link" style="{{ $config->is_appstore=='1' ? "" : "display: none" }}" class="bootstrap-checkbox form-group{{ $errors->has('appstore') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-4">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.AppStoreLink')}}</h5>
            </div>
            <div class="col-md-8">
              {!! Form::text('appstore', null, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('appstore') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="bootstrap-checkbox form-group{{ $errors->has('is_playstore') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.PlayStoreDownload')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('is_playstore', 1, ($config->is_playstore == '1' ? 1 : 0), ['class' => 'bootswitch playstore', 'onChange' =>'isplaystore()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div id="playstore_link" style="{{ $config->is_playstore=='1' ? "" : "display: none" }}"class="bootstrap-checkbox form-group{{ $errors->has('playstore') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-4">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.PlayStoreLink')}}</h5>
            </div>
            <div class="col-md-8">
             
              {!! Form::text('playstore', null, ['class' => 'form-control']) !!}
  
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('playstore') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="bootstrap-checkbox form-group{{ $errors->has('ip_block') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.IPBlock')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('ip_block', 1, ($button->ip_block == '1' ? 1 : 0), ['class' => 'bootswitch ip_block', 'onChange' =>'isipblock()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('ip_block') }}</small>
          </div>
        </div>
  
        <div id="ip_block_link" style="{{ $button->ip_block=='1' ? "" : "display: none" }}"class="bootstrap-checkbox form-group{{ $errors->has('ipblock_ip') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.BlockedIps')}} </h5>
            </div>
            <div class="col-md-6 pad-0">
              <div class="input-group" style="width:100% !important;">
              <select class="form-control select2" name="block_ips[]" multiple="multiple">
                @if(isset($button->block_ips))
                  @foreach($button->block_ips as $block_ip)
                  <option value="{{$block_ip}}" @if(isset($block_ip))selected="" @endif>{{$block_ip}}</option>
                  @endforeach
                @endif
                </select>
              </div>
  
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('block_ips') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bootstrap-checkbox form-group{{ $errors->has('comming_soon') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.ComingSoon')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('comming_soon', 1, ($button->comming_soon == '1' ? 1 : 0), ['class' => 'bootswitch comming_soon', 'onChange' =>'iscommingsoon()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>

        <div id="comming_soon_link" style="{{ $button->comming_soon=='1' ? "" : "display: none" }}"class="bootstrap-checkbox form-group{{ $errors->has('commingsoon_enabled_ip') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.ComingSoonEnabledIps')}} </h5>
            </div>
            <div class="col-md-6">
              <div class="input-group" style="width:100% !important;">
                <select class="form-control select2" name="commingsoon_enabled_ip[]" multiple="multiple">
                  @if(isset($button->commingsoon_enabled_ip) &&  $button->commingsoon_enabled_ip != NULL)
                  @foreach($button->commingsoon_enabled_ip as $enable_ip)
                  <option value="{{$enable_ip}}" @if(isset($enable_ip))selected="" @endif>{{$enable_ip}}</option>
                  @endforeach
                  @endif
                </select>

              </div>

            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('commingsoon_enabled_ip') }}</small>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.ComingSoonText')}} </h5>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input class ="form-control" type="text" name="comming_soon_text" value="">

              </div>

            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('comming_soon_text') }}</small>
          </div>
        </div>
      </div>
    </div>
 
    <!--  Miscellaneous Settings --->
    <div class="row">
      <h6 class="form-block-heading apipadding">{{__(' Miscellaneous Setting')}}</h6><br>
    </div>
    
    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('goto') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.GoToTop')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('goto', 1, ($button->goto == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('goto') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('wel_eml') ? ' has-error' : '' }}">
          @if(env('MAIL_DRIVER') != NULL && env('MAIL_HOST') != NULL && env('MAIL_PORT'))
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.WelcomeEmailForUser')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                <input type="checkbox" name="wel_eml" {{ $config->wel_eml == 1 ? "checked" : "" }} class='bootswitch' data-on-text= "{{__('adminstaticwords.Enable')}}" data-off-text= "{{__('adminstaticwords.Disable')}}" data-size="small">
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('verify_email') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.VerifyEmailForUser')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                <input type="checkbox" name="verify_email" {{ $config->verify_email == 1 ? "checked" : "" }} class='bootswitch' data-on-text= "{{__('adminstaticwords.Enable')}}" data-off-text= "{{__('adminstaticwords.Disable')}}" data-size="small">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small>({{__('adminstaticwords.VerifyEmailForNote')}})</small>
            <small class="text-danger">{{ $errors->first('color') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('prime_genre_slider') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.GenreSliderType')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('prime_genre_slider', 1, ($config->prime_genre_slider == '1' ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.Layout1'), "data-off-text"=>__('adminstaticwords.Layout2'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('prime_genre_slider') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('prime_movie_single') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.MovieSingleType')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('prime_movie_single', 1, ($config->prime_movie_single == '1' ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.Layout1'), "data-off-text"=>__('adminstaticwords.Layout2'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('prime_movie_single') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('prime_footer') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.FooterType')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('prime_footer', 1, ($config->prime_footer == '1' ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.Layout1'), "data-off-text"=>__('adminstaticwords.Layout2'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('prime_footer') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('two_factor') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.TwoFactor')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('two_factor', null, ($button->two_factor == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('two_factor') }}</small>
          </div>
        </div>


      </div>

      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('blog') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.Blog')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('blog', null, ($config->blog == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('blog') }}</small>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('age_restriction') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.AgeRestriction')}}</h5>
              <small>({{__('adminstaticwords.AgeRestrictionNote')}})</small>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('age_restriction', 1, ($config->age_restriction == '1' ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('user_rating') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.UserRating')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('user_rating', 1, ($config->user_rating == '1' ? 1 : 0), ['class' => 'bootswitch ', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('protip') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.Protip')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('protip', 1, ($button->protip == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('protip') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('download') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.DownloadVideo')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('download', 1, ($config->download == '1' ? 1 : 0), ['class' => 'bootswitch download', 'onChange' =>'isfree()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <small>({{__('adminstaticwords.UploadNote')}})</small>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('multiplescreen') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.MultipleScreen')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('multiplescreen', 1, ($button->multiplescreen == '1' ? 1 : 0), ['class' => 'bootswitch download', 'onChange' =>'isfree()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('aws') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.AWS')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('aws', null, ($config->aws == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('aws') }}</small>
          </div>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('remove_thumbnail') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('Remove Thumbnail on Detail page')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('remove_thumbnail', null, ($button->remove_thumbnail == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('remove_thumbnail') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('remove_subscription') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.RemoveSubscriptionOnLandingPage')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('remove_subscription', 1, ($button->remove_subscription == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('remove_subscription') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('remove_landing_page') ? ' has-error' : '' }}">
          @php
          $mymenu=App\Menu::first();
          @endphp
          @if(isset($mymenu))
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.RemoveLandingPage')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('remove_landing_page', 1, ($config->remove_landing_page == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.Yes'), "data-off-text"=>__('adminstaticwords.No'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          @else
          <div class="row">
            <small>({{__('adminstaticwords.RemoveLandingPageNote')}})</small>
          </div>
          @endif
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('remove_landing_page') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('countviews') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.CountViewsOn')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('countviews', 1, ($button->countviews == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.OnPlayer'), "data-off-text"=>__('adminstaticwords.OnShowPage'), "data-size"=>"small"]) !!}
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('countviews') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('remove_ads') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('Remove Ads')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('remove_ads', 1, ($button->remove_ads == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('remove_ads') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('preloader') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.Preloader')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('preloader', 1, ($config->preloader == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('preloader') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('inspect') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.InspectDisable')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('inspect', 1, ($button->inspect == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>"On", "data-off-text"=>"OFF", "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('inspect') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('is_toprated') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('Toprated Section')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('is_toprated', 1, ($button->is_toprated == '1' ? 1 : 0), ['class' => 'bootswitch is_toprated', 'onChange' =>'isToprated()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="toprated_box"  style="{{ $button->is_toprated =='1' ? "" : "display: none" }}" class="bootstrap-checkbox form-group{{ $errors->has('toprated_count') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('TopRated Count')}}</h5>
            </div>
            <div class="col-md-6 pad-0">
                {!! Form::text('toprated_count', isset($button->toprated_count) ? $button->toprated_count : NULL , ['class' => 'form-control']) !!}
              
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('toprated_count') }}</small>
          </div>
        </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('reminder_mail') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('Reminder Mail')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('reminder_mail', null, ($button->reminder_mail == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('reminder_mail') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('catlog') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.CatlogView')}}</h5>
              <small>({{__('adminstaticwords.CatlogViewNote')}})</small>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('catlog', 1, ($config->catlog == 1 ? 1 : 0), ['class' => 'bootswitch checkk', 'onChange' =>'withoutlogin()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('catlog') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="withoutlogin" style="{{ $config->catlog=='1' ? "" : "display: none" }}" class="bootstrap-checkbox form-group{{ $errors->has('withlogin') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.WithoutLogin')}}</h5>
                <small>({{__('adminstaticwords.WithoutLoginNote')}})</small>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('withlogin', 1, ($config->withlogin == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('withlogin') }}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('uc_browser') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.UCBrowserBlock')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('uc_browser', 1, ($button->uc_browser == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('uc_browser') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('free_sub') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.FreeTrial')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('free_sub', 1, ($config->free_sub == '1' ? 1 : 0), ['class' => 'bootswitch free_sub', 'onChange' =>'isfree()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="free_days" style="{{ $config->free_sub=='1' ? "" : "display: none" }}"class="bootstrap-checkbox  free_days form-group{{ $errors->has('free_days') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.EnterDays')}}</h5>
            </div>
            <div class="col-md-6 pad-0">
                {!! Form::text('free_days', null, ['class' => 'form-control']) !!}
  
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('free_days') }}</small>
          </div>
        </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('APP_DEBUG') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.DebugMode')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                <input type="checkbox" {{env('APP_DEBUG') == true ? "checked" : ""}} name="APP_DEBUG" class="bootswitch" data-on-text="{{__('adminstaticwords.True')}}" data-off-text="{{__('adminstaticwords.False')}}" data-size="small">
                
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('APP_DEBUG') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.VideoComments')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('comments', 1, ($config->comments == '1' ? 1 : 0), ['class' => 'bootswitch iscomment', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small",'onChange' =>'isComment()']) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox comment_box form-group{{ $errors->has('comments_approval') ? ' has-error' : '' }}" style="{{$config->comments == '1' ? '' : 'display: none'}}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.CommentApproval')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('comments_approval', 1, ($config->comments_approval == '1' ? 1 : 0), ['class' => 'bootswitch ', "data-on-text"=>__('adminstaticwords.Manual'), "data-off-text"=>__('adminstaticwords.Auto'), "data-size"=>"small" ]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('rightclick') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.RightclickDisable')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('rightclick', 1, ($button->rightclick == 1 ? 1 : 0), ['class' => 'bootswitch', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.OFF'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('rightclick') }}</small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bootstrap-checkbox form-group{{ $errors->has('donation') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-7">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.DonationLink')}}</h5>
            </div>
            <div class="col-md-5 pad-0">
              <div class="make-switch">
                {!! Form::checkbox('donation', 1, ($config->donation == '1' ? 1 : 0), ['class' => 'bootswitch donate', 'onChange' =>'isdonation()', "data-on-text"=>__('adminstaticwords.On'), "data-off-text"=>__('adminstaticwords.Off'), "data-size"=>"small"]) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="donation_link"  style="{{ $config->donation=='1' ? "" : "display: none" }}" class="bootstrap-checkbox form-group{{ $errors->has('donation_link') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-6">
              <h5 class="bootstrap-switch-label">{{__('adminstaticwords.DonationLink')}}</h5>
              <small>({{__('adminstaticwords.RegisterOn')}} <a href="https://www.paypal.me">Paypal.me</a>)</small>
            </div>
            <div class="col-md-6 pad-0">
              {!! Form::text('donation_link', null, ['class' => 'form-control']) !!}
  
             
            </div>
          </div>
          <div class="col-md-12">
            <small class="text-danger">{{ $errors->first('withlogin') }}</small>
          </div>
        </div>
      </div>
    </div>

   

    <div class="btn-group col-xs-12">
      <button type="submit" class="btn btn-block btn-success">{{__('adminstaticwords.SaveSettings')}}</button>
    </div>
    <div class="clear-both"></div>
  
{!! Form::close() !!}
@endif
</div>
</div>
@endsection
@section('custom-script')
<script type="text/javascript">
  function sync()
  {
    var n1 = document.getElementById('pr');
    var n2 = document.getElementById('pr2');
    n2.value = n1.value;
  }


</script>


<script type="text/javascript">
  function withoutlogin()
  {
    if($('.checkk').is(":checked"))   
      $("#withoutlogin").show();
    else
      $("#withoutlogin").hide();
  }

</script>
<script type="text/javascript">
  function isdonation()
  {
    if($('.donate').is(":checked"))   
      $("#donation_link").show();
    else
      $("#donation_link").hide();
  }

</script>
<script type="text/javascript">
  function isplaystore()
  {
    if($('.playstore').is(":checked"))   
      $("#playstore_link").show();
    else
      $("#playstore_link").hide();
  }

</script>
<script type="text/javascript">
  function isappstore()
  {
    if($('.appstore').is(":checked"))   
      $("#appstore_link").show();
    else
      $("#appstore_link").hide();
  }

</script>
<script type="text/javascript">
  function isfree()
  {
    if($('.free_sub').is(":checked"))   
      $("#free_days").show();
    else
      $("#free_days").hide();
  }

</script>

<!---------- comming soon --------->
<script type="text/javascript">
  function iscommingsoon()
  {
    if($('.comming_soon').is(":checked"))   
      $("#comming_soon_link").show();
    else
      $("#comming_soon_link").hide();
  }

</script>
<!------------- end comming soon ----->

<!---------- Ip Block --------->
<script type="text/javascript">
  function isipblock()
  {
    if($('.ip_block').is(":checked"))   
      $("#ip_block_link").show();
    else
      $("#ip_block_link").hide();
  }

</script>
<!------------- end ip_block ----->

<!---------- maintenance --------->
<script type="text/javascript">
  function ismaintenance()
  {
    if($('.maintenance').is(":checked"))   
      $("#maintenance_link").show();
    else
      $("#maintenance_link").hide();
  }

</script>
<!------------- end maintenance ----->

<!---------- comment --------->
<script type="text/javascript">
  function isComment()
  {
    if($('.iscomment').is(":checked"))   
      $(".comment_box").show();
    else
      $(".comment_box").hide();
  }

</script>
<!------------- end comment ----->

<script type="text/javascript">
  function isToprated()
  {
    if($('.is_toprated').is(":checked")) 
      $("#toprated_box").show();
    else
      $("#toprated_box").hide();
  }

</script>

<script>
  $(".midia-toggle").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
    directory_name: 'logo',
	});
  $(".midia-toggle-favicon").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
    directory_name: 'favicon'
	});
  $(".midia-toggle-livetv").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
    directory_name: 'livetvicon'
	});
  $(".midia-toggle-preloder").midia({
		base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        },
    directory_name: 'preloader'
	});
</script>
@endsection
