 <?php  if(!isset($_GET['card_id']) && empty($_GET['card_id'])){
	   redirect('/users/dashboard/');
	 } ?>
	 
<!DOCTYPE html><html><head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <title>Ecard Gods Own Abobe</title>

   <style>
   div#video {
    margin: 10px 0px 30px;
}
* { box-sizing: border-box; text-align: center; }
html, body { min-height: 100vh; }
a { text-decoration: none; }
a img { border: 0 none white; }
html { font-family: 'Times New Roman',新細明體,PMingLiU,serif }

html, body, header, main, footer {
   margin: 0;
   padding: 0;
   width:100%;
   }

img {
   display: block;
   }

body {
   display: flex;
   flex-flow: column nowrap;
   }

header img {
   margin: 1em auto;
   height: 120px;
   }
main {
   align-items: center;
   display: flex;
   flex-flow: column nowrap;
   justify-content: center;
   }
   main div {
      position: relative;
      text-align: center;
      }
      main #video img {
         position: absolute;
         margin: auto;
         top: 0;
         bottom: 0;
         left: 0;
         right: 0;
         max-width: 70vw;
         max-height: 60vh;
         }
      main video, #novideo {
         max-width: 70vw;
         max-height: 60vh;
         }
      main div h1, main div h2 {
         margin: 0;
         }
         main div h1 {
            color: #005930;
            }
footer {
   align-items: flex-end;
   display: flex;
   flex-flow: row wrap;
   justify-content: center;
   margin-bottom: 1em;
   }
   .footer img {
      max-width: 150px;
      margin: 1ex 1ex 0;
      display: inline-block;
      }

@media (max-width: 1366px) {
   #text {
      font-size: 80%;
      }
      .footer img {
         max-height: 60px;
         max-width: 90px;
         }
}

@media (max-width: 1024px) {
   main #placeholder {
      max-width: 95vw;
      max-height: 80vh;
      }
   main video, #novideo {
      max-width: 95vw;
      max-height: 80vh;
      }
}

@media (max-width: 768px) {
   #text {
      font-size: 60%;
      }
}
   </style>
         <!--[if IE]>
   <style>
      img { display: inline-block; }
      a img { width: 120px; }
   </style>
         <![endif]-->

</head>
<body>
   <header>
      <img id="logo" src="<?php echo base_url();echo $logo; ?>" />
   </header>
   <main>
      <div id="video">
         <div style="position: absolute; right: 0; top: -2em; font-weight: bold">
            <a href="#" style="color: rgb(159,130,53)" onclick="toggle('en')">EN</a>
            <a href="#" style="color: rgb(159,130,53)" onclick="toggle('zh')">中</a>
         </div>
         
       
         <img id="placeholder" src="<?php echo base_url(); ?><?php echo $card['ecard_email_image']; ?>" />
         <video loop="loop" preload="auto">
            <source src="<?php echo base_url(); ?><?php echo $card['ecard_animation']; ?>" type="video/mp4" class="video-mpeg">
         </video>
        
      </div>
      <?php
		
		if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en'){
			?>
		 <div id="text">
			  <h2>Dear, <?php echo $_COOKIE["to_name"]; ?></h2>
			 
			  <h1><?php echo $_COOKIE["card_message_en"]; ?></h1>
			 
			  <h2>Best Regards, <br> <?php echo $_COOKIE["from_name"]; ?></h2>
			  
		  </div>
			<?php
			
		}else if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'zh'){
		?>
		 <div id="text">
			  <h2>親愛的 <?php echo $_COOKIE["to_name"]; ?>,</h2>
			
			  <h1><?php echo $_COOKIE["card_message_zh"]; ?></h1>
			
			  <h2>祝你聖誕快樂 <br> <?php echo $_COOKIE["from_name"]; ?></h2>
			 
		  </div>
		
		<?php
		}		
	   ?>
     
   </main>
   <footer class='footer'>
      <img id="logo" src="<?php echo base_url();echo $logo; ?>" />
      </footer>
   <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
   <script>
	jQuery(document).ready(function(){
		jQuery('#placeholder').on('click', function(){
			jQuery('#placeholder').remove();
			jQuery('video').trigger('play');
		});
	});
</script>
</body></html>
