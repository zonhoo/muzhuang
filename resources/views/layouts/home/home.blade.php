 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">

 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 	<meta name="description" content="Xenon Boostrap Admin Panel" />
 	<meta name="author" content="" />

 	<title>Xenon - Profile</title>

 	{!! Html::style('http://fonts.useso.com/css?family=Arimo:400,700,400italict') !!}
    {!! Html::style('style/assets/css/fonts/linecons/css/linecons.css') !!}
    {!! Html::style('style/assets/css/fonts/linecons/css/linecons.css') !!}
    {!! Html::style('style/assets/css/fonts/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('style/assets/css/bootstrap.css') !!}
    {!! Html::style('style/assets/css/xenon-core.css') !!}
    {!! Html::style('style/assets/css/xenon-forms.css') !!}
    {!! Html::style('style/assets/css/xenon-components.css') !!}
    {!! Html::style('style/assets/css/xenon-skins.css') !!}
    {!! Html::style('style/assets/css/custom.css') !!}

    {!! Html::script('style/assets/js/jquery-1.11.1.min.js') !!}

 	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 	<!--[if lt IE 9]>
 		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 	<![endif]-->


 </head>
 <body class="page-body">

 	<div class="settings-pane">

 		<a href="#" data-toggle="settings-pane" data-animate="true">
 			&times;
 		</a>

 		<div class="settings-pane-inner">

 			<div class="row">

 				<div class="col-md-4">

 					<div class="user-info">

 						<div class="user-image">
 							<a href="extra-profile.html">
 								<img src="assets/images/user-2.png" class="img-responsive img-circle" />
 							</a>
 						</div>

 						<div class="user-details">

 							<h3>
 								<a href="extra-profile.html">{{$user->name}}</a>

 								<!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
 								<span class="user-status is-online"></span>
 							</h3>

 							<p class="user-title">Web Developer</p>

 							<div class="user-links">
 								<a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
 								<a href="extra-profile.html" class="btn btn-success">Upgrade</a>
 							</div>

 						</div>

 					</div>

 				</div>

 				<div class="col-md-8 link-blocks-env">

 					<div class="links-block left-sep">
 						<h4>
 							<span>Notifications</span>
 						</h4>

 						<ul class="list-unstyled">
 							<li>
 								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
 								<label for="sp-chk1">Messages</label>
 							</li>
 							<li>
 								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
 								<label for="sp-chk2">Events</label>
 							</li>
 							<li>
 								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
 								<label for="sp-chk3">Updates</label>
 							</li>
 							<li>
 								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
 								<label for="sp-chk4">Server Uptime</label>
 							</li>
 						</ul>
 					</div>

 					<div class="links-block left-sep">
 						<h4>
 							<a href="#">
 								<span>Help Desk</span>
 							</a>
 						</h4>

 						<ul class="list-unstyled">
 							<li>
 								<a href="#">
 									<i class="fa-angle-right"></i>
 									Support Center
 								</a>
 							</li>
 							<li>
 								<a href="#">
 									<i class="fa-angle-right"></i>
 									Submit a Ticket
 								</a>
 							</li>
 							<li>
 								<a href="#">
 									<i class="fa-angle-right"></i>
 									Domains Protocol
 								</a>
 							</li>
 							<li>
 								<a href="#">
 									<i class="fa-angle-right"></i>
 									Terms of Service
 								</a>
 							</li>
 						</ul>
 					</div>

 				</div>

 			</div>

 		</div>

 	</div>

 	<div class="page-container">
 		<div class="main-content">

 			<!-- User Info, Notifications and Menu Bar -->
 			<nav class="navbar user-info-navbar" role="navigation">

 				<!-- Left links for user info navbar -->
 				<ul class="user-info-menu left-links list-inline list-unstyled">

 					<li class="hidden-sm hidden-xs">
 						<a href="#" data-toggle="sidebar">
 							<i class="fa-bars"></i>
 						</a>
 					</li>

 					<li class="dropdown hover-line">
 						<a href="#" data-toggle="dropdown">
 							<i class="fa-envelope-o"></i>
 							<span class="badge badge-green">15</span>
 						</a>

 						<ul class="dropdown-menu messages">
 							<li>

 								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">

 									<li class="active"><!-- "active" class means message is unread -->
 										<a href="#">
 											<span class="line">
 												<strong>Luc Chartier</strong>
 												<span class="light small">- yesterday</span>
 											</span>

 											<span class="line desc small">
 												This ain’t our first item, it is the best of the rest.
 											</span>
 										</a>
 									</li>

 									<li class="active">
 										<a href="#">
 											<span class="line">
 												<strong>Salma Nyberg</strong>
 												<span class="light small">- 2 days ago</span>
 											</span>

 											<span class="line desc small">
 												Oh he decisively impression attachment friendship so if everything.
 											</span>
 										</a>
 									</li>

 									<li>
 										<a href="#">
 											<span class="line">
 												Hayden Cartwright
 												<span class="light small">- a week ago</span>
 											</span>

 											<span class="line desc small">
 												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
 											</span>
 										</a>
 									</li>

 									<li>
 										<a href="#">
 											<span class="line">
 												Sandra Eberhardt
 												<span class="light small">- 16 days ago</span>
 											</span>

 											<span class="line desc small">
 												On so attention necessary at by provision otherwise existence direction.
 											</span>
 										</a>
 									</li>

 									<!-- Repeated -->

 									<li class="active"><!-- "active" class means message is unread -->
 										<a href="#">
 											<span class="line">
 												<strong>Luc Chartier</strong>
 												<span class="light small">- yesterday</span>
 											</span>

 											<span class="line desc small">
 												This ain’t our first item, it is the best of the rest.
 											</span>
 										</a>
 									</li>

 									<li class="active">
 										<a href="#">
 											<span class="line">
 												<strong>Salma Nyberg</strong>
 												<span class="light small">- 2 days ago</span>
 											</span>

 											<span class="line desc small">
 												Oh he decisively impression attachment friendship so if everything.
 											</span>
 										</a>
 									</li>

 									<li>
 										<a href="#">
 											<span class="line">
 												Hayden Cartwright
 												<span class="light small">- a week ago</span>
 											</span>

 											<span class="line desc small">
 												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
 											</span>
 										</a>
 									</li>

 									<li>
 										<a href="#">
 											<span class="line">
 												Sandra Eberhardt
 												<span class="light small">- 16 days ago</span>
 											</span>

 											<span class="line desc small">
 												On so attention necessary at by provision otherwise existence direction.
 											</span>
 										</a>
 									</li>

 								</ul>

 							</li>

 							<li class="external">
 								<a href="blank-sidebar.html">
 									<span>All Messages</span>
 									<i class="fa-link-ext"></i>
 								</a>
 							</li>
 						</ul>
 					</li>

 					<li class="dropdown hover-line">
 						<a href="#" data-toggle="dropdown">
 							<i class="fa-bell-o"></i>
 							<span class="badge badge-purple">7</span>
 						</a>

 						<ul class="dropdown-menu notifications">
 							<li class="top">
 								<p class="small">
 									<a href="#" class="pull-right">Mark all Read</a>
 									You have <strong>3</strong> new notifications.
 								</p>
 							</li>

 							<li>
 								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
 									<li class="active notification-success">
 										<a href="#">
 											<i class="fa-user"></i>

 											<span class="line">
 												<strong>New user registered</strong>
 											</span>

 											<span class="line small time">
 												30 seconds ago
 											</span>
 										</a>
 									</li>

 									<li class="active notification-secondary">
 										<a href="#">
 											<i class="fa-lock"></i>

 											<span class="line">
 												<strong>Privacy settings have been changed</strong>
 											</span>

 											<span class="line small time">
 												3 hours ago
 											</span>
 										</a>
 									</li>

 									<li class="notification-primary">
 										<a href="#">
 											<i class="fa-thumbs-up"></i>

 											<span class="line">
 												<strong>Someone special liked this</strong>
 											</span>

 											<span class="line small time">
 												2 minutes ago
 											</span>
 										</a>
 									</li>

 									<li class="notification-danger">
 										<a href="#">
 											<i class="fa-calendar"></i>

 											<span class="line">
 												John cancelled the event
 											</span>

 											<span class="line small time">
 												9 hours ago
 											</span>
 										</a>
 									</li>

 									<li class="notification-info">
 										<a href="#">
 											<i class="fa-database"></i>

 											<span class="line">
 												The server is status is stable
 											</span>

 											<span class="line small time">
 												yesterday at 10:30am
 											</span>
 										</a>
 									</li>

 									<li class="notification-warning">
 										<a href="#">
 											<i class="fa-envelope-o"></i>

 											<span class="line">
 												New comments waiting approval
 											</span>

 											<span class="line small time">
 												last week
 											</span>
 										</a>
 									</li>
 								</ul>
 							</li>

 							<li class="external">
 								<a href="#">
 									<span>View all notifications</span>
 									<i class="fa-link-ext"></i>
 								</a>
 							</li>
 						</ul>
 					</li>

 				</ul>


 				<!-- Right links for user info navbar -->
 				<ul class="user-info-menu right-links list-inline list-unstyled">

 					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

 						<form method="get" action="extra-search.html">
 							<input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />

 							<button type="submit" class="btn btn-link">
 								<i class="linecons-search"></i>
 							</button>
 						</form>

 					</li>

 					<li class="dropdown user-profile">
 						<a href="#" data-toggle="dropdown">
 							<img src="assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
 							<span>
 								Arlind Nushi
 								<i class="fa-angle-down"></i>
 							</span>
 						</a>

 						<ul class="dropdown-menu user-profile-menu list-unstyled">
 							<li>
 								<a href="#edit-profile">
 									<i class="fa-edit"></i>
 									New Post
 								</a>
 							</li>
 							<li>
 								<a href="#settings">
 									<i class="fa-wrench"></i>
 									Settings
 								</a>
 							</li>
 							<li>
 								<a href="#profile">
 									<i class="fa-user"></i>
 									Profile
 								</a>
 							</li>
 							<li>
 								<a href="#help">
 									<i class="fa-info"></i>
 									Help
 								</a>
 							</li>
 							<li class="last">
 								<a href="extra-lockscreen.html">
 									<i class="fa-lock"></i>
 									Logout
 								</a>
 							</li>
 						</ul>
 					</li>

 					<li>
 						<a href="#" data-toggle="chat">
 							<i class="fa-comments-o"></i>
 						</a>
 					</li>

 				</ul>

 			</nav>
 			<div class="page-title">

 				<div class="title-env">
 					<h1 class="title">Profile</h1>
 					<p class="description">User profile and story timeline</p>
 				</div>

 					<div class="breadcrumb-env">

 								<ol class="breadcrumb bc-1">
 									<li>
 							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
 						</li>
 								<li>

 										<a href="extra-gallery.html">Extra</a>
 								</li>
 							<li class="active">

 										<strong>Profile</strong>
 								</li>
 								</ol>

 				</div>

 			</div>
 			<section class="profile-env">

 				<div class="row">

 					<div class="col-sm-3">

 						<!-- User Info Sidebar -->
 						<div class="user-info-sidebar">

 							<a href="#" class="user-img">
 								<img src="assets/images/user-4.png" alt="user-img" class="img-cirlce img-responsive img-thumbnail" />
 							</a>

 							<a href="#" class="user-name">
 								{{$user->name}}
 								<span class="user-status is-online"></span>
 							</a>

 							<span class="user-title">
 								CEO at <strong>Google</strong>
 							</span>

 							<hr />

 							<ul class="list-unstyled user-info-list">
 							<li>
 								<i class="fa-home"></i>
 								Prishtina, Kosovo
 							</li>
 							<li>
 								<i class="fa-briefcase"></i>
 								<a href="#">Laborator</a>
 							</li>
 							<li>
 								<i class="fa-graduation-cap"></i>
 								University of Bologna
 							</li>
 						</ul>

 							<hr />

 							<ul class="list-unstyled user-friends-count">
 								<li>
 									<span>643</span>
 									followers
 								</li>
 								<li>
 									<span>108</span>
 									following
 								</li>
 							</ul>

 							<button type="button" id="follow" class="btn btn-success btn-block text-left">
 								关注
 								<i class="fa-check pull-right"></i>
 							</button>
 						</div>

 					</div>

 					<div class="col-sm-9">

 						<!-- User Post form and Timeline -->
 						<form method="post" action="" class="profile-post-form">
 							<textarea class="form-control input-unstyled input-lg autogrow" placeholder="What's on your mind?"></textarea>
 							<i class="el-edit block-icon"></i>

 							<ul class="list-unstyled list-inline form-action-buttons">
 								<li>
 									<button type="button" class="btn btn-unstyled">
 										<i class="el-camera"></i>
 									</button>
 								</li>
 								<li>
 									<button type="button" class="btn btn-unstyled">
 										<i class="el-attach"></i>
 									</button>
 								</li>
 								<li>
 									<button type="button" class="btn btn-unstyled">
 										<i class="el-mic"></i>
 									</button>
 								</li>
 								<li>
 									<button type="button" class="btn btn-unstyled">
 										<i class="el-music"></i>
 									</button>
 								</li>
 							</ul>

 							<button type="submit" class="btn btn-single btn-xs btn-success post-story-button">Post</button>
 						</form>


 						<!-- User timeline stories -->
 						<section class="user-timeline-stories">

 							<!-- Timeline Story Type: Status -->
 							<article class="timeline-story">

 								<i class="fa-paper-plane-empty block-icon"></i>

 								<!-- User info -->
 								<header>

 									<a href="#" class="user-img">
 										<img src="assets/images/user-4.png" alt="user-img" class="img-responsive img-circle" />
 									</a>

 									<div class="user-details">
 										<a href="#">Art Ramadani</a> posted a status <a href="#">update</a>.
 										<time>12 hours ago</time>
 									</div>

 								</header>

 								<div class="story-content">
 									<!-- Story Content Wrapped inside Paragraph -->
 									<p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>

 									<!-- Story Options Links -->
 									<div class="story-options-links">
 										<a href="#">
 											<i class="linecons-heart"></i>
 											Like
 											<span>(3)</span>
 										</a>

 										<a href="#">
 											<i class="linecons-comment"></i>
 											Comments
 											<span>(5)</span>
 										</a>
 									</div>


 									<!-- Story Comments -->
 									<ul class="list-unstyled story-comments">
 										<li>

 											<div class="story-comment">
 												<a href="#" class="comment-user-img">
 													<img src="assets/images/user-2.png" alt="user-img" class="img-circle img-responsive" />
 												</a>

 												<div class="story-comment-content">
 													<a href="#" class="story-comment-user-name">
 														Arlind Nushi
 														<time>28 September 2014 - 00:36</time>
 													</a>

 													<p>Him these are visit front end for seven walls. Money eat scale now ask law learn.</p>
 												</div>
 											</div>

 										</li>
 										<li>

 											<div class="story-comment">
 												<a href="#" class="comment-user-img">
 													<img src="assets/images/user-3.png" alt="user-img" class="img-circle img-responsive" />
 												</a>

 												<div class="story-comment-content">
 													<a href="#" class="story-comment-user-name">
 														Eroll Maxhuni
 														<time>01 September 2014 - 00:36</time>
 													</a>

 													<p>Taken no great widow spoke of it small. Genius use except son esteem merely her limits.</p>
 												</div>
 											</div>

 										</li>
 									</ul>

 									<form method="post" action="" class="story-comment-form">
 										<textarea class="form-control input-unstyled autogrow" placeholder="Reply..."></textarea>
 									</form>
 								</div>

 							</article>

 							<!-- Timeline Story Type: Audio -->
 							<article class="timeline-story">

 								<i class="fa-music block-icon"></i>

 								<!-- User info -->
 								<header>

 									<a href="#" class="user-img">
 										<img src="assets/images/user-4.png" alt="user-img" class="img-responsive img-circle" />
 									</a>

 									<div class="user-details">
 										<a href="#">Art Ramadani</a> posted an audio <a href="#">track</a>.
 										<time>22 hours ago</time>
 									</div>

 								</header>

 								<!-- Audio Track -->
 								<div class="story-audio-item">
 									<div class="story-content">

 										<div class="audio-track-info">
 											<div class="artist-info">MC Kresha - Emceeclopedy</div>
 											<div class="track-length">2:14 - 4:31</div>
 										</div>

 										<div class="audio-track-timeline">
 											<div class="play-pause">
 												<a href="#">
 													<i class="fa-to-start"></i>
 												</a>
 												<a href="#">
 													<i class="fa-pause"></i>
 												</a>
 												<a href="#">
 													<i class="fa-to-end"></i>
 												</a>
 											</div>

 											<div class="track-timeline">
 												<div class="track-timeline-empty">
 													<div class="track-fill" style="width:49.4%"></div>
 												</div>
 											</div>

 											<div class="track-volume">
 												<a href="#">
 													<i class="fa-volume-up"></i>
 												</a>
 											</div>
 										</div>

 									</div>
 								</div>

 								<div class="story-content">

 									<!-- Story Options Links -->
 									<div class="story-options-links">
 										<a href="#" class="liked">
 											<i class="linecons-heart"></i>
 											Like
 											<span>(10)</span>
 										</a>

 										<a href="#">
 											<i class="linecons-comment"></i>
 											Comments
 											<span>(0)</span>
 										</a>
 									</div>

 									<form method="post" action="" class="story-comment-form">
 										<textarea class="form-control input-unstyled autogrow" placeholder="Reply..."></textarea>
 									</form>

 								</div>

 							</article>

 							<!-- Timeline Story Type: Check-in -->
 							<article class="timeline-story">

 								<i class="fa-pin block-icon"></i>

 								<!-- User info -->
 								<header>

 									<a href="#" class="user-img">
 										<img src="assets/images/user-4.png" alt="user-img" class="img-responsive img-circle" />
 									</a>

 									<div class="user-details">
 										<a href="#">Art Ramadani</a> checked in at <a href="#">Laborator</a>.
 										<time>1 day ago</time>
 									</div>

 								</header>


 								<div class="story-content">

 									<div class="story-checkin">
 										<div id="sample-checkin" class="map-checkin" style="height: 180px; width: 100%;"></div>
 									</div>

 									<!-- Story Options Links -->
 									<div class="story-options-links">
 										<a href="#">
 											<i class="linecons-heart"></i>
 											Like
 											<span>(4)</span>
 										</a>

 										<a href="#">
 											<i class="linecons-comment"></i>
 											Comment
 											<span>(1)</span>
 										</a>
 									</div>


 									<!-- Story Comments -->
 									<ul class="list-unstyled story-comments">
 										<li>

 											<div class="story-comment">
 												<a href="#" class="comment-user-img">
 													<img src="assets/images/user-1.png" alt="user-img" class="img-circle img-responsive" />
 												</a>

 												<div class="story-comment-content">
 													<a href="#" class="story-comment-user-name">
 														Ylli Pylla
 														<time>19 August 2014 - 00:36</time>
 													</a>

 													<p>Appear an manner as no limits either praise in. In in written on charmed justice is amiable farther besides.</p>
 												</div>
 											</div>

 										</li>
 									</ul>

 									<form method="post" action="" class="story-comment-form">
 										<textarea class="form-control input-unstyled autogrow" placeholder="Reply..."></textarea>
 									</form>

 								</div>

 							</article>

 							<!-- Timeline Story Type: Photos -->
 							<article class="timeline-story">

 								<i class="fa-camera-retro block-icon"></i>

 								<!-- User info -->
 								<header>

 									<a href="#" class="user-img">
 										<img src="assets/images/user-4.png" alt="user-img" class="img-responsive img-circle" />
 									</a>

 									<div class="user-details">
 										<a href="#">Art Ramadani</a> added <strong>3</strong> photos to <a href="#">Holiday Trip</a> album.
 										<time>a week ago</time>
 									</div>

 								</header>

 								<div class="story-content">

 									<div class="story-album">
 										<div class="col-1">
 											<a href="#">
 												<img src="assets/images/image-1.jpg" alt="album-image" class="img-responsive" />
 											</a>
 										</div>
 										<div class="col-2">
 											<a href="#" class="base-padding">
 												<img src="assets/images/image-2.jpg" alt="album-image" class="img-responsive" />
 											</a>
 											<div class="vspacer v2"></div>
 											<a href="#">
 												<img src="assets/images/image-3.jpg" alt="album-image" class="img-responsive" />
 											</a>
 										</div>
 									</div>

 									<!-- Story Options Links -->
 									<div class="story-options-links">
 										<a href="#" class="liked">
 											<i class="linecons-heart"></i>
 											Like
 											<span>(2)</span>
 										</a>

 										<a href="#">
 											<i class="linecons-comment"></i>
 											Comments
 											<span>(0)</span>
 										</a>
 									</div>

 									<form method="post" action="" class="story-comment-form">
 										<textarea class="form-control input-unstyled autogrow" placeholder="Reply..."></textarea>
 									</form>

 								</div>

 							</article>

 						</section>

 					</div>

 				</div>

 			</section>



 			<!-- Main Footer -->
 			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
 			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
 			<!-- Or class "fixed" to  always fix the footer to the end of page -->
 			<footer class="main-footer sticky footer-type-1">

 				<div class="footer-inner">

 					<!-- Add your copyright text here -->
 					<div class="footer-text">
 						&copy; 2014
 						<strong>Xenon</strong>
 						theme by <a href="http://laborator.co" target="_blank">Laborator</a>
 					</div>


 					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
 					<div class="go-up">

 						<a href="#" rel="go-top">
 							<i class="fa-angle-up"></i>
 						</a>

 					</div>

 				</div>

 			</footer>
 		</div>



 	</div>


    <!--Import styles on this page-->
    @yield('style')

	<!-- Bottom Scripts -->
    {!! Html::script('style/assets/js/bootstrap.min.js') !!}
    {!! Html::script('style/assets/js/TweenMax.min.js') !!}
    {!! Html::script('style/assets/js/resizeable.js') !!}
    {!! Html::script('style/assets/js/joinable.js') !!}
    {!! Html::script('style/assets/js/xenon-api.js') !!}
    {!! Html::script('style/assets/js/xenon-toggles.js') !!}

    <!--Import script on this page-->
    @yield('script')

	<!-- JavaScripts initializations and stuff -->
    {!! Html::script('style/assets/js/xenon-custom.js') !!}

 </body>
 </html>