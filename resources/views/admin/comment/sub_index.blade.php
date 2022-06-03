@extends('layouts.admin')
@section('title',__('adminstaticwords.AllSubComments'))
@section('content')
  <div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
     
      <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> {{__('adminstaticwords.DeleteSelected')}}</a>   
      <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
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
              {!! Form::open(['method' => 'POST', 'action' => 'AdminCommentController@sub_bulk_delete', 'id' => 'bulk_delete_form']) !!}
                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('adminstaticwords.No')}}</button>
                <button type="submit" class="btn btn-danger">{{__('adminstaticwords.Yes')}}</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body table-responsive content-block-two">
      <table id="subcommentTable" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
              #
            </th>
            <th>{{__('UserName')}}</th>
             <th>{{__('adminstaticwords.Comments')}}</th>
             <th>{{__('adminstaticwords.Reply')}}</th>
            <th>{{__('adminstaticwords.SubmittedOn')}}</th>
            <th>{{__('adminstaticwords.Status')}}</th>
            <th>{{__('adminstaticwords.Actions')}}</th>
          </tr>
        </thead>
        @if (isset($subcomment))
          <tbody>
           
          </tbody>
        @endif
      </table>
    </div>
  </div>
@endsection
@section('custom-script')
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
   <script>
    $(function () {
      "use strict";
      var table = $('#subcommentTable').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          autoWidth: false,
          scrollCollapse: true,
          ajax: "{{ route('admin.subcomment.index') }}",
          columns: [
              {data: 'checkbox', name: 'checkbox',orderable: false, searchable: false},
              {data: 'username', name: 'username'},
              {data: 'comment', name: 'comment'},
              {data: 'reply', name: 'reply'},
              {data: 'created_at', name: 'created_at'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action',searchable: false}
             
          ],
          dom : 'lBfrtip',
          buttons : [
            'csv','excel','pdf','print'
          ]
      });
    });
  </script>
@endsection