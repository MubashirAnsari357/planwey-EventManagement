<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner ">
		<!-- logo start -->
		<div class="page-logo">
			<a href="index.php">
				<img alt="" src="assets/img/logo-small.png">
				<span class="logo-default">lanwey</span> </a>
		</div>
		<!-- logo end -->
		<ul class="nav navbar-nav navbar-left in">
			<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
		</ul>
		
		<!-- start mobile menu -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			<span></span>
		</a>
		<!-- end mobile menu -->
		<!-- start header menu -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<!-- start manage user dropdown -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-user"></i>&nbsp;<span class="username username-hide-on-mobile"> <?php if(isset(($_SESSION['admin_id']))) { echo "Hi, " . $_SESSION['username'];} ?></span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default animated jello">
						<li>
							<a href="view-profile.php">
								<i class="icon-user"></i> View Profile </a>
						</li>
						<!-- <li>
							<a href="edit-profile.php">
								<i class="icon-user"></i> Edit Profile </a>
						</li> -->
						<li class="divider"> </li>
						<li>
							<a href="change-password.php">
								<i class="icon-logout"></i> Change Password </a>
						</li>
						<li>
							<a href="logout.php">
								<i class="icon-logout"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- end manage user dropdown -->
			</ul>
		</div>
	</div>
</div>
<!-- end header -->