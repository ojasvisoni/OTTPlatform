
<?php $__env->startSection('title',__('adminstaticwords.CreateMovie')); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-form-main-block">
  <h4 class="admin-form-text">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.view')): ?>
      <a href="<?php echo e(url('admin/movies')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.GoBack')); ?>" class="btn-floating"><i class="material-icons">reply</i></a> 
    <?php endif; ?>
    <?php echo e(__('adminstaticwords.CreateMovie')); ?></h4>
  <div class="row">
    <div class="col-md-8">
      <div class="admin-form-block z-depth-1">


<!--vimeo API Modal -->
<div id="myvimeoModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!--vimeo API Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.SearchFromVimeoAPI')); ?></h5>
      </div>
      <div class="modal-body">
        <?php if(is_null(env('VIMEO_ACCESS'))): ?>
        <p><?php echo e(__('adminstaticwords.MakeSureYouHaveAddedVimeoAPIKeyIn')); ?> <a href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('adminstaticwords.APISettings')); ?></a></p>
        <?php endif; ?>
       
          <div id="vimeo-page-container" style="clear:both;">
                <div class="vimeo-content-alignment">
                    <div id="vimeo-page-content" class="" style="overflow:hidden;">
                        <div class="container-4">
                            <form action="" method="post" name="vimeo-yt-search" id="vimeo-yt-search">
                                <input type="search" name="vimeo-search" id="vimeo-search" placeholder="<?php echo e(__('adminstaticwords.Search')); ?>..." class="ui-autocomplete-input" autocomplete="off">
                                <button class="icon" id="vimeo-searchBtn"></button>
                            </form>
                        </div>
                        <div>
                            <input type="hidden" id="vpageToken" value="">
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" id="vpageTokenPrev" value="" class="btn btn-default"><?php echo e(__('adminstaticwords.Prev')); ?></button>
                              <button type="button" id="vpageTokenNext" value="" class="btn btn-default"><?php echo e(__('adminstaticwords.Next')); ?></button>
                            </div>
                        </div>
                        <div id="vimeo-watch-content" class="vimeo-watch-main-col vimeo-card vimeo-card-has-padding">
                            <ul id="vimeo-watch-related" class="vimeo-video-list">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('adminstaticwords.Close')); ?></button>
      </div>
    </div>

  </div>
</div>

<!--youtube API Modal -->
<div id="myyoutubeModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!--youtube API Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.SearchFromYoutubeAPI')); ?></h5>
      </div>
      <div class="modal-body">
        <?php if(is_null(env('YOUTUBE_API_KEY'))): ?>
        <p><?php echo e(__('adminstaticwords.MakeSureYouHaveAddedYoutubeAPIKeyIn')); ?> <a href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('adminstaticwords.APISettings')); ?></a></p>
        <?php endif; ?>
       
          <div id="hyv-page-container" style="clear:both;">
                <div class="hyv-content-alignment">
                    <div id="hyv-page-content" class="" style="overflow:hidden;">
                        <div class="container-4">
                            <form action="" method="post" name="hyv-yt-search" id="hyv-yt-search">
                                <input type="search" name="hyv-search" id="hyv-search" placeholder="<?php echo e(__('adminstaticwords.Search')); ?>..." class="ui-autocomplete-input" autocomplete="off">
                                <button class="icon" id="hyv-searchBtn"></button>
                            </form>
                        </div>
                        <div>
                            <input type="hidden" id="pageToken" value="">
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" id="pageTokenPrev" value="" class="btn btn-default"><?php echo e(__('adminstaticwords.Prev')); ?></button>
                              <button type="button" id="pageTokenNext" value="" class="btn btn-default"><?php echo e(__('adminstaticwords.Next')); ?></button>
                            </div>
                        </div>
                        <div id="hyv-watch-content" class="hyv-watch-main-col hyv-card hyv-card-has-padding">
                            <ul id="hyv-watch-related" class="hyv-video-list">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('adminstaticwords.Close')); ?></button>
      </div>
    </div>

  </div>
