<div class="col-md-10 col-sm-11 display-table-cell v-align">
    <div class="row">
        <div class="col-md-12">
            <div class="header-rightside">
                <ul class="list-inline header-top pull-right">
                </ul>
            </div>
        </div>
    </div>

    <div class="user-dashboard" id="uploader-edit-page">
        <?php
        foreach($card_detail as $detail){  
         $form_data=array('class'=>'create_card'); echo form_open_multipart( base_url().'index.php/admin/create/edit_save?id='.$detail->id,$form_data);?>			
        <div class="form-type row">
        <div class="form-heading">EDIT ECARD TITLE:<input type="text" name="title" value="<?php echo $detail->ecard_title; ?>"/></div>
        <div><?php if(isset($data['title'])&& !empty($data['title'])){echo $data['title'];} ?></div>

        </div>
        <div class="form-type row">
          <div class="uploader-option"><video width="150" controls>
                    <source src="<?php echo base_url().$detail->ecard_animation; ?>" type="video/mp4">
                    <source src="<?php echo base_url().$detail->ecard_animation; ?>" type="video/ogg">
                </video>
               <div class="uploader-item">EDIT Ecard Animation:<input type="file" name="ecard_animation" /> </div>
			   <div class="uploader-content"><p><?php if(isset($data['ecard_animation']) && !empty($data['ecard_animation'])){echo $data['ecard_animation'];} ?></p>
            </div>  
                </div> 
			</div>
                <div class="form-type row">
                 <div class="uploader-option"><img src="<?php echo base_url().$detail->ecard_form_background; ?>" alt="Mountain View" style="width:150px;height:100px;">

                           <div class="uploader-item"> EDIT Form Background:<input type="file"  name="form_background" /></div>
                            <div class="errors-message-uploader"><?php if(isset($data['form_background'])&& !empty($data['form_background'])){echo $data['form_background']." please upload file of dimention 1900*1190";} ?></div>
                        </div>  
                        </div>  
                         
                        <div class="form-type row">

                            <div class="uploader-option"><img src="<?php echo base_url().$detail->ecard_email_image; ?>" alt="Mountain View" style="width:150px;height:100px;">

                                  <div class="uploader-item">  EDIT Email Image:<input type="file"  name="ecard_image" /></div>
                                    <div class="errors-message-uploader"><?php if(isset($data['ecard_image'])&& !empty($data['ecard_image'])){echo $data['ecard_image']." please upload file of dimention 1900*900";} ?></div>
                                </div> 
                                </div>  

                                            
                                            <div class="form-type">
											<span>Insert English Greeting</span>
                                           <?php 
                                           
                                           $language_eng = explode("-",$detail->ecard_eng_greeting);
                                           
                                           
                                          foreach($language_eng as $message  ) { ?>
											  
                                          <div class="field_wrapper"><input type="text" name="eng_grt[]" value="<?php echo $message; ?>"/></div>
                                        <?php } ?>
                                        </div>  
                                       <div class="form-type"><span>Insert Chinese Greeting:</span>
                                         <?php 
                                         $language_china = explode("-",$detail->ecard_chinese_greeting );
                                          foreach($language_china as $message  ) { ?>
                                          <div class="field_wrapper1"><input type="text" name="china_grt[]" value="<?php echo $message; ?>"/></div> 
                                         <?php } ?>
                                          </div> 
                                        <div class="form-type-last row"><input type="submit" name="submit" /></div>


                                        <?php	}
                                        ?>	
                                        </form>       
                                        <script>
                                            $(document).ready(function () {
                                                var maxField = 4; //Input fields increment limitation
                                                var addButton = $('.add_button'); //Add button selector
                                                var wrapper = $('.field_wrapper'); //Input field wrapper
                                                var wrapper1 = $('.field_wrapper1'); //Input field wrapper
                                                var fieldHTML = '<div class="form-type"><input type="text" name="eng_grt[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field">remove</a></div>'; //New input field html 
                                                var x = 1; //Initial field counter is 1
                                                $('.add_button').click(function () { //Once add button is clicked
                                                    //alert();
                                                    if (x < maxField) { //Check maximum number of input fields
                                                        x++; //Increment field counter
                                                        $(wrapper).append(fieldHTML); // Add field html
                                                    }
                                                });
                                                var fieldHTML1 = '<div class="form-type"><input type="text" name="china_grt[]" value=""/><a href="javascript:void(0);" class="remove_button1" title="Remove field">remove</a></div>'; //New input field html 
                                                var x = 1; //Initial field counter is 1
                                                $('.add_ch').click(function () { //Once add button is clicked
                                                    //alert();
                                                    if (x < maxField) { //Check maximum number of input fields
                                                        x++; //Increment field counter
                                                        $(wrapper1).append(fieldHTML1); // Add field html
                                                    }
                                                });
                                                $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                                                    e.preventDefault();
                                                    $(this).parent('div').remove(); //Remove field html
                                                    x--; //Decrement field counter
                                                });
                                                $(wrapper1).on('click', '.remove_button1', function (e) { //Once remove button is clicked
                                                    e.preventDefault();
                                                    $(this).parent('div').remove(); //Remove field html
                                                    x--; //Decrement field counter
                                                });
                                            });
                                        </script>
                     
                                       

                </div>
            </div>
        </div>
    </div>
</div>
