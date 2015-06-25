<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 6/18/15
 * Time: 3:50 PM
 */
 ?>


<div class="page-title">
   <div class="title-env">
       <h1 class="title">@if(!empty($menu)) {{trans('admin.'.$menu->name)}} @else {{ $dash }} @endif</h1>
       <p class="description">Dynamic table variants with pagination and other controls</p>
   </div>
@if(!empty($menu))
   <div class="breadcrumb-env">

       <ol class="breadcrumb bc-1">
           <li>
               <a href="{{url('admin')}}"><i class="fa-home"></i>Dashboard</a>
           </li>
           <li>
               <a>{{trans('admin.'.$fmenu->name)}}</a>
           </li>
           <li class="active">
               <strong>{{trans('admin.'.$menu->name)}}</strong>
           </li>
       </ol>
   </div>
@endif
</div>