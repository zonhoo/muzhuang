@extends('layouts.admin.admin')
@section('page-title')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">创建用户</h1>
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
                
                <strong>用户资料</strong>
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
                
                {!! Form::open(['route'=>'admin.user.store','role'=>'form','class'=>'form-horizontal',]) !!}
                    
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="name" >用户名</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="@if($errors->first('name')) {{$errors->first('name')}} @else 用户名 @endif">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="password">密码</label>
                        
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="@if($errors->first('password')) {{$errors->first('password')}} @else 密码 @endif">
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                        <div class="form-group @if($errors->first('password_confirmation')) has-error @endif">
                            <label class="col-sm-2 control-label" for="password_confirmation">确认密码</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="@if($errors->first('password_confirmation')) {{$errors->first('password_confirmation')}} @else 确认密码 @endif">
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
                                <input type="email" name="email" class="form-control" placeholder="@if($errors->first('email')) {{$errors->first('email')}} @else 输入您的邮箱 @endif">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="signature">签名</label>
                        
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" name="signature" id="signature" placeholder="您的个性签名"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="telephone">联系电话</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telephone" id="telephone" placeholder="@if($errors->first('telephone')) {{$errors->first('telephone')}} @else 手机号码 @endif">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group @if($errors->first('sex')) has-error @endif">
                        <label class="col-sm-2 control-label">性别</label>
                        
                        <div class="col-sm-10">
                            
                            <p>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="1">
                                    男
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="2">
                                    女
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="0" checked>
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
                                <input type="radio" name="is_banned" value="0" checked>
                                    否
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_banned" value="1">
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
                            
                            <button class="btn btn-danger">创建</button>
                            
                        </div>
                    </div>
                    
                {!! Form::close()!!}
                
            </div>
        </div>
        
    </div>
</div>
@stop
