@extends('layouts.admin')
@section('title',"Edit $tvseries->title")
@section('content')
  <div class="admin-form-main-block mrg-t-40">
  	<h4 class="admin-form-text">
      @can('tvseries.view')
        <a href="{{url('admin/tvseries')}}" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.GoBack')}}" class="btn-floating"><i class="material-icons">reply</i></a>
      @endcan
    {{__('adminstaticwords.EditTvSeries')}}</h4>
    <div class="row">
      <div class="col-md-6">
      	<div class="admin-form-block z-depth-1">
	        {!! Form::model($tvseries, ['method' => 'PATCH', 'action' => ['TvSeriesController@update',$tvseries->id], 'files' => true]) !!}
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							{!! Form::label('title', __('adminstaticwords.SeriesTitle')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.EnterTvseriesTitle')}} eg:Arrow"></i>
							{!! Form::text('title', null, ['class' => 'form-control']) !!}
							<small class="text-danger">{{ $errors->first('title') }}</small>
						</div>
            
             <div class="form-group">
              
              <label for="">{{__('adminstaticwords.MetaKeyword')}}: </label>
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterMetaKeyword')}}"></i>
              <input name="keyword" value="{{ $tvseries->keyword }}" type="text" class="form-control" data-role="tagsinput"/>

               
             </div>

            <div class="form-group">
              <label for="">{{__('adminstaticwords.MetaDescription')}}: </label>
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterMetaDescription')}}"></i>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $tvseries->description }}</textarea>
            </div>

            <div class="form-group{{ $errors->has('is_custom_label') ? ' has-error' : '' }}">
              <div class="row">
                <div class="col-xs-6">
                  {!! Form::label('is_custom_label',__('Allow Custom Label ?')) !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">
                    <input type="checkbox" name="is_custom_label" @if($tvseries->is_custom_label == '1') checked @endif   class="checkbox-switch" id="is_custom_label">
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('is_custom_label') }}</small>
              </div>
            </div>

            <div id="label_box" style="{{isset($tvseries['is_custom_label']) && $tvseries['is_custom_label'] == 1 ? ' ' : "display: none" }}" class="form-group{{ $errors->has('label_id') ? ' has-error' : '' }}">
              {!! Form::label('label_id', __('Custom Label')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('select custom label')}}"></i>
             <select name="label_id" id="" class="select2 form-control">
              @foreach($labels as $label)
               <option value="{{$label->id}}" {{isset($tvseries->label_id) && $label->id == $tvseries->label_id ? 'selected' : ''}}>{{$label->name}}</option>
               @endforeach
             </select>
              <small class="text-danger">{{ $errors->first('label_id') }}</small>
            </div>


            <div class="form-group{{ $errors->has('maturity_rating') ? ' has-error' : '' }}">
              {!! Form::label('maturity_rating', __('adminstaticwords.MaturityRating')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseSelectMaturityRating')}}"></i>
              {!! Form::select('maturity_rating', array('all age' => __('adminstaticwords.AllAge'), '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']) !!}
              <small class="text-danger">{{ $errors->first('maturity_rating') }}</small>
            </div>
						<div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
							<div class="row">
								<div class="col-xs-6">
									{!! Form::label('', __('adminstaticwords.ChooseCustomThumbnailAndPoster')) !!}
								</div>
								<div class="col-xs-5 pad-0">
									<label class="switch for-custom-image">
										{!! Form::checkbox('', 1, 0, ['class' => 'checkbox-switch']) !!}
										<span class="slider round"></span>
									</label>
								</div>
							</div>
							<div class="col-xs-12">
								<small class="text-danger">{{ $errors->first('subtitle') }}</small>
							</div>
						</div>
						<div class="upload-image-main-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('thumbnail',__('adminstaticwords.Thumbnail')) !!} - <p class="inline info">{{__('adminstaticwords.HelpBlockText')}}</p>
                    {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
                    <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.Thumbnail')}}">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">{{__('adminstaticwords.ChooseAFile')}}</span>
                    </label>
                    <p class="info">{{__('adminstaticwords.ChooseCustomThumbnail')}}</p>
                    <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('poster',__('adminstaticwords.Poster')) !!} - <p class="inline info">{{__('adminstaticwords.HelpBlockText')}}</p>
                    {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
                    <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.Poster')}}">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">{{__('adminstaticwords.ChooseAFile')}}</span>
                    </label>
                    <p class="info">{{__('adminstaticwords.ChooseCustomPoster')}}</p>
                    <small class="text-danger">{{ $errors->first('poster') }}</small>
                  </div>
                </div>
              </div>
            </div>
						<div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
							<div class="row">
								<div class="col-xs-6">
									{!! Form::label('featured', __('adminstaticwords.Featured')) !!}
								</div>
								<div class="col-xs-5 pad-0">
									<label class="switch">
										{!! Form::checkbox('featured', 1, ($tvseries->featured == 1 ? 1 : 0), ['class' => 'checkbox-switch']) !!}
										<span class="slider round"></span>
									</label>
								</div>
							</div>
							<div class="col-xs-12">
								<small class="text-danger">{{ $errors->first('featured') }}</small>
							</div>
						</div>
            <div class="menu-block">
              <h6 class="menu-block-heading">{{__('adminstaticwords.PleaseSelectMenu')}}</h6>
              @if (isset($menus) && count($menus) > 0)
                <ul>
                  @foreach ($menus as $menu)
                    <li>
                      <div class="inline">
                        @php
                          $checked = null;
                          if (isset($menu->menu_data) && count($menu->menu_data) > 0) {
                            if ($menu->menu_data->where('tv_series_id', $tvseries->id)->where('menu_id', $menu->id)->first() != null) {
                              $checked = 1;
                            }
                          }
                        @endphp
                        @if ($checked == 1)
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" checked>
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                        @else
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                        @endif
                      </div>
                      {{$menu->name}}
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
						<div class="switch-field">
							<div class="switch-title">{{__('adminstaticwords.WantTMDBDataAndMoreOrCustom')}}?</div>
							<input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" {{$tvseries->tmdb == 'Y' ? 'checked' : ''}}/>
							<label for="switch_left">{{__('adminstaticwords.TMDB')}}</label>
							<input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" {{$tvseries->tmdb != 'Y' ? 'checked' : ''}}/>
							<label for="switch_right">{{__('adminstaticwords.Custom')}}</label>
						</div>
						<div id="custom_dtl" class="custom-dtl">
							<div class="form-group{{ $errors->has('genre_id') ? ' has-error' : '' }}">
								{!! Form::label('genre_id', __('adminstaticwords.Genre')) !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseSelectGenres')}}"></i>
								<div class="input-group">
                  <select name="genre_id[]" id="genre_id" class="form-control select2" multiple="multiple">
                    @if(isset($old_genre) && count($old_genre) > 0)
                      @foreach($old_genre as $old)
                        <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
                      @endforeach
                    @endif
                    @if(isset($genre_ls))
                      @foreach($genre_ls as $rest)
                        <option value="{{$rest->id}}">{{$rest->name}}</option> 
                      @endforeach
                    @endif
                  </select>  
                  <a href="#" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                </div>
								<small class="text-danger">{{ $errors->first('genre_id') }}</small>
							</div>
							<div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                  {!! Form::label('rating', __('adminstaticwords.Ratings')) !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseSelectRating')}} eg:5.8"></i>
                  {!! Form::text('rating', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('rating') }}</small>
              </div>
							<div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
								{!! Form::label('detail', __('adminstaticwords.Description')) !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterTvseriesDescription')}}"></i>
								{!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
								<small class="text-danger">{{ $errors->first('detail') }}</small>
							</div>
						</div>
						<div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> {{__('adminstaticwords.Update')}}</button>
            </div>
            <div class="clear-both"></div>
	        {!! Form::close() !!}
	      </div>  
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
          <h5 class="modal-title">Add Actor</h5>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'ActorController@store', 'files' => true]) !!}
          <div class="modal-body admin-form-block">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                {!! Form::label('detail', 'Description') !!}
                {!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                <small class="text-danger">{{ $errors->first('detail') }}</small>
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
              {!! Form::label('image', 'Director Image') !!} - <p class="inline info">Help block text</p>
              {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Director pic">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
          </div>  
          <div class="clear-both"></div>
        {!! Form::close() !!}
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
          <h5 class="modal-title">{{__('adminstaticwords.AddGenre')}}</h5>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => 'GenreController@store']) !!}
          <div class="modal-body admin-form-block">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', __('adminstaticwords.Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> {{__('adminstaticwords.Reset')}}</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> {{__('adminstaticwords.Create')}}</button>
            </div>
          </div>
          <div class="clear-both"></div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('custom-script')
	<script>
		$(document).ready(function(){
      if ($('.custom_btn').is(':checked')) {
        $('#custom_dtl').show();
      }
      $('.upload-image-main-block').hide();
      $('.for-custom-image input').click(function(){
        if($(this).prop("checked") == true){
          $('.upload-image-main-block').fadeIn();
        }
        else if($(this).prop("checked") == false){
          $('.upload-image-main-block').fadeOut();
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
@endsection