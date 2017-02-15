
<div class="col-md-10 col-sm-11 display-table-cell v-align">
   <div class="row">
                     <div class="col-md-12">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
<!--
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">CREATE CARD</a></li>
-->
                                      
                                      <li><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" class="hidden-xs hidden-sm">CREATE USERS</button></li>
                       
<!--
                                    <li><a href="<?php echo base_url(); ?>index.php/users/dashboard/logout" class="fa fa-sign-out" >logout</a></li>
-->
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                   
                </div>
                
                <div class="user-dashboard">
			
<table>
  <tr>
    <th>Login Name</th>
    <th>Creation Date</th>
    <th>Created By</th>
    <th>Change Password</th>
    <th>Delete</th>
    <th>Active/Inactive</th>
  </tr>
  <?php foreach($users as $user) { ?>
  <tr>
    <td><?php echo $user->name; ?></td>
    <td><?php echo $user->creation_date; ?></td>
    <td><?php echo "admin"; ?></td>
    <td><input type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_edit" id="edit_pwd" data-iduser="<?php echo $user->id; ?>" data-pwduser="<?php echo $user->password; ?>" value="EDIT"> </td>
    <td><form method="POST" action="<?php echo base_url();?>index.php/admin/dashboard/delete_user"><input type="hidden" value="<?php echo $user->id; ?>" name="id"><input class="btn btn-info btn-lg" type="submit" value="DELETE"/></form></td>
    <td><input type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_active" id="edit_active" data-iduser="<?php echo $user->id; ?>"  value="<?php if($user->active=="1"){echo "active";}else{echo "inactive";} ?> " /></td>
  </tr>
  <?php } ?>
</table>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
   <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CREATE USERS</h4>
       </div>
       <div class="modal-body">
       <div class="form"> 
       <form class="login-form" method="POST" action="<?php echo base_url();  ?>index.php/admin/dashboard/register_database">
       <div class="form_control"><input type="text" value=""  name="name"/></div>
       <div class="form_control"><input type="password" placeholder="password" name="password"/></div>
       <div class="form_control"><input type="radio" name="user_type" value="admin"><label>admin</label></div>
       <div class="form_control"><input type="radio" name="user_type" value="user" checked><label>user</label></div>
       <button>create</button>
  </form>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
   <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EDIT PASSWORD</h4>
        </div>
        <div class="modal-body">
          <div class="form"> 
    <form class="login-form" method="POST" action="<?php echo base_url();  ?>index.php/admin/dashboard/edit_paswword">
       <input type="text"  id="pwd_to_change" value ="" name="name"/>
       <input type="hidden"  id="to_change_id" value ="" name="id"/>
       
      <button>change</button>
  </form>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  
  <div class="modal fade" id="myModal_active" role="dialog">
    <div class="modal-dialog">
   <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">active or in active</h4>
        </div>
        <div class="modal-body">
          <div class="form"> 
			 <form method="POST" action="<?php echo base_url(); ?>index.php/admin/dashboard/change_status"> 
    <div><input  type="submit" value="active"  name="to_do"></div>
    <br>
    <div><input  type="submit" value="inactive"  name="to_do"></div>
    <div><input id="id_active_inactive" type="hidden" value="" name="id_user" ></div>
    </form>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <script>
	 $(document).ready(function(){
		$(document).on('click','#edit_pwd',function(){
			var id = $(this,'#edit_pwd').data('iduser');
			var pwd = $(this,'#edit_pwd').data('pwduser');
			 $('#pwd_to_change').val(pwd);
			 $('#to_change_id').val(id);
			}); 
		}); 
	  </script>
	  <script>
	 $(document).ready(function(){
		$(document).on('click','#edit_active',function(){
			var id = $(this,'#edit_active').data('iduser');
			$('#id_active_inactive').val(id);
			}); 
		}); 
	  </script>
	  
  
</div>



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
