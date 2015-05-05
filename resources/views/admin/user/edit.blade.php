@extends('layouts.admin.admin')
@section('page-title')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">编辑用户资料</h1>
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
                
                <strong>编辑用户资料</strong>
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
            <div class="panel-body">
                
                {!! Form::open(['route'=>'admin.user.update','role'=>'form','class'=>'form-horizontal',]) !!}
                    {!! Form::hidden('id',$user->id) !!}
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="name" >用户名</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="@if($errors->first('name')) {{$errors->first('name')}} @else 用户名 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('email')) has-error @endif">
                        <label class="col-sm-2 control-label">email</label>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="linecons-mail"></i>
                                </span>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="@if($errors->first('email')) {{$errors->first('email')}} @else 输入您的邮箱 @endif">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="signature">签名</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" name="signature" id="signature" placeholder="您的个性签名">{{$user->signature}}</textarea>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="telephone">联系电话</label>

                        <div class="col-sm-10">
                            <input type="text" name="telephone" id="telephone" value="{{$user->telephone}}" class="form-control" placeholder="@if($errors->first('telephone')) {{$errors->first('telephone')}} @else 手机号码 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('sex')) has-error @endif">
                        <label class="col-sm-2 control-label">性别</label>

                        <div class="col-sm-10">

                            <p>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="1" @if($user->sex==1) checked @endif>
                                    男
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="2" @if($user->sex==2) checked @endif>
                                    女
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="0" @if($user->sex==0) checked @endif>
                                    保密
                            </label>
                            @if($errors->first('sex')) {{$errors->first('sex')}} @endif
                            </p>

                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group @if($errors->first('is_banned')) has-error @endif">
                        <label class="col-sm-2 control-label">屏蔽</label>

                        <div class="col-sm-10">

                            <p>
                            <label class="radio-inline">
                                <input type="radio" name="is_banned" value="0" @if($user->is_banned==0) checked @endif>
                                    否
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_banned" value="1" @if($user->is_banned==1) checked @endif>
                                    是
                            </label>
                            @if($errors->first('is_banned')) {{$errors->first('is_banned')}} @endif
                            </p>

                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>

                        <div class="col-sm-10">

                            <button class="btn btn-danger">更新</button>

                        </div>
                    </div>

                {!! Form::close()!!}
                
            </div>
        </div>
        
    </div>
</div>
@stop
