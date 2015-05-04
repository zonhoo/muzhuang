@extends('layouts.admin.admin')
@section('page-title')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">权限信息</h1>
        <p class="description">Dynamic table variants with pagination and other controls</p>
    </div>
    
    <div class="breadcrumb-env">
        
        <ol class="breadcrumb bc-1">
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Dashboard</a>
            </li>
            <li>
                
                <a href="tables-basic.html">用户中心</a>
            </li>
            <li class="active">
                
                <strong>权限信息</strong>
            </li>
        </ol>
        
    </div>
</div>
@stop

 @section('flash-message')
 @if (Session::has('flash_notification.message'))
     <div class="alert alert-{{ Session::get('flash_notification.level') }}">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

         {{ Session::get('flash_notification.message') }}
     </div>
 @endif
 @stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">基本信息</h3>
                <div class="panel-options">
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="remove">
                        &times;
                    </a>
                </div>
            </div>
            <div class="panel-body panel-border">
                
                <script type="text/javascript">
                    jQuery(document).ready(function($)
                       {
                        /*
                       $("#example-2").dataTable({
                         dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                         aoColumns: [
                                     {bSortable: false},
                                     null,
                                     null,
                                     null,
                                     null
                                     ],
                         });
                       */
                       // Replace checkboxes when they appear
                       var $state = $("#example-2 thead input[type='checkbox']");
                       
                       $("#example-2").on('draw.dt', function()
                          {
                          cbr_replace();
                          
                          $state.trigger('change');
                          });
                       
                       // Script to select all checkboxes
                       $state.on('change', function(ev)
                         {
                         var $chcks = $("#example-2 tbody input[type='checkbox']");
                         
                         if($state.is(':checked'))
                         {
                            $chcks.prop('checked', true).trigger('change');
                         }
                         else
                         {
                            $chcks.prop('checked', false).trigger('change');
                         }
                         });
                       });
                    </script>
                {!! Form::open(['route'=>'admin.role.updateCan','role'=>'form','class'=>'form-horizontal',]) !!}
                {!! Form::hidden('role_id',$role->id) !!}
                <table class="table table-bordered table-striped" id="example-2">
                    <thead>
                        <tr>
                            <th class="no-sorting">
                                <input type="checkbox" class="cbr">
                            </th>
                            <th>权限</th>
                            <th>权限名称</th>
                        </tr>
                    </thead>
                    
                    <tbody class="middle-align">
                        @foreach($all_permissions as $p)
                        <tr>
                            <td>
                                <input type="checkbox" name="id[]" value="{{$p->id}}" @if($p->can==1) checked="checked" @endif class="cbr">
                            </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->display_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="btn-group">
                    <button class="btn btn-success bg-lg">更新权限</button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        
    </div>
</div>
@stop
@section('style')
{!! Html::style('style/assets/js/datatables/dataTables.bootstrap.css') !!}
@stop
@section('script')
{!! Html::script('style/assets/js/datatables/js/jquery.dataTables.min.js') !!}
{!! Html::script('style/assets/js/datatables/dataTables.bootstrap.js') !!}
{!! Html::script('style/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js') !!}
{!! Html::script('style/assets/js/datatables/tabletools/dataTables.tableTools.min.js') !!}
@stop
