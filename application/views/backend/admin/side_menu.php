
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		<div class="sidebar sidebar-main">
			<div class="sidebar-content">
				<!-- User menu -->
				<div class="sidebar-user">
					<div class="category-content">
						<div class="media">
							<a href="#" class="media-left"><img width=100% src="<?php echo base_url('assets/images/logo.jpg') ?>" alt=""></a>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div  class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">
							
							<!-- Main -->
							<!-- <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li> -->
							<li class="<?php echo $active_nav =="dashboard"?"active":""; ?>"><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
							<li class="<?php echo $active_nav =="order_filter"?"active":""; ?>"><a href="<?php echo base_url('dashboard/order_filter') ?>"><i class="icon-stack3"></i> <span>Orders</span></a></li>
							<li>
								<a href="#"><i class="icon-stack2"></i> <span>Packages</span></a>
								<ul>
									<li class="<?php echo $active_nav =="package"?"active":""; ?>"><a href="<?php echo base_url('dashboard/add_package') ?>">Add Package</a></li>
									<li class="<?php echo $active_nav =="get_package_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard/package_list') ?>">Package List</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-stack2"></i> <span>Items</span></a>
								<ul>
									<li class="<?php echo $active_nav =="item"?"active":""; ?>"><a href="<?php echo base_url('dashboard/add_item') ?>">Add Item</a></li>
									<li class="<?php echo $active_nav =="get_item_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard/item_list') ?>">Item List</a></li>
								</ul>
							</li>		
							<li>
								<a href="#"><i class="icon-stack2"></i> <span>Delivery Address</span></a>
								<ul>
									<li class="<?php echo $active_nav =="delivery_address"?"active":""; ?>"><a href="<?php echo base_url('dashboard/add_delivery_address') ?>">Add Delivery Address</a></li>
									<li class="<?php echo $active_nav =="get_delivery_address_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard/delivery_address_list') ?>">Delivery Address List</a></li>
								</ul>
							</li>
							<li >
								<a href="#"><i class="icon-stack2"></i> <span>Settings</span></a>
								<ul>
									<li>
										<a href="#"><i class="icon-stack2"></i><span>Slider</span></a>
										<ul>
											<li class="<?php echo $active_nav =="slider"?"active":""; ?>"><a href="<?php echo base_url('dashboard/add_work_slider') ?>">Add New Slider</a></li>
											<li class="<?php echo $active_nav =="get_work_slider_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard/work_slider_list') ?>">Slider List</a></li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="icon-stack2"></i><span>Users</span></a>
										<ul>
											<li class="<?php echo $active_nav =="users"?"active":""; ?>"><a href="<?php echo base_url('dashboard/add_users') ?>">Add User</a></li>
											<li class="<?php echo $active_nav =="users_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard/users_list') ?>">User List</a></li>
										</ul>
									</li>
									<li class="<?php echo $active_nav =="website_settings"?"active":""; ?>"><a href="<?php echo base_url('dashboard/settings') ?>"><i class="icon-stack3"></i> <span>Homepage Settings</span></a></li>
								</ul>

							</li>
						</ul>
					</div>
				</div>
				<!-- /main navigation -->

			</div>
		</div>
	</body>
</html>		