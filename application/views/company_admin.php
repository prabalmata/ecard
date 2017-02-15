   <div class="col-md-10 col-sm-11 display-table-cell v-align">
 <div class="row"> 
                    <header>
                       
                        <div class="col-md-12">
                            <div class="header-rightside">
                                <h2>Companies</h2>
                                <ul class="list-inline header-top pull-right">
                                   	<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >ADD NEW</button></button>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                
                <div class="user-dashboard">
				
				<div class="col-md-offset-2" >
				<div class="row" style=" margin-top: 10px;">
                  <table>
		          <tr>
                 <th>COMPANY NAME</th>
                 <th>LOGO</th>
                 <th>EDIT</th>
                 <th>DELETE</th>
                 </tr>
				<?php foreach($company as $single_company){ ?>
			     <tr>
                 <td><?php echo $single_company->name; ?></td>
                 <td><image src="<?php echo base_url().$single_company->logo; ?>" width="100" height="100" id="image_path"  data-name_compny="<?php echo $single_company->name; ?>" data-id="<?php echo $single_company->id; ?>" data-pathimage="<?php echo $single_company->logo; ?>"></td>
                 <td><button data-toggle="modal" data-target="#myModal_edit" id="edit_company">edit</button></td>
                 <td><a href="<?php echo base_url().'index.php/admin/company/delete?id='.$single_company->id; ?>"><button>delete</button></a></td>
                 </tr>
				
				 <?php } ?>
				 </table>

			
				</div>	
                </div>
      </div>   
         <script>
         $(document).ready(function(){
			 $(document).on('click','#edit_company',function(){
			var path = $('#image_path').data('pathimage');
			var id = $('#image_path').data('id');
			var company_name = $('#image_path').data('name_compny');
			 $("#company_name_edit").val(company_name);
			 $("#hiden_id").val(id);
			 $("#hiden_path").val(path);
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
          <h4 class="modal-title">ADD COMPANY</h4>
        </div>
        <div class="modal-body">
		<div class="form"> 
        <form class="login-form" method="POST" enctype="multipart/form-data" action="<?php echo base_url();  ?>index.php/admin/company/add">
        <input type="text" placeholder="company name"  name="name" />
        <input type="file"  name="company_logo" />
        
         <button name="add">add</button>
        </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 

<!-- Modal -->
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EDIT COMPANY</h4>
        </div>
        <div class="modal-body">
		<div class="form"> 
        <form class="login-form" method="POST" enctype="multipart/form-data" action="<?php echo base_url();  ?>index.php/admin/company/edit_company">
        <input type="text" placeholder="company name"  name="name"  id="company_name_edit" />
        <input type="file"  name="company_logo" />
        <input type="hidden"  name="hiden_id" id="hiden_id" />
        <input type="hidden"  name="hiden_path"  id="hiden_path" />
        
         <button name="add">EDIT</button>
        </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


