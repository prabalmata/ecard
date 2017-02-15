 <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
             
              
                
<div class="user-dashboard">
<body class="send-greeting-page">
	<section id="page-all-content" class="page-all-content float-100">
    	<div class="float-100 greeting-page-content">
        	<div class="page-send-greetings float-100">
                <div class="send-greetings-form">
                    <h1 class="send-greetings-header">Send Your Greetings</h1>
                    <form class="send-message-form" method="POST" action="" id="user_card_mail_form">
						<div id="admin_res"></div>
                        <div class="send-greetings-row row1">
                         <div class="form-type">   <label for="from_name">Your Name</label>
                          <input  id="from_name" class="input" name="from_name" id="from_name" type="text" value="" autofocus autocapitalize="none" autocorrect="off" autocomplete="name" required /></div>
                           <div class="form-type"> <label for="from_title">Your Position / Title</label>
                          <input  id="from_title" class="input" name="from_title" id="from_title" type="text" value="" autocapitalize="none" autocorrect="off" autocomplete="organization-title" /></div>
                            <div class="form-type"><label for="from_company">Your Company</label></div>
                         <div class="form-type">   
						 <select id="from_company" name="from_company" class="input" required>
							 <option value="">-- Please select --</option>
							 <!--<optgroup label="Hotel">-->
								<option value="Hotel Lisboa">Hotel Lisboa</option>
								<option value="Grand Lisboa Hotel">Grand Lisboa Hotel</option>
								<option value="Lisboa Hotels Complex">Lisboa Hotels Complex</option>
								<option value="Hotel Sintra">Hotel Sintra</option>
								<option value="Fortaleza do Guincho">Fortaleza do Guincho</option>
								<option value="Hotel Whitcomb">Hotel Whitcomb</option>
								<option value="Lisboa Food &amp; Wines Limited">Lisboa Food &amp; Wines Limited</option>
							 <!--</optgroup>
							 <optgroup label="Mall">-->
								<option value="New Yaohan">New Yaohan</option>
							 <!--</optgroup>
							 <optgroup label="Agency">-->
								<option value="CITS Zhuhai">CITS Zhuhai</option>
								<option value="Estoril Tours Travel Agency, Ltd">Estoril Tours Travel Agency, Ltd</option>
								<option value="Estoril Travel Int'l">Estoril Travel Int'l</option>
								<option value="Shun Tak Travel">Shun Tak Travel</option>
								<option value="New Sintra Tours">New Sintra Tours </option>
								<option value="STDM Tours">STDM Tours</option>
								<option value="STDM Shipping">STDM Shipping</option>
							 <!--</optgroup>-->
                            </select>
							</div>
                          <div class="form-type"> 
							  <label for="to_name">Recipient's Name</label>
							  <input  id="to_name" class="input" name="to_name" id="to_name" type="text" value="" autocapitalize="none" autocorrect="off" autocomplete="name" />
						  </div>
                           <div class="form-type"> 
							<label for="to_email">Recipient's Email Address</label>
							<input  id="to_email" class="input" name="to_email" type="text" value="" autocapitalize="none" autocorrect="off" autocomplete="email" required />
						   </div>
                           <div class="form-type"> 
						   <label for="card_message_en">Card message (English)</label>
                         <select id="card_message_en" class="input" name="card_message_en">
                               <option value="">-- Please select --</option>
                               <option value="Merry&nbsp;Christmas&nbsp;&amp; Happy&nbsp;New&nbsp;Year">Merry&nbsp;Christmas&nbsp;&amp; Happy&nbsp;New&nbsp;Year</option>
                               <option value="Happy&nbsp;Christmas and a&nbsp;Joyful&nbsp;2017">Happy&nbsp;Christmas and a&nbsp;Joyful&nbsp;2017</option>
                               <option value="We&nbsp;Wish&nbsp;You A&nbsp;Merry&nbsp;Christmas">We&nbsp;Wish&nbsp;You A&nbsp;Merry&nbsp;Christmas</option>
                               <option value="Have&nbsp;a Merry&nbsp;Little&nbsp;Christmas">Have&nbsp;a Merry&nbsp;Little&nbsp;Christmas</option>
                               <option value="Wishing&nbsp;you a Blessed&nbsp;Christmas">Wishing&nbsp;you a Blessed&nbsp;Christmas</option>
                            </select>
							</div>
                          <div class="form-type">  <label for="card_message_zh">Card message (Chinese)</label>
                          <select id="card_message_zh" class="input" name="card_message_zh">
                               <option value="">-- Please select --</option>
                               <option value="聖誕快樂 新年進步">聖誕快樂 新年進步</option>
                               <option value="祝你聖誕快樂">祝你聖誕快樂</option>
                               <option value="聖誕及元誕佳節愉快">聖誕及元誕佳節愉快</option>
                            </select></div>
                           <div class="form-type"> <label for="">Default Language</label></div>
                         <div class="form-type">   <div style="text-align: center">
                              <label onclick="toggle('en')"><input type="radio" name="lang" value="en" checked> English</label>
                              <label onclick="toggle('zh')"><input type="radio" name="lang" value="zh"> Chinese</label>
                            </div>
                        </div>
                       </div>
                       <div class="send-greetings-row row2">
                         <fieldset style="text-align: center"> <legend>Email preview</legend>
                           <div class="form-type">    <span class="en">Dear</span></div>
                          <div class="form-type">     <span class="zh">親愛的</span></div>
                           <div class="form-type">    <span id="lbl_to_name"></span><span class="en">,</span></div> 
                             <div class="form-type">  <textarea class="send-message-text" name="message" placeholder="Write email message here!"></textarea></div>

                            <div class="form-type"><span class="en">Best regards, </span></div>
                            <div class="form-type"> <span id="lbl_from_name"></span></div>
                            <div class="form-type"> <span class="zh">敬上</span></div>
                            <div class="form-type"> <span id="lbl_from_title"></span></div>
                             <div class="form-type"> <span id="lbl_from_company"></span></div>
                             <div class="form-type"> <span class="zh"></span></div>
                            </fieldset>

                            <div class="options-custom-send float-100">
                            <div class="form-type"><input type="reset"  value="Reset" class="link-hover" /></div>
                           <div class="form-type"> <input type="button" name="preview" value="Preview" class="link-hover" id="preview"/></div>
                           <div class="form-type"> <input type="button" name="send" value="Send" class="link-hover" id="mail_card_to_user"/></div>
                            
                        
                        <p style="text-align: center; clear: left; margin: 1ex 1em;">
                            Recipient's Name and Email Address can be multiple recipients separated by comma.
                        </p>
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



