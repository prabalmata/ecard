    <div class="col-md-10 col-sm-11 display-table-cell v-align">
   <div class="row">
                    <header>
                       
                        <div class="col-md-12">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
<!--
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">CREATE CARD</a></li>
-->                                  
                                     <a href="<?php echo base_url(); ?>index.php/users/create/"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">CREATE TEMPLATES</span></a>
                                  </ul>
                                    </li>
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
				  <a href="<?php echo base_url(); ?>index.php/users/dashboard/send_mail?id=<?php echo $single_card_data->id; ?>">
				 <img src="<?php echo base_url().$single_card_data->ecard_email_image; ?>" style="box-shadow: 10px 10px 5px #888888;  border-radius: 25px;" alt="Smiley face" height="200" width="200"> 
				 </a>
				 </div>
				 
				 <?php } ?>
				 
				</div>	
                </div>
      </div>          

  
