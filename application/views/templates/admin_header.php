
<meta name="robots" content="noindex,nofollow">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/custom.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<style type="text/css">
.cf-hidden { 
	display: none; 
} 
.cf-invisible { 
	visibility: hidden; 
}
#comodoTL {
	display:block;
	font-size:8px;
	padding-left:18px;
}
.container-space { 
	margin-bottom: 50px; 
}
</style>

</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">  
<div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
<a href="<?php echo site_url('Admin'); ?>" class="site_title"><i class="fa fa-info-circle"></i> <span>Gella Fashion </span></a>
</div>
<div class="clearfix"></div>
 
<div class="profile">
<div class="profile_pic">
<img src="<?php echo base_url('assets/images/avatar_m.png'); ?>" alt="..." class="img-circle profile_img">
</div>
<div class="profile_info">
<span>Welcome Back.</span>
</div>
</div>
<br>
 
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
<div class="menu_section">
	<h3>&nbsp;  </h3>
    <ul class="nav side-menu">
    	<li><a href="<?php echo site_url('Admin'); ?>"><i class="fa fa-home"></i> Dashboard</a>
    	</li>
        <li><a><i class="fa fa-user"></i>Orders <span class="fa fa-chevron-down"></span></a>
    		<ul class="nav child_menu">
    			<li><a href="<?php echo site_url('Admin/'); ?>"><i class="fa fa-edit"></i><span class="text">New Orders</span></a></li>
    			<li><a href="<?php echo site_url('Admin/order_history'); ?>"><i class="fa fa-edit"></i><span class="text">Order History</span></a></li>
    		</ul>
    	</li>
        <li><a href="<?php echo site_url('Admin/notifications'); ?>"><i class="fa fa-envelope"></i> Notification</a>
    	</li>
        <li><a><i class="fa fa-user"></i>Category <span class="fa fa-chevron-down"></span></a>
    		<ul class="nav child_menu">
    			<li><a href="<?php echo site_url('Admin/add_category'); ?>"><i class="fa fa-edit"></i><span class="text">Add New</span></a></li>
    			<li><a href="<?php echo site_url('Admin/categories'); ?>"><i class="fa fa-edit"></i><span class="text">Manage List</span></a></li>
    		</ul>
    	</li>
        <li><a><i class="fa fa-user"></i>Products <span class="fa fa-chevron-down"></span></a>
    		<ul class="nav child_menu">
    			<li><a href="<?php echo site_url('Admin/add_product'); ?>"><i class="fa fa-edit"></i><span class="text">Add New</span></a></li>
    			<li><a href="<?php echo site_url('Admin/products'); ?>"><i class="fa fa-edit"></i><span class="text">Manage List</span></a></li>
    		</ul>
    	</li>
        <?php if ($this->session->userdata('admin_id') == 1): ?>
        <li><a><i class="fa fa-user"></i>Admin <span class="fa fa-chevron-down"></span></a>
    		<ul class="nav child_menu">
    			<li><a href="<?php echo site_url('Admin/create_new_admin'); ?>"><i class="fa fa-edit"></i><span class="text">Create Admin</span></a></li>
    			<li><a href="<?php echo site_url('Admin/manage_admins'); ?>"><i class="fa fa-edit"></i><span class="text">Manage Admins</span></a></li>
    		</ul>
    	</li>
        <li><a class="" href="<?php echo site_url('Admin/settings'); ?>"><i class="fa fa-gear"></i><span class="text">Settings</span></a></li>
        <?php endif; ?>
    	<li><a class="" href="<?php echo site_url('Admin/logout'); ?>"><i class="fa fa-sign-out"></i><span class="text">Log Out</span></a></li>
    </ul>
</div>
</div>
 
</div>
</div>
 
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                	<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                		<img src="<?php echo base_url('assets/images/avatar_m.png'); ?>" alt=""><?php echo $this->session->userdata('username'); ?> <span class=" fa fa-angle-down"></span>
                	</a>
                	<ul class="dropdown-menu dropdown-usermenu pull-right">
                		<li><a href="<?php echo site_url('Admin/settings'); ?>"><i class="fa fa-gear pull-right"></i> Settings</a></li>
                		<li><a href="<?php echo site_url('Admin/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                	</ul>
                </li>
            </ul>
        </nav>
    </div>
</div>