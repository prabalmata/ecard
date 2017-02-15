<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<title>Ecard | Gods Own Adobe </title>
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
<!--
                    <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
-->
                </div>
                <div class="navi">
                    <ul>
						<?php $this->load->helper('url'); ?>
						<li><span class="hidden-xs hidden-sm"><?php if(isset($_SESSION)){  echo $_SESSION['admin_name'];   } ?></span></li>
						
						<li>        <a href="<?php echo base_url(); ?>index.php/users/dashboard/logout"><i class="fa fa-sign-out" aria-hidden="true" ></i><span class="hidden-xs hidden-sm">logout</span></a>
                               </li>
						<li class="admin-detail"><div style="margin-left:60px;"><i class="fa fa-user" aria-hidden="true"></i><b>ADMIN</b></div></li>
                       <li><a href="<?php echo base_url(); ?>index.php/admin/dashboard/all_user"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">USERS</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/dashboard"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">TEMPLATES</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/dashboard/report"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">REPORTS</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/company"><i class="fa fa-building-o" aria-hidden="true"></i><span class="hidden-xs hidden-sm">COMPANIES</span></a></li>
                        
                    </ul>
                </div>
            </div>
   <?php  
   session_start();
   if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
	 redirect('/');
	 }  ?>
