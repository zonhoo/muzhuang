@extends('...layouts.admin.admin')

@section('content')
<div class="page-error centered">
    
    <div class="error-symbol">
        <i class="fa-warning"></i>
    </div>
    
    <h2>
        您没有操作权限
    </h2>
    
    
</div>

<div class="page-error-search centered">
    
    <a href="#" class="go-back">
        <i class="fa-angle-left"></i>
        <span id="jumpTo">5</span>秒后自动跳转到上一页
        <script type="text/javascript">countDown(5,'#');</script>
    </a>
</div>

@stop
@section('style')
<!-- Imported styles on this page -->
{!! Html::style('style/assets/css/fonts/meteocons/css/meteocons.css') !!}

@stop

@section('script')
<script type="text/javascript">
    function countDown(secs,surl){
        //alert(surl);
        var jumpTo = document.getElementById('jumpTo');
        jumpTo.innerHTML=secs;
        if(--secs>0){
            setTimeout("countDown("+secs+",'"+surl+"')",1000);
        }
        else{
            location.href=surl;
        }        
    }        
</script>
<!-- Imported scripts on this page -->
{!! Html::script('style/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('style/assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js') !!}
{!! Html::script('style/assets/js/xenon-widgets.js') !!}
@stop