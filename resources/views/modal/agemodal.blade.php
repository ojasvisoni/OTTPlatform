<!-- Modal -->
<div id="ageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ __('staticwords.agerestrictedvideo') }}</h4>
      </div>
       {!! Form::open(['method' => 'POST', 'action' => 'UsersController@update_age']) !!}
      <div class="modal-body age-modal-body">
        <h6 style="color: #f13e66; font-size: 16px;">{{ __('staticwords.foragerestricttext')}}</h6><br>
        <div class="row">
            <div class="col-md-8">
                <div class="search form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    {!! Form::label('dob', 'Date Of Birth') !!}
                    <input type="date" class="form-control"  name="dob"  />   
                    <small class="text-danger">{{ $errors->first('dob') }}</small>
                </div>
            </div>
            <div class="col-md-4 age_search-btn">
                <button type="submit" class="btn btn-primary">{{__('staticwords.update')}}</button>
            </div>
        </div>
        
      </div>
     {!! Form::close() !!}
    </div>

  </div>
</div>