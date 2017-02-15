    <div class="col-md-10 col-sm-11 display-table-cell v-align">
   <div class="row"> 
                    <header>
                       
                        <div class="col-md-12">
                            <div class="header-rightside">
                                <h2>Templates</h2>
                                <ul class="list-inline header-top pull-right">
                                        
                                     <a href="<?php echo base_url(); ?>index.php/admin/dashboard/create_card"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">ADD NEW</span></a>
                                        </ul>
                            </div>
                        </div>
                    </header>
                </div>
                
                <div class="user-dashboard">
				
				<div class="col-md-offset-2" >
				<div class="row" style=" margin-top: 10px;">
				<?php foreach($card_data as $single_card_data){ ?>
				
				<div class="col-md-6" style=" margin-top: 100px; text-align:center;" >
				  <div><b><?php echo $single_card_data->ecard_title; ?></b></div><br>	

				 <img src="<?php echo base_url().$single_card_data->ecard_email_image; ?>" style="box-shadow: 10px 10px 5px #888888;  border-radius: 25px;" alt="Smiley face" height="200" width="200"> 
                  <div><a href="<?php echo base_url(); ?>index.php/admin/create/edit_card?id=<?php echo $single_card_data->id;  ?>"><button>click to edit</button></a></div>
				   <div>
				<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="make_url" data-cardtitle="<?php echo $single_card_data->ecard_title;?>"data-cardid="<?php echo $single_card_data->id;?>">Click To Get Universal Url</button>
				</div>
				 </div>
				
				 <?php } ?>
				 
				</div>	
                </div>
      </div>   
      <script>
		  $(document).ready(function(){
			  $(document).on('click','#make_url', function(){
				  var card_id = $(this,'#make_url').data('cardid');
				  var card_title = $(this,'#edit_pwd').data('cardtitle');
				  var baseUrl = document.location.origin;
				  var url_to_send = baseUrl+"/ecard/index.php/sendcard?card_id="+card_id+"&title="+card_title;
				 // alert(url_to_send);
				 $('#url_made').text(url_to_send);
				  });
			  });
		  
		  </script>        
      </div>          
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">copy the url for non login users</h4>
        </div>
        <div class="modal-body">
          <p id="url_made" value=""></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
