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
         <h1 class="title">上传封面</h1>
         <p class="description">Dynamic table variants with pagination and other controls</p>
     </div>

     <div class="breadcrumb-env">

         <ol class="breadcrumb bc-1">
             <li>
                 <a href="{{url('admin')}}"><i class="fa-home"></i>Dashboard</a>
             </li>
             <li>

                 <a href="tables-basic.html">封面管理</a>
             </li>
             <li class="active">

                 <strong>封面上传</strong>
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
                <h3 class="panel-title">封面上传</h3>
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

                {!! Form::open(['route'=>'admin.version.store','role'=>'form','class'=>'form-horizontal',]) !!}

                    <div class="form-group @if($errors->first('title')) has-error @endif">
                        <label class="col-sm-1 control-label" for="title">标题</label>

                        <div class="col-sm-11">
                            <input type="text" name="title" class="form-control" id="title" placeholder="@if($errors->first('title')) {{$errors->first('title')}} @else 名称 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('version_code')) has-error @endif">
                        <label class="col-sm-1 control-label" for="version_code">版本号</label>

                        <div class="col-sm-11">
                            <input type="text" name="version_code" class="form-control" id="version_code" placeholder="@if($errors->first('version_code')) {{$errors->first('version_code')}} @else 版本号 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('version_name')) has-error @endif">
                        <label class="col-sm-1 control-label" for="version_name">版本名</label>

                        <div class="col-sm-11">
                            <input type="text" name="version_name" class="form-control" id="version_name" placeholder="@if($errors->first('version_name')) {{$errors->first('version_name')}} @else 版本号 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('description')) has-error @endif">
                        <label class="col-sm-1 control-label" for="field-2">描述</label>

                        <div class="col-sm-11">
                            <textarea name="description" class="form-control" cols="5" id="field-5" placeholder="描述"></textarea>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('app_url')) has-error @endif">
                        <label class="col-sm-1 control-label" for="app_url">地址</label>

                        <div class="col-sm-9">
                            <input type="text" name="app_url" class="form-control"  id="app_url" placeholder="@if($errors->first('app_url')) {{$errors->first('app_url')}} @else 下载地址 @endif">
                        </div>
                        <div class="col-sm-1">
                            <a href="javascript:;" onclick="jQuery('#modal-2').modal('show');" class="btn btn-primary btn-single btn-sm">上传APP</a>
                        </div>

                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label"></label>

                        <div class="col-sm-11">

                            <button class="btn btn-danger">创建</button>

                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>

 @stop
 @section('other')
      <script>
        jQuery(document).ready(function($)
        {
            Dropzone.options.dropZone={
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 50, // MB
                autoProcessQueue: false,//关闭自动上传
                uploadMultiple:1,
                addRemoveLinks: true,
                acceptedFiles:'application/vnd.android.package-archive,.apk',
                parallelUploads:1,//单次上传文件个数，最大为2
                init:function(){
                    var submitButton = document.querySelector("#upload");
                    myDropzone = this; // closure

                    submitButton.addEventListener("click", function () {
                      //手动上传所有图片
                      myDropzone.processQueue();
                    });

                    //当上传完成后的事件，接受的数据为JSON格式
                    this.on("complete", function (file) {
                      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                        var res = eval('(' + file.xhr.responseText + ')');
                        var msg = res.msg;

                        if (res.state=='success') {
                          alert(msg);
                          //$('#preview').attr('src',res.url);
                          $('#app_url').val(res.url);
                          $('#app_url').attr("disabled",true);
                        }
                        else {
                          alert('upload failed!');
                        }

                      }
                    });

                    //删除图片的事件，当上传的图片为空时，使上传按钮不可用状态
                    this.on("removedfile", function () {
                      if (this.getAcceptedFiles().length === 0) {
                        $("#upload").attr("disabled", true);
                      }
                    });
                }
            };
        });

        </script>
        <!-- Modal 2 (Custom Width)-->
        <div class="modal fade custom-width" id="modal-2">
            <div class="modal-dialog" style="width: 60%;">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">APP上传</h4>
                    </div>

                    <div class="modal-body">
                        <!-- Auto initialization -->
                        {!! Form::open(['route'=>['uploadfile'],'role'=>'form','id'=>'dropZone','class'=>'dropzone','enctype'=>'multipart/form-data']) !!}
                            {!! Form::hidden('type','version') !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" id="upload" class="btn btn-info">上传</button>
                    </div>
                </div>
            </div>
        </div>
 @stop
 @section('style')
     {!! Html::style('style/assets/js/datatables/dataTables.bootstrap.css') !!}

     {!! Html::style('style/assets/js/dropzone/css/dropzone.css') !!}
 @stop
 @section('script')

     {!! Html::script('style/assets/js/ckeditor/ckeditor.js') !!}
     {!! Html::script('style/assets/js/ckeditor/adapters/jquery.js') !!}

     {!! Html::script('style/assets/js/dropzone/dropzone.min.js') !!}
 @stop
