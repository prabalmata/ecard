 <div class="col-md-10 col-sm-11 display-table-cell v-align send-your-greetings"
 <?php

	if(isset($_GET['id'])){
		echo "style='background-image: url(/ecard/".$admincard->ecard_form_background.")'";
	}else{
		echo "style='background-image: url(/img/frontend2a.jpg)'";
	}
 ?>>
 
                
<div class="user-dashboard">
<body class="send-greeting-page">
	<section id="page-all-content" class="page-all-content float-100">
    	<div class="float-100 greeting-page-content">
        	<div class="page-send-greetings float-100">
                <div class="send-greetings-form">
                    <h1 class="send-greetings-header">Send Your Greetings</h1>
                    <form class="send-message-form" method="POST" action="" id="user_card_mail_form">
						<select name="from_admin_card"  id="from_admin_card" class="input from-admin-card">
							<option  value="" >Please Select</option>
						<?php foreach($cardrow as $key => $cardres){ 
							?>
							<option  value="<?php echo $cardres->id; ?>" 
								<?php
								if(isset($_GET['id'])){
									if($_GET['id'] == $cardres->id){
										echo "selected='selected'";
									}
								}
								?>
							 ><?php echo $cardres->ecard_title; ?></option>
								<?php
						} ?>
						</select>
						<span id="error_from_admin_card" class="error-span"></span>
						<div id="admin_res"></div>
                        <div class="send-greetings-row row1">
                         <div class="form-type">   <label for="from_name">Your Name</label>
								<input  id="from_name" class="input" name="from_name" id="from_name" type="text" value="" autofocus />
								<span id="error_from_name" class="error-span"></span>
                          </div>
                           <div class="form-type"> <label for="from_title">Your Position / Title</label>
								<input  id="from_title" class="input" name="from_title" id="from_title" type="text" value=""  />
								<span id="error_from_title" class="error-span"></span>
                          </div>
                          <div class="form-type"><label for="from_company">Your Company</label></div>
                         <div class="form-type">   
						 <select id="from_company" name="from_company" class="input">
							 <option value="">-- Please select --</option>
							    
								<?php 
								foreach($company_list as $company){
								?>
								<option value="<?php echo $company->name; ?>"><?php echo $company->name; ?></option>
								<?php } ?>
<!--
								<option value="Hotel Lisboa">Hotel Lisboa</option>
								<option value="Grand Lisboa Hotel">Grand Lisboa Hotel</option>
								<option value="Lisboa Hotels Complex">Lisboa Hotels Complex</option>
								<option value="Hotel Sintra">Hotel Sintra</option>
								<option value="Fortaleza do Guincho">Fortaleza do Guincho</option>
								<option value="Hotel Whitcomb">Hotel Whitcomb</option>
								<option value="Lisboa Food  Wines Limited">Lisboa Food  Wines Limited</option>
								<option value="New Yaohan">New Yaohan</option>
								<option value="CITS Zhuhai">CITS Zhuhai</option>
								<option value="Estoril Tours Travel Agency, Ltd">Estoril Tours Travel Agency, Ltd</option>
								<option value="Estoril Travel Int'l">Estoril Travel Int'l</option>
								<option value="Shun Tak Travel">Shun Tak Travel</option>
								<option value="New Sintra Tours">New Sintra Tours </option>
								<option value="STDM Tours">STDM Tours</option>
								<option value="STDM Shipping">STDM Shipping</option>
                           
