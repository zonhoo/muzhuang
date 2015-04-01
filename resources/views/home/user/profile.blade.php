<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/3/27
 * Time: 下午3:26
 */
?>
@extends('layouts.home.home')
@section('script')
<script>
$('#follow').click(function(){
    $_token = "{{ csrf_token()}}";
    $_route = "{{route('unfollow')}}";
    $.post(
        $_route,
        {'followed_id':'{{ $user->id }}',_token: $_token},
        function(data,status){
            if(status=='success'){
                alert(data.followed_id);
                $('#follow').html(data.msg);
            }
        },
        'json'
    );

});

</script>
@stop