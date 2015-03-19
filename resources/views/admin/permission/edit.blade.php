@extends('layouts.admin')
@section('page-title')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">编辑角色</h1>
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
                
                <strong>权限修改</strong>
            </li>
        </ol>
        
    </div>
</div>
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
                
                {!! Form::open(['route'=>'permission-update','role'=>'form','class'=>'form-horizontal',]) !!}
                    {!! Form::hidden('id',$permission->id) !!}
                    
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="field-1">权限</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="field-1" placeholder="@if($errors->first('name')) {{$errors->first('name')}} @else route名 @endif" value="{{$permission->name}}">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group @if($errors->first('display_name')) has-error @endif">
                        <label class="col-sm-2 control-label" for="field-2">权限名称</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="display_name" id="field-2" placeholder="@if($errors->first('display_name')) {{$errors->first('display_name')}} @else 显示的权限名称 @endif" value="{{$permission->display_name}}">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group @if($errors->first('description')) has-error @endif">
                        <label class="col-sm-2 control-label" for="field-2">描述</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" id="field-2" placeholder="@if($errors->first('description')) {{$errors->first('display_name')}} @else 权限描述 @endif" value="{{$permission->description}}">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        
                        <div class="col-sm-10">
                            
                            <button class="btn btn-danger">提交更新</button>
                            
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
        
    </div>
</div>
@stop