<script>
$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>	
<script>
  $(document).ready(function(){
   $(document).on('click' , 'save_data_for_user', function(){
	   alert("woo");
	   });
      });
 </script>	   
 
 
 
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
			
			jQuery('.from-admin-card').on('click', function(){
				var id = jQuery(this).data('card_id');
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/users/Dashboard/admin_card_get",
					dataType: 'json',
					data: {id: id},
					 success: function(data) {
						if(data.status == 'success'){
							jQuery('#admin_res').html(' ');
							jQuery('#admin_res').append('<p style="color:white;">'+data.ecard_title+' Admin Card Selected </p>');
						}
					}
				});
			});
			
			jQuery('#preview').on('click',function(){
				var data =  jQuery('#user_card_mail_form').serializeArray();
				var card_id = jQuery('#from_admin_card:checked').data('card_id');
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "index.php/users/Dashboard/ajax_preview_mail",
					dataType: 'json',
					data: {data: data, card_id: card_id},
					 success: function(data) {
						jQuery('#ajax_modal .modal-body').html(' ');
						if(data.report == '1'){
							jQuery('#ajax_modal').append('<div id="myModal" class="modal fade" tabindex="-1" style="display: none;"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Preview</h4></div> <div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div> </div></div>');
							var obj = data.values;
							console.log(data.values.ecard_title);
							jQuery('#ajax_modal #myModal .modal-body'). append('<div id="preview_ecard_title">'+data.values.ecard_title+'</div>');
							jQuery('#ajax_modal #myModal .modal-body #preview_ecard_title'). append('<img src= '+data.values.site_url+data.values.ecard_form_background+' >');
							jQuery('#myModal').modal({
							  keyboard: false,
							  backdrop: true
							});
						}else if(data.report == '0'){
							
						}
					}
				});
			});
		});
   </script>
 
</body>