</div>

        <?php echo Form::open(['method' => 'POST', 'action' => 'MovieController@store', 'files' => true]); ?>

        
        <label for=""><?php echo e(__('adminstaticwords.SearchMovieByTitle')); ?> :</label>
        <br>
        <label class="switch">
         <input type="checkbox" name="movie_by_id" checked="" class="checkbox-switch" id="movi_id">
         <span class="slider round"></span>

       </label>

      <div id="movie_title" class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
        <?php echo Form::label('title', __('adminstaticwords.MovieTitle')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.EnterMovieTitle')); ?> Eg:Avatar"></i>
        <?php echo Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => __('adminstaticwords.PleaseEnterMovieTitle')]); ?>

        <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
      </div>


      <div id="movie_id" style="display: none;" class="form-group<?php echo e($errors->has('title2') ? ' has-error' : ''); ?>">
        <?php echo Form::label('title',__('adminstaticwords.MovieID')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterMovieID')); ?> (TMDB ID)"></i>
        <?php echo Form::text('title2', old('title2'), ['class' => 'form-control', 'placeholder' =>__('adminstaticwords.PleaseEnterMovieID')]); ?>

        <small class="text-danger"><?php echo e($errors->first('title2')); ?></small>
      </div>

      <div id="movie_slug" class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
        <?php echo Form::label('slug', __('adminstaticwords.MovieSlug')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.EnterMovieSlug')); ?> Eg:Avatar"></i>
        <?php echo Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' =>__('adminstaticwords.EnterMovieSlug')]); ?>

        <small class="text-danger"><?php echo e($errors->first('slug')); ?></small>
      </div>

      
      <div class="form-group<?php echo e($errors->has('is_upcoming') ? ' has-error' : ''); ?>">
        <div class="row">
          <div class="col-xs-6">
            <?php echo Form::label('is_upcoming',__('adminstaticwords.UpcomingMovie')); ?>

          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">
              <input type="checkbox" name="is_upcoming" class="checkbox-switch" id="is_upcoming">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <small class="text-danger"><?php echo e($errors->first('is_upcoming')); ?></small>
        </div>
      </div>

      <div id="upcoming_box" style="display:none" class="form-group<?php echo e($errors->has('upcoming_date') ? ' has-error' : ''); ?>">
        <?php echo Form::label('upcoming_date', __('Upcoming Date')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Upcoming Date')); ?>"></i>
       <?php echo Form::date('upcoming_date', null, ['class' => 'form-control']); ?>

        <small class="text-danger"><?php echo e($errors->first('upcoming_date')); ?></small>
      </div>

      <div class="form-group<?php echo e($errors->has('is_custom_label') ? ' has-error' : ''); ?>">
        <div class="row">
          <div class="col-xs-6">
            <?php echo Form::label('is_custom_label',__('Allow Custom Label ?')); ?>

          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">
              <input type="checkbox" name="is_custom_label" class="checkbox-switch" id="is_custom_label">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <small class="text-danger"><?php echo e($errors->first('is_custom_label')); ?></small>
        </div>
      </div>

      <div id="label_box" style="display:none" class="form-group<?php echo e($errors->has('label_id') ? ' has-error' : ''); ?>">
        <?php echo Form::label('label_id', __('Custom Label')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('select custom label')); ?>"></i>
       <select name="label_id" id="" class="select2 form-control">
        <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <option value="<?php echo e($label->id); ?>"><?php echo e($label->name); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
        <small class="text-danger"><?php echo e($errors->first('label_id')); ?></small>
      </div>


      
      <div class="form-group<?php echo e($errors->has('selecturl') ? ' has-error' : ''); ?> video_url">
        <?php echo Form::label('selecturls',__('adminstaticwords.AddVideo')); ?>

        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectOneOfTheOptionsToAddVideo')); ?>"></i>
        <?php echo Form::select('selecturl', array('iframeurl' =>__('adminstaticwords.IFrameURLEmbedURL'),
         'youtubeapi' =>__('adminstaticwords.YouTubeApi'), 'vimeoapi' => __('adminstaticwords.VimeoApi'),
         'customurl' => __('adminstaticwords.CustomURLYoutubeURLVimeoURL'),'uploadvideo'=>__('adminstaticwords.UploadVideo'),'multiqcustom' => __('adminstaticwords.MultiQualityCustomURLAndURLUpload')), null, ['class' => 'form-control select2','id'=>'selecturl']); ?>

         <small class="text-danger"><?php echo e($errors->first('selecturl')); ?></small>
      </div>


      <div id="ifbox" style="display: none;" class="form-group">
        <label for="iframeurl"><?php echo e(__('adminstaticwords.IframeURLAndEmbedURL')); ?>: </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
        <input  type="text" class="form-control" name="iframeurl" placeholder="">
      </div>

      <div style="display: none;" id="custom_url">
        <p style="color: red" class="inline info"><?php echo e(__('adminstaticwords.UploadVideosNotSupport')); ?> !</p>
          <br>
          <p class="inline info"><?php echo e(__('adminstaticwords.OpenloadGoogleDriveAndOtherURLAddHere')); ?>!</p>
          <br><br>
          <div class="row">
            <div class="col-md-7">
               <div class="form-group<?php echo e($errors->has('url_360') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('url_360', __('adminstaticwords.VideoUrlFor360Quality')); ?>

                  <p class="inline info"> - <?php echo e(__('adminstaticwords.PleaseEnterYourVideoUrl')); ?></p>
                  <?php echo Form::text('url_360', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('url_360')); ?></small>
               </div>
            </div>
            <div class="col-md-5">
              <?php echo Form::label('upload_video', __('adminstaticwords.UploadVideoIn360p')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.ChooseAVideo')); ?></p>
             
              <div class="input-group">
                <input type="text" class="form-control" id="upload_video_360" name="upload_video_360" >
                <span class="input-group-addon midia-toggle-upload_video_360" data-input="upload_video_360"><?php echo e(__('Choose A Video')); ?></span>
              </div>
              <small class="text-danger"><?php echo e($errors->first('upload_video')); ?></small>
            </div>
          </div>
          <div class="form-group<?php echo e($errors->has('url_480') ? ' has-error' : ''); ?>">
            <div class="row">
              <div class="col-md-7">
                <?php echo Form::label('url_480', __('adminstaticwords.VideoUrlFor480Quality')); ?>

                <p class="inline info"> - <?php echo e(__('adminstaticwords.PleaseEnterYourVideoUrl')); ?></p>
                <?php echo Form::text('url_480', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('url_480')); ?></small>
              </div>
              <div class="col-md-5">
                 
                <?php echo Form::label('upload_video', __('adminstaticwords.UploadVideoIn480p')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.ChooseAVideo')); ?></p>
              
                <div class="input-group">
                  <input type="text" class="form-control" id="upload_video_480" name="upload_video_480" >
                  <span class="input-group-addon midia-toggle-upload_video_480" data-input="upload_video_480"><?php echo e(__('Choose A Video')); ?></span>
                </div>
                <small class="text-danger"><?php echo e($errors->first('upload_video_480')); ?></small>
              </div>
            </div>
          </div>
          <div class="form-group<?php echo e($errors->has('url_720') ? ' has-error' : ''); ?>">
            <div class="row">
              <div class="col-md-7">
                <?php echo Form::label('url_720',__('adminstaticwords.VideoUrlFor720Quality')); ?>

                <p class="inline info"> - <?php echo e(__('adminstaticwords.PleaseEnterYourVideoUrl')); ?></p>
                <?php echo Form::text('url_720', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('url_720')); ?></small>
              </div>

              <div class="col-md-5">
                 <?php echo Form::label('upload_video', __('adminstaticwords.UploadVideoIn720p')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.ChooseAVideo')); ?></p>
               
                  <div class="input-group">
                    <input type="text" class="form-control" id="upload_video_720" name="upload_video_720" >
                    <span class="input-group-addon midia-toggle-upload_video_720" data-input="upload_video_720"><?php echo e(__('Choose A Video')); ?></span>
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('upload_video_720')); ?></small>
              </div>
            </div>
          </div>
          <div class="form-group<?php echo e($errors->has('url_1080') ? ' has-error' : ''); ?>">
            <div class="row">
              <div class="col-md-7">
                  <?php echo Form::label('url_1080',__('adminstaticwords.VideoUrlFor1080Quality')); ?>

                  <p class="inline info"> - <?php echo e(__('adminstaticwords.PleaseEnterYourVideoUrl')); ?></p>
                  <?php echo Form::text('url_1080', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('url_1080')); ?></small>
              </div>

              <div class="col-md-5">
                <?php echo Form::label('upload_video', __('adminstaticwords.UploadVideoIn1080p')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.ChooseAVideo')); ?></p>
             
                <div class="input-group">
                  <input type="text" class="form-control" id="upload_video_1080" name="upload_video_1080" >
                  <span class="input-group-addon midia-toggle-upload_video_1080" data-input="upload_video_1080"><?php echo e(__('Choose A Video')); ?></span>
                </div>
                <small class="text-danger"><?php echo e($errors->first('upload_video_1080')); ?></small>
              </div>
            </div>
          </div>
      </div>


      <div class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h6 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticwords.EmbdedURLExamples')); ?>: </h6>
            </div>
            <div class="modal-body">
              <p style="font-size: 15px;"><b><?php echo e(__('adminstaticwords.Youtube')); ?>:</b> <?php echo e(__('adminstaticwords.YoutubeUrlLink')); ?> </p>

              <p style="font-size: 15px;"><b><?php echo e(__('adminstaticwords.GoogleDrive')); ?>:</b> <?php echo e(__('adminstaticwords.GoogleDriveLink')); ?></p>

              <p style="font-size: 15px;"><b><?php echo e(__('adminstaticwords.Openload')); ?>:</b> <?php echo e(__('adminstaticwords.OpenloadLink')); ?> </p>

              <p style="font-size: 15px;"><b><?php echo e(__('adminstaticwords.Note')); ?>:</b> <?php echo e(__('adminstaticwords.DoNotInclude')); ?> &lt;iframe&gt; <?php echo e(__('adminstaticwords.TagBeforeURL')); ?></p>
            </div>
            
          </div>
        </div>
      </div>

      
      <div id="ready_url" style="display: none;" class="form-group<?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?>">
        <label id="ready_url_text"></label>
        <p class="inline info"> - <?php echo e(__('adminstaticwords.PleaseEnterYourVideoUrl')); ?></p>
        
        <button type="button" onclick="encript()" id="encryptlink" class="btn btn-sm btn-info"><?php echo e(__('Encrypt Link')); ?></button>
       
        <?php echo Form::text('ready_url', null, ['class' => 'form-control','id'=>'apiUrl']); ?> 
        
        <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
      </div>

      
      <div id="uploadvideo" style="display: none;" class="form-group<?php echo e($errors->has('upload_video') ? ' has-error' : ''); ?> input-file-block">

          <?php echo Form::label('upload_video', 'Upload Video'); ?> - <p class="inline info">Choose A Video</p>
        
          <div class="input-group">
            <input type="text" class="form-control" id="upload_video" name="upload_video" >
            <span class="input-group-addon midia-toggle-upload_video" data-input="upload_video"><?php echo e(__('Choose A Video')); ?></span>
          </div>
          <small class="text-danger"><?php echo e($errors->first('upload_video')); ?></small>
          <?php
            $config=App\Config::first();
            $aws=$config->aws;
          ?>
          <?php if($aws==1): ?>
              <label for="">Upload To AWS </label>
            <br>
            <label class="switch">
            <input type="checkbox" name="upload_aws" class="checkbox-switch" id="upload_aws">
            <span class="slider round"></span>
          
          </label>
          <?php else: ?>
            <small><?php echo e(__("if you haven't added AWS key. Set in")); ?> <a href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('API setting')); ?></a> <?php echo e(__('To Upload Videos to AWS')); ?></small>
          <?php endif; ?>
        
      </div>
     

     <div class="form-group<?php echo e($errors->has('a_language') ? ' has-error' : ''); ?>">
      <?php echo Form::label('a_language', __('adminstaticwords.AudioLanguages')); ?>

      <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectAudioLanguage')); ?>"></i>
      <div class="input-group">
        <?php echo Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']); ?>

        <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
      </div>
      <small class="text-danger"><?php echo e($errors->first('a_language')); ?></small>
    </div>
    <div class="form-group<?php echo e($errors->has('maturity_rating') ? ' has-error' : ''); ?>">
      <?php echo Form::label('maturity_rating',__('adminstaticwords.MaturityRating')); ?>

      <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectMaturityRating')); ?>"></i>
      <?php echo Form::select('maturity_rating', array('all age' =>__('adminstaticwords.AllAge'), '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']); ?>

      <small class="text-danger"><?php echo e($errors->first('maturity_rating')); ?></small>
    </div>
   
    <div class="form-group">
      <div class="row">
        <div class="col-xs-6">
          <?php echo Form::label('', __('adminstaticwords.ChooseCustomThumbnailAndPoster')); ?>

        </div>
        <div class="col-xs-5 pad-0">
          <label class="switch for-custom-image">
            <?php echo Form::checkbox('', 1, 0, ['class' => 'checkbox-switch']); ?>

            <span class="slider round"></span>
          </label>
        </div>
      </div>
    </div>
    <div class="upload-image-main-block">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('thumbnail') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('thumbnail',__('adminstaticwords.Thumbnail')); ?> - <p class="info"><?php echo e(__('adminstaticwords.HelpBlockText')); ?></p>
            <?php echo Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']); ?>

            <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.Thumbnail')); ?>">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName"><?php echo e(__('adminstaticwords.ChooseAFile')); ?></span>
            </label>
            <p class="info"><?php echo e(__('adminstaticwords.ChooseCustomThumbnail')); ?></p>
            <small class="text-danger"><?php echo e($errors->first('thumbnail')); ?></small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('poster') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('poster',__('adminstaticwords.Poster')); ?> - <p class="info"><?php echo e(__('adminstaticwords.HelpBlockText')); ?></p>
            <?php echo Form::file('poster', ['class' => 'input-file', 'id'=>'poster']); ?>

            <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.Poster')); ?>">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName"><?php echo e(__('adminstaticwords.ChooseAFile')); ?></span>
            </label>
            <p class="info"><?php echo e(__('adminstaticwords.ChooseCustomPoster')); ?></p>
            <small class="text-danger"><?php echo e($errors->first('poster')); ?></small>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group<?php echo e($errors->has('series') ? ' has-error' : ''); ?>">
      <div class="row">
        <div class="col-xs-6">
          <?php echo Form::label('series',__('adminstaticwords.Series')); ?>

        </div>
        <div class="col-xs-5 pad-0">
          <label class="switch">
            <?php echo Form::checkbox('series', 1, 0, ['class' => 'checkbox-switch seriescheck']); ?>

            <span class="slider round"></span>
          </label>
        </div>
      </div>
      <div class="col-xs-12">
        <small class="text-danger"><?php echo e($errors->first('series')); ?></small>
      </div>
    </div>
    <div class="form-group<?php echo e($errors->has('movie_id') ? ' has-error' : ''); ?> movie_id">
      <?php echo Form::label('movie_id', __('adminstaticwords.SelectMovieOfSeries')); ?>

      <?php echo Form::select('movie_id', $movie_list_exc_series, null, ['class' => 'form-control select2 mseries']); ?>

      <small class="text-danger"><?php echo e($errors->first('movie_id')); ?></small>
    </div>
    <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
      <div class="row">
        <div class="col-xs-6">
          <?php echo Form::label('featured', __('adminstaticwords.Featured')); ?>

        </div>
        <div class="col-xs-5 pad-0">
          <label class="switch">
            <?php echo Form::checkbox('featured', 1, 0, ['class' => 'checkbox-switch']); ?>

            <span class="slider round"></span>
          </label>
        </div>
      </div>
      <div class="col-xs-12">
        <small class="text-danger"><?php echo e($errors->first('featured')); ?></small>
      </div>
    </div>

    
       <div class="pad_plus_border">
          <div class="form-group<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
            <div class="row">
              <div class="col-xs-6">
                <?php echo Form::label('subtitle',__('adminstaticwords.Subtitle')); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">
                  <input type="checkbox" class="checkbox-switch" name="subtitle" id="subtitle_check">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
            </div>
          </div>
        </div>
        <div style="display: none;" class="subtitle-box">
         <label><?php echo e(__('adminstaticwords.Subtitle')); ?>:</label>
         <table class="table table-bordered" id="dynamic_field">  
            <tr> 
              <td>
                <div class="form-group<?php echo e($errors->has('sub_t') ? ' has-error' : ''); ?> input-file-block">
                  <input type="file" name="sub_t[]"/>
                  <p class="info"><?php echo e(__('adminstaticwords.ChooseSubtitleFile')); ?> ex. subtitle.srt, or. txt</p>
                  <small class="text-danger"><?php echo e($errors->first('sub_t')); ?></small>
                </div>
              </td>

              <td>
                <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" />
              </td>  
              <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                <i class="fa fa-plus"></i>
              </button></td>  
            </tr>  
          </table>
        </div>
      <div class="form-group<?php echo e($errors->has('is_protect') ? ' has-error' : ''); ?>">
        <div class="row">
          <div class="col-xs-6">
            <?php echo Form::label('is_protect',__('adminstaticwords.ProtectedVideo?')); ?>

          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">
              <input type="checkbox" name="is_protect" class="checkbox-switch" id="is_protect">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <small class="text-danger"><?php echo e($errors->first('is_protect')); ?></small>
        </div>
      </div>
      <div class="search form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> is_protect" style="display: none;">
        <?php echo Form::label('password', __('adminstaticwords.ProtectedPasswordForVideo')); ?>

        <?php echo Form::password('password', null, ['class' => 'form-control','id'=>'password']); ?>

        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
        <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
      </div>


<div class="form-group">
  <label for=""><?php echo e(__('adminstaticwords.MetaKeyword')); ?>: </label>
  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.EnterMetaKeyword')); ?>"></i>
  <input name="keyword" type="text" class="form-control" data-role="tagsinput"/>
</div>

<div class="form-group">
  <label for=""><?php echo e(__('adminstaticwords.MetaDescription')); ?>: </label>
  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.EnterMetaDescription')); ?>"></i>
  <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
</div>

<div class="menu-block">
  <h6 class="menu-block-heading"><?php echo e(__('adminstaticwords.PleaseSelectMenu')); ?></h6>
  <?php if(isset($menus) && count($menus) > 0): ?>
  <ul>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
      <div class="inline">
        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="<?php echo e($menu->id); ?>" id="checkbox<?php echo e($menu->id); ?>">
        <label for="checkbox<?php echo e($menu->id); ?>" class="material-checkbox"></label>
      </div>
      <?php echo e($menu->name); ?>

    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <?php endif; ?>
</div>
<div class="switch-field">
  <div class="switch-title"><?php echo e(__('adminstaticwords.WantIMDBRatingsAndMoreOrCustom')); ?>?</div>
  <input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" checked/>
  <label for="switch_left"><?php echo e(__('adminstaticwords.TMDB')); ?></label>
  <input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" />
  <label for="switch_right"><?php echo e(__('adminstaticwords.Custom')); ?></label>
</div>
<div id="custom_dtl" class="custom-dtl">
  <div class="form-group<?php echo e($errors->has('trailer_url') ? ' has-error' : ''); ?>">
    <?php echo Form::label('trailer_url', __('adminstaticwords.TrailerURL')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterTrailerUrl')); ?>"></i>
    <?php echo Form::text('trailer_url', old('trailer_url'), ['class' => 'form-control', 'placeholder'=>__('adminstaticwords.PleaseEnterTrailerUrl')]); ?>

    <small class="text-danger"><?php echo e($errors->first('trailer_url')); ?></small>
  </div>

  <div class="form-group<?php echo e($errors->has('director_id') ? ' has-error' : ''); ?>">
    <?php echo Form::label('director_id',__('adminstaticwords.Directors')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectDirectors')); ?>"></i>
    <div class="input-group" >
      <div id="ajaxdirector">
      
        <select name="director_id[]" id="" class="form-control directorList select2" multiple="multiple">

        
       </select>
      </div>
      
      <a href="#" data-toggle="modal" data-target="#AddDirectorModal" class="input-group-addon"><i class="material-icons left">add</i></a>
    </div>
    <small class="text-danger"><?php echo e($errors->first('director_id')); ?></small>
  </div>
  
  <div class="form-group<?php echo e($errors->has('actor_id') ? ' has-error' : ''); ?>">
    <?php echo Form::label('actor_id',__('adminstaticwords.Actors')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectActors')); ?>"></i>
    <div class="input-group" >
      <div id="ajaxactor">
      
        <select name="actor_id[]" id="" class="form-control actorList select2" multiple="multiple">
       
       </select>
      </div>
      
      <a href="#" data-toggle="modal" data-target="#AddActorModal" class="input-group-addon"><i class="material-icons left">add</i></a>
    </div>
    <small class="text-danger"><?php echo e($errors->first('actor_id')); ?></small>
  </div>

  <div class="form-group<?php echo e($errors->has('genre_id') ? ' has-error' : ''); ?>">
    <?php echo Form::label('genre_id', __('adminstaticwords.Genre')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseSelectGenres')); ?>"></i>
    <div class="input-group">
      <?php echo Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']); ?>

      <a href="#" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="material-icons left">add</i></a>
    </div>
    <small class="text-danger"><?php echo e($errors->first('genre_id')); ?></small>
  </div>
  <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
    <?php echo Form::label('duration', __('adminstaticwords.Duration')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterMovieDurationIn')); ?> (mins) Eg:160"></i>
    <?php echo Form::text('duration', old('duration'), ['class' => 'form-control', 'placeholder'=>__('adminstaticwords.PleaseEnterDurationInMins')]); ?>

    <small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
  </div>
  <div class="form-group<?php echo e($errors->has('publish_year') ? ' has-error' : ''); ?>">
    <?php echo Form::label('publish_year', __('adminstaticwords.PublishYear')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterPublishYear')); ?> eg:2016"></i>
    <?php echo Form::number('publish_year', old('publish_year'), ['class' => 'form-control', 'min' => '1900']); ?>

    <small class="text-danger"><?php echo e($errors->first('publish_year')); ?></small>
  </div>
  <div class="form-group<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
    <?php echo Form::label('rating', __('adminstaticwords.Ratings')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterRatings')); ?> eg:8"></i>
    <?php echo Form::text('rating',  old('rating'), ['class' => 'form-control', ]); ?>

    <small class="text-danger"><?php echo e($errors->first('rating')); ?></small>
  </div>
  <div class="form-group<?php echo e($errors->has('released') ? ' has-error' : ''); ?>">
    <?php echo Form::label('released', __('adminstaticwords.Released')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterReleaseDate')); ?> eg:26-07-2019"></i>
    <?php echo Form::date('released', old('released'), ['class' => 'form-control']); ?>

    <small class="text-danger"><?php echo e($errors->first('released')); ?></small>
  </div>
  <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
    <?php echo Form::label('detail', __('adminstaticwords.Description')); ?>

    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('adminstaticwords.PleaseEnterMovieDescription')); ?>"></i>
    <?php echo Form::textarea('detail', old('detail'), ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
  </div>
</div>
<div class="btn-group pull-right">
  <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> <?php echo e(__('adminstaticwords.Reset')); ?></button>
  <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> <?php echo e(__('adminstaticwords.Create')); ?></button>
</div>
<div class="clear-both"></div>
<?php echo Form::close(); ?>

</div>
</div>
</div>
</div>
<!-- Add Language Modal -->
<div id="AddLangModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.AddLanguage')); ?></h5>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']); ?>

      <div class="modal-body">
        <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
          <?php echo Form::label('language', __('adminstaticwords.Language')); ?>

          <?php echo Form::text('language', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('language')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-info"><?php echo e(__('adminstaticwords.Reset')); ?></button>
          <button type="submit" class="btn btn-success"><?php echo e(__('adminstaticwords.Create')); ?></button>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Add Director Modal -->
<div id="AddDirectorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.AddDirector')); ?></h5>
      </div>
      <div style="display:none;" class="alert alert-success" id="msg_div">
              <center><span id="res_message"></span></center>
      </div>
      <form method="POST" enctype="multipart/form-data" id="director">
       
      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name', __('adminstaticwords.Name')); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
          <?php echo Form::label('image', __('adminstaticwords.DirectorImage')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.HelpBlockText')); ?></p>
          <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

          <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.DirectorImage')); ?>">
            <i class="icon fa fa-check"></i>
            <span class="js-fileName"><?php echo e(__('adminstaticwords.ChooseAFile')); ?></span>
          </label>
          <p class="info"><?php echo e(__('adminstaticwords.ChooseCustomImage')); ?></p>
          <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> <?php echo e(__('adminstaticwords.Reset')); ?></button>
          <button type="submit" class="btn btn-success" id="send_form"><i class="material-icons left">add_to_photos</i> <?php echo e(__('adminstaticwords.Create')); ?></button>
        </div>
        <div class="clear-both"></div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Actor Modal -->

<div id="AddActorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.AddActor')); ?></h5>
      </div>
      <div style="display:none;" class="alert alert-success" id="msg_div1">
              <center><span id="res_message2"></span></center>
      </div>
      <form method="POST" enctype="multipart/form-data" id="actorform">
       
      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name',__('adminstaticwords.Name')); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
          <?php echo Form::label('image', __('adminstaticwords.ActorImage')); ?> - <p class="inline info"><?php echo e(__('adminstaticwords.HelpBlockText')); ?></p>
          <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

          <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('adminstaticwords.ActorImage')); ?>">
            <i class="icon fa fa-check"></i>
            <span class="js-fileName"><?php echo e(__('adminstaticwords.ChooseAFile')); ?></span>
          </label>
          <p class="info"><?php echo e(__('adminstaticwords.ChooseCustomImage')); ?></p>
          <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> <?php echo e(__('adminstaticwords.Reset')); ?></button>
          <button type="submit" class="btn btn-success" id="send_form_actor"><i class="material-icons left">add_to_photos</i> <?php echo e(__('adminstaticwords.Create')); ?></button>
        </div>
        <div class="clear-both"></div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Genre Modal -->
<div id="AddGenreModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><?php echo e(__('adminstaticwords.AddGenre')); ?></h5>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'GenreController@store']); ?>

      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name',__('adminstaticwords.Name')); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> <?php echo e(__('adminstaticwords.Reset')); ?></button>
          <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> <?php echo e(__('adminstaticwords.Create')); ?></button>
        </div>
      </div>
      <div class="clear-both"></div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<!------- For ajax director ----------->
<script type="text/javascript">
  $(document).ready(function(){

     $(".directorList").select2({
      ajax: { 
       url: "<?php echo e(route('listofd')); ?>",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
     });
});

$(document).ready(function(){
$('#send_form').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   $('#send_form').html('Sending..');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "<?php echo e(route('ajax.director')); ?>",
      method: 'GET',
      data: $('#director').serialize(),
      datatype : 'html',
      success: function(response){
        
         //------------------------
            $('#send_form').html('create');
            $('#msg_div').show();
            $('#res_message').html(response.msg);

            document.getElementById("director").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            $('#AddDirectorModal').modal('hide');

            },1000);
         //--------------------------
      }});
   });
});
</script>
<!------------ end ajax director -------->


<!------- For ajax actor ----------->
<script type="text/javascript">
  $(document).ready(function(){

     $(".actorList").select2({
      ajax: { 
       url: "<?php echo e(route('listofactor')); ?>",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
     });
});

$(document).ready(function(){
$('#send_form_actor').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   $('#send_form_actor').html('Sending..');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "<?php echo e(route('ajax.actor')); ?>",
      method: 'GET',
      data: $('#actorform').serialize(),
      datatype : 'html',
      success: function(response){
          //console.log(response);
         //------------------------
            $('#send_form_actor').html('create');
            $('#msg_div1').show();
            $('#res_message2').html('');
            $('#res_message2').append(response.msg);

            document.getElementById("actorform").reset(); 
            setTimeout(function(){
            $('#res_message2').hide();
            $('#msg_div1').hide();
            $('#AddActorModal').modal('hide');

            },1000);
         //--------------------------
      }});
   });
});
</script>
<!------------ end ajax actor -------->

<script>
  $(document).ready(function(){
   $("#selecturl").select2({
    placeholder: "Add Video Through...",

  });

   $('#ifbox').show();
   $('#subtitle_section').show();

   $('#selecturl').change(function(){  
     selecturl = document.getElementById("selecturl").value;
     if (selecturl == 'iframeurl') {
    $('#ifbox').show();
    $('#uploadvideo').hide();
    $('#custom_url').hide();
    $('#ready_url').hide();
    $('#subtitle_section').show();

  }else if (selecturl == 'uploadvideo') {
   $('#uploadvideo').show();
   $('#ready_url').hide();
   $('#custom_url').hide();
   $('#ifbox').hide();
 $('#subtitle_section').show();

 }else if(selecturl=='customurl'){
   $('#ifbox').hide();
   $('#uploadvideo').hide();
   $('#ready_url').show();
   $('#custom_url').hide();
  $('#subtitle_section').show();
   $('#ready_url_text').text('Enter Custom URL or Vimeo or YouTube URL');
 }
 else if (selecturl == 'youtubeapi') {
   $('#uploadvideo').hide();
   $('#ready_url').show();
  $('#custom_url').hide();
   $('#ifbox').hide();
    $('#subtitle_section').show();
   $('#ready_url_text').text('Import From Youtube API');

 }else if(selecturl=='vimeoapi'){
   $('#ifbox').hide();
   $('#uploadvideo').hide();
   $('#ready_url').show();
    $('#custom_url').hide();
    $('#subtitle_section').show();
   $('#ready_url_text').text('Import From Vimeo API');
 }else if(selecturl=='multiqcustom'){
   $('#ifbox').hide();
   $('#uploadvideo').hide();
   $('#ready_url').hide();
   $('#subtitle_section').show();
   $('#custom_url').show();
 }


});
   var i= 1;
   $('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="sub_t[]"/></td><td><input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');  
   });

   $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  


   $('form').on('submit', function(event){
    $('.loading-block').addClass('active');
  });
   $('#custom_url').hide();

   $('#TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

    if (state == true) {

     $('#ready_url').show();
     $('#custom_url').hide();

   } else if (state == false) {

    $('#ready_url').hide();
    $('#custom_url').show();

  };

});

   $('.upload-image-main-block').hide();
   $('.subtitle_list').hide();
   $('#subtitle-file').hide();
   $('.movie_id').hide();
   $('input[name="subtitle"]').click(function(){
    if($(this).prop("checked") == true){
      $('.subtitle_list').fadeIn();
      $('#subtitle-file').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.subtitle_list').fadeOut();
      $('#subtitle-file').fadeOut();
    }
  });
   $('.for-custom-image input').click(function(){
    if($(this).prop("checked") == true){
      $('.upload-image-main-block').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.upload-image-main-block').fadeOut();
    }
  });
   $('input[name="series"]').click(function(){
    if($(this).prop("checked") == true){
      $('.movie_id').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.movie_id').fadeOut();
    }
  });

  $('input[name="is_protect"]').click(function(){
    if($(this).prop("checked") == true){
      $('.is_protect').fadeIn();
    }
    else if($(this).prop("checked") == false){
      $('.is_protect').fadeOut();
    }
  });

  $('input[name="is_upcoming"]').click(function(){
    if($(this).prop("checked") == true){
      $('.video_url').fadeOut();
      $('#ifbox').fadeOut();
      $('#uploadvideo').fadeOut();
      $('#custom_url').fadeOut();
      $('#ready_url').fadeOut();
      $('#upcoming_box').show();
    }
    else if($(this).prop("checked") == false){
      $('.video_url').fadeIn();
      $('#ifbox').show();
      $('#uploadvideo').hide();
      $('#custom_url').hide();
      $('#ready_url').hide();
      $('#upcoming_box').hide();
    }
  });

   $('input[name="is_custom_label"]').click(function(){
    if($(this).prop("checked") == true){
      $('#label_box').show();
    }
    else if($(this).prop("checked") == false){
      $('#label_box').hide();
    }
  });

 });
</script>

<script>
  $('#movi_id').on('change',function(){
    if ($('#movi_id').is(':checked')){
      $('#movie_title').show('fast');
      $('#movie_id').hide('fast');
    }else{
     $('#movie_id').show('fast');
     $('#movie_title').hide('fast');
   }
 });

 
</script>


<script>
        $(document).ready(function() {
           var videourl;
            vimeoApiCall();
            $("#vpageTokenNext").on( "click", function( event ) {
                $("#vpageToken").val($("#vpageTokenNext").val());
                vimeoApiCall();
            });
            $("#vpageTokenPrev").on( "click", function( event ) {
                $("#vpageToken").val($("#vpageTokenPrev").val());
                vimeoApiCall();
            });
            $("#vimeo-searchBtn").on( "click", function( event ) {
                vimeoApiCall();
                return false;
            });
            jQuery( "#vimeo-search" ).autocomplete({
              source: function( request, response ) {
                //console.log(request.term);
                var sqValue = [];
                var accesstoken='<?php echo e(env('VIMEO_ACCESS')); ?>';
                var myvimeourl='https://api.vimeo.com/videos?query=videos'+'&access_token=' + accesstoken +'&per_page=1';
                console.log(myvimeourl);
                jQuery.ajax({
                    type: "GET",
                    url: myvimeourl,
                    dataType: 'jsonp',
                    
                    success: function(data){
                        console.log(data[1]);
                        obj = data[1];
                        jQuery.each( obj, function( key, value ) {
                            sqValue.push(value[0]);
                        });
                        response( sqValue);
                    }
                });
              },
              select: function( event, ui ) {
                setTimeout( function () { 
                    vimeoApiCall();
                }, 300);
              }
            });  
        });
function vimeoApiCall(){

    var accesstoken='<?php echo e(env('VIMEO_ACCESS')); ?>';
    var text=$("#vimeo-search").val();
   var next=  $("#vpageTokenNext").val();
   console.log('jxhh'+next);
   var prev= $("#vpageTokenPrev").val();
    var myvimeourl=null;
   if (next != null && next !='') {
     myvimeourl='https://api.vimeo.com'+next;
   }else if (prev != null && prev !='') {
       myvimeourl='https://api.vimeo.com'+prev;
   }else{
       myvimeourl='https://api.vimeo.com/videos?query='+ text + '&access_token=' + accesstoken+'&per_page=5';
   }
  
   console.log('url'+myvimeourl);
    $.ajax({
        cache: false,
     
        dataType: 'json',
        type: 'GET',
       
        url: myvimeourl,

    })
    .done(function(data) {
      console.log(data);
    // alert('duhjf');
        if ( data.paging.previous === null) {$("#vpageTokenPrev").hide();}else{$("#vpageTokenPrev").show();}
        if ( data.paging.next === null) {$("#vpageTokenNext").hide();}else{$("#vpageTokenNext").show();}
        var items = data.data, videoList = "";
     
        $("#vpageTokenNext").val(data.paging.next);
        $("#vpageTokenPrev").val(data.paging.previous);
        console.log(items);
        $.each(items, function(index,e) {
             
             videourl=e.link;
               // console.log(videourl);
            videoList = videoList 
            + '<li class="hyv-video-list-item" ><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="'+e.name+'" src="'+e.pictures.sizes[3].link+'" height="90"></span></p></div><div class="hyv-content-wrapper"><p  class="hyv-content-link">'+e.name+'<span class="title">'+e.description.substr(0, 105)+'</span><span class="stat attribution">by <span>'+e.user.name+'</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideovimeoURl("'+videourl+'")>Add</button></div></li>';
              
          
        });

        $("#vimeo-watch-related").html(videoList);
       
    });

}
</script>


<script>
        $(document).ready(function() {
           var videourl;
            youtubeApiCall();
            $("#pageTokenNext").on( "click", function( event ) {
                $("#pageToken").val($("#pageTokenNext").val());
                youtubeApiCall();
            });
            $("#pageTokenPrev").on( "click", function( event ) {
                $("#pageToken").val($("#pageTokenPrev").val());
                youtubeApiCall();
            });
            $("#hyv-searchBtn").on( "click", function( event ) {
                youtubeApiCall();
                return false;
            });
            jQuery( "#hyv-search" ).autocomplete({
              source: function( request, response ) {
                //console.log(request.term);
                var sqValue = [];
                jQuery.ajax({
                    type: "POST",
                    url: "http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1",
                    dataType: 'jsonp',
                    data: jQuery.extend({
                        q: request.term
                    }, {  }),
                    success: function(data){
                        // console.log(data[1]);
                        obj = data[1];
                        jQuery.each( obj, function( key, value ) {
                            sqValue.push(value[0]);
                        });
                        response( sqValue);
                    }
                });
              },
              select: function( event, ui ) {
                setTimeout( function () { 
                    youtubeApiCall();
                }, 300);
              }
            });  
        });
function youtubeApiCall(){
    $.ajax({
        cache: false,
        data: $.extend({
            key: '<?php echo e(env('YOUTUBE_API_KEY')); ?>',
            q: $('#hyv-search').val(),
            part: 'snippet'
        }, {maxResults:15,pageToken:$("#pageToken").val()}),
        dataType: 'json',
        type: 'GET',
        timeout: 5000,
        url: 'https://www.googleapis.com/youtube/v3/search'
    })
    .done(function(data) {
        if (typeof data.prevPageToken === "undefined") {$("#pageTokenPrev").hide();}else{$("#pageTokenPrev").show();}
        if (typeof data.nextPageToken === "undefined") {$("#pageTokenNext").hide();}else{$("#pageTokenNext").show();}
        var items = data.items, videoList = "";
        $("#pageTokenNext").val(data.nextPageToken);
        $("#pageTokenPrev").val(data.prevPageToken);
        console.log(items);
        $.each(items, function(index,e) {
             
             videourl="https://www.youtube.com/watch?v="+e.id.videoId;
               console.log(videourl);
            videoList = videoList 
            + '<li class="hyv-video-list-item" ><div class="hyv-content-wrapper"><p  class="hyv-content-link" title="'+e.snippet.title+'"><span class="title">'+e.snippet.title+'</span><span class="stat attribution">by <span>'+e.snippet.channelTitle+'</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideoURl("'+videourl+'")>Add</button></div><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="'+e.snippet.title+'" src="'+e.snippet.thumbnails.default.url+'" height="90"></span></p></div></li>';
              
          
        });

        $("#hyv-watch-related").html(videoList);
       
    });
}
    </script>
<script type="text/javascript">
  function setVideoURl(videourls){
    console.log(videourls);
  $('#apiUrl').val(videourls); 
    $('#myyoutubeModal').modal("hide");
  }
</script>
<script type="text/javascript">
  function setVideovimeoURl(videourls){
    console.log(videourls);
  $('#apiUrl').val(videourls); 
    $('#myvimeoModal').modal("hide");
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){ 
    $('#selecturl').change(function() {
     $('#apiUrl').val('');  
        var opval = $(this).val(); //Get value from select element
        if(opval=="youtubeapi"){ //Compare it and if true
            $('#myyoutubeModal').modal("show"); //Open Modal
        }
        if(opval=="vimeoapi"){ //Compare it and if true
            $('#myvimeoModal').modal("show"); //Open Modal
        }
    });
});
</script>
<script>
  $('.seriescheck').on('change',function(){
      if($(this).is(':checked')){
        $('.mseries').attr('required','required');
      }else{
        $('.mseries').removeAttr('required');
      }
  });
</script>
<script>
  $('#subtitle_check').on('change',function(){

    if($('#subtitle_check').is(':checked')){
      $('.subtitle-box').show('fast');
    }else{
       $('.subtitle-box').hide('fast');
    }

  });
</script>



<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
  $(".midia-toggle-upload_video").midia({
		base_url: '<?php echo e(url('')); ?>',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'movies_upload'
	});

  $(".midia-toggle-upload_video_360").midia({
		base_url: '<?php echo e(url('')); ?>',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'movies_upload/url_360'
	});

  $(".midia-toggle-upload_video_480").midia({
		base_url: '<?php echo e(url('')); ?>',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'movies_upload/url_480'
	});

  $(".midia-toggle-upload_video_720").midia({
		base_url: '<?php echo e(url('')); ?>',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'movies_upload/url_720'
	});

  $(".midia-toggle-upload_video_1080").midia({
		base_url: '<?php echo e(url('')); ?>',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'movies_upload/url_1080'
	});
</script>
<script type="text/javascript" src="<?php echo e(url('js/encrypt.js')); ?>"></script> <!-- bootstrap js -->
<script>
  $('#apiUrl').on('change',function(){
    $apicurrentValue = $('#apiUrl').val();
    if($apicurrentValue.includes('encrypt:')){
      //console.log('true');
      $('#encryptlink').hide();
    }else{
      //console.log('false');
      $('#encryptlink').show();
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/oovmedia.com/resources/views/admin/movie/create.blade.php ENDPATH**/ ?>