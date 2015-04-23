<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/1
 * Time: 下午3:17
 */
 ?>
<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/30
 * Time: 上午10:24
 */
 ?>
 @extends('layouts.admin.admin')
 @section('page-title')
 <div class="page-title">
     <div class="title-env">
         <h1 class="title">关键字</h1>
         <p class="description">Dynamic table variants with pagination and other controls</p>
     </div>

     <div class="breadcrumb-env">

         <ol class="breadcrumb bc-1">
             <li>
                 <a href="dashboard-1.html"><i class="fa-home"></i>Dashboard</a>
             </li>
             <li>

                 <a href="tables-basic.html">内容管理</a>
             </li>
             <li class="active">

                 <strong>关键字</strong>
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
                <h3 class="panel-title">关键字过滤</h3>
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

                {!! Form::open(['route'=>'admin.keyword.store','role'=>'form','class'=>'form-horizontal',]) !!}

                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="field-2">关键字</label>

                        <div class="col-sm-11">
                            <textarea name="keywords" class="form-control" cols="5" id="field-5" placeholder="关键字（格式：xxx,xxx,xxx）">{{$keywords}}</textarea>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>

                        <div class="col-sm-11">

                            <button class="btn btn-danger">提交</button>

                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>

 @stop

 @section('script')
    <script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
 @stop