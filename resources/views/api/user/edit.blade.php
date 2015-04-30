<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/28/15
 * Time: 11:43 AM
 */

 ?>
 <form method="post" action="{{route('api.v1.user.update',$user->id)}}">
    <input name="_method" type="hidden" value="PATCH">
    <input type="hidden" name="_token" value="{{$token}}">
    <input name="nickname" value="{{$user->nickname}}"><br>
    <input name="signature" value="{{$user->nickname}}"><br>
    <input name="sex" value="{{$user->nickname}}"><br>
    <input type="submit" value="更新">
 </form>