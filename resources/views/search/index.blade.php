<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 4/20/15
 * Time: 5:07 PM
 */
 ?>
  {!! Form::open(['route'=>'search.search','role'=>'form','class'=>'form-horizontal','method'=>'get']) !!}
     {!!Form::input('text','keyword')!!}
     {!!Form::submit('搜索')!!}
  {!! Form::close() !!}