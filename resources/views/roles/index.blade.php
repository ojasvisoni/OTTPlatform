@extends('layouts.admin')
@section('title','Roles | ')
@section('content')
<div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
      <a href="{{ route('roles.create')}}" class="btn btn-danger btn-md"><i class="material-icons left">add</i> {{__('Create a new role')}}</a>
    
      <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md z-depth-0" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> {{__('adminstaticwords.DeleteSelected')}}</a>   
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
              {!! Form::open(['method' => 'POST', 'action' => 'MenuController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('adminstaticwords.No')}}</button>
                <button type="submit" class="btn btn-danger">{{__('adminstaticwords.Yes')}}</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body content-block-two">

         <table id="roletable" class="table table-hover db">
            <thead>
              <tr class="table-heading-row">
                <th>{{__('#')}}</th>
                <th>{{__('Role Name')}}</th>
                <th>{{__('Action')}}</th>
              </tr>
            </thead>
           
            <tbody>
            
            </tbody>
            
        </table>
       
@endsection
@section('custom-script')
    <script>
       $(document).ready(function () {
        var table = $('#roletable').DataTable({
            lengthChange: false,
            responsive: true,
            serverSide: true,
            autoWidth: true,
            ajax: '{{ route('roles.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable : false
                },
                {
                    data: 'name',
                    name: 'roles.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable : false
                }
            ],
            dom: 'lBfrtip',
            buttons : [
                'csv','excel','pdf','print'
             ],
            order: [
                [1, 'ASC']
            ]
        });

    });
    </script>
@endsection