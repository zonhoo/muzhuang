<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/20/15
 * Time: 4:25 PM
 */
 ?>

 {!! Form::open(['route'=>'search.search','role'=>'form','class'=>'form-horizontal','method'=>'get']) !!}
    {!!Form::input('text','keyword',$kw)!!}
    {!!Form::submit('搜索')!!}
 {!! Form::close() !!}
 @foreach($posts as $post)
 {{$post->title}}
 @endforeach