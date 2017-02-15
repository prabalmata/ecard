    <div class="col-md-10 col-sm-11 display-table-cell v-align">
   <div class="row">
     <table>
		 <tr>
     <th>Date</th>
     <th>From</th>
     <th>To</th>
     <th>Language</th>
     <th>User Type</th>
     </tr>
     <?php  
     
     foreach($data as $single_info){   ?>
     <tr>
		 <td><?php echo $single_info->created_at;  ?></td>
		 <td><?php echo $single_info->from_name;  ?></td>
		 <td><?php echo $single_info->to_email;  ?></td>
		 <td><?php echo  $single_info->lang ?></td>
		 <td>Register User</td>
		</tr> 
		<?php }  ?>
<!--
          <tr>
		 <td><h1>RECORD OF NON LOGIN USERS</h1></td>
		 </tr>
-->
     <?php  
     foreach($non_login_data as $single_info) {	    ?>
     <tr>
		 <td><?php echo $single_info->created_at; ?></td>
		 <td><?php echo $single_info->from_name;  ?></td>
		 <td><?php echo $single_info->to_email;  ?></td>
		 <td><?php echo  $single_info->lang ?></td>
		 <td>Non Login User</td>
		</tr> 
		<?php }  ?>
     </table>
     
     
  </div>   
</div>
