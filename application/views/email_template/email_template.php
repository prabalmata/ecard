<!DOCTYPE html><html><head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <title>Ecard Gods Own Abobe</title>

   <style>
* { box-sizing: border-box; text-align: center; }
html, body { min-height: 100vh; }
a { text-decoration: none; }
a img { border: 0 none white; }
html { font-family: 'Times New Roman',新細明體,PMingLiU,serif }

html, body, header, main, footer {
   margin: 0;
   padding: 0;
  
   }

img {
   display: block;
   }


h2{ font-size:16pt; text-transform:capitalize; color:#222; margin:2px 0px 5px; font-weight:normal;}
h1{ font-size:16pt; text-transform:capitalize; color:#222; margin:2px 0px 5px; font-weight:normal;}
.email-container{ border-bottom: 1px solid #222222;
    box-shadow: 0 2px 9px 1px #222222;
    display: block;
    margin: 0 auto;
    max-width:900px;
    padding: 20px 0 40px;
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

   .footer img {
      
      max-width: 120px;
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
   #text {font-size: 60%;}
}
   </style>
         

</head>
<body>
<div class="email-container">
   <header>
<!--
      <img id="logo" src="<?php echo base_url(); ?>assets/images/top-logo.png" />
-->
     <img id="logo" src="<?php echo base_url(); ?>[ecard-logo-image-head]"  style="margin:0px auto; max-width: 150px;"/>
       
   </header>
   <main>
      <div id="video">
         <div style="position: absolute; right: 0; top: -2em; font-weight: bold">
            <a href="#" style="color: rgb(159,130,53)">EN</a>
            <a href="#" style="color: rgb(159,130,53)"></a>
         </div>
        
         <a href="[href]"><img id="placeholder" src="<?php echo base_url(); ?>[ecard-email-image]"  style="margin:0px auto; height:100%; width:100%;"/></a>
        
      </div>
<!--
		<span><a style="background:#76922c; color:#fff; padding:4px 8px; border-radius:4px; margin-bottom:8px;" href="[readmore]">Read more</a></span> 
		
-->
		 <div id="text">
			  <h2 style="margin-top:8px;">[msg-1][to-name],</h2>
				<h2>[msg-2]<br> <span>[from-name]</span></h2>
				<h2>[company]</h2>
			  <h1>[msg]</h1>
			  
			  
			 
		  </div>
     
   </main>
   <footer class='footer'>
	   <img id="logo" src="<?php echo base_url(); ?>[ecard-logo-image-foot]"  style="margin:0px auto; height:50%; width:50%;"/>

</footer>
   <script>

</script>
</div>
</body></html>
