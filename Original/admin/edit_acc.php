<?php 
require_once('../dbconfig.php');
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $sql=mysqli_query($conn,"SELECT * FROM `user_account` WHERE user_ID = $id");
  $d = mysqli_fetch_array($sql);
 ?>
 <div id="testmodal" style="padding: 5px 20px;">
   <form id="antoform" class="form-horizontal calender" role="form" method="post" action="Action?id=<?php echo $id ?>">
     <div class="form-group">
       <label class="col-sm-3 control-label">Name</label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="title" name="Name" value="<?php echo $d['1']?>">
       </div>
     </div>
      <div class="form-group">
       <label class="col-sm-3 control-label">Current Password</label>
       <div class="col-sm-9">
         <input type="password" class="form-control" id="title" name="Current Password" value="<?php echo $d['2']?>">
       </div>
     </div>
      
     <div class="form-group">
       <label class="col-sm-3 control-label">New Password</label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="title" name="New Password" value="">
       </div>
     </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required type="date">
      </div>
    </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">User Type</label>
       <div class="col-sm-9">
         <select class="select2_single form-control" name="unit"">
           <?php 
           
           $unit =mysqli_query($conn,"SELECT * FROM `user_level`");
             while ($data = mysqli_fetch_array($unit))
             {
               echo "<option value=".$data[0].">".$data[1]."</option>";
             }

           ?>
         </select>
       </div>
     </div>
     <div class="form-group text-center">
       <label class=" control-label"></label>
       <div class="btn-group ">
         <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
         <input type="Submit" class="btn btn-success" id="title" name="edit_acc">
       </div>
     </div>
   </form>
</div>

 <?php
}

?>
 