    <div class="col-md-10 col-sm-11 display-table-cell v-align">
   <div class="row">
                
                       
                        <div class="col-md-12">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">

                                </ul>
                            </div>
                        </div>
                   
                </div>
                 
                <div class="user-dashboard">
	<?php $form_data=array('class'=>'create_card'); echo form_open_multipart( base_url().'index.php/admin/create/create_card_save',$form_data);?>			
<!--
		<form  method="POST" action="<?php echo base_url();?>index.php/admin/dashboard/create_card_save" enctype="multipart/form-data">
-->
  <div class="form-heading">ENTER ECARD TITLE:<input type="text" name="title" placeholder="ENTER ECARD TITLE" /></div>
<div><?php if(isset($data['title'])&& !empty($data['title'])){echo $data['title'];} ?></div>

  <div class="form-type">Upload Ecard Animation:<input type="file" name="ecard_animation" />
  <div><?php if(isset($data['ecard_animation']) && !empty($data['ecard_animation'])){echo $data['ecard_animation'];} ?></div>
  </div>  

<div class="form-type">  Upload Form Background:<input type="file" name="form_background" />
<div><?php if(isset($data['form_background'])&& !empty($data['form_background'])){echo $data['form_background']." please upload file of dimention 1900*1190";} ?></div>
</div>  

  <div class="form-type">Upload Email Image:<input type="file" name="ecard_image" />
<div><?php if(isset($data['ecard_image'])&& !empty($data['ecard_image'])){echo $data['ecard_image']." please upload file of dimention 1900*900";} ?></div>
  </div>  

 <div class="form-type">Insert English Greeting <div class="field_wrapper"><input type="text" name="eng_grt[]" value=""/><a href="javascript:void(0);" class="add_button" title="Add field">ADD</a></div>  
<div><?php if(isset($data['eng_grt'])&& !empty($data['eng_grt'])){echo $data['eng_grt'];} ?></div>
</div>
  <div class="form-type">Insert Chinese Greeting:<div class="field_wrapper1"><input type="text" name="china_grt[]" /><a href="javascript:void(0);" class="add_ch" title="Add field">ADD</a></div>  
<div><?php if(isset($data['china_grt'])&& !empty($data['china_grt'])){echo $data['china_grt'];} ?></div>
</div>
   <div class="form-type-last"><input type="submit" name="submit" />

</form>
<input type="button" value="cancel" id="cancel"/></div>
		
		       
<script>
$(document).ready(function(){
    var maxField = 4; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var wrapper1 = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML = '<div class="form-type"><input type="text" name="eng_grt[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field">remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $('.add_button').click(function(){ //Once add button is clicked
		//alert();
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
     var fieldHTML1 = '<div class="form-type"><input type="text" name="china_grt[]" value=""/><a href="javascript:void(0);" class="remove_button1" title="Remove field">remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $('.add_ch').click(function(){ //Once add button is clicked
		//alert();
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper1).append(fieldHTML1); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
      $(wrapper1).on('click', '.remove_button1', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<script>
	$(document).ready(function(){
		$('#cancel').click(function() {
    location.reload("/admin/create");
});
		
		
		});
	
	</script>
  </div>   
