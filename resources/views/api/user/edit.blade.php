<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/28/15
 * Time: 11:43 AM
 */

 ?>
 <form method="post" action="{{route('api.v1.user.store')}}">

    <input name="nickname" value="{{$user->nickname}}"><br>
    <input name="signature" value="{{$user->signature}}"><br>
    <input name="sex" value="{{$user->sex}}"><br>
    <input type="submit" value="更新">
 </form>