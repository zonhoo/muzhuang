<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/30
 * Time: 上午11:22
 */
 ?>
  @extends('layouts.admin.admin')
  @section('page-title')
  <div class="page-title">
      <div class="title-env">
          <h1 class="title">版本管理</h1>
          <p class="description">Dynamic table variants with pagination and other controls</p>
      </div>
      <div class="breadcrumb-env">

          <ol class="breadcrumb bc-1">
              <li>
                  <a href="dashboard-1.html"><i class="fa-home"></i>Dashboard</a>
              </li>
              <li>

                  <a href="tables-basic.html">版本管理</a>
              </li>
              <li class="active">
                  <strong>版本列表</strong>
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
              <a class="btn btn-primary" href="{{ route('admin.version.create') }}">上传新版本</a>
          </div>
      </div>
  </div>
<!-- Removing search and results count filter -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">版本列表</h3>

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
    <div class="panel-body">

        <script type="text/javascript">
                                jQuery(document).ready(function($)
                                   {
                                   $("#example-2").dataTable({
                                     dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                                     aoColumns: [
                                                 {bSortable: false},
                                                 null,
                                                 null,
                                                 null,
                                                 null,
                                                 null,
                                                 null
                                                 ],
                                     });

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

        <table class="table table-bordered table-striped" id="example-2">
            <thead>
                <tr>
                    <th class="no-sorting">
                        <input type="checkbox" class="cbr">
                    </th>
                    <th>ID</th>
                    <th>标题</th>
                    <th>版本号</th>
                    <th>版本名</th>
                    <th>上传时间</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody class="middle-align">
                @foreach($versions as $version)
                <tr>
                    <td>
                        <input type="checkbox" class="cbr">
                    </td>
                    <td>{{ $version->id }}</td>
                    <td>{{ $version->title }}</td>
                    <td>{{ $version->version_code }}</td>
                    <td>{{ $version->version_name}}</td>
                    <td>{{ $version->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-black dropdown-toggle" data-toggle="dropdown">
                                操作 <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-black" role="menu">
                                <li>
                                    <a href="{{route('admin.version.edit',$version->id)}}">编辑</a>
                                </li>
                                <li>
                                    {!! Form::open(['route'=>['admin.version.destroy',$version->id],'method'=>'DELETE',]) !!}
                                    {!! Form::submit('删除',['class'=>'btn btn-black btn-sm']) !!}
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <a href="{{route('admin.version.show',$version->id)}}">查看</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">其他</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

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