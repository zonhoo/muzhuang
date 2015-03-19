@extends('layouts.admin')
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
                
                <form role="form" class="form-horizontal">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">用户名</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-1" placeholder="Placeholder">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-2">密码</label>
                        
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="field-2" placeholder="Placeholder (Password)">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">email</label>
                        
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="linecons-mail"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-5">签名</label>
                        
                        <div class="col-sm-10">
                            <textarea class="form-control" cols="5" id="field-5"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-11">联系电话</label>
                        
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-14" placeholder="Normal input">
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">性别</label>
                        
                        <div class="col-sm-10">
                            
                            <p>
                            <label class="radio-inline">
                                <input type="radio" name="radio-2" checked>
                                    男
                                    </label>
                            <label class="radio-inline">
                                <input type="radio" name="radio-2">
                                    女
                                    </label>
                            <label class="radio-inline">
                                <input type="radio" name="radio-2">
                                    保密
                                    </label>
                            </p>
                            
                        </div>
                    </div>
                    
                    <div class="form-group-separator"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">屏蔽</label>
                        
                        <div class="col-sm-10">
                            
                            <p>
                            <label class="radio-inline">
                                <input type="radio" name="radio-2" checked>
                                    否
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radio-2">
                                    是
                            </label>
                            </p>
                            
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
