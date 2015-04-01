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
            <li class="opened active">
                <a href="dashboard-1.html">
                    <i class="linecons-cog"></i>
                    <span class="title">系统设置</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard-1.html">
                            <span class="title">基本设置</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard-2.html">
                            <span class="title">第三方API设置</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard-2.html">
                            <span class="title">版本更新</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard-2.html">
                            <span class="title">启动封面</span>
                        </a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="layout-variants.html">
                    <i class="linecons-desktop"></i>
                    <span class="title">用户中心</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('user') }}">
                            <span class="title">用户管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role') }}">
                            <span class="title">管理员管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permission') }}">
                            <span class="title">权限管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="layout-horizontal-menu.html">
                            <span class="title">虚拟用户管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="layout-horizontal-plus-sidebar.html">
                            <span class="title">默认关注管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="ui-panels.html">
                    <i class="linecons-note"></i>
                    <span class="title">内容管理</span>
                </a>
                <ul>
                    <li>
                        <a href="ui-panels.html">
                            <span class="title">FEED管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.post.index') }}">
                            <span class="title">内容管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-tabs-accordions.html">
                            <span class="title">关键词管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-modals.html">
                            <span class="title">内容审核</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="ui-widgets.html">
                    <i class="linecons-star"></i>
                    <span class="title">消息推送</span>
                </a>
                <ul>
                    <li>
                        <a href="mailbox-main.html">
                            <span class="title">通知群发</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailbox-compose.html">
                            <span class="title">消息推送</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailbox-message.html">
                            <span class="title">每日推送</span>
                        </a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="mailbox-main.html">
                    <i class="linecons-mail"></i>
                    <span class="title">数据统计</span>
                    <span class="label label-success pull-right">5</span>
                </a>
                <ul>
                    <li>
                        <a href="mailbox-main.html">
                            <span class="title">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailbox-compose.html">
                            <span class="title">Compose Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailbox-message.html">
                            <span class="title">View Message</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="tables-basic.html">
                    <i class="linecons-database"></i>
                    <span class="title">运营设置</span>
                </a>
                <ul>
                    <li>
                        <a href="tables-basic.html">
                            <span class="title">虚拟用户管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-responsive.html">
                            <span class="title">虚拟运营</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        
    </div>
    
</div>