-->
 </select>
								<span id="error_from_company" class="error-span"></span>
							</div>
                          <div class="form-type"> 
							  <label for="to_name">Recipient's Name</label>
							  <input  id="to_name" class="input" name="to_name" id="to_name" type="text" value=""  />
							  <span id="error_to_name" class="error-span"></span>
						  </div>
                           <div class="form-type"> 
							<label for="to_email">Recipient's Email Address</label>
							<input  id="to_email" class="input" name="to_email" type="text" value=""  />
							<span id="error_to_email" class="error-span"></span>
						   </div>
                           <div class="form-type"> 
						   <label for="card_message_en">Card message (English)</label>
                         <select id="card_message_en" class="input" name="card_message_en">
                               <option  value="">-- Please select --</option>
                              
                            </select>
                            <span id="error_card_message_en" class="error-span"></span>
							</div>
                          <div class="form-type">  <label for="card_message_zh">Card message (Chinese)</label>
                          <select id="card_message_zh" class="input" name="card_message_zh">
                               <option value="">-- Please select --</option>
                            </select>
                            <span id="error_card_message_zh" class="error-span"></span>
                            </div>
                           <div class="form-type"> <label for="">Default Language</label></div>
                         <div class="form-type">   <div style="text-align: center">
                              <label onclick="toggle('en')"><input type="radio" name="lang" value="en" checked> English</label>
                              <label onclick="toggle('zh')"><input type="radio" name="lang" value="zh"> Chinese</label>
                                <span id="error_lang" class="error-span"></span>
                            </div>
                        </div>
                       </div>
                       <div class="send-greetings-row row2">
                         <fieldset style="text-align: center"> <legend>Email preview</legend>
                           <div class="form-type">    <span class="en">Dear</span></div>
                          <div class="form-type">     <span class="zh">親愛的</span></div>
                           <div class="form-type">    <span id="lbl_to_name"></span><span class="en">,</span></div> 
                             <div class="form-type">  
								 <textarea class="send-message-text" id="message" name="message" placeholder="Write email message here!"></textarea>
								 <span id="error_message" class="error-span"></span>
                             </div>

                            <div class="form-type"><span class="en">Best regards, </span></div>
                            <div class="form-type"> <span id="lbl_from_name"></span></div>
                            <div class="form-type"> <span class="zh">敬上</span></div>
                            <div class="form-type"> <span id="lbl_from_title"></span></div>
                             <div class="form-type"> <span id="lbl_from_company"></span></div>
                             <div class="form-type"> <span class="zh"></span></div>
                            </fieldset>

                            <div class="options-custom-send float-100">
                            <div class="form-type"><input type="button"  value="Reset" class="link-hover" id="reset" /></div>
                           <div class="form-type"> <input type="button" name="preview" value="Preview" class="link-hover" id="preview"/></div>
                           <div class="form-type"> <input type="button" name="send" value="Send" class="link-hover" id="mail_card_to_user"/></div>
                            
                        
<!--
                        <p style="text-align: center; clear: left; margin: 1ex 1em;">
                            Recipient's Name and Email Address can be multiple recipients separated by comma.
                        </p>
-->
						</div>
						</div>
                     </form>
                
         </div>
		 </div>
		 </div>
		 </div>
		<div id="ajax_modal"></div>
    </section>
    </div>


<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>	
<!--
<script>
  $(document).ready(function(){
   $(document).on('click' , 'save_data_for_user', function(){
	   alert("woo");
	   });
      });
 </script>	   
