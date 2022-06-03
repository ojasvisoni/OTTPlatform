<div class="admin-table-action-block">
  @can('users.edit')
    <a href="{{route('change_subscription_show', $id)}}" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.ChangeSubscription')}}" class="btn-default btn-floating"><i class="material-icons">compare_arrows</i></a>
    <a href="{{route('users.edit', $id)}}" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.Edit')}}" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
  @endcan
  @can('users.delete')
    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#deleteModal{{$id}}"><i class="material-icons">delete</i> </button>
  @endcan
</div>
  <div id="deleteModal{{$id}}" class="delete-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="delete-icon"></div>
      </div>
      <div class="modal-body text-center">
        <h4 class="modal-heading">{{__('adminstaticwords.AreYouSure')}}</h4>
        <p>{{__('adminstaticwords.DeleteWarrning')}}</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{route("users.destroy", $id)}}">
          @method("DELETE")
          @csrf                          
          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('adminstaticwords.No')}}</button>
            <button type="submit" class="btn btn-danger">{{__('adminstaticwords.Yes')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>