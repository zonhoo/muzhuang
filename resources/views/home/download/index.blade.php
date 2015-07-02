<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/2/15
 * Time: 1:49 PM
 */
 ?>

<!DOCTYPE html>
<html lang="zh-CN">

  <head>

    <meta charset="utf-8">
    <title>慕庄</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="庄里人的城市生活指南">
    <meta name="keywords" content="庄里人的城市生活指南">
    <meta name="author" content="石家庄荣鹏科技有限公司">
    <!-- Site CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://static.bootcss.com/www/assets/css/site.min.css?v5" rel="stylesheet">
    <style>
    body{padding-top:0!important; }
    .job-hot {
    	position: absolute;
    	color: #d9534f;
    	right: 0;
    	top: 15px;
    }
    </style>


  </head>
  <body class="home-template">

    <div class="jumbotron masthead">
      <div class="container">
        <h1>慕庄</h1>
        <h2>庄里人的城市生活指南</h2>
        <p class="masthead-button-links">
          <a class="btn btn-lg btn-primary btn-shadow" href="{{route('download.last')}}" >点击下载Android版</a>
        </p>
      </div>
    </div>

    <div class="container projects">

      <div class="projects-header page-header">
        <h2>慕庄介绍</h2>
      </div>

      <div class="row">

      	<div class="col-sm-6 col-md-4 col-lg-4 ">
          <div class="thumbnail">
          <img src="{{url('uploads/download/1.jpg')}}">
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 ">
          <div class="thumbnail">
          <img src="{{url('uploads/download/2.jpg')}}">
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 ">
          <div class="thumbnail">
          <img src="{{url('uploads/download/3.jpg')}}">
          </div>
        </div>


      </div>
</div><!-- /.container -->

    <footer class="footer ">
      <div class="container">

        <div class="row footer-bottom">
          <ul class="list-inline text-center">
            <li><a href="http://www.miibeian.gov.cn/" target="_blank">冀ICP备13015451号-4</a></li><li>©2015 石家庄荣鹏科技版权所有</li>
          </ul>
        </div>
      </div>
    </footer>
</body>
</html>
<!-- static home page -->