-->
 
 
 
   <script>(function(){ 'use strict';

      //var dialog = document.querySelector('dialog');
      //dialogPolyfill.registerDialog( dialog );

      window.toggle = function ( lang ) {
         var list = document.querySelectorAll( '.en,.zh' );
         for ( var i = 0 ; i < list.length ; i++ ) {
            var e = list[i];
           if ( e.getAttribute( 'class' ) === lang )
               e.style.display = '';
            else
               e.style.display = 'none';
         }
      };
      //toggle( document.querySelector( '[value=en]' ).checked ? 'en' : 'zh' );
      toggle( 'en' );

      var sep = /[,;]/g;

      window.sendForm = function sendForm ( event ) {
         var to_name = document.querySelector( '#to_name' ).value;
         var to_email = document.querySelector( '#to_email' ).value;
         var name_count = to_name ? to_name.split( sep ).length : 0;
         if ( name_count > 1 && name_count !== to_email.split( sep ).length ) {
            event.preventDefault();
            return alert( 'Number of recipient name and recipient mismatch.' );
         }
         to_email.split( sep ).forEach( function( email ) {
            if ( email.indexOf( '@' ) < 0 && ! event.defaultPrevented ) {
               event.preventDefault();
               alert( 'Number of recipient name and recipient mismatch.' );
            }
         } );
         /*
         if ( ! ( document.querySelector( '#card_message_en' ).value || document.querySelector( '#card_message_zh' ).value ) ) {
               event.preventDefault();
               alert( 'Please select English and/or Chinese message.' );
         }
/*
         if ( ! event.defaultPrevented ) {
            document.querySelector( 'iframe' ).src = "about:blank";
            dialog.showModal();
         }
*/
      };

      window.inputForm = function inputForm () {
         var list = [ 'to_name', 'from_name', 'from_title', 'from_company' ];
         for ( var i = 0 ; i < list.length ; i++ ) {
            var id = list[i];
            var val = document.getElementById( id ).value;
            if ( id === 'to_name' ) val = val.split( sep )[0];
            else if ( id === 'from_company' ) val = val.split( "|" )[0];
            document.getElementById( 'lbl_'+id ).innerHTML = val;
            document.getElementById( 'lbl_'+id ).textContent = val;
         }
      };
      window.inputForm();

      if ( window.addEventListener )
         window.addEventListener( "message", function ( event ) {
            alert( event.data );
         }, false );
   })();</script>
   
   <script>
		jQuery(document).ready(function(){
			jQuery('#mail_card_to_user').on('click',function(){
				var data =  jQuery('#user_card_mail_form').serializeArray();
				var card_id = jQuery('select[name="from_admin_card"]').val();
				var from_name = jQuery('#from_name').val();
				var from_title = jQuery('#from_title').val();
				var from_company = jQuery('select[name="from_company"]').val();
				var to_name = jQuery('#to_name').val();
				var to_email = jQuery('#to_email').val();
				var card_message_en = jQuery('select[name="card_message_en"]').val();
				var card_message_zh = jQuery('select[name="card_message_zh"]').val();
				var lang = jQuery('input[name="lang"]:checked').val();
                                console.log(lang);
				var message= jQuery('#message').val();
				if(card_id == ''){
					jQuery('#error_from_admin_card').html('This field is required');
					jQuery('#error_from_admin_card').css('color','red');
				}else{
					jQuery('#error_from_admin_card').html(' ');
						$.cookie('card_id', card_id);
				}
				
				if(from_name == ''){
					jQuery('#error_from_name').html('This field is required');
					jQuery('#error_from_name').css('color','red');
				}else{
					jQuery('#error_from_name').html(' ');
					$.cookie('from_name', from_name);
				}
				
				if(from_title == ''){
					jQuery('#error_from_title').html('This field is required');
					jQuery('#error_from_title').css('color','red');
				}else{
					jQuery('#error_from_title').html(' ');
					$.cookie('from_title', from_title);
				}
				
				if(from_company == ''){
					jQuery('#error_from_name').html('This field is required');
					jQuery('#error_from_name').css('color','red');
				}else{
					jQuery('#error_from_name').html(' ');
					$.cookie('from_company', from_company);
				}
				
				if(to_name == ''){
					jQuery('#error_to_name').html('This field is required');
					jQuery('#error_to_name').css('color','red');
				}else{
					jQuery('#error_to_name').html(' ');
					$.cookie('to_name', to_name);
				}
				
				if(to_email == ''){
					jQuery('#error_to_email').html('This field is required');
					jQuery('#error_to_email').css('color','red');
				}else{
					jQuery('#error_to_email').html(' ');
					$.cookie('to_email', to_email);
				}
				
				if(card_message_en == ''){
					jQuery('#error_card_message_en').html('This field is required');
					jQuery('#error_card_message_en').css('color','red');
				}else{
					jQuery('#error_card_message_en').html(' ');
					$.cookie('card_message_en', card_message_en);
				}
				
				if(card_message_zh == ''){
					jQuery('#error_card_message_zh').html('This field is required');
					jQuery('#error_card_message_zh').css('color','red');
				}else{
					jQuery('#error_card_message_zh').html(' ');
					$.cookie('card_message_zh', card_message_zh);
				}
				
				
				if(lang == ''){
					jQuery('#error_lang').html('This field is required');
					jQuery('#error_lang').css('color','red');
				}else{
					jQuery('#error_lang').html(' ');
					$.cookie('lang', lang);
				}
				
				if(message == ''){
					jQuery('#error_message').html('This field is required');
					jQuery('#error_message').css('color','red');
				}else{
					jQuery('#error_message').html(' ');
					$.cookie('message', message);
				}
				
				if(card_id && from_name && from_title && from_company && to_name && to_email && card_message_en && card_message_zh && lang && message){
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>" + "index.php/users/Dashboard/ajax_send_mail",
						dataType: 'json',
						data: {data: data},
						 success: function(data) {
							if(data.status == '1'){
								jQuery( "<div class='form-type' id='mail_success_msg'><p></p></div>" ).insertBefore( ".options-custom-send p" );
								jQuery('#mail_success_msg').html(' ');
								jQuery('#mail_success_msg').html(data.msg);
							}else if(data.status == '0'){
								jQuery( "<div class='form-type' id='mail_success_msg'><p></p></div>" ).insertBefore( ".options-custom-send p" );
								jQuery('#mail_success_msg').html(' ');
								jQuery('#mail_success_msg').html(data.msg);
							}
						}
					});
				}else{
					return false;
				}	
				
			});
			
			jQuery('#from_name').on('keyup', function(){
				var val = $(this).val();	
				jQuery('#lbl_from_name').html(val);
			});
			
			jQuery('#from_title').on('keyup', function(){
				var val = $(this).val();	
				jQuery('#lbl_from_title').html(val);
			});
			
			jQuery('#to_name').on('keyup', function(){
				var val = $(this).val();	
				jQuery('#lbl_to_name').html(val);
			});
			
			jQuery('.from-admin-card').on('change', function(){
				var id = jQuery(this).val();
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/users/Dashboard/admin_card_get",
					dataType: 'json',
					data: {id: id},
					 success: function(data) {
						if(data.status == 'success'){
				       var strVale = data.ecard_eng_greeting ;
                       var resultArray = strVale.split('-');
			           var  htmlText = '';
			           for ( var i = 0, l = resultArray.length; i < l; i++ ) {
                       htmlText += '<option value='+resultArray[i]+'>'+resultArray[i]+'</option>';
                 }
                     
                       var str = data.ecard_chinese_greeting;
                       var resul = str.split('-');
			           var  Text = '';
			           for ( var i = 0, l = resul.length; i < l; i++ ) {
                       Text += '<option value='+resul[i]+'>'+resul[i]+'</option>';
                 } 
                       $('#card_message_zh').append(Text);
                         $('#card_message_en').append(htmlText);
                           jQuery('#admin_res').html(' ');
							jQuery('body').css("background-image", "url( )");
							jQuery('.send-your-greetings').css("background-image", "url(/ecard/"+data.ecard_form_background+")");
						}
					}
				});
			});
			
			jQuery('#preview').on('click',function(){
				var card_id = jQuery('select[name="from_admin_card"]').val();
				var from_name = jQuery('#from_name').val();
				var from_title = jQuery('#from_title').val();
				var from_company = jQuery('select[name="from_company"]').val();
				var to_name = jQuery('#to_name').val();
				var to_email = jQuery('#to_email').val();
				var card_message_en = jQuery('select[name="card_message_en"]').val();
				var card_message_zh = jQuery('select[name="card_message_zh"]').val();
				var lang = jQuery('input[name="lang"]:checked').val();
				var message= jQuery('#message').val();
				if(card_id == ''){
					jQuery('#error_from_admin_card').html('This field is required');
					jQuery('#error_from_admin_card').css('color','red');
				}else{
					jQuery('#error_from_admin_card').html(' ');
						$.cookie('card_id', card_id);
				}
				
				if(from_name == ''){
					jQuery('#error_from_name').html('This field is required');
					jQuery('#error_from_name').css('color','red');
				}else{
					jQuery('#error_from_name').html(' ');
					$.cookie('from_name', from_name);
				}
				
				if(from_title == ''){
					jQuery('#error_from_title').html('This field is required');
					jQuery('#error_from_title').css('color','red');
				}else{
					jQuery('#error_from_title').html(' ');
					$.cookie('from_title', from_title);
				}
				
				if(from_company == ''){
					jQuery('#error_from_name').html('This field is required');
					jQuery('#error_from_name').css('color','red');
				}else{
					jQuery('#error_from_name').html(' ');
					$.cookie('from_company', from_company);
				}
				
				if(to_name == ''){
					jQuery('#error_to_name').html('This field is required');
					jQuery('#error_to_name').css('color','red');
				}else{
					jQuery('#error_to_name').html(' ');
					$.cookie('to_name', to_name);
				}
				
				if(to_email == ''){
					jQuery('#error_to_email').html('This field is required');
					jQuery('#error_to_email').css('color','red');
				}else{
					jQuery('#error_to_email').html(' ');
					$.cookie('to_email', to_email);
				}
				
				if(card_message_en == ''){
					jQuery('#error_card_message_en').html('This field is required');
					jQuery('#error_card_message_en').css('color','red');
				}else{
					jQuery('#error_card_message_en').html(' ');
					$.cookie('card_message_en', card_message_en);
				}
				
				if(card_message_zh == ''){
					jQuery('#error_card_message_zh').html('This field is required');
					jQuery('#error_card_message_zh').css('color','red');
				}else{
					jQuery('#error_card_message_zh').html(' ');
					$.cookie('card_message_zh', card_message_zh);
				}
				
				
				if(lang == ''){
					jQuery('#error_lang').html('This field is required');
					jQuery('#error_lang').css('color','red');
				}else{
					jQuery('#error_lang').html(' ');
					$.cookie('lang', lang);
				}
				
				if(message == ''){
					jQuery('#error_message').html('This field is required');
					jQuery('#error_message').css('color','red');
				}else{
					jQuery('#error_message').html(' ');
					$.cookie('message', message);
				}
				
				
				if(card_id && from_name && from_title && from_company && to_name && to_email && card_message_en && card_message_zh && lang && message){
					var url = 'http://ecard.ophubsolutions.com/ecard/index.php/users/dashboard/preview_path?card_id='+card_id+'&company_name='+from_company;
					window.open(url);
				}else{
					return false;
				}	
			
			});
			
			jQuery('#reset').on('click',function(){
				var url = window.location.href; 
				window.location.href = url;
			});
		});
   </script>
 
</body>
