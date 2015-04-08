<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
<div class="sidebar-menu toggle-others fixed">
    
    <div class="sidebar-menu-inner">
        
        <header class="logo-env">
            
            <!-- logo -->
            <div class="logo">
                <a href="##" class="logo-expanded">
                    {!! Html::image('style/assets/images/logo@2x.png',null,['width'=>'80']) !!}
                </a>
                
                <a href="##" class="logo-collapsed">
                    {!! Html::image('style/assets/images/user-2.png',null,['width'=>'40']) !!}
                </a>
            </div>
            
            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>
                
                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>
            
            <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
            <div class="settings-icon">
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>
            </div>
            
            
        </header>
        
        
        
        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            @foreach($categorize as $key=>$cate)
                <li class="@if($currentpid==$cate['id']) opened active @endif">
                    <a href="@if(!empty($cate['route_name'])){{route($cate['route_name'])}}@else#@endif">
                        <i class="{{$cate['icon']}}"></i>
                        <span class="title">{{trans('admin.'.$cate['name'])}}</span>
                    </a>
                    <ul>
                    @foreach($cate['child'] as $k=>$v)
                        <li @if($v['route_name']==$currentname) class="active" @endif>
                            <a href="@if(!empty($v['route_name'])){{route($v['route_name'])}}@else#@endif">
                                <span class="title">{{trans('admin.'.$v['name'])}}</span>
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </li>
            @endforeach


        </ul>
        
    </div>
    
</div>