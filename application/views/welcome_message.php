<?php $this->load->helper('url'); ?>
<div class="login-page">
 <div id="logo"><img src="<?php echo base_url(); ?>assets/images/lisboa.png"></div>
 <div id="logo-text">
	<h1>Lisboa Concept eCard</h1>
	<p>to login, enter your email address below:</p>
 </div>
  <div class="form"> 

    <form class="login-form" method="POST" action="<?php echo base_url(); ?>index.php/login">
      <input type="text" placeholder="username"/ name="name">
      <input type="password" placeholder="password" name="password"/>
      
      <button>login</button>

    </form>
  </div>
</div>
</body>

</html>

