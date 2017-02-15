<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $this->load->helper('url'); session_start(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script>


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<title>Ecard | Gods Own Adobe</title>
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
						<?php if(isset($_SESSION)){  $name = $_SESSION['user_name'];   } ?>
						<li><div class="admin-name-letter"><?php if(!empty($name)){
							$word = explode(" ", $name);
							 $first_letter = substr($word[0],0, 1);
							 if(isset($word[1])){
							$second_letter = substr($word[1],0, 1);
                                }else{
									$second_letter="";
									}							 
							 } ?><h1><?php echo $first_letter.$second_letter; ?></h1><span class="hidden-xs hidden-sm"><div><b><?php if(!empty($name)){  echo $name;   } ?></b></div></span></li>
                        
						<li>  <a href="<?php echo base_url(); ?>index.php/admin/dashboard/logout"><i class="fa fa-sign-out" aria-hidden="true" ></i><span class="hidden-xs hidden-sm">logout</span></a>
                                  </li>
                        <li><a href="<?php echo base_url(); ?>index.php/users/dashboard"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Templates</span></a></li>
                        <li class=""><a href="<?php echo base_url(); ?>index.php/users/dashboard/send_mail"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Send Email</span></a></li>
                        <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Records</span></a></li>
<!--
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
-->
                        
                    </ul>
                </div>
            </div>
       <?php  if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
		  
	   redirect('/');
	 } ?